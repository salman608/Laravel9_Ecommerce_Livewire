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
                   
                    <span></span>Edit Category
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
                                <div class="col-md-6"><h2>Add New Category</h2></div>
                                <div class="col-md-6"><a href="{{ route('admin.categories') }}" class="btn btn-success float-end">View All Category</a></div>
                               </div>
                            </div>
                            <div class="card-body">
                               
                               <form wire:submit.prevent="updateCategory">
                                <div class="mb-3 mt-3">
                                    <label for="category" class="form-label">Category Name</label>
                                    <input type="text" id="category" name="category" class="form-control" placeholder="Enter Category Name.." wire:model="category" wire:keyup="generateSlug">
                                    @error('category')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3 mt-3">
                                    <label for="category" class="form-label">Category Slug</label>
                                    <input type="text" id="category" name="slug" class="form-control" placeholder="Enter Category Slug.." wire:model="slug">
                                    @error('slug')
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
