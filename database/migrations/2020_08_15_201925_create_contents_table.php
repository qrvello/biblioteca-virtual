<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contents', function (Blueprint $table) {
            $table->id();
            $table->text('image')->nullable();
            $table->text('file')->nullable();
            $table->text('author')->nullable();
            $table->text('editorial')->nullable();
            $table->text('title');
            $table->text('description');
            $table->text('matter')->nullable();
            $table->date('date_published')->nullable();
            $table->boolean('active')->default(true)->nullable();


            // $table->foreignId('user_id')->constrained();

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
        Schema::dropIfExists('contents');
    }
}
