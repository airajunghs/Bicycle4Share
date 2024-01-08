<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\NotificationMessage;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    function index()
    {
        if(Auth::user()->type == 'admin'){
            $notifications = Notification::all();
        }else{
            $notifications = Notification::where('studentID',Auth::user()->idnumber )->get();
        }

        return view(
            'ManageNotification.ViewNotificationAdmin',
            compact('notifications'),
        );
    }

    function add()
    {
            // $notification:: Notification::all();
            $currentDate = Carbon::now()->toDateString();
            $currentTime = Carbon::now()->toTimeString();
            $users = User::all();

            return view(
                'ManageNotification.AddNotification',
                compact('currentDate', 'currentTime', 'users'),
            );
    }

    function create(Request $request)
    {

        $maxNotify = Notification::max('id');
        $newNotifyNumber = $maxNotify + 1;
        $numDigitsNotify = strlen((string)$newNotifyNumber);
        $paddingNotify = max(0, 4 - $numDigitsNotify);
        $newNotifyID = 'N' . str_repeat('0', $paddingNotify) . $newNotifyNumber;

        Notification::create([
            "NotifID" => $newNotifyID,
            "StaffID" => Auth::user()->idnumber,
            "StudentID" => $request->input('StudentID'),
            "NotifMessage" => $request->input('NotifMessage'),
            "NotifDate" => Carbon::now()->toDateString(),
            "NotifTime" => Carbon::now()->toTimeString(),
        ]);

        return redirect('/manageNotification');
    }

    function edit($id)
    {

        $notifications = Notification::where('id',$id)->with('messages')->first();
        return view(
            'ManageNotification.EditNotification',
            compact('notifications'),
        );
    }

    function addMessage(Request $request, $id)
    {
        //dd($request->all(), $id);
        $notification = Notification::find($id);

        if(Auth::user()->type == 'admin'){
            NotificationMessage::create([
                'NotifID' => $notification->NotifID,
                'NotifMessage' => $request->message,
                'StaffID' => $notification->StaffID,
            ]);
        }else{
            NotificationMessage::create([
                'NotifID' => $notification->NotifID,
                'NotifMessage' => $request->message,
                'StudentID' => $notification->StudentID,
            ]);
        }

        return redirect()->back();


    }
}
