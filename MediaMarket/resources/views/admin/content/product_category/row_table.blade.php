@foreach($categories as $category)
    <tr>
        <th scope="row">{{$category->id }}</th>
        <td>{{str_repeat("----", $level).$category->name}}</td>
        <td>{{$category->parent_id}}</td>
        <td>{{$category->description}}</td>
        <td>{{ $category->created_at }}</td>
        <td>{{ $category->updated_at }}</td>
        <td>
            <a href="{{route('admin.product_category.edit',$category->id )}}">
                <button type="button" class="btn btn-warning mb-3">
                    <i class="fa-regular fa-pen-to-square" style="margin: 0"></i>
                </button>
            </a>
            <a class="action_delete" data-url="{{ route('admin.product_category.destroy', $category->id) }}">
                <button type="button" class="btn btn-danger mb-3">
                    <i class="fa fa-trash" aria-hidden="true" class="text-center" style="margin: 0"></i>
                </button>
            </a>
        </td>
    </tr>
    @if($category->childs)
        @include('admin.content.product_category.row_table', ['categories'=>$category->childs, 'level'=>$level+1])
    @endif
@endforeach
