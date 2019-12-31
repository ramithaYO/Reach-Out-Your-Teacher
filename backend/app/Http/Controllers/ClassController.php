<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;



use Illuminate\Support\Facades\DB;

//for exel file
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

use PHPExcel; 
use PHPExcel_IOFactory;

use Illuminate\Support\Facades\Storage;
use File;


//date and time
use Carbon\Carbon;

class ClassController extends Controller
{
    public static function addclass(Request $req){
 
      
       
        DB::table('class')->insert(
            ['Date'=>$req->day,'Cfee'=>$req->cfee,'Place'=>$req->clocation,'SubName'=>$req->sname,'ClassName'=>$req->cname,'Time'=>$req->ctime,'AMPM'=>$req->time]
        );
         
        $clasid=DB::select('SELECT  MAX(CID) as max FROM class');
        $clid=$clasid[0]->max;
        DB::table('conductclass')->insert(
            ['CID'=>$clid,'TID'=>$req->userid]
        );
        return response()->json(['users'=> '$clid'],200);
    }
    public static function saddclass(Request $req){
        DB::table('regclass')->insert(
            ['StudentRegNo'=>$req->userid,'CID'=>$req->cid]
        );
        return response()->json(['users'=>'done'],200);
    }
    public static function getdetails($id){
        $clz=DB::select ('SELECT class.CID,class.ClassName FROM conductclass inner join class on conductclass.CID=class.CID where conductclass.TID="'.$id.'" ');
        $results=[];
        $var=true;
        foreach ($clz as $key => $value) {
            $array=array(
                "cid"=>$value->CID,
                "institute"=>$value->ClassName
            );
            array_push($results,$array);
        }
       
        return response()->json(['results'=>$results]);
    }
    public static function getsdetails($id){
        $clz=DB::select ('SELECT class.CID,class.ClassName FROM regclass inner join class on regclass.CID=class.CID where regclass.StudentRegNo="'.$id.'" ');
        $results=[];
        $var=true;
        foreach ($clz as $key => $value) {
            $array=array(
                "cid"=>$value->CID,
                "institute"=>$value->ClassName
            );
            array_push($results,$array);
        }
       
        return response()->json(['results'=>$results]);
    }
    public static function removeclass($id,$cid){
       
        DB::delete(' DELETE from conductclass  where conductclass.CID="'.$cid.'" and conductclass.TID="'.$id.'" ');
        DB::delete(' DELETE from regclass  where regclass.CID="'.$cid.'"');
        return response()->json(['results'=>'done']);
    }
    public static function removesclass($id,$cid){
       
      
        DB::delete(' DELETE from regclass  where regclass.StudentRegNo="'.$id.'" and regclass.CID="'.$cid.'"');
        return response()->json(['results'=>'done']);
    }
    public static function findtheclass($id){
        $clz=DB::select ('SELECT * FROM class  where class.CID="'.$id.'" ');
        $results=[];
        $var=true;
        foreach ($clz as $key => $value) {
            $array=array(
                "CLASS ID"=>$value->CID,
                "INSTITUTE"=>$value->ClassName,
                "SUBJECT"=>$value->SubName,
                "DATE"=>$value->Date,
                "LOCATION"=>$value->Place,
            );
            array_push($results,$array);
        }
       
        return response()->json(['results'=>$results]);
    }
    public static function getupcomingevent($id,$user){
  
        $today= Carbon::now()->format('l, d F, Y');
        $str_arr = explode (",", $today);  
        $date=$str_arr[0];
        // $days[$today->dayOfWeek] . ', ' .  $today->toFormattedDateString();
        $arry=array('Monday'=>0, 'Tuesday'=>0, 'Wednesday'=>0, 'Thursday'=>0, 'Friday'=>0, 'Saturday'=>0,'Sunday'=>0);
        $orderarry=[];
        if($user=='student'){
        $clz=DB::select ('SELECT class.* FROM class INNER JOIN regclass  on class.CID=regclass.CID  where regclass.StudentRegNo="'.$id.'" order by class.Time ASC ');
        }
        else{
            $clz=DB::select ('SELECT class.* FROM class INNER JOIN conductclass  on class.CID=conductclass.CID  where conductclass.TID="'.$id.'" order by class.Time ASC ');

        }
        $locker=0;
        $key1='';
        $counter=0;
        foreach ($arry as $k => $val) {
            if($locker){
                foreach ($clz as $key => $value) {
                    if($value->Date==$k){
                        array_push($orderarry,$value);
                    }
                }
                $arry[$k] =1;
                
            }
            if($k==$date){
               
                $locker=1;
                $arry[$k] =1;
                foreach ($clz as $key => $value) {
                    if($value->Date==$date){
                        array_push($orderarry,$value);
                    }
                }
              
            }
           
           
           }
           foreach ($arry as $k => $val) {
          
            if($val==0){
             
                foreach ($clz as $key => $value) {
                    if($value->Date==$k){
                       
                        array_push($orderarry,$value);
                    }
                }

            }
    
           }
           $finalarry=[];
           foreach ($orderarry as $k => $value) {
            $array=array(
                "INSTITUTE"=>$value->ClassName,
                "SUBJECT"=>$value->SubName,
                "DATE"=>$value->Date,
                "LOCATION"=>$value->Place,
                "TIME"=>$value->Time.'-'.$value->AMPM
            );
            array_push($finalarry,$array);
           
    
           }
        return response()->json(['results'=>$finalarry ]);
    }
}
