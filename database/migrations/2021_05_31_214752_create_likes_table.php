<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('likes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned()->index()->nullable();
            $table->bigInteger('store_owner_id')->unsigned()->index()->nullable();
            $table->bigInteger('item_id')->unsigned()->index()->nullable();
            $table->bigInteger('store_id')->unsigned()->index()->nullable();
            $table->boolean('status')->default(0);

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('store_owner_id')->references('id')->on('store_owners')->onDelete('cascade');
            $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade');
            $table->foreign('store_id')->references('id')->on('stores')->onDelete('cascade');

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
        Schema::dropIfExists('likes');
    }
}
