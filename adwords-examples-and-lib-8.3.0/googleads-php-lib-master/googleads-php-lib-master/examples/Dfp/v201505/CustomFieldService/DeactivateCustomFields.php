<?php
/**
 * This example deactivates a custom field. To determine which custom fields
 * exist, run GetAllCustomFields.php.
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

// Set the uniqid of the custom field to deactivate.
$customFieldId = 'INSERT_CUSTOM_FIELD_ID_HERE';

try {
  // Get DfpUser from credentials in "../auth.ini"
  // relative to the DfpUser.php file's directory.
  $user = new DfpUser();

  // Log SOAP XML request and response.
  $user->LogDefaults();

  // Get the CustomFieldService.
  $customFieldService = $user->GetService('CustomFieldService', 'v201505');

  // Create a statement to select a single custom field by uniqid.
  $statementBuilder = new StatementBuilder();
  $statementBuilder->Where('id = :id')
      ->OrderBy('id ASC')
      ->Limit(1)
      ->WithBindVariableValue('id', $customFieldId);

  // Default for total result set size.
  $totalResultSetSize = 0;

  do {
    // Get custom fields by statement.
    $page = $customFieldService->getCustomFieldsByStatement(
        $statementBuilder->ToStatement());

    // Display results.
    if (isset($page->results)) {
      $totalResultSetSize = $page->totalResultSetSize;
      $i = $page->startIndex;
      foreach ($page->results as $customField) {
        printf("%d) Custom field with uniqid %d, and name '%s' will be "
            . "deactivated.\n", $i++, $customField->id, $customField->name);
      }
    }

    $statementBuilder->IncreaseOffsetBy(StatementBuilder::SUGGESTED_PAGE_LIMIT);
  } while ($statementBuilder->GetOffset() < $totalResultSetSize);

  printf("Number of custom fields to be deactivated: %d\n",
      $totalResultSetSize);

  if ($totalResultSetSize > 0) {
    // Remove limit and offset from statement.
    $statementBuilder->RemoveLimitAndOffset();

    // Create action.
    $action = new DeactivateCustomFields();

    // Perform action.
    $result = $customFieldService->performCustomFieldAction($action,
        $statementBuilder->ToStatement());

    // Display results.
    if (isset($result) && $result->numChanges > 0) {
      printf("Number of custom fields deactivated: %d\n", $result->numChanges);
    } else {
      printf("No custom fields were deactivated.\n");
    }
  }
} catch (OAuth2Exception $e) {
  ExampleUtils::CheckForOAuth2Errors($e);
} catch (ValidationException $e) {
  ExampleUtils::CheckForOAuth2Errors($e);
} catch (Exception $e) {
  printf("%s\n", $e->getMessage());
}

