<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvestmentPlanner extends Model
{
    use HasFactory;
    protected $table = 'investments';

    protected $fillable = [
        'user_id', 'initial_investment', 'additional_investment', 'calc_duration', 'number_of_months', 'projected_rate_of_return', 'year_month','withholding_tax_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
