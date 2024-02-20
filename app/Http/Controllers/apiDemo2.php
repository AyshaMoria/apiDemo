<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\student;

class apiDemo2 extends Controller
{

    //1) insert multiple data
    function insertData(Request $req)
    {
        $test = $req->input();
        foreach ($test as $val) {
            $test = new Student;
            $test->name = $val['name'];
            $test->address = $val['address'];
            $result = $test->save();
        }
        if ($result) {
            return ["message" => "data saved"];
        }
    }

    //2) view static data

    function showStaticData()
    {
        return ["name" => "aysha", "email" => "aysha@gmail.com"];
    }

    //3) view all data in json formate
    function viewAllData()
    {
        $test_data = student::all();
        $data = [
            "status" => 200,
            "data" => $test_data,

        ];
        return response()->json($data, 200);
    }

    //4) view  specific data in json formate get method
    function getSpecData(Request $req)
    {
        $test_data = student::find($req->id);
        $data = [
            "status" => 200,
            "data" => $test_data,
        ];
        return response()->json($data, 200);
    }

    //5) view specific data in json formate post method
    function getSpecDataPost(Request $req)
    {
        $test_data = student::find($req->id);
        $data = [
            "status" => 200,
            "data" => $test_data,
        ];
        return response()->json($data, 200);
    }

    //6) view specific data with complesory argument if not getting data it will show error
    function getSpecDataparam($id)
    {
        return student::find($id);
    }

   //7) view specific data with optional argument will show that data or will show all data
    function getSpecDataOptional($id = null)
    {
       return ($id) ? student::find($id) : student::all();
    }

    //8) update specific dataand display in json formate
    function updateData(Request $req)
    {
        $test_data=student::find($req->id);
        $test_data->name = $req->name1;
        $test_data->address = $req->address1;
        $result = $test_data->save();
  
        $data = [
           "status" => 200,
           "data" => $result,
        ];
        return response()->json($data, 200);
     }
}
