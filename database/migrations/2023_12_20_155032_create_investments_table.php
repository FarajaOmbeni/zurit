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
        Schema::create('investments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('withholding_tax_id')->constrained('withholding_tax_rates');
            $table->decimal('initial_investment', 15, 2);
            $table->decimal('additional_investment', 15, 2);
            $table->string('calc_duration');
            $table->integer('number_of_months');
            $table->decimal('projected_rate_of_return', 5, 2);
            $table->string('year_month');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('investments');
    }
};
