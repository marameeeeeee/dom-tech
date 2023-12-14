<?php

// Include the Stripe configuration file


require_once '../configstripe.php';
require_once '../config.php';
require_once '../vendor/autoload.php';
// Include the Stripe PHP SDK library

// Set API key
\Stripe\Stripe::setApiKey( STRIPE_SECRET_API_KEY );

// Set content type to JSON
header( 'Content-Type: application/json' );

// Retrieve JSON from POST body
$jsonStr = file_get_contents( 'php://input' );
$jsonObj = json_decode( $jsonStr );
?>