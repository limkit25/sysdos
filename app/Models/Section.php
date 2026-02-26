<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    // Tambahkan baris ini agar kolom 'order' dan 'is_visible' bisa diupdate
    protected $fillable = [
        'key', 
        'label', 
        'blade_file', 
        'is_visible', 
        'order'
    ];
}