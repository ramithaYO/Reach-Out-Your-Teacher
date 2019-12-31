<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

//for exel file
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
//use App\Http\Controllers\Controller;
use PHPExcel; 
use PHPExcel_IOFactory;

use Illuminate\Support\Facades\Storage;
use File;


class MsgController extends Controller
{
   public static function addmsg(Request $req){

    DB::table('msg')->insert(
        ['CID'=>$req->cid,'StudentRegNo'=>$req->sid,'msg'=>$req->content]
    );
     
   
 
    return response()->json(['users'=> 'done'],200);
   }
   public static function getfeedback($id){
    $msg=DB::select ('SELECT CID,msg FROM msg  where msg.StudentRegNo="'.$id.'" order by ID Desc');

    return response()->json(['msg'=>  $msg],200);
   }
}
