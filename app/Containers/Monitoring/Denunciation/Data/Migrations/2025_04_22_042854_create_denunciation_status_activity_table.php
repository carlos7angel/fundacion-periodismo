<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    public function up(): void
    {
        Schema::create('denunciation_status_activity', static function (Blueprint $table) {

            $table->id();
            $table->unsignedBigInteger('fid_denunciation')->nullable();
            $table->foreign('fid_denunciation')->references('id')->on('denunciations')->onDelete('cascade');
            $table->string('status', 50);
            $table->string('previous_status', 50)->nullable();
            $table->unsignedBigInteger('registered_by');
            $table->foreign('registered_by')->references('id')->on('users')->onDelete('cascade');
            $table->text('observations')->nullable();
            $table->timestamp('registered_at');

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('denunciation_status_activity');
    }
};
