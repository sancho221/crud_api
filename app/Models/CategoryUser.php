<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryUser extends Model
{
    use HasFactory;
    protected $table = 'category_users';
    public $guarded = false;

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_users', 'id', 'category_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'category_users', 'id', 'user_id');
    }
}
