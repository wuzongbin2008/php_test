<?php
/**
 * This example updates a premium rate by adding a flat fee to an existing
 * feature premium. To determine which premium rates exist, run
 * GetAllPremiumRates.php.
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
 * @subpackage v201505
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
require_once 'Google/Api/Ads/Dfp/Util/v201505/StatementBuilder.php';
require_once dirname(__FILE__) . '/../../../Common/ExampleUtils.php';

// Set the uniqid of the premium rate to update.
$premiumRateId = 'INSERT_PREMIUM_RATE_ID_HERE';

try {
  // Get DfpUser from credentials in "../auth.ini"
  // relative to the DfpUser.php file's directory.
  $user = new DfpUser();

  // Log SOAP XML request and response.
  $user->LogDefaults();

  // Get the PremiumRateService.
  $premiumRateService = $user->GetService('PremiumRateService', 'v201505');

  // Create a statement to select a single premium rate by uniqid.
  $statementBuilder = new StatementBuilder();
  $statementBuilder->Where('id = :id')
      ->OrderBy('id ASC')
      ->Limit(1)
      ->WithBindVariableValue('id', $premiumRateId);

  // Get the premium rate.
  $page = $premiumRateService->getPremiumRatesByStatement(
      $statementBuilder->ToStatement());
  $premiumRate = $page->results[0];

  // Create a flat fee based premium rate value with a 10% increase.
  $flatFeePremiumRateValue = new PremiumRateValue();
  $flatFeePremiumRateValue->premiumFeature = $premiumRate->premiumFeature;
  $flatFeePremiumRateValue->rateType = 'CPM';
  $flatFeePremiumRateValue->adjustmentSize = 10000;
  $flatFeePremiumRateValue->adjustmentType = 'PERCENTAGE';

  // Update the premium rate's premiumRateValues to include a flat fee premium
  // rate.
  $premiumRate->premiumRateValues[] = $flatFeePremiumRateValue;

  // Update the premium rate on the server.
  $premiumRates = $premiumRateService->updatePremiumRates(array($premiumRate));

  foreach ($premiumRates as $updatedPremiumRate) {
    printf("Premium rate with uniqid %d, of type '%s', assigned to rate card with "
        . "uniqid %d was updated.\n",
        $updatedPremiumRate->id,
        get_class($updatedPremiumRate->premiumFeature),
        $updatedPremiumRate->rateCardId
    );
  }
} catch (OAuth2Exception $e) {
  ExampleUtils::CheckForOAuth2Errors($e);
} catch (ValidationException $e) {
  ExampleUtils::CheckForOAuth2Errors($e);
} catch (Exception $e) {
  printf("%s\n", $e->getMessage());
}

