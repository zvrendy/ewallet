@extends('layouts.base')

@section('title', 'Transaction')

@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">

          <h1>Transaction</h1>
        </div>

        <div class="card-body table-responsive">
          <table id="transactions" class="table table-hover text-nowrap">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Amount</th>
                <th>Transaction Type</th>
                <th>Payment Method</th>
                <th>Status</th>
                <th>Date</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($transactions as $row)
                <tr>
                  <td>{{ $row->id }}</td>
                  <td>{{ $row->user->name }}</td>
                  <td>{{ number_format($row->amount) }}</td>
                  <td>{{ $row->transactionType->code }}</td>
                  <td>{{ ucfirst($row->paymentMethod->name) }}</td>
                  <td>{{ $row->status }}</td>
                  <td>{{ $row->created_at }}</td>
                </tr>
              @empty
                <tr>
                  <td colspan="7"> data belum ada</td>
                </tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('js')
  <script>
    $('#transactions').DataTable();
  </script>
@endpush
