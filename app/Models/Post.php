<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use HasFactory;
    use Sluggable;

    protected $guarded = ["id"];
    protected $with = ["author","category"];
    //fillable
    
    public function scopeFilter($query, array $filters) {
        // if (isset($filters["search"]) ? $filters["search"] : false) {
        //     # code...
        //     return $query->where('title','like', '%' . $filters["search"] . '%' );
        // }

        $query->when($filters["search"] ?? false, function ($query,$search) {
            return $query->where('title','like', '%' . $search . '%' );
        });

        $query->when($filters["category"] ?? false, function ($query,$category) {
           return $query->whereHas("category",function ($query) use ($category) {
                return $query->where("slug",$category);
           }); 
        });
        
        $query->when($filters["author"] ?? false, function ($query,$author) {
           return $query->whereHas("author",function ($query) use ($author) {
                return $query->where("username",$author);
           }); 
        });


    }

    public function category() 
    {
        return $this->belongsTo(Category::class);
    }
    public function author() 
    {
        return $this->belongsTo(User::class,"user_id");
    }
    public function getRouteKeyName(): string
    {
    return 'slug';
    }
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
