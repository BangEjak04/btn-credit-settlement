<?php

use App\Models\LoanType;
use App\Models\User;
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
        Schema::create('settlements', function (Blueprint $table) {
            $table->id();
            $table->string('status', 16)->nullable()->default('in_progress');
            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete();
            $table->boolean('have_accepted_offer');
            $table->string('debtor_number')->nullable();
            $table->text('property_address')->nullable();
            $table->foreignIdFor(LoanType::class)->nullable()->constrained()->cascadeOnDelete();
            $table->string('settlement_reason')->nullable();
            $table->string('destination_bank')->nullable();
            $table->string('take_over_reason')->nullable();
            $table->decimal('take_over_interest_rate', 8, 2)->nullable();
            $table->decimal('remaining_outstanding', 15, 2)->nullable();
            $table->decimal('penalty_rate', 8, 2)->nullable();
            $table->decimal('accrued_interest', 15, 2)->nullable();
            $table->decimal('current_fines', 15, 2)->nullable();
            $table->decimal('fine_obligation', 15, 2)->nullable();
            $table->decimal('total_settlement', 15, 2)->nullable();
            $table->date('realization_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settlements');
    }
};
