<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Sale;
use App\Club;
use DB;
use Carbon\Carbon;

use App\Helpers\Helper;

class OrderBackendController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }    
    

    /**
     * Display the total sold point by user.
     *
     * @return \Illuminate\Http\Response
     */
    public static function getTotalSoldPoint()
    {
        $total_point = DB::table('sales')
            ->where('user_id', '=', Auth::id())
            ->sum('total_point');
        return $total_point;
    }

    /**
     * Display the total completed order.
     *
     * @return \Illuminate\Http\Response
     */
    public static function completedOrder()
    {
        $order = Sale::where('status', 4)->get();;
        $total = $order->count();
        return $total;
    }

    /**
     * Display the total order count.
     *
     * @return \Illuminate\Http\Response
     */
    public static function orderByMonth()
    {
        $total_quantity_by_user_arr = [];
        $total_point_by_user_arr = [];
      
        $total_quantity_by_user = DB::table("sales")
            ->select(DB::raw("SUM(total_quantity) as count, user_id"))
            ->orderBy('user_id', 'asc')
            ->groupBy(DB::raw("user_id"))
            ->get();
        foreach ($total_quantity_by_user as $key => $val) {
            $total_quantity_by_user_arr[$val->user_id] = $val->count;
        }

        $total_point_by_user = DB::table("sales")
            ->select(DB::raw("SUM(total_point) as count, user_id"))
            ->orderBy('user_id', 'asc')
            ->groupBy(DB::raw("user_id"))
            ->get();
        foreach ($total_point_by_user as $key => $val) {
            $total_point_by_user_arr[$val->user_id] = $val->count;
        }

        $return_data = [];
        $data= DB::table('sales')->select('id', 'total_quantity','total_point', 'created_at')
            ->get()
            ->groupBy(function($val) {
            return Carbon::parse($val->created_at)->format('m');
        }); 

        for($i=1; $i<=12; $i++ ){
            $return_data[] = isset($data[sprintf("%02d", $i)]) ? count($data[sprintf("%02d", $i)]) : 0;
        }

    /*echo "<pre>";
    print_r(json_encode($return_data));
    exit();*/
        return json_encode($return_data);   
    }

    /**
     * Display the pending order count.
     *
     * @return \Illuminate\Http\Response
     */
    public static function pendingOrder()
    {
        $order = Sale::whereIn('status', [1,2])->get();;
        $total = $order->count();
        return $total;
    }
    /**
     * Display the cancel order count.
     *
     * @return \Illuminate\Http\Response
     */
    public static function canceldOrder()
    {
        $order = Sale::where('status', 3)->get();;
        $total = $order->count();
        return $total;
    }

    /**
     * Display the refund order count.
     *
     * @return \Illuminate\Http\Response
     */
    public static function refundOrder()
    {
        $order = Sale::where('status', 5)->get();;
        $total = $order->count();
        return $total;
    }

    /**
     * Display the new order count.
     *
     * @return \Illuminate\Http\Response
     */
    public static function newOrder()
    {
        $order = Sale::where('status', 0)->get();;
        $total = $order->count();
        return $total;
    }

    /**
     * Display the total order count.
     *
     * @return \Illuminate\Http\Response
     */
    public static function totalOrder()
    {
        $order = Sale::all();
        $total = $order->count();
        return $total;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $orders = Sale::orderBy('id', 'DESC')->paginate(10);
        $order_status = Helper::orderStatus();
        return view('content.order.index', ['orders' => $orders, 'order_status' => $order_status]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $order = Sale::with('sales_items', 'profile', 'user')->where('id', $id)->first();
        $order_status = Helper::orderStatus();
        $clubs = Club::get()->toArray();
        $club_data = [];
        foreach ($clubs as $key => $val) {
           $club_data[$val['id']] = $val;
        }
        
        return view('content.order.show', ['order' => $order, 'order_status' => $order_status, 'clubs' => $club_data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $order = Sale::findOrFail($id);
        $update = Sale::where('id', $id)->update(['status'=> $request->status]);
        if($update)
        {
            return redirect()->route('order.show', $id)->with('Order updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
