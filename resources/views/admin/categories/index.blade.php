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
                                    <a href="{{ route('admin.categories.deleted') }}">
                                        <button class="btn btn-sm btn-outline-warning">
                                            <span><i class="fas fa-trash text-danger"></i></span>
                                            Deleted categories - {{ $count_deleted }}
                                        </button>
                                    </a>
                                    <a href="{{ route('admin.categories.create') }}">
                                        <button type="button" class="btn btn-outline-info btn-sm">
                                            <span><i class="fas fa-plus"></i></span>
                                            New category
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card mg-b-20">
                                        <div class="card-body">
                                            <div class="row">
                                                <!-- col -->
                                                <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
                                                    <ul id="treeview1" class="tree">
                                                        @foreach ($categories as $category)
                                                            <li class="branch">
                                                                <i class="si fe fe-folder-plus"></i>
                                                                <span class="float-end">
                                                                    <i class="fas fa-eye text-info"
                                                                       onclick="showCategoryDetails({{$category->id}})"></i>
                                                                    <i class="fas fa-pencil"
                                                                       onclick="showCategoryDetails({{$category->id}})"></i>
                                                                    <i class="fas fa-trash text-danger"
                                                                       onclick="showCategoryDetails({{$category->id}})"></i>
                                                                </span>
                                                                {{ $category->name }}
                                                                <ul>
                                                                    @foreach ($category->getSubcategories as $sub)
                                                                        <li class="branch"><i
                                                                                class="si fe fe-folder-plus"></i>
                                                                            <span class="float-end">
                                                                                <i class="fas fa-eye text-info"
                                                                                   onclick="showCategoryDetails({{$sub->id}})"></i>
                                                                                <i class="fas fa-pencil"
                                                                                   onclick="showCategoryDetails({{$sub->id}})"></i>
                                                                                <i class="fas fa-trash text-danger"
                                                                                   onclick="showCategoryDetails({{$sub->id}})"></i>
                                                                            </span>
                                                                            {{ $sub->name }}
                                                                            <ul>
                                                                                @foreach ($sub->getChildCategory as $child)
                                                                                    <li class="branch">
                                                                                        <i class="si fe fe-folder-minus"></i>
                                                                                        <span class="float-end">
                                                                                            <i class="fas fa-eye text-info"
                                                                                               onclick="showCategoryDetails({{$child->id}})"></i>
                                                                                            <i class="fas fa-pencil"
                                                                                               onclick="showCategoryDetails({{$child->id}})"></i>
                                                                                            <i class="fas fa-trash text-danger"
                                                                                               onclick="showCategoryDetails({{$child->id}})"></i>
                                                                                        </span>
                                                                                        {{ $child->name }}
                                                                                        <ul>
                                                                                            @foreach($child->getGrandChildCategory as $grand)
                                                                                                <li class="branch">
                                                                                                    <span class="float-end">
                                                                                                        <i class="fas fa-eye text-info"
                                                                                                           onclick="showCategoryDetails({{$grand->id}})"></i>
                                                                                                        <i class="fas fa-pencil"
                                                                                                           onclick="showCategoryDetails({{$grand->id}})"></i>
                                                                                                        <i class="fas fa-trash text-danger"
                                                                                                           onclick="showCategoryDetails({{$grand->id}})"></i>
                                                                                                    </span>
                                                                                                    {{$grand->name}}
                                                                                                </li>
                                                                                            @endforeach
                                                                                        </ul>
                                                                                    </li>
                                                                                @endforeach
                                                                            </ul>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                                <!-- /col -->
                                            </div>
                                        </div>
                                    </div>

                                </div>
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
        function showCategoryDetails(category_id) {
            alert(category_id);
        }
    </script>
@endsection
