<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Offers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('open_work_id');
            $table->unsignedBigInteger('user_id')->unique();
            $table->string('description');
            $table->string('num_day');
            $table->string('pric');
            $table->string('statu');
            $table->boolean('is_active');

            $table->foreign('open_work_id')
            ->references('id')->on('open_works')->onDelete('cascade');

            $table->foreign('user_id')
            ->references('id')->on('users')->onDelete('cascade');

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
        Schema::dropIfExists('offers');
    }
}
