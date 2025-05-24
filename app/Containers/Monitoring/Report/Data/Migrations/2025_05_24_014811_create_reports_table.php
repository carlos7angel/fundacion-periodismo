<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    public function up(): void
    {
        Schema::create('reports', static function (Blueprint $table) {
            $table->id();
            $table->string('name', '200')->nullable();
            $table->enum('type', ['ANUAL', 'TRIMESTRAL'])->default('ANUAL');
            $table->integer('year');
            $table->enum('quarter', ['Q1', 'Q2', 'Q3', 'Q4'])->nullable();
            $table->string('file_report', 50)->nullable();
            $table->text('description')->nullable();
            $table->boolean('active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
