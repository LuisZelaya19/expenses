<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        self::created(function (User $user) {
            $registrationRole = 2;

            if (!$user->roles()->get()->contains($registrationRole)) {
                $user->roles()->attach($registrationRole);
            }
        });
    }

    public function setPasswordAttribute($value)
    {
        if ($value) {
            $this->attributes['password'] = app('hash')->needsRehash($value) ? Hash::make($value) : $value;
        }
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function expenses()
    {
        return $this->hasMany(Expense::class, 'created_by_user', 'id');
    }

    public function incomes()
    {
        return $this->hasMany(Income::class, 'created_by_user', 'id');
    }

    public function expense_categories()
    {
        return $this->hasMany(ExpenseCategory::class, 'created_by_user', 'id');
    }

    public function income_categories()
    {
        return $this->hasMany(IncomeCategory::class, 'created_by_user', 'id');
    }
}
