@extends('layout')

@section('title', $product->name)

@section('content')

    <div class="container">
        @if (session()->has('success_message'))
            <div class="alert alert-success">
                {{ session()->get('success_message') }}
            </div>
        @endif

        @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

    <div class="container">
    <div class="product-section-information">
        <div class="title-details">
            <h1 class="product-section-title">{{ $product->name }}</h1>
            <div class="product-section-subtitle">{{ $product->details }}</div>
            <img src="{{ asset('img/products/'. $product->imagen) }}" alt="">
        </div>
    </div>
    <div class="product-section-information">
        <div class="row-price-stock">
            @if($product->discount > 0)
            <div class="column-price">
                <div class="row">
                    <div class="product-real-price"><strike>{{ $product->price }}</strike></div>
                    <div class="product-discount">{{'%'+$product->discount+' OFF'}}</div>
                </div>
                <div class="product-section-price">{{ $product->price }}</div>
            </div>
            @else
            <div class="column-price">
                <div class="product-section-price">{{ $product->price }}</div>
            </div>
            @endif
        </div>
    </div>
    <div>
    <form action="{{ route('checkout.store') }}" method="POST">
        @csrf
        <input type="hidden" name="machine_id" value="{{ $machine->id }}">
        <input type="hidden" name="product_id" value="{{ $product->id }}">
        <button type="submit" name="submit" class="button-primary">Comprar</button>
    </from>    
    </div>
    </div>

    @include('partials.might-like')

@endsection