@section('edit_form')
<div class="card mb-4">
  <div class="card-header">
    Edit {{$viewData['product']->getName()}}
  </div>
  <div class="card-body">
    
    @if($errors->any())
    <ul class="alert alert-danger list-unstyled">
      @foreach($errors->all() as $error)
      <li>- {{ $error }}</li>
      @endforeach
    </ul>
    @endif

    <form method="POST" action="{{ route('admin.product.update', ['id'=> $viewData['product']->getId()]) }}"
      enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="row">
        <div class="col">
          <div class="mb-3 row">
            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Name:</label>
            <div class="col-lg-10 col-md-6 col-sm-12">
              <input name="name" value="{{ $viewData['product']->getName() }}" type="text" class="form-control">
            </div>
          </div>
        </div>
        <div class="col">
          <div class="mb-3 row">
            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Price:</label>
            <div class="col-lg-10 col-md-6 col-sm-12">
              <input name="price" value="{{ $viewData['product']->getPrice() }}" type="number" step="0.01" class="form-control">
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <div class="mb-3 row">
            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Image:</label>
            <div class="col-lg-10 col-md-6 col-sm-12">
              <input class="form-control" type="file" name="image">
              <small>Select a new image to update;<br> otherwise, leave it blank</small>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="mb-3 row">
            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Category:</label>
            <div class="col-lg-10 col-md-6 col-sm-12">
              <select class="form-control" name="category">
                <option value="sandwich" {{ $viewData['product']->getCategory() == "sandwich" ? "selected" : "" }}>Sandwich</option>
                <option value="burger" {{ $viewData['product']->getCategory() == "burger" ? "selected" : "" }}>Burger</option>
                <option value="salad" {{ $viewData['product']->getCategory() == "salad" ? "selected" : "" }}>Salad</option>
                <option value="side" {{ $viewData['product']->getCategory() == "side" ? "selected" : "" }}>Side</option>
                <option value="beverage" {{ $viewData['product']->getCategory() == "beverage" ? "selected" : "" }}>Beverage</option>
              </select>
            </div>
          </div>
        </div>
      </div>
      <div class="mb-3">
        <label class="form-label">Description:</label>
        <textarea class="form-control" name="description"
          rows="3">{{ $viewData['product']->getDescription() }}</textarea>
      </div>
      <button type="submit" class="btn btn-primary">Edit</button>
    </form>
  </div>
</div>
@endsection