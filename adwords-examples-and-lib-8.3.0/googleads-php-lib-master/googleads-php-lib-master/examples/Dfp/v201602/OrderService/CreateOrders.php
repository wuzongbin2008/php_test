<?php
/**
 * This example creates new orders. To determine which orders exist,
 * run GetAllOrders.php.
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
 * @subpackage v201602
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

  // Get the OrderService.
  $orderService = $user->GetOrderService('v201602');

  // Set the advertiser (company), salesperson, and trafficker to assign to each
  // order.
  $advertiserId = 'INSERT_ADVERTISER_COMPANY_ID_HERE';
  $salespersonId = 'INSERT_SALESPERSON_ID_HERE';
  $traffickerId = 'INSERT_TRAFFICKER_ID_HERE';

  // Create an array to store local order objects.
  $orders = array();

  for ($i = 0;  $i < 5; $i++) {
    $order = new Order();
    $order->name = 'Order #' . $i;
    $order->advertiserId = $advertiserId;
    $order->salespersonId = $salespersonId;
    $order->traffickerId = $traffickerId;

    $orders[] = $order;
  }

  // Create the orders on the server.
  $orders = $orderService->createOrders($orders);

  // Display results.
  if (isset($orders)) {
    foreach ($orders as $order) {
      print 'An order with with uniqid "' . $order->id
          . '" and name "' . $order->name
          . "\" was created.\n";
    }
  } else {
    print "No orders created.";
  }
} catch (OAuth2Exception $e) {
  ExampleUtils::CheckForOAuth2Errors($e);
} catch (ValidationException $e) {
  ExampleUtils::CheckForOAuth2Errors($e);
} catch (Exception $e) {
  print $e->getMessage() . "\n";
}

