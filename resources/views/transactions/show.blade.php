@extends('layouts.template')

@section('title', $transaction->note)

@section('content')
    <article class="blog-post my-4">
        <h1 class="display-5 fw-bold">{{ $transaction->note }}</h1>
        <p class="blog-post-meta">{{ $transaction->updated_at }}</p>
        <p>Notes : {{ $transaction->note }}</p>
        <p>Type: {{ $transaction->type }}</p>
        <p>Category: {{ $transaction->category }}</p>
        <p>Amount: {{ $transaction->amount }}</p>
    </article>
@endsection
