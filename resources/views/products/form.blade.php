@extends('layout')

@section('content')
<div class="row">
  <div class="col-6">
    <form action="{{ route('products.store') }}" method="POST">
      @csrf
      <div class="form-group">
        <label for="name">Product Name</label>
        <input type="text" class="form-control" name="name" id="name">
      </div>
      <div class="row">
        <div class="col-6">
          <div class="form-group">
            <label for="category">Category</label>
            <select name="category" id="category" class="form-control">
              <option value="#" selected disabled>Choose category</option>
              <option value="Konsumsi">Konsumsi</option>
              <option value="Pembersih">Pembersih</option>
            </select>
          </div>
        </div>
        <div class="col-6">
          <div class="form-group">
            <label for="stock">Stock</label>
            <input type="number" name="stock" id="stock" class="form-control">
          </div>
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Save</button>
      <button type="reset" class="btn btn-warning">Reset</button>
      <a href="#" class="btn btn-danger">Cancel</a>
    </form>
  </div>
</div>
@endsection

@push('script')

@endpush
