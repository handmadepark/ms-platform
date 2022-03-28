@extends('admin.layouts.master')
@section('sidebar')
@include('admin.layouts.partials.storeSidebar')
@endsection
@section('content')
<div class="intro-y flex items-center mt-8">
   <h2 class="text-lg font-medium mr-auto">
      All stores
   </h2>
</div>
<div class="intro-y col-span-6 lg:col-span-6 ">
            <!-- BEGIN: Input -->
            <div class="intro-y box">
                <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="font-medium text-base mr-auto">Store informations</h2>
                    <div class="float-right">
                    <div class="preview">

                    <button class="btn btn-sm btn-secondary w-24 mr-1 mb-2">
                        Active - {{ $count_active }}
                    </button>
                    
                    <button class="btn btn-sm btn-secondary w-24 mr-1 mb-2">
                        Deactive - {{ $count_deactive }}
                    </button>
                    
                    <button class="btn btn-sm btn-secondary w-24 mr-1 mb-2">
                        Deleted - {{ $count_deleted }}
                    </button>
                    </div>
                    </div>
                </div>
                <div id="input" class="p-5">

                    <div class="preview">
                    <table id="example" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Store name</th>
                                <th>Country</th>
                                <th>Opening date</th>
                                <th>Status</th>
                                <th>Operations</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($stores as $store)
                            <tr>
                                <td>{{ $store->id }}</td>
                                <td>{{$store->name}}</td>
                                <td>{{ $store->getCountry['name'] }}</td>
                                <td>{{$store->created_at->format('d.m.Y')}}</td>
                                <td>
                                 <svg width="20" viewBox="0 0 135 140" xmlns="http://www.w3.org/2000/svg" fill="{{ ($store->status==1) ? 'green' : 'orange' }}" class="w-8 h-8"> -->
                                    <rect y="10" width="15" height="120" rx="6">
                                        <animate attributeName="height" begin="0.5s" dur="1s" values="120;110;100;90;80;70;60;50;40;140;120" calcMode="linear" repeatCount="indefinite"></animate>
                                        <animate attributeName="y" begin="0.5s" dur="1s" values="10;15;20;25;30;35;40;45;50;0;10" calcMode="linear" repeatCount="indefinite"></animate>
                                    </rect>
                                    <rect x="30" y="10" width="15" height="120" rx="6">
                                        <animate attributeName="height" begin="0.25s" dur="1s" values="120;110;100;90;80;70;60;50;40;140;120" calcMode="linear" repeatCount="indefinite"></animate>
                                        <animate attributeName="y" begin="0.25s" dur="1s" values="10;15;20;25;30;35;40;45;50;0;10" calcMode="linear" repeatCount="indefinite"></animate>
                                    </rect>
                                    <rect x="60" width="15" height="140" rx="6">
                                        <animate attributeName="height" begin="0s" dur="1s" values="120;110;100;90;80;70;60;50;40;140;120" calcMode="linear" repeatCount="indefinite"></animate>
                                        <animate attributeName="y" begin="0s" dur="1s" values="10;15;20;25;30;35;40;45;50;0;10" calcMode="linear" repeatCount="indefinite"></animate>
                                    </rect>
                                    <rect x="90" y="10" width="15" height="120" rx="6">
                                        <animate attributeName="height" begin="0.25s" dur="1s" values="120;110;100;90;80;70;60;50;40;140;120" calcMode="linear" repeatCount="indefinite"></animate>
                                        <animate attributeName="y" begin="0.25s" dur="1s" values="10;15;20;25;30;35;40;45;50;0;10" calcMode="linear" repeatCount="indefinite"></animate>
                                    </rect>
                                    <rect x="120" y="10" width="15" height="120" rx="6">
                                        <animate attributeName="height" begin="0.5s" dur="1s" values="120;110;100;90;80;70;60;50;40;140;120" calcMode="linear" repeatCount="indefinite"></animate>
                                        <animate attributeName="y" begin="0.5s" dur="1s" values="10;15;20;25;30;35;40;45;50;0;10" calcMode="linear" repeatCount="indefinite"></animate>
                                    </rect>
                                </svg> 
                                </td>
                                <td>

                                <a href="">
                                <button class="btn btn-sm btn-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="eye" data-lucide="eye" class="lucide lucide-eye block mx-auto"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                    </button>
                                </a>

                                <a href="">
                                <button class="btn btn-sm btn-twitter">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="pen-tool" data-lucide="pen-tool" class="lucide lucide-pen-tool block mx-auto"><path d="M12 19l7-7 3 3-7 7-3-3z"></path><path d="M18 13l-1.5-7.5L2 2l3.5 14.5L13 18l5-5z"></path><path d="M2 2l7.586 7.586"></path><circle cx="11" cy="11" r="2"></circle></svg>
                                    </button>
                                </a>

                                <a href="{{ route('admin.stores.delete', ['id'=>$store->id]) }}">
                                <button class="btn btn-sm btn-danger">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="trash-2" data-lucide="trash-2" class="lucide lucide-trash-2 block mx-auto"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 01-2 2H7a2 2 0 01-2-2V6m3 0V4a2 2 0 012-2h4a2 2 0 012 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                    </button>
                                </a>

                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6">
                                    <p class="text-center text-danger">There is no store</p>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    </div>
                </div>
                </div>
                </div>
                    
@endsection
@section('scripts')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script>
   $(document).ready(function() {
    $('#example').DataTable();
} );
</script>
@endsection