<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
       return view('home');
   })->middleware('auth');


//// All ROutes that must have authntication for tehsil dargai ////////////

///*********** Group of Routes for  Reception ****************////////
Route::group(['prefix' => 'dargai'],function(){

     Route::get('/reception', [
          'uses' => 'ReceptionDargaiController@index',
          'as' => 'reception'

      ]);

      Route::get('/reception/viewcase', [
      'uses' => 'ReceptionDargaiController@viewCase',
      'as' => 'reception.viewcase'
       ]);

       Route::get('/reception/edit/{id}', [
       'uses' => 'ReceptionDargaiController@edit',
       'as' => 'reception.edit'
        ]);

        Route::post('/reception/store', [
        'uses' => 'ReceptionDargaiController@store',
        'as' => 'reception.store'
         ]);

         Route::post('/reception/update/{id}', [
         'uses' => 'ReceptionDargaiController@update',
         'as' => 'reception.update'
          ]);

         Route::get('/reception/produce/{id}', [
         'uses' => 'ReceptionDargaiController@show',
         'as' => 'reception.produce'
          ]);

});


///*********** Group of Routes for Reception Ends here****************////////

///*********** Group of Routes for Dargai AC   ****************////////

  Route::group(['prefix' => 'AcDargai'],function(){

        Route::get('/dashboard', [

            'uses' => 'AcDargaiController@index',
            'as' => 'AcDargai.dashboard'

        ]);

        Route::get('/dashboard/newCases', [

            'uses' => 'AcDargaiController@view',
            'as' => 'AcDargai.newCases'

        ]);

        Route::get('/dashboard/details/{id}', [

            'uses' => 'AcDargaiController@show',
            'as' => 'AcDargai.detail'

        ]);

        Route::get('/dashboard/nextStep/{id}', [

            'uses' => 'AcDargaiController@create',
            'as' => 'AcDargai.nextStep'

        ]);

        Route::post('/dashboard/store', [

            'uses' => 'AcDargaiController@store',
            'as' => 'AcDargai.store'

        ]);

        Route::get('/dashboard/todyCases',[

             'uses'=> 'AcDargaiController@todayView',
             'as' => 'AcDargai.todayCase'

        ]);

///************ Progress cases route *************///

        Route::get('/dashboard/progressCases',[

             'uses'=> 'AcDargaiController@progressCases',
             'as' => 'AcDargai.progressCases'

        ]);

        Route::get('/dashboard/progressCaseDetail/{id}',[

             'uses'=> 'AcDargaiController@progressCaseDetail',
             'as' => 'AcDargai.progressCaseDetail'

        ]);

        Route::get('/dashboard/progressCaseStepDetail/{case_id}/{step_no}',[

             'uses'=> 'AcDargaiController@progressCaseStepDetail',
             'as' => 'AcDargai.progressCaseStepDetail'

        ]);


        Route::get('/dashboard/message/',[

             'uses'=> 'AcDargaiController@message',
             'as' => 'AcDargai.message'

        ]);


///************ENTER DEFENDANT INFORMATION route *************///

      Route::get('/dashboard/defendentInformation/{id}',[

            'uses' => 'AcDargaiController@defendentData',
            'as' => 'AcDargai.defendentData'
      ]);

      Route::post ('/dashboard/storeDefendentData/',[

            'uses' => 'AcDargaiController@storeDefendentData',
            'as' => 'AcDargai.storeDefendentData'
      ]);


});


///*********** Group of Routes for Dargai AC End Here   ****************////////


///*********** Group of Routes for DC   ****************////////
Route::group(['prefix' => 'admin'],function(){

  Route::get ('/register-user' ,[

        'uses' => 'DcController@registerUser',
        'as' => 'registerUser'
  ]);


  Route::post ('/registered-user',[

        'uses' => 'DcController@register',
        'as' => 'registeredUser'
  ]);

  Route::get ('/showUsers',[

        'uses' => 'DcController@showUsers',
        'as' => 'showUsers'
  ]);

  Route::get ('/deleteUser/{id}',[

        'uses' => 'DcController@deleteUser',
        'as' => 'deleteUser'
  ]);

});



///*********** Group of Routes for DC End Here   ****************////////

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
