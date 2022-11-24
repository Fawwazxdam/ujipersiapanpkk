<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    use HasFactory;
    protected $table = 'Artikel';
    protected $guarded = ['id'];

    public function Kategori() {
        return $this->belongsTo(Kategori::class);
    }
    public function User() {
        return $this->belongsTo(User::class);
    }
}
