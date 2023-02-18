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
        Schema::create('post', function ($table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->string('header',100);
            $table->string('comment',600);
            $table->timestamps();


            $table->foreign('category_id')
                ->references('id')
                ->on('category')
                ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
