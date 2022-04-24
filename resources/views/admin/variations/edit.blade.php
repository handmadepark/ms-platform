@extends('admin.layouts.master')
@section('content')
    <div class="main-content app-content mt-5">
        <div class="main-container container-fluid">
            <div class="row row-sm">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header pb-0">
                            <div class="d-flex justify-content-between">
                                <h4 class="card-title mg-b-0">{{$item->variation_name}}</h4>
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
                        <form action="{{route('admin.variations.update', ['id'=>$item->id])}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Variation name</label>
                            <input type="text" class="form-control" name="variation_name" id="name" aria-describedby="emailHelp" value="{{ $item->variation_name }}">
                            @if($errors->has('variation_name'))
                                        <p class="text-danger">{{ $errors->first('variation_name') }}</p>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="input_type">Variation input type</label>
                            <select name="input_type" id="input_type" class="form-control">
                                <option selected disabled>Please select one item</option>
                                <option value="text" {{$item->input_type=="text" ? 'selected' : ''}}>Text field</option>
                                <option value="email" {{$item->input_type=="email" ? 'selected' : ''}}>Email field</option>
                                <option value="url" {{$item->input_type=="url" ? 'selected' : ''}}>Url field</option>
                                <option value="number" {{$item->input_type=="number" ? 'selected' : ''}}>Number field</option>
                                <option value="textarea" {{$item->input_type=="textarea" ? 'selected' : ''}}>Textarea</option>
                                <option value="select" {{$item->input_type=="select" ? 'selected' : ''}}>Select option</option>
                                <option value="checkbox" {{$item->input_type=="checkbox" ? 'selected' : ''}}>Checkbox</option>
                                <option value="radio" {{$item->input_type=="radio" ? 'selected' : ''}}>Checkbox</option>
                            </select>
                            @if($errors->has('input_type'))
                                        <p class="text-danger">{{ $errors->first('input_type') }}</p>
                            @endif
                        </div>

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
