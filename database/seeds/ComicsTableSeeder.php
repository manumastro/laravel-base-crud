<?php

use App\Comic;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ComicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $comics = config('comics');
        foreach ($comics as $comic) {

            $newComic = new Comic();
            $newComic->title = $comic->title;
            $newComic->slug = Str::slug($comic->title, '-');
            $newComic->image = $comic->image;
            $newComic->type = $comic->type;
            $newComic->save();
        }
    }
}
