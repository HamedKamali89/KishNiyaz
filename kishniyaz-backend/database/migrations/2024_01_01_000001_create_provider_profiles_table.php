<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('provider_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->unique()->constrained()->onDelete('cascade');
            $table->string('business_name')->nullable();
            $table->text('about')->nullable();
            $table->text('services_description')->nullable();
            $table->integer('experience_years')->default(0);
            $table->json('working_hours')->nullable();
            $table->json('service_areas')->nullable();
            $table->boolean('is_company')->default(false);
            $table->string('company_registration_number')->nullable();
            $table->decimal('minimum_rate', 10, 2)->nullable();
            $table->boolean('emergency_service')->default(false);
            $table->json('certificates')->nullable();
            $table->json('portfolio')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('provider_profiles');
    }
};
