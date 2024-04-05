<?php

namespace App\Http\Controllers;
use App\Models;
use App\Models\Product;
use App\Models\Cart2;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(){
        $products = Product::all()->where('new','=',1);
        $allProducts = Product::all();
           
        
        //dd($products);
        return view('index',compact('products','allProducts'));    
    }
    public function getProductType($id){
        $producttype = Product::find($id);
        return view('product_type',compact('producttype'));
    }
    //thêm 1 sản phẩm có id cụ thể vào model cart rồi lưu dữ liệu của model cart vào 1 session có tên cart (session được truy cập bằng thực thể Request)
   public function addToCart(Request $request,$id){
      
        $product=Product::find($id);
        //dd(($request->session()->has('cart')) );
        $oldCart=$request->session()->has('cart')?$request->session()->get('cart'):null;
        if(!is_null($oldCart)){
            $cart=$oldCart;
        }        
        else  { 
            $cart = new Cart2();
        }
        $cart->add($product,$id);
        
        $request->session()->put('cart',$cart);
        // dd($cart);

        return redirect()->back();
    }
}
