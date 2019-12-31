<?php

use Illuminate\Http\Request;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::post('/getItem',['middleware'=>'cors',
    'uses'=>'DataController@bigFile'
]);

Route::get('/getAllCo/{code1}/{code2}',[
    'uses'=>'addCourceController@getAllCources'
]);

Route::post('/InsertNewCourseTosem',['middleware'=>'cors',
    'uses'=>'addCourceController@insertNewCourse'
]);

Route::post('/DeleteCourseFromosem',['middleware'=>'cors',
    'uses'=>'addCourceController@deleteCourse'
]);

Route::get('/getSem/{code}',[
    'uses'=>'addCourceController@getALLSelectedFiledSemesters'
]);

Route::get('/getCour/{code}',[
    'uses'=>'addCourceController@getCourceDetils'
]);
Route::get('/getselMin/{code}',[
    'uses'=>'addCourceController@getAllSelMinors'
]);

Route::post('/tt',[
    'uses'=>'addCourceController@updateCource'
]);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('userLogin','UserController@userlogin');
Route::post('userRegister','UserController@userRegister');
Route::get('getid/{id}','UserController@getid');

Route::group(['middleware'=>'auth:api'],function(){

    Route::get('userDetails','UserController@userDetails');
    Route::get('classDetails','UserController@classDetails');
    Route::post('userlogout','UserController@logout');
    Route::get('/user/{id}', 'userController@getAllUsers');
  
    //teacher 
    Route::get('/Class/{id}', 'userController@getAllclass');
    Route::get('/Clstudent/{id}', 'userController@getAllStudentinclass');
    Route::get('/Clstudent/{id}/{name}', 'userController@getStudentinclass');
    Route::post('/addclass','ClassController@addclass');
    Route::get('/removeclassdetails/{id}','ClassController@getdetails');
    Route::get('/removeclass/{id}/{cid}','ClassController@removeclass');


    //student routes
    Route::get('/StuClass/{id}', 'userController@getallclassofastudent');
    Route::get('/teachers/{id}', 'userController@getallteachers');
    Route::get('/teachersid/{id}', 'userController@getteacherid');
    Route::get('/attendece/{id}/{cid}', 'userController@getAttendence');
    Route::get('/findtheclass/{id}','ClassController@findtheclass');
    Route::post('/saddclass','ClassController@saddclass');
    Route::get('/removesclassdetails/{id}','ClassController@getsdetails');
    Route::get('/removesclass/{id}/{cid}','ClassController@removesclass');
    Route::get('/getupcomingevent/{id}/{user}','ClassController@getupcomingevent');
    
    Route::get('/getusername/{id}/{user}','UserController@getusername');
    Route::get('/getusernamen/{id}/{user}','UserController@getusernamen');
    
    
 

    //results 
    

});
Route::get('/getD',[
    'uses'=>'addCourceController@getAllDataFromDepartment'
]);
Route::get('/getProfileData/{userName}','userController@getprofiledetails');

Route::post('/imageUpload', 'userController@imageUploades');
Route::post('/fileUpload', 'Attendence@fileUploades');
Route::post('/addresult', 'resultsController@setresults');
Route::post('/profileEdit', 'userController@profileEdit');

Route::get('/sgetmarks/{id}/{cid}', 'resultsController@getresults');
Route::get('/getmarks/{id}/{cid}', 'resultsController@getresults');
Route::get('/getmarkstable/{id}/{cid}', 'resultsController@getresultsfortable');
Route::get('/getcontent/{id}', 'contentController@getcontent');
Route::post('/addcontent', 'contentController@addcontent');

Route::post('/addmsg', 'MsgController@addmsg');
Route::get('/getfeedback/{id}', 'MsgController@getfeedback');
