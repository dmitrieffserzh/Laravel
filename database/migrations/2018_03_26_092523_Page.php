<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Page extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
	    Schema::create( 'pages', function ( Blueprint $table ) {
		    $table->increments( 'id' );
		    $table->string( 'title' );
		    $table->string( 'slug' );
		    $table->longText( 'content' );
		    $table->integer( 'published' );
		    $table->dateTime( 'created_at' );
		    $table->dateTime( 'updated_at' );
	    } );
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
