<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class OpenWorks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('open_works', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('departement_id');
            $table->unsignedBigInteger('province_id');
            $table->unsignedBigInteger('directorate_id');
            $table->string('title');
            $table->string('description');
            $table->string('num_day');
            $table->string('pric');
            $table->string('address');
            $table->string('stage');
            $table->boolean('is_active');

            $table->foreign('user_id')
            ->references('id')->on('users')->onDelete('cascade');

            $table->foreign('departement_id')
            ->references('id')->on('departements')->onDelete('cascade');

            $table->foreign('province_id')
            ->references('id')->on('provinces')->onDelete('cascade');

            $table->foreign('directorate_id')
            ->references('id')->on('directorates')->onDelete('cascade');
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
        Schema::dropIfExists('open_works');
    }
}
