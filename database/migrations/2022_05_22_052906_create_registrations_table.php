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
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->foreignId('student_id')->references('id')->on('new_students')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->string('no_registrasi', 8)->unique();
            $table->date('tgl_registrasi');
            $table->enum('status', ['Diseleksi', 'Diterima', 'Dicabut']);
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
        Schema::dropIfExists('registrations');
    }
};
