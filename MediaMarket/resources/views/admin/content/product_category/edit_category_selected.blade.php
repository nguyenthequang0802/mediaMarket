@foreach($categories as $category)
    @if($category->id === $item->parent_id)
        <option value="{{$category->id}}" selected>{{str_repeat('----', $level).$category->name}}</option>
    @else
        <option value="{{$category->id}}">{{str_repeat('----', $level).$category->name}}</option>
    @endif
    @if($category->childs)
        @include('admin.content.product_category.edit_category_selected', ['categories'=>$category->childs, 'level'=>$level+1, 'item'=>$item])
    @endif
@endforeach
