<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Expense;
class ExpenseType extends Model
{
    protected $table='expensetypes';
    protected $fillable=[
        'title',
        'description'

    ];

}
