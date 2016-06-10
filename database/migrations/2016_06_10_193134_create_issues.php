<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIssues extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){

        Schema::create('issues', function(Blueprint $table){
            $table -> increments('id');
            $table -> string('name');
            $table -> text('description');
            $table -> string('status');
            $table -> integer('priority');
            $table -> integer('author_id');
            $table -> timestamps();
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
