<?php
date_default_timezone_set('Asia/Bangkok');

// Load our autoloader
require_once __DIR__.'/vendor/autoload.php';

// Load our config file
require_once __DIR__.'/config.php';

// Authorized API client
$client = new \Google_Client();
$client->setApplicationName(APPLICATION_NAME);
$client->setScopes(Google_Service_Sheets::SPREADSHEETS);
$client->setAuthConfig(CREDENTIAL_URL);
$client->setAccessType('offline');

// Construct the service object
$service = new Google_Service_Sheets($client);

// Specify our Twig templates location
$loader = new Twig_Loader_Filesystem(__DIR__.'/templates');

// Instantiate our Twig
$twig = new Twig_Environment($loader);

function read($range) {
	global $service;
	
	$response = $service->spreadsheets_values->get(SPREEDSHEET_ID, $range);
	$values = $response->getValues();
	if (!empty($values)) {
		return $values;
	}
	return false;
}