@foreach($menus as $menu)
    <tr>
        <th scope="row">{{$menu->id }}</th>
        <td>{{str_repeat("----", $level).$menu->name}}</td>
        <td>{{$menu->parent_id}}</td>
        <td>{{$menu->slug}}</td>
        <td>{{ $menu->created_at }}</td>
        <td>{{ $menu->updated_at }}</td>
        <td>
            <a href="{{route('admin.menu.edit',$menu->id )}}">
                <button type="button" class="btn btn-warning mb-3">
                    <i class="fa-regular fa-pen-to-square" style="margin: 0"></i>
                </button>
            </a>
            <a class="action_delete" data-url="{{ route('admin.menu.destroy', $menu->id) }}">
                <button type="button" class="btn btn-danger mb-3">
                    <i class="fa fa-trash" aria-hidden="true" class="text-center" style="margin: 0"></i>
                </button>
            </a>
        </td>
    </tr>
    @if($menu->childs)
        @include('admin.content.menu.row_table', ['menus'=>$menu->childs, 'level'=>$level+1])
    @endif
@endforeach

