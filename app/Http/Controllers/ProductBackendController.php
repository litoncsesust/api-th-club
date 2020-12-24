<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Product;
use App\Category;
use App\Club;
use App\File;
use DB;

class ProductBackendController extends Controller
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
        //
        $clubs = Club::get()->pluck('name', 'id')->toArray();
        $categories = Category::get()->pluck('name', 'id')->toArray();
        $category_id = (!empty($_GET['category_id'])) ? $_GET['category_id'] : '';
        $club_id = (!empty($_GET['club_id'])) ? $_GET['club_id'] : '';
        if($category_id && $club_id){
            $products = Product::where('category_id', '=', $category_id)->where('club_id', '=', $club_id)->orderBy('id', 'DESC')->paginate(10);
        }else if($category_id && $club_id < 0){
            $products = Product::where('category_id', '=', $category_id)->orderBy('id', 'DESC')->paginate(10);
        }else if($club_id && $category_id < 0){
            $products = Product::where('club_id', '=', $club_id)->orderBy('id', 'DESC')->paginate(10);
        }else{
            $products = Product::orderBy('id', 'DESC')->paginate(10);
        }
        //$products = DB::table('products')->paginate(10);
        return view('content.product.index', ['products' => $products, 'clubs' => $clubs, 'categories' => $categories, 'category_id' => $category_id, 'club_id' => $club_id]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get()->pluck('name', 'id')->toArray();
        $clubs = Club::get()->pluck('name', 'id')->toArray();

        return view('content.product.create',compact('categories', 'clubs'));
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
        $request->validate($rules);
       


        $data = $request->all();
        $data['sku'] = $this->generateSKU();
        $data['s_title'] = mb_strtolower($request->title, 'UTF-8');
        $data['user_id'] = Auth::id();
        unset($data['product_img']);
        unset($data['_token']);
        $data['isFeatured'] = $request->isFeatured == 1?1:0;
        //$product = Product::create($data);



        $product = DB::table('products')->insertGetId($data);
        //dd($product);

            //================= Multiple product image upload goes to here=============================
            if($request->hasFile('product_img')) {
                foreach($request->file('product_img') as $key => $file){
                    $filenameWithExt = $file->getClientOriginalName();
                    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);            
                    $extension = $file->getClientOriginalExtension();
                    $fileNameToStore = 'product-' . $key . time().'.'.$extension;                 
                    $destinationPath = public_path() . '/products/';
                    
                    $file->move($destinationPath,$fileNameToStore);

                    File::insert([
                        'product_id' => $product,
                        'file_path' => 'products/'.$fileNameToStore
                    ]);
                }                
            }
            //================= Multiple product image upload goes to here=============================
        return redirect()->route('product.index')->with('product added successfully');
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
        //
        $product = Product::with('files')->where('id', $id)->first();
        $categories = Category::get()->pluck('name', 'id')->toArray();
        $clubs = Club::get()->pluck('name', 'id')->toArray();
       
        return view('content.product.show',compact('product', 'categories', 'clubs'));
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
        $categories = Category::get()->pluck('name', 'id')->toArray();
        $clubs = Club::get()->pluck('name', 'id')->toArray();
        $product = Product::with('files')->where('id', $id)->first();

        return view('content.product.edit',compact('categories', 'clubs', 'product'));
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
        //
        //
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
        $request->validate($rules);

        $data = $request->all();
        
        $data['sku'] = $this->generateSKU();
        $data['s_title'] = mb_strtolower($request->title, 'UTF-8');

        $data['user_id'] = Auth::id();

        $product = Product::findOrFail($id);

        unset($data['product_img']);
        unset($data['_token']);
        $data['isFeatured'] = $request->isFeatured == 1?1:0;
         
        
        $product->update($data);

            //================= Multiple product image upload goes to here=============================
            if($request->hasFile('product_img')) {
                foreach($request->file('product_img') as $key => $file){
                    $filenameWithExt = $file->getClientOriginalName();
                    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);            
                    $extension = $file->getClientOriginalExtension();
                    $fileNameToStore = 'product-' . $key . time().'.'.$extension;                     
                    $destinationPath = public_path() . '/products/';
                    $file->move($destinationPath,$fileNameToStore);

                    File::insert([
                        'product_id' => $id,
                        'file_path' => 'products/'.$fileNameToStore
                    ]);
                }                
            }
            //================= Multiple product image upload goes to here=============================
        //dd($product);
        return redirect()->route('product.show', $id)->with('Product updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        //$product = Product::findOrFail($id)->delete();
        $product = Product::findOrFail($id);
        $files = File::where('product_id', $id)->get()->toArray();
        foreach ($files as $key => $val) {
            if (file_exists($val['file_path'])) {
                unlink(base_path().'/public/'.$val['file_path']);
            }
        }
        $product->files()->delete();
        $product->delete();
        return redirect()->route('product.index')->with('Product deleted successfully');    
    }
}
