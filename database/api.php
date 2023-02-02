<?php
require_once "database-config.php";

use Laminas\Http\Client;

global $groupId;
global $accessToken;
global $datasetId;
global $conditions;

function getIndicatorsOfaDomain($groupId, $datasetId, $accessToken, $domain) {
    $executeQueriesInGroup = new Client();
    $executeQueriesInGroup->setUri('https://api.powerbi.com/v1.0/myorg/groups/' . $groupId . '/datasets/'. $datasetId .'/executeQueries');
    $executeQueriesInGroup->setMethod('POST');
    $executeQueriesInGroup->setHeaders(['Content-Type' => 'application/json', 'Authorization' => 'Bearer ' . $accessToken]);
    $executeQueriesInGroup->setRawBody('{
    "queries": [
        {
        "query": "EVALUATE(DISTINCT(SELECTCOLUMNS(FILTER(\'ALL\',\'ALL\'[Domain] = \"'. $domain .'\"), \"Indicator\",[Indicator])))"
        }
    ]
    }');

    $executeQueriesInGroupResult = $executeQueriesInGroup->send();
    $executeQueriesInGroupResultJSON = $executeQueriesInGroupResult->getBody();

    return json_decode($executeQueriesInGroupResultJSON);
}