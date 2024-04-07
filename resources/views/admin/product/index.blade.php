@extends('layouts.admin')
@include('admin.product.form')
@section('title', $viewData["title"])
@section('content')
@yield('form')
<div class="card">
  <div class="card-header">
    Manage Products
  </div>
  <div class="card-body">
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th scope="col">Image</th>
          <th scope="col">ID</th>
          <th scope="col">Name</th>
          <th scope="col">Price</th>
          <th scope="col">Edit</th>
          <th scope="col">Delete</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($viewData["products"] as $product)
        <tr>
          <td class="col-lg-4 ms-auto me-2"><img src="{{ asset('/storage/' . $product->getImage()) }}" class="img-thumbnail" alt="{{ $product->getName() }}"></td>
          <td>{{ $product->getId() }}</td>
          <td>{{ $product->getName() }}</td>
          <td>{{ $product->getPrice() }}</td>
          <td>
            <a class="btn btn-primary" 
              href="{{route('admin.product.edit', ['id'=> $product->getId()])}}">
              <i class="bi-pencil"></i>
            </a>
          </td>
          <td>
            <form action="{{ route('admin.product.delete', $product->getId())}}" method="POST">
              @csrf
              @method('DELETE')
              <button class="btn btn-danger">
                <i class="bi-trash"></i>
              </button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection

