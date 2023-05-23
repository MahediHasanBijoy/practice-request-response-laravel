<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DemoController extends Controller
{
    //
    function index(){
        return view('index');
    }

    // Get name and user-agent
    function store(Request $request){
        $name = $request->name;
        $userAgent = $request->header('user-agent');
        return ['name'=>$name, 'userAgent'=>$userAgent];
    }

    // Get query parameter page
    function queryParameter(Request $request){
        $page = $request->query('page') ?? null;
        return $page;
    }

    // create json response
    function json(){
        // json response
        $data = array(
            'message'=>'success',
            'data' => array(
                'name' => 'John Doe',
                'age' => 25
            )
        );
        return response()->json($data);
    }

    // file upload
    function upload(Request $request){
        $file = $request->file('photo');
        $originalName = $file->getClientOriginalName();
        // move uploaded file
        $file->move('public/uploads',$originalName);

        // store remember_token cookie
        $rememberToken = $request->cookie('remember_token') ?? null;
        return $rememberToken;
    }
}
