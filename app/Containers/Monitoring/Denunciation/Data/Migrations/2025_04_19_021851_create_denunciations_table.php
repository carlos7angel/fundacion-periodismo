<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    public function up(): void
    {
        Schema::create('denunciations', static function (Blueprint $table) {

            $table->id();
            $table->string('code', '50')->unique()->nullable();

            $table->string('aggressor_type', 200); // CATALOG
            $table->string('aggressor_subtype', 200)->nullable(); // CATALOG SUB
            $table->boolean('aggressor_identified')->default(false);
            $table->string('aggressor_name', 150)->nullable();
            $table->string('aggressor_organization', 100)->nullable();
            $table->string('aggressor_job_title', 100)->nullable();

            $table->boolean('victim_anonymous')->default(false);
            $table->string('victim_name', 150)->nullable();
            $table->string('victim_organization', 100)->nullable();
            $table->string('victim_type', 100); // CATALOG
            $table->string('victim_gender', 100); // CATALOG
            $table->string('victim_age_group', 100); // CATALOG

            $table->date('date_event')->nullable();
            $table->time('time_event')->nullable();

            $table->string('state', 100)->nullable();
            $table->string('province', 100)->nullable();
            $table->string('region', 100)->nullable();
            $table->string('city', 100)->nullable();

            $table->text('description_event')->nullable();
            $table->string('circumstance_event', 200)->nullable(); // CATALOG
            $table->string('circumstance_event_other', 200)->nullable();
            $table->string('details_event_audio', 200)->nullable();
            $table->string('details_event_images', 200)->nullable();
            $table->string('details_event_files', 200)->nullable();

            $table->string('report_status', 200)->nullable(); // CATALOG

            $table->string('action_response_state', 200)->nullable(); // CATALOG
            $table->string('action_unprotect_state', 200)->nullable(); // CATALOG
            $table->string('action_journalistic_unions', 200)->nullable(); // CATALOG
            $table->string('action_organization_society', 200)->nullable(); // CATALOG

            $table->text('source_information')->nullable(); // CATALOG
            $table->string('source_information_detail', 200)->nullable();

            $table->enum('status', ['NEW', 'IN_PROGRESS', 'ARCHIVED', 'CLOSED'])->default('NEW');

            $table->unsignedBigInteger('created_by');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('denunciations');
    }
};
