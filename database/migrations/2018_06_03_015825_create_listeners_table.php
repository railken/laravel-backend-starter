<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class CreateListenersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ore_listeners', function (Blueprint $table) {
            $table->increments('id'); 
            $table->string('name'); 
            $table->text('description')->nullable(); 
            $table->text('event_class'); 
            $table->integer('work_id')->unsigned()->nullable(); 
            $table->foreign('work_id')->references('id')->on('ore_works'); 
            $table->boolean('enabled')->default(true);
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
        Schema::dropIfExists('ore_listeners');
    }
}
