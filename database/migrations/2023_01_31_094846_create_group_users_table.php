<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_users', function (Blueprint $table) {
            $table->primary(['user_id', 'group_id']);
            $table->datetime('expired_at');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('group_id');
            

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
                

            $table->foreign('group_id')
                ->references('id')
                ->on('groups')
                ->onDelete('cascade');
                
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
        Schema::dropIfExists('group_users');
    }
};
