@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
@forelse ($viewData["orders"] as $order)
  <div class="row mb-2 justify-content-center">
      <div class="col-md-8">
          <div class="card border-primary">
              <div class="card-body">
                  <div class="d-flex justify-content-between align-items-center">
                      <div>
                          <p class="card-title"><strong>Order #{{ $order->getId() }}</strong></p>
                          <p class="card-text">{{ $order->getCreatedAt() }}</p>
                      </div>
                      <a href="{{ route('order.detail', ['id'=> $order->getId()]) }}" class="btn btn-success text-white">Detail</a>
                  </div>
              </div>
          </div>
      </div>
  </div>
@empty
  <div class="row">
      <div class="col text-center">
          <p>No orders found.</p>
      </div>
  </div>
@endforelse

@endsection