<?php

namespace App\Models;

use App\Models\Book;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function books(){
        return $this->hasMany(Book::class);
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function sluggable(): array
{
    return [
        'slug' => [
            'source' => 'name'
        ]
    ];
}

}
