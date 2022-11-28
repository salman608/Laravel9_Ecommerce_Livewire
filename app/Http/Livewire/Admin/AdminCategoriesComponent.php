<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class AdminCategoriesComponent extends Component
{
    use WithPagination;
    public function render()
    {
        $categories = Category::orderBy('category', 'DESC')->paginate(5);
        return view('livewire.admin.admin-categories-component', ['categories' => $categories]);
    }
}
