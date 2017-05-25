<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller
{
    /*// Peters mailchimp keys en listID
    private $apiKey = '5ea0382d7019111b5aa170d369bee4f6-us11';
    //  key number 2 edb8c93d45388229498845e2ad9eeda4-us11
    private $listID = '2d1e53d478';*/


    // keys corrospond with test acount , not peters acount.
    // username : jasperopstok
    // password : Fratsbal1!
    private $apiKey = '6f9fd4af7d2ae16d0d6d2686266c03ac-us15';
    private $listID = '0f1d25b386';

    public function __construct()
    {
        //$this->middleware('auth');

        $this->dataCenter = substr($this->apiKey, strpos($this->apiKey, '-') + 1);

    }

    public function showSubscriptionPageGET()
    {
        return view('subscription_page');
    }

    public function showSubscriptionPagePOST()
    {
        // error is also given in case of a non-complete post.
        if (!$this->validateInformation()) return view('subscription_page', ['message' => 'Uw emailadress is niet geldig. Als uw emailadress wel geldig is neem dan contact op met het Grafische Atelier.']);

        $httpCode = $this->addSubscription('subscribed');

        if ($httpCode == 200)
        {
            return view('subscription_page', ['message' => 'U bent succesvol geabonneerd.']);
        } else
        {
            switch ($httpCode)
            {
                // 400 isn't the default return error, but it is what i was consistently getting.
                case 400:
                    $msg = 'Dit email is al gebruikt om te abonneren. ';
                    return view('subscription_page', ['message' => $msg]);
                    break;
                default:
                    $msg = 'Een onverwachte fout is opgetreden, onze excusses. ';
                    return view('subscription_page', ['message' => $msg]);
                    break;
            }
        }
        return view('subscription_page', ['message' => 'Als u dit ziet ging er iets fout, neem contact op met Grafische Aterlier denbosch']);
    }

    public function showProfilePagePOST()
    {
        if (Auth::check())
        {
            // not sure how authentication works which multiple users having the same email, or name.
            $user = Auth::user();
            $url = 'https://' . $this->dataCenter . '.api.mailchimp.com/3.0/lists/' . $this->listID . '/members/' . md5(strtolower($user->email));

            if ($this->getStatus($user->email) != null)
            {
                // warning the default case is subscribed, which might not be entirely safe spam wise.
                $subFlag = false;
                if ($this->getStatus($user->email) == 'subscribed')
                {
                    $json = json_encode([
                        'status' => 'unsubscribed',
                    ]);
                    $subFlag = true;
                } else
                {
                    $json = json_encode([
                        'status' => 'subscribed',
                    ]);
                }

                $ch = curl_init($url);
                curl_setopt($ch, CURLOPT_USERPWD, 'SOQ:' . $this->apiKey);
                curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_TIMEOUT, 10);
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PATCH');
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
                $result = curl_exec($ch);
                $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                curl_close($ch);

                if ($httpCode == 200)
                {
                    if ($subFlag)
                    {
                        $_POST['wijzigen'] = 'U bent succesvol uitgeschreven ';

                    } else
                    {
                        $_POST['wijzigen'] = 'U bent succesvol geabonneerd ';
                    }
                    return app('App\Http\Controllers\ProfileController')->getProfile();
                } else
                {
                    $_POST['wijzigen'] = 'Er ging iets fout, probeer het later opnieuw.';
                    return app('App\Http\Controllers\ProfileController')->getProfile();
                }


            } else
            {
                // user doesn't have a last name.
                $_POST['email'] = $user->email;
                $_POST['firstName'] = $user->name;
                $_POST['lastName'] = '';

                $httpCode = $this->addSubscription('subscribed');

                if ($httpCode == 200)
                {
                    $_POST['wijzigen'] = 'U bent succesvol geabonneerd.';
                    return app('App\Http\Controllers\ProfileController')->getProfile();
                } else
                {
                    switch ($httpCode)
                    {
                        // 400 isn't the default return error, but it is what i was consistently getting.
                        case 400:

                            $_POST['wijzigen'] = 'Dit email is al gebruikt om te abonneren. ';
                            return app('App\Http\Controllers\ProfileController')->getProfile();
                            break;
                        default:

                            $_POST['wijzigen'] = 'Een onverwachte fout is opgetreden, onze excusses. ';
                            return app('App\Http\Controllers\ProfileController')->getProfile();
                            break;
                    }
                }
            }
        }

        return view('errors.404');
    }

    private function validateInformation()
    {
        if (!isset($_POST['email'], $_POST['firstName'], $_POST['lastName'])) return false;
        if (!preg_match('/[\w.\-_]+@\w+(.[a-z]+)+/', $_POST['email'])) return false;

        return true;
    }

    private function cleanData($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    public function getStatus($email)
    {

        $url = 'https://' . $this->dataCenter . '.api.mailchimp.com/3.0/lists/' . $this->listID . '/members/' . md5(strtolower($email));

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_USERPWD, 'SOQ:' . $this->apiKey);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $result = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($httpCode == 200) return json_decode($result, true)['status'];

        return null;
    }

    // return 200 on succes and 400 on email already in use
    public function addSubscription($status = null)
    {
        if ($status == 'subscribed' || $status == 'unsubscribed')
        {
            $tempStatus = $status;
        } else
        {
            $tempStatus = 'unsubscribed';
        }
        // error is also given in case of a non-complete post.
        $url = 'https://' . $this->dataCenter . '.api.mailchimp.com/3.0/lists/' . $this->listID . '/members';

        $json = json_encode([
            'email_address' => $this->cleanData($_POST['email']),
            'status' => $tempStatus,
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

        return $httpCode;
    }


}