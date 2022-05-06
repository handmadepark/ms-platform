@extends('admin.layouts.master')
@section('content')
    <div class="main-content app-content">

        <!-- container -->
        <div class="main-container container-fluid">


            <!-- breadcrumb -->
            <div class="breadcrumb-header justify-content-between">
                <div class="left-content">
                    <span class="main-content-title mg-b-0 mg-b-lg-1">Settings</span>
                </div>
            </div>
            <!-- /breadcrumb -->

            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title  mg-b-10">Category treeview </h3>
                            <p class="mg-b-20">You can add sub and clild categories from here.</p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <strong>Input types</strong>
                                        </div>
                                        <div class="card-body">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th colspan="4">
                                                        <form action="{{route('admin.settings.create_input')}}" method="POST">
                                                            @csrf
                                                            <div class="row">
                                                                <div class="col-sm-9">
                                                                    <input type="text" placeholder="enter type name" name="input_type" id="input_type" class="form-control">
                                                                </div>
                                                                <div class="col-sm-3">
                                                                    <button type="submit" class="btn btn-outline-info w-100">
                                                                        <span><i class="fas fa-plus"></i></span>
                                                                        New
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </th>
                                                </tr>
                                                <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Input type</th>
                                                <th scope="col">
                                                    <span><i class="fas fa-cogs"></i></span>
                                                </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($types as $type)
                                                    <tr>
                                                        <th scope="row">{{$type->id}}</th>
                                                        <td>{{$type->input_type}}</td>
                                                        <td>
                                                        <a href="{{route('admin.settings.destroyInput', ['id'=>$type->id])}}">
                                                                <button class="btn btn-danger btn-sm">
                                                                    <span><i class="fas fa-trash"></i></span>
                                                                </button>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <strong>Scales</strong>
                                        </div>
                                        <div class="card-body">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th colspan="4">
                                                        <form action="{{route('admin.settings.create_scale')}}" method="POST">
                                                            @csrf
                                                            <div class="row">
                                                                <div class="col-sm-9">
                                                                    <input type="text" placeholder="enter scale" name="scale_name" id="scale_name" class="form-control">
                                                                </div>
                                                                <div class="col-sm-3">
                                                                    <button type="submit" class="btn btn-outline-info w-100">
                                                                        <span><i class="fas fa-plus"></i></span>
                                                                        New
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </th>
                                                </tr>
                                                <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Scale name</th>
                                                <th scope="col">
                                                    <span><i class="fas fa-cogs"></i></span>
                                                </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($scales as $scale)
                                                    <tr>
                                                        <th scope="row">{{$scale->id}}</th>
                                                        <td>{{$scale->scale_name}}</td>
                                                        <td>
                                                        <a href="{{ route('admin.settings.destroy_scale', ['id'=>$scale->id]) }}">
                                                                <button class="btn btn-danger btn-sm">
                                                                    <span><i class="fas fa-trash"></i></span>
                                                                </button>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- row -->


        </div>
        <!-- Container closed -->
    </div>
@endsection

@section('scripts')
    <script>

        $('.form-check-input').change(function(e){
            var dataId = $(this).data('id');
            var ch = $(this).is(':checked') ? 1 : 0;
            $post = $(this);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: "{{ route('admin.settings.check_scale_status') }}",
                type: "POST",
                data:{
                    "dataId":dataId,
                    "check":ch
                },
                success:function(data)
                {
                    Toast.fire({
                        icon: data.icon,
                        title: data.message
                    })
                }
            });

        })
    </script>
@endsection
