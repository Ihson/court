<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\C_case;
use App\Prod_ejact;
use App\partitio_app;
use App\regular;
use App\Client;
use Carbon\Carbon;
use App\Lawyer;
use App\partition_step;
use App\produce_step;
use DB;

class AcDargaiController extends Controller
{


    public function index()
    {
        return view('AC.ACDargai.dashboard');
    }

    public function view()
    {
          //*************MAjor quuery to retrive result from a specific tehsil  ***********//
          //*********** and specific court with step no == 1 ***********////
          $date = new Carbon;
          $date->subdays(2);
// change is made here
          $user_tehsil = Auth::user()->tehsil;
          $user_role = Auth::user()->role;
           $p_data = C_case::where('tehsil','=', $user_tehsil)->where('Court_id','=', $user_role)
                              ->join('partitio_apps','C_cases.Case_id','=','partitio_apps.Case_id')
                              ->where('step_no','!=','1')
                              ->get();

           $part_array = array();

            if (!empty($p_data)) {

                foreach ($p_data as $value) {

                        $part_array[] = $value->Case_id;

                   }

            $part_data = partitio_app::whereNotIn('Case_id',$part_array)->get();

           }
           else {
               $part_data=partitio_app::get();

                 }

// updated query with user_role and tehsil
       $pro_data = C_case::where('tehsil','=', $user_tehsil)->where('Court_id','=', $user_role)
                                ->join('prod_ejacts','C_cases.Case_id','=','prod_ejacts.Case_id')
                                ->where('step_no','!=','1')
                                ->where('prod_ejacts.created_at', '>', $date->toDateTimeString())
                                ->get();



      $prod_array = array();

       if (count($pro_data) > 0) {

             foreach ($pro_data as $value) {

                     $prod_array[] = $value->Case_id;



                  }


                $prod_data = prod_ejact::whereNotIn('Case_id',$prod_array)->get();

  }
        else {
                $prod_data=prod_ejact::get();



              }




// updated query with user_role and tehsil
            $reg_data = C_case::where('tehsil','=',$user_tehsil)->where('Court_id','=',$user_role)
                                     ->join('regulars','C_cases.Case_id','=','regulars.Case_id')
                                     ->where('step_no','!=','0')
                                     ->get();

           $reg_array = array();

            if (!empty($reg_data)) {

                  foreach ($reg_data as $value) {

                      $reg_array[] = $value->Case_id;

                       }

                  $regular_data = regular::whereNotIn('Case_id',$reg_array)->get();

           }
           else {
                   $regular_data=regular::get();



                 }

              return view('AC.ACDargai.view')->with('part_data',$part_data)
                                             ->with('prod_data',$prod_data)
                                             ->with('regular_data',$regular_data);


    }



    public function create($id)
    {
       $data = C_case::find($id);

  // added these 2 lines
       $user_tehsil = Auth::user()->tehsil;
       $user_role = Auth::user()->role;
       $step_no = 0;//newly created
//************IF THE CASE TYPE IS PRODUCE AND EJACTMENT ********************/////
        if ($data->Case_type == 1) {
// query updated
          $prod_data = C_case::where('tehsil','=', $user_tehsil)->where('Court_id','=',$user_role)
                             ->join('prod_ejacts','C_cases.Case_id','=','prod_ejacts.Case_id')
                             ->where('prod_ejacts.Case_id',$id)
                             ->get();

          foreach ($prod_data as $data)
          {

            $step_no = $data->step_no;

          }
          $case_data = prod_ejact::where('step_no',$step_no)->get();
          $step_no = $step_no + 1;

          $step_data = produce_step::find($step_no);

          return view('AC.ACDargai.nextStep')->with('data',$data)
                                             ->with('prod_data',$prod_data)
                                             ->with('case_data',$case_data)
                                             ->with('step_data',$step_data);

        }

//************IF THE CASE TYPE IS PARTITION APPLICATION ********************/////

         if ($data->Case_type == 2) {
//query updated
              $part_data = C_case::where('tehsil','=',$user_tehsil)
                               ->where('Court_id', '=',$user_role)
                               ->join('partitio_apps','C_cases.Case_id','=','partitio_apps.Case_id')
                               ->where('partitio_apps.Case_id',$id)
                               ->get();

               foreach ($part_data as $data)
                {

                    $step_no = $data->step_no;

                  }
               $case_data = partitio_app::where('step_no',$step_no)->get();

               $step_no = $step_no + 1;

               $step_data = partition_step::find($step_no);

               return view('AC.ACDargai.nextStep')->with('data',$data)
                                                  ->with('part_data',$part_data)
                                                  ->with('case_data',$case_data)
                                                  ->with('step_data',$step_data);

       }

       //************IF THE CASE TYPE IS Regular Cases ********************/////

       if ($data->Case_type != 1 && $data->Case_type != 2)  {
//query updated
         $regular_data = C_case::where('tehsil','=', $user_tehsil)
                              ->where('Court_id','=',$user_role)
                              ->join('regulars','C_cases.Case_id','=','regulars.Case_id')
                              ->where('regulars.Case_id',$id)
                              ->get();

          foreach ($regular_data as $data)
          {

            $step_no = $data->step_no;

          }

          $step_no = $step_no + 1;

          return view('AC.ACDargai.nextStep')->with('data',$data)
                                             ->with('r_data',$regular_data)
                                             ->with('step' , $step_no);
       }



    }


    public function store(Request $request)
    {

        $this->validate($request , [
          'details' => 'required',
          'hearingDate' =>'required',
        ]);

        $data = C_case::find($request->Case_id);

        if ($data->Case_type == 1 ) {
          // inserting data into prode_ejact table  //////////
             $step_no = $request->step_no;
             $prod_data = prod_ejact::create([

                             'details' => $request->description,
                             'case_title' => $request->case_title,
                             'step_title'=> $request->step_title,
                             'Case_id' => $request->Case_id,
                             'details'=> $request->details,
                             'order_sheet' => $request->ordersheet,
                             'hearing_date' =>  $request->hearingDate,
                             'step_no' => $step_no,
                             'remarks' => $request->remarks
                            ]);
        }

        if ($data->Case_type == 2 ) {
          // inserting data into partitio_app table  //////////
             $step_no = $request->step_no;
             $part_data = partitio_app::create([

                             'details' => $request->description,
                             'case_title' => $request->case_title,
                             'step_title'=> $request->step_title,
                             'Case_id' => $request->Case_id,
                             'details'=> $request->details,
                             'order_sheet' => $request->ordersheet,
                             'hearing_date' => $request->hearingDate,
                             'step_no' => $step_no,
                             'remarks' => $request->remarks
                            ]);
        }

        if ($data->Case_type != 1 && $data->Case_type != 2) {
          // inserting data into prode_ejact table  //////////
            $step_no = $request->step;
             $prod_data = regular::create([

                             'details' => $request->description,
                             'Case_id' => $request->Case_id,
                             'case_title' => $request->case_title,
                             'step_title'=> $request->step_title,
                             'details'=> $request->details,
                             'order_sheet' => $request->ordersheet,
                             'hearing_date' =>  $request->hearingDate,
                             'step_no' => $step_no,
                             'title' => $request->title,
                              'remarks' => $request->remarks
                            ]);

        }
        return view('AC.ACDargai.dashboard');
    }



    public function show($id)
    {


            $type = C_case::find($id);
            $p_data =C_case::find($id)->clients->where('type','=','p')->first();
            $d_data =C_case::find($id)->clients->where('type','=','d')->first();
            $l_data = C_case::find($id)->lawyer->first();


            if($type->Case_type == 1){
              $data = prod_ejact::find($id);


              return view('AC.ACDargai.detail')->with('data' , $data)
                                                     ->with('p_data' , $p_data)
                                                     ->with('d_data' , $d_data)
                                                     ->with('l_data' , $l_data)
                                                     ->with('case_data' , $type);
            }

            else if($type->Case_type == 2){
              $data = partitio_app::find($id);


              return view('AC.ACDargai.detail')->with('data', $data)
                                                  ->with('p_data' , $p_data)
                                                  ->with('d_data' , $d_data)
                                                  ->with('l_data' , $l_data)
                                                  ->with('case_data' , $type);
            }

            else if($type->Case_type != 1 && $type->Case_type != 2 ){
              $data = regular::find($id);

              return view('AC.ACDargai.detail')->with('data', $data)
                                                  ->with('p_data' , $p_data)
                                                  ->with('d_data' , $d_data)
                                                  ->with('l_data' , $l_data)
                                                  ->with('case_data' , $type);
            }
    }

    public function TodayView(){

        $user_tehsil = Auth::user()->tehsil;
        $user_role = Auth::user()->role;

          $date = new Carbon;
          $formatteddate =Carbon::createFromFormat('Y-m-d H:i:s', $date->now())->format('Y-m-d');

// new query
          $case_data = C_case::where('tehsil','=',$user_tehsil)
                                ->where('Court_id', '=',$user_role)
                                ->get();

// updated code
       if( $case_data->isEmpty() ){
             return view('AC.ACDargai.today')->with('status','0');
       }
       else{
          $prod_data = prod_ejact::where('Case_id','=',$case_data->Case_id)
                                    ->where('hearing_date' , $formatteddate )
                                    ->get();


          $part_data = partitio_app::where('Case_id','=',$case_data->Case_id)
                                   ->where('hearing_date' , $formatteddate )
                                   ->get();



          $regular  = regular::where('Case_id','=',$case_data->Case_id)
                                   ->where('hearing_date' , $formatteddate )
                                   ->get();



           return view('AC.ACDargai.today')->with('prod_data' , $prod_data)
                                           ->with('part_data' , $part_data)
                                           ->with('regular' , $regular);
        }
    }

    /////*************funtion to displaying progrss cases *****************//

        public function progressCases(){

          $user_tehsil = Auth::user()->tehsil;
          $user_role = Auth::user()->role;

          $prod_data = C_case::where('tehsil','=',$user_tehsil)
                                  ->where('Court_id','=',$user_role)
                                  ->join('prod_ejacts','C_cases.Case_id','=','prod_ejacts.Case_id')
                                  ->where("prod_ejacts.step_no",1)
                                  ->get();

           $part_data = C_case::where('tehsil','=',$user_tehsil)
                                  ->where('Court_id','=' ,$user_role)
                                  ->join('partitio_apps','C_cases.Case_id','=','partitio_apps.Case_id')
                                  ->where("partitio_apps.step_no",1)
                                  ->get();

           $regular_data = C_case::where('tehsil','=',$user_tehsil)
                                 ->where('Court_id','=' ,$user_role)
                                 ->join('regulars','C_cases.Case_id','=','regulars.Case_id')
                                 ->where('regulars.step_no', 0)
                                 ->get();


            return view('AC.ACDargai.progressCases')->with('prod_data', $prod_data)
                                                    ->with('part_data', $part_data)
                                                    ->with('regular_data', $regular_data);

        }

      /////*************function to displaying progrss cases END HERE *****************//

  /////*************function to displaying progrss case Detail  *****************//

     public function progressCaseDetail($id){

           $user_tehsil = Auth::user()->tehsil;
           $user_role = Auth::user()->role;


            $prod_data = C_case::where('tehsil','=',$user_tehsil)->where('Court_id', '=',$user_role)
                               ->join('prod_ejacts','C_cases.Case_id','=','prod_ejacts.Case_id')
                               ->where('prod_ejacts.Case_id',$id)
                               ->get();

             $part_data = C_case::where('tehsil','=',$user_tehsil)->where('Court_id', '=',$user_role)
                                ->join('partitio_apps','C_cases.Case_id','=','partitio_apps.Case_id')
                                ->where('partitio_apps.Case_id',$id)
                                ->get();

            $regular_data = C_case::where('tehsil','=',$user_tehsil)->where('Court_id', '=',$user_role)
                                 ->join('regulars','C_cases.Case_id','=','regulars.Case_id')
                                 ->where('regulars.Case_id',$id)
                                 ->get();

          return view('AC.ACDargai.progressCaseDetail')->with('part_data',$part_data)
                                                       ->with('prod_data',$prod_data)
                                                       ->with('regular_data',$regular_data);
     }

  /////*************funtion to displaying progrss case Detail END HERE *****************//

  /////*************funtion to displaying progrss case each step Details  *****************//

    public function progressCaseStepDetail($case_id , $step_no){

       $case_data = C_case::find($case_id);

       if ($case_data->Case_type == 1) {

           $data = prod_ejact::where('Case_id',$case_id)->where('Step_no',$step_no)->get();

           return view('AC.ACDargai.progressCaseStepDetail')->with('data',$data);

       }

      elseif ($case_data->Case_type == 2) {

          $data = partitio_app::where('Case_id',$case_id)->where('Step_no',$step_no)->get();

          return view('AC.ACDargai.progressCaseStepDetail')->with('data',$data);
      }

      else {

        $data = regular::where('Case_id',$case_id)->where('Step_no',$step_no)->get();

        return view('AC.ACDargai.progressCaseStepDetail')->with('data',$data);

      }


      }

  /////*************funtion to displaying progrss case EACH STEP  DetailS END HERE *****************//

    /////*************funtion TO DISPLAY ALL THE CASES TO WHICH SMS SHOULD BE SEND  *****************//

  public function message(){

    $user_tehsil = Auth::user()->tehsil;
    $user_role = Auth::user()->role;


    $case_data = C_case::where('tehsil','=',$user_tehsil)
                          ->where('Court_id', '=',$user_role)
                          ->get();

    if($case_data->isEmpty()){
         return view('AC.ACDargai.message')->with('value','0');
    }

    else{
      $newDate = Carbon::now()->addDays(1);


      $formatteddate =Carbon::createFromFormat('Y-m-d H:i:s', $newDate)->format('Y-m-d');

      $prod_data = prod_ejact::where('Case_id','=',$case_data->Case_id)
                               ->where('hearing_date' , $formatteddate )->get();


      $part_data = partitio_app::where('Case_id','=',$case_data->Case_id)
                                 ->where('hearing_date' , $formatteddate )->get();


      $regular = regular::where('Case_id','=',$case_data->Case_id)
                          ->where('hearing_date' , $formatteddate )->get();

      return view('AC.ACDargai.message')->with('prod_data' , $prod_data)
                                        ->with('part_data' , $part_data)
                                        ->with('regular' , $regular);


}

  }


  /////*************funtion TO DISPLAY ALL THE CASES TO WHICH SMS SHOULD BE SEND  END HERE *****************//





  /////*************  FUNCTION TO ASK USER FOR ENTERING DEFENDENT DATA *****************//

   public function defendentData($id){

          return view('AC.ACDargai.defendentInformation')->with('id',$id);

   }

   public function storeDefendentData(Request $request){

           $this->validate($request , [

                  'dname'=> 'required',
                  'd_phone_no'=> 'required',
                  'lname'=> 'required',
                  'l_phone_no'=> 'required',

          ]);



        $data = lawyer::create([

              'name' => $request->lname,
              'phone_no' =>$request->l_phone_no,
              'type' => 'd'

        ]);
        $id = $request->id;
        $data->case_l()->attach(array($id));

        $d_data = Client::where('Case_id',$id)->where('type', 'd');

        foreach ($d_data as $d_data) {

                  $d_data->name = $request->lname;
                  $d_data->phone_no = $request->d_phone_no;

        }

        $d_data->save();
        return redirect();


   }

    /////*************  FUNCTION TO ASK USER FOR ENTERING DEFENDENT DATA HERE*****************//

}
