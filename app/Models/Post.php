<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;


    // We have two ways to make our attributes be fillable and accept values to insert

    //1- Using Fillable which we give it all attributes that we need to give it values
    protected $fillable = ['title', 'excerpt', 'body'];

    //2- Using guarded which we give it attributes that we don't need to give it values to be inserted
    //like 'id' which it auto increment in database

    // protected $guarded = ['id'];


    //There is two ways to change the default selection of object instead of the id

    //1 - override getRouteKeyName function which return the attribute name that you want to get object by it
    public function getRouteKeyName(){
        return 'slug';
    }

    //2- inside route we add to parameter :nameOfAttribute
    //Route::get('posts/{post:slug}', function (Post $post) {});


}
