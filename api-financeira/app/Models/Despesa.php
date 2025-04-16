<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Despesa extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'descricao', 'valor', 'data', 'categoria'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
