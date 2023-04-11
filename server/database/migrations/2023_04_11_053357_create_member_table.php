<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemberTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('del_flag')->default(false);
            $table->string('username',50)->unique(); 
            $table->string('password');
            $table->string('fullname', 100);
            $table->boolean('is_male');
            $table->date('birthday')->nullable();
            $table->string('email', 100);
            $table->string('phone', 12)->nullable();
            $table->string('picture')->nullable()->default('avatar_default.jpg');
            $table->integer('access_level')->unsigned();
            $table->integer('created_by')->unsigned()->nullable();
            $table->integer('modified_by')->unsigned()->nullable();
            $table->foreign('access_level')->references('id')->on('configuration')->onUpdate('cascade');
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
        Schema::dropIfExists('member');
    }
}
