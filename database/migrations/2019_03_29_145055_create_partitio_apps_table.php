<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartitioAppsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partitio_apps', function (Blueprint $table) {
            $table->biginteger('Case_id');
            $table->integer('step_no')->default(1);
            $table->text('case_title');
            $table->text('step_title')->nullable();
            $table->text('order_sheet')->nullable();
            $table->text('details');
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
        Schema::dropIfExists('partitio_apps');
    }
}
