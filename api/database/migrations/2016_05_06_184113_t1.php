<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class T1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t1', function(Blueprint $table){
            $table->increments('Userid');
            $table->string('Name');
            $table->string('Address1');
            $table->string('Address2');
            $table->string('Zip');
            $table->string('State');
            $table->string('Country');
            $table->SoftDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('t1');
    }
}
