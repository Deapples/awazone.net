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
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email', 191)->unique();
            $table->string('username',191)->unique();
            $table->string('referral');
            $table->string('num_of_referred')->default(0);
            $table->string('phone_number', 13)->unique();
            $table->integer('referral_bonus',false, 11)->default(0);
            $table->integer('match_bonus',false, 11)->default(0);
            $table->integer('balance',false,11)->default(0);
            $table->enum('status',['uncleared', 'cleared']);
            $table->boolean('paired')->default(false);
            $table->integer('stage',false,11)->default(1);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
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
