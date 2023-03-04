<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Customer extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'address',
        'avatar',
        'user_id',
        'room_number',
        'date_of_birth',
        'philhealth',
        'sex',
        'marital_status',
        'emergency',
    ];
    public function scopeFilter($query, array $filters)
{
    if ($filters['search'] ?? false){
        $query->where('first_name', 'like', '%'. request('search').'%')
        ->orWhere('last_name', 'like', '%'. request('search').'%');
    }
}
    public function getAvatarUrl()
    {
        return Storage::url($this->avatar);
    }
}
