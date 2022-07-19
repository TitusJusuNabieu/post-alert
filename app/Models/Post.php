<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['website_id','title','body'];

    public function website(){
        return $this->belongsTo(Website::class);
    }

    public function subscribers()
    {
        return $this->hasManyThrough(Subscriber::class, Website::class);
    }
}
