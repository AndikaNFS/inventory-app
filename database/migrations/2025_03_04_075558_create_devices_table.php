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
        Schema::create('devices', function (Blueprint $table) {
            $table->id();
            $table->string('device');
            $table->string('merek');
            $table->string('type');
            $table->string('serial_num');
            $table->enum('status',['Baik', 'Rusak'])->default('Baik');
            $table->integer('qlt');
            $table->string('image')->nullable(); // Menyimpan path gambar
            $table->foreignId('outlet_id')->constrained()->onDelete('cascade');
            // $table->foreignId('displacement_id')->constrained()->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::dropIfExists('devices');
        Schema::create('devices', function (Blueprint $table) {
            $table->dropColumn('status');
            $table->dropColumn('image');
        });
    }
};
