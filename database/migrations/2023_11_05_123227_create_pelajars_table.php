<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pelajars', function (Blueprint $table) {
            // $table->id();
            $table->char('idPelajar', 7);
            $table->string('nama_lengkap', 100);
            $table->enum('jenis_kelamin', ['M','F']);
            $table->string('alamat', 100);
            $table->string('email', 100);
            $table->char('no_hp', 20);
            $table->primary('idPelajar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelajars');
    }
};
