@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="container">
  <h1>Order #{{ $viewData["order"]->getId() }}</h1>
  <p>Order Date: {{ $viewData["order"]->getCreatedAt() }}</p>
  <table class="table">
    <thead>
      <tr>
        <th>Product Name</th>
        <th>Quantity</th>
        <th>Price</th>
      </tr>
    </thead>
    <tbody>
      @foreach($viewData["order"]->orderDetails as $orderDetail)
      <tr>
        <td>{{ $orderDetail->product->getName() }}</td>
        <td>{{ $orderDetail->getQuantity() }}</td>
        <td>{{ $orderDetail->product->getPrice() }}</td>
      </tr>
      @endforeach
      <tr>
        <td colspan="2" class="text-right"><strong>Total Amount:</strong></td>
        <td><strong>${{ number_format($viewData["totalAmount"], 2) }}</strong></td>
      </tr>
    </tbody>
  </table>
</div>
@endsection