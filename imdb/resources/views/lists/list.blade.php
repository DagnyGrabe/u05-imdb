<x-layout>
    <div class="m-10 flex flex-col items-stretch flex-wrap md:m-20">
        <h1 class="text-white text-2xl my-4">
        Min lista
        </h1>

    @if(count($List_items)==0)
        <p class="text-white text-lg">Det finns inga filmer att visa</p>
    @endif


    @foreach($List_items as $item)
        <div class="flex flex-col md:flex-row justify-between my-2 md:my-4 bg-white rounded-xl md:max-w-[600px] md:max-h-[120px]">
            <div class="flex justify-between md:justify-start items-start md:items-center">
                <img 
                src="{{$item->movie->image ? asset('storage/' . $item->movie->image) : asset('img/no-image.jpg')}}" 
                class="w-[100px] h-[120px] object-cover rounded-xl"
                alt="Bild från {{$item->title}}"
                />
            
                <a href="/movies/{{$item->movie_id}}" >
                    <h3 class="text-black text-xl my-1 md:my-4 mx-2 p-2 text-start hover:border-2 border-black rounded-xl">{{$item->title}}</h3> 
                </a>
            </div>

            <ul class="flex flex-row md:flex-col justify-between m-2">
                <li>
                    <form action="/lists/{{$item->id}}/edit" method="POST">
                    @csrf
                    @method('PUT')
                    @if($item['watched']==0)
                        <input 
                        type="hidden"
                        name="watched"
                        value="1"
                        >
                        <button type="submit"
                        class="bg-yellow-500 text-black text-lg font-bold px-4 py-2 rounded-xl hover:bg-green-600">
                        <i class="fa-solid fa-circle-check"></i>
                        </button>
                    @else
                        <input 
                        type="hidden"
                        name="watched"
                        value="0"
                        >
                        <button type="submit"
                        class="bg-green-500 text-black text-lg font-bold px-4 py-2 rounded-xl hover:bg-yellow-600">
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
                        class="bg-yellow-500 text-black text-lg font-bold px-4 py-2 rounded-xl hover:bg-red-600">
                        <i class="fa-solid fa-circle-xmark"></i>
                        </button>
                    </form>
                </li>
                       
            </ul>
        </div>
    @endforeach  


</div>
</x-layout>