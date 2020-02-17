<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Redirect;

class SuperAdminController extends Controller
{
   public function logout()
   {
   	Session::flush();
   	return Redirect::to('/admin');
   }
}
