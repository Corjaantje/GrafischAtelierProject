<?php

namespace App\Http\Controllers;

use App\Course;
use App\Courses_has_user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Auth;

class CoursesController extends Controller
{
    /** Returns the main course pages which has buttons to the other subcourse pages*/
    public function createList()
    {
        return view('cms.courses.cms_list_courses');
    }

    /** Returns the course subpage for creating a new course*/
    public function createAdd()
    {
        return view('cms.courses.cms_add_courses');
    }

    /** Returns the course subpage for editing an existing course*/
    public function createEdit()
    {
        return view('cms.courses.cms_edit_courses');
    }

    /** Gets all the data from the POST variable and updates the database*/
    public function editAction()
    {

        if ($this->validateForm())
        {

            Course::Where('id', '=', $_POST['id'])->update(
                ['name' => $_POST['name'],
                    'description' => $_POST['description'],
                    'coursegiver_name' => $_POST['coursegiver_name'],
                    'max_signups' => $_POST['max_signups'],
                    'price' => $_POST['price'],
                    'start_date' => date('Y-m-d H:i:s', strtotime($_POST['start_date'])),
                    'end_date' => date('Y-m-d H:i:s', strtotime($_POST['end_date'])),
                    'visible' => isset($_POST['visible'])]
            );
            return Redirect::to('cms/cursus');
        } else
        {
            //not properly working yet
            //return Redirect::back()->withInput();
        }

        return Redirect::to('cms/cursus');
    }

    private function validateForm()
    {

        $isValid = true;

        if (isset($_POST['name']))
        {

            if (!(strlen($_POST['name']) > 0))
            {
                $isValid = false;
            }

        } else
        {
            $isValid = false;
        }

        if (isset($_POST['coursegiver_name']))
        {

            if (!(strlen($_POST['coursegiver_name']) > 0))
            {
                $isValid = false;
            }

        } else
        {
            $isValid = false;
        }

        if (isset($_POST['max_signups']))
        {

            if (!($_POST['max_signups'] > -1))
            {
                $isValid = false;
            } else
            {

                if ($_POST['max_signups'] == 0)
                {
                    $_POST['max_signups'] = null;
                }

            }

        } else
        {
            $isValid = false;
        }

        if (isset($_POST['price']))
        {

            if (!($_POST['price'] > -1))
            {
                $isValid = false;
            }

        } else
        {
            $isValid = false;
        }

        return $isValid;
    }

    public function createAddConfirmation(Request $request)
    {
        return view('cms.courses.cms_add_courses_confirmation', ['request' => $request]);
    }

    /**
     * @param \DateTime $input
     * parses the input to a string that can be used as value for a datetime-local form
     * @return string
     */
    public function prepareDatetime($input)
    {

        $pieces = explode(" ", $input);

        $date = $pieces[0];

        $time = substr($pieces[1], 0, -3);

        $datetime = $date . "T" . $time;

        return $datetime;
    }

    public function setAdd()
    {
        Course::Insert(
            ['name' => $_POST['course_name'],
                'description' => $_POST['description'],
                'coursegiver_name' => $_POST['coursegiver_name'],
                'max_signups' => $_POST['max_people'],
                'price' => $_POST['price'],
                'start_date' => $_POST['date'] . ' ' . $_POST['start_time'] . ':00',
                'end_date' => $_POST['date'] . ' ' . $_POST['end_time'] . ':00',
                'visible' => isset($_POST['visible'])]
        );
        return Redirect::to('cms/cursus');
    }

    public function createCoursesPage()
    {
        return view('courses');
    }

    public function createCourseReservationPage()
    {
        if (isset($_POST['id']))
        {

            $course = Course::find($_POST['id']);

            $controller = new CoursesController();

            if (!Auth::check()) redirect('login');
            if ($course != null)
            {
                return view('course_reservation', ['course' => $course, 'controller' => $controller]);
            }
        }
        $this->createCoursesPage();
    }


    public
    function deleteAction()
    {
        Course::destroy($_POST['id']);
        return Redirect::to('cms/cursus');
    }

    public
    function insertUserIntoCourse()
    {
        $courseID = $_POST['id'];
        $course = \App\Course::find($courseID);
        $maxSignups = $course->max_signups;
        $currentSignups = Courses_has_user::Where('course_id', '=', $courseID)->count();

        if (Auth::user()->role == 'admin')
        {
            if (Courses_has_user::where([
                    ['user_id', '=', Auth::user()->id],
                    ['course_id', '=', $courseID]
                ])->count() === 0
            )
            {
                Courses_has_user::Insert(
                    [
                        'course_id' => $courseID,
                        'user_id' => Auth::user()->id
                    ]
                );
                return Redirect::to('cursussen');
            } else
            {
                return Redirect::to('error');
            }
        } else
        {
            if ($currentSignups < $maxSignups &&
                Courses_has_user::where([
                    ['user_id', '=', Auth::user()->id],
                    ['course_id', '=', $courseID]
                ])->count() === 0
            )
            {
                Courses_has_user::Insert(
                    [
                        'course_id' => $courseID,
                        'user_id' => Auth::user()->id
                    ]
                );
                return Redirect::to('cursussen');
            } else
            {
                return Redirect::to('404');
            }
        }
    }
}
