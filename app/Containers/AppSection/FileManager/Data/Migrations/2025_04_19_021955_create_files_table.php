<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    public function up(): void
    {
        Schema::create('files', static function (Blueprint $table) {
            $table->id();
            $table->string('unique_code', 50);
            $table->string('file_hash', 100)->nullable();
            $table->string('name', 255);
            $table->string('origin_name', 255);
            $table->text('description')->nullable();
            $table->string('mime_type', 100);
            $table->integer('size');
            $table->text('url_file');
            $table->text('path_file');
            $table->text('options')->nullable();
            $table->enum('locale_upload', ['local', 's3', 'sftp'])->default('local');
            $table->enum('status', ['created', 'submitted', 'archived'])->default('created');
            $table->unsignedBigInteger('fid_user')->nullable();
            $table->foreign('fid_user')->references('id')->on('users')->onDelete('cascade');
            $table->integer('fileable_id')->unsigned()->nullable();
            $table->string('fileable_type')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('files');
    }
};
