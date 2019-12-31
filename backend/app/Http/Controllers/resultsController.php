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

class resultsController extends Controller
{
    public static function getresults($id,$cid){
        // $arry = DB::select ('SELECT mark FROM results WHERE id="'.$id.'" ');
        $arry=DB::select('SELECT results.mark FROM regclass 
        inner join results on regclass.id=results.id 
        where regclass.StudentRegNo="'.$id.'"  and regclass.CID="'.$cid.'" ');

        $testid=DB::select ('SELECT results.testNo FROM regclass 
        inner join results on regclass.id=results.id 
        where regclass.StudentRegNo="'.$id.'"  and regclass.CID="'.$cid.'" ');
        $results=[];
        $testarry=[];
        $total=0;
        $counter=0;
        $avergae=0;
        foreach ($testid as $key => $value) {
          
            $val ='test' . $value->testNo; 
            array_push($testarry,$val);
           }
           foreach ($arry as $key => $value) {
            $counter++;
            
            $val =$value->mark; 
            $total=$total+$val;
            array_push($results,$val);
           }
           if($counter>0){
          $avergae=$total/$counter;
           }
           $finalaryy=array(
            'testno'=>$testarry,
            'marks'=>$results,
            'average'=>$avergae
        );
        return response()->json(['results'=>$finalaryy],200);

    }
    //get the data for showing to the teacher
    public static function getsresults($id,$cid){
        return response()->json(['results'=>$id],200);
    }

    public static function getresultsfortable($id,$cid){
        // $arry = DB::select ('SELECT * FROM results WHERE id="'.$id.'" ');
        // $arry = DB::select ('SELECT testdetails.Date,testdetails.Description,results.mark,results.testNo
        //                       FROM results inner join testdetails
        //                        on results.testNo=testdetails.testNo 
        //                        where results.id="'.$id.'"');
        $arry=DB::select ('SELECT testdetails.Date,testdetails.Description,results.mark,results.testNo
         FROM regclass inner join results ON
        regclass.id=results.id inner join testdetails on testdetails.testNO=results.testNo and testdetails.CID=regclass.CID
        where regclass.StudentRegNo="'.$id.'" and regclass.CID="'.$cid.'"');                       
        $marks=[];
        foreach ($arry as $key => $value) {
            $name=array(
                'date'=>$value->Date,
                'test'=>$value->testNo,
                'marks'=>$value->mark,
                'description'=>$value->Description);
            
            array_push($marks,$name);
           }

           return response()->json(['marks'=>$marks],200);

    }
//this is for the insertion of the data 
    public static function setresults(Request $req){
        $path=Storage::disk('public')->put('impot.csv',$req->file);
      
        $excel = PHPExcel_IOFactory::load('uploads/'.$path);
      
        $excel -> setActiveSheetIndex(0);
   
        $i = 1;
        $cid=2;
        $date='2019-10-04';
        $string =$req->Date; 
        $str_arr = explode (" ", $string);  
        $months= ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        $year=$str_arr[3];
        $day=$str_arr[2];
        $month=1;
        foreach ( $months as $key => $value) {
           if($str_arr[1]==$value){
              
               break;
           }
          $month++;
           }
           $date=$year.'-'.$month.'-'.$day;
           $cid=$req->classid;
           $testno=$req->testno;
           $arry = DB::select ('SELECT StudentRegNo,id FROM regclass WHERE CID="'.$cid.'" ');
           $studentclassar=[];
           //create a associative arry for the student and the id
           foreach ( $arry as $key => $value) {
            $studentclassar[$value->StudentRegNo]=$value->id;
            }
     
        //inserting values into the result table
            while ($excel -> getActiveSheet() -> getCell('A'.$i) -> getValue() != "")
            {
              $indexnumber = $excel -> getActiveSheet() -> getCell('A'.$i) -> getValue();
              $result = $excel -> getActiveSheet() -> getCell('B'.$i) -> getValue();
              $count = (int)$indexnumber;

              
              if(array_key_exists($count, $studentclassar)){
                 
               $id= $studentclassar[$count];
                DB::table('results')->insert(
                    ['id'=> $id,'testNo'=>$testno,'mark'=>$result]
                );
              }
             
               $i++;
            }
           //inserting value into the test details table 
           DB::table('testdetails')->insert(
            ['CID'=> $cid,'testNo'=>$testno,'Date'=>$date,'Description'=>$req->description]
        );

        return response()->json(['users'=> 'done'],200);
    }
}
