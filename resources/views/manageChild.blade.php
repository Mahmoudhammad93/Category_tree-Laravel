<ul>
    @foreach($childs as $child)
    <li>
        @if(count($child->childs) > 0) > @endif {{ $child->title }}
        @if(count($child->childs))
            @include('manageChild',['childs' => $child->childs])
         @endif
    </li>
    @endforeach
</ul>