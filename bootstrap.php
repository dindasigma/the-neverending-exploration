<?php
date_default_timezone_set('Asia/Jakarta');

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
$loader = new \Twig\Loader\FilesystemLoader(__DIR__.'/templates');
$twig = new \Twig\Environment($loader, [
    'cache' => __DIR__.'/cache',
]);

// add global variabel in meta
// $twig->addGlobal('text', new Text());

function read($range) {
  global $service;
  
  $response = $service->spreadsheets_values->get(SPREEDSHEET_ID, $range);
  $values = $response->getValues();
  if (!empty($values)) {
    return $values;
  }
  return false;
}