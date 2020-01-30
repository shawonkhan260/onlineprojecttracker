<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubmittasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('submittasks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->biginteger('task_id')->unsigned();
            $table->string('file')->nullable();
            $table->string('details')->nullable();
            $table->string('bug')->nullable();
            $table->string('notify')->nullable();
            $table->timestamps();

            $table->foreign('task_id')->references('id')->on('tasks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('submittasks', function (Blueprint $table) {
            $table->dropForeign('submittasks_task_id_foreign');
        });
        Schema::dropIfExists('submittasks');
    }
}
