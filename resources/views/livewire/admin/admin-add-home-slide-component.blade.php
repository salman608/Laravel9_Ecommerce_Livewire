<div>
    <style>
        nav svg{
            height: 20px;
        }
        nav .hidden{
            display: block;
        }
      
    </style>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow">Home</a>
                   
                    <span></span> Add Slider
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        @if (Session::has('message'))
                        <div class="alert alert-success text-lg" role="alert">
                           {{ Session::get('message') }}
                        </div>        
                        @endif
                        <div class="card">
                            <div class="card-header">
                               <div class="row">
                                <div class="col-md-6"><h2>Add New Slide</h2></div>
                                <div class="col-md-6"><a href="{{ route('admin.home.slider') }}" class="btn btn-success float-end">View All Slides</a></div>
                               </div>
                            </div>
                            <div class="card-body">
                               
                               <form wire:submit.prevent="addSlider">
                                <div class="mb-3 mt-3">
                                    <label for="top_title" class="form-label">Top Title</label>
                                    <input type="text" id="top_title" name="top_title" class="form-control" placeholder="Enter Top Title Name.." wire:model="top_title" >
                                    @error('top_title')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-3 mt-3">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" id="title" name="title" class="form-control" placeholder="Enter Title Name.." wire:model="title" >
                                    @error('title')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-3 mt-3">
                                    <label for="sub_title" class="form-label">Sub Title</label>
                                    <input type="text" id="sub_title" name="sub_title" class="form-control" placeholder="Enter Sub Title.." wire:model="sub_title" >
                                    @error('sub_title')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3 mt-3">
                                    <label for="offer" class="form-label">Offer</label>
                                    <input type="text" id="offer" name="offer" class="form-control" placeholder="Enter Offer.." wire:model="offer" >
                                    @error('offer')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-3 mt-3">
                                    <label for="link" class="form-label">Link</label>
                                    <input type="text" id="link" name="link" class="form-control" placeholder="Enter link.." wire:model="link">
                                    @error('link')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3 mt-3">
                                    <label for="status" class="form-label">Status</label>
                                   <select class="form-select" name="status" wire:model="status">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                   </select>
                                    @error('status')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3 mt-3">
                                    <label for="image" class="form-label">Slider Image</label>
                                    <input type="file" id="image" name="image" class="form-control" wire:model="image">
                                    @if ($image)
                                        <img src="{{ $image->temporaryUrl() }}" width="120">
                                    @endif
                                    @error('image')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary float-end">Submit</button>
                               </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
</div>

