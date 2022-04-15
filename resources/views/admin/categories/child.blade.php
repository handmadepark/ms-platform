@foreach($subcategories as $subcategory)
<tr>
    <td>{{ $subcategory->id }}</td>
    <td>{{ $subcategory->parent['name'] .' -> '. $subcategory->name }} ({{getListingCount($subcategory)}})</td>
    <td class="text-center">
        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" role="switch" data-id="{{$subcategory->id}}" id="check_status" {{ ($subcategory->status==1) ? 'checked' : ''}}>
        </div>
    </td>
    <td class="text-center">
        <a href="">
            <button class="btn btn-sm btn-info">
                <span><i class="fas fa-eye"></i></span>
            </button>
        </a>
        <a href="{{ route('admin.categories.edit', ['id'=>$subcategory->id]) }}">
                                                <button class="btn btn-sm btn-primary">
                                                    <span><i class="fas fa-pencil"></i></span>
                                                </button>
                                            </a>
                                            <a href="{{route('admin.categories.destroy', ['id'=>$subcategory->id])}}">
                                                <button class="btn btn-sm btn-danger">
                                                    <span><i class="fas fa-trash"></i></span>
                                                </button>
                                            </a>
    </td>
</tr>
  @if(count($subcategory->subcategory))
    @include('admin.categories.child',['subcategories' => $subcategory->subcategory])
  @endif
@endforeach
