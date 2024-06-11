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

    public function withholdingTax(){
        return $this->belongsTo(WithholdingTax::class);
    }
    

public function asset()
{
    return $this->hasOne(Asset::class, 'user_id', 'user_id');
}




    protected static function booted()
    {
        static::deleting(function ($investment) {
            $investment->asset()->delete();
        });
    }



}
