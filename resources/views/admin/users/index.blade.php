@extends('layouts.main')

@section('content')
    <h1 class="text-center">Users Data</h1>

    <div class="container">
        <a href="{{ route('admin.dashboard') }}" class="btn btn-primary">Dashboard</a><br><br>

        <table class="table mt-4 table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">NAME</th>
                    <th scope="col">EMAIL</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</th>
                        <td>{{ $user->name }}</th>
                        <td>{{ $user->email }}</th>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
