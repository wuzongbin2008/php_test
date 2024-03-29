<?php
/**
 * This example updates a reconciliation report's notes. To get all
 * reconciliation reports, run GetAllReconciliationReports.php.
 *
 * PHP version 5
 *
 * Copyright 2015, Google Inc. All Rights Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 *
 * @package    GoogleApiAdsDfp
 * @subpackage v201511
 * @category   WebServices
 * @copyright  2015, Google Inc. All Rights Reserved.
 * @license    http://www.apache.org/licenses/LICENSE-2.0 Apache License,
 *             Version 2.0
 */
error_reporting(E_STRICT | E_ALL);

// You can set the include path to src directory or reference
// DfpUser.php directly via require_once.
// $path = '/path/to/dfp_api_php_lib/src';
$path = dirname(__FILE__) . '/../../../../src';
set_include_path(get_include_path() . PATH_SEPARATOR . $path);

require_once 'Google/Api/Ads/Dfp/Lib/DfpUser.php';
require_once 'Google/Api/Ads/Dfp/Util/v201511/StatementBuilder.php';
require_once dirname(__FILE__) . '/../../../Common/ExampleUtils.php';

// Set the uniqid of the reconciliation report to update.
$reconciliationReportId = 'INSERT_RECONCILIATION_REPORT_ID_HERE';

try {
  // Get DfpUser from credentials in "../auth.ini"
  // relative to the DfpUser.php file's directory.
  $user = new DfpUser();

  // Log SOAP XML request and response.
  $user->LogDefaults();

  // Get the ReconciliationReportService.
  $reconciliationReportService =
      $user->GetService('ReconciliationReportService', 'v201511');

  // Create a statement to select a single reconciliation report.
  $statementBuilder = new StatementBuilder();
  $statementBuilder->Where('id = :id')
      ->OrderBy('id ASC')
      ->Limit(1)
      ->WithBindVariableValue('id', $reconciliationReportId);

  // Get the reconciliation report.
  $page = $reconciliationReportService->getReconciliationReportsByStatement(
      $statementBuilder->ToStatement());
  $reconciliationReport = $page->results[0];

  // Update the notes.
  $reconciliationReport->notes = 'Orders still pending review.';

  // Update the reconciliation report on the server.
  $updatedReconciliationReports = $reconciliationReportService
      ->updateReconciliationReports(array($reconciliationReport));

  foreach ($updatedReconciliationReports as $updatedReconciliationReport) {
    printf(
        "Reconciliation report with uniqid %d for month %s/%s was updated.\n",
        $updatedReconciliationReport->id,
        $updatedReconciliationReport->startDate->month,
        $updatedReconciliationReport->startDate->year
    );
  }
} catch (OAuth2Exception $e) {
  ExampleUtils::CheckForOAuth2Errors($e);
} catch (ValidationException $e) {
  ExampleUtils::CheckForOAuth2Errors($e);
} catch (Exception $e) {
  printf("%s\n", $e->getMessage());
}

