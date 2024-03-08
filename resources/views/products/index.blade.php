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
        <th>#</th>
      </thead>
      <tbody>
        @foreach ($products as $item)
          <tr>
            <td>{{ $item->name }}</td>
            <td>{{ $item->category }}</td>
            <td>{{ $item->stock->stock }}</td>
            <td class="d-flex" style="gap: 5px">
              <a href="{{ route('products.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
              <form action="{{ route('products.destroy', $item->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-danger">Delete</button>
              </form>
            </td>
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
