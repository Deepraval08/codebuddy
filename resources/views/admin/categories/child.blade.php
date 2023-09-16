<ul>
    @foreach ($childs as $child)
        <li> 
                    {{ $child->name }}
              
                    @include('admin.categories.deleteform', ['category' => $child])
           
            @if (count($child->childs))
                @include('admin.categories.child', ['childs' => $child->childs])
            @endif
        </li>
    @endforeach
</ul>
