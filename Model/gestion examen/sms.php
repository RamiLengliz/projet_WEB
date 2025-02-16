<?php

require "../../vendor/autoload.php";

use Infobip\Configuration;
use Infobip\Api\SmsApi;
use Infobip\Model\SmsDestination;
use Infobip\Model\SmsTextualMessage;
use Infobip\Model\SmsAdvancedTextualRequest;

$code = filter_input(INPUT_GET, 'code', FILTER_SANITIZE_SPECIAL_CHARS);
$phone = filter_input(INPUT_GET, 'phone', FILTER_SANITIZE_SPECIAL_CHARS);

function sendSms($number, $message) {
    $base_url = "43g1vp.api.infobip.com";
    $ip_address = "193.105.74.159"; // IP address from DNS resolution
    $api_key = "a9818798e94baf26a2c3d0edcf2e9635-b7c26f6a-d4b5-4c68-9fd4-43818aa29afe"; // Replace this with a secure method of retrieving the API key
    
    $url = "https://$ip_address/sms/2/text/advanced";

    $postData = [
        'messages' => [
            [
                'destinations' => [['to' => $number]],
                'from' => 'Proschool',
                'text' => $message
            ]
        ]
    ];

    $headers = [
        'Authorization: App ' . $api_key,
        'Content-Type: application/json',
        'Accept: application/json',
        'Host: ' . $base_url
    ];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Disable SSL verification
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); // Disable SSL host verification
    
    $response = curl_exec($ch);
    $curl_error = curl_error($ch);
    curl_close($ch);

    if ($response === false) {
        return "cURL Error: " . $curl_error;
    }

    return "Message sent successfully. Response: " . $response;
}

// Example usage
$number = $_POST["number"] ?? "+21699137937"; // Default number for testing
$message = $_POST["message"] ?? "Hello this is your code {$code}";
echo sendSms($phone, $message);
// DNS resolution check for debugging
$hostname = '43g1vp.api.infobip.com';
$ip = gethostbyname($hostname);

if ($ip == $hostname) {
    echo "DNS resolution failed.";
} else {
    echo "DNS resolution is successful. IP: $ip";
}

?>
