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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('position');
            $table->string('category');
            $table->string('type');
            $table->string('address');
            $table->string('city');
            $table->string('country');
            $table->longText('description');
            $table->longText('requirements');
            $table->integer("salary");
            $table->string("job_pict")->nullable();
            $table->integer("applicants_quota");
            $table->integer("applicants_count")->nullable();
            $table->integer("isActive");
            $table->foreignId("company_id")->constrained("companies");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
