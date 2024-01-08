<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Penalties;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        return view('ManagePenalty.UploadReceipt');
    }

    public function processPayment(Request $request)
    {
        Penalties::where('PenaltyID', $request->PenaltyID)->update(['PenaltyStatus' => 'Paid']);
        Payment::create([
            'PenaltyID' => $request->PenaltyID,
            'payment' => $request->payment,
            'penalty' => $request->penalty,
            'balance' => $request->balance,
            'acc_no' => $request->acc_no,
            'bank' => $request->bank
        ]);

        return redirect()->back();
    }

    public function viewPayment($penaltyId)
    {
        return Payment::where('PenaltyID', $penaltyId)->latest()->first()->toArray();
    }
}
