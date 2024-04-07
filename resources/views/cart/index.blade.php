@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="row">
  @forelse ($viewData["carts"] as $cart)
  <div class="col-md-12 col-lg-3 mb-2">
    <div class="card">
      <img src="{{ asset('/storage/'.$cart->product->getImage()) }}" class="card-img-top img-card">
      <div class="card-body text-center">
        <a href="{{ route('product.show', ['id'=> $cart->product->getId()]) }}"
          class="btn bg-primary text-white">{{ $cart->product->getName() }}</a>
          <form action="{{ route('cart.index') }}" method="POST">
          @csrf
          <input type="hidden" name="productID" value="{{ $cart->getId() }}">
          <input type="number" name="quantity" value="{{ $cart->getQuantity() }}" min="1">
          <button type="submit" class="btn bg-primary text-white">Change</button>
        </form>
        <form action="{{ route('cart.delete', $cart->getId()) }}" method="POST" onsubmit="return confirm('Are you sure?')">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Remove</button>
      </form>
      </div>
    </div>
  </div>
  @empty
    <div class="col">
      <p>Your cart is empty.</p>
    </div>
  @endforelse
</div>
@if($viewData["carts"]->isNotEmpty())
  <div class="col-12 text-center mt-4">
    <form action="{{ route('order.store') }}" method="POST">
      @csrf
      <button type="submit" class="btn btn-success">Checkout</button>
    </form>
  </div>
@endif
@endsection
