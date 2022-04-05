@extends('admin.layouts.master')
@section('content')
    <div class="main-content app-content mt-5">
        <div class="main-container container-fluid">
            <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mg-b-0">New Category</h4>
                        <div class="float-end">
                            <a href="{{ URL::previous() }}">
                                <button class="btn btn-sm btn-danger">
                                    <span><i class="fas fa-arrow-left"></i></span>
                                    Back
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.categories.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Category name</label>
                            <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp" placeholder="Enter country name">
                        </div>

                        <div class="form-group">
                            <label for="name">Category title</label>
                            <input type="text" class="form-control" name="title" id="name" aria-describedby="emailHelp" placeholder="Enter country title">
                        </div>

                        <div class="form-group">
                            <label for="name">Category description</label>
                            <textarea name="description" class="form-control" id="" cols="30" rows="5"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="name">Category keywords</label>
                            <input type="text" data-role="tagsinput" class="form-control" name="keywords[]" id="keywords" aria-describedby="emailHelp" placeholder="Enter keywords">
                            <small class="text-danger">Implode keywords with TAB button</small>
                        </div>

                        <div class="form-group">
                            <label for="address">Add variations</label>
                            <div class="input-group mb-3">
                                              <span class="input-group-text" id="basic-addon1">
                                              <i class="fas fa-list-alt"></i>
                                              </span>
                                <input aria-describedby="basic-addon1" aria-label="Username" class="form-control" placeholder="enter category variations" type="text" name="category_variations[]">
                                <button class="btn btn-info" id="new_variation_button" type="button">
                                    <span><i class="fas fa-plus"></i></span>
                                </button>
                            </div>

                            <div class="input-group mb-3" id="new_variation"></div>
                        </div>

                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control">
                                <option disabled selected>Please select</option>
                                <option value="0">Deactive</option>
                                <option value="1">Active</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            var max_fields  = 5;
            var wrapper     = $('#new_variation');
            var add_button  = $('#new_variation_button');

            var x = 1;
            $(add_button).click(function(e){
                e.preventDefault();
                if(x<=max_fields){
                    x++;
                    $(wrapper).append('<div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1"> <i class="fas fa-list-alt"></i> </span> <input aria-describedby="basic-addon1" aria-label="Username" class="form-control" placeholder="enter new category variation" type="text" name="category_variations[]"> <button class="btn btn-danger" id="remove_variation" type="button"> <span><i class="fas fa-close"></i></span> </button> </div>');
                }
            });

            $(wrapper).on("click", "#remove_variation", function(e){
                e.preventDefault();
                $(this).parent('div').remove();
                x--;
            })
        })
    </script>
@endsection
