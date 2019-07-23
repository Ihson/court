<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\C_case;
use App\Prod_ejact;
use App\partitio_app;
use App\regular;
use App\Client;
use Carbon\Carbon;
use App\Lawyer;

class ReceptionDargaiController extends Controller
{




    public function index()
    {


        return view('Dargai.Reception.index');
    }

    public function store(Request $request)
    {

 ;

             $this->validate($request, [

               'name'=> 'required',
               'address'=> 'required',
               'phone_no'=> 'required',
               'type'=> 'required',
               'lname'=> 'required',
               'dname'=> 'required',
               'daddress'=> 'required',

               'title' => 'required',
               'description' => 'required',
               'Court' => 'required'
             ]);
            $tehsil=Auth::user()->tehsil;
             $p_data = Client::create([
               'name' => $request->name,
               'address' => $request->address,
               'phone_no' => $request->phone_no,
               'type' => 'p'
           ]);

           $d_data = Client::create([

             'name' => $request->dname,
             'address' => $request->daddress,
             'type' => 'd'
           ]);


           if($request->type == 1){
//inserting data to case table

             $c_data = C_case::create([

               'Case_type' => $request->type,
               'Court_id' => $request->Court,
               'tehsil' => $tehsil

              ]);

              $case_id = $c_data->Case_id;



// inserting data into prode_ejact table  //////////
              $prod_data = prod_ejact::create([

                'details' => $request->description,
                'case_title' => $request->title,
                'Case_id' => $case_id


               ]);


           }

           else if($request->type == 2){

             $c_data = C_case::create([

               'Case_type' => $request->type,
                'Court_id' => $request->Court,
                'tehsil' => $tehsil

              ]);

              $case_id = $c_data->Case_id;
              //echo($case_id);
              // inserting data into partition table  //////////
              $part_data = partitio_app::create([
                'Case_id' => $case_id,
                'details' => $request->description,
                'case_title' => $request->title,



               ]);


           }

           else if($request->type != 1 && $request->type != 2){

             $c_data = C_case::create([

               'Case_type' => $request->type,
                'Court_id' => $request->Court,
                'tehsil' => $tehsil

              ]);

              $case_id = $c_data->Case_id;

         // inserting data into regular cases table  //////////
              $prod_data = regular::create([

                'details' => $request->description,
                'case_title' => $request->title,
                'Case_id' => $case_id


               ]);


           }
       //// *********************** insert data into lawyer table *******************/////////


               $l_data = Lawyer::create([

                          'name' => $request->lname,
                          'phone_no' => $request->lphone,
                          'type' => 'p'

                   ]);

            $p_id = $p_data->Client_id; // p_id store of planttiff client
            $d_id = $d_data->Client_id; // p_id store of dependent client
            $l_id  = $l_data->id;       // p_id store of lawyer
            $arr = array( $p_id , $d_id ); // array contain id of palntiff and dependent
            //$all = array( $l_id ); // array contain id of palntiff and dependent

            $c_data->clients()->attach($arr);

            $l_data->case_l()->attach(array($case_id));
           //
            return redirect()->back();


    }

    /****************************  view all todays cases   **************/

    public function viewCase(){

      $user_tehsil= Auth::user()->tehsil;


      $all = C_case::where('tehsil','=',$user_tehsil)->whereDate('created_at', Carbon::today())->get();
        //$all = C_case::all();

        $id = $all->pluck('Case_id');

    //****************** get all casese of partition application generated today ****************?//////

            $part = partitio_app::whereIn('Case_id', $id)->get();


    //************* get all produce and ejactment cases generated today ***********************//

            $prod = prod_ejact::whereIn('Case_id',$id)->get();

    //**************** get all regular casess generated today *********************************/////////////

            $regular = regular::whereIn('Case_id', $id)->get();



      return view('Dargai.Reception.viewCases')->with('part' , $part)
                                               ->with('prod' , $prod)
                                               ->with('regular' , $regular);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

      $type = C_case::find($id);
      $p_data =C_case::find($id)->clients->where('type','=','p')->first();
      $d_data =C_case::find($id)->clients->where('type','=','d')->first();
      $l_data = C_case::find($id)->lawyer->first();


      if($type->Case_type == '1'){
        $data = prod_ejact::find($id);


        return view('Dargai.Reception.produce')->with('data' , $data)
                                               ->with('p_data' , $p_data)
                                               ->with('d_data' , $d_data)
                                               ->with('l_data' , $l_data)
                                               ->with('case_data' , $type);
      }

      else if($type->Case_type == '2'){
        $data = partitio_app::find($id);


        return view('Dargai.Reception.produce')->with('data', $data)
                                            ->with('p_data' , $p_data)
                                            ->with('d_data' , $d_data)
                                            ->with('l_data' , $l_data)
                                            ->with('case_data' , $type);
      }

      else if($type->Case_type != '1' && $type->Case_type != '2'){
        $data = regular::find($id);


        return view('Dargai.Reception.produce')->with('data', $data)
                                            ->with('p_data' , $p_data)
                                            ->with('d_data' , $d_data)
                                            ->with('l_data' , $l_data)
                                            ->with('case_data' , $type);
      }


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $type = C_case::find($id);

        $p_data =C_case::find($id)->clients->where('type','=','p')->first();
        $d_data =C_case::find($id)->clients->where('type','=','d')->first();
        $l_data = C_case::find($id)->lawyer->first();

          if($type->Case_type == '1'){
            $data = prod_ejact::find($id);


            return view('Dargai.Reception.edit')->with('data' , $data)
                                                ->with('p_data' , $p_data)
                                                ->with('d_data' , $d_data)
                                                ->with('l_data' , $l_data)
                                                ->with('case_data' , $type);
          }

          else if($type->Case_type == '2'){
            $data = partitio_app::find($id);


            return view('Dargai.Reception.edit')->with('data', $data)
                                                ->with('p_data' , $p_data)
                                                ->with('d_data' , $d_data)
                                                ->with('l_data' , $l_data)
                                                ->with('case_data' , $type);
          }

          else if($type->Case_type != '1' && $type->Case_type != '2'){
            $data = regular::find($id);


            return view('Dargai.Reception.edit')->with('data', $data)
                                                ->with('p_data' , $p_data)
                                                ->with('d_data' , $d_data)
                                                ->with('l_data' , $l_data)
                                                ->with('case_data' , $type);
          }


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

                   $this->validate($request, [

                     'name'=> 'required',
                     'address'=> 'required',
                     'phone_no'=> 'required',
                     'lname'=> 'required',
                     'dname'=> 'required',
                     'daddress'=> 'required',

                     'title' => 'required',
                     'description' => 'required',
                     'Court' => 'required'
                   ]);

            $case_data = C_case::find($id);


             $case_data->Court_id = $request->Court;

             $case_data->save();

             $p_data =C_case::findOrFail($id)->clients->where('type','=','p')->first();
             $d_data =C_case::findOrFail($id)->clients->where('type','=','d')->first();
             $l_data =C_case::findOrFail($id)->lawyer->first();

             $p_data->name = $request->name;
             $p_data->address = $request->address;
             $p_data->phone_no = $request->phone_no;
             $d_data->name = $request->lname;
             $d_data->address = $request->daddress;

             $l_data->name =$request->lname;
             $l_data->phone_no =$request->lphone;

             $p_data->save();
             $d_data->save();
             $l_data->save();

             if ($case_data->Case_type == 1) {

                  $prod_data = prod_ejact::findOrFail($id);

                  $prod_data->case_title = $request->title;
                  $prod_data->details = $request->description;

                  $prod_data->save();

             }

             else if ($case_data->Case_type == 2) {

                  $part_data = partitio_app::findOrFail($id);

                  $part_data->case_title = $request->title;
                  $part_data->details = $request->description;

                  $part_data->save();

             }

             else if ($case_data->Case_type != '1' && $case_data->Case_type != '2') {

                  $regular_data = regular::findOrFail($id);

                  $regular_data->case_title = $request->title;
                  $regular_data->details = $request->description;

                  $regular_data->save();

             }

        return redirect()->route('reception.viewcase');
    }

  




}
