@extends('admin.layouts.master')
@section('content')
    <div class="main-content app-content mt-5">
        <div class="main-container container-fluid">
            <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mg-b-0">New variation</h4>
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

                    <form action="{{route('admin.variations.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Variation name</label>
                            <input type="text" class="form-control" name="variation_name" id="name" aria-describedby="emailHelp" placeholder="Enter variation name">
                        </div>

                        <div class="form-group">
                            <label for="address">Variation options</label>
                            <div class="input-group mb-3">
                                              <span class="input-group-text" id="basic-addon1">
                                              <i class="fas fa-list"></i>
                                              </span>
                                <input aria-describedby="basic-addon1" aria-label="Username" class="form-control" placeholder="enter option name" type="text" name="option_name[]">
                                <button class="btn btn-info" id="new_option_button" type="button">
                                    <span><i class="fas fa-plus"></i></span>
                                </button>
                            </div>

                            <div class="input-group mb-3" id="new_option_section"></div>
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
            var wrapper     = $('#new_option_section');
            var add_button  = $('#new_option_button');

            $(add_button).click(function(e){
                e.preventDefault();
                    $(wrapper).append('<div class="input-group mb-3"> <span class="input-group-text" id="basic-addon1"> <i class="fas fa-list"></i> </span> <input aria-describedby="basic-addon1" aria-label="Username" class="form-control" placeholder="enter option name" type="text" name="option_name[]"> <button class="btn btn-danger" id="remove_option_input" type="button"> <span><i class="fas fa-close"></i></span> </button> </div>');
            });

            $(wrapper).on("click", "#remove_option_input", function(e){
                e.preventDefault();
                $(this).parent('div').remove();
                x--;
            })
        })
    </script>
@endsection
