<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Stories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
	public function up()
	{
		Schema::create('stories', function (Blueprint $table) {
			$table->increments('id');
			$table->string( 'title' );
			$table->longText( 'content' );
			$table->integer( 'rating' )->default('0');
			$table->integer( 'published' )->default('1');
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
