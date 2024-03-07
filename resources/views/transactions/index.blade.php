@extends('layout')

@section('content')
<a href="{{ route('transactions.create') }}" class="btn btn-primary mb-3">Add transaction</a>

<div class="card">
  <div class="card-body">
    <form action="{{ route('transactions.index') }}">
      <div class="row d-flex align-items-end">
        <div class="col-3 form-group">
          <label for="search">Search name</label>
          <input type="search" class="form-control" name="search" id="search" value="{{ Request::query('search') ?? '' }}">
        </div>
        <div class="col-2">
          <div class="form-group">
            <button class="btn btn-primary">Search</button>
          </div>
        </div>
      </div>
    </form>
    <table class="table table-bordered" width="100%" cellspacing="0">
      <thead>
        <th>Date</th>
        <th>Product</th>
        <th>Stock</th>
        <th>Sold</th>
      </thead>
      <tbody>
        @foreach ($transactions as $item)
          <tr>
            <td>{{ $item->transaction_date }}</td>
            <td>{{ $item->product->name }}</td>
            <td>{{ $item->last_stock }}</td>
            <td>{{ $item->sold }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection

@push('script')
<script>
  $(document).ready(function() {
    $('#dataTable').DataTable();
  });
</script>
@endpush
