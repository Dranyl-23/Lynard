<?php

namespace App\Models;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post
{
    public $title;
    public $excerpt;
    public $date;
    public $readTime;
    public $image;
    public $slug;
    public $body;

    public function __construct($title, $excerpt, $date, $readTime, $image, $slug, $body)
    {
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->readTime = $readTime;
        $this->image = $image;
        $this->slug = $slug;
        $this->body = $body;
    }

    public static function all()
    {
        return Cache::remember('all_posts_v2', 3600, function () {
            if (!File::exists(resource_path('posts'))) {
                return collect();
            }

            $files = File::files(resource_path('posts'));

            return collect($files)
                ->map(function ($file) {
                    $document = YamlFrontMatter::parseFile($file->getPathname());

                    return new self(
                        $document->title,
                        $document->excerpt,
                        $document->date,
                        $document->readTime,
                        $document->image,
                        $file->getFilenameWithoutExtension(),
                        $document->body()
                    );
                })
                ->sortByDesc('date')
                ->values();
        });
    }

    public static function find($slug)
    {
        return static::all()->firstWhere('slug', $slug);
    }
}
