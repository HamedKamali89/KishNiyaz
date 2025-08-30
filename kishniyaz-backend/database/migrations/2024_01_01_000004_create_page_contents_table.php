<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('page_contents', function (Blueprint $table) {
            $table->id();
            $table->string('page_name')->index();
            $table->string('section_name')->index();
            $table->enum('content_type', ['text', 'image', 'icon', 'html', 'json', 'component'])->default('text');
            $table->json('content');
            $table->json('meta_data')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            
            $table->unique(['page_name', 'section_name']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('page_contents');
    }
};
