@extends('layouts.main')


@section('content')
     <h2 class="text-center mt-3"> Admin Dashboard</h2>
     
     <div class="container m-3">

        <a href="{{ route('admin.users') }}" class="btn btn-primary">show Users</a><br><br>
        <a href="{{ route('admin.categories.index') }}" class="btn btn-primary">Manage categories</a><br><br>
        
        <hr>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <a href="route('logout')"
            onclick="event.preventDefault();
            this.closest('form').submit();" class="btn btn-primary">Log Out</a>
        </form>
     </div>
     

@endsection