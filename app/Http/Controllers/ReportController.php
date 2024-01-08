<?php

namespace App\Http\Controllers;

use App\Models\Bicycle;
use App\Models\Complaints;
use App\Models\Penalties;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    function index(Request $request)
    {
        $dataCount = [];
        $dataArr = [];
        $year = $request->year;
        $totalStudents = User::where('type','student')->count();
        $totalPenalties = Penalties::sum('PenaltyAmount');
        $totalComplaints = Complaints::count();
        $totalBikeAvailable = Bicycle::where('status','Available')->count();
        $totalBicycles = Bicycle::count();

        $defaultType = isset($request->type) ?  $request->type : 'yearly';
        $yearData = [['count' => 0 ,'year' => '2023'],['count' => 0 ,'year' => '2024']];
        $month = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];


        if($defaultType == 'yearly'){
            $complaintsData = Complaints::select('id', 'currentDate')->get()->groupBy(function ($date) {
                return Carbon::parse($date->currentDate)->format('Y');
            });

            foreach ($complaintsData as $key => $value) {
                $dataCount[$key] = count($value);
            }

            foreach ($yearData as $key => $entry2) {
                $year = $entry2["year"];
                if (isset($dataCount[$year])) {
                    $yearData[$key]["count"] = $dataCount[$year];
                }
            }

            $dataArr = $yearData;
        }


        if($defaultType == 'monthly'){
            $complaintsData = Complaints::select('id', 'currentDate')->where(function($q) use($year){
                if(isset($year)){
                    $q->where('currentDate', 'like', '%'.$year.'%');
                }else{
                    $q->where('currentDate', 'like', '%2023%');
                }
            })->get()->groupBy(function ($date) {
                return Carbon::parse($date->currentDate)->format('m');
            });

            foreach ($complaintsData as $key => $value) {
                $dataCount[(int)$key] = count($value);
            }

            for ($i = 1; $i <= 12; $i++) {
                if (!empty($dataCount[$i])) {
                    $dataArr[$i]['count'] = $dataCount[$i];
                } else {
                    $dataArr[$i]['count'] = 0;
                }
                $dataArr[$i]['month'] = $month[$i - 1];
            }
        }

        if($defaultType == 'weekly'){
            $complaintsData = Complaints::select('id', 'currentDate')
            ->where(function($q) use($year){
                if(isset($year)){
                    $q->where('currentDate', 'like', '%'.$year.'%');
                }else{
                    $q->where('currentDate', 'like', '%2023%');
                }
            })->get()
            ->groupBy(function ($date) {
                return Carbon::parse($date->currentDate)->format('W');
            });

            foreach ($complaintsData as $key => $value) {
                $dataCount[(int)$key] = count($value);
            }

            //dd($dataCount);

            for ($i = 1; $i <= 52; $i++) {
                if (!empty($dataCount[$i])) {
                    $dataArr[$i]['count'] = $dataCount[$i];
                } else {
                    $dataArr[$i]['count'] = 0;
                }
                $dataArr[$i]['week'] = $i;
            }
        }


        return view('ManageReport.ViewReport',
            compact('totalStudents', 'totalPenalties', 'totalComplaints', 'totalBikeAvailable', 'totalBicycles', 'dataArr')
        );
    }
}
