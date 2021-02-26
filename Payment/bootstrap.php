<?php
include '../dbconnection.php';
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;

require '../vendor/autoload.php';

// For test payments we want to enable the sandbox mode. If you want to put live
// payments through then this setting needs changing to `false`.
$enableSandbox = true;

// PayPal settings. Change these to your account details and the relevant URLs
// for your site.

 
$paypalConfig = [
    'client_id' => 'AbGtdYlw985Dyrc-Z0m9fHxGDm1UlClh2fNeaWMyCSs_h_s5VHOsoj7T7QTO18uNYGBr24EeMPmsd70p',
    'client_secret' => 'EITECMNvyeC4K_ZkK-oc1tZ-FFZVhOOG0HcIG2X63_9RsTu39pembJLPx9diRNcJOhjpQrbMWCcLrnjr',
    'return_url' => 'http://dev.softlabs.cc/uzair_80/ELEARNING/Payment/response.php',
    'cancel_url' => 'http://dev.softlabs.cc/uzair_80/ELEARNING/Payment/onCancel.php'
];

// Database settings. Change these for your database configuration.
$dbConfig = [
    'host' => 'localhost',
    'username' => 'root',
    'password' => '',
    'name' => 'lms_db'
];

$apiContext = getApiContext($paypalConfig['client_id'], $paypalConfig['client_secret'], $enableSandbox);

/**
 * Set up a connection to the API
 *
 * @param string $clientId
 * @param string $clientSecret
 * @param bool   $enableSandbox Sandbox mode toggle, true for test payments
 * @return \PayPal\Rest\ApiContext
 */
function getApiContext($clientId, $clientSecret, $enableSandbox = false)
{
    $apiContext = new ApiContext(
        new OAuthTokenCredential($clientId, $clientSecret)
    );

    $apiContext->setConfig([
        'mode' => $enableSandbox ? 'sandbox' : 'live'
    ]);

    return $apiContext;
}
