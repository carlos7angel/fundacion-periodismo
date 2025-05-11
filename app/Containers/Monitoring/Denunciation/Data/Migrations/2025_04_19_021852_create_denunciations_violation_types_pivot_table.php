<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    public function up(): void
    {
        Schema::create('denunciation_has_violation_types', static function (Blueprint $table) {

            $table->unsignedBigInteger('fid_denunciation');
            $table->foreign('fid_denunciation')->references('id')->on('denunciations')->onDelete('cascade');
            $table->unsignedBigInteger('fid_violation_type');
            $table->foreign('fid_violation_type')->references('id')->on('violation_types')->onDelete('cascade');
            $table->primary(['fid_denunciation', 'fid_violation_type']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('denunciation_has_violation_types');
    }
};
