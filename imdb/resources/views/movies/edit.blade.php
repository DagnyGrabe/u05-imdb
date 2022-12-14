    <x-layout> 
        
        <div class="bg-white p-6 sm:p-10 rounded-xl  max-w-lg mx-4 md:mx-auto my-24">
            <header class="text-center">
                <h1 class="text-2xl font-bold mb-1">
                    Uppdatera film
                </h1>
                <p class="mb-6 text-sm">{{$movie->title}}</p>
            </header>

            <form method="POST" action="/movies/{{$movie->id}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-6">
                    <label
                        for="title"
                        class="inline-block text-md mb-2">
                        Titel
                    </label>
                    <input
                        type="text"
                        class="border-2 border-black rounded-xl  p-2 w-full"
                        name="title"
                        placeholder="ex: Mupparnas jul"
                        value="{{$movie->title}}"
                    />
                    
                    @error('title')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                   
                </div>

                <div class="mb-6">
                    <label
                        for="country"
                        class="inline-block text-md mb-2">
                        Produktionsland
                    </label>
                    <input
                        type="text"
                        class="border-2 border-black rounded-xl p-2 w-full"
                        name="country"
                        placeholder="ex: USA"
                        value="{{$movie->country}}"
                    />
                    
                    @error('country')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                   
                </div>

                <div class="mb-6">
                    <label
                        for="year"
                        class="inline-block text-md mb-2">
                        Produktions??r
                    </label>
                    <input
                        type="text"
                        class="border-2 border-black rounded-xl p-2 w-full"
                        name="year"
                        placeholder="ex: 2022"
                        value="{{$movie->year}}"
                    />

                    @error('year')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                   
                </div>

                <div class="mb-6">
                    <label
                        for="tags"
                        class="inline-block text-md mb-2">
                        Kategorier (separera med komma)
                    </label>
                    <input
                        type="text"
                        class="border-2 border-black rounded-xl p-2 w-full"
                        name="tags"
                        placeholder="ex: action, romantisk, komedi, fantasy"
                        value="{{$movie->tags}}"
                    />

                    @error('tags')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                   
                </div>

                <div class="mb-6">
                    <label for="image" class="inline-block text-md mb-2">
                        Bild
                    </label>
                    <input
                        type="file"
                        class="border-2 border-black rounded-xl p-2 w-full"
                        name="image"
                    />

                    <img 
                    src="{{$movie->image ? asset('storage/' . $movie->image) : asset('img/no-image.jpg')}}" 
                    class="m-10 w-[120px] h-[160px] object-cover"
                    alt="Bild fr??n {{$movie->title}}"
                    />
                    
                </div>

                <div class="mb-6">
                    <label for="video" class="inline-block text-md mb-2">
                        L??nk till trailer
                    </label>
                    <input
                        type="text"
                        class="border-2 border-black rounded-xl p-2 w-full"
                        name="video"
                        value="{{$movie->video}}"
                    />
                    
                </div>


                <div class="mb-6">
                    <label
                        for="description"
                        class="inline-block text-md mb-2">
                        Beskrivning
                    </label>
                    <textarea
                        rows="5"
                        class="border-2 border-black rounded-xl p-2 w-full"
                        name="description"
                        placeholder="L??mna en kort beskrivning av filmen"
                        >
                        {{$movie->description}}
                    
                    </textarea>
                        
                    @error('description')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                   
                </div>

                <div class="mb-6">
                    <button
                        type="submit"
                        class="rounded-xl border-2 border-black text-black text-sm font-bold py-1 px-4 bg-yellow-500 hover:bg-yellow-600">
                        Uppdatera
                    </button>

                    <a href="/movies/{{$movie->id}}" class="text-black ml-10"> Tillbaka </a>
                </div>

                        
            </form>
        </div>
    </x-layout>