<?php

namespace App\Http\Controllers;

use App\Models\Bicycle;
use App\Models\User;
use Illuminate\Http\Request;

class ManageBicycleController extends Controller
{
    function index()
    {
        $bicycles = Bicycle::all(); //select * from user database

        return view(
            'ManageBicycle.ViewBicycle',
            compact('bicycles')
        );
    }

    function add()
    {
        Bicycle::whereNotNull('matricid')->get()->pluck('matricid')->toArray();
        $users = User::where('type','student')->get();
        // Get the maximum complaint number from the database
        $maxBicycle = Bicycle::max('id');
        // Increment the maximum complaint number to get the new complaint number
        $newBicycleNumber = $maxBicycle + 1;
        // Determine the number of digits needed for the complaint number
        $numDigitsBicycle = strlen((string)$newBicycleNumber);
        // Calculate the padding based on the desired length (e.g., 4 digits)
        $paddingBicycle = max(0, 4 - $numDigitsBicycle);
        // Format the complaint number as C0001, C0011, etc.
        $newBicycleID = 'B' . str_repeat('0', $paddingBicycle) . $newBicycleNumber;

        return view(
            'ManageBicycle.AddBicycle',
            compact('users', 'newBicycleID'),
        );
    }

    public function create(Request $request)
    {
        // Get the maximum bicycle number from the database
        $maxBicycle = Bicycle::max('id');

        // Increment the maximum bicycle number to get the new bicycle number
        $newBicycleNumber = $maxBicycle + 1;

        // Determine the number of digits needed for the bicycle number
        $numDigitsBicycle = strlen((string)$newBicycleNumber);

        // Calculate the padding based on the desired length (e.g., 4 digits)
        $paddingBicycle = max(0, 4 - $numDigitsBicycle);

        // Format the bicycle number as B0001, B0011, etc.
        $newBicycleID = 'B' . str_repeat('0', $paddingBicycle) . $newBicycleNumber;

        // Handle file upload
        $imageName = null;
        if($request->file('image')){
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images/bicycleImages'), $imageName);
        }

        // Create a new bicycle with the generated bicycle ID
        Bicycle::create([
            'bicycleID' => $newBicycleID,
            'model' => $request->input('model'),
            'color' => $request->input('color'),
            'status' => $request->input('status'),
            'matricid' => $request->input('matricid'),
            'bicycleBorrowDate' => $request->input('bicycleBorrowDate'),
            'bicycleReturnDate' => $request->input('bicycleReturnDate'),
            "bicycleImage" => $imageName
        ]);

        return redirect('/manageBicycle');
    }

    public function delete($id)
    {
        $bicycles = Bicycle::find($id);
        $bicycles->delete($bicycles);

        return redirect('/manageBicycle');
    }

    public function edit($id)
    {
        $bicycle = Bicycle::find($id);
        $users = User::where('type','student')->get();

        return view(
            'ManageBicycle.EditBicycle',
            compact('bicycle', 'users'),
        );
    }

    public function update(Request $request, $id)
    {
        $imageName = null;

        if($request->file('bicycleImage')){
            $imageName = time().'.'.$request->bicycleImage->extension();
            $request->bicycleImage->move(public_path('images/bicycleImages'), $imageName);
        }

        $bicycles = Bicycle::find($id);

        if($request->status == '--Select Status--' || $request->status == 'Available'){
            $bicycles->update([
                "model" => $request->model,
                "color" => $request->color,
                "status" => $request->status,
                "matricid" => null,
                "bicycleBorrowDate" => $request->bicycleBorrowDate,
                "bicycleReturnDate" => $request->bicycleReturnDate,
                "bicycleImage" => $imageName ? $imageName : $bicycles->bicycleImage
            ]);
        }else{
            $bicycles->update([
                "model" => $request->model,
                "color" => $request->color,
                "status" => $request->status,
                "matricid" => $request->matricid,
                "bicycleBorrowDate" => $request->bicycleBorrowDate,
                "bicycleReturnDate" => $request->bicycleReturnDate,
                "bicycleImage" => $imageName ? $imageName : $bicycles->bicycleImage
            ]);
        }


        return redirect('/manageBicycle');
    }

    public function search()
    {
        $search_text = $_GET['query'];

        // : Bicycle::with('bicycleID')->get();
        // Query all bicycles if no search text is provided
        $bicycles = $search_text = Bicycle::where('model', 'LIKE', '%'.$search_text.'%')
                        ->orWhere('status', 'LIKE', '%' . $search_text . '%')
                        ->orWhere('color', 'LIKE', '%' . $search_text . '%')
                        ->orWhere('bicycleID', 'LIKE', '%' . $search_text . '%')
                        ->get();

        return view('ManageBicycle.ViewBicycle', compact('bicycles'));
    }


}
