<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modules', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('details');
            $table->string('status')->nullable();
            $table->string('manager_notify')->default(1);
            $table->date('submission')->nullable();
            $table->string('qa')->nullable();
            $table->bigInteger('project_id')->unsigned();
            $table->bigInteger('group_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            $table->foreign('group_id')->references('id')->on('groups')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('modules', function (Blueprint $table) {
            $table->dropForeign('modules_project_id_foreign');
            $table->dropForeign('modules_group_id_foreign');
        });
        Schema::dropIfExists('modules');
    }
}
