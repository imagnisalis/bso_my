<?php

use Laminas\Http\Client;
use Laminas\Http\ClientStatic;

require_once '../vendor/autoload.php';

global $embedToken;
global $embedUrl;
global $reportId;
global $groupId;
global $accessToken;
global $datasetId;

// Declare variables for tenant ID, client ID, and group ID, as well as the client secret and the report ID
$tenantId = '34aec727-a2f5-40e3-be3a-15695c423c9a';
$clientId = '94619f3b-206a-4926-ad93-00f09d39c84d';
$clientSecret = 'Pk~8Q~oGfs0WEozOCq1jjYahjANjcgp5CIyGGbLH';
$groupId = '3a5b2f86-478e-4722-a9ed-fc7ef2ec94ab';
$reportId = '3be6ccd5-020c-4230-b793-eb4526c8a7dc';

//$datasetId = 'f5eb5d53-630e-44e1-87bd-10498f597cea';
//$datasetWorkspaceId = '3a5b2f86-478e-4722-a9ed-fc7ef2ec94ab';

//Note: the keys are hidden with '*' character.

////// Phase 1. to Authenticate and get the Access Token to the App
$response = ClientStatic::post(
    'https://login.microsoftonline.com/' . $tenantId . '/oauth2/v2.0/token',
    [
        'grant_type' => 'client_credentials',
        'client_id' => $clientId,
        'client_secret' => $clientSecret,
        'scope' => 'https://analysis.windows.net/powerbi/api/.default',
    ],
);


$jsonResponse = json_decode($response->getContent(), true);
echo "json response:".$jsonResponse."<br>";
echo "<br>";

//// Response
// Get Access Token
$accessToken = $jsonResponse['access_token'];
///////
echo "accesstoken:".$accessToken."<br>";

////// Phase 2. GET to take embeded url, datasets, targetWorkspaces
$emdedReportResponse = ClientStatic::get(
    'https://api.powerbi.com/v1.0/myorg/groups/' . $groupId . '/reports/'.$reportId .' ',
    [],
    [
        'Authorization' => 'Bearer ' . $accessToken,
        'Content-Type' => 'application/json',
    ]
);
echo "emdedReportResponse:".$emdedReportResponse."<br>";
///// Response
$embedReport = json_decode($emdedReportResponse->getBody(), true);
echo "embedReport:".$embedReport."<br>";

$datasetId = $embedReport['datasetId'];
echo "datasetId:".$datasetId."<br>";
$targetWorkspaceId = $embedReport['datasetWorkspaceId'];
echo "targetWorkspaceId:".$targetWorkspaceId."<br>";
$embedUrl = $embedReport["embedUrl"];
echo "embedUrl:".$embedUrl."<br>";
/////////


////// Phase 3. POST to Generate the embeded Token
// Get embedded token
$embedTokenResponse = new Client();
$embedTokenResponse->setUri('https://api.powerbi.com/v1.0/myorg/GenerateToken');
$embedTokenResponse->setMethod('POST');
$embedTokenResponse->setHeaders(['Content-Type' => 'application/json', 'Authorization' => 'Bearer ' . $accessToken]);
$embedTokenResponse->setRawBody('{
  "datasets": [
    {
      "id": "'. $datasetId .'"
    }
  ],
  "reports": [
    {
      "allowEdit": false,
      "allowCreate": false,
      "id": "'. $reportId .'"
    }
  ],
  "targetWorkspaces": [
    {
      "id": "'. $targetWorkspaceId .'"
    }
  ]
}"');

///// Response
$embedTokenResult = $embedTokenResponse->send();
$embedToken = json_decode($embedTokenResult->getBody())->token;