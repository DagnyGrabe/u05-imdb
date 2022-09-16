<x-layout>
    <div class="m-10 flex flex-col items-stretch flex-wrap md:m-20">
        <h1 class="text-white text-2xl my-4">
            Mitt konto
        </h1>

        <div class="bg-white p-6 sm:p-10 rounded-xl max-w-lg my-8">
            <header class="text-center">
                <h2 class="text-2xl font-bold mb-10">
                    Ändra konto
                </h2>
            </header>
            <div class="mb-6">
                <p class="text-md font-bold mb-2">
                    Email
                </p>
                <p class="text-lg">
                    {{$user->email}}
                </p>
            </div>

            <form method="POST" action="/users/{{$user->id}}/name">
                @csrf
                @method('PUT')
                <div class="mb-8">
                    <label
                        for="username"
                        class="inline-block text-lg font-bold mb-2">
                        Byt användarnamn
                    </label>
                    <input
                        type="text"
                        class="border-2 border-black rounded-xl p-2 w-full"
                        name="username"
                        value="{{$user->username}}"
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
                    />
                    @error('password')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
 
                </div>
                <div class="mb-10">
                    <button
                        class="rounded-xl border-2 border-black text-black text-sm font-bold py-1 px-4 bg-yellow-500 hover:bg-yellow-600">
                        Spara
                    </button>                    
                </div>
            </form>

            <form method="POST" action="/users/{{$user->id}}/password">
                @csrf
                @method('PUT')

                <h3 class="text-lg font-bold mb-4">
                    Byt lösenord
                </h3>

                <div class="mb-6">
                    <label
                        for="old_password"
                        class="inline-block text-md mb-2">
                        Lösenord
                    </label>
                    <input
                        type="password"
                        class="border-2 border-black rounded-xl p-2 w-full"
                        name="old_password"
                    />
                    @error('old_password')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
 
                </div>

                <div class="mb-6">
                    <label
                        for="new_password"
                        class="inline-block text-md mb-2">
                        Nytt lösenord
                    </label>
                    <input
                        type="password"
                        class="border-2 border-black rounded-xl p-2 w-full"
                        name="new_password"
                    />
                    @error('new_password')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror
 
                </div>

                <div class="mb-6">
                    <label
                        for="new_password_confirmation"
                        class="inline-block text-md mb-2">
                        Bekräfta nytt lösenord
                    </label>
                    <input
                        type="password"
                        class="border-2 border-black rounded-xl p-2 w-full"
                        name="new_password_confirmation"
                    />
                    @error('new_password_confirmation')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror

                   
                </div>

                <div class="mb-10">
                    <button
                        class="rounded-xl border-2 border-black text-black text-sm font-bold py-1 px-4 bg-yellow-500 hover:bg-yellow-600">
                        Spara
                    </button>                    
                </div>

                        
            </form>

            
        </div>
    </div>
</x-layout>