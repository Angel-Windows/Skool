@php
    $menu_item = \App\Models\MenuItem::get();
@endphp
@foreach($menu_item as $item)
    <a href="{{route($item->href)}}">
        <i class="{{$item->icon}}"></i>
        <span>{{$item->name}}</span>
    </a>
@endforeach
