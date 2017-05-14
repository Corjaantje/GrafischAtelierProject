<?php
session_start();

// MailChimp API credentials
$apiKey = '6f9fd4af7d2ae16d0d6d2686266c03ac-us15';
$listID = '0f1d25b386';

// MailChimp API URL

$dataCenter = substr($apiKey, strpos($apiKey, '-') + 1);
$url = 'https://' . $dataCenter . '.api.mailchimp.com/3.0/lists/' . $listID. '/members/'. md5(strtolower('Test@test.nl'));

// member information
$json = json_encode([
    'email_address' => 'test@gmail.com',
    'status' => 'subscribed',
    'merge_fields' => [
        'FNAME' => 'test joson',
        'LNAME' => 'MCfee'
    ]
]);

// send a HTTP POST request with curl
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_USERPWD, 'user:' . $apiKey);
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
$result = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

// store the status message based on response code
if ($httpCode == 200)
{
    echo '<p style="color: #34A853">You have successfully subscribed to CodexWorld.</p>';
} else
{
    switch ($httpCode)
    {
        case 214:
            $msg = 'You are already subscribed.';
            break;
        default:
            $msg = 'Some problem occurred, please try again.';
            break;
    }
    echo '<p style="color: #EA4335">' . $msg . ' --- ' . $httpCode . '</p>';
}

var_dump($result);
// redirect to homepage
header('location:index.php');
?>
