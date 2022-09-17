<x-layout>
    <div class="m-10 flex flex-col items-stretch flex-wrap md:m-20">
        <h1 class="text-white text-2xl my-4">
        Hantera användare
        </h1>
        
        <ul class="flex flex-row justify-start mt-4 mb-2">
            <li>
                <a href="/users/manage/?admin=true"
                   class="py-2 px-4 rounded-xl bg-yellow-500 text-sm font-bold w-48 hover:bg-yellow-600" >
                   Visa admins
                </a>
            </li>
            <li>
                <a href="/users/manage"
                   class="py-2 px-4 mx-4 rounded-xl bg-yellow-500 text-sm font-bold w-48 hover:bg-yellow-600" >
                   Visa alla
                </a>
            </li>
        </ul>

    @if(count($users)==0)
        <p class="text-white text-lg">Det finns inga användare att visa</p>
    @endif


    @foreach($users as $user)
        <div class="flex flex-col sm:flex-row justify-between my-2 sm:my-4 bg-white rounded-xl max-w-[600px]">
            
                
            <ul class="flex flex-row justify-between sm:flex-col sm:justify-start">
                <li>
                    <h3 class="text-black text-xl mt-3 sm:my-4 mx-4  text-start rounded-xl">
                        {{$user->username}}
                    </h3> 
                </li>
                <li>
                    <a href="mailto:{{$user->email}}">
                        <p class="text-black text-md m-2 px-2 py-1 rounded-xl hover:bg-gray-200">
                        {{$user->email}}
                        </p>
                    </a>
                </li>
            </ul>

            <div class="flex flex-col justify-between sm:items-end">
            @if($user->admin == 1)
                <p class="text-green-600 text-sm sm:text-md font-bold mx-4 md:mx-6 mb-2 sm:my-2 rounded-xl">
                    <i class="fa-solid fa-check mr-1"></i>
                    Admin
                </p>
            @else
                <p></p>
            @endif
                
                <ul class="flex flex-row justify-between sm:items-end my-2 mx-1">
                    <li>
                        <form action="/users/{{$user->id}}/admin" method="POST">
                        @csrf
                        @method('PUT')

                        @if($user->admin == 0)
                            <input type="hidden"
                                name="admin"
                                value="1">
                            </input>
                            <button type="submit"
                                class="p-1 md:py-2 md:px-3 mx-2 rounded-xl text-sm text-black font-bold hover:bg-green-500">
                                <i class="fa-solid fa-pen mr-1"></i>
                                Gör till admin
                            </button>
                        @else
                            <input type="hidden"
                                name="admin"
                                value="0">
                            </input>
                            <button type="submit"
                                class="p-1 md:py-2 md:px-3 mx-2 rounded-xl text-sm text-black font-bold hover:bg-yellow-500">
                                <i class="fa-solid fa-pen mr-1"></i>
                                Ta bort admin
                            </button>

                        @endif

                        </form>
                    </li>
            
                    <li>
                        <form action="/users/{{$user->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                            <button type="submit"
                                class="text-black text-sm font-bold mx-2 p-1 md:px-3 md:py-2 rounded-xl hover:bg-red-500">
                                <i class="fa-solid fa-xmark mr-1"></i>
                                Radera konto
                            </button>
                        </form>
                    </li>   
                </ul>
            </div>
        </div>
    @endforeach  

        <div class="mb-10 mx-6 md:mx-0 p-2 max-w-[600px]">
            {{$users->links()}}
        </div>
        

    </div>
</x-layout>