<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->string('contact');
            $table->string('email')->unique();
            $table->string('institution');
            $table->boolean('isAssociate')->default(false);
            $table->boolean('isInvested')->default(false);
            $table->string('PPNo')->nullable();
            $table->string('avatar')->nullable();
            $table->string('password');
            $table->string('about');
            $table->timestamp('birthday');
            $table->string('role')->default('Member');
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
