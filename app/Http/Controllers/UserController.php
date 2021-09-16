<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;



class UserController extends Controller
{
    //
    //
    public function index(){
        $data = User::orderBy('id',"DESC")->get();
        return response()->json($data);
     }
 
 
     public function store(Request $request ){
         $request->validate([
             'name'=>'required',
             'email'=>'required',
             'password'=>'required',
         ]);
 
         $data = User::insert([
             'name' => $request->name, 
             'email' => $request->email, 
             'password' => Hash::make($request->password),


         ]);
 
         return response()->json($data);
 
      }
 
 
      public function edit($id){
         $data = User::findorfail($id);
         return response()->json($data);
      }
 
 
      public function show($id)
      {
          //

          $data = User::findorfail($id);
          return view('wallboard', ['data' => $data]);
        //  return response()->json($data);


      }
 
 
      public function update(Request $request, $id ){
         $request->validate([
             'name'=>'required',
             'email'=>'required',
         ]);
 
         $data = User::findorfail($id)->update([

             'name' => $request->name, 
             'email' => $request->email, 
             'password' => Hash::make($request->password),

 
         ]);
 
         return response()->json($data);
 
      }

      public function updateAPI(Request $request, $id ){


        $data = User::findorfail($id)->update([

            'Total_VOTP_Bought' => $request->Total_VOTP_Bought,
            'Total_VOTP_Used' => $request->Total_VOTP_Used,
             'Total_VOTP_Remaining' => $request->Total_VOTP_Remaining,
             'VOTP_Dialing_MSISDN' => $request->VOTP_Dialing_MSISDN,
             'Customers_Listening_to_OTPs' => $request->Customers_Listening_to_OTPs,
             'Quick_VOTP_Activity_Reports_Today' => $request->Quick_VOTP_Activity_Reports_Today,
             'Success_Rate_of_VOTP_today' => $request->Success_Rate_of_VOTP_today,
             'Total_VOTP_API_Calls_Today' => $request->Total_VOTP_API_Calls_Today,


        ]);

       // print($id);

        return response()->json($data);
       

     }
 
 
 
      public function destroy($id){
 
         // return view('teacher/index');
 
         $item = User::findOrFail($id);
         $item->delete();
 
         return response()->json($item);
 
 
      }

}
