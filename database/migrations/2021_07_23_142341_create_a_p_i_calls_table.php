<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAPICallsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('a_p_i_calls', function (Blueprint $table) {
            $table->id();
            $table->timestamp('apidt');
            $table->string('uname', 50);
            $table->string('retry', 10);
            $table->string('unique_callid', 20);
            $table->string('num_dialed', 15);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('a_p_i_calls');
    }
}
