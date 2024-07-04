@foreach ($suggestions as $product)
    <option class="dropdown-item" value="{{ $product->name }}">{{ $product->name }}</option>
@endforeach
