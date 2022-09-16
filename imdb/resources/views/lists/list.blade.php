<x-layout>
    <div class="m-10 flex flex-col items-stretch flex-wrap md:m-20">
        <h1 class="text-white text-2xl my-4">
        Min lista
        </h1>

    @if(count($List_items)==0)
        <p class="text-white text-lg">Det finns inga filmer att visa</p>
    @endif


    @foreach($List_items as $item)
        <div class="flex flex-col md:flex-row justify-between my-2 md:my-4 bg-white rounded-xl md:max-w-[600px] md:max-h-[130px]">
            <div class="flex justify-between md:justify-start items-start md:items-center">
                <img 
                src="{{$item->movie->image ? asset('storage/' . $item->movie->image) : asset('img/no-image.jpg')}}" 
                class="w-[100px] h-[130px] object-stretch rounded-xl"
                alt="Bild från {{$item->title}}"
                />
            
                <a href="/movies/{{$item->movie_id}}" >
                    <h3 class="text-black text-xl my-1 md:my-4 mx-2 px-3 py-1 text-start hover:bg-gray-200 rounded-2xl">{{$item->title}}</h3> 
                </a>
            </div>

            <ul class="flex flex-row md:flex-col justify-between m-2">
                <li>
                    <form action="/lists/{{$item->id}}/edit" method="POST">
                    @csrf
                    @method('PUT')
                    @if($item->watched==0)
                        <input 
                        type="hidden"
                        name="watched"
                        value="1"
                        >
                        <button type="submit"
                        class="text-black text-xl font-bold px-3 py-2 rounded-3xl hover:bg-green-500">
                        <i class="fa-solid fa-circle-check"></i>
                        </button>
                    @else
                        <input 
                        type="hidden"
                        name="watched"
                        value="0"
                        >
                        <button type="submit"
                        class="text-green-500 text-xl font-bold px-3 py-2 rounded-3xl hover:bg-yellow-500">
                        <i class="fa-solid fa-circle-check"></i>
                        </button>
                    @endif
                    </form>

                </li>
            
                <li>
                    <form action="/lists/{{$item->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                        <button type="submit"
                        class="text-black text-xl font-bold px-3 py-2 rounded-3xl hover:bg-red-500">
                        <i class="fa-solid fa-circle-xmark"></i>
                        </button>
                    </form>
                </li>
                       
            </ul>
        </div>
    @endforeach  
    <div class="mb-10 mx-6 md:mx-0 p-2 max-w-[600px]">
            {{$List_items->links()}}
    </div>

</div>
</x-layout>