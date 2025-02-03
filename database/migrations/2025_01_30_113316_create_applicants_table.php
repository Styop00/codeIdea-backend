<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('applicants', function (Blueprint $table) {
            $table->id();
            $table->foreignId("job_position_id")->constrained("job_positions")->onDelete("cascade");
            $table->string("full_name");
            $table->string("phone_number");
            $table->string("email");
            $table->string("applied_position");
            $table->date("applied_date");
            $table->text("about_applicant");
            $table->string("cv_url");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applicants');
    }
};
