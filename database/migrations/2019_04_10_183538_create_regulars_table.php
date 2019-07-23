<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegularsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regulars', function (Blueprint $table) {
            //$table->increments('id');
            $table->integer('step_no')->default(0);
            $table->biginteger('Case_id');
            $table->text('case_title');
            $table->text('step_title')->nullable();
            $table->text('details');
            $table->text('order_sheet')->nullable();
            $table->date('hearing_date')->nullable();
            $table->text('remarks')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('regulars');
    }
}
