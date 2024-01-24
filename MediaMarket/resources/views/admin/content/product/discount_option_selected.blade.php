@foreach($discounts as $discount)
    @if($item->discount_id === $discount->id)
        <option value="{{ $discount->id }}" selected>{{ $discount->code }}</option>
    @else
        <option value="{{ $discount->id }}">{{ $discount->code }}</option>
    @endif
@endforeach
