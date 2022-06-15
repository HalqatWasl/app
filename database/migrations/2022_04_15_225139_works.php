<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Works extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('works', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('dep_id');
            $table->string('titel');
            $table->string('description');
            $table->string('images');
            $table->boolean('is_active')->nullable(1);
            $table->string('dep_types');
            $table->foreign('user_id')
            ->references('id')->on('users')->onDelete('cascade');
            $table->foreign('dep_id')
            ->references('id')->on('departements')->onDelete('cascade');
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
        Schema::dropIfExists('works');
    }
}
