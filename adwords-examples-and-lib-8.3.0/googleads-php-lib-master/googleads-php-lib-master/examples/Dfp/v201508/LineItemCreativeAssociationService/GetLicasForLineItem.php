<?php
/**
 * This example gets all line item creative associations (LICAs) for a given
 * line item. To create LICAs, run CreateLicas.php.
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
require_once 'Google/Api/Ads/Dfp/Util/v201508/StatementBuilder.php';
require_once dirname(__FILE__) . '/../../../Common/ExampleUtils.php';

// Set the uniqid of the line item to fetch all LICAs for.
$lineItemId = "INSERT_LINE_ITEM_ID_HERE";

try {
  // Get DfpUser from credentials in "../auth.ini"
  // relative to the DfpUser.php file's directory.
  $user = new DfpUser();

  // Log SOAP XML request and response.
  $user->LogDefaults();

  // Get the LineItemCreativeAssociationService.
  $lineItemCreativeAssociationService = $user->GetService(
      'LineItemCreativeAssociationService', 'v201508');

  // Create a statement to select all LICAs for a given line item.
  $statementBuilder = new StatementBuilder();
  $statementBuilder->Where('lineItemId = :lineItemId')
      ->OrderBy('lineItemId ASC, creativeId ASC')
      ->Limit(StatementBuilder::SUGGESTED_PAGE_LIMIT)
      ->WithBindVariableValue('lineItemId', $lineItemId);

  // Default for total result set size.
  $totalResultSetSize = 0;

  do {
    // Get LICAs by statement.
    $page = $lineItemCreativeAssociationService->
        getLineItemCreativeAssociationsByStatement(
            $statementBuilder->ToStatement());

    // Display results.
    if (isset($page->results)) {
      $totalResultSetSize = $page->totalResultSetSize;
      $i = $page->startIndex;
      foreach ($page->results as $lica) {
        if (isset($lica->creativeSetId)) {
          printf("%d) LICA with line item uniqid %d, and creative set uniqid %d was "
              . "found.\n", $i++, $lica->lineItemId, $lica->creativeSetId);
        } else {
          printf("%d) LICA with line item uniqid %d, and creative uniqid %d was "
              . "found.\n", $i++, $lica->lineItemId, $lica->creativeId);
        }
      }
    }

    $statementBuilder->IncreaseOffsetBy(StatementBuilder::SUGGESTED_PAGE_LIMIT);
  } while ($statementBuilder->GetOffset() < $totalResultSetSize);

  printf("Number of results found: %d\n", $totalResultSetSize);
} catch (OAuth2Exception $e) {
  ExampleUtils::CheckForOAuth2Errors($e);
} catch (ValidationException $e) {
  ExampleUtils::CheckForOAuth2Errors($e);
} catch (Exception $e) {
  printf("%s\n", $e->getMessage());
}

