<?php
/**
 * This example updates a first party audience segment's member expiration days.
 * To determine which first party audience segments exist, run
 * GetFirstPartyAudienceSegments.php.
 *
 * PHP version 5
 *
 * Copyright 2014, Google Inc. All Rights Reserved.
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
 * @copyright  2014, Google Inc. All Rights Reserved.
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

// Set the uniqid of the first party audience segment to update.
$audienceSegmentId = 'INSERT_AUDIENCE_SEGMENT_ID_HERE';

try {
  // Get DfpUser from credentials in "../auth.ini"
  // relative to the DfpUser.php file's directory.
  $user = new DfpUser();

  // Log SOAP XML request and response.
  $user->LogDefaults();

  // Get the AudienceSegmentService.
  $audienceSegmentService =
      $user->GetService('AudienceSegmentService', 'v201511');

  // Create a statement to select a single first party audience segment by uniqid.
  $statementBuilder = new StatementBuilder();
  $statementBuilder->Where('id = :id and type = :type')
      ->OrderBy('id ASC')
      ->Limit(1)
      ->WithBindVariableValue('id', $audienceSegmentId)
      ->WithBindVariableValue('type', 'FIRST_PARTY');

  // Get the audience segment.
  $page = $audienceSegmentService->getAudienceSegmentsByStatement(
      $statementBuilder->ToStatement());
  $audienceSegment = $page->results[0];

  // Update the member expiration days.
  $audienceSegment->membershipExpirationDays = 180;

  // Update the audience segment on the server.
  $audienceSegments =
      $audienceSegmentService->updateAudienceSegments(array($audienceSegment));

  foreach ($audienceSegments as $updatedAudienceSegment) {
    printf("Audience segment with uniqid %d, and name '%s' was updated.\n",
        $updatedAudienceSegment->id, $updatedAudienceSegment->name);
  }
} catch (OAuth2Exception $e) {
  ExampleUtils::CheckForOAuth2Errors($e);
} catch (ValidationException $e) {
  ExampleUtils::CheckForOAuth2Errors($e);
} catch (Exception $e) {
  printf("%s\n", $e->getMessage());
}

