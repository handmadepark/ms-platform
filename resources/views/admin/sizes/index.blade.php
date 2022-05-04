@extends('admin.layouts.master')
@section('content')

    <div class="main-content app-content mt-5">
        <div class="main-container container-fluid">
            <div class="row row-sm">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header pb-0">
                            <div class="d-flex justify-content-between">
                                <h4 class="card-title mg-b-0">Sizes</h4>
                                <div class="float-end">
                                    <a href="{{route('admin.sizes.deleted')}}">
                                        <button class="btn btn-sm btn-outline-warning">
                                            <span><i class="fas fa-trash"></i></span>
                                            Deleted sizes - {{$count_deleted}}
                                        </button>
                                    </a>
                                    <a href="{{ route('admin.sizes.create') }}">
                                        <button class="btn btn-sm btn-info">
                                            <span><i class="fas fa-plus"></i></span>
                                            New size
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover mb-0 text-md-nowrap text-center" id="sizes">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th class="text-center">
                                            <span>
                                                <i class="fas fa-cogs"></i>
                                            </span>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody id="tablecontent">
                                    @foreach($sizes as $size)
                                        <tr>
                                            <td>{{$size->id}}</td>
                                            <td>{{$size->size_name}}</td>
                                            <td>
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" role="switch" data-id="{{$size->id}}" id="check_status" {{ ($size->status==1) ? 'checked' : ''}}>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="">
                                                    <button class="btn btn-sm btn-info">
                                                        <span><i class="fas fa-eye"></i></span>
                                                    </button>
                                                </a>
                                                <a href="{{route('admin.sizes.edit', ['id'=>$size->id])}}">
                                                    <button class="btn btn-sm btn-primary">
                                                        <span><i class="fas fa-pen"></i></span>
                                                    </button>
                                                </a>
                                                <a href="{{route('admin.sizes.delete', ['id'=>$size->id])}}">
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
            $('#sizes').DataTable();
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
                url: "{{ route('admin.sizes.check_status') }}",
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

