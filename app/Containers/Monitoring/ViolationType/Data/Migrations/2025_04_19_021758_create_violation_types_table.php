<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    public function up(): void
    {
        Schema::create('violation_types', static function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fid_violation_type_category')->nullable();
            $table->foreign('fid_violation_type_category')->references('id')->on('violation_type_categories')->onDelete('cascade');
            $table->string('name');
            $table->text('description')->nullable();
            $table->boolean('active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('violation_types');
    }
};
