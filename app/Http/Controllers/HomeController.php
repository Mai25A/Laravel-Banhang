<?php

namespace App\Http\Controllers;
use App\Models;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(){
        $products = Product::all()->where('new','=',1);
        $allProducts = Product::all();
        
        // dd($products);
        return view('home',compact('products','allProducts'));    
    }
}
