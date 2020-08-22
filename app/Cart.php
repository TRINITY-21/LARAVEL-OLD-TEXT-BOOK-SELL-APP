<?php
namespace App;
// Models a shopping cart inspired by Academind
class Cart
{
    // Variable to store 
    public $items = null;

    // Variable that stores the totalqty of items the cart
    public $totalQty = 0;

    // Variable to store total price of all items in cart
    public $totalPrice = 0;

    /**
     * Constructor to construct the cart 
     * 
     * @param oldCart
     */
    public function __construct($oldCart)
    {
        if ($oldCart) {
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
        }
    }
    
    
    /**
     * Method to add item to cart.
     *
     * @param item 
     * @param id
     */
    public function add($item, $id) {
        $storedItem = ['qty' => 0, 'price' => $item->price, 'item' => $item];
        if ($this->items) {
            if (array_key_exists($id, $this->items)) {
                $storedItem = $this->items[$id];
            }
        }
        $storedItem['qty']++;
        $storedItem['price'] = $item->price * $storedItem['qty'];
        $this->items[$id] = $storedItem;
        $this->totalQty++;
        $this->totalPrice += $item->price;
    }

    /**
     * Method used to reduce an item by one 
     * 
     * @param item
     */
    public function reduceByOne($id) {
        $this->items[$id]['qty']--;
        $this->items[$id]['price'] -= $this->items[$id]['item']['price'];
        $this->totalQty--;
        $this->totalPrice -= $this->items[$id]['item']['price'];
        if ($this->items[$id]['qty'] <= 0) {
            unset($this->items[$id]);
        }
    }

    /**
     * Method used to remove an item from the cart
     * 
     * @param id
     */
    public function removeItem($id) {
        $this->totalQty -= $this->items[$id]['qty'];
        $this->totalPrice -= $this->items[$id]['price'];
        unset($this->items[$id]);
    }

}