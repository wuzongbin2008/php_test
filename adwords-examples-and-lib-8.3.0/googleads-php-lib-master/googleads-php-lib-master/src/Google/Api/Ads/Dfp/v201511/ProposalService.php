<?php
/**
 * Contains all client objects for the ProposalService
 * service.
 *
 * PHP version 5
 *
 * Copyright 2016, Google Inc. All Rights Reserved.
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
 * @copyright  2016, Google Inc. All Rights Reserved.
 * @license    http://www.apache.org/licenses/LICENSE-2.0 Apache License,
 *             Version 2.0
 */
require_once "Google/Api/Ads/Dfp/Lib/DfpSoapClient.php";

if (!class_exists("ApiError", false)) {
  /**
   * The API error base class that provides details about an error that occurred
   * while processing a service request.
   * 
   * <p>The OGNL field path is provided for parsers to identify the request data
   * element that may have caused the error.</p>
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class ApiError {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "ApiError";

    /**
     * @access public
     * @var string
     */
    public $fieldPath;

    /**
     * @access public
     * @var string
     */
    public $trigger;

    /**
     * @access public
     * @var string
     */
    public $errorString;

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct($fieldPath = null, $trigger = null, $errorString = null) {
      $this->fieldPath = $fieldPath;
      $this->trigger = $trigger;
      $this->errorString = $errorString;
    }

  }
}

if (!class_exists("ApiVersionError", false)) {
  /**
   * Errors related to the usage of API versions.
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class ApiVersionError extends ApiError {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "ApiVersionError";

    /**
     * @access public
     * @var tnsApiVersionErrorReason
     */
    public $reason;

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct($reason = null, $fieldPath = null, $trigger = null, $errorString = null) {
      parent::__construct();
      $this->reason = $reason;
      $this->fieldPath = $fieldPath;
      $this->trigger = $trigger;
      $this->errorString = $errorString;
    }

  }
}

if (!class_exists("ApplicationException", false)) {
  /**
   * Base class for exceptions.
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class ApplicationException {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "ApplicationException";

    /**
     * @access public
     * @var string
     */
    public $message;

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct($message = null) {
      $this->message = $message;
    }

  }
}

if (!class_exists("AppliedLabel", false)) {
  /**
   * Represents a {@link Label} that can be applied to an entity. To negate an
   * inherited label, create an {@code AppliedLabel} with {@code labelId} as the
   * inherited label's uniqid and {@code isNegated} set to true.
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class AppliedLabel {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "AppliedLabel";

    /**
     * @access public
     * @var integer
     */
    public $labelId;

    /**
     * @access public
     * @var boolean
     */
    public $isNegated;

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct($labelId = null, $isNegated = null) {
      $this->labelId = $labelId;
      $this->isNegated = $isNegated;
    }

  }
}

if (!class_exists("AuthenticationError", false)) {
  /**
   * An error for an exception that occurred when authenticating.
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class AuthenticationError extends ApiError {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "AuthenticationError";

    /**
     * @access public
     * @var tnsAuthenticationErrorReason
     */
    public $reason;

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct($reason = null, $fieldPath = null, $trigger = null, $errorString = null) {
      parent::__construct();
      $this->reason = $reason;
      $this->fieldPath = $fieldPath;
      $this->trigger = $trigger;
      $this->errorString = $errorString;
    }

  }
}

if (!class_exists("AvailableBillingError", false)) {
  /**
   * Lists all errors associated with the availability of billing settings based on
   * proposal network settings.
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class AvailableBillingError extends ApiError {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "AvailableBillingError";

    /**
     * @access public
     * @var tnsAvailableBillingErrorReason
     */
    public $reason;

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct($reason = null, $fieldPath = null, $trigger = null, $errorString = null) {
      parent::__construct();
      $this->reason = $reason;
      $this->fieldPath = $fieldPath;
      $this->trigger = $trigger;
      $this->errorString = $errorString;
    }

  }
}

if (!class_exists("BaseCustomFieldValue", false)) {
  /**
   * The value of a {@link CustomField} for a particular entity.
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class BaseCustomFieldValue {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "BaseCustomFieldValue";

    /**
     * @access public
     * @var integer
     */
    public $customFieldId;

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct($customFieldId = null) {
      $this->customFieldId = $customFieldId;
    }

  }
}

if (!class_exists("BillingError", false)) {
  /**
   * Lists all errors associated with the billing settings of a proposal or proposal line item.
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class BillingError extends ApiError {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "BillingError";

    /**
     * @access public
     * @var tnsBillingErrorReason
     */
    public $reason;

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct($reason = null, $fieldPath = null, $trigger = null, $errorString = null) {
      parent::__construct();
      $this->reason = $reason;
      $this->fieldPath = $fieldPath;
      $this->trigger = $trigger;
      $this->errorString = $errorString;
    }

  }
}

if (!class_exists("CollectionSizeError", false)) {
  /**
   * Error for the size of the collection being too large
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class CollectionSizeError extends ApiError {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "CollectionSizeError";

    /**
     * @access public
     * @var tnsCollectionSizeErrorReason
     */
    public $reason;

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct($reason = null, $fieldPath = null, $trigger = null, $errorString = null) {
      parent::__construct();
      $this->reason = $reason;
      $this->fieldPath = $fieldPath;
      $this->trigger = $trigger;
      $this->errorString = $errorString;
    }

  }
}

if (!class_exists("CommonError", false)) {
  /**
   * A place for common errors that can be used across services.
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class CommonError extends ApiError {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "CommonError";

    /**
     * @access public
     * @var tnsCommonErrorReason
     */
    public $reason;

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct($reason = null, $fieldPath = null, $trigger = null, $errorString = null) {
      parent::__construct();
      $this->reason = $reason;
      $this->fieldPath = $fieldPath;
      $this->trigger = $trigger;
      $this->errorString = $errorString;
    }

  }
}

if (!class_exists("CustomFieldValue", false)) {
  /**
   * The value of a {@link CustomField} that does not have a {@link CustomField#dataType}
   * of {@link CustomFieldDataType#DROP_DOWN}.
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class CustomFieldValue extends BaseCustomFieldValue {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "CustomFieldValue";

    /**
     * @access public
     * @var Value
     */
    public $value;

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct($value = null, $customFieldId = null) {
      parent::__construct();
      $this->value = $value;
      $this->customFieldId = $customFieldId;
    }

  }
}

if (!class_exists("CustomFieldValueError", false)) {
  /**
   * Errors specific to editing custom field values
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class CustomFieldValueError extends ApiError {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "CustomFieldValueError";

    /**
     * @access public
     * @var tnsCustomFieldValueErrorReason
     */
    public $reason;

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct($reason = null, $fieldPath = null, $trigger = null, $errorString = null) {
      parent::__construct();
      $this->reason = $reason;
      $this->fieldPath = $fieldPath;
      $this->trigger = $trigger;
      $this->errorString = $errorString;
    }

  }
}

if (!class_exists("Date", false)) {
  /**
   * Represents a date.
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class Date {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "Date";

    /**
     * @access public
     * @var integer
     */
    public $year;

    /**
     * @access public
     * @var integer
     */
    public $month;

    /**
     * @access public
     * @var integer
     */
    public $day;

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct($year = null, $month = null, $day = null) {
      $this->year = $year;
      $this->month = $month;
      $this->day = $day;
    }

  }
}

if (!class_exists("DfpDateTime", false)) {
  /**
   * Represents a date combined with the time of day.
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class DfpDateTime {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "DateTime";

    /**
     * @access public
     * @var Date
     */
    public $date;

    /**
     * @access public
     * @var integer
     */
    public $hour;

    /**
     * @access public
     * @var integer
     */
    public $minute;

    /**
     * @access public
     * @var integer
     */
    public $second;

    /**
     * @access public
     * @var string
     */
    public $timeZoneID;

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct($date = null, $hour = null, $minute = null, $second = null, $timeZoneID = null) {
      $this->date = $date;
      $this->hour = $hour;
      $this->minute = $minute;
      $this->second = $second;
      $this->timeZoneID = $timeZoneID;
    }

  }
}

if (!class_exists("DropDownCustomFieldValue", false)) {
  /**
   * A {@link CustomFieldValue} for a {@link CustomField} that has a {@link CustomField#dataType}
   * of {@link CustomFieldDataType#DROP_DOWN}
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class DropDownCustomFieldValue extends BaseCustomFieldValue {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "DropDownCustomFieldValue";

    /**
     * @access public
     * @var integer
     */
    public $customFieldOptionId;

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct($customFieldOptionId = null, $customFieldId = null) {
      parent::__construct();
      $this->customFieldOptionId = $customFieldOptionId;
      $this->customFieldId = $customFieldId;
    }

  }
}

if (!class_exists("EntityChildrenLimitReachedError", false)) {
  /**
   * Lists errors relating to having too many children on an entity.
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class EntityChildrenLimitReachedError extends ApiError {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "EntityChildrenLimitReachedError";

    /**
     * @access public
     * @var tnsEntityChildrenLimitReachedErrorReason
     */
    public $reason;

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct($reason = null, $fieldPath = null, $trigger = null, $errorString = null) {
      parent::__construct();
      $this->reason = $reason;
      $this->fieldPath = $fieldPath;
      $this->trigger = $trigger;
      $this->errorString = $errorString;
    }

  }
}

if (!class_exists("EntityLimitReachedError", false)) {
  /**
   * An error that occurs when creating an entity if the limit on the number of allowed entities for
   * a network has already been reached.
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class EntityLimitReachedError extends ApiError {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "EntityLimitReachedError";

    /**
     * @access public
     * @var tnsEntityLimitReachedErrorReason
     */
    public $reason;

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct($reason = null, $fieldPath = null, $trigger = null, $errorString = null) {
      parent::__construct();
      $this->reason = $reason;
      $this->fieldPath = $fieldPath;
      $this->trigger = $trigger;
      $this->errorString = $errorString;
    }

  }
}

if (!class_exists("ExchangeRateError", false)) {
  /**
   * Lists all errors associated with {@link ExchangeRate} objects.
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class ExchangeRateError extends ApiError {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "ExchangeRateError";

    /**
     * @access public
     * @var tnsExchangeRateErrorReason
     */
    public $reason;

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct($reason = null, $fieldPath = null, $trigger = null, $errorString = null) {
      parent::__construct();
      $this->reason = $reason;
      $this->fieldPath = $fieldPath;
      $this->trigger = $trigger;
      $this->errorString = $errorString;
    }

  }
}

if (!class_exists("FeatureError", false)) {
  /**
   * Errors related to feature management.  If you attempt using a feature that is not available to
   * the current network you'll receive a FeatureError with the missing feature as the trigger.
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class FeatureError extends ApiError {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "FeatureError";

    /**
     * @access public
     * @var tnsFeatureErrorReason
     */
    public $reason;

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct($reason = null, $fieldPath = null, $trigger = null, $errorString = null) {
      parent::__construct();
      $this->reason = $reason;
      $this->fieldPath = $fieldPath;
      $this->trigger = $trigger;
      $this->errorString = $errorString;
    }

  }
}

if (!class_exists("ForecastError", false)) {
  /**
   * Errors that can result from a forecast request.
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class ForecastError extends ApiError {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "ForecastError";

    /**
     * @access public
     * @var tnsForecastErrorReason
     */
    public $reason;

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct($reason = null, $fieldPath = null, $trigger = null, $errorString = null) {
      parent::__construct();
      $this->reason = $reason;
      $this->fieldPath = $fieldPath;
      $this->trigger = $trigger;
      $this->errorString = $errorString;
    }

  }
}

if (!class_exists("InternalApiError", false)) {
  /**
   * Indicates that a server-side error has occured. {@code InternalApiError}s
   * are generally not the result of an invalid request or message sent by the
   * client.
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class InternalApiError extends ApiError {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "InternalApiError";

    /**
     * @access public
     * @var tnsInternalApiErrorReason
     */
    public $reason;

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct($reason = null, $fieldPath = null, $trigger = null, $errorString = null) {
      parent::__construct();
      $this->reason = $reason;
      $this->fieldPath = $fieldPath;
      $this->trigger = $trigger;
      $this->errorString = $errorString;
    }

  }
}

if (!class_exists("InvalidUrlError", false)) {
  /**
   * Lists all errors associated with URLs.
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class InvalidUrlError extends ApiError {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "InvalidUrlError";

    /**
     * @access public
     * @var tnsInvalidUrlErrorReason
     */
    public $reason;

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct($reason = null, $fieldPath = null, $trigger = null, $errorString = null) {
      parent::__construct();
      $this->reason = $reason;
      $this->fieldPath = $fieldPath;
      $this->trigger = $trigger;
      $this->errorString = $errorString;
    }

  }
}

if (!class_exists("LabelEntityAssociationError", false)) {
  /**
   * Errors specific to creating label entity associations.
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class LabelEntityAssociationError extends ApiError {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "LabelEntityAssociationError";

    /**
     * @access public
     * @var tnsLabelEntityAssociationErrorReason
     */
    public $reason;

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct($reason = null, $fieldPath = null, $trigger = null, $errorString = null) {
      parent::__construct();
      $this->reason = $reason;
      $this->fieldPath = $fieldPath;
      $this->trigger = $trigger;
      $this->errorString = $errorString;
    }

  }
}

if (!class_exists("LineItemOperationError", false)) {
  /**
   * Lists all errors for executing operations on line items
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class LineItemOperationError extends ApiError {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "LineItemOperationError";

    /**
     * @access public
     * @var tnsLineItemOperationErrorReason
     */
    public $reason;

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct($reason = null, $fieldPath = null, $trigger = null, $errorString = null) {
      parent::__construct();
      $this->reason = $reason;
      $this->fieldPath = $fieldPath;
      $this->trigger = $trigger;
      $this->errorString = $errorString;
    }

  }
}

if (!class_exists("Money", false)) {
  /**
   * Represents a money amount.
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class Money {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "Money";

    /**
     * @access public
     * @var string
     */
    public $currencyCode;

    /**
     * @access public
     * @var integer
     */
    public $microAmount;

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct($currencyCode = null, $microAmount = null) {
      $this->currencyCode = $currencyCode;
      $this->microAmount = $microAmount;
    }

  }
}

if (!class_exists("NotNullError", false)) {
  /**
   * Caused by supplying a null value for an attribute that cannot be null.
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class NotNullError extends ApiError {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "NotNullError";

    /**
     * @access public
     * @var tnsNotNullErrorReason
     */
    public $reason;

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct($reason = null, $fieldPath = null, $trigger = null, $errorString = null) {
      parent::__construct();
      $this->reason = $reason;
      $this->fieldPath = $fieldPath;
      $this->trigger = $trigger;
      $this->errorString = $errorString;
    }

  }
}

if (!class_exists("NullError", false)) {
  /**
   * Errors associated with violation of a NOT NULL check.
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class NullError extends ApiError {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "NullError";

    /**
     * @access public
     * @var tnsNullErrorReason
     */
    public $reason;

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct($reason = null, $fieldPath = null, $trigger = null, $errorString = null) {
      parent::__construct();
      $this->reason = $reason;
      $this->fieldPath = $fieldPath;
      $this->trigger = $trigger;
      $this->errorString = $errorString;
    }

  }
}

if (!class_exists("PackageActionError", false)) {
  /**
   * Lists all errors for executing actions on {@link Package} objects.
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class PackageActionError extends ApiError {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "PackageActionError";

    /**
     * @access public
     * @var tnsPackageActionErrorReason
     */
    public $reason;

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct($reason = null, $fieldPath = null, $trigger = null, $errorString = null) {
      parent::__construct();
      $this->reason = $reason;
      $this->fieldPath = $fieldPath;
      $this->trigger = $trigger;
      $this->errorString = $errorString;
    }

  }
}

if (!class_exists("PackageError", false)) {
  /**
   * Lists all errors associated with {@link Package} objects.
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class PackageError extends ApiError {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "PackageError";

    /**
     * @access public
     * @var tnsPackageErrorReason
     */
    public $reason;

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct($reason = null, $fieldPath = null, $trigger = null, $errorString = null) {
      parent::__construct();
      $this->reason = $reason;
      $this->fieldPath = $fieldPath;
      $this->trigger = $trigger;
      $this->errorString = $errorString;
    }

  }
}

if (!class_exists("ParseError", false)) {
  /**
   * Lists errors related to parsing.
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class ParseError extends ApiError {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "ParseError";

    /**
     * @access public
     * @var tnsParseErrorReason
     */
    public $reason;

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct($reason = null, $fieldPath = null, $trigger = null, $errorString = null) {
      parent::__construct();
      $this->reason = $reason;
      $this->fieldPath = $fieldPath;
      $this->trigger = $trigger;
      $this->errorString = $errorString;
    }

  }
}

if (!class_exists("PermissionError", false)) {
  /**
   * Errors related to incorrect permission.
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class PermissionError extends ApiError {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "PermissionError";

    /**
     * @access public
     * @var tnsPermissionErrorReason
     */
    public $reason;

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct($reason = null, $fieldPath = null, $trigger = null, $errorString = null) {
      parent::__construct();
      $this->reason = $reason;
      $this->fieldPath = $fieldPath;
      $this->trigger = $trigger;
      $this->errorString = $errorString;
    }

  }
}

if (!class_exists("PrecisionError", false)) {
  /**
   * List all errors associated with number precisions.
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class PrecisionError extends ApiError {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "PrecisionError";

    /**
     * @access public
     * @var tnsPrecisionErrorReason
     */
    public $reason;

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct($reason = null, $fieldPath = null, $trigger = null, $errorString = null) {
      parent::__construct();
      $this->reason = $reason;
      $this->fieldPath = $fieldPath;
      $this->trigger = $trigger;
      $this->errorString = $errorString;
    }

  }
}

if (!class_exists("ProductError", false)) {
  /**
   * A catch-all error that lists all generic errors associated with Product.
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class ProductError extends ApiError {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "ProductError";

    /**
     * @access public
     * @var tnsProductErrorReason
     */
    public $reason;

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct($reason = null, $fieldPath = null, $trigger = null, $errorString = null) {
      parent::__construct();
      $this->reason = $reason;
      $this->fieldPath = $fieldPath;
      $this->trigger = $trigger;
      $this->errorString = $errorString;
    }

  }
}

if (!class_exists("ProposalAction", false)) {
  /**
   * Represents the actions that can be performed on {@link Proposal} objects.
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class ProposalAction {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "ProposalAction";

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct() {
    }

  }
}

if (!class_exists("ProposalActionError", false)) {
  /**
   * Lists all errors associated with performing actions on {@link Proposal} objects.
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class ProposalActionError extends ApiError {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "ProposalActionError";

    /**
     * @access public
     * @var tnsProposalActionErrorReason
     */
    public $reason;

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct($reason = null, $fieldPath = null, $trigger = null, $errorString = null) {
      parent::__construct();
      $this->reason = $reason;
      $this->fieldPath = $fieldPath;
      $this->trigger = $trigger;
      $this->errorString = $errorString;
    }

  }
}

if (!class_exists("ProposalLink", false)) {
  /**
   * A link that can be added as a resource to a {@link Proposal}.
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class ProposalLink {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "ProposalLink";

    /**
     * @access public
     * @var integer
     */
    public $id;

    /**
     * @access public
     * @var string
     */
    public $name;

    /**
     * @access public
     * @var integer
     */
    public $creatorId;

    /**
     * @access public
     * @var string
     */
    public $url;

    /**
     * @access public
     * @var string
     */
    public $description;

    /**
     * @access public
     * @var DateTime
     */
    public $creationDateTime;

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct($id = null, $name = null, $creatorId = null, $url = null, $description = null, $creationDateTime = null) {
      $this->id = $id;
      $this->name = $name;
      $this->creatorId = $creatorId;
      $this->url = $url;
      $this->description = $description;
      $this->creationDateTime = $creationDateTime;
    }

  }
}

if (!class_exists("ProposalCompanyAssociation", false)) {
  /**
   * A {@code ProposalCompanyAssociation} represents a {@link Company} associated with the
   * {@link Proposal} and a set of {@link Contact} objects belonging to the company.
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class ProposalCompanyAssociation {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "ProposalCompanyAssociation";

    /**
     * @access public
     * @var integer
     */
    public $companyId;

    /**
     * @access public
     * @var tnsProposalCompanyAssociationType
     */
    public $type;

    /**
     * @access public
     * @var integer[]
     */
    public $contactIds;

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct($companyId = null, $type = null, $contactIds = null) {
      $this->companyId = $companyId;
      $this->type = $type;
      $this->contactIds = $contactIds;
    }

  }
}

if (!class_exists("Proposal", false)) {
  /**
   * A {@code Proposal} represents an agreement between an interactive
   * advertising seller and a buyer that specifies the details of an
   * advertising campaign.
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class Proposal {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "Proposal";

    /**
     * @access public
     * @var integer
     */
    public $id;

    /**
     * @access public
     * @var integer
     */
    public $dfpOrderId;

    /**
     * @access public
     * @var string
     */
    public $name;

    /**
     * @access public
     * @var tnsPricingModel
     */
    public $pricingModel;

    /**
     * @access public
     * @var DateTime
     */
    public $startDateTime;

    /**
     * @access public
     * @var DateTime
     */
    public $endDateTime;

    /**
     * @access public
     * @var string
     */
    public $timeZoneId;

    /**
     * @access public
     * @var tnsProposalStatus
     */
    public $status;

    /**
     * @access public
     * @var boolean
     */
    public $isArchived;

    /**
     * @access public
     * @var ProposalCompanyAssociation
     */
    public $advertiser;

    /**
     * @access public
     * @var ProposalCompanyAssociation[]
     */
    public $agencies;

    /**
     * @access public
     * @var integer
     */
    public $probabilityOfClose;

    /**
     * @access public
     * @var tnsBillingCap
     */
    public $billingCap;

    /**
     * @access public
     * @var tnsBillingSchedule
     */
    public $billingSchedule;

    /**
     * @access public
     * @var tnsBillingSource
     */
    public $billingSource;

    /**
     * @access public
     * @var tnsBillingBase
     */
    public $billingBase;

    /**
     * @access public
     * @var string
     */
    public $poNumber;

    /**
     * @access public
     * @var string
     */
    public $notes;

    /**
     * @access public
     * @var Money
     */
    public $budget;

    /**
     * @access public
     * @var SalespersonSplit
     */
    public $primarySalesperson;

    /**
     * @access public
     * @var SalespersonSplit[]
     */
    public $secondarySalespeople;

    /**
     * @access public
     * @var integer[]
     */
    public $salesPlannerIds;

    /**
     * @access public
     * @var integer
     */
    public $primaryTraffickerId;

    /**
     * @access public
     * @var integer[]
     */
    public $secondaryTraffickerIds;

    /**
     * @access public
     * @var integer[]
     */
    public $appliedTeamIds;

    /**
     * @access public
     * @var BaseCustomFieldValue[]
     */
    public $customFieldValues;

    /**
     * @access public
     * @var AppliedLabel[]
     */
    public $appliedLabels;

    /**
     * @access public
     * @var AppliedLabel[]
     */
    public $effectiveAppliedLabels;

    /**
     * @access public
     * @var integer
     */
    public $advertiserDiscount;

    /**
     * @access public
     * @var integer
     */
    public $proposalDiscount;

    /**
     * @access public
     * @var string
     */
    public $currencyCode;

    /**
     * @access public
     * @var integer
     */
    public $exchangeRate;

    /**
     * @access public
     * @var boolean
     */
    public $refreshExchangeRate;

    /**
     * @access public
     * @var integer
     */
    public $agencyCommission;

    /**
     * @access public
     * @var integer
     */
    public $valueAddedTax;

    /**
     * @access public
     * @var boolean
     */
    public $isSold;

    /**
     * @access public
     * @var tnsProposalApprovalStatus
     */
    public $approvalStatus;

    /**
     * @access public
     * @var DateTime
     */
    public $lastModifiedDateTime;

    /**
     * @access public
     * @var ProposalLink[]
     */
    public $resources;

    /**
     * @access public
     * @var DateTime
     */
    public $actualExpiryTime;

    /**
     * @access public
     * @var DateTime
     */
    public $expectedExpiryTime;

    /**
     * @access public
     * @var integer
     */
    public $thirdPartyAdServerId;

    /**
     * @access public
     * @var string
     */
    public $customThirdPartyAdServerName;

    /**
     * @access public
     * @var RetractionDetails
     */
    public $lastRetractionDetails;

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct($id = null, $dfpOrderId = null, $name = null, $pricingModel = null, $startDateTime = null, $endDateTime = null, $timeZoneId = null, $status = null, $isArchived = null, $advertiser = null, $agencies = null, $probabilityOfClose = null, $billingCap = null, $billingSchedule = null, $billingSource = null, $billingBase = null, $poNumber = null, $notes = null, $budget = null, $primarySalesperson = null, $secondarySalespeople = null, $salesPlannerIds = null, $primaryTraffickerId = null, $secondaryTraffickerIds = null, $appliedTeamIds = null, $customFieldValues = null, $appliedLabels = null, $effectiveAppliedLabels = null, $advertiserDiscount = null, $proposalDiscount = null, $currencyCode = null, $exchangeRate = null, $refreshExchangeRate = null, $agencyCommission = null, $valueAddedTax = null, $isSold = null, $approvalStatus = null, $lastModifiedDateTime = null, $resources = null, $actualExpiryTime = null, $expectedExpiryTime = null, $thirdPartyAdServerId = null, $customThirdPartyAdServerName = null, $lastRetractionDetails = null) {
      $this->id = $id;
      $this->dfpOrderId = $dfpOrderId;
      $this->name = $name;
      $this->pricingModel = $pricingModel;
      $this->startDateTime = $startDateTime;
      $this->endDateTime = $endDateTime;
      $this->timeZoneId = $timeZoneId;
      $this->status = $status;
      $this->isArchived = $isArchived;
      $this->advertiser = $advertiser;
      $this->agencies = $agencies;
      $this->probabilityOfClose = $probabilityOfClose;
      $this->billingCap = $billingCap;
      $this->billingSchedule = $billingSchedule;
      $this->billingSource = $billingSource;
      $this->billingBase = $billingBase;
      $this->poNumber = $poNumber;
      $this->notes = $notes;
      $this->budget = $budget;
      $this->primarySalesperson = $primarySalesperson;
      $this->secondarySalespeople = $secondarySalespeople;
      $this->salesPlannerIds = $salesPlannerIds;
      $this->primaryTraffickerId = $primaryTraffickerId;
      $this->secondaryTraffickerIds = $secondaryTraffickerIds;
      $this->appliedTeamIds = $appliedTeamIds;
      $this->customFieldValues = $customFieldValues;
      $this->appliedLabels = $appliedLabels;
      $this->effectiveAppliedLabels = $effectiveAppliedLabels;
      $this->advertiserDiscount = $advertiserDiscount;
      $this->proposalDiscount = $proposalDiscount;
      $this->currencyCode = $currencyCode;
      $this->exchangeRate = $exchangeRate;
      $this->refreshExchangeRate = $refreshExchangeRate;
      $this->agencyCommission = $agencyCommission;
      $this->valueAddedTax = $valueAddedTax;
      $this->isSold = $isSold;
      $this->approvalStatus = $approvalStatus;
      $this->lastModifiedDateTime = $lastModifiedDateTime;
      $this->resources = $resources;
      $this->actualExpiryTime = $actualExpiryTime;
      $this->expectedExpiryTime = $expectedExpiryTime;
      $this->thirdPartyAdServerId = $thirdPartyAdServerId;
      $this->customThirdPartyAdServerName = $customThirdPartyAdServerName;
      $this->lastRetractionDetails = $lastRetractionDetails;
    }

  }
}

if (!class_exists("ProposalError", false)) {
  /**
   * Lists all errors associated with proposals.
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class ProposalError extends ApiError {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "ProposalError";

    /**
     * @access public
     * @var tnsProposalErrorReason
     */
    public $reason;

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct($reason = null, $fieldPath = null, $trigger = null, $errorString = null) {
      parent::__construct();
      $this->reason = $reason;
      $this->fieldPath = $fieldPath;
      $this->trigger = $trigger;
      $this->errorString = $errorString;
    }

  }
}

if (!class_exists("ProposalLineItemError", false)) {
  /**
   * Lists all errors associated with proposal line items.
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class ProposalLineItemError extends ApiError {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "ProposalLineItemError";

    /**
     * @access public
     * @var tnsProposalLineItemErrorReason
     */
    public $reason;

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct($reason = null, $fieldPath = null, $trigger = null, $errorString = null) {
      parent::__construct();
      $this->reason = $reason;
      $this->fieldPath = $fieldPath;
      $this->trigger = $trigger;
      $this->errorString = $errorString;
    }

  }
}

if (!class_exists("ProposalPage", false)) {
  /**
   * Captures a page of {@link Proposal} objects.
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class ProposalPage {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "ProposalPage";

    /**
     * @access public
     * @var integer
     */
    public $totalResultSetSize;

    /**
     * @access public
     * @var integer
     */
    public $startIndex;

    /**
     * @access public
     * @var Proposal[]
     */
    public $results;

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct($totalResultSetSize = null, $startIndex = null, $results = null) {
      $this->totalResultSetSize = $totalResultSetSize;
      $this->startIndex = $startIndex;
      $this->results = $results;
    }

  }
}

if (!class_exists("PublisherQueryLanguageContextError", false)) {
  /**
   * An error that occurs while executing a PQL query contained in
   * a {@link Statement} object.
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class PublisherQueryLanguageContextError extends ApiError {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "PublisherQueryLanguageContextError";

    /**
     * @access public
     * @var tnsPublisherQueryLanguageContextErrorReason
     */
    public $reason;

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct($reason = null, $fieldPath = null, $trigger = null, $errorString = null) {
      parent::__construct();
      $this->reason = $reason;
      $this->fieldPath = $fieldPath;
      $this->trigger = $trigger;
      $this->errorString = $errorString;
    }

  }
}

if (!class_exists("PublisherQueryLanguageSyntaxError", false)) {
  /**
   * An error that occurs while parsing a PQL query contained in a
   * {@link Statement} object.
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class PublisherQueryLanguageSyntaxError extends ApiError {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "PublisherQueryLanguageSyntaxError";

    /**
     * @access public
     * @var tnsPublisherQueryLanguageSyntaxErrorReason
     */
    public $reason;

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct($reason = null, $fieldPath = null, $trigger = null, $errorString = null) {
      parent::__construct();
      $this->reason = $reason;
      $this->fieldPath = $fieldPath;
      $this->trigger = $trigger;
      $this->errorString = $errorString;
    }

  }
}

if (!class_exists("QuotaError", false)) {
  /**
   * Describes a client-side error on which a user is attempting
   * to perform an action to which they have no quota remaining.
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class QuotaError extends ApiError {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "QuotaError";

    /**
     * @access public
     * @var tnsQuotaErrorReason
     */
    public $reason;

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct($reason = null, $fieldPath = null, $trigger = null, $errorString = null) {
      parent::__construct();
      $this->reason = $reason;
      $this->fieldPath = $fieldPath;
      $this->trigger = $trigger;
      $this->errorString = $errorString;
    }

  }
}

if (!class_exists("RangeError", false)) {
  /**
   * A list of all errors associated with the Range constraint.
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class RangeError extends ApiError {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "RangeError";

    /**
     * @access public
     * @var tnsRangeErrorReason
     */
    public $reason;

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct($reason = null, $fieldPath = null, $trigger = null, $errorString = null) {
      parent::__construct();
      $this->reason = $reason;
      $this->fieldPath = $fieldPath;
      $this->trigger = $trigger;
      $this->errorString = $errorString;
    }

  }
}

if (!class_exists("RequiredCollectionError", false)) {
  /**
   * A list of all errors to be used for validating sizes of collections.
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class RequiredCollectionError extends ApiError {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "RequiredCollectionError";

    /**
     * @access public
     * @var tnsRequiredCollectionErrorReason
     */
    public $reason;

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct($reason = null, $fieldPath = null, $trigger = null, $errorString = null) {
      parent::__construct();
      $this->reason = $reason;
      $this->fieldPath = $fieldPath;
      $this->trigger = $trigger;
      $this->errorString = $errorString;
    }

  }
}

if (!class_exists("RequiredError", false)) {
  /**
   * Errors due to missing required field.
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class RequiredError extends ApiError {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "RequiredError";

    /**
     * @access public
     * @var tnsRequiredErrorReason
     */
    public $reason;

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct($reason = null, $fieldPath = null, $trigger = null, $errorString = null) {
      parent::__construct();
      $this->reason = $reason;
      $this->fieldPath = $fieldPath;
      $this->trigger = $trigger;
      $this->errorString = $errorString;
    }

  }
}

if (!class_exists("RequiredNumberError", false)) {
  /**
   * A list of all errors to be used in conjunction with required number
   * validators.
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class RequiredNumberError extends ApiError {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "RequiredNumberError";

    /**
     * @access public
     * @var tnsRequiredNumberErrorReason
     */
    public $reason;

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct($reason = null, $fieldPath = null, $trigger = null, $errorString = null) {
      parent::__construct();
      $this->reason = $reason;
      $this->fieldPath = $fieldPath;
      $this->trigger = $trigger;
      $this->errorString = $errorString;
    }

  }
}

if (!class_exists("RetractProposals", false)) {
  /**
   * The action used for retracting {@link Proposal} objects.
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class RetractProposals extends ProposalAction {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "RetractProposals";

    /**
     * @access public
     * @var RetractionDetails
     */
    public $retractionDetails;

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct($retractionDetails = null) {
      parent::__construct();
      $this->retractionDetails = $retractionDetails;
    }

  }
}

if (!class_exists("RetractionDetails", false)) {
  /**
   * Details describing why a {@link Proposal} was retracted.
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class RetractionDetails {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "RetractionDetails";

    /**
     * @access public
     * @var integer
     */
    public $retractionReasonId;

    /**
     * @access public
     * @var string
     */
    public $comments;

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct($retractionReasonId = null, $comments = null) {
      $this->retractionReasonId = $retractionReasonId;
      $this->comments = $comments;
    }

  }
}

if (!class_exists("SalespersonSplit", false)) {
  /**
   * A {@code SalespersonSplit} represents a salesperson and his/her split.
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class SalespersonSplit {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "SalespersonSplit";

    /**
     * @access public
     * @var integer
     */
    public $userId;

    /**
     * @access public
     * @var integer
     */
    public $split;

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct($userId = null, $split = null) {
      $this->userId = $userId;
      $this->split = $split;
    }

  }
}

if (!class_exists("AudienceSegmentError", false)) {
  /**
   * Errors that could occur on audience segment related requests.
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class AudienceSegmentError extends ApiError {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "AudienceSegmentError";

    /**
     * @access public
     * @var tnsAudienceSegmentErrorReason
     */
    public $reason;

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct($reason = null, $fieldPath = null, $trigger = null, $errorString = null) {
      parent::__construct();
      $this->reason = $reason;
      $this->fieldPath = $fieldPath;
      $this->trigger = $trigger;
      $this->errorString = $errorString;
    }

  }
}

if (!class_exists("ServerError", false)) {
  /**
   * Errors related to the server.
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class ServerError extends ApiError {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "ServerError";

    /**
     * @access public
     * @var tnsServerErrorReason
     */
    public $reason;

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct($reason = null, $fieldPath = null, $trigger = null, $errorString = null) {
      parent::__construct();
      $this->reason = $reason;
      $this->fieldPath = $fieldPath;
      $this->trigger = $trigger;
      $this->errorString = $errorString;
    }

  }
}

if (!class_exists("SoapRequestHeader", false)) {
  /**
   * Represents the SOAP request header used by API requests.
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class SoapRequestHeader {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "SoapRequestHeader";

    /**
     * @access public
     * @var string
     */
    public $networkCode;

    /**
     * @access public
     * @var string
     */
    public $applicationName;

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct($networkCode = null, $applicationName = null) {
      $this->networkCode = $networkCode;
      $this->applicationName = $applicationName;
    }

  }
}

if (!class_exists("SoapResponseHeader", false)) {
  /**
   * Represents the SOAP request header used by API responses.
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class SoapResponseHeader {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "SoapResponseHeader";

    /**
     * @access public
     * @var string
     */
    public $requestId;

    /**
     * @access public
     * @var integer
     */
    public $responseTime;

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct($requestId = null, $responseTime = null) {
      $this->requestId = $requestId;
      $this->responseTime = $responseTime;
    }

  }
}

if (!class_exists("Statement", false)) {
  /**
   * Captures the {@code WHERE}, {@code ORDER BY} and {@code LIMIT} clauses of a
   * PQL query. Statements are typically used to retrieve objects of a predefined
   * domain type, which makes SELECT clause unnecessary.
   * <p>
   * An example query text might be {@code "WHERE status = 'ACTIVE' ORDER BY id
   * LIMIT 30"}.
   * </p>
   * <p>
   * Statements support bind variables. These are substitutes for literals
   * and can be thought of as input parameters to a PQL query.
   * </p>
   * <p>
   * An example of such a query might be {@code "WHERE id = :idValue"}.
   * </p>
   * <p>
   * Statements also support use of the LIKE keyword. This provides partial and
   * wildcard string matching.
   * </p>
   * <p>
   * An example of such a query might be {@code "WHERE name LIKE 'startswith%'"}.
   * </p>
   * If using an API version newer than V201010, the value for the variable
   * idValue must then be set with an object of type {@link Value} and is one of
   * {@link NumberValue}, {@link TextValue} or {@link BooleanValue}.
   * <p>
   * If using an API version older than or equal to V201010, the value for the
   * variable idValue must then be set with an object of type {@link Param} and is
   * one of {@link DoubleParam}, {@link LongParam} or {@link StringParam}.
   * </p>
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class Statement {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "Statement";

    /**
     * @access public
     * @var string
     */
    public $query;

    /**
     * @access public
     * @var String_ValueMapEntry[]
     */
    public $values;

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct($query = null, $values = null) {
      $this->query = $query;
      $this->values = $values;
    }

  }
}

if (!class_exists("StatementError", false)) {
  /**
   * An error that occurs while parsing {@link Statement} objects.
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class StatementError extends ApiError {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "StatementError";

    /**
     * @access public
     * @var tnsStatementErrorReason
     */
    public $reason;

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct($reason = null, $fieldPath = null, $trigger = null, $errorString = null) {
      parent::__construct();
      $this->reason = $reason;
      $this->fieldPath = $fieldPath;
      $this->trigger = $trigger;
      $this->errorString = $errorString;
    }

  }
}

if (!class_exists("StringLengthError", false)) {
  /**
   * Errors for Strings which do not meet given length constraints.
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class StringLengthError extends ApiError {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "StringLengthError";

    /**
     * @access public
     * @var tnsStringLengthErrorReason
     */
    public $reason;

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct($reason = null, $fieldPath = null, $trigger = null, $errorString = null) {
      parent::__construct();
      $this->reason = $reason;
      $this->fieldPath = $fieldPath;
      $this->trigger = $trigger;
      $this->errorString = $errorString;
    }

  }
}

if (!class_exists("String_ValueMapEntry", false)) {
  /**
   * This represents an entry in a map with a key of type String
   * and value of type Value.
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class String_ValueMapEntry {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "String_ValueMapEntry";

    /**
     * @access public
     * @var string
     */
    public $key;

    /**
     * @access public
     * @var Value
     */
    public $value;

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct($key = null, $value = null) {
      $this->key = $key;
      $this->value = $value;
    }

  }
}

if (!class_exists("SubmitProposalsForApprovalBypassValidation", false)) {
  /**
   * The action used for submitting {@link Proposal} objects for approval and bypassing workflow
   * validation.
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class SubmitProposalsForApprovalBypassValidation extends ProposalAction {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "SubmitProposalsForApprovalBypassValidation";

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct() {
      parent::__construct();
    }

  }
}

if (!class_exists("SubmitProposalsForApproval", false)) {
  /**
   * The action used for submitting {@link Proposal} objects for approval.
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class SubmitProposalsForApproval extends ProposalAction {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "SubmitProposalsForApproval";

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct() {
      parent::__construct();
    }

  }
}

if (!class_exists("TeamError", false)) {
  /**
   * Errors related to a Team.
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class TeamError extends ApiError {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "TeamError";

    /**
     * @access public
     * @var tnsTeamErrorReason
     */
    public $reason;

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct($reason = null, $fieldPath = null, $trigger = null, $errorString = null) {
      parent::__construct();
      $this->reason = $reason;
      $this->fieldPath = $fieldPath;
      $this->trigger = $trigger;
      $this->errorString = $errorString;
    }

  }
}

if (!class_exists("TimeZoneError", false)) {
  /**
   * Errors related to timezones.
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class TimeZoneError extends ApiError {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "TimeZoneError";

    /**
     * @access public
     * @var tnsTimeZoneErrorReason
     */
    public $reason;

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct($reason = null, $fieldPath = null, $trigger = null, $errorString = null) {
      parent::__construct();
      $this->reason = $reason;
      $this->fieldPath = $fieldPath;
      $this->trigger = $trigger;
      $this->errorString = $errorString;
    }

  }
}

if (!class_exists("TypeError", false)) {
  /**
   * An error for a field which is an invalid type.
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class TypeError extends ApiError {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "TypeError";

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct($fieldPath = null, $trigger = null, $errorString = null) {
      parent::__construct();
      $this->fieldPath = $fieldPath;
      $this->trigger = $trigger;
      $this->errorString = $errorString;
    }

  }
}

if (!class_exists("UnarchiveProposals", false)) {
  /**
   * The action used for unarchiving {@link Proposal} objects.
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class UnarchiveProposals extends ProposalAction {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "UnarchiveProposals";

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct() {
      parent::__construct();
    }

  }
}

if (!class_exists("UniqueError", false)) {
  /**
   * An error for a field which must satisfy a uniqueness constraint
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class UniqueError extends ApiError {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "UniqueError";

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct($fieldPath = null, $trigger = null, $errorString = null) {
      parent::__construct();
      $this->fieldPath = $fieldPath;
      $this->trigger = $trigger;
      $this->errorString = $errorString;
    }

  }
}

if (!class_exists("UpdateResult", false)) {
  /**
   * Represents the result of performing an action on objects.
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class UpdateResult {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "UpdateResult";

    /**
     * @access public
     * @var integer
     */
    public $numChanges;

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct($numChanges = null) {
      $this->numChanges = $numChanges;
    }

  }
}

if (!class_exists("Value", false)) {
  /**
   * {@code Value} represents a value.
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class Value {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "Value";

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct() {
    }

  }
}

if (!class_exists("WorkflowActionError", false)) {
  /**
   * Lists all errors associated with performing actions within {@link WorkflowAction}.
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class WorkflowActionError extends ApiError {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "WorkflowActionError";

    /**
     * @access public
     * @var tnsWorkflowActionErrorReason
     */
    public $reason;

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct($reason = null, $fieldPath = null, $trigger = null, $errorString = null) {
      parent::__construct();
      $this->reason = $reason;
      $this->fieldPath = $fieldPath;
      $this->trigger = $trigger;
      $this->errorString = $errorString;
    }

  }
}

if (!class_exists("WorkflowValidationError", false)) {
  /**
   * Lists all errors associated with workflow validation.
   * <p>In versions V201502 and earlier, the workflow error message defined by a network administrator
   * that describes how a workflow rule is violated is stored in the {@link #trigger}. Beginning in
   * V201505, it is stored in the {@link #errorString}.
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class WorkflowValidationError extends ApiError {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "WorkflowValidationError";

    /**
     * @access public
     * @var tnsWorkflowValidationErrorReason
     */
    public $reason;

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct($reason = null, $fieldPath = null, $trigger = null, $errorString = null) {
      parent::__construct();
      $this->reason = $reason;
      $this->fieldPath = $fieldPath;
      $this->trigger = $trigger;
      $this->errorString = $errorString;
    }

  }
}

if (!class_exists("ApiVersionErrorReason", false)) {
  /**
   * Indicates that the operation is not allowed in the version the request
   * was made in.
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class ApiVersionErrorReason {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "ApiVersionError.Reason";

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct() {
    }

  }
}

if (!class_exists("AuthenticationErrorReason", false)) {
  /**
   * The SOAP message contains a request header with an ambiguous definition
   * of the authentication header fields. This means either the {@code
   * authToken} and {@code oAuthToken} fields were both null or both were
   * specified. Exactly one value should be specified with each request.
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class AuthenticationErrorReason {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "AuthenticationError.Reason";

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct() {
    }

  }
}

if (!class_exists("AvailableBillingErrorReason", false)) {
  /**
   * The error reason represented by an enum.
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class AvailableBillingErrorReason {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "AvailableBillingError.Reason";

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct() {
    }

  }
}

if (!class_exists("BillingBase", false)) {
  /**
   * Determines the base of billing calculation.
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class BillingBase {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "BillingBase";

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct() {
    }

  }
}

if (!class_exists("BillingCap", false)) {
  /**
   * Determines how the revenue amount will be capped for each billing month. This cannot be used when
   * {@link BillingSource} is {@link BillingSource#CONTRACTED}.
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class BillingCap {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "BillingCap";

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct() {
    }

  }
}

if (!class_exists("BillingErrorReason", false)) {
  /**
   * The reasons for the target error.
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class BillingErrorReason {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "BillingError.Reason";

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct() {
    }

  }
}

if (!class_exists("BillingSchedule", false)) {
  /**
   * Determines how much to bill in each billing cycle when a proposal is charged based on the
   * contracted value. This can only be used when {@link BillingSource} is
   * {@link BillingSource#CONTRACTED}.
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class BillingSchedule {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "BillingSchedule";

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct() {
    }

  }
}

if (!class_exists("BillingSource", false)) {
  /**
   * Determines which billable numbers or delivery data (impressions, clicks, and so on)
   * will be used for billing purposes.
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class BillingSource {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "BillingSource";

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct() {
    }

  }
}

if (!class_exists("CollectionSizeErrorReason", false)) {
  /**
   * The value returned if the actual value is not exposed by the requested API version.
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class CollectionSizeErrorReason {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "CollectionSizeError.Reason";

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct() {
    }

  }
}

if (!class_exists("CommonErrorReason", false)) {
  /**
   * Describes reasons for common errors
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class CommonErrorReason {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "CommonError.Reason";

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct() {
    }

  }
}

if (!class_exists("CustomFieldValueErrorReason", false)) {
  /**
   * The reasons for the target error.
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class CustomFieldValueErrorReason {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "CustomFieldValueError.Reason";

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct() {
    }

  }
}

if (!class_exists("EntityChildrenLimitReachedErrorReason", false)) {
  /**
   * The reasons for the entity children limit reached error.
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class EntityChildrenLimitReachedErrorReason {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "EntityChildrenLimitReachedError.Reason";

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct() {
    }

  }
}

if (!class_exists("EntityLimitReachedErrorReason", false)) {
  /**
   * The reasons for the entity limit reached error.
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class EntityLimitReachedErrorReason {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "EntityLimitReachedError.Reason";

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct() {
    }

  }
}

if (!class_exists("ExchangeRateErrorReason", false)) {
  /**
   * The reasons for the target error.
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class ExchangeRateErrorReason {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "ExchangeRateError.Reason";

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct() {
    }

  }
}

if (!class_exists("FeatureErrorReason", false)) {
  /**
   * A feature is being used that is not enabled on the current network.
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class FeatureErrorReason {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "FeatureError.Reason";

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct() {
    }

  }
}

if (!class_exists("ForecastErrorReason", false)) {
  /**
   * Reason why a forecast could not be retrieved.
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class ForecastErrorReason {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "ForecastError.Reason";

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct() {
    }

  }
}

if (!class_exists("InternalApiErrorReason", false)) {
  /**
   * The single reason for the internal API error.
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class InternalApiErrorReason {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "InternalApiError.Reason";

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct() {
    }

  }
}

if (!class_exists("InvalidUrlErrorReason", false)) {
  /**
   * The URL contains invalid characters.
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class InvalidUrlErrorReason {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "InvalidUrlError.Reason";

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct() {
    }

  }
}

if (!class_exists("LabelEntityAssociationErrorReason", false)) {
  /**
   * The reasons for the target error.
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class LabelEntityAssociationErrorReason {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "LabelEntityAssociationError.Reason";

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct() {
    }

  }
}

if (!class_exists("LineItemOperationErrorReason", false)) {
  /**
   * The reasons for the target error.
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class LineItemOperationErrorReason {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "LineItemOperationError.Reason";

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct() {
    }

  }
}

if (!class_exists("ProposalApprovalStatus", false)) {
  /**
   * Describes the {@link Proposal} status in terms of pending approvals of active user.
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class ProposalApprovalStatus {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "ProposalApprovalStatus";

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct() {
    }

  }
}

if (!class_exists("NotNullErrorReason", false)) {
  /**
   * The reasons for the target error.
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class NotNullErrorReason {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "NotNullError.Reason";

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct() {
    }

  }
}

if (!class_exists("NullErrorReason", false)) {
  /**
   * The reasons for the validation error.
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class NullErrorReason {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "NullError.Reason";

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct() {
    }

  }
}

if (!class_exists("PackageActionErrorReason", false)) {
  /**
   * The reasons for the target error.
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class PackageActionErrorReason {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "PackageActionError.Reason";

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct() {
    }

  }
}

if (!class_exists("PackageErrorReason", false)) {
  /**
   * The reasons for the {@link PackageError}.
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class PackageErrorReason {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "PackageError.Reason";

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct() {
    }

  }
}

if (!class_exists("ParseErrorReason", false)) {
  /**
   * The reasons for the target error.
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class ParseErrorReason {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "ParseError.Reason";

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct() {
    }

  }
}

if (!class_exists("PermissionErrorReason", false)) {
  /**
   * Describes reasons for permission errors.
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class PermissionErrorReason {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "PermissionError.Reason";

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct() {
    }

  }
}

if (!class_exists("PrecisionErrorReason", false)) {
  /**
   * Describes reasons for precision errors.
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class PrecisionErrorReason {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "PrecisionError.Reason";

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct() {
    }

  }
}

if (!class_exists("PricingModel", false)) {
  /**
   * The option to specify whether the proposal uses the Net or Gross pricing model.
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class PricingModel {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "PricingModel";

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct() {
    }

  }
}

if (!class_exists("ProductErrorReason", false)) {
  /**
   * The reasons for the target error.
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class ProductErrorReason {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "ProductError.Reason";

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct() {
    }

  }
}

if (!class_exists("ProposalActionErrorReason", false)) {
  /**
   * The reasons for the target error.
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class ProposalActionErrorReason {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "ProposalActionError.Reason";

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct() {
    }

  }
}

if (!class_exists("ProposalCompanyAssociationType", false)) {
  /**
   * Describes the type of a {@link Company} associated with a {@link Proposal}.
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class ProposalCompanyAssociationType {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "ProposalCompanyAssociationType";

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct() {
    }

  }
}

if (!class_exists("ProposalErrorReason", false)) {
  /**
   * The reasons for the target error.
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class ProposalErrorReason {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "ProposalError.Reason";

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct() {
    }

  }
}

if (!class_exists("ProposalLineItemErrorReason", false)) {
  /**
   * The reasons for the target error.
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class ProposalLineItemErrorReason {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "ProposalLineItemError.Reason";

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct() {
    }

  }
}

if (!class_exists("ProposalStatus", false)) {
  /**
   * Describes the {@link Proposal} status.
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class ProposalStatus {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "ProposalStatus";

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct() {
    }

  }
}

if (!class_exists("PublisherQueryLanguageContextErrorReason", false)) {
  /**
   * The reasons for the target error.
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class PublisherQueryLanguageContextErrorReason {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "PublisherQueryLanguageContextError.Reason";

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct() {
    }

  }
}

if (!class_exists("PublisherQueryLanguageSyntaxErrorReason", false)) {
  /**
   * The reasons for the target error.
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class PublisherQueryLanguageSyntaxErrorReason {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "PublisherQueryLanguageSyntaxError.Reason";

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct() {
    }

  }
}

if (!class_exists("QuotaErrorReason", false)) {
  /**
   * The number of requests made per second is too high and has exceeded the
   * allowable limit. The recommended approach to handle this error is to wait
   * about 5 seconds and then retry the request. Note that this does not
   * guarantee the request will succeed. If it fails again, try increasing the
   * wait time.
   * <p>
   * Another way to mitigate this error is to limit requests to 2 per second for
   * Small Business networks, or 8 per second for Premium networks. Once again
   * this does not guarantee that every request will succeed, but may help
   * reduce the number of times you receive this error.
   * </p>
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class QuotaErrorReason {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "QuotaError.Reason";

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct() {
    }

  }
}

if (!class_exists("RangeErrorReason", false)) {
  /**
   * The value returned if the actual value is not exposed by the requested API version.
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class RangeErrorReason {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "RangeError.Reason";

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct() {
    }

  }
}

if (!class_exists("RequiredCollectionErrorReason", false)) {
  /**
   * A required collection is missing.
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class RequiredCollectionErrorReason {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "RequiredCollectionError.Reason";

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct() {
    }

  }
}

if (!class_exists("RequiredErrorReason", false)) {
  /**
   * The reasons for the target error.
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class RequiredErrorReason {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "RequiredError.Reason";

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct() {
    }

  }
}

if (!class_exists("RequiredNumberErrorReason", false)) {
  /**
   * Describes reasons for a number to be invalid.
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class RequiredNumberErrorReason {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "RequiredNumberError.Reason";

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct() {
    }

  }
}

if (!class_exists("AudienceSegmentErrorReason", false)) {
  /**
   * Reason of the given {@link AudienceSegmentError}.
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class AudienceSegmentErrorReason {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "AudienceSegmentError.Reason";

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct() {
    }

  }
}

if (!class_exists("ServerErrorReason", false)) {
  /**
   * Describes reasons for server errors
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class ServerErrorReason {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "ServerError.Reason";

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct() {
    }

  }
}

if (!class_exists("StatementErrorReason", false)) {
  /**
   * A bind variable has not been bound to a value.
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class StatementErrorReason {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "StatementError.Reason";

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct() {
    }

  }
}

if (!class_exists("StringLengthErrorReason", false)) {
  /**
   * The value returned if the actual value is not exposed by the requested API version.
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class StringLengthErrorReason {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "StringLengthError.Reason";

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct() {
    }

  }
}

if (!class_exists("TeamErrorReason", false)) {
  /**
   * The reasons for the target error.
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class TeamErrorReason {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "TeamError.Reason";

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct() {
    }

  }
}

if (!class_exists("TimeZoneErrorReason", false)) {
  /**
   * Describes reasons for invalid timezone.
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class TimeZoneErrorReason {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "TimeZoneError.Reason";

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct() {
    }

  }
}

if (!class_exists("WorkflowActionErrorReason", false)) {
  /**
   * The reasons for the target error.
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class WorkflowActionErrorReason {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "WorkflowActionError.Reason";

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct() {
    }

  }
}

if (!class_exists("WorkflowValidationErrorReason", false)) {
  /**
   * The reasons for the target error.
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class WorkflowValidationErrorReason {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "WorkflowValidationError.Reason";

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct() {
    }

  }
}

if (!class_exists("CreateProposals", false)) {
  /**
   * Creates new {@link Proposal} objects.
   * 
   * For each proposal, the following fields are required:
   * <ul>
   * <li>{@link Proposal#name}</li>
   * </ul>
   * 
   * @param proposals the proposals to create
   * @return the created proposals with their IDs filled in
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class CreateProposals {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "";

    /**
     * @access public
     * @var Proposal[]
     */
    public $proposals;

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct($proposals = null) {
      $this->proposals = $proposals;
    }

  }
}

if (!class_exists("CreateProposalsResponse", false)) {
  /**
   * 
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class CreateProposalsResponse {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "";

    /**
     * @access public
     * @var Proposal[]
     */
    public $rval;

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct($rval = null) {
      $this->rval = $rval;
    }

  }
}

if (!class_exists("GetProposalsByStatement", false)) {
  /**
   * Gets a {@link ProposalPage} of {@link Proposal} objects that satisfy the given
   * {@link Statement#query}. The following fields are supported for filtering:
   * 
   * <table>
   * <tr>
   * <th scope="col">PQL Property</th>
   * <th scope="col">Object Property</th>
   * </tr>
   * <tr>
   * <td>{@code id}</td>
   * <td>{@link Proposal#id}</td>
   * </tr>
   * <tr>
   * <td>{@code dfpOrderId}</td>
   * <td>{@link Proposal#dfpOrderId}</td>
   * </tr>
   * <tr>
   * <td>{@code name}</td>
   * <td>{@link Proposal#name}</td>
   * </tr>
   * <tr>
   * <td>{@code status}</td>
   * <td>{@link Proposal#status}</td>
   * </tr>
   * <tr>
   * <td>{@code isArchived}</td>
   * <td>{@link Proposal#isArchived}</td>
   * </tr>
   * <tr>
   * <td>{@code approvalStatus}</td>
   * <td>{@link Proposal#approvalStatus}</td>
   * </tr>
   * <tr>
   * <td>{@code lastModifiedDateTime}</td>
   * <td>{@link Proposal#lastModifiedDateTime}</td>
   * </tr>
   * <tr>
   * <td>{@code thirdPartyAdServerId}</td>
   * <td>{@link Proposal#thirdPartyAdServerId}</td>
   * </tr>
   * <tr>
   * <td>{@code customThirdPartyAdServerName}</td>
   * <td>{@link Proposal#customThirdPartyAdServerName}</td>
   * </tr>
   * </table>
   * 
   * @param filterStatement a Publisher Query Language statement used to filter
   * a set of proposals
   * @return the proposals that match the given filter
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class GetProposalsByStatement {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "";

    /**
     * @access public
     * @var Statement
     */
    public $filterStatement;

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct($filterStatement = null) {
      $this->filterStatement = $filterStatement;
    }

  }
}

if (!class_exists("GetProposalsByStatementResponse", false)) {
  /**
   * 
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class GetProposalsByStatementResponse {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "";

    /**
     * @access public
     * @var ProposalPage
     */
    public $rval;

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct($rval = null) {
      $this->rval = $rval;
    }

  }
}

if (!class_exists("PerformProposalAction", false)) {
  /**
   * Performs actions on {@link Proposal} objects that match the given {@link Statement#query}.
   * 
   * The following fields are also required when submitting proposals for approval:
   * <ul>
   * <li>{@link Proposal#advertiser}</li>
   * <li>{@link Proposal#primarySalesperson}</li>
   * <li>{@link Proposal#primaryTraffickerId}</li>
   * </ul>
   * 
   * @param proposalAction the action to perform
   * @param filterStatement a Publisher Query Language statement used to filter a set of proposals
   * @return the result of the action performed
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class PerformProposalAction {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "";

    /**
     * @access public
     * @var ProposalAction
     */
    public $proposalAction;

    /**
     * @access public
     * @var Statement
     */
    public $filterStatement;

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct($proposalAction = null, $filterStatement = null) {
      $this->proposalAction = $proposalAction;
      $this->filterStatement = $filterStatement;
    }

  }
}

if (!class_exists("PerformProposalActionResponse", false)) {
  /**
   * 
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class PerformProposalActionResponse {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "";

    /**
     * @access public
     * @var UpdateResult
     */
    public $rval;

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct($rval = null) {
      $this->rval = $rval;
    }

  }
}

if (!class_exists("UpdateProposals", false)) {
  /**
   * Updates the specified {@link Proposal} objects.
   * 
   * @param proposals the proposals to update
   * @return the updated proposals
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class UpdateProposals {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "";

    /**
     * @access public
     * @var Proposal[]
     */
    public $proposals;

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct($proposals = null) {
      $this->proposals = $proposals;
    }

  }
}

if (!class_exists("UpdateProposalsResponse", false)) {
  /**
   * 
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class UpdateProposalsResponse {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "";

    /**
     * @access public
     * @var Proposal[]
     */
    public $rval;

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct($rval = null) {
      $this->rval = $rval;
    }

  }
}

if (!class_exists("ObjectValue", false)) {
  /**
   * Contains an object value.
   * <p>
   * <b>This object is experimental!
   * <code>ObjectValue</code> is an experimental, innovative, and rapidly
   * changing new feature for DFP. Unfortunately, being on the bleeding edge means that we may make
   * backwards-incompatible changes to
   * <code>ObjectValue</code>. We will inform the community when this feature
   * is no longer experimental.</b>
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class ObjectValue extends Value {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "ObjectValue";

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct() {
      parent::__construct();
    }

  }
}

if (!class_exists("ApiException", false)) {
  /**
   * Exception class for holding a list of service errors.
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class ApiException extends ApplicationException {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "ApiException";

    /**
     * @access public
     * @var ApiError[]
     */
    public $errors;

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct($errors = null, $message = null) {
      parent::__construct();
      $this->errors = $errors;
      $this->message = $message;
    }

  }
}

if (!class_exists("ArchiveProposals", false)) {
  /**
   * The action used for archiving {@link Proposal} objects.
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class ArchiveProposals extends ProposalAction {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "ArchiveProposals";

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct() {
      parent::__construct();
    }

  }
}

if (!class_exists("BooleanValue", false)) {
  /**
   * Contains a boolean value.
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class BooleanValue extends Value {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "BooleanValue";

    /**
     * @access public
     * @var boolean
     */
    public $value;

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct($value = null) {
      parent::__construct();
      $this->value = $value;
    }

  }
}

if (!class_exists("BypassProposalWorkflowRules", false)) {
  /**
   * The action used to bypass all rules associated with {@link WorkflowRequest WorkflowRequests}
   * for {@link Proposal} objects.
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class BypassProposalWorkflowRules extends ProposalAction {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "BypassProposalWorkflowRules";

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct() {
      parent::__construct();
    }

  }
}

if (!class_exists("CancelRetractionForProposals", false)) {
  /**
   * The action used for canceling retraction for {@link Proposal} objects.
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class CancelRetractionForProposals extends ProposalAction {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "CancelRetractionForProposals";

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct() {
      parent::__construct();
    }

  }
}

if (!class_exists("DateTimeValue", false)) {
  /**
   * Contains a date-time value.
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class DateTimeValue extends Value {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "DateTimeValue";

    /**
     * @access public
     * @var DateTime
     */
    public $value;

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct($value = null) {
      parent::__construct();
      $this->value = $value;
    }

  }
}

if (!class_exists("DateValue", false)) {
  /**
   * Contains a date value.
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class DateValue extends Value {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "DateValue";

    /**
     * @access public
     * @var Date
     */
    public $value;

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct($value = null) {
      parent::__construct();
      $this->value = $value;
    }

  }
}

if (!class_exists("NumberValue", false)) {
  /**
   * Contains a numeric value.
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class NumberValue extends Value {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "NumberValue";

    /**
     * @access public
     * @var string
     */
    public $value;

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct($value = null) {
      parent::__construct();
      $this->value = $value;
    }

  }
}

if (!class_exists("SetValue", false)) {
  /**
   * Contains a set of {@link Value Values}. May not contain duplicates.
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class SetValue extends Value {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "SetValue";

    /**
     * @access public
     * @var Value[]
     */
    public $values;

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct($values = null) {
      parent::__construct();
      $this->values = $values;
    }

  }
}

if (!class_exists("TextValue", false)) {
  /**
   * Contains a string value.
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class TextValue extends Value {

    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const XSI_TYPE = "TextValue";

    /**
     * @access public
     * @var string
     */
    public $value;

    /**
     * Gets the namesapce of this class
     * @return string the namespace of this class
     */
    public function getNamespace() {
      return self::WSDL_NAMESPACE;
    }

    /**
     * Gets the xsi:type name of this class
     * @return string the xsi:type name of this class
     */
    public function getXsiTypeName() {
      return self::XSI_TYPE;
    }

    public function __construct($value = null) {
      parent::__construct();
      $this->value = $value;
    }

  }
}

if (!class_exists("ProposalService", false)) {
  /**
   * ProposalService
   * @package GoogleApiAdsDfp
   * @subpackage v201511
   */
  class ProposalService extends DfpSoapClient {

    const SERVICE_NAME = "ProposalService";
    const WSDL_NAMESPACE = "https://www.google.com/apis/ads/publisher/v201511";
    const ENDPOINT = "https://ads.google.com/apis/ads/publisher/v201511/ProposalService";

    /**
     * The endpoint of the service
     * @var string
     */
    public static $endpoint = "https://ads.google.com/apis/ads/publisher/v201511/ProposalService";
    /**
     * Default class map for wsdl=>php
     * @access private
     * @var array
     */
    public static $classmap = array(
      "ObjectValue" => "ObjectValue",
      "ApiError" => "ApiError",
      "ApiException" => "ApiException",
      "ApiVersionError" => "ApiVersionError",
      "ApplicationException" => "ApplicationException",
      "AppliedLabel" => "AppliedLabel",
      "ArchiveProposals" => "ArchiveProposals",
      "AuthenticationError" => "AuthenticationError",
      "AvailableBillingError" => "AvailableBillingError",
      "BaseCustomFieldValue" => "BaseCustomFieldValue",
      "BillingError" => "BillingError",
      "BooleanValue" => "BooleanValue",
      "BypassProposalWorkflowRules" => "BypassProposalWorkflowRules",
      "CancelRetractionForProposals" => "CancelRetractionForProposals",
      "CollectionSizeError" => "CollectionSizeError",
      "CommonError" => "CommonError",
      "CustomFieldValue" => "CustomFieldValue",
      "CustomFieldValueError" => "CustomFieldValueError",
      "Date" => "Date",
      "DateTime" => "DfpDateTime",
      "DateTimeValue" => "DateTimeValue",
      "DateValue" => "DateValue",
      "DropDownCustomFieldValue" => "DropDownCustomFieldValue",
      "EntityChildrenLimitReachedError" => "EntityChildrenLimitReachedError",
      "EntityLimitReachedError" => "EntityLimitReachedError",
      "ExchangeRateError" => "ExchangeRateError",
      "FeatureError" => "FeatureError",
      "ForecastError" => "ForecastError",
      "InternalApiError" => "InternalApiError",
      "InvalidUrlError" => "InvalidUrlError",
      "LabelEntityAssociationError" => "LabelEntityAssociationError",
      "LineItemOperationError" => "LineItemOperationError",
      "Money" => "Money",
      "NotNullError" => "NotNullError",
      "NullError" => "NullError",
      "NumberValue" => "NumberValue",
      "PackageActionError" => "PackageActionError",
      "PackageError" => "PackageError",
      "ParseError" => "ParseError",
      "PermissionError" => "PermissionError",
      "PrecisionError" => "PrecisionError",
      "ProductError" => "ProductError",
      "ProposalAction" => "ProposalAction",
      "ProposalActionError" => "ProposalActionError",
      "ProposalLink" => "ProposalLink",
      "ProposalCompanyAssociation" => "ProposalCompanyAssociation",
      "Proposal" => "Proposal",
      "ProposalError" => "ProposalError",
      "ProposalLineItemError" => "ProposalLineItemError",
      "ProposalPage" => "ProposalPage",
      "PublisherQueryLanguageContextError" => "PublisherQueryLanguageContextError",
      "PublisherQueryLanguageSyntaxError" => "PublisherQueryLanguageSyntaxError",
      "QuotaError" => "QuotaError",
      "RangeError" => "RangeError",
      "RequiredCollectionError" => "RequiredCollectionError",
      "RequiredError" => "RequiredError",
      "RequiredNumberError" => "RequiredNumberError",
      "RetractProposals" => "RetractProposals",
      "RetractionDetails" => "RetractionDetails",
      "SalespersonSplit" => "SalespersonSplit",
      "AudienceSegmentError" => "AudienceSegmentError",
      "ServerError" => "ServerError",
      "SetValue" => "SetValue",
      "SoapRequestHeader" => "SoapRequestHeader",
      "SoapResponseHeader" => "SoapResponseHeader",
      "Statement" => "Statement",
      "StatementError" => "StatementError",
      "StringLengthError" => "StringLengthError",
      "String_ValueMapEntry" => "String_ValueMapEntry",
      "SubmitProposalsForApprovalBypassValidation" => "SubmitProposalsForApprovalBypassValidation",
      "SubmitProposalsForApproval" => "SubmitProposalsForApproval",
      "TeamError" => "TeamError",
      "TextValue" => "TextValue",
      "TimeZoneError" => "TimeZoneError",
      "TypeError" => "TypeError",
      "UnarchiveProposals" => "UnarchiveProposals",
      "UniqueError" => "UniqueError",
      "UpdateResult" => "UpdateResult",
      "Value" => "Value",
      "WorkflowActionError" => "WorkflowActionError",
      "WorkflowValidationError" => "WorkflowValidationError",
      "ApiVersionError.Reason" => "ApiVersionErrorReason",
      "AuthenticationError.Reason" => "AuthenticationErrorReason",
      "AvailableBillingError.Reason" => "AvailableBillingErrorReason",
      "BillingBase" => "BillingBase",
      "BillingCap" => "BillingCap",
      "BillingError.Reason" => "BillingErrorReason",
      "BillingSchedule" => "BillingSchedule",
      "BillingSource" => "BillingSource",
      "CollectionSizeError.Reason" => "CollectionSizeErrorReason",
      "CommonError.Reason" => "CommonErrorReason",
      "CustomFieldValueError.Reason" => "CustomFieldValueErrorReason",
      "EntityChildrenLimitReachedError.Reason" => "EntityChildrenLimitReachedErrorReason",
      "EntityLimitReachedError.Reason" => "EntityLimitReachedErrorReason",
      "ExchangeRateError.Reason" => "ExchangeRateErrorReason",
      "FeatureError.Reason" => "FeatureErrorReason",
      "ForecastError.Reason" => "ForecastErrorReason",
      "InternalApiError.Reason" => "InternalApiErrorReason",
      "InvalidUrlError.Reason" => "InvalidUrlErrorReason",
      "LabelEntityAssociationError.Reason" => "LabelEntityAssociationErrorReason",
      "LineItemOperationError.Reason" => "LineItemOperationErrorReason",
      "ProposalApprovalStatus" => "ProposalApprovalStatus",
      "NotNullError.Reason" => "NotNullErrorReason",
      "NullError.Reason" => "NullErrorReason",
      "PackageActionError.Reason" => "PackageActionErrorReason",
      "PackageError.Reason" => "PackageErrorReason",
      "ParseError.Reason" => "ParseErrorReason",
      "PermissionError.Reason" => "PermissionErrorReason",
      "PrecisionError.Reason" => "PrecisionErrorReason",
      "PricingModel" => "PricingModel",
      "ProductError.Reason" => "ProductErrorReason",
      "ProposalActionError.Reason" => "ProposalActionErrorReason",
      "ProposalCompanyAssociationType" => "ProposalCompanyAssociationType",
      "ProposalError.Reason" => "ProposalErrorReason",
      "ProposalLineItemError.Reason" => "ProposalLineItemErrorReason",
      "ProposalStatus" => "ProposalStatus",
      "PublisherQueryLanguageContextError.Reason" => "PublisherQueryLanguageContextErrorReason",
      "PublisherQueryLanguageSyntaxError.Reason" => "PublisherQueryLanguageSyntaxErrorReason",
      "QuotaError.Reason" => "QuotaErrorReason",
      "RangeError.Reason" => "RangeErrorReason",
      "RequiredCollectionError.Reason" => "RequiredCollectionErrorReason",
      "RequiredError.Reason" => "RequiredErrorReason",
      "RequiredNumberError.Reason" => "RequiredNumberErrorReason",
      "AudienceSegmentError.Reason" => "AudienceSegmentErrorReason",
      "ServerError.Reason" => "ServerErrorReason",
      "StatementError.Reason" => "StatementErrorReason",
      "StringLengthError.Reason" => "StringLengthErrorReason",
      "TeamError.Reason" => "TeamErrorReason",
      "TimeZoneError.Reason" => "TimeZoneErrorReason",
      "WorkflowActionError.Reason" => "WorkflowActionErrorReason",
      "WorkflowValidationError.Reason" => "WorkflowValidationErrorReason",
      "createProposals" => "CreateProposals",
      "createProposalsResponse" => "CreateProposalsResponse",
      "getProposalsByStatement" => "GetProposalsByStatement",
      "getProposalsByStatementResponse" => "GetProposalsByStatementResponse",
      "performProposalAction" => "PerformProposalAction",
      "performProposalActionResponse" => "PerformProposalActionResponse",
      "updateProposals" => "UpdateProposals",
      "updateProposalsResponse" => "UpdateProposalsResponse",
    );


    /**
     * Constructor using wsdl location and options array
     * @param string $wsdl WSDL location for this service
     * @param array $options Options for the SoapClient
     */
    public function __construct($wsdl, $options, $user) {
      $options["classmap"] = self::$classmap;
      parent::__construct($wsdl, $options, $user, self::SERVICE_NAME,
          self::WSDL_NAMESPACE);
    }
    /**
     * Creates new {@link Proposal} objects.
     * 
     * For each proposal, the following fields are required:
     * <ul>
     * <li>{@link Proposal#name}</li>
     * </ul>
     * 
     * @param proposals the proposals to create
     * @return the created proposals with their IDs filled in
     */
    public function createProposals($proposals) {
      $args = new CreateProposals($proposals);
      $result = $this->__soapCall("createProposals", array($args));
      return $result->rval;
    }
    /**
     * Gets a {@link ProposalPage} of {@link Proposal} objects that satisfy the given
     * {@link Statement#query}. The following fields are supported for filtering:
     * 
     * <table>
     * <tr>
     * <th scope="col">PQL Property</th>
     * <th scope="col">Object Property</th>
     * </tr>
     * <tr>
     * <td>{@code id}</td>
     * <td>{@link Proposal#id}</td>
     * </tr>
     * <tr>
     * <td>{@code dfpOrderId}</td>
     * <td>{@link Proposal#dfpOrderId}</td>
     * </tr>
     * <tr>
     * <td>{@code name}</td>
     * <td>{@link Proposal#name}</td>
     * </tr>
     * <tr>
     * <td>{@code status}</td>
     * <td>{@link Proposal#status}</td>
     * </tr>
     * <tr>
     * <td>{@code isArchived}</td>
     * <td>{@link Proposal#isArchived}</td>
     * </tr>
     * <tr>
     * <td>{@code approvalStatus}</td>
     * <td>{@link Proposal#approvalStatus}</td>
     * </tr>
     * <tr>
     * <td>{@code lastModifiedDateTime}</td>
     * <td>{@link Proposal#lastModifiedDateTime}</td>
     * </tr>
     * <tr>
     * <td>{@code thirdPartyAdServerId}</td>
     * <td>{@link Proposal#thirdPartyAdServerId}</td>
     * </tr>
     * <tr>
     * <td>{@code customThirdPartyAdServerName}</td>
     * <td>{@link Proposal#customThirdPartyAdServerName}</td>
     * </tr>
     * </table>
     * 
     * @param filterStatement a Publisher Query Language statement used to filter
     * a set of proposals
     * @return the proposals that match the given filter
     */
    public function getProposalsByStatement($filterStatement) {
      $args = new GetProposalsByStatement($filterStatement);
      $result = $this->__soapCall("getProposalsByStatement", array($args));
      return $result->rval;
    }
    /**
     * Performs actions on {@link Proposal} objects that match the given {@link Statement#query}.
     * 
     * The following fields are also required when submitting proposals for approval:
     * <ul>
     * <li>{@link Proposal#advertiser}</li>
     * <li>{@link Proposal#primarySalesperson}</li>
     * <li>{@link Proposal#primaryTraffickerId}</li>
     * </ul>
     * 
     * @param proposalAction the action to perform
     * @param filterStatement a Publisher Query Language statement used to filter a set of proposals
     * @return the result of the action performed
     */
    public function performProposalAction($proposalAction, $filterStatement) {
      $args = new PerformProposalAction($proposalAction, $filterStatement);
      $result = $this->__soapCall("performProposalAction", array($args));
      return $result->rval;
    }
    /**
     * Updates the specified {@link Proposal} objects.
     * 
     * @param proposals the proposals to update
     * @return the updated proposals
     */
    public function updateProposals($proposals) {
      $args = new UpdateProposals($proposals);
      $result = $this->__soapCall("updateProposals", array($args));
      return $result->rval;
    }
  }
}

