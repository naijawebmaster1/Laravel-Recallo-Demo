<?php

namespace App\Http\Controllers;
use App\Models\APICall;

use Illuminate\Http\Request;

class APICallController extends Controller
{
    //
    public function index(){
        $data = APICall::orderBy('id',"DESC")->get();
        return response()->json($data);
     }
}
