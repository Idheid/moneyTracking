<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

class Expense extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'category', 'amount', 'description'];

    public function setDescriptionAttribute($value)
    {
        $this->attributes['description'] = Crypt::encryptString($value);
    }

    public function getDescriptionAttribute($value)
    {
        return Crypt::decryptString($value);
    }
}
