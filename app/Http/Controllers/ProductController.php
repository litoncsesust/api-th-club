<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\User;
use App\File;
use Validator;
use DB;

class ProductController extends Controller
{
    private $user;
    public function __construct(){
      $token = request()->header('Authorization');
      $this->user = User::where('api_token',$token)->first();
    }

    public function generateSKU($digits = 6){
        $i = 0;
        $pin = "";
        while($i < $digits){
            //generate a random number between 0 and 9.
            $pin .= mt_rand(0, 9);
            $i++;
        }
        return $pin;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$product = Product::All();
        $product = Product::with('files', 'clubs')->orderBy('isFeatured', 'DESC')->get();
        //dd($product);
        if($product){
            return response()->json(['status' => 'success','result' => $product]);
        }else{
            return response()->json(['status' => 'fail','result' => 'There is no Product in the list'],401);
        }

    }
    public function listing($id){
        if($this->user){
            $product = Product::with('files')->where('user_id',$id)->get();
            return response()->json(['status' => 'success','result' => $product]);
        }else{
            return response()->json(['status' => 'fail','result' => 'There is no Product in the list'],401);
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
        if($this->user){
            $rules = [
              'title' => 'required',
              'category_id' => 'required',
              'club_id' => 'required',
              'total_number' => 'required|integer',
              'initial_point' => 'required|integer',
              'short_description' => 'required',
              'offer_date' => 'required',
              'headline' => 'required',
              'description' => 'required',
              'seller_club' => 'required',
              'seller_address' => 'required',
              'seller_postcode' => 'required',
              'seller_city' => 'required',
              'contact_person' => 'required',
              'seller_email' => 'required',
              'seller_telephone' => 'required',
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
              // Validation failed
              return response()->json(['status' => 'fail','result' => $validator->messages()]);
            }
            $data = $request->all();
            unset($data['product_image']);
            $data['sku'] = $this->generateSKU();
            $data['s_title'] = mb_strtolower($request->title, 'UTF-8');
            //$product = Product::insert($data);
            $product = DB::table('products')->insertGetId($data);


            //================= Multiple product image upload goes to here=============================
            if(isset($request->product_image)){
                foreach($request->product_image as $key => $val){
                    $decoded_file = base64_decode($val['file_path']);
                    $ext = pathinfo($val['file_name'], PATHINFO_EXTENSION);
                    $path = public_path() . '/products/';
                    $filename = 'product-' . $key .  time().'.'.$ext;
                    file_put_contents($path . $filename, $decoded_file);
                    File::insert([
                        'product_id' => $product,
                        'file_path' => 'products/'.$filename
                    ]);
                }
            }
            //================= Multiple product image upload goes to here=============================

            if($product){
                return response()->json(['status' => 'success','result' => $product]);
            }
        }
        else{
                return response()->json(['status' => 'fail','result' => 'The Product could not be saved. Please, try again.'],401);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$product = Product::where('id', $id)->first();
          $product = Product::with('files')->where('id', $id)->where('user_id', $this->user->id)->first();
          if($product){
            return response()->json(['status' => 'success','result' => $product]);
          }else{
            return response()->json(['status' => 'fail','result' => 'You are not Authorize to see this product'],401);
          }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //return response()->json(['status' => 'success','result' => $this->user->id]);
        if($this->user){
            $product = Product::with('files')->where('id', $id)->where('user_id', $this->user->id)->first();
            $data = $request->all();
            $data['s_title'] = mb_strtolower($request->title, 'UTF-8');
            unset($data['product_image']);
            if($product->fill($data)->save()){
                //================= Multiple product image upload goes to here=============================
                if(isset($request->product_image)){
                    foreach($request->product_image as $key => $val){
                        $decoded_file = base64_decode($val['file_path']);
                        $ext = pathinfo($val['file_name'], PATHINFO_EXTENSION);
                        $path = public_path() . '/products/';
                        $filename = 'product-' . $key . time().'.'.$ext;
                        file_put_contents($path . $filename, $decoded_file);
                        File::insert([
                            'product_id' => $id,
                            'file_path' => 'products/'.$filename
                        ]);
                    }
                }
                //================= Multiple product image upload goes to here=============================
                $product = Product::with('files')->where('id', $id)->first();
                return response()->json(['status' => 'success','result' => $product]);
            }
        }
        else{
                return response()->json(['status' => 'fail','result' => 'You are not Authorize to see the user list page'],401);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($sku)
    {
        if($this->user){
            $product = Product::where('sku', '=', $sku)->first();
            $id = $product->id;
            if(Product::destroy($id)){
                return response()->json(['status' => 'success','result' => 'The Product successfully deleted']);
            }
        }
        else{
            return response()->json(['status' => 'fail','result' => 'You are not Authorize to see the user list page'],401);
        }
    }
}
