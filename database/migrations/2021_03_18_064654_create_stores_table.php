<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('adress');
            $table->text('description');
            $table->text('imgae');
            $table->integer('available');
            $table->string('store_url');
            $table->bigInteger('store_owner_id')->unsigned()->index();
            $table->timestamps();
                        
            $table->foreign('store_owner_id')->references('id')->on('store_owners')->onDelete('cascade');            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stores');
    }
}
