<?php

namespace App\Http\Controllers;
use App\Category;
use App\Manufacture;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
    	$categories=Category::all();
    	$manufactures=Manufacture::all();
    	return view('pages.home_content',compact('categories','manufactures'));
    }
}
