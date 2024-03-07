@extends('layout')

@section('content')
<a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Add product</a>

<div class="card">
  <div class="card-body">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
      <thead>
        <th>Product</th>
        <th>Category</th>
        <th>Stock</th>
      </thead>
      <tbody>
        @foreach ($products as $item)
          <tr>
            <td>{{ $item->name }}</td>
            <td>{{ $item->category }}</td>
            <td>{{ $item->stock->stock }}</td>
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
