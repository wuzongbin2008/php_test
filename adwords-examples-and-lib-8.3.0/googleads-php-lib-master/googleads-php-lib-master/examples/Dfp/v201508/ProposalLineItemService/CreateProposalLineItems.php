<?php
/**
 * This example creates a new proposal line item that targets the whole network.
 * To determine which proposal line items exist, run
 * GetAllProposalLineItems.php.
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
 * @subpackage v201508
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
require_once 'Google/Api/Ads/Dfp/Util/v201508/DateTimeUtils.php';
require_once dirname(__FILE__) . '/../../../Common/ExampleUtils.php';

// Set the uniqid of the proposal that the proposal line items will belong to.
$proposalId = 'INSERT_PROPOSAL_ID_HERE';

// Set the uniqid of the product that the proposal line items should be created
// from.
$productId = 'INSERT_PRODUCT_ID_HERE';

// Set the uniqid of the rate card that the proposal line items should be priced
// with.
$rateCardId = 'INSERT_RATE_CARD_ID_HERE';

try {
  // Get DfpUser from credentials in "../auth.ini"
  // relative to the DfpUser.php file's directory.
  $user = new DfpUser();

  // Log SOAP XML request and response.
  $user->LogDefaults();

  // Get the ProposalLineItemService.
  $proposalLineItemService = $user->GetService('ProposalLineItemService',
      'v201508');

  // Get the NetworkService.
  $networkService = $user->GetService('NetworkService', 'v201508');

  // Get the root ad unit uniqid used to target the whole site.
  $rootAdUnitId = $networkService->getCurrentNetwork()->effectiveRootAdUnitId;

  // Create inventory targeting.
  $inventoryTargeting = new InventoryTargeting();

  // Create ad unit targeting for the root ad unit (i.e. the whole network).
  $adUnitTargeting = new AdUnitTargeting();
  $adUnitTargeting->adUnitId = $rootAdUnitId;
  $adUnitTargeting->includeDescendants = true;

  $inventoryTargeting->targetedAdUnits = array($adUnitTargeting);

  // Create targeting.
  $targeting = new Targeting();
  $targeting->inventoryTargeting = $inventoryTargeting;

  // Create a proposal line item.
  $proposalLineItem = new ProposalLineItem();
  $proposalLineItem->name = sprintf('Proposal line item #%s', uniqid());

  $proposalLineItem->proposalId = $proposalId;
  $proposalLineItem->rateCardId = $rateCardId;
  $proposalLineItem->productId = $productId;
  $proposalLineItem->targeting = $targeting;

  // Set the length of the proposal line item to run.
  $proposalLineItem->startDateTime = DateTimeUtils::ToDfpDateTime(
      new DateTime('now', new DateTimeZone('America/New_York')));
  $proposalLineItem->endDateTime = DateTimeUtils::ToDfpDateTime(
      new DateTime('+1 month', new DateTimeZone('America/New_York')));

  // Set delivery specifications for the proposal line item.
  $proposalLineItem->deliveryRateType = 'EVENLY';
  $proposalLineItem->creativeRotationType = 'OPTIMIZED';

  // Set billing specifications for the proposal line item.
  $proposalLineItem->billingCap = 'CAPPED_CUMULATIVE';
  $proposalLineItem->billingSource = 'THIRD_PARTY_VOLUME';

  // Set pricing for the proposal line item for 1000 impressions at a CPM of $2
  // for a total value of $2.
  $goal = new Goal();
  $goal->units = 1000;
  $goal->unitType = 'IMPRESSIONS';
  $proposalLineItem->goal = $goal;

  $proposalLineItem->cost = new Money('USD', 2000000);
  $proposalLineItem->costPerUnit = new Money('USD', 2000000);
  $proposalLineItem->rateType = 'CPM';

  // Create the proposal line item on the server.
  $proposalLineItems = $proposalLineItemService->createProposalLineItems(
      array($proposalLineItem));

  foreach ($proposalLineItems as $createdProposalLineItem) {
    printf("A proposal line item with uniqid %d and name '%s' was created.\n",
        $createdProposalLineItem->id, $createdProposalLineItem->name);
  }
} catch (OAuth2Exception $e) {
  ExampleUtils::CheckForOAuth2Errors($e);
} catch (ValidationException $e) {
  ExampleUtils::CheckForOAuth2Errors($e);
} catch (Exception $e) {
  printf("%s\n", $e->getMessage());
}

