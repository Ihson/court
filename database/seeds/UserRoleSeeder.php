<?php

use Illuminate\Database\Seeder;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      App\produce_step :: create([

          'step_no' => '1',
          'title' => 'filling of plaint',
          'timelimit' => '0 weeks'

      ]);

      App\produce_step :: create([

          'step_no' => '2',
          'title' => 'summon of dependent',
          'timelimit' => '3 weeks'

      ]);

      App\produce_step :: create([

          'step_no' => '3',
          'title' => 'ADR:proceeding',
          'timelimit' => '4 weeks'

      ]);


      App\produce_step :: create([

          'step_no' => '4',
          'title' => 'written statement',
          'timelimit' => '4 weeks'

      ]);



      App\produce_step :: create([

          'step_no' => '5',
          'title' => 'framming of issue',
          'timelimit' => '2 weeks'

      ]);

      App\produce_step :: create([

          'step_no' => '6',
          'title' => 'Plaintiff evidence',
          'timelimit' => '6 weeks'

      ]);


      App\produce_step :: create([

          'step_no' => '7',
          'title' => ' defendent evidence',
          'timelimit' => '6 weeks'

      ]);


      App\produce_step :: create([

          'step_no' => '8',
          'title' => 'disposal of miscellaneous application',
          'timelimit' => '4 weeks'

      ]);


      App\produce_step :: create([

          'step_no' => '9',
          'title' => 'appointment of commission',
          'timelimit' => '2 weeks'

      ]);


      App\produce_step :: create([

          'step_no' => '10',
          'title' => 'commission report',
          'timelimit' => '4 weeks'

      ]);


      App\produce_step :: create([

          'step_no' => '11',
          'title' => 'arguments',
          'timelimit' => '3 weeks'

      ]);


      App\produce_step :: create([

          'step_no' => '12',
          'title' => 'judgment',
          'timelimit' => '2 weeks'

      ]);


      App\produce_step :: create([

          'step_no' => '13',
          'title' => 'parcha degree',
          'timelimit' => '2 weeks'

      ]);

      App\produce_step :: create([

          'step_no' => '14',
          'title' => 'execution',
          'timelimit' => '0 weeks'

      ]);

      App\produce_step :: create([

          'step_no' => '15',
          'title' => 'warrent of possession',
          'timelimit' => '1 day'

      ]);

//////************ start seeding of partition cases *********/////////

          App\partition_step :: create([

              'step_no' => '1',
              'title' => 'filling of application of partition',
              'timelimit' => '0 weeks'

              ]);

          App\partition_step :: create([

                  'step_no' => '2',
                  'title' => 'summon to respondents',
                  'timelimit' => '4 weeks'

                  ]);


            App\partition_step :: create([

                      'step_no' => '3',
                      'title' => 'ADR:proceedings',
                      'timelimit' => '2 weeks'

                      ]);




              App\partition_step :: create([

                          'step_no' => '4',
                          'title' => 'written reply on main application',
                          'timelimit' => '3 weeks'

                          ]);


                App\partition_step :: create([

                              'step_no' => '5',
                              'title' => 'model of partition',
                              'timelimit' => '1 weeks'

                              ]);

                  App\partition_step :: create([

                                'step_no' => '6',
                                'title' => 'disposal of miscellaneous applications',
                                'timelimit' => '4 weeks'

                            ]);


                  App\partition_step :: create([

                            'step_no' => '7',
                            'title' => 'preparation of naqsha bay/jeem',
                            'timelimit' => '4 weeks'

                            ]);

                    App\partition_step :: create([

                                      'step_no' => '8',
                                      'title' => 'objection/cross examination on naqsha',
                                      'timelimit' => '2 weeks'

                                      ]);

                    App\partition_step :: create([

                                    'step_no' => '9',
                                    'title' => 'arguments',
                                    'timelimit' => '2 weeks'

                                    ]);


                      App\partition_step :: create([

                                    'step_no' => '10',
                                    'title' => 'order',
                                    'timelimit' => '1 weeks'

                                      ]);

                        App\partition_step :: create([

                                  'step_no' => '11',
                                  'title' => 'instrument of partition',
                                  'timelimit' => '1 weeks'

                                  ]);

                          App\partition_step :: create([

                                  'step_no' => '12',
                                  'title' => 'warrent of possesion',
                                  'timelimit' => '1 day'

                                ]);



    }
}
