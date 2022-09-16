<x-layout>
    <div class="m-10 flex flex-col items-stretch flex-wrap md:m-20">
        <h1 class="text-white text-2xl my-4">
        Hantera filmer
        </h1>

        <a href="/movies/create"
            class="py-2 px-4 mb-2 rounded-xl bg-yellow-500 text-sm font-bold w-48 hover:bg-yellow-600" >
            <i class="fa-solid fa-plus mr-1"></i>
            Lägg till en ny film
        </a>

    @if(count($movies)==0)
        <p class="text-white text-lg">Det finns inga filmer att visa</p>
    @endif


    @foreach($movies as $movie)
        <div class="flex flex-col md:flex-row justify-between my-2 md:my-4 bg-white rounded-xl md:max-w-[600px] md:max-h-[130px]">
            <div class="flex justify-start items-start md:items-center">
                <img 
                src="{{$movie->image ? asset('storage/' . $movie->image) : asset('img/no-image.jpg')}}" 
                class="w-[100px] h-[130px] object-stretch rounded-xl"
                alt="Bild från {{$movie->title}}"
                />
            
                <a href="/movies/{{$movie->id}}" >
                    <h3 class="text-black text-xl my-1 mt-4 md:my-4 mx-2 px-3 py-1 text-start hover:bg-gray-200 rounded-2xl">{{$movie->title}}</h3> 
                </a>
            </div>

            <ul class="flex flex-row md:flex-col justify-between items-baseline md:items-end m-2 md:w-40">
                <li>
                    <a href="/movies/{{$movie->id}}/edit"
                    class="py-2 px-3 rounded-xl text-sm text-black font-bold hover:bg-yellow-500">
                    <i class="fa-solid fa-pen mr-1"></i>
                    Uppdatera
                    </a>

                </li>
            
                <li>
                    <form action="/movies/{{$movie->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                        <button type="submit"
                        class="text-black text-sm font-bold px-3 py-2 rounded-xl hover:bg-red-500">
                        <i class="fa-solid fa-trash mr-1"></i>
                        Radera film
                        </button>
                    </form>
                </li>
                       
            </ul>
        </div>
    @endforeach  
        <div class="mb-10 mx-6 md:mx-0 p-2 max-w-[600px]">
            {{$movies->links()}}
        </div>

    </div>
</x-layout>