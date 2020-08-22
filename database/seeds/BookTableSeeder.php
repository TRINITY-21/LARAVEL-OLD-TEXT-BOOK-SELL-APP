<?php

use Illuminate\Database\Seeder;

class BookTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $book = new \App\Book([
        //      'title' => 'A thousand Splendid Suns',
        //      'description' => 'Mariam and Laila come from two different worlds, but will the series of unfortunate events that unite them be the key to a new forming friendship.',
        //      'image' => 'https://images-na.ssl-images-amazon.com/images/I/81DFcrQgjrL.jpg',
        //      'author' => 'Khalid Housseini',
        //      'publishedOn' => '2017-05-22',
        //      'price' => 45,
        //      'type' => 'Fantasy Novel',
        //      'ISBN' => '978-316-148410-0',
        //     ]);

        $book = new \App\Book([
             'title' => 'Digital image processing',
             'description' => 'The leader in the field for more than twenty years, this introduction to basic concepts and methodologies for digital image processing continues its cutting-edge focus on contemporary developments in all mainstream areas of image processing.',
             'image' => 'images/background.jpg',
             'author' => 'Gonzalez, Rafael C.; Woods, Richard E',
             'publishedOn' => '2001-11-09',
             'price' => 53,
             'type' => 'Academic TextBook',
             'ISBN' => '978-316-148410-0',
             'quantity' => 2,
             'location' => 'Aston University',
             'category_id' => 1,
             'user_id' => 1,
             'contact' => 0245050464,

           ]);


        $book->save();

        $book = new \App\Book([
            'title' => 'An introduction to multiagent systems',
            'description' => 'Multiagent systems are a new paradigm for understanding and building distributed systems, where it is assumed that the computational components are autonomous: able to control their own behaviour in the furtherance of their own goals.',
            'image' => '/storage/image/An introduction to multiagent systems.jpg',
            'author' => 'Wooldridge, Michael J',
            'publishedOn' => '2009-05-22',
            'price' => 55,
            'type' => 'Academic TextBook',
            'ISBN' => '978-0470519462',
            'quantity' => 2,
            'location' => 'Aston University',
            'category_id' => 2,
            'user_id' => 1,
            'contact' => 0245050464,
           ]);

        $book->save();

        $book = new \App\Book([
            'title' => 'Multiagent systems: algorithmic, game-theoretic, and logical foundations',
            'description' => 'This exciting and pioneering new overview of multiagent systems, which are online systems composed of multiple interacting intelligent agents, i.e., online trading, offers a newly seen computer science ...',
            'image' => '/storage/image/{{$book->image}}',
            'author' => 'Shoham, Yoav; Leyton-Brown, Kevin',
            'publishedOn' => '2008-12-15',
            'price' => 49,
            'type' => 'Academic TextBook',
            'ISBN' => '978-0521899437',
            'quantity' => 2,
            'location' => 'Aston University',
            'category_id' => 2,
            'user_id' => 1,
            'contact' => 0245050464,
           ]);

        $book->save();

     

   
    }
}
