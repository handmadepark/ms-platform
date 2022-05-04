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
                                    <label for="check_parent_id">
                                    <input type="checkbox" class="form-check-input" name="" id="check_parent_id">
                                    Child category</label>
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
                                <div class="form-group" id="parent_category">
                                    <label for="parent_id">Parent category</label>
                                    <select name="parent_id" class="form-control" id="parent_id">
                                        <option disabled selected>Please select one item</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="name">Category name</label>
                                    <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp" placeholder="Enter category name">
                                    @if($errors->has('name'))
                                        <p class="text-danger">{{ $errors->first('name') }}</p>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="title">Category title</label>
                                    <input type="text" class="form-control" name="title" id="title" aria-describedby="emailHelp" placeholder="Enter category title">
                                    @if($errors->has('title'))
                                        <p class="text-danger">{{ $errors->first('title') }}</p>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="name">Category description</label>
                                    <textarea name="description" class="form-control" id="" cols="30" rows="5"></textarea>
                                    @if($errors->has('description'))
                                        <p class="text-danger">{{ $errors->first('description') }}</p>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="name">Category keywords</label>
                                    <input type="text" data-role="tagsinput" class="form-control" name="keywords[]" id="keywords">
                                    <small class="text-danger">Implode keywords with TAB button</small>
                                    @if($errors->has('keywords'))
                                        <p class="text-danger">{{ $errors->first('keywords') }}</p>
                                    @endif
                                </div>

                                <hr>
                                <div class="form-group">
                                    <label for="variation_checkbox">
                                        <input type="checkbox" name="variation_checkbox" id="variation_checkbox">
                                        Add variations</label>
                                </div>

                                <div id="variations_section">
                                    <div class="row">
                                        @foreach($variations as $variation)
                                            <div class="col-md-2">
                                                <label for="{{$variation->variation_name}}">
                                                    <input type="checkbox" value="{{$variation->id}}" name="variation_name[]" id="{{$variation->variation_name}}">
                                                    {{$variation->variation_name}}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <hr>

                                <hr>

                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select name="status" id="status" class="form-control">
                                        <option disabled selected>Please select</option>
                                        <option value="0">Deactive</option>
                                        <option value="1">Active</option>
                                    </select>
                                    @if($errors->has('status'))
                                        <p class="text-danger">{{ $errors->first('status') }}</p>
                                    @endif
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
                    $(wrapper).append('<div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1"> <i class="fas fa-list-alt"></i> </span> <input aria-describedby="basic-addon1" aria-label="Username" class="form-control" placeholder="enter variation name" type="text" name="variation_name[]"> <button class="btn btn-danger" id="remove_variation" type="button"> <span><i class="fas fa-close"></i></span> </button> </div>');
                }
            });

            $(wrapper).on("click", "#remove_variation", function(e){
                e.preventDefault();
                $(this).parent('div').remove();
                x--;
            })
        })

        $('#parent_category').hide();
        $('#variations_section').hide();

        $('#check_parent_id').change(function(e){
            if($('#check_parent_id').prop('checked')) {
                $('#parent_category').fadeIn('slow');
            } else {
                $('#parent_category').fadeOut('slow');
                $('#parent_id').val('');
            }
        });

        $('#variation_checkbox').change(function(e){
            if($('#variation_checkbox').prop('checked')) {
                $('#variations_section').fadeIn('slow');
            } else {
                $('#variations_section').fadeOut('slow');
            }
        });


    </script>
@endsection
