<?php

/**
 * WECOP
 *
 * @author fperezm1
 * PHP version: 8.0.2
 */

namespace App\Http\Controllers;

use App\Models\School;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Auth;

/**
 * Class SchoolController
 *
 * @package App\Http\Controllers
 */
class SchoolController extends Controller
{

    public function show($id)
    {
        $data = []; //to be sent to the views

        $school = School::findOrFail($id);
        $data['school'] = $school;
        $data['title'] = $school->getTitle();

        return view('school.show')->with('data', $data);
    }

    public function save(Request $request)
    {
        School::validate($request);

        $user = User::findOrFail(Auth::user()->getId());
        $school = new School();
        $school->nombre = $request['nombre'];
        $school->comuna = $request['comuna'];
        $school->carrera = $request['carrera'];
        $school->user_id = $user->getId();
        $school->created_at = date('Y-m-d H:i:s');
        $school->save();

        $message = Lang::get('messages.succesfull');
        return back()->with('success', $message);
    }

    public function sendmail()
    {

        $message = Lang::get('messages.succesfull_mail');
        return back()->with('success', $message);
    }
}
