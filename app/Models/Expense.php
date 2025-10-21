<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Expense extends Model
{
  protected $table = 'expenses';


    protected $fillable = [
        'expense_type_id',
        'amount',
        'status',
    ];

public function expenseType()
{
    return $this->belongsTo(ExpenseType::class, 'expense_type_id');
}

}
