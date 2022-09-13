            
    <x-layout> 
        <div class="bg-white p-6 sm:p-10 rounded-xl  max-w-lg mx-4 md:mx-auto my-24">
            <header class="text-center">
                <h1 class="text-2xl font-bold mb-1">
                    Skriv en recension
                </h1>
                <p class="mb-6 text-sm">{{$movie->title}}</p>
            </header>  
            <form method="POST" action="/reviews" enctype="multipart/form-data">
                @csrf
                <input class="hidden"
                       type="hidden"
                       name="movie_id"
                       value="{{$movie->id}}"/>

                <span class="mb-6 ">
                    <input 
                        type="radio" 
                        value="1" 
                        name="rating" 
                        id="rating1"
                        class=""/>
                    <label for="star1" class="text-2xl"> 
                        <i class="fa-regular fa-star"></i>
                    </label>
                    <input 
                        type="radio" 
                        value="2" 
                        name="rating" 
                        id="rating2"
                        class=""/>
                    <label for="star2" class="text-2xl"> 
                        <i class="fa-regular fa-star"></i>
                    </label>
                    <input 
                        type="radio" 
                        value="3" 
                        name="rating" 
                        id="rating3"
                        class=""/>
                    <label for="star3" class="text-2xl"> 
                        <i class="fa-regular fa-star"></i>
                    </label>
                    <input 
                        type="radio" 
                        value="4" 
                        name="rating" 
                        id="rating4"
                        class=""/>
                    <label for="star4" class="text-2xl"> 
                        <i class="fa-regular fa-star"></i>
                    </label>
                    <input 
                        type="radio" 
                        value="5" 
                        name="rating" 
                        id="rating5"
                        class=""/>
                    <label for="rating" class="text-2xl"> 
                        <i class="fa-regular fa-star"></i>
                    </label>
                    @error('rating')
                        <p class="text-red-500 text-xs mt-4 text-center">{{$message}}</p>
                    @enderror
                </span>
                
                <div class="mb-6">
                    <label
                        for="title"
                        class="inline-block text-md mb-2">
                        Titel
                    </label>
                    <input
                        type="text"
                        class="border-2 border-black rounded-xl p-2 w-full"
                        name="title"
                        placeholder=""
                    />
                    @error('title')
                        <p class="text-red-500 text-xs mt-4 text-center">{{$message}}</p>
                    @enderror
  
                </div>

                <div class="mb-6">
                    <label
                        for="description"
                        class="inline-block text-md mb-2">
                        Recension
                    </label>
                    <textarea
                        rows="5"
                        class="border-2 border-black rounded-xl p-2 w-full"
                        name="description"
                        placeholder="Lämna en kort beskrivning av filmen"
                    >
                    </textarea>
                        
                    @error('description')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                   
                </div>

                <div class="mb-10">
                    <button
                        class="rounded-xl border-2 border-black text-black text-sm font-bold py-1 px-4 bg-yellow-500 hover:bg-yellow-600"
                    >
                        Skicka
                    </button>

                    <a href="/movies/{{$movie->id}}" class="text-black ml-10"> Tillbaka </a>
                </div>

                        
            </form>
        </div>
    </x-layout>