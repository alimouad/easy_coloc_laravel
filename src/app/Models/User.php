<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'full_name',
        'email',
        'password',
        'flatshare_id',
        'reputation_score',
        'is_banned',
        'colocation_role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'colocation_role' => 'string',
            'is_banned' => 'boolean',
        ];
    }

    /**
     * Get the flatshare that the user belongs to.
     */
    public function flatshare()
    {
        return $this->belongsTo(Flatshare::class, 'flatshare_id');
    }

    /**
     * Get the expenses paid by the user.
     */
    public function expenses()
    {
        return $this->hasMany(Expense::class, 'payer_id');
    }

    /**
     * Get the settlements where user is the debtor.
     */
    public function debts()
    {
        return $this->hasMany(Settlement::class, 'debtor_id');
    }

    /**
     * Get the settlements where user is the creditor.
     */
    public function credits()
    {
        return $this->hasMany(Settlement::class, 'creditor_id');
    }

    /**
     * Get the invitations sent by the user.
     */
    public function sentInvitations()
    {
        return $this->hasMany(Invitation::class, 'inviter_id');
    }
}
