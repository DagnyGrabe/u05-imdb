        
    <x-layout>  
        
        <div class="bg-white p-6 sm:p-10 rounded-xl  max-w-lg mx-4 md:mx-auto my-24">
            <header class="text-center">
                <h1 class="text-2xl font-bold mb-1">
                    Skapa konto
                </h1>
                <p class="mb-6 text-sm">Recensera filmer, spara favoriter och mer!</p>
            </header>

            <form method="POST" action="/users" enctype="multipart/form-data">
                @csrf
                <div class="mb-6">
                    <label
                        for="email"
                        class="inline-block text-md mb-2">
                        Email
                    </label>
                    <input
                        type="text"
                        class="border-2 border-black rounded-xl  p-2 w-full"
                        name="email"
                        placeholder="example@example.com"
                    />
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror

                </div>

                <div class="mb-6">
                    <label
                        for="username"
                        class="inline-block text-md mb-2">
                        Användarnamn
                    </label>
                    <input
                        type="text"
                        class="border-2 border-black rounded-xl p-2 w-full"
                        name="username"
                        placeholder="Måste vara unikt"
                    />
                    @error('username')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
  
                </div>

                <div class="mb-6">
                    <label
                        for="password"
                        class="inline-block text-md mb-2">
                        Lösenord
                    </label>
                    <input
                        type="password"
                        class="border-2 border-black rounded-xl p-2 w-full"
                        name="password"
                        placeholder="Minst 6 tecken"
                    />
                    @error('password')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
 
                </div>

                <div class="mb-6">
                    <label
                        for="password_confirmation"
                        class="inline-block text-md mb-2">
                        Bekräfta lösenord
                    </label>
                    <input
                        type="password"
                        class="border-2 border-black rounded-xl p-2 w-full"
                        name="password_confirmation"
                    />
                    @error('password_confirmation')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror

                   
                </div>

                <div class="mb-10">
                    <button
                        class="rounded-xl border-2 border-black text-black text-sm font-bold py-1 px-4 bg-yellow-500 hover:bg-yellow-600"
                    >
                        Registrera
                    </button>

                    <a href="/" class="text-black ml-10"> Tillbaka </a>
                </div>

                        
            </form>

            <div class="text-center">
                <p class="text-md mb-2">
                    Har du redan ett konto?
                </p>
                <a href="/login"
                    class="rounded-xl border-2 border-black text-black text-sm font-bold py-1 px-4 mx-2 bg-yellow-500 hover:bg-yellow-600">
                    Logga in
                </a>
                
            </div>
        </div>
    </x-layout>