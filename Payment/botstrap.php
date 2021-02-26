<?php
include '../dbconnection.php';
// Include the composer Autoloader
// The location of your project's vendor autoloader.
$composerAutoload = '../vendor/autoload.php';
if (!file_exists($composerAutoload)) {
//If the project is used as its own project, it would use rest-api-sdk-php composer autoloader.
//$composerAutoload = 'PayPal-PHP-SDK/vendor/autoload.php';
if (!file_exists($composerAutoload)) {
echo "The 'vendor' folder is missing. You must run 'composer update' to resolve application dependencies.nPlease see the README for more information.n";
exit(1);
}
}
require $composerAutoload;

use PayPal\Api\PayPalRestApiContext;
use PayPal\Api\PayPalAuthOAuthTokenCredential;

error_reporting(E_ALL);
ini_set('display_errors', '1');

// Replace these values by entering your own ClientId and Secret by visiting https://developer.paypal.com/webapps/developer/applications/myapps
$clientId = 'AbGtdYlw985Dyrc-Z0m9fHxGDm1UlClh2fNeaWMyCSs_h_s5VHOsoj7T7QTO18uNYGBr24EeMPmsd70p';
$clientSecret = 'EITECMNvyeC4K_ZkK-oc1tZ-FFZVhOOG0HcIG2X63_9RsTu39pembJLPx9diRNcJOhjpQrbMWCcLrnjr';
$mode = 'sandbox';

/** @var PaypalRestApiContext $apiContext */
$apiContext = getApiContext($clientId, $clientSecret);

return $apiContext;

function getApiContext($clientId, $clientSecret) {

// ### Api context
// Use an ApiContext object to authenticate
// API calls. The clientId and clientSecret for the
// OAuthTokenCredential class can be retrieved from
// developer.paypal.com

$apiContext = new \PayPal\Rest\ApiContext(
new \PayPal\Auth\OAuthTokenCredential(
$clientId, $clientSecret
)
);

// Comment this line out and uncomment the PP_CONFIG_PATH
// 'define' block if you want to use static file
// based configuration
global $mode;
$apiContext->setConfig(
array(
'mode' => $mode,
'log.LogEnabled' => true,
'log.FileName' => '../PayPal.log',
'log.LogLevel' => 'DEBUG', // PLEASE USE `FINE` LEVEL FOR LOGGING IN LIVE ENVIRONMENTS
'validation.level' => 'log',
'cache.enabled' => true,
// 'http.CURLOPT_CONNECTTIMEOUT' => 30
// 'http.headers.PayPal-Partner-Attribution-Id' => '123123123'
)
);

// Partner Attribution Id
// Use this header if you are a PayPal partner. Specify a unique BN Code to receive revenue attribution.
// To learn more or to request a BN Code, contact your Partner Manager or visit the PayPal Partner Portal
// $apiContext->addRequestHeader('PayPal-Partner-Attribution-Id', '123123123');
return $apiContext;
}