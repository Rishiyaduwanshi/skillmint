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
        Schema::create('certificates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('users'); 
            $table->foreignId('course_id')->constrained('courses'); 
            $table->decimal('percentage', 5, 2)->nullable(); 
            $table->enum('status', ['Pending', 'Issued', 'Revoked']);
            $table->foreignId('generated_by')->constrained('users'); 
            $table->string('certificate_link')->nullable();
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certificates');
    }
};
