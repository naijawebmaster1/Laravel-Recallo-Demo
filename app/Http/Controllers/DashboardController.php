<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
   public function index()
   {
       if(Auth::user()->hasRole('user')){
            return view('userDashboard');
       }elseif(Auth::user()->hasRole('blogwriter')){
            return view('blogwriterdash');
       }elseif(Auth::user()->hasRole('admin')){
        return view('adminDashboard');
   }
     elseif(Auth::user()->hasRole('')){
          return view('welcome');
     }
   }

   public function myprofile()
   {
    return view('myprofile');
   }

   public function postcreate()
   {
    return view('postcreate');
   }
}
