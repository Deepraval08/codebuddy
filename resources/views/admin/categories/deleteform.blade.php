<form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" id="delete_form_{{ $category->id }}">
    <a class="btn btn-primary btn-sm" href="{{ route('admin.categories.edit', $category->id) }}">Edit</a>

    @csrf
    @method('DELETE')

    <button type="submit" class="btn btn-danger btn-sm delete-btn" data-id="{{ $category->id }}">Delete</button>
</form>