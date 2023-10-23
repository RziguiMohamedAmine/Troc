<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Claim extends Model
{
    protected $fillable = ['claim_text', 'product_id', 'user_id'];


    public function user()
    {
        return $this->belongsTo(User::class); // Assuming there is a User model for the customer.
    }
}
