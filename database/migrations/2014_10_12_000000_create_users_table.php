<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\QueryException;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone',9)->nullable()->unique();
            $table->string('username')->unique();
            $table->integer('user_type')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('description')->nullable();
            $table->string('image')->default('images.png');
            $table->integer('departement_id')->nullable();
            $table->integer('citys_id')->nullable();
            $table->boolean('is_active')->default('1');
            $table->boolean('is_admin')->default('0');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
