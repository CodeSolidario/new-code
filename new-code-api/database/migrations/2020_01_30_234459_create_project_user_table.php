<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_user', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->boolean('is_owner')->default(false);
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('project_id');
            $table->boolean('status')->default(0);

            $table->foreign('user_id')
                ->references('id')->on('users')->onDelete('cascade');

            $table->foreign('project_id')
                ->references('id')->on('projects')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_user');
    }
}
