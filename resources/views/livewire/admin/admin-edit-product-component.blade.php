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
                   
                    <span></span> Update Product
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
                                <div class="col-md-6"><h2>Add New Products</h2></div>
                                <div class="col-md-6"><a href="{{ route('admin.products') }}" class="btn btn-success float-end">View All Products</a></div>
                               </div>
                            </div>
                            <div class="card-body">
                               
                               <form wire:submit.prevent="updateProduct">
                                <div class="mb-3 mt-3">
                                    <label for="name" class="form-label">Product Name</label>
                                    <input type="text" id="name" name="name" class="form-control" placeholder="Enter product Name.." wire:model="name" wire:keyup="generateSlug">
                                    @error('name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3 mt-3">
                                    <label for="slug" class="form-label">Product Slug</label>
                                    <input type="text" id="slug" name="slug" class="form-control" placeholder="Enter Slug.." wire:model="slug">
                                    @error('slug')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-3 mt-3">
                                    <label for="short_description" class="form-label">Short Description</label>
                                    <textarea name="short_description" id="" cols="30" rows="10" class="form-control" placeholder="Enter short desctiption" wire:model="short_description"></textarea>
                                    @error('short_description')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3 mt-3">
                                    <label for="long_description" class="form-label">Long Description</label>
                                    <textarea name="long_description" id="" cols="30" rows="10" class="form-control" placeholder="Enter Long desctiption" wire:model="long_description"></textarea>
                                    @error('long_description')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-3 mt-3">
                                    <label for="regular_price" class="form-label">Regular Price</label>
                                    <input type="number" id="regular_price" name="regular_price" class="form-control" placeholder="Regular Price" wire:model="regular_price">
                                    @error('regular_price')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-3 mt-3">
                                    <label for="sale_price" class="form-label">Sale Price</label>
                                    <input type="number" id="sale_price" name="sale_price" class="form-control" placeholder="Sale Price" wire:model="sale_price">
                                    @error('sale_price')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-3 mt-3">
                                    <label for="sku" class="form-label">SKU</label>
                                    <input type="text" id="sku" name="SKU" class="form-control" placeholder="sku" wire:model="SKU">
                                    @error('SKU')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-3 mt-3">
                                    <label for="stock_status" class="form-label" >Stock Status</label>
                                    <select name="stock_status" id="stock_status" wire:model='stock_status' class="form-control" >
                                        <option value="instock">InStock</option>
                                        <option value="outofstock">Out Of Stock</option>
                                    </select>
                                    @error('stock_status')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-3 mt-3">
                                    <label for="featured" class="form-label"  >Featured</label>
                                    <select name="featured" id="featured" wire:model='featured' class="form-control">
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                    @error('featured')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-3 mt-3">
                                    <label for="quantity" class="form-label">Quantity</label>
                                    <input type="text" id="quantity" name="quantity" class="form-control" placeholder="quantity" wire:model="quantity">
                                    @error('quantity')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-3 mt-3">
                                    <label for="image" class="form-label">Product Image</label>
                                    <input type="file" id="image" name="image" class="form-control" wire:model="newimage">
                                    @if ($newimage)
                                        <img src="{{ $newimage->temporaryUrl() }}" width="120">
                                    @else
                                    <img src="{{ asset('assets/imgs/products') }}/{{$image}}" width="120">
                                    @endif
                                    @error('newimage')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-3 mt-3">
                                    <label for="category_id" class="form-label">Category</label>
                                    <select name="category_id"  wire:model="category_id" class="form-control">
                                        <option value="">Select Category</option>
                                        @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->category }}</option>
                                        @endforeach
                                             
                                    </select>
                                    @error('category_id')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary float-end">Update Product</button>
                               </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
</div>
