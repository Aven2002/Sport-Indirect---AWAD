<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // Auto-increment primary key
            $table->string('userRole', 20)->default('User');
            $table->string('email', 255)->unique();
            $table->string('username', 30)->unique();
            $table->string('password');
            $table->date('dob'); 
            $table->json('security_answers'); 
            $table->string('imgPath')->default('images/Profile_Img/Profile_Img_Default.png');
            $table->timestamps(); // Automatically adds created_at & updated_at
        });
    }

    public function down(): void {
        Schema::dropIfExists('users');
    }
};

