<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
//for exel file
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
//use App\Http\Controllers\Controller;
use PHPExcel; 
use PHPExcel_IOFactory;

use Illuminate\Support\Facades\Storage;
use File;

class Attendence extends Controller
{

    public static function insertintotable($excel){
      // code with the date and cls id in the csv file
        $i = 3;
        $date=(string)($excel -> getActiveSheet() -> getCell('A2') -> getValue());
        $s = explode ("/", $date); 
        $date=$s[2].'-'.$s[1].'-'.$s[0];
        $cid= $excel -> getActiveSheet() -> getCell('A1') -> getValue();

        //with the user input of the date 
        // $i = 1;
        // $cid=7;
        // $date='2019-10-04';
        while ($excel -> getActiveSheet() -> getCell('A'.$i) -> getValue() != "")
        {
          $Subject[0][$i-1] = $excel -> getActiveSheet() -> getCell('A'.$i) -> getValue();
          $Subject[1][$i-1] = $excel -> getActiveSheet() -> getCell('B'.$i) -> getValue();
          DB::table('attendence_details')->insert(
              ['StudentRegNo'=> $Subject[0][$i-1],'CID'=>$cid ,'Attendence'=>$Subject[1][$i-1],'Date'=>$date]
          );
           $i++;
        }
        
       }

    public static function fileUploades(Request $req){
    
        $path=Storage::disk('public')->put('impot.csv',$req->file);
      
        $excel = PHPExcel_IOFactory::load('uploads/'.$path);
      
        $excel -> setActiveSheetIndex(0);
   
        Attendence::insertintotable($excel);
      //the are the things tht u should use to delte the file that u have stored 
    //   if(File::exists('uploads/'.$path))
    // {
     
    //     Storage::disk('public')->delete( $path);
    // }
    // else
    // {
    //  echo('nothing to delete');
    // }
     
        return response()->json(['users'=>'done'],200);
       }
      
}
