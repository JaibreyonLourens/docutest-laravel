@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <h1 class="card-title"> {{ $product->name }} </h1>
            <p class="card-text"> {{ $product->price }} </p>
            <p>Categorie: <a style="color: black" href="{{route('categories.show', $product->category->id)}}">{{ $product->category->name  }}</a></p>
            <a class="btn btn-primary" href="{{ route('products.edit', $product->id) }}">EDIT</a>
            <form method="POST" action="{{ route('products.destroy', $product->id) }}">
                @csrf
                @method('DELETE')

                <input class="btn btn-warning" type="submit" value="DELETE">
        </div>
    </div>
@endsection
