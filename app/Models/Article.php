<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'category_id',
        'img',
        'name',
        'description',
        'price',
    ];

    public function user(){
        return $this->belongsTo(User::class);
       }

    public function category(){
        return $this->belongsTo(Category::class);
       }

    public function setAccepted($value)
    {
        $this->is_accepted = $value;
        $this->save();
        return true;
    }

    public static function toBeRevisionedCount()
    {
        return Article::where('is_accepted', null)->count();
    }
}

