<?php

namespace Tests\Unit;

use App\Cart;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class cartTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testAdd()
    {   
        # Creating a Book Object
        $book = new \App\Book([
            'title' => 'Multiagent systems: algorithmic, game-theoretic, and logical foundations',
            'description' => 'This exciting and pioneering new overview of multiagent systems, which are online systems composed of multiple interacting intelligent agents, i.e., online trading, offers a newly seen computer science ...',
            'image' => '/storage/image/{{$book->image}}',
            'author' => 'Shoham, Yoav; Leyton-Brown, Kevin',
            'publishedOn' => '2008-12-15',
            'price' => 49,
            'type' => 'Academic TextBook',
            'ISBN' => '978-0521899437',
            'user_id' => 1,
            'location' => "test",
            'quantity' => 1
           ]);

        $book->save();

        # Old cart which is set to null as it does not exist yet
        $oldcart = null;
        # Creating a new Cart and passing in the old cart
        $Cart = new Cart($oldcart);
        # Adding an item in the cart by specifying the item and its id
        $Cart->add($book, $book->id);
        # Checking if the cart contains one item
        $this->assertEquals($Cart->totalQty, 1);
        # Checking if the total price of items in the cart is correct
        $this->assertEquals($Cart->totalPrice, 49);
    }

    public function testAdd2Items()
    {   
        # Creating a Book Object
        $book = new \App\Book([
            'title' => 'Multiagent systems: algorithmic, game-theoretic, and logical foundations',
            'description' => 'This exciting and pioneering new overview of multiagent systems, which are online systems composed of multiple interacting intelligent agents, i.e., online trading, offers a newly seen computer science ...',
            'image' => '/storage/image/{{$book->image}}',
            'author' => 'Shoham, Yoav; Leyton-Brown, Kevin',
            'publishedOn' => '2008-12-15',
            'price' => 49,
            'type' => 'Academic TextBook',
            'ISBN' => '978-0521899437',
            'user_id' => 1,
            'location' => "test",
            'quantity' => 1
           ]);

        $book->save();

        $book2 = new \App\Book([
            'title' => 'An introduction to multiagent systems',
            'description' => 'Multiagent systems are a new paradigm for understanding and building distributed systems, where it is assumed that the computational components are autonomous: able to control their own behaviour in the furtherance of their own goals.',
            'image' => '/storage/image/An introduction to multiagent systems.jpg',
            'author' => 'Wooldridge, Michael J',
            'publishedOn' => '2009-05-22',
            'price' => 55,
            'type' => 'Academic TextBook',
            'ISBN' => '978-0470519462',
            'user_id' => 1,
            'location' => "test",
            'quantity' => 1
           ]);

        $book2->save();

        # Old cart which is set to null as it does not exist yet
        $oldcart = null;
        # Creating a new Cart and passing in the old cart
        $Cart = new Cart($oldcart);
        # Adding an item in the cart by specifying the item and its id
        $Cart->add($book, $book->id);
        # Adding an item in the cart by specifying the item and its id
        $Cart->add($book2, $book2->id);
        # Checking if the cart contains 2 items as 2 books were added to it
        $this->assertEquals($Cart->totalQty, 2);
        # Checking if the total price of items in the cart is correct
        $this->assertEquals($Cart->totalPrice, 104);
    }

    public function testReduceByOne()
    {   
        # Creating a Book Object
        $book = new \App\Book([
            'title' => 'Multiagent systems: algorithmic, game-theoretic, and logical foundations',
            'description' => 'This exciting and pioneering new overview of multiagent systems, which are online systems composed of multiple interacting intelligent agents, i.e., online trading, offers a newly seen computer science ...',
            'image' => '/storage/image/{{$book->image}}',
            'author' => 'Shoham, Yoav; Leyton-Brown, Kevin',
            'publishedOn' => '2008-12-15',
            'price' => 49,
            'type' => 'Academic TextBook',
            'ISBN' => '978-0521899437',
            'user_id' => 1,
            'location' => "test",
            'quantity' => 1
           ]);

        # Oldcart which is set to null as it does not exist yet
        $oldcart = null;
        # Creating a new cart
        $Cart = new Cart($oldcart);
        # Adding an item to the cart by specifying the item name and the id of the item
        $Cart->add($book, $book->id);
         # Adding an item to the cart by specifying the item name and the id of the item
        $Cart->add($book, $book->id);
        # Now we have 2 of the same items in the cart, by using reducebyOne, 
        # we will reduce this item by 1 by specifying the id of the item
        $Cart->reduceByOne($book->id);
        # if the items are now equal to 1, then the test will pass
        $this->assertEquals($Cart->totalQty, 1);
        # Checking if the total price of items in the cart is correct
        $this->assertEquals($Cart->totalPrice, 49);
    }

    public function testRemoveItem()

    {   
        # Creating a Book Object
        $book = new \App\Book([
            'title' => 'Multiagent systems: algorithmic, game-theoretic, and logical foundations',
            'description' => 'This exciting and pioneering new overview of multiagent systems, which are online systems composed of multiple interacting intelligent agents, i.e., online trading, offers a newly seen computer science ...',
            'image' => '/storage/image/{{$book->image}}',
            'author' => 'Shoham, Yoav; Leyton-Brown, Kevin',
            'publishedOn' => '2008-12-15',
            'price' => 49,
            'type' => 'Academic TextBook',
            'ISBN' => '978-0521899437',
            'user_id' => 1,
            'location' => "test",
            'quantity' => 1
           ]);

        # Oldcart which is set to null as it does not exist yet
         $oldcart = null;
         # Creating a new cart
         $Cart = new Cart($oldcart);
         # Adding an item to the cart by specifying the item name and the id of the item
         $Cart->add($book, $book->id);
         # Adding an item to the cart by specifying the item name and the id of the item
         $Cart->add($book, $book->id);
         # Now we have 2 of the same items in the cart, by using removeItem, 
         # we will remove this item regardless of its quantity by specifying the id of the item
         $Cart->RemoveItem($book->id);
         # if the items are now equal to 0, then the test will pass
         $this->assertEquals($Cart->totalQty, 0);
         # Checking if the total price of items in the cart is correct
         $this->assertEquals($Cart->totalPrice, 0);

    }
}
