# MvolaMerchantPayApi.DefaultApi

All URIs are relative to *http://localhost*

Method | HTTP request | Description
------------- | ------------- | -------------
[**rootPost**](DefaultApi.md#rootPost) | **POST** / | 
[**statusServerCorrelationIdGet**](DefaultApi.md#statusServerCorrelationIdGet) | **GET** /status/{serverCorrelationId} | 
[**transactionReferenceGet**](DefaultApi.md#transactionReferenceGet) | **GET** /{transactionReference} | 



## rootPost

> rootPost(version, xCorrelationID, cacheControl, inlineObject, opts)



Merchant pay

### Example

```javascript
import MvolaMerchantPayApi from 'mvola_merchant_pay_api';
let defaultClient = MvolaMerchantPayApi.ApiClient.instance;
// Configure OAuth2 access token for authorization: default
let default = defaultClient.authentications['default'];
default.accessToken = 'YOUR ACCESS TOKEN';

let apiInstance = new MvolaMerchantPayApi.DefaultApi();
let version = "version_example"; // String | 
let xCorrelationID = "xCorrelationID_example"; // String | 
let cacheControl = "cacheControl_example"; // String | 
let inlineObject = new MvolaMerchantPayApi.InlineObject(); // InlineObject | 
let opts = {
  'cellIdA': "cellIdA_example", // String | 
  'geoLocationA': "geoLocationA_example", // String | 
  'cellIdB': "cellIdB_example", // String | 
  'geoLocationB': "geoLocationB_example", // String | 
  'accept': "accept_example", // String | 
  'acceptCharset': "acceptCharset_example", // String | 
  'xCallbackURL': "xCallbackURL_example" // String | 
};
apiInstance.rootPost(version, xCorrelationID, cacheControl, inlineObject, opts, (error, data, response) => {
  if (error) {
    console.error(error);
  } else {
    console.log('API called successfully.');
  }
});
```

### Parameters


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **version** | **String**|  | 
 **xCorrelationID** | **String**|  | 
 **cacheControl** | **String**|  | 
 **inlineObject** | [**InlineObject**](InlineObject.md)|  | 
 **cellIdA** | **String**|  | [optional] 
 **geoLocationA** | **String**|  | [optional] 
 **cellIdB** | **String**|  | [optional] 
 **geoLocationB** | **String**|  | [optional] 
 **accept** | **String**|  | [optional] 
 **acceptCharset** | **String**|  | [optional] 
 **xCallbackURL** | **String**|  | [optional] 

### Return type

null (empty response body)

### Authorization

[default](../README.md#default)

### HTTP request headers

- **Content-Type**: application/json
- **Accept**: Not defined


## statusServerCorrelationIdGet

> statusServerCorrelationIdGet(serverCorrelationId, version, xCorrelationID, userAccountIdentifier, partnerName, cacheControl, opts)



Transaction status

### Example

```javascript
import MvolaMerchantPayApi from 'mvola_merchant_pay_api';
let defaultClient = MvolaMerchantPayApi.ApiClient.instance;
// Configure OAuth2 access token for authorization: default
let default = defaultClient.authentications['default'];
default.accessToken = 'YOUR ACCESS TOKEN';

let apiInstance = new MvolaMerchantPayApi.DefaultApi();
let serverCorrelationId = "serverCorrelationId_example"; // String | 
let version = "version_example"; // String | 
let xCorrelationID = "xCorrelationID_example"; // String | 
let userAccountIdentifier = "userAccountIdentifier_example"; // String | 
let partnerName = "partnerName_example"; // String | 
let cacheControl = "cacheControl_example"; // String | 
let opts = {
  'cellIdA': "cellIdA_example", // String | 
  'geoLocationA': "geoLocationA_example", // String | 
  'accept': "accept_example", // String | 
  'acceptCharset': "acceptCharset_example" // String | 
};
apiInstance.statusServerCorrelationIdGet(serverCorrelationId, version, xCorrelationID, userAccountIdentifier, partnerName, cacheControl, opts, (error, data, response) => {
  if (error) {
    console.error(error);
  } else {
    console.log('API called successfully.');
  }
});
```

### Parameters


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **serverCorrelationId** | **String**|  | 
 **version** | **String**|  | 
 **xCorrelationID** | **String**|  | 
 **userAccountIdentifier** | **String**|  | 
 **partnerName** | **String**|  | 
 **cacheControl** | **String**|  | 
 **cellIdA** | **String**|  | [optional] 
 **geoLocationA** | **String**|  | [optional] 
 **accept** | **String**|  | [optional] 
 **acceptCharset** | **String**|  | [optional] 

### Return type

null (empty response body)

### Authorization

[default](../README.md#default)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: Not defined


## transactionReferenceGet

> transactionReferenceGet(transactionReference, version, xCorrelationID, userAccountIdentifier, cacheControl, opts)



Transaction details

### Example

```javascript
import MvolaMerchantPayApi from 'mvola_merchant_pay_api';
let defaultClient = MvolaMerchantPayApi.ApiClient.instance;
// Configure OAuth2 access token for authorization: default
let default = defaultClient.authentications['default'];
default.accessToken = 'YOUR ACCESS TOKEN';

let apiInstance = new MvolaMerchantPayApi.DefaultApi();
let transactionReference = "transactionReference_example"; // String | 
let version = "version_example"; // String | 
let xCorrelationID = "xCorrelationID_example"; // String | 
let userAccountIdentifier = "userAccountIdentifier_example"; // String | 
let cacheControl = "cacheControl_example"; // String | 
let opts = {
  'cellIdA': "cellIdA_example", // String | 
  'geoLocationA': "geoLocationA_example", // String | 
  'accept': "accept_example", // String | 
  'acceptCharset': "acceptCharset_example" // String | 
};
apiInstance.transactionReferenceGet(transactionReference, version, xCorrelationID, userAccountIdentifier, cacheControl, opts, (error, data, response) => {
  if (error) {
    console.error(error);
  } else {
    console.log('API called successfully.');
  }
});
```

### Parameters


Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **transactionReference** | **String**|  | 
 **version** | **String**|  | 
 **xCorrelationID** | **String**|  | 
 **userAccountIdentifier** | **String**|  | 
 **cacheControl** | **String**|  | 
 **cellIdA** | **String**|  | [optional] 
 **geoLocationA** | **String**|  | [optional] 
 **accept** | **String**|  | [optional] 
 **acceptCharset** | **String**|  | [optional] 

### Return type

null (empty response body)

### Authorization

[default](../README.md#default)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: Not defined

