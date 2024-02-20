<?php

namespace App\Http\Controllers;
use App\Models\testing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;



class apiDemo extends Controller
{
   //1) insert single data without validation
   function insertsingleData(Request $req)
   {

      $test_data = new testing;
      $test_data->sid = $req->sid_val;
      $test_data->name = $req->name_val;
      $test_data->address = $req->add;
      $result = $test_data->save();

      $data = [
         "status" => 200,
         "data" => $result,
      ];
      return response()->json($data, 200);
   }


   //2) insert multiple data without validation
   function insertData(Request $req)
   {

  
      
       $test = $req->input();
       foreach ($test as $val) {
           $test = new testing();

           $test->sid = $val['sid'];
           $test->name = $val['name'];
           $test->address = $val['address'];
           $result = $test->save();
       }
       if ($result) {
           return ["message" => "data saved"];
       }
   }


   //3) insert single data with validation
   function insertDatavalidator(Request $req)
   {
      $validator = Validator::make($req->all(), [
         'sid_val' => 'required',
         'name_val' => 'required',
         'add' => 'required',
      ]);

      if ($validator->fails()) {

         return response()->json($validator->errors(), 400);
      }
      $test_data = new testing;
      $test_data->sid = $req->sid_val;
      $test_data->name = $req->name_val;
      $test_data->address = $req->add;
      $result = $test_data->save();

      $data = [
         "status" => 200,
         "data" => $result,
      ];
      return response()->json($data, 200);
   }

   //4) view static data
   function showData()
   {
      return ["abc" => "abc@gmail.com", "xyz" => "xyz@gmail.com"];
   }

   //5) view all data in json formate
   function getData()
   {

      // $test_data = testing::all();
      $test_data = testing::orderBy('updated_at', 'desc')->get();

      $data = [
         "status" => 200,
         "data" => $test_data,
      ];
      
      return response()->json($data, 200);

      
   }

   //6) view specific data in json formate
   function getSpecData(Request $req)
   {
      $test_data = testing::find($req->id);
      $data = [
         "status" => 200,
         "data" => $test_data,
      ];
      return response()->json($data, 200);
   }

   //7) view specific data with complesory argument if not getting data it will show error
   function getSpecDataparam($id)
   {
      return testing::find($id);
   }

   //8) view specific data with optional argument will show that data or will show all data
   function getSpecDataOptional($id = null)
   {
      return ($id) ? testing::find($id) : testing::all();
   }


   //9) update specific dataand display in json formate
   function updateData(Request $req)
   {


      $validator = Validator::make($req->all(), [
         'id'=>'required',
         'sid1' => 'required',
         'name1' => 'required',
         'address1' => 'required',
      ]);

      if ($validator->fails()) {

         return response()->json($validator->errors(), 400);
      }
      $test_data = testing::find($req->id);
      $test_data->sid = $req->sid1;
      $test_data->name = $req->name1;
      $test_data->address = $req->address1;
      $result = $test_data->save();

      $data = [
         "status" => 200,
         "data" => $result,
      ];
      return response()->json($data, 200);
   }

   //10) delete data and show mwssage in json formate with get method
   function deleteData(Request $req)
   {

      $validator = Validator::make($req->all(), [
         'id'=>'required',
         
      ]);

      if ($validator->fails()) {

         return response()->json($validator->errors(), 400);
      }
      $test_data = testing::find($req->id);
      $test_data->delete();
      $data = [
         "status" => 200,
         "message" => "Data Deleted",
      ];
      return response()->json($data, 200);
   }
//10) delete data and show mwssage in json formate with get method
function deleteDataParam($id)
{

   $test_data = testing::find($id);
   $test_data->delete();
   $data = [
      "status" => 200,
      "message" => "Data Deleted",
   ];
   return response()->json($data, 200);
}
   


}
