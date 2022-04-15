@extends('admin.layouts.master')
@section('content')
    <div class="main-content app-content mt-5">
        <div class="main-container container-fluid">
            <div class="row row-sm">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header pb-0">
                            <div class="d-flex justify-content-between">
                                <h4 class="card-title mg-b-0">{{$data->name}} category</h4>
                                <div class="float-end">
                                    <label for="check_parent_id">
                                    <input type="checkbox" class="form-check-input" {{(is_null($data->parent_id)) ? '' : 'checked'}} name="" id="check_parent_id">
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
                            <form action="{{route('admin.categories.update', ['id'=>$data->id])}}" method="POST">
                                @csrf
                                <div class="form-group" id="parent_category">
                                    <label for="parent_id">Parent category</label>
                                    <select name="parent_id" class="form-control" id="parent_id">
                                        <option disabled selected>Please select one item</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}" {{($data->parent_id==$category->id) ? 'selected' : ''}}>{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="name">Category name</label>
                                    <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp" value="{{ $data->name }}">
                                    @if($errors->has('name'))
                                        <p class="text-danger">{{ $errors->first('name') }}</p>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="title">Category title</label>
                                    <input type="text" class="form-control" name="title" id="title" aria-describedby="emailHelp" value="{{$data->title}}">
                                    @if($errors->has('title'))
                                        <p class="text-danger">{{ $errors->first('title') }}</p>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="name">Category description</label>
                                    <textarea name="description" class="form-control" id="" cols="30" rows="5">{{$data->description}}</textarea>
                                    @if($errors->has('description'))
                                        <p class="text-danger">{{ $errors->first('description') }}</p>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="name">Category keywords</label>
                                    <input type="text" data-role="tagsinput" class="form-control" name="keywords[]" id="keywords" value="">
                                    <small class="text-danger">Implode keywords with TAB button</small>
                                </div>

                                <hr>
                                <div class="form-group">
                                    <label for="variation_checkbox">
                                    <input type="checkbox" {{$data->variations()->count()>0 ? 'checked' : ''}} name="variation_checkbox" id="variation_checkbox">
                                        Add variations</label>
                                </div>

                                <div id="variations_section">
                                    <div class="row">
                                        @foreach($variations as $variation)
                                            <div class="col-md-2">
                                                <label for="{{$variation->variation_name}}">
                                                    <input type="checkbox" value="{{$variation->id}}" name="variation_name" id="{{$variation->variation_name}}">
                                                    {{$variation->variation_name}}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select name="status" id="status" class="form-control">
                                        <option disabled selected>Please select</option>
                                        <option value="0" {{$data->status == 0 ? 'selected' : ''}}>Deactive</option>
                                        <option value="1" {{$data->status == 1 ? 'selected' : ''}}>Active</option>
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

        if($('#check_parent_id').prop('checked')) {
            $('#parent_category').fadeIn('slow');
        }else{
            $('#parent_category').hide();
        }

        if($('#variation_checkbox').prop('checked')) {
            $('#variations_section').fadeIn('slow');
        }else{
            $('#variations_section').hide();
        }

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
