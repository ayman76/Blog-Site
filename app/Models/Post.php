<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;


    //This will allow Eager loading of relationship
    //There is two ways to define eager loading
    // 1- define $with attribute in Model class and gives it all relations you want
    // 2- define it in Route using with() function and gives it all relations you want
    //in case of you get post for specific author you will use $author->posts->load('category', 'author') to enable eager loading
    protected $with = ['author', 'category'];

    // We have two ways to make our attributes be fillable and accept values to insert

    //1- Using Fillable which we give it all attributes that we need to give it values
    protected $fillable = ['title', 'excerpt', 'body', 'category_id', 'slug', 'user_id'];

    //2- Using guarded which we give it attributes that we don't need to give it values to be inserted
    //like 'id' which it auto increment in database

    // protected $guarded = ['id'];


    //There is two ways to change the default selection of object instead of the id

    //1 - override getRouteKeyName function which return the attribute name that you want to get object by it
    public function getRouteKeyName()
    {
        return 'slug';
    }

    //2- inside route we add to parameter :nameOfAttribute
    //Route::get('posts/{post:slug}', function (Post $post) {});


    public function scopeFilter($query, array $filters)
    {
        $query->when(
            $filters['search'] ?? false,
            fn ($query, $search) =>
            $query
                ->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('title', 'like', '%' . request('search') . '%')
        );
    }


    public function category()
    {

        //hasOne, hasMany, belongsTo, belongsToMany
        return $this->belongsTo(Category::class);
    }

    //We Change the name of function to author to make code more readable and understandable that each post have author not user
    //and we add parameter to belongsTo function that is foreignKey of User
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
