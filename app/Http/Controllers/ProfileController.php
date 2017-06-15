<?php

namespace App\Http\Controllers;

use App\Course;
use App\User;
use App\IndividualReservation;
use Illuminate\Http\Request;
use Auth;
use Redirect;
use Hash;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function getProfile()
    {
        if (!Auth::check())
        {
            return Redirect::to('login');
        }
        else
        {
            switch (Auth::user()->role)
            {
                case "admin":
                    $role = "Administrator";
                    break;
                default:
                    $role = "Gebruiker";
                    break;
            }
            //Get reserved tables
            $date = date('Y-m-d H:i:s');
            $reservedTables = DB::table('individual_reservations')->where('user_id', Auth::user()->id)->where('end_date', '>', $date)->get();
            //get signed up courses
            $courses = DB::table('courses_has_users')->where('user_id', Auth::user()->id)->get();
            $signedupCourses = array();
            foreach ($courses as $course)
            {
                $matchingCourse = Course::find($course->course_id);
                if ($matchingCourse->end_date > $date)
                {
                    array_push($signedupCourses, $matchingCourse);
                }
            }

            $userinfo = array(
                'username' => Auth::user()->username,
                'role' => $role,
                'mail' => Auth::user()->email,
                'address' => Auth::user()->address,
            );

            $subscriptionStatus = app('App\Http\Controllers\SubscriptionController')->getStatus($userinfo['mail']);

            if (isset($_POST['wijzigen']))
            {
                $subscriptionText = $_POST['wijzigen'];
            }
            else
            {
                $subscriptionText = null;
            }


            return view('profile', compact('userinfo', "reservedTables", "signedupCourses", 'subscriptionStatus', 'subscriptionText'));
        }
    }

    public function getChangePassword()
    {
        if (!Auth::check())
        {
            return Redirect::to('login');
        }
        else
        {
            return view('change_password');
        }
    }

    public function changePassword()
    {
        if (!Auth::check())
        {
            return Redirect::to('login');
        }
        else
        {
            $currentPassword = Auth::User()->password;
            if (Hash::check($_POST['current_password'], $currentPassword))
            {
                if (strlen($_POST['new_password']) < 6)
                {
                    $error = "het wachtwoord moet minimaal 6 tekens bevatten";
                    return view('change_password', compact('error'));
                }

                if ($_POST['new_password'] == $_POST['confirmation_password'])
                {
                    $userId = Auth::User()->id;
                    $userObj = User::find($userId);
                    $userObj->password = Hash::make($_POST['new_password']);
                    $userObj->save();

                    return Redirect::to('profiel');
                }
                else
                {
                    $error = "Het bevestigde wachtwoord kwam niet overeen met het nieuwe wachtwoord";
                    return view('change_password', compact('error'));
                }
            }
            else
            {
                $error = "Uw huidig wachtwoord was niet juist";
                return view('change_password', compact('error'));
            }

        }
    }


    public function getProfileEditor()
    {
        if (!Auth::check())
        {
            return Redirect::to('login');
        }
        else
        {
            $userinfo = array(
                'username' => Auth::user()->username,
                'mail' => Auth::user()->email,
                'address' => Auth::user()->address
            );
        }
        return view('profile_editor', compact('userinfo'));
    }

    public function editProfile()
    {
        if (!Auth::check())
        {
        }
        else
        {
            $user_id = Auth::user()->id;
            $user = User::find($user_id);

            if (Hash::check($_POST['password'], $user->password))
            {

                // change information in MailChimp
                $newInfo = ['email' => $_POST['mail'], 'firstname' => $user->first_name, 'lastname' => $user->last_name];
                $oldEmail = $user->email;
                $httpCode = app('App\Http\Controllers\SubscriptionController')->changeSubscriberInfo($oldEmail, $newInfo);

                // change information is database
   
                $user->username = $_POST['username'];
                $user->address = $_POST['address'];
                $user->save();
                return Redirect::to('profiel');
            }
            else
            {
                $userinfo = array(
                    $error = "Voer het juiste wachtwoord in",
                    'mail' => Auth::user()->email,
                    'username' => Auth::user()->username,
                    'address' => Auth::user()->address
                );

                return view('profile_editor', compact('error', 'userinfo'));
            }

        }
    }

    public function alterReservation()
    {

        if (!isset($_POST['submit']) || ($_POST['submit'] != 'Opzeggen' && $_POST['submit'] != 'Uitschrijven')) return Redirect::to('403');

        if ($_POST['submit'] == 'Opzeggen')
        {
            if (!Auth::check()) return Redirect::to('login');
            if (!isset($_POST['id'])) return Redirect::to('403');

            $user = Auth::user();
            $reservation = IndividualReservation::where('id', $_POST['id'])->where('user_id', $user->id)->firstOrfail();
            if ($reservation == null) return Redirect::to('profile');

            $reservation->delete();

            return $this->getProfile();
        }
        else if ($_POST['submit'] == 'Uitschrijven')
        {
            if (!Auth::check()) return Redirect::to('login');
            if (!isset($_POST['id'])) return Redirect::to('403');

            $course = Course::where('id', $_POST['id'])->firstOrfail();

            if ($course == null) return Redirect::to('profile');

            $userList = $course->reservations;

            foreach ($userList as $user)
            {
                if ($user->id == Auth::user()->id)
                {
                    $user->pivot->delete();
                    break;
                }
            }

            return $this->getProfile();
        }

    }

    public function editReservation($error_message = null)
    {
        if (!Auth::check()) return Redirect::to('login');
        if (!isset($_POST['id'])) return Redirect::to('403');

        $user = Auth::user();
        $reservation = IndividualReservation::first()->where('id', $_POST['id'])->where('user_id', $user->id)->firstOrfail();
        $date = '';
        $start = '';
        $end = '';

        if ($reservation == null) $error = 'Uw reservering kon niet gevonden worden.';
        else
        {
            $error = 'U wijzigt uw reservering op Tafel ' . $reservation->table->id . " " . $reservation->table->tech->name;

            $date = substr($reservation->start_date, 0, 10);
            $start = substr($reservation->start_date, 11, 5);
            $end = substr($reservation->end_date, 11, 5);
        }

        if ($error_message != null) $error = $error_message;

        return view('edit_reservation', ['error' => $error, 'date' => $date, 'start' => $start, 'end' => $end, 'id' => $reservation->id]);

    }

    public function editReservationAction()
    {
        if (!Auth::check()) return Redirect::to('login');
        if (!isset($_POST['id']) || !isset($_POST['date']) || !isset($_POST['start_time']) || !isset($_POST['end_time'])) return Redirect::to('403');

        $user = Auth::user();
        $reservation = IndividualReservation::first()->where('id', $_POST['id'])->where('user_id', $user->id)->firstOrfail();

        if ($reservation == null) return Redirect::to('403');

        $date = $_POST['date'];
        $start = $_POST['start_time'];
        $end = $_POST['end_time'];

        $startDate = $date . " " . $start . ":00";
        $endDate = $date . " " . $end . ":00";

        $status = app('App\Http\Controllers\ReservationController')->reservationValidation($reservation, $startDate, $endDate);

        if ($status == null)
        {
            $reservation->start_date = $startDate;
            $reservation->end_date = $endDate;
            $reservation->save();
        }
        else
        {
            $error = 'Deze tafel is al gereserveerd van ' . substr($status['start'], 11, 5) . ' tot ' . substr($status['end'], 11, 5);
            return $this->editReservation($error);
        }

        return $this->getProfile();
    }


}
