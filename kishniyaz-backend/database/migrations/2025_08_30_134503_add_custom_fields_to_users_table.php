<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // اضافه کردن فیلدهای جدید
            $table->string('user_type', 20)->default('customer')->after('email');
            $table->string('phone_number', 17)->nullable()->unique()->after('user_type');
            $table->boolean('is_verified')->default(false)->after('phone_number');
            $table->boolean('is_active')->default(true)->after('is_verified');
            $table->decimal('balance', 10, 2)->default(0.00)->after('is_active');
            $table->decimal('rating', 3, 2)->default(0.00)->after('balance');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'user_type',
                'phone_number', 
                'is_verified',
                'is_active',
                'balance',
                'rating'
            ]);
        });
    }
};
