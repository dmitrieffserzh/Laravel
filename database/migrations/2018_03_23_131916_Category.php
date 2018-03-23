<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Category extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    Schema::create('category',function ($table){
		    $table->integer('parent_id')->default('0');
		    $table->string('title', '255')->default('0');
		    $table->string('slug')->default('0');
		    $table->longText('description')->default('0');
		    $table->integer('owner_id')->default('0');
		    $table->integer('published')->default('0');
		    $table->integer('sort')->default('0');
		    $table->string('color')->default(NULL)->nullable();
		    $table->dateTime('created_at');
		    $table->dateTime('modified_at');
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
