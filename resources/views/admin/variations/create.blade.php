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
                            @if($errors->has('variation_name'))
                                        <p class="text-danger">{{ $errors->first('variation_name') }}</p>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="input_type">Variation input type</label>
                            <select name="input_type" id="input_type" class="form-control">
                                <option selected disabled>Please select one item</option>
                                @foreach($types as $type)
                                    <option value="{{$type->input_type}}">{{$type->input_type}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('input_type'))
                                        <p class="text-danger">{{ $errors->first('input_type') }}</p>
                            @endif
                        </div>

                        <hr>
                        <div class="form-group">
                            <label for="size_checkbox">
                                <input type="checkbox" name="size_checkbox" id="size_checkbox">
                                Add size group</label>
                        </div>

                        <div id="size_section">
                            <div class="row">
                                @foreach($sizes as $size)
                                    <div class="col-md-2">
                                        <label for="{{$size->size_name}}">
                                            <input type="checkbox" value="{{$size->id}}" name="size_name[]" class="size_checkbox_information" id="{{$size->size_name}}">
                                            {{$size->size_name}}
                                            <ul>
                                                @foreach($size->getSizeOption as $so)
                                                <li>{{$so->size_option_name}}</li>
                                                @endforeach
                                            </ul>
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
    $('#size_section').hide();

$('#size_checkbox').change(function(e){
    if($('#size_checkbox').prop('checked')) {
        $('#size_section').fadeIn('slow');
    } else {
        $('#size_section').fadeOut('slow');
        $('.size_checkbox_information').prop('checked',false);
    }
});
</script>
@endsection
