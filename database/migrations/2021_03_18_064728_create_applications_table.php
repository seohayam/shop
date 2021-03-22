<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('item_id')->unsigned()->index();            
            $table->enum('applicaiton_status',['accept','reject','onboard']);
            $table->bigInteger('from_user_id')->unsigned()->index()->nullable();
            $table->bigInteger('from_store_owner_id')->unsigned()->index()->nullable();
            $table->bigInteger('to_user_id')->unsigned()->index()->nullable();
            $table->bigInteger('to_store_owner_id')->unsigned()->index()->nullable();

            $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade');            
            $table->foreign('from_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('from_store_owner_id')->references('id')->on('store_owners')->onDelete('cascade');
            $table->foreign('to_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('to_store_owner_id')->references('id')->on('store_owners')->onDelete('cascade');



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
        Schema::dropIfExists('applications');
    }
}
