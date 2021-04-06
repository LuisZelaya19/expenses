<?php

namespace App\Models;

use App\Traits\MultiTenantModelTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Income extends Model
{
    use HasFactory, MultiTenantModelTrait, SoftDeletes;

    protected $fillable = [
        'name',
        'amount',
        'entry_date',
        'description',
        'income_category_id'
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

    public function income_category()
    {
        return $this->belongsTo(IncomeCategory::class);
    }

    public function created_by_user()
    {
        return $this->belongsTo(User::class, 'created_by_user');
    }
}
