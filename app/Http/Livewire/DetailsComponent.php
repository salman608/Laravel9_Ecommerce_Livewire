<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class DetailsComponent extends Component
{

    public $slug;
    public function mount($slug)
    {
        $this->slug = $slug;
    }
    // add to cart
    public function store($product_id, $product_name, $product_price)
    {
        Cart::instance('cart')->add($product_id, $product_name, 1, $product_price)->associate('\App\Models\Product');
        session()->flash('success_message', 'Item Added to Cart');
        return redirect()->route('shop.cart');
    }
    public function render()
    {
        $product = Product::where('slug', $this->slug)->first();
        // related product
        $related_products = Product::where('category_id', $product->category_id)->inRandomOrder()->limit(4)->get();
        // latest product
        $new_products = Product::latest()->take(4)->get();
        return view('livewire.details-component', [
            'product' => $product,
            'related_products' => $related_products,
            'new_products' => $new_products,
        ]);
    }
}
