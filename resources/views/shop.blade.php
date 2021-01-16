@extends('layout')

@section('title', 'Productos')

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

    <div class="products-section container">
        <div>
            <div class="products text-center">
                @forelse ($products as $product)
                    <ul>
                    <li><a href="{{ route('machine.show', [ 'machine' => $machine->slug, 'product' => $product->slug ]) }}">{{ $product->name }}</a></li>
                    </ul>
                @empty
                    <div style="text-align: left">No se encontraron items</div>
                @endforelse
            </div> <!-- end products -->
        </div>
    </div>

@endsection

