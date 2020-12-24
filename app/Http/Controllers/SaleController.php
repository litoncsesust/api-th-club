<?php

namespace App\Http\Controllers;

use App\Sale;
use Illuminate\Http\Request;
use App\Profile;
use Validator;
use App\User;
use App\Product;
use App\SalesItem;

class SaleController extends Controller
{
    private $user;
    public function __construct(){
      $token = request()->header('Authorization');
      $this->user = User::where('api_token',$token)->first();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($user_id)
    {
        //
        if($this->user){
            $sales = Sale::with('sales_items')->where('user_id',$user_id)->get();
            if($sales){
                return response()->json(['status' => 'success','result' => $sales]);
            }
            else{
                return response()->json(['status' => 'fail','result' => 'There is no order in the list'],401);
            }
        }else{
            return response()->json(['status' => 'fail','result' => 'You are not authorize to see this order list'],401);
        }
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
        $data = $request->all();
        $sales_data = [];
        $user_id = $data['user_id'];
        $total_point = $data['data']['total_point'];
        $total_quantity = $data['data']['total_quantity'];

        $user = User::where('id', $user_id)->first();
        
        $sales_data['user_id'] = $user_id;
        $sales_data['user_name'] = $user->name;
        $sales_data['total_quantity'] = $total_quantity;
        $sales_data['total_point'] = $total_point;

        $rules = [
            'user_id' => 'required|integer',
            'user_name' => 'required',
            'total_quantity' => 'required|integer',
            'total_point' => 'required|integer',
        ];
        $validator = Validator::make($sales_data, $rules);
        if ($validator->fails()) {
            // Validation failed
            return response()->json(['status' => 'fail','result' => $validator->messages()]);
        }

        $sale_insert = Sale::create($sales_data);

        $purchase_data = [];

        if ($sale_insert) {
            foreach ($data['data']['data_sku'] as $key => $val) {
                $product = Product::with('files')->where('sku', $key)->first();

                $sale_item_data = [];
                $sale_item_data['sale_id'] = $sale_insert->id;
                $sale_item_data['user_id'] = $user_id;
                $sale_item_data['club_id'] = $product->club_id;
                $sale_item_data['sku'] = $key;
                $sale_item_data['quantity'] = $val;
                $sale_item_data['point'] = $product->initial_point;
                $sale_item_data['product_id'] = $product->id;
                $sale_item_data['product_name'] = $product->title;

                $purchase_data[$key]['product_name'] = $product->title;
                $purchase_data[$key]['quantity'] = $val;
                $purchase_data[$key]['point'] = $product->initial_point;
                $purchase_data[$key]['purchase_notice'] = $product->purchase_notice;
                $purchase_data[$key]['sku'] = $key;

                $salesItem_insert = SalesItem::insert($sale_item_data);
            }
        }
        $profile = Profile::where('user_id', $user_id)->first();

        $deducted_point = $profile->point - $total_point;
        $user_point_updated = Profile::where('user_id', $user_id)->update([ 'point'=> $deducted_point ]);
        $updated_user_info = Profile::where('user_id', $user_id)->first();

        $return_data = [];
        $return_data['order_id'] = $sale_insert->id;
        $return_data['user_data'] = $updated_user_info;
        $return_data['purchase_data'] = $purchase_data;

        if($updated_user_info){
            return response()->json(['status' => 'success','result' => $return_data]);
        }       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function show(Sale $sale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function edit(Sale $sale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sale $sale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sale $sale)
    {
        //
    }
}
