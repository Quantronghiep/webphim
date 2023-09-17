<?php

namespace App\Http\Controllers;

use App\Models\Statistic;
use Illuminate\Http\Request;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        return view('admin.layouts.main');
        // return redirect()->route('movie.index');
    }
    public function thongke(){
        return view('admin.layouts.main');
    }

    public function chartDefault(){
        $ngay_truoc_30_ngay = Carbon::now('Asia/Ho_Chi_Minh')->subDays(30)->toDateString();
        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        $get = Statistic::whereBetween('order_date',[$ngay_truoc_30_ngay,$now])->orderBy('order_date','ASC')->get();
        foreach($get as $key => $val){
            $chart_data[] = array(
                'period' => $val->order_date,
                'revenue' => $val->revenue,
                'quantity_movie' => $val->quantity_movie,
                'total_order' => $val->total_order,
            );
        }
        echo $data = json_encode($chart_data);
    }

    public function dashboardFilter(Request $request){
        $data = $request->all();
        $dauthangnay = Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth()->toDateString();
        $dauthangtruoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->startOfMonth()->toDateString();
        $cuoithangtruoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->endOfMonth()->toDateString();
        $sub7days = Carbon::now('Asia/Ho_Chi_Minh')->subdays(7)->toDateString();
        $sub365days = Carbon::now('Asia/Ho_Chi_Minh')->subdays(365)->toDateString();
        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        // dd($dauthangnay);
        if($data['dashboard_value'] == '7ngay'){
            $get = Statistic::whereBetween('order_date',[$sub7days,$now])->orderBy('order_date','ASC')->get();
        }elseif($data['dashboard_value'] == 'thangtruoc'){
            $get = Statistic::whereBetween('order_date',[$dauthangtruoc,$cuoithangtruoc])->orderBy('order_date','ASC')->get();
        }elseif($data['dashboard_value'] == 'thangnay'){
            $get = Statistic::whereBetween('order_date',[$dauthangnay,$now])->orderBy('order_date','ASC')->get();
        }else{
            $get = Statistic::whereBetween('order_date',[$sub365days,$now])->orderBy('order_date','ASC')->get();
        }
        foreach($get as $key => $val){
            $chart_data[] = array(
                'period' => $val->order_date,
                'revenue' => $val->revenue,
                'quantity_movie' => $val->quantity_movie,
                'total_order' => $val->total_order,
            );
        }
        echo $data = json_encode($chart_data);
    }

    public function filterByDate(Request $request){
        $data = $request->all();
        $from_date = $data['from_date'];
        $to_date = $data['to_date'];
        $get = Statistic::whereBetween('order_date',[$from_date,$to_date])->orderBy('order_date','ASC')->get();
        foreach($get as $key => $val){
            $chart_data[] = array(
                'period' => $val->order_date,
                'revenue' => $val->revenue,
                'quantity_movie' => $val->quantity_movie,
                'total_order' => $val->total_order,
            );
        }
        echo $data = json_encode($chart_data);
    }
}
