@foreach($discounts as $discount)
    <option value="{{ $discount->id }}">{{ $discount->code }}</option>
@endforeach
