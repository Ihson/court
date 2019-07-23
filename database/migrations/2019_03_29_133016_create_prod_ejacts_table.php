<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdEjactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prod_ejacts', function (Blueprint $table) {
            $table->biginteger('Case_id');
            $table->biginteger('step_no')->default(1);
            $table->text('order_sheet')->nullable();
            $table->text('step_title')->nullable();
            $table->text('case_title');
            $table->text('details');
            $table->text('remarks')->nullable();
            $table->date('hearing_date')->nullable();

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
        Schema::dropIfExists('prod_ejacts');
    }
}
