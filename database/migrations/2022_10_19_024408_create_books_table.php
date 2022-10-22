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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('judul')->unique();
            $table->text('deskripsi');
            $table->integer('author_id')->nullable();
            $table->integer('publisher_id')->nullable();
            $table->integer('category_id')->nullable();
            $table->date('tanggal_terbit');
            $table->string('tersedia')->default('Y');
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
        Schema::dropIfExists('books');
    }
};
