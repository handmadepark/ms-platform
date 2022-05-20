@extends('admin.layouts.master')
@section('content')

    <div class="main-content app-content mt-5">
        <div class="main-container container-fluid">
            <div class="row row-sm">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header pb-0">
                            <div class="d-flex justify-content-between">
                                <h4 class="card-title mg-b-0">Categories</h4>
                                <div class="float-end">
                                    <a href="{{route('admin.categories.deleted')}}">
                                        <button class="btn btn-sm btn-outline-warning">
                                            <span><i class="fas fa-trash"></i></span>
                                            Deleted categories - {{$count_deleted}}
                                        </button>
                                    </a>
                                    <a href="{{ route('admin.categories.create') }}">
                                        <button class="btn btn-sm btn-info">
                                            <span><i class="fas fa-plus"></i></span>
                                            New category
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover mb-0 text-md-nowrap" id="categories">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">
                                            <span>
                                                <i class="fas fa-cogs"></i>
                                            </span>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody id="tablecontent">
                                    @foreach($categories as $category)
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td>{{ (!is_null($category->parent) ? $category->parent['name'].' -> ' : '') }} {{ $category->name }}  ({{getListingCount($category)}})</td>
                                        <td class="text-center">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" data-id="{{$category->id}}" id="check_status" {{ ($category->status==1) ? 'checked' : ''}}>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <a href="">
                                                <button class="btn btn-sm btn-info">
                                                    <span><i class="fas fa-eye"></i></span>
                                                </button>
                                            </a>
                                            <a href="{{ route('admin.categories.edit', ['id'=>$category->id]) }}">
                                                <button class="btn btn-sm btn-primary">
                                                    <span><i class="fas fa-pencil"></i></span>
                                                </button>
                                            </a>
                                            <a href="{{route('admin.categories.destroy', ['id'=>$category->id])}}">
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
            $('#categories').DataTable();
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
                url: "{{ route('admin.categories.check_status') }}",
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

        });
    </script>
@endsection

