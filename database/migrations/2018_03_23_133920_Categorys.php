<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Categorys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    Schema::create('category', function (Blueprint $table) {
		    $table->increments('id');
		    $table->integer( 'parent_id' );
		    $table->string( 'title' );
		    $table->string( 'slug' );
		    $table->longText( 'description' );
		    $table->integer( 'sort' );
		    $table->string( 'color' );
		    $table->integer( 'published' );
		    $table->dateTime('created_at');
		    $table->dateTime('updated_at');
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
