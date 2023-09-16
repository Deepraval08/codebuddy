@extends('layouts.main')


@section('content')
    <h2 class="text-center my-2">Add category</h2>

    <div class="container">
        <a href="{{ route('admin.categories.index') }}" class="btn btn-primary">Show categories</a>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-primary">Dashboard</a>
        <form action="{{ route('admin.categories.store') }}" method="POST">
            @csrf
    
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" class="form-control" id="name" aria-describedby="emailHelp" name="name"
                    placeholder="Enter Name" value="{{ old('name') }}">
            </div>
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
    
    
            <div class="form-group">
                <label for="exampleInputEmail1">Parent Category</label>
                <select name="parent_id" id="parent_id" class="form-control">
                    <option value="">Select Parent Category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
    
            <button type="submit" class="btn btn-primary mt-3">Submit</button>
    
        </form>
    </div>
    
@endsection
