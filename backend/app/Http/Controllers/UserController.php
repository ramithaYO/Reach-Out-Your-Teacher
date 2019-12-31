<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Validator;


//for exel file
use Maatwebsite\Excel\Facades\Excel;

//use App\Http\Controllers\Controller;
use PHPExcel; 
use PHPExcel_IOFactory;

use Illuminate\Support\Facades\Storage;
use File;

class UserController extends Controller
{
    public function userLogin(Request $request){
      $validator = Validator::make($request->all(), [
      'email'=>'required|email',
      'password'=>'required'
      ]);

      if($validator->fails()){
          return response()->json(['error'=>$validator->errors()],401);
      }
      if(Auth::attempt(['email'=>request('email'), 'password'=>request('password')])){
          $user=Auth::user();
          $success['token']=$user->createToken('MyApp')->accessToken;
          return response()->json(['success'=>$success],200);

      }
      else{
        return response()->json(['error'=>'Unauthorised'],401);
      }
    }

    public function userRegister(Request $request){
        $validator = Validator::make($request->all(), [
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required',
            'c_password'=>'required|same:password',
            ]);
            if($validator->fails()){
                return response()->json(['error'=>$validator->errors()],401);
            }

         $input=$request->all();
         $input['password']=bcrypt( $input['password']);
         $user=User::create($input);
         $success['token'] = $user->createToken('MyApp')->accessToken;
         $success['name'] = $user->name;
         $users = DB::select ('SELECT * FROM users where id in (SELECT MAX(id) FROM users)');
         $usersid=$users[0]->id;
         if($users[0]->name=='teacher'){
            $success['usercareer'] ='teacher';
        DB::table('teacher')->insert(
            ['TID'=>$users[0]->id]
        );     
    }
    if($users[0]->name=='student'){
        $success['usercareer'] ='student';
        DB::table('student')->insert(
            ['StudentRegNo'=>$users[0]->id]
        );

         
    }
    $success['userid'] = $usersid;
   
    
         return response()->json(['success'=>$success],200);
    }

    public static function getAllUsers($id){
        // $users = DB::select ('select * from  class where CID="'.$id.'"');
        $users = DB::select ('SELECT class.ClassName,class.CID,class.Place,class.Date,class.Cfee 
        FROM conductclass INNER JOIN class ON conductclass.CID=class.CID 
        where conductclass.TID="'.$id.'" ');
    //    dd($users);

        return response()->json(['users'=>$users],200);
    }


    public function userDetails(){
        $users= User::get();
        return response()->json(['success'=>$users],200);   
    }


    public function logout(){
       auth()->user()->tokens->each(function($token,$key){

        $token->delete();
       }); 
       return response()->json('logged out successfully',200);   
    }
    public function classDetails(){
        $users = DB::select ('select * from  class');
      
    
        return response()->json(['users'=>$users],200);
    }

    public function getAllclass($id){
        $users= DB::select ('SELECT CID from  conductclass where TID="'.$id.'"');
        return response()->json(['users'=>$users],200);
    }


    public function getAttendence($id,$cid){
        // $clz=DB::select ('SELECT id from  regclass where StudentRegNo="'.$id.'" and CID="'.$cid.'"');
        
        $clz=DB::select ('SELECT  * from  attendence_details where StudentRegNo="'.$id.'" and CID="'.$cid.'"');

        $results=[];
        $var=true;
        foreach ($clz as $key => $value) {
            $array=array(
                'isActive'=>$value->Attendence,
                "Date"=>$value->Date
            );
            array_push($results,$array);
        }
       
        return response()->json(['results'=>$results]);
    }
    public function getAllStudentinclass($id){
        $users= DB::select ('SELECT student.StudentRegNo,student.Address,student.Name,student.Lname,student.Tel_No
        FROM student
        INNER JOIN regclass
        ON student.StudentRegNo = regclass.StudentRegNo
        where CID="'.$id.'"');
        return response()->json(['users'=>$users],200);
    }
    public function getallteachers($id){
        $users=DB::select('SELECT teacher.Name,teacher.Description,teacher.ContNo
        FROM ((regclass
        INNER JOIN conductclass ON regclass.CID = conductclass.CID)
        INNER JOIN teacher ON conductclass.TID = teacher.TID)
        where regclass.StudentRegNo="'.$id.'"');
        return response()->json(['users'=>$users],200);
    }
    public function getteacherid($id){
        $teachersarry=[];
     $users=DB::select('SELECT teacher.Name,teacher.TID,teacher.Lname
        FROM ((regclass
        INNER JOIN conductclass ON regclass.CID = conductclass.CID)
        INNER JOIN teacher ON conductclass.TID = teacher.TID)
        where regclass.StudentRegNo="'.$id.'"');
      

        foreach ($users as $key => $value) {
            $name=array(
                'first'=>$value->Name,
                'last'=>$value->Lname);
            $array=array(
                 'name'=>$name,
                 'id'=>$value->TID,
            );
            array_push($teachersarry,$array);
           }
    
    
          
            return response()->json(['users'=>$teachersarry],200);
    }
    public function getStudentinclass($id,$name){
        $users=DB::select('SELECT student.StudentRegNo,student.Address,student.Name,student.Lname,student.Tel_No
        FROM student
        INNER JOIN regclass
        ON student.StudentRegNo = regclass.StudentRegNo
        where regclass.CID="'.$id.'" && student.Name="'.$name.'"');
        return response()->json(['users'=>$users],200);
    }
   
     public function getid($id){

        $users=DB::select('
        SELECT users.id,users.name
        FROM users
        where users.email="'.$id.'"');
        //recently added code 
        $result=0;
        if (!empty($users)) {
          $result=$users[0];
        }
        //before return response()->json(['users'=>$users[0]],200);
        //end of the recently added code 
        return response()->json(['users'=>$result],200);
     }
     public function getallclassofastudent($id){
        $users=DB::select('SELECT class.CID,class.ClassName,class.SubName,class.Date,class.Cfee,class.Place, teacher.Name,teacher.ContNo
        FROM (((regclass
        INNER JOIN class ON regclass.CID = class.CID)
        INNER JOIN conductclass ON regclass.CID = conductclass.CID)
        INNER JOIN teacher ON conductclass.TID = teacher.TID)
        where regclass.StudentRegNo="'.$id.'"');
        return response()->json(['users'=>$users],200);
     }


   public function profileEdit(Request $req){
       if($req->usercarrer=='teacher'){
    DB::table('teacher')
    ->where('TID',$req->userid)
    ->update(['Name'=>$req->Fname,'Description'=>$req->info,'ContNo'=>$req->contactNumber,'Lname'=>$req->Lname]);
       }
       else{
        DB::table('student')
        ->where('StudentRegNo',$req->userid)
        ->update(['Name'=>$req->Fname,'Tel_No'=>$req->contactNumber,'Lname'=>$req->Lname,'Address'=>$req->info]);  
       }
    return response()->json(['users'=>$req->usercarrer],200);
   }

   

     //image 
     public static function imageUploades(Request $req){
        if ($req['pimage']!='pqr') {
            # code...
            UserController::updateDP($req['pimage'],$req['userName']);
           // 
        }
 
    

     return response()->json(['message'=>"done"]);
    }

   public static function getusername($id,$user){
       $users=[];
     if($user=='teacher'){
        $users=DB::select('
        SELECT Name,Lname
        FROM teacher
        where teacher.TID="'.$id.'"');
     }
     else{
        $users=DB::select('
        SELECT Name,Lname
        FROM student
        where student.StudentRegNo="'.$id.'"');
     }
    $name=$users[0]->Name.' '.$users[0]->Lname;
     return response()->json(['username'=>$name],200);
   }

   public static function getusernamen($id,$user){
    $users=[];
  if($user=='teacher'){
     $users=DB::select('
     SELECT Name
     FROM teacher
     where teacher.TID="'.$id.'"');
  }
  else{
     $users=DB::select('
     SELECT Name
     FROM student
     where student.StudentRegNo="'.$id.'"');
  }
 $name=$users[0]->Name;
  return response()->json(['username'=>$name],200);
}

     public static function updateDP($file,$userName){
        try{
          
           
          //  dd("stop");
           if (!empty($file)){
             
                
              
               
              if($file->isValid()){
              
                $path= $userName.'.png';
           
               Storage::disk('public')->put($path,file_get_contents($file));
             
                return true;
              }
              
              
            
               
       
           } 
       }
       catch (\Exception $e){

           Log::error($e->getMessage()); 

           return response()->json(['message'=>"Error at adding new item to order", "order_id"=>$this->order->id],500);
      
    
       }
    }



    public static function getprofiledetails($userName){
        

        $usercareer=DB::select('SELECT users.name FROM users where id="'.$userName.'"');
        $Lname="";
        $Fname="";
        $pimage="";
        $image="";
       // $userName="";
        $contactNumber="0713885668";
        $std1="taxila central college";
        $std2="university of sri jayaweradenaprwa";
        $wat="NONE";
        $facebook="ww.facebook.com";
        $youtube="www.youtube.com";
        $linkedin="www.linkdin.com";
        $info="";
        $email="ramitha";
        $nuser=[];
        $email1=DB::select('SELECT email FROM users WHERE id="'.$userName.'"');
        $email=$email1[0]->email;
       if($usercareer[0]->name=='teacher'){
        $nuser=DB::select('SELECT * FROM teacher where TID="'.$userName.'"');
       
        if(sizeof($nuser)>0 && $nuser[0]->Name){
        $info=$nuser[0]->Description;
        $Fname=$nuser[0]->Name;
        $Lname=$nuser[0]->Lname;
    }
        
       }
       else{
        $nuser=DB::select('SELECT * FROM student where StudentRegNo="'.$userName.'"');
        if(sizeof($nuser)>0 && $nuser[0]->Name){
        $Fname=$nuser[0]->Name;
        $Lname=$nuser[0]->Lname;
        $info=$nuser[0]->Address;
       
        }

       }
      

        $path = public_path('uploads/'.$userName.'.png');
        $userName="ramitha";
       

        if (File::exists($path)) {
           $pimage="pqr";
          
        }
        
            $image="pqr";
        
    

        


        return response()->json(
            [
               
                'email'=>$email,
                'Fname'=> $Fname ,
                'Lname'=>$Lname,
                'pimage'=>$pimage,
                'userName'=>$userName,
                'contactNumber'=>$contactNumber,
                'std1'=>$std1,
                'std2'=>$std2,
                'wat'=>$wat,
                'facebook'=>$facebook,
                'youtube'=>$youtube,
                'linkedin'=>$linkedin,
                'info'=>$info
            ]
        );

        

    }
}
