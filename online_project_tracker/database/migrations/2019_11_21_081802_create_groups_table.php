<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->bigInteger('manager_id')->unsigned()->nullable();
            $table->bigInteger('division_id')->unsigned();
            $table->timestamps();
            $table->foreign('manager_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('division_id')->references('id')->on('divisions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('groups', function (Blueprint $table) {
            $table->dropForeign('groups_manager_id_foreign');
            $table->dropForeign('groups_division_id_foreign');
          });
        Schema::dropIfExists('groups');
    }
}
