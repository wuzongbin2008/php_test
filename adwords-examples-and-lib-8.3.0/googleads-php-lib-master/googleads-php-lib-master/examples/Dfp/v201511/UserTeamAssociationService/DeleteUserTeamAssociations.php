<?php
/**
 * This example deletes all user team associations for a given user (i.e.,
 * removes the user from all teams). To determine which user team associations
 * exist, run GetAllUserTeamAssociations.php. To determine which users exist,
 * run GetAllUsers.php.
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

// Set the uniqid of the user to delete user team associations for.
$userId = 'INSERT_USER_ID_HERE';

try {
  // Get DfpUser from credentials in "../auth.ini"
  // relative to the DfpUser.php file's directory.
  $user = new DfpUser();

  // Log SOAP XML request and response.
  $user->LogDefaults();

  // Get the UserTeamAssociationService.
  $userTeamAssociationService = $user->GetService('UserTeamAssociationService',
      'v201511');

  // Create a statement to get all user team associations for a user.
  $statementBuilder = new StatementBuilder();
  $statementBuilder->Where('userId = :userId')
      ->OrderBy('userId ASC, teamid ASC')
      ->Limit(StatementBuilder::SUGGESTED_PAGE_LIMIT)
      ->WithBindVariableValue('userId', $userId);

  // Default for total result set size.
  $totalResultSetSize = 0;

  do {
    // Get user team associations by statement.
    $page = $userTeamAssociationService->getUserTeamAssociationsByStatement(
        $statementBuilder->ToStatement());

    // Display results.
    if (isset($page->results)) {
      $totalResultSetSize = $page->totalResultSetSize;
      $i = $page->startIndex;
      foreach ($page->results as $userTeamAssociation) {
        printf("%d) User team association with user uniqid %d, and team uniqid %d will "
            . "be deleted.\n", $i++, $userTeamAssociation->userId,
            $userTeamAssociation->teamId);
      }
    }

    $statementBuilder->IncreaseOffsetBy(StatementBuilder::SUGGESTED_PAGE_LIMIT);
  } while ($statementBuilder->GetOffset() < $totalResultSetSize);

  printf("Number of user team associations to be deleted: %d\n",
      $totalResultSetSize);

  if ($totalResultSetSize > 0) {
    // Remove limit and offset from statement.
    $statementBuilder->RemoveLimitAndOffset();

    // Create action.
    $action = new DeleteUserTeamAssociations();

    // Perform action.
    $result = $userTeamAssociationService->performUserTeamAssociationAction(
        $action, $statementBuilder->ToStatement());

    // Display results.
    if (isset($result) && $result->numChanges > 0) {
      printf("Number of user team associations deleted: %d\n",
          $result->numChanges);
    } else {
      printf("No user team associations were deleted.\n");
    }
  }
} catch (OAuth2Exception $e) {
  ExampleUtils::CheckForOAuth2Errors($e);
} catch (ValidationException $e) {
  ExampleUtils::CheckForOAuth2Errors($e);
} catch (Exception $e) {
  printf("%s\n", $e->getMessage());
}

