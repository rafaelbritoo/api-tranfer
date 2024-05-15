<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Enum\UserTypeEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Notifications\Notifiable;

class Customer extends Model
{
    protected $table = 'Customers';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'name',
        'document',
        'email',
        'user_type',
    ];

    protected $casts = [
        'user_type' => UserTypeEnum::class,
    ];

    public function wallet(): MorphOne
    {
        return $this->morphOne(Wallet::class, 'id');
    }

    public function isRetailer(): bool
    {
        return $this->attributes['user_type'] == UserTypeEnum::Retailer;
    }
}
