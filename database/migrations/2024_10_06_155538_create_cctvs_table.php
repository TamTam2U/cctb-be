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
        Schema::create('cctvs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('url');
            $table->integer('is_active')->default(1)->comment('0: Inactive, 1: Active');
            $table->integer('threads');
            $table->string('preset');
            $table->longText('video');
            $table->longText('audio');
            $table->integer('is_running')->default(0)->comment('0: Not Running, 1: Running');
            $table->foreignId('area_id')->constrained('areas');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cctvs');
    }
};
