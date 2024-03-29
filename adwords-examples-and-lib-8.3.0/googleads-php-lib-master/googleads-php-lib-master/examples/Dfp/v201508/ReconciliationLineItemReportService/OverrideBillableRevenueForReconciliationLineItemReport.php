<?php
/**
 * This example updates a reconciliation line item report's billable revenue
 * overrides.
 *
 * To get reconciliation line item reports for a reconciliation report, run
 * GetReconciliationLineItemReportsForReconciliationReport.php.
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
 * @subpackage v201508
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
require_once 'Google/Api/Ads/Dfp/Util/v201508/StatementBuilder.php';
require_once dirname(__FILE__) . '/../../../Common/ExampleUtils.php';

// Set the IDs of the reconciliation report and line item to retrieve.
$reconciliationReportId = 'INSERT_RECONCILIATION_REPORT_ID_HERE';
$lineItemId = 'INSERT_LINE_ITEM_ID_HERE';

try {
  // Get DfpUser from credentials in "../auth.ini"
  // relative to the DfpUser.php file's directory.
  $user = new DfpUser();

  // Log SOAP XML request and response.
  $user->LogDefaults();

  // Get the ReconciliationLineItemReportService.
  $reconciliationLineItemReportService =
      $user->GetService('ReconciliationLineItemReportService', 'v201508');

  // Create a statement to select a reconciliation line item report.
  $statementBuilder = new StatementBuilder();
  $statementBuilder->Where('reconciliationReportId = :reconciliationReportId '
      . 'AND lineItemId = :lineItemId')
      ->OrderBy('lineItemId ASC')
      ->Limit(1)
      ->WithBindVariableValue('reconciliationReportId',
          $reconciliationReportId)
      ->WithBindVariableValue('lineItemId', $lineItemId);

  // Get reconciliation line item reports by statement.
  $page = $reconciliationLineItemReportService
      ->getReconciliationLineItemReportsByStatement(
          $statementBuilder->ToStatement());
  $lineItemReport = $page->results[0];

  // Add $10 to the computed billable revenue as an override.
  $billableRevenue = $lineItemReport->grossBillableRevenue;
  if ($lineItemReport->pricingModel === 'NET') {
    $billableRevenue = $lineItemReport->netBillableRevenue;
  }
  $billableRevenue->microAmount += 10000000;

  $billableRevenueOverrides = new BillableRevenueOverrides();
  $billableRevenueOverrides->billableRevenueOverride = $billableRevenue;

  $lineItemReport->billableRevenueOverrides = $billableRevenueOverrides;

  // Update the reconciliation line item report on the server.
  $updatedLineItemReports = $reconciliationLineItemReportService
      ->updateReconciliationLineItemReports(array($lineItemReport));

  foreach ($updatedLineItemReports as $updatedLineItemReport) {
    printf(
        "Reconciliation line item report with uniqid for line item uniqid %d was "
        . "updated, with net billable revenue '%.2f' and reconciled volume "
        . "%d.\n",
        $updatedLineItemReport->id,
        $updatedLineItemReport->lineItemId,
        $updatedLineItemReport->netBillableRevenue->microAmount / 1000000,
        $updatedLineItemReport->reconciledVolume
    );
  }
} catch (OAuth2Exception $e) {
  ExampleUtils::CheckForOAuth2Errors($e);
} catch (ValidationException $e) {
  ExampleUtils::CheckForOAuth2Errors($e);
} catch (Exception $e) {
  printf("%s\n", $e->getMessage());
}

