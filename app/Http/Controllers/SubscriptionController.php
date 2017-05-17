<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    // keys corrospond with test acount , not peters acount.
    private $apiKey = '6f9fd4af7d2ae16d0d6d2686266c03ac-us15';
    private $listID = '0f1d25b386';

    public function __construct()
    {
        //$this->middleware('auth');

        $this->dataCenter = substr($this->apiKey, strpos($this->apiKey, '-') + 1);

    }

//  md5(strtolower('Test@test.nl'))

    public function showSubscriptionPage()
    {
        return view('subscription_page');
    }

    public function addSubscription()
    {
        // error is also given in case of a non-complete post.
        if (!$this->validateInformation()) return view('subscription_page', ['Message' => 'Uw emailadress is niet geldig. Als uw emailadress wel geldig is neem dan contact op met het Grafische Atelier.']);

        $url = 'https://' . $this->dataCenter . '.api.mailchimp.com/3.0/lists/' . $this->listID . '/members';

        $json = json_encode([
            'email_address' => $this->cleanData($_POST['email']),
            'status' => 'subscribed',
            'merge_fields' => [
                'FNAME' => $this->cleanData($_POST['firstName']),
                'LNAME' => $this->cleanData($_POST['lastName'])
            ]
        ]);

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_USERPWD, 'SOQ:' . $this->apiKey);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
        $result = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($httpCode == 200)
        {
            return view('subscription_page', ['Message' => 'U bent succesvol geaboneerd.']);
        } else
        {
            switch ($httpCode)
            {
                // 400 isn't the default return error, but it is what i was consistently getting.
                case 400:
                    $msg = 'Dit email is al gebruikt om te aboneren. ';
                    return view('subscription_page', ['Message' => $msg]);
                    break;
                default:
                    $msg = 'Een onverwachte fout is opgetreden, onze excusses. ';
                    return view('subscription_page', ['Message' => $msg]);
                    break;
            }
        }
        return view('subscription_page', ['Message' => 'Als u dit ziet ging er iets fout, neem contact op met Grafische Aterlier denbosch']);
    }

    public function endSubscription()
    {

    }

    public function activateSubscription()
    {

    }

    private function validateInformation()
    {
        if (!isset($_POST['email'], $_POST['firstName'], $_POST['lastName'])) return false;
        if (!preg_match('/[\w.\-_]+@\w+(.[a-z]+)+/', $_POST['email'])) return false;

        return true;
    }

    function cleanData($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}