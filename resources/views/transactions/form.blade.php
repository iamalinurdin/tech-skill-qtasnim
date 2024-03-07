@extends('layout')

@section('content')
<div class="row">
  <div class="col-6">
    <form action="{{ route('transactions.store') }}" method="POST">
      @csrf
      <div class="form-group">
        <label for="product_id">Product</label>
        <select name="product_id" id="product_id" class="form-control">
          <option value="#" selected disabled>Choose product</option>
          @foreach ($products as $item)
            <option value="{{ $item->id }}">{{ $item->name }}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <label for="sold">Sold</label>
        <input type="number" name="sold" id="sold" class="form-control">
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
