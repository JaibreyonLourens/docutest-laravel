@extends('layouts.app')
@section('content')
    <h1>Create Product</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li> {makkelijk om je errors te debuggen }
            @endforeach
        </div>
    @endif
    <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input class="form-control" type="text" name="name" value="{{ old('name') }}">
        </div>

        <div class="form-group">
            <label for="price">Price</label>
            <input class="form-control" type="text" name="price" id="" value="{{ old('price') }}">
        </div>

        <div class="form-group">
            <label for="categorie">Category</label>
            <select class="form-control" name="categorie_id" id="">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}"> {{ $category->name }}</option>
                @endforeach
            </select>
        </div>


        <div class="form-group">
            <input class="btn btn-primary" type="submit" value="Create Product">
        </div>
    </form>
@endsection
