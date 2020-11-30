<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activity', function (Blueprint $table) {
            $table->unsignedInteger('user_id');
            $table->date('act_timestamp');
            $table->string('act_type', 16);
        });
        // Schema::table('activity', function (Blueprint $table) {
        //     $table->foreign('user_id')
        //     ->references('user_id')
        //         ->on('members');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activity');
    }
}
