<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post
{

    public $title;
    public $excerpt;
    public $date;
    public $body;
    public $slug;

    public function __construct($title, $excerpt, $date, $body, $slug)
    {
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->body = $body;
        $this->slug = $slug;
    }

    public static function all()
    {
        //Get all posts from files and cached it forever and sorted it by its date DESC
        return cache()->rememberForever('post.all', function () {
            return collect(File::files(resource_path("posts")))
                ->map(fn ($file) => YamlFrontMatter::parseFile($file))
                ->map(fn ($document) => new Post(
                    $document->title,
                    $document->excerpt,
                    $document->date,
                    $document->body(),
                    $document->slug
                ))
                ->sortByDesc('date');
        });


        // $posts = array_map(function ($file) {
        //     $document = YamlFrontMatter::parseFile($file);

        //     return new Post(
        //         $document->title,
        //         $document->excerpt,
        //         $document->date,
        //         $document->body(),
        //         $document->slug
        //     );
        // }, $files);

    }

    public static function find($slug)
    {
        //Get specific post by its slug by using get all posts function then filter it by the slug
        return static::all()->firstWhere('slug', $slug);
    }


    public static function findOrFail($slug)
    {
        //Get specific post by its slug by using get all posts function then filter it by the slug
        $post = static::find($slug);

        if (!$post) {
            throw new ModelNotFoundException();
        }

        return $post;
    }
}
