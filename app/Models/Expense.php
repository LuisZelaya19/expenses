<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Expense extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'amount',
        'entry_date',
        'description',
        'created_at',
        'updated_at',
        'deleted_at',
        'expense_category_id'
    ];

    protected $dates = [
        'entry_date',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function setEntryDateAttribute($value)
    {
        $this->attributes['entry_date'] = $value ? Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d') : null;
    }

    public function getEntryDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format('d/m/Y') : null;
    }

    public function expense_category()
    {
        return $this->belongsTo(ExpenseCategory::class);
    }
}
