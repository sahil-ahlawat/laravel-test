<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
class ProductController extends Controller
{
	
	public function index(){
		return view('home');
	}
    public function get_product(Request $request){
		// if(empty(auth()->user()->id)){
			// return ['message'=>'Unauthorised access','status'=>'0'];
		// }
		return Product::where('id', $request->id)->first();
	}
	public function create_product(Request $request){
		$oldProduct = Product::where('name', $request->name)->first();
		if(!empty($oldProduct))
		{
			return ['message'=>'Product Already Exists','status'=>'0'];
		}
		$newProduct = new Product;
		$newProduct->name = $request->name;
		$newProduct->price = $request->price;
		$newProduct->category = $request->category;
		$newProduct->save();
		return ['message'=>'Product Created','status'=>'1'];
	}
	public function update_product(Request $request){
		$oldProduct = Product::where('name', $request->name)->where('price', $request->price)->where('category', $request->category)->first();
		if(!empty($oldProduct))
		{
			return ['message'=>'Product Already Exists','status'=>'0'];
		}
		$newProduct = Product::where('id', $request->id)->first();
		$newProduct->name = $request->name;
		$newProduct->price = $request->price;
		$newProduct->category = $request->category;
		$newProduct->save();
		return ['message'=>'Product Updated','status'=>'1'];
	}
	public function delete_product(Request $request){
		$newProduct = Product::where('id', $request->id)->first();
		$newProduct->delete();
		return ['message'=>'Product Deleted','status'=>'1'];
	}
	public function get_product_list(Request $request){
		return Product::skip($request->offset)->take($request->limit)->orderBy('id','DESC')->get();
	}
}
