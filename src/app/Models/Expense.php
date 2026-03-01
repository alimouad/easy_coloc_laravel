<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'flatshare_id',
        'category_id',
        'payer_id',
        'user_id',
        'title',
        'amount',
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
        ];
    }
    public function participant()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get the flatshare that owns the expense.
     */
    public function flatshare()
    {
        return $this->belongsTo(Flatshare::class);
    }

    /**
     * Get the category that owns the expense.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the user who paid for the expense.
     */
    public function payer()
    {
        return $this->belongsTo(User::class, 'payer_id');
    }

    /**
     * Get the user who owes money (debtor).
     */
    public function debtor()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
