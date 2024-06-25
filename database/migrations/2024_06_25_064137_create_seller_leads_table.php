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
        Schema::create('seller_leads', function (Blueprint $table) {
            $table->id();
            $table->foreignId('seller_id')->constrained()->onDelete('cascade');
            $table->string('lead_id')->unique();
            $table->string('loan_amount')->nullable();
            $table->string('name');
            $table->string('mobile_no');
            $table->text('address')->nullable();
            $table->string('pincode')->nullable();
            $table->string('pan_card');
            $table->string('aadhar_card');
            $table->string('employment_type')->nullable();
            $table->string('email')->nullable();
            $table->foreignId('product_id')->constrained('loans')->onDelete('cascade');
            $table->foreignId('type_id')->constrained('product_types')->onDelete('cascade');
            $table->string('refrences')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seller_leads');
    }
};
