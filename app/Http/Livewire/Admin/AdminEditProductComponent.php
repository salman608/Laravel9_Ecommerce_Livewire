<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use App\Models\Product;
use Illuminate\Support\Carbon;

class AdminEditProductComponent extends Component
{

    use WithFileUploads;

    public $product_id;
    public $name;
    public $slug;
    public $short_description;
    public $long_description;
    public $regular_price;
    public $sale_price;
    public $SKU;
    public $stock_status = 'instock';
    public $featured = 0;
    public $quantity;
    public $image;
    public $category_id;
    public $newimage;

    public function mount($product_id)
    {
        $product = Product::find($product_id);
        $this->product_id = $product->id;
        $this->name = $product->name;
        $this->slug = $product->slug;
        $this->short_description = $product->short_description;
        $this->long_description = $product->long_description;
        $this->regular_price = $product->regular_price;
        $this->sale_price = $product->sale_price;
        $this->SKU = $product->SKU;
        $this->stock_status = $product->stock_status;
        $this->featured = $product->featured;
        $this->quantity = $product->quantity;
        $this->image = $product->image;
        $this->category_id = $product->category_id;
    }
    public function generateSlug()
    {
        $this->slug = Str::slug($this->name);
    }


    public function updateProduct()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required',
            'short_description' => 'required',
            'long_description' => 'required',
            'regular_price' => 'required',
            'sale_price' => 'required',
            'SKU' => 'required',
            'stock_status' => 'required',
            'featured' => 'required',
            'quantity' => 'required',
            'image' => 'required',
            'category_id' => 'required',
        ]);
        // $product = '';



        $product = Product::find($this->product_id);
        $product->name = $this->name;
        $product->slug = $this->slug;
        $product->short_description = $this->short_description;
        $product->long_description = $this->long_description;
        $product->regular_price = $this->regular_price;
        $product->sale_price = $this->sale_price;
        $product->SKU = $this->SKU;
        $product->stock_status = $this->stock_status;
        $product->featured = $this->featured;
        $product->quantity = $this->quantity;
        if ($this->newimage) {
            unlink('assets/imgs/products/' . $product->image);
            $imageName = Carbon::now()->timestamp . '.' . $this->newimage->extension();
            $image = $this->newimage->storeAs('', $imageName);
            $product->image = $image;
        }

        $product->category_id = $this->category_id;
        $product->save();

        session()->flash('message', 'Product Update Successfull');
    }
    public function render()
    {
        $categories = Category::orderBy('category', 'ASC')->get();
        return view('livewire.admin.admin-edit-product-component', ['categories' => $categories]);
    }
}
