@extends('layouts.template')

@section('title', 'Add New Transactions')

@section('content')
    <div class="mt-4 p-5 bg-black text-white rounded">
        <h1>Add New Transactions</h1>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger mt-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row my-5">
        <div class="col-12 px-5">
            <form action="{{ route('transactions.store') }}" method="POST">
                @csrf
                <div class="mb-3 col-md-12 col-sm-12">
                    <label for="amount" class="form-label">Amount (Rupiah)</label>
                    <input type="number" class="form-control" id="amount" name="amount" value="{{ old('amount') }}">
                </div>
                <div class="mb-3 col-md-12 col-sm-12">
                    <label for="type" class="form-label">Type</label>
                    <select id="type" name="type" class="form-select">
                        <option value="income">Income</option>
                        <option value="expense">Expense</option>
                    </select>
                </div>
                <div class="mb-3 col-md-12 col-sm-12">
                    <label for="category" class="form-label">Category</label>
                    <select id="category" name="category" class="form-select">
                        <option value="uncategorized">Uncategorized</option>
                        <option value="" disabled>---------Income---------</option>
                        <option value="wage">Wage</option>
                        <option value="bonus">Bonus</option>
                        <option value="gift">Gift</option>
                        <option value="" disabled>---------Outcome---------</option>
                        <option value="foodsdrinks">Food & Drinks</option>
                        <option value="shopping">Shopping</option>
                        <option value="charity">Charity</option>
                        <option value="housing">Housing</option>
                        <option value="insurance">Insurance</option>
                        <option value="taxes">Taxes</option>
                        <option value="transportation">Transportation</option>
                      </select>
                </div>
                <div class="mb-3 col-md-12 col-sm-12">
                    <label for="note" class="form-label">Notes</label>
                    <textarea class="form-control" rows="3" name="note">{{ old('note') }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Save</button>
            </form>
        </div>
    </div>
@endsection
