<?php

namespace App\Models;

use App\Traits\MultiTenantModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class IncomeCategory extends Model
{
    use HasFactory, MultiTenantModelTrait, SoftDeletes;

    protected $fillable = [
        'name'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function incomes()
    {
        return $this->hasMany(Income::class);
    }

    public function created_by_user()
    {
        return $this->belongsTo(User::class, 'created_by_user');
    }
}
