<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entries', function (Blueprint $table) {
            $table->increments('id');

            $table->string('c_name');
            $table->string('c_id');
            $table->string('email');
            $table->integer('phone_id')->unsigned();
            $table->integer('brand_model_id')->unsigned();
            $table->string('p_imei');
            $table->string('error')->nullable();
            $table->text('observation')->nullable();
            $table->date('delivery')->nullable();
            $table->double('budget', 15, 2)->nullable();
            $table->enum('state', ['non-check', 'fixing', 'fixed', 'delivered', 'not-fixed']);
            $table->integer('user_id')->unsigned();

            $table->foreign('phone_id')->references('id')->on('phones')->onDelete('cascade');
            $table->foreign('brand_model_id')->references('id')->on('brand_models')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

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
        Schema::drop('entries');
    }
}
