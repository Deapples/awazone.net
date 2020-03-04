<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id',false,11);
            $table->string('status');
            $table->string('parent_id');
            $table->string('root_id');
            $table->enum('position',['left', 'right','float']);
            $table->string('stage');
            $table->string('level');
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
        Schema::dropIfExists('rds');
    }
}
