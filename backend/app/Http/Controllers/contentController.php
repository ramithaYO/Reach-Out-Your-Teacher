<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;



class contentController extends Controller
{
    public static function getcontent($id){
        $arry = DB::select ('SELECT class_deatails.Date,Content FROM class_deatails WHERE CID="'.$id.'" ');
        return response()->json(['content'=>$arry],200);

    }


    public static function addcontent(Request $req){
        $date=$req->Datevalue;
        $s1 = explode (":", $date); 
        $s= explode ("-", $s1[0]); 
        $s3=substr($s[2],0,2);
        $date2=$s[0].'-'.$s[1].'-'.$s3;
       
        DB::table('class_deatails')->insert(
            ['CID'=> $req->cid,'Date'=>$date2,'Availability'=>$req->value,'Content'=>$req->content]
        );
       
        return response()->json(['content'=> 'done'],200);
    }
}
