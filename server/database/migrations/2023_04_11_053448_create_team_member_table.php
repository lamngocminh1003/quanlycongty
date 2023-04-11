<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamMemberTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('team_member', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('del_flag')->default(false);
            $table->integer('member_id')->unsigned();
            $table->integer('team_id')->unsigned();
            $table->integer('team_member_role')->unsigned();
            $table->integer('created_by')->unsigned()->nullable();
            $table->integer('modified_by')->unsigned()->nullable();
            $table->foreign('member_id')->references('id')->on('member')->onUpdate('cascade');
            $table->foreign('team_id')->references('id')->on('team')->onUpdate('cascade');
            $table->foreign('team_member_role')->references('id')->on('configuration')->onUpdate('cascade');
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
        Schema::dropIfExists('team_member');
    }
}
