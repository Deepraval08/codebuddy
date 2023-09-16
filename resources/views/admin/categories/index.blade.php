@extends('layouts.main')


@section('content')
    <h1 class="text-center">Categories Data</h1>

    <div class="container mt-3">
        @if (Session::has('success'))
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                {{ Session::get('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <a href="{{ route('admin.dashboard') }}" class="btn btn-primary">Dashboard</a>
        <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">Add Category</a><br><br>


        <div>
            <h3>Category list</h3>
            <ul>
                @foreach ($categories as $category)
                    <li>
                        {{ $category->name }}

                        @include('admin.categories.deleteform', ['category' => $category])

                        @if (count($category->childs))
                            @include('admin.categories.child', ['childs' => $category->childs])
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>


    </div>
@endsection


@push('js')
    <script>
        $(document).ready(function() {
            $(document).on("click", ".delete-btn", function(e) {
                let dataId = $(this).attr("data-id");
                e.preventDefault();
                if(confirm("Are you sure want to delete this record"))
                {
                    $('#delete_form_' + dataId ).submit();
                }
            });
        });
    </script>
@endpush
