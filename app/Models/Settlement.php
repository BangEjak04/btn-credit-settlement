<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Settlement extends Model
{
    /** @use HasFactory<\Database\Factories\SettlementFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'loan_type_id',
        'status',
        'have_accepted_offer',
        'debtor_number',
        'property_address',
        'settlement_reason',
        'destination_bank',
        'take_over_reason',
        'take_over_interest_rate',
        'remaining_outstanding',
        'penalty_rate',
        'accrued_interest',
        'current_fines',
        'fine_obligation',
        'total_settlement',
        'realization_date',
    ];

    protected $casts = [
        'have_accepted_offer' => 'boolean',
        'take_over_interest_rate' => 'decimal:2',
        'remaining_outstanding' => 'decimal:2',
        'penalty_rate' => 'decimal:2',
        'accrued_interest' => 'decimal:2',
        'current_fines' => 'decimal:2',
        'fine_obligation' => 'decimal:2',
        'total_settlement_amount' => 'decimal:2',
    ];

    /**
     * Get the user that owns the Settlement
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the loanType that owns the Settlement
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function loanType(): BelongsTo
    {
        return $this->belongsTo(LoanType::class);
    }

    // /**
    //  * Get the user associated with the Settlement
    //  *
    //  * @return \Illuminate\Database\Eloquent\Relations\HasOne
    //  */
    // public function user(): HasOne
    // {
    //     return $this->hasOne(User::class);
    // }

    // /**
    //  * Get the loanType associated with the Settlement
    //  *
    //  * @return \Illuminate\Database\Eloquent\Relations\HasOne
    //  */
    // public function loanType(): HasOne
    // {
    //     return $this->hasOne(LoanType::class);
    // }
}
