@foreach($brands as $brand)
    @if($item->brand_id === $brand->id)
        <option value="{{ $brand->id }}" selected>{{ $brand->name }}</option>
    @else
        <option value="{{ $brand->id }}">{{ $brand->name }}</option>

    @endif
@endforeach
