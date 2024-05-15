<?php

require "../../vendor/autoload.php";

use Infobip\Configuration;
use Infobip\Api\SmsApi;
use Infobip\Model\SmsDestination;
use Infobip\Model\SmsTextualMessage;
use Infobip\Model\SmsAdvancedTextualRequest;

function sendSms($number, $message) {
    $base_url = "https://43g1vp.api.infobip.com";
    $api_key = "dd820e2e0c49b2c8881f25675a4e7ca7-d4bde717-0fa8-408f-bb26-a9454d0c383c";
    
    // Set up configuration
    $configuration = new Configuration(host: $base_url, apiKey: $api_key);

    // Create SmsApi instance
    $api = new SmsApi(config: $configuration);

    // Create SMS message
    $destination = new SmsDestination(to: $number);
    $smsMessage = new SmsTextualMessage(
        destinations: [$destination],
        text: $message,
        from: "departement resultat"
    );

    // Create SMS request
    $request = new SmsAdvancedTextualRequest(messages: [$smsMessage]);

    // Send SMS
    try {
        $response = $api->sendSmsMessage($request);
        return "Message sent successfully.";
    } catch (Exception $e) {
        return "Error: " . $e->getMessage() . "\nException trace:\n" . $e->getTraceAsString();
    }
}

// Example usage
$number = $_POST["number"] ?? "1234567890";
$message = $_POST["message"] ?? "Hello World!";
echo sendSms($number, $message);
?>
