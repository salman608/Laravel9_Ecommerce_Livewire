<?php

namespace App\Http\Livewire\Admin;

use App\Models\HomeSlider;
use Livewire\Component;

class AdminHomeSlideComponent extends Component
{
    public $slider_id;


    public function deleteSlider()
    {
        $slide = HomeSlider::find($this->slider_id);
        unlink('assets/imgs/' . $slide->image);
        $slide->delete();

        session()->flash('message', 'Slider deleted successfully');
    }
    public function render()
    {
        $slides = HomeSlider::orderBy('created_at', 'DESC')->get();
        return view('livewire.admin.admin-home-slide-component', ['slides' => $slides]);
    }
}
