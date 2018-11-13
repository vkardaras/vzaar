<?php
    require '../lib/vzaar.php';

    VzaarApi\Client::$client_id = 'bond-alum-woods';
    VzaarApi\Client::$auth_token = 'H7s2zeeucaBqx3UhBEow';

    // uncomment if you want to target local environment
    // VzaarApi\Client::$url = 'http://app.vzaar.localhost/api';

    //outputs equest/response details
    //VzaarApi\Client::$VERBOSE = true;

    // Update these values to match ones from your own account.
    $category_id = 3206;
    $encoding_preset_id = 3;
    $default_ingest_recipe = 67;
    $other_ingest_recipe = 73;

?>
