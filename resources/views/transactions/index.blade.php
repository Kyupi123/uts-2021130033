@extends('layouts.template')

@section('title', 'Books List')

@section('content')
    <div class="mt-4 p-5 bg-black text-white rounded">
        <h1>All Transactions</h1>
        <a href="{{ route('transactions.create') }}" class="btn btn-primary btn-sm">Add New Transaction</a>
    </div>

    @if (session()->has('success'))
    <div class="alert alert-success mt-4">
        {{ session()->get('success') }}
    </div>
    @endif

    <div class="container mt-5">
        <table class="table table-bordered mb-5">
            <thead>
                <tr class="table-success">
                    <th scope="col">#</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Type</th>
                    <th scope="col">Category</th>
                    <th scope="col">Notes</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Updated At</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $balance = 0; $totincome = 0; $totexpense = 0; $jmlincome = 0; $jmlexpense = 0;
                @endphp
                @forelse ($transactions as $transaction)
                    <tr>
                        <th scope="row">
                            <a href="{{ route('transactions.show', $transaction) }}">
                                {{ $transaction->id }}
                            </a>
                        </th>
                        <td>{{ $transaction->amount }}</td>
                        <td>{{ $transaction->type }}</td>
                        @if ($transaction->type == 'income')
                        @php
                            $totincome += $transaction->amount;
                            $jmlincome += 1;
                        @endphp
                        @else
                            @php
                                $totexpense += $transaction->amount;
                                $jmlexpense += 1;
                            @endphp
                        @endif
                        <td>{{ $transaction->category }}</td>
                        <td>{{ Str::limit($transaction->note, 50, ' ...') }}</td>
                        <td>{{ $transaction->created_at }}</td>
                        <td>{{ $transaction->updated_at }}</td>
                        <td>
                            <a href="{{ route('transactions.edit', $transaction) }}" class="btn btn-primary btn-sm">
                                Edit
                            </a>
                            <form action="{{ route('transactions.destroy', $transaction) }}" method="POST"
                                class="d-inline-block">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure?')">Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">No transaction datas found.</td>
                    </tr>
                @endforelse
                @php
                    $balance = $totincome - $totexpense;
                @endphp
            </tbody>
        </table>

        <div class="container mt-5">
            <table class="table table-bordered mb-5">
                <thead>
                    <tr class="table-success">
                        <th>Jumlah Saldo</th>
                        <th>Total Income</th>
                        <th>Total Expense</th>
                        <th>Jumlah Transaksi Income</th>
                        <th>Jumlah Transaksi Expense</th>
                    </tr>
                    <tr>
                        <th>Rp. {{ $balance }}</th>
                        <th>Rp. {{ $totincome }}</th>
                        <th>Rp. {{ $totexpense }}</th>
                        <th>{{ $jmlincome }}</th>
                        <th>{{ $jmlexpense }}</th>
                    </tr>
                </thead>
            </table>
        </div>

        <div class="d-flex justify-content-center">
            {!! $transactions->links() !!}
        </div>
    </div>
@endsection
