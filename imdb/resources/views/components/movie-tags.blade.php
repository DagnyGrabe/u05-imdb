@props(['tagsList'])

@php
    $tags = explode(',', $tagsList);
@endphp



<ul class="flex justify-items-center flex-wrap mb-2">

@foreach($tags as $tag)
    <li class="bg-yellow-500 text-black text-xs font-bold px-2 py-1 rounded-xl m-1">
        <a href="/?tag={{$tag}}">{{$tag}}</a>
    </li>
@endforeach
</ul>