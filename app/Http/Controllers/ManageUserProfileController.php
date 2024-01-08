<?php

namespace App\Http\Controllers;

use App\Http\Requests\ManageUserProfile;
use App\Models\Bicycle;
use App\Models\User;
use Illuminate\Http\Request;

class ManageUserProfileController extends Controller
{
    function index()
    {
        $users = User::all(); //select * from user database

        return view(
            'ManageUserProfile.AddUserProfile',
            compact('users')
        );

        // $data_schedule = \App\Models\User::all();
        // $data_user = \App\Models\User::all();
        // $users = User::all();
        // return view('ManageUserProfile/AddUserProfile', ['user' => $users]);
    }


    public function display($id)
    {
        $users = User::find($id);
        $bicycles = Bicycle::all(); //ambik data dari bicycle untuk pamer kat user view

        // Initialize $bicycle before the loop
        $bicycle = null;
        $bicycleReturnDate = null;
        $color = null;
        $model = null;

        //display one by one so kena buat satu satu
        foreach ($bicycles as $bicycleItem) {
            if ($users->idnumber == $bicycleItem->matricid) {
                $bicycle = $bicycleItem->bicycleID;
                $bicycleReturnDate = $bicycleItem->bicycleReturnDate;
                $color = $bicycleItem->color;
                $model = $bicycleItem->model;

                // Assuming only one match is needed, you can break out of the loop here
                break;
            }
        }

        return view(
            'ManageUserProfile.ViewUserProfile',
            compact(
                'users',
                'bicycle',
                'bicycleReturnDate',
                'color',
                'model',
            ),
        );
    }


    //admin delete student
    public function delete($id)
    {
        $data = User::find($id);
        $data->delete($data);

        return redirect('/manageUserProfile');
    }

    //student view profile
    public function displaystudent($id)
    {
        $users = User::find($id);
        $bicycles = Bicycle::all(); //ambik data dari bicycle untuk pamer kat user view

        //display one by one so kena buat satu satu
        foreach ($bicycles as $bicycles => $value) {
            if ($users->idnumber == $value->matricid) {
                $bicycle = $value->bicycleID;
                $bicycleReturnDate = $value->bicycleReturnDate;
                $color = $value->color;
                $model = $value->model;
            }
        }

        return view(
            'ManageUserProfile.ProfileStudent',
            compact(
                'users',
                'bicycle',
                'bicycleReturnDate',
                'color',
                'model',
            ),
        );
    }

    public function edit($id)
    {
        $user = User::find($id);

        return view(
            'ManageUserProfile.EditUserProfile',
            compact('user'),
        );
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->update($request->all());

        return redirect('/' . $id . '/viewStudentProfile');
    }

    public function add()
    {
        $user = User::all();

        return view(
            'ManageUserProfile.AdminAddUserProfile',
            compact('user')
        );
    }

    function create(ManageUserProfile $request)
    {
        User::create([
            'name' => $request->input('name'),
            'idnumber' => $request->input('idnumber'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'password_confirmation' => $request->input('password_confirmation'),
            'type' => $request->input('type'),
        ]);

        return redirect('/manageUserProfile');

    }

    public function search()
    {
        $search_text = $_GET['query'];

        // : Bicycle::with('bicycleID')->get();
        // Query all bicycles if no search text is provided
        $users = $search_text = User::where('name', 'LIKE', '%'.$search_text.'%')
                        ->orWhere('idnumber', 'LIKE', '%' . $search_text . '%')
                        ->orWhere('resident', 'LIKE', '%' . $search_text . '%')
                        ->orWhere('year', 'LIKE', '%' . $search_text . '%')
                        ->get();

     return view('ManageUserProfile.AddUserProfile', compact('users'));
    }
}
