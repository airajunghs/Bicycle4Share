<?php

namespace App\Http\Controllers;

use App\Models\Bicycle;
use App\Models\Complaint;
use App\Models\Complaints;
use App\Models\Penalties;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManageComplaintController extends Controller
{
    function index()
    {
        //complaints sama dengan nama database migration complaints, kacau database dan model, need to migrate
        if(Auth::user()->type == 'admin'){
            $complaints = Complaints::all();
        }else{
            $complaints = Complaints::where('StudentID',Auth::user()->idnumber)->get();
        }


        return view(
            'ManageComplaint.ViewComplaintStudent',
            compact('complaints')
        );
    }

    function add()
    {
        $complaints = Complaints::all();
        $bicycles = Bicycle::all();

        return view(
            'ManageComplaint.AddComplaint',
            compact('complaints', 'bicycles'),
        );
    }

    public function create(Request $request)
    {
        // Get the maximum complaint number from the database
        $maxComplaint = Complaints::max('id');
        $maxPenalty = Penalties::max('id');

        // Increment the maximum complaint number to get the new complaint number
        $newComplaintNumber = $maxComplaint + 1;
        $newPenaltyNumber = $maxPenalty + 1;

        // Determine the number of digits needed for the complaint number
        $numDigits = strlen((string)$newComplaintNumber);
        $numDigitsPenalty = strlen((string)$newPenaltyNumber);

        // Calculate the padding based on the desired length (e.g., 4 digits)
        $padding = max(0, 4 - $numDigits);
        $paddingPenalty = max(0, 4 - $numDigitsPenalty);

        // Format the complaint number as C0001, C0011, etc.
        $newComplaintID = 'C' . str_repeat('0', $padding) . $newComplaintNumber;
        $newPenaltyID = 'P' . str_repeat('0', $paddingPenalty) . $newPenaltyNumber;

        $userId = Auth::user()->id;

        $bicycle = Bicycle::where('bicycleID',$request->input('bicycleID'))->first();
        if($bicycle){
            $student = User::where('idnumber', $bicycle->matricid)->first();
            if($student){
               // Create a new complaint with the generated complaint ID
                Complaints::create([
                    //'PenaltyID' => $newPenaltyID,
                    'StudentID' => $student->idnumber,
                    'userID' => $userId,
                    'bicycleID'=> $request->input('bicycleID'),
                    'complaintID' => $newComplaintID,
                    'currentDate' => $request->input('currentDate'),
                    'currentTime' => $request->input('currentTime'),
                    'phoneNum' => $request->input('phoneNum'),
                    'complaint' => $request->input('complaint'),
                    'status' => "Processing",
                ]);
            }else{
                Complaints::create([
                    //'PenaltyID' => $newPenaltyID,
                    'StudentID' => null,
                    'userID' => $userId,
                    'bicycleID'=> $bicycle->bicycleID,
                    'complaintID' => $newComplaintID,
                    'currentDate' => $request->input('currentDate'),
                    'currentTime' => $request->input('currentTime'),
                    'phoneNum' => $request->input('phoneNum'),
                    'complaint' => $request->input('complaint'),
                    'status' => "Processing",
                ]);
            }
        }

        // Redirect to the manageComplaint page
        return redirect('/manageComplaint');
    }

    public function edit($id)
    {
        //
        $complaints = Complaints::find($id);

        return view(
            'ManageComplaint.EditComplaint',
            compact('complaints', ),
        );
    }

    public function update(Request $request, $id)
    {

        $complaints = Complaints::find($id);

        // Get the maximum complaint number from the database
        $maxComplaint = Complaints::max('id');
        $maxPenalty = Penalties::max('id');

        // Increment the maximum complaint number to get the new complaint number
        $newComplaintNumber = $maxComplaint + 1;
        $newPenaltyNumber = $maxPenalty + 1;

        // Determine the number of digits needed for the complaint number
        $numDigits = strlen((string)$newComplaintNumber);
        $numDigitsPenalty = strlen((string)$newPenaltyNumber);

        // Calculate the padding based on the desired length (e.g., 4 digits)
        $padding = max(0, 4 - $numDigits);
        $paddingPenalty = max(0, 4 - $numDigitsPenalty);

        // Format the complaint number as C0001, C0011, etc.
        $newComplaintID = 'C' . str_repeat('0', $padding) . $newComplaintNumber;
        $newPenaltyID = 'P' . str_repeat('0', $paddingPenalty) . $newPenaltyNumber;

        $userId = Auth::user()->id;

        $complaints->update([
            'PenaltyID' => $newPenaltyID,
            'userID' => $userId,
            'bicycleID'=> $complaints->bicycleID,
            'complaintID' => $newComplaintID,
            'currentDate' => $complaints->currentDate,
            'currentTime' => $complaints->currentTime,
            'phoneNum' => $complaints->phoneNum,
            'complaint' => $complaints->complaint,
            'status' => $request->input('status'),
            'remarks' => $request->input('remarks'),
        ]);

        return redirect('manageComplaint');
    }

    public function search()
    {
        $search_text = $_GET['query'];

        // : Bicycle::with('bicycleID')->get();
        // Query all bicycles if no search text is provided
        $complaints = $search_text = Complaints::where('bicycleID', 'LIKE', '%'.$search_text.'%')
                        ->orWhere('complaint', 'LIKE', '%' . $search_text . '%')
                        ->orWhere('studentID', 'LIKE', '%' . $search_text . '%')
                        ->orWhere('currentTime', 'LIKE', '%' . $search_text . '%')
                        ->orWhere('currentDate', 'LIKE', '%' . $search_text . '%')
                        ->get();

        return view('ManageComplaint.ViewComplaintStudent', compact('complaints'));
    }
}
