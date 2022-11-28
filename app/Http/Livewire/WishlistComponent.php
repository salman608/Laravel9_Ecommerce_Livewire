<?php

namespace App\Http\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class WishlistComponent extends Component
{

    //Remove to Wishlist function
    public function removeWishlist($product_id)
    {
        foreach (Cart::instance('wishlist')->content() as $wishitem) {
            if ($wishitem->id == $product_id) {
                Cart::instance('wishlist')->remove($wishitem->rowId);
                $this->emitTo('wishlist-icon-component', 'refreshComponent');
                return;
            }
        }
    }

    public function render()
    {
        return view('livewire.wishlist-component');
    }
}
