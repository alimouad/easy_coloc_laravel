<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settlement extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'debtor_id',
        'creditor_id',
        'amount',
        'is_paid',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'amount' => 'decimal:2',
            'is_paid' => 'boolean',
        ];
    }

    /**
     * Get the user who owes money (debtor).
     */
    public function debtor()
    {
        return $this->belongsTo(User::class, 'debtor_id');
    }

    /**
     * Get the user who is owed money (creditor).
     */
    public function creditor()
    {
        return $this->belongsTo(User::class, 'creditor_id');
    }
}
    