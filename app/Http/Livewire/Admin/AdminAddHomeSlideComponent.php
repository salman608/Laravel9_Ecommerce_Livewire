<?php

namespace App\Http\Livewire\Admin;

use App\Models\HomeSlider;
use Illuminate\Support\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminAddHomeSlideComponent extends Component
{
    use WithFileUploads;
    public $top_title;
    public $title;
    public $sub_title;
    public $offer;
    public $link;
    public $status;
    public $image;

    public function addSlider()
    {
        $this->validate([
            'top_title' => 'required',
            'title' => 'required',
            'sub_title' => 'required',
            'offer' => 'required',
            'link' => 'required',
            'status' => 'required',
            'image' => 'required',
        ]);

        $imageName = Carbon::now()->timestamp . '.' . $this->image->extension();
        $image = $this->image->storeAs('slider', $imageName);

        HomeSlider::create([
            'top_title' => $this->top_title,
            'title' => $this->title,
            'sub_title' => $this->sub_title,
            'offer' => $this->offer,
            'link' => $this->link,
            'status' => $this->status,
            'image' => $image,
        ]);
        session()->flash('message', 'Slider add Successfull');
    }
    public function render()
    {
        return view('livewire.admin.admin-add-home-slide-component');
    }
}
