<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    // Menentukan nama tabel jika berbeda dari default ('books')
    protected $table = 'books';

    // Menentukan kolom yang boleh diisi (mass assignable)
    protected $fillable = [
        'title',
        'author',
        'genre',
        'publication_year',
        'copies_available',
        'isbn'
    ];

    // Jika menggunakan relasi, contohnya dengan Transaction model
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
