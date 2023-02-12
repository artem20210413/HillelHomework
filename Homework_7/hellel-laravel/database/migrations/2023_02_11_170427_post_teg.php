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
        Schema::create('post_teg', function ($table) {
            $table->id();
            $table->unsignedBigInteger('post_id');
            $table->unsignedBigInteger('teg_id');
            $table->timestamps();

            $table->foreign('post_id')
                ->references('id')
                ->on('post')
                ->onDelete('restrict');

            $table->foreign('teg_id')
                ->references('id')
                ->on('teg')
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
