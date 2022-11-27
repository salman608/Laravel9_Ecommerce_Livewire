<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;
use Livewire\WithPagination;

class ShopComponent extends Component
{
    use WithPagination;
    public $pageSize = 12;
    public $orderBy = 'Default Sorting';

    public function store($product_id, $product_name, $product_price)
    {
        Cart::add($product_id, $product_name, 1, $product_price)->associate('\App\Models\Product');
        session()->flash('success_message', 'Item Added to Cart');
        return redirect()->route('shop.cart');
    }

    public function changePageSize($size)
    {
        $this->pageSize = $size;
    }

    // product sorting
    public function changeOrderBy($order)
    {
        $this->orderBy = $order;
    }
    public function render()
    {
        if ($this->orderBy == 'Price: Low to High') {
            $products = Product::orderBy('regular_price', 'ASC')->paginate($this->pageSize);
        } elseif ($this->orderBy == 'Price: High to Low') {
            $products = Product::orderBy('regular_price', 'DESC')->paginate($this->pageSize);
        } elseif ($this->orderBy == 'Short By Latest') {
            $products = Product::orderBy('created_at', 'DESC')->paginate($this->pageSize);
        } else {
            $products = Product::paginate($this->pageSize);
        }
        return view('livewire.shop-component', ['products' => $products]);
    }
}
