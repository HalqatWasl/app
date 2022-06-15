<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Directorates extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('directorates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('province_id');
            $table->string('name');
            $table->boolean('is_active');
            $table->foreign('province_id')
            ->references('id')->on('provinces')->onDelete('cascade');
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
        //
    }
}
