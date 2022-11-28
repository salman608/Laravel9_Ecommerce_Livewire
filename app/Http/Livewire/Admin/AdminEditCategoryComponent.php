<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;
use Illuminate\Support\Str;


class AdminEditCategoryComponent extends Component
{
    public $category_id;
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

    public function mount($category_id)
    {
        $category = Category::find($category_id);
        $this->category_id = $category->id;
        $this->category = $category->category;
        $this->slug = $category->slug;
    }


    public function updateCategory()
    {
        $this->validate([
            'category' => 'required',
            'slug' => 'required'
        ]);

        Category::find($this->category_id)->create([
            'category' => $this->category,
            'slug' => $this->slug,
        ]);
        session()->flash('message', 'Category Updated Successfully');
    }

    public function render()
    {
        return view('livewire.admin.admin-edit-category-component');
    }
}
