<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

class Income extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'source', 'amount', 'description'];

    // Enkripsi otomatis
    public function setDescriptionAttribute($value)
    {
        $this->attributes['description'] = Crypt::encryptString($value);
    }

    // Dekripsi otomatis
    public function getDescriptionAttribute($value)
    {
        return Crypt::decryptString($value);
    }
}
