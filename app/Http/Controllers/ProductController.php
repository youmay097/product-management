<?php

namespace App\Http\Controllers;

use App\Product;
use App\Client;
use App\Category;
use App\ClientProduct;
use DB;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$products = DB::table('products','categories','clients')
					->join('client_products','products.id','=','client_products.product_id')
					->join('categories', 'categories.id','=','client_products.category_id')
					->join('clients', 'clients.id','=','client_products.client_id')
					->select('client_products.id','products.code','products.name as product_name','products.price','categories.name as category_name','clients.name as client_name')
					->get();
					
	//dd($products);
		return view('product.index',compact('products'));
		
        //$products = Product::latest()->paginate(5);
		//return view('product.index',compact('products'))
		//		->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$clients = Client::all();
		$categories = Category::all();
        return view('product.create',compact('clients','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$clients = Client::all();
		$categories = Category::all();
		
		
        $product = new Product;
		$product->code = $request->code;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->save();
		$product_id = $product->id;
		//dd($product_id);
        /*$category = Category::find(all);
		$client = Client::fint(all);
        $product->category()->attach($category);
		$client->client()->attach($client);*/
		
		$client_product = new ClientProduct;
		$client_product->product_id = $product_id;
		$client_product->category_id = $request->category;
		$client_product->client_id = $request->client;
		
		//dd($request->client);
		//$client_product->category_id = Category::id();
		$client_product->save();
		return redirect()->route('product.index')
                ->with('success','Product created successfully.');
		
		
		

        //return 'Success';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
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
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
