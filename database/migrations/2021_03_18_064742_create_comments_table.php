<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('id');                        
            $table->text('content');
            // 一旦nullable
            $table->bigInteger('application_id')->unsigned()->index()->nullable();
            $table->bigInteger('from_user_id')->unsigned()->index()->nullable();
            $table->bigInteger('from_store_owner_id')->unsigned()->index()->nullable();
            $table->bigInteger('to_user_id')->unsigned()->index()->nullable();
            $table->bigInteger('to_store_owner_id')->unsigned()->index()->nullable();

            $table->foreign('application_id')->references('id')->on('applications')->onDelete('cascade');
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
        Schema::dropIfExists('comments');
    }
}
