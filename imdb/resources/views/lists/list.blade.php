<x-layout>
    <div class="m-20 mb-2 flex-col">
        <h1 class="text-white text-2xl">
        Min lista
        </h1>

    @if(count($List_items)==0)
        <p class="text-white text-lg">Det finns inga filmer att visa</p>
    @endif


    @foreach($List_items as $item)
        <ul class="">
            <li> 
                <a href="/movies/{{$item->movie_id}}" >
                    <h3 class="text-white text-xl mx-2 my-1">{{$item->title}}</h3> 
                </a>
            </li>
                
                
        </ul>
    @endforeach  


</div>
</x-layout>