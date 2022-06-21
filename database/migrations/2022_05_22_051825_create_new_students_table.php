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
        Schema::create('new_students', function (Blueprint $table) {
            $table->id();
            $table->foreignId('major_id')->references('id')->on('majors')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('no_pendf',8)->unique();
            $table->string('name');    
            $table->string('image');    
            $table->string('almt');    
            $table->string('asal_sklh'); 
            $table->enum('jns_kelamin', ['Laki-Laki', 'Perempuan']);   
            $table->string('tmpt_lahir');
            $table->date('tgl_lahir');
            $table->integer('umur');
            $table->string('agama');
            $table->string('nama_ortu');
            $table->string('pkerjaan_ortu');
            $table->float('nilai_un');
            $table->float('nilai_usek');
            $table->string('prestasi')->nullable();
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
        Schema::dropIfExists('new_students');
    }
};
