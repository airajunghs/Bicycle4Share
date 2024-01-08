<?php

namespace App\Http\Controllers;

use App\Models\Bicycle;
use App\Models\Complaints;
use App\Models\Notification;
use App\Models\Penalties;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenaltiesController extends Controller
{

    function index()
    {

        $penalties = null;

        if (Auth::user()->type == 'admin') {
            $penalties = Penalties::with('complaints')->get();
            $complaints = Complaints::all();
        } else {
            $penalties = Penalties::where('StudentID', Auth::user()->idnumber)->with('complaints')->get();
        }

        return view(
            'ManagePenalty.ViewPenalty',
            compact('penalties'),
        );
    }

    //DISPLAY COMPLAINT ID DALAM PAGE UNTUK ADD PENALTY
    function display($id)
    {
        $complaint = Complaints::find($id);

        return view(
            'ManagePenalty.AddPenalty',
            compact('complaint')
        );
    }

    function add(Request $request, $id)
    {
        $complaint = Complaints::where('id', $id)->firstOrFail();
        $maxPenalty = Penalties::max('id');
        $newPenaltyNumber = $maxPenalty + 1;
        $numDigitsPenalty = strlen((string)$newPenaltyNumber);
        $paddingPenalty = max(0, 4 - $numDigitsPenalty);
        $newPenaltyID = 'P' . str_repeat('0', $paddingPenalty) . $newPenaltyNumber;

        Penalties::create([
            'StudentID' => $complaint->StudentID,
            'ComplaintID' => $complaint->complaintID,
            'PenaltyID' => $newPenaltyID,
            'currentDate' => $request->input('currentDate'),
            'currentTime' => $request->input('currentTime'),
            'complaint' => $request->input('complaint'),
            'PenaltyAmount' => $request->input('PenaltyAmount'),
            'PenaltyDescription' => $request->input('PenaltyDescription'),
            'status' => "Processing",
        ]);

        $bicycle = Bicycle::where('bicycleID', $complaint->bicycleID)->first();

        if ($bicycle) {
            $student = User::where('idnumber', $bicycle->matricid)->first();
            if ($student) {
                $maxNotify = Notification::max('id');
                $newNotifyNumber = $maxNotify + 1;
                $numDigitsNotify = strlen((string)$newNotifyNumber);
                $paddingNotify = max(0, 4 - $numDigitsNotify);
                $newNotifyID = 'N' . str_repeat('0', $paddingNotify) . $newNotifyNumber;

                Notification::create([
                    "NotifID" => $newNotifyID,
                    "StaffID" => Auth::user()->idnumber,
                    "StudentID" => $student->idnumber,
                    "NotifMessage" => $complaint->complaint,
                    "NotifDate" => Carbon::now()->toDateString(),
                    "NotifTime" => Carbon::now()->toTimeString(),
                ]);
            }
        }


        $complaint->update(['PenaltyID' =>  $newPenaltyID]);

        return redirect('/managePenalty');
    }

    public function delete($id)
    {
        $penalties = Penalties::find($id);
        $penalties->delete($penalties);

        return redirect('/managePenalty');
    }

    public function search()
    {
        $search_text = $_GET['query'];

        // Get the currently logged-in user's idnumber
        $currentUser = auth()->user();
        $currentUserID = $currentUser->idnumber;

        if ($currentUser->type == "student") {
            // Query penalties table with a filter on the studentID matching the current user's idnumber
            $penalties = Penalties::where('studentID', 'LIKE', '%' . $currentUserID . '%')
                ->where(function ($query) use ($search_text) {
                    $query->orWhere('PenaltyID', 'LIKE', '%' . $search_text . '%')
                        ->orWhereHas('complaints', function ($innerQuery) use ($search_text) {
                            $innerQuery->where('bicycleID', 'LIKE', '%' . $search_text . '%');
                        })
                        ->orWhere('currentDate', 'LIKE', '%' . $search_text . '%')
                        ->orWhere('ComplaintID', 'LIKE', '%' . $search_text . '%')
                        ->orWhere('PenaltyStatus', 'LIKE', '%' . $search_text . '%')
                        ->orWhere('PenaltyDescription', 'LIKE', '%' . $search_text . '%')
                        ->orWhere('studentID', 'LIKE', '%' . $search_text . '%');
                })
                ->get();
        } else {
            // Query all penalties if no search text is provided
            $penalties = Penalties::where('studentID', 'LIKE', '%' . $search_text . '%')
                ->orWhere('PenaltyID', 'LIKE', '%' . $search_text . '%')
                ->orWhereHas('complaints', function ($query) use ($search_text) {
                    $query->where('bicycleID', 'LIKE', '%' . $search_text . '%');
                })
                ->orWhere('currentDate', 'LIKE', '%' . $search_text . '%')
                ->orWhere('ComplaintID', 'LIKE', '%' . $search_text . '%')
                ->orWhere('PenaltyStatus', 'LIKE', '%' . $search_text . '%')
                ->orWhere('PenaltyDescription', 'LIKE', '%' . $search_text . '%')
                ->orWhere('studentID', 'LIKE', '%' . $search_text . '%')
                ->get();
        }

        return view('ManagePenalty.ViewPenalty', compact('penalties'));
    }
}
