@extends('layout')

@section('content')
<div class="card">
  <div class="card-body">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
