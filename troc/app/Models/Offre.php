<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offre extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'user_id','product_id'];

    public function offres()
    {
        return $this->hasMany(Offre::class);
    }

    public function offresCount()
    {
        return $this->offres->count();
    }
}
