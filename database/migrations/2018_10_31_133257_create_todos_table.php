<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTodosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('todos', function (Blueprint $table) {
            $table->increments('id');
            $table->char('title',50);
            $table->text('content')->nullable();
            $table->char('due_date')->nullable();
            $table->char('isComplete',15)->nullable();
            //0 진행중, 1 완료, 2 기간 만료
            $table->tinyInteger('todo_list_id');
            $table->integer('user_id');
            $table->tinyInteger('seq')->default(1);
            $table->softDeletes();
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
        Schema::dropIfExists('todos');
    }
}
