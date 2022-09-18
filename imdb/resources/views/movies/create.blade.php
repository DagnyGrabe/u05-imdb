        
    <x-layout> 
        
        <div class="bg-white p-6 sm:p-10 rounded-xl  max-w-lg mx-4 md:mx-auto my-24">
            <header class="text-center">
                <h1 class="text-2xl font-bold mb-1">
                    Lägg till film
                </h1>
                <p class="mb-6 text-sm">Lägg till en ny film</p>
            </header>

            <form method="POST" action="/movies" enctype="multipart/form-data">
                @csrf
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
                    />
                    
                    @error('country')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                   
                </div>

                <div class="mb-6">
                    <label
                        for="year"
                        class="inline-block text-md mb-2">
                        Produktionsår
                    </label>
                    <input
                        type="text"
                        class="border-2 border-black rounded-xl p-2 w-full"
                        name="year"
                        placeholder="ex: 2022"
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
                    
                </div>

                <div class="mb-6">
                    <label for="video" class="inline-block text-md mb-2">
                        Länk till trailer
                    </label>
                    <input
                        type="text"
                        class="border-2 border-black rounded-xl p-2 w-full"
                        name="video"
                        placeholder="ex: https://youtube.com/embed/pNo-Q0IDJi0"
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
                        placeholder="Lämna en kort beskrivning av filmen"
                    >
                    </textarea>
                        
                    @error('description')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
                   
                </div>

                <div class="mb-6">
                    <button
                        class="rounded-xl border-2 border-black text-black text-sm font-bold py-1 px-4 bg-yellow-500 hover:bg-yellow-600">
                        Lägg till
                    </button>

                    <a href="/" class="text-black ml-10"> Tillbaka </a>
                </div>

                        
            </form>
        </div>
    </x-layout>