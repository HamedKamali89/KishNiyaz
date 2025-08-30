<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'balance',
        'currency',
        'is_active',
    ];

    protected $casts = [
        'balance' => 'decimal:2',
        'is_active' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function transactions()
    {
        return $this->hasMany(WalletTransaction::class);
    }

    public function deposit($amount, $description = null)
    {
        $this->balance += $amount;
        $this->save();

        $this->transactions()->create([
            'type' => 'deposit',
            'amount' => $amount,
            'balance_after' => $this->balance,
            'description' => $description,
        ]);

        return $this;
    }

    public function withdraw($amount, $description = null)
    {
        if ($this->balance < $amount) {
            return false;
        }

        $this->balance -= $amount;
        $this->save();

        $this->transactions()->create([
            'type' => 'withdraw',
            'amount' => $amount,
            'balance_after' => $this->balance,
            'description' => $description,
        ]);

        return $this;
    }
}
