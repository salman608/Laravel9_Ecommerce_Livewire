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
                   
                    <span></span> All Sliders
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
                                    <div class="col-md-6"> <h2>All Sliders</h2></div>
                                    <div class="col-md-6">
                                        <a href="{{ route('admin.home.slider.add') }}" class="btn btn-success float-end">Add Category</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Image</th>
                                            <th>Top Title</th>
                                            <th>Title</th>
                                            <th>Sub Title</th>
                                            <th>Offer</th>
                                            <th>Link</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i=0;
                                        @endphp
                                        @foreach ($slides as $slider)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td><img src="{{ asset('assets/imgs')}}/{{$slider->image}}" alt="" width="60"/></td>
                                            <td>{{ $slider->top_title }}</td>
                                            <td>{{ $slider->title }}</td>
                                            <td>{{ $slider->sub_title }}</td>
                                            <td>{{ $slider->offer }}</td>
                                            <td>{{ $slider->link }}</td>
                                            <td>{{ $slider->status==1?'Active':'Inactive' }}</td>
                                           
                                            <td>
                                                
                                                <a href="{{ route('admin.home.slider.edit',['slider_id'=>$slider->id]) }}"class="text-info"><i class="fi-rs-edit"></i></a> 
                                                <a href="#" onclick="deleteConfirmation({{ $slider->id }})" style="margin-left: 20px" class="text-pimary"><i class="fi-rs-trash"></i></a>
                                            </td>
                                        </tr>
                                            
                                        @endforeach                    
                                    </tbody>
                                </table>
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination justify-content-start">
                                        {{-- {{ $categories->links() }} --}}
                                    </ul>
                                </nav>
                                {{-- {{ $categories->links() }} --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>

<div class="modal" id="deleteConfirmation">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body pb-30 pt-30">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h4 class="pb-3">Do you Want to delete This record</h4>
                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#deleteConfirmation">Cancel</button>
                        <button type="button" class="btn btn-danger" onclick="deleteSlider()">Delete</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        function deleteConfirmation(id){
            @this.set('slider_id',id);
            $('#deleteConfirmation').modal('show');
        }

        function deleteSlider(){
            @this.call('deleteSlider');
            $('#deleteConfirmation').modal('hide');
        }
    </script>
@endpush
