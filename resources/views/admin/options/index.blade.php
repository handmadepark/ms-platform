@extends('admin.layouts.master')
@section('content')

    <div class="main-content app-content mt-5">
        <div class="main-container container-fluid">
            <div class="row row-sm">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header pb-0">
                            <div class="d-flex justify-content-between">
                                <h4 class="card-title mg-b-0">Variation Options</h4>
                                <div class="float-end">
                                    <a href="{{route('admin.options.deleted')}}">
                                        <button class="btn btn-sm btn-outline-warning">
                                            <span><i class="fas fa-trash"></i></span>
                                            Deleted variations - {{$count_deleted}}
                                        </button>
                                    </a>
                                    <a href="{{ route('admin.options.create') }}">
                                        <button class="btn btn-sm btn-info">
                                            <span><i class="fas fa-plus"></i></span>
                                            New variation option
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover mb-0 text-md-nowrap text-center" id="options">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Variation</th>
                                        <th>Input type</th>
                                        <th>Status</th>
                                        <th class="text-center">
                                            <span>
                                                <i class="fas fa-cogs"></i>
                                            </span>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody id="tablecontent">
                                    @foreach($options as $option)
                                        <tr>
                                            <td>{{$option->id}}</td>
                                            <td>{{$option->option_name}}</td>
                                            <td>{{$option->getVariation['variation_name']}}</td>
                                            <td>
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" role="switch" data-id="{{$option->id}}" id="check_status" {{ ($option->status==1) ? 'checked' : ''}}>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="">
                                                    <button class="btn btn-sm btn-info">
                                                        <span><i class="fas fa-eye"></i></span>
                                                    </button>
                                                </a>
                                                <a href="{{route('admin.options.edit', ['id'=>$option->id])}}">
                                                    <button class="btn btn-sm btn-primary">
                                                        <span><i class="fas fa-pen"></i></span>
                                                    </button>
                                                </a>
                                                <a href="{{route('admin.options.delete', ['id'=>$option->id])}}">
                                                    <button class="btn btn-sm btn-danger">
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
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#options').DataTable();
        });

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
                url: "{{ route('admin.options.check_status') }}",
                type: "POST",
                data:{
                    "dataId":dataId,
                    "check":ch
                },
                success:function(data)
                {
                    Toast.fire({
                        icon: data.icon,
                        title: data.message,
                    })
                }
            });

        })
    </script>
@endsection

