<?php
require '../config.php';

require_once('../vendor/autoload.php');   // Path to autoload.php from Composer

\Stripe\Stripe::setApiKey('sk_test_51OKVxHHB6lE88qCI4jmq5u5lrvyyHNz0Nh12kRbOYgXYOrJOENUu9cpjsFpm26eMJnXhKJyRom8y0bsVJl62oThX00yABVLHxu');

class PaymentController {
    public function handlePayment() {
        try {
            $charge = \Stripe\Charge::create([
                'amount' => 2000, // Amount in cents
                'currency' => 'usd',
                'source' => 'tok_visa', // Use a token generated by Stripe.js or Elements
                'description' => 'Example charge',
            ]);
            // Handle successful charge
            echo "Payment successful!";
        } catch (\Stripe\Exception\CardException $e) {
            // Handle card error
            echo "Card declined.";
        } catch (\Stripe\Exception\RateLimitException $e) {
            // Handle rate limit error
            echo "Rate limit exceeded.";
        } catch (\Stripe\Exception\InvalidRequestException $e) {
            // Handle invalid request error
            echo "Invalid request.";
        } catch (\Stripe\Exception\AuthenticationException $e) {
            // Handle authentication error
            echo "Authentication failed.";
        } catch (\Stripe\Exception\ApiConnectionException $e) {
            // Handle API connection error
            echo "API connection failed.";
        } catch (\Stripe\Exception\ApiErrorException $e) {
            // Handle generic API error
            echo "An error occurred.";
        }
    }
}