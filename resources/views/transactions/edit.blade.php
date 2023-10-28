@extends('layouts.template')

@section('title', 'Update Transactions')

@section('content')
    <div class="mt-4 p-5 bg-black text-white rounded">
        <h1>Update Transactions</h1>
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
            <form action="{{ route('transactions.update', $transaction) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="mb-3 col-md-12 col-sm-12">
                    <label for="amount" class="form-label">Amount (Rupiah)</label>
                    <input type="number" class="form-control" id="amount" name="amount" step="5000"
                    value="{{ old('amount', $transaction->amount) }}">
                </div>
                <div class="mb-3 col-md-12 col-sm-12">
                    <label for="type" class="form-label">Type</label>
                    <select id="type" name="type" class="form-select">
                        <option value="income"
                        {{ old('type', $transaction->type) == 'income' ? 'selected' : '' }}>
                        Income</option>
                        <option value="expense"
                        {{ old('type', $transaction->type) == 'expense' ? 'selected' : '' }}>
                        Expense</option>
                    </select>
                </div>
                <div class="mb-3 col-md-12 col-sm-12">
                    <label for="category" class="form-label">Category</label>
                    <select id="category" name="category" class="form-select">
                        <option value="uncategorized"
                        {{ old('category', $transaction->category) == 'uncategorized' ? 'selected' : '' }}>
                        Uncategorized</option>
                        <option value="" disabled>---------Income---------</option>
                        <option value="wage"
                        {{ old('category', $transaction->category) == 'wage' ? 'selected' : '' }}>
                        Wage</option>
                        <option value="bonus"
                        {{ old('category', $transaction->category) == 'bonus' ? 'selected' : '' }}>
                        Bonus</option>
                        <option value="gift"
                        {{ old('category', $transaction->category) == 'gift' ? 'selected' : '' }}>
                        Gift</option>
                        <option value="" disabled>---------Outcome---------</option>
                        <option value="foodsdrinks"
                        {{ old('category', $transaction->category) == 'foodsdrinks' ? 'selected' : '' }}>
                        Food & Drinks</option>
                        <option value="shopping"
                        {{ old('category', $transaction->category) == 'shopping' ? 'selected' : '' }}>
                        Shopping</option>
                        <option value="charity"
                        {{ old('category', $transaction->category) == 'charity' ? 'selected' : '' }}>
                        Charity</option>
                        <option value="housing"
                        {{ old('category', $transaction->category) == 'housing' ? 'selected' : '' }}>
                        Housing</option>
                        <option value="insurance"
                        {{ old('category', $transaction->category) == 'insurance' ? 'selected' : '' }}>
                        Insurance</option>
                        <option value="taxes"
                        {{ old('category', $transaction->category) == 'taxes' ? 'selected' : '' }}>
                        Taxes</option>
                        <option value="transportation"
                        {{ old('category', $transaction->category) == 'transporation' ? 'selected' : '' }}>
                        Transportation</option>
                      </select>
                </div>
                <div class="mb-3 col-md-12 col-sm-12">
                    <label for="note" class="form-label">Notes</label>
                    <textarea class="form-control" rows="3" name="note">{{ old('note', $transaction->note) }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Save</button>
            </form>
        </div>
    </div>
@endsection
