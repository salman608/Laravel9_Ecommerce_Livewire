<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;
use Illuminate\Support\Str;

class AdminAddCategoryComponent extends Component
{
    public $category;
    public $slug;

    public function generateSlug()
    {
        $this->slug = Str::slug($this->category);
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'category' => 'required',
            'slug' => 'required'
        ]);
    }

    public function storeCategory()
    {
        $this->validate([
            'category' => 'required',
            'slug' => 'required'
        ]);

        Category::create([
            'category' => $this->category,
            'slug' => $this->slug,
        ]);

        session()->flash('message', 'Category Has Been Created');
    }
    public function render()
    {
        return view('livewire.admin.admin-add-category-component');
    }
}
