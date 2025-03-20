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
        Schema::create('displacements', function (Blueprint $table) {
            $table->id();
            $table->string('name_pic');
            $table->string('name_it');
            $table->string('description');
            $table->string('outlet_awal_id');
            $table->string('outlet_tujuan_id');
            $table->string('image')->nullable();
            $table->integer('jumlah_pindah')->nullable();
            $table->date('tanggal_pindah');
            $table->foreignId('device_id')->constrained()->onDelete('cascade');
            $table->softDeletes();
            // $table->foreignId('outlet_id')->constrained()->onDelete('cascade');
            // $table->foreignId('outlet_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::dropIfExists('displacements');
        Schema::create('displacements', function (Blueprint $table) {
            // $table->dropColumn('delete_at');
            $table->dropColumn('jumlah_pindah');
            $table->dropColumn('image');
        });
    }
};
