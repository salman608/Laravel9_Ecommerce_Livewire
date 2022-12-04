<?php

namespace App\Http\Livewire;

use App\Models\HomeSlider;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;


class HomeComponent extends Component
{
    //Add to cart function
    public function store($product_id, $product_name, $product_price)
    {
        Cart::instance('cart')->add($product_id, $product_name, 1, $product_price)->associate('\App\Models\Product');
        session()->flash('success_message', 'Item Added to Cart');
        $this->emitTo('cart-icon-component', 'refreshComponent');
        return redirect()->route('shop.cart');
    }


    public function render()
    {
        $slides = HomeSlider::where('status', 1)->get();
        // new araival
        $products = Product::orderBy('created_at', 'DESC')->get()->take(8);

        $feature_products = Product::where('featured', 1)->inRandomOrder()->get()->take(8);
        return view('livewire.home-component', [
            'slides' => $slides,
            'products' => $products,
            'feature_products' => $feature_products,
        ]);
    }
}
