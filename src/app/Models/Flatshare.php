<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flatshare extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = ['owner_id', 'name', 'invite_token', 'status'];

   

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'status' => 'string',
        ];
    }

     public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }
    /**
     * Get the users that belong to the flatshare.
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }

    /**
     * Get the expenses for the flatshare.
     */
    public function expenses()
    {
        return $this->hasMany(Expense::class);
    }

    /**
     * Get the invitations for the flatshare.
     */
    public function invitations()
    {
        return $this->hasMany(Invitation::class);
    }
}
