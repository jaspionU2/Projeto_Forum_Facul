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
      Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 250);
            $table->string('email', 200)->unique();


            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();

            $table->string('password'); 
            $table->foreignId('campus_id')->nullable()->constrained('campuses')->nullOnDelete();
            $table->boolean('is_active')->default(false);
            $table->timestamps();
            $table->softDeletes();

            $table->index('email', 'idx_users_email');
            $table->index('campus_id', 'idx_users_campus');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
