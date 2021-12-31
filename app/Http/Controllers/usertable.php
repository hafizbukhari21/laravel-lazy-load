<?php

namespace App\Http\Controllers;

use App\Models\usertabelmodel;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;



class usertable extends Controller
{
    //

    public function show(){
        $payload =usertabelmodel::paginate(10);
        
        return Response()->json(["payload"=>$payload],200);
    }
}
