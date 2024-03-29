<?php
/**
 * This example updates a base rate's value. To determine which base rates
 * exist, run GetAllBaseRates.php.
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
 * @subpackage v201602
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
require_once 'Google/Api/Ads/Dfp/Util/v201602/StatementBuilder.php';
require_once dirname(__FILE__) . '/../../../Common/ExampleUtils.php';

// Set the uniqid of the base rate to update.
$baseRateId = 'INSERT_BASE_RATE_ID_HERE';

try {
  // Get DfpUser from credentials in "../auth.ini"
  // relative to the DfpUser.php file's directory.
  $user = new DfpUser();

  // Log SOAP XML request and response.
  $user->LogDefaults();

  // Get the BaseRateService.
  $baseRateService = $user->GetService('BaseRateService', 'v201602');

  // Create a statement to select a single base rate by uniqid.
  $statementBuilder = new StatementBuilder();
  $statementBuilder->Where('id = :id')
      ->OrderBy('id ASC')
      ->Limit(1)
      ->WithBindVariableValue('id', $baseRateId);

  // Get the base rate.
  $page = $baseRateService->getBaseRatesByStatement(
      $statementBuilder->ToStatement());
  $baseRate = $page->results[0];

  // Update base rate value to $3 USD.
  $newRate = new Money();
  $newRate->currencyCode = 'USD';
  $newRate->microAmount = 3000000;
  $baseRate->rate = $newRate;

  // Update the base rate on the server.
  $baseRates = $baseRateService->updateBaseRates(array($baseRate));

  foreach ($baseRates as $updatedBaseRate) {
    printf("Base rate with uniqid %d and type '%s', belonging to rate card uniqid %d "
        . "was updated.\n",
        $updatedBaseRate->id,
        get_class($updatedBaseRate),
        $updatedBaseRate->rateCardId
    );
  }
} catch (OAuth2Exception $e) {
  ExampleUtils::CheckForOAuth2Errors($e);
} catch (ValidationException $e) {
  ExampleUtils::CheckForOAuth2Errors($e);
} catch (Exception $e) {
  printf("%s\n", $e->getMessage());
}

