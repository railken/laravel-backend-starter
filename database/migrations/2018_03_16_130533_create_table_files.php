<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableFiles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function($table) {
            $table->increments('id');
            $table->string('storage')->default('disk');
            $table->integer('disk_id')->unsigned();
            $table->foreign('disk_id')->references('id')->on('disks');
            $table->string('path');
            $table->string('type')->nullable();
            $table->string('status')->nullable();
            $table->string('checksum');
            $table->string('access')->default('public');
            $table->string('permission')->nullable();
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamp('expire_at')->nullable();
            $table->softDeletes();
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
        //
    }
}
