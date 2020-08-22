<?php

use Faker\Generator as Faker;

$factory->define(App\Book::class, function (Faker $faker) {
    return [
        'title' => 'Digital image processing',
        'description' => 'The leader in the field for more than twenty years, this introduction to basic concepts and methodologies for digital image processing continues its cutting-edge focus on contemporary developments in all mainstream areas of image processing.',
        'image' => '/public/images/background.jpg',
        'author' => 'Gonzalez, Rafael C.; Woods, Richard E',
        'publishedOn' => '2001-11-09',
        'price' => 53,
        'type' => 'Academic TextBook',
        'ISBN' => '978-316-148410-0',
        'quantity' => 2,
        'location' => 'Aston University',
        'category_id' => 1,
        'contact' => 0245050464,
        'user_id' => 1,
    ];
});
