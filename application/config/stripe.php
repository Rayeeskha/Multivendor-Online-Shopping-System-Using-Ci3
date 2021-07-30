<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
| -------------------------------------------------------------------
|  Stripe API Configuration
| -------------------------------------------------------------------
|
| You will get the API keys from Developers panel of the Stripe account
| Login to Stripe account (https://dashboard.stripe.com/)
| and navigate to the Developers » API keys page
|
|  stripe_api_key        	string   Your Stripe API Secret key.
|  stripe_publishable_key	string   Your Stripe API Publishable key.
|  stripe_currency   		string   Currency code.
*/
$config['stripe_api_key']         = 'sk_test_51H6HA0GMW3necuA7kTBE3KJa4mw3NCa2B9dUPPcGn1Nd5VDxyPpyYsnR9cinhcyUpkJKgymgxL6vzmkA5c8WbNUi00vLAW6hCG'; 
$config['stripe_publishable_key'] = 'pk_test_51H6HA0GMW3necuA7yPFvnVm8dzQVltaVUJEf4yyNmiI1NIVRZNsTTRSblt7KwInbQYZ0Q9mOTmY6g7cZxi8QfTqT00SCCFfu7E'; 
$config['stripe_currency']        = 'inr';