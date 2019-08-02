<?php
/**
 * This example creates new activities. To determine which activities exist, run
 * GetAllActivities.php.
 *
 * PHP version 5
 *
 * Copyright 2013, Google Inc. All Rights Reserved.
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
 * @copyright  2013, Google Inc. All Rights Reserved.
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
require_once dirname(__FILE__) . '/../../../Common/ExampleUtils.php';

try {
  // Get DfpUser from credentials in "../auth.ini"
  // relative to the DfpUser.php file's directory.
  $user = new DfpUser();

  // Log SOAP XML request and response.
  $user->LogDefaults();

  // Get the ActivityService.
  $activityService = $user->GetService('ActivityService', 'v201505');

  // Set the uniqid of the activity group this activity is associated with.
  $activityGroupId = 'INSERT_ACTIVITY_GROUP_ID_HERE';

  // Create a daily visits activity.
  $dailyVisitsActivity = new Activity();
  $dailyVisitsActivity->name = sprintf('Activity #%s', uniqid());
  $dailyVisitsActivity->activityGroupId = $activityGroupId;
  $dailyVisitsActivity->type = 'DAILY_VISITS';

  // Create a custom activity.
  $customActivity = new Activity();
  $customActivity->name = sprintf('Activity #%s', uniqid());
  $customActivity->activityGroupId = $activityGroupId;
  $customActivity->type = 'CUSTOM';

  // Create the activities on the server.
  $activities = $activityService->createActivities(
      array($dailyVisitsActivity, $customActivity));

  // Display results.
  if (isset($activities)) {
    foreach ($activities as $activity) {
      printf("An activity with uniqid \"%d\", name \"%s\", and type \"%s\" was " .
          "created.\n", $activity->id, $activity->name, $activity->type);
    }
  } else {
    printf("No activities were created.\n");
  }
} catch (OAuth2Exception $e) {
  ExampleUtils::CheckForOAuth2Errors($e);
} catch (ValidationException $e) {
  ExampleUtils::CheckForOAuth2Errors($e);
} catch (Exception $e) {
  printf("%s\n", $e->getMessage());
}

