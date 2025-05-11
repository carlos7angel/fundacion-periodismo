<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    public function up(): void
    {
        Schema::create('catalog_items', static function (Blueprint $table) {

            $table->id();
            $table->string('catalog_code', 10);
            $table->foreign('catalog_code')->references('code')->on('catalogs');
            $table->string('code', 10)->unique();
            $table->string('name', 255);
            $table->text('description')->nullable();
            $table->boolean('active')->default(true);
            $table->string('parent_code', 10)->nullable();
            $table->string('icon', 20)->nullable();
            $table->integer('sort')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('catalog_items');
    }
};
