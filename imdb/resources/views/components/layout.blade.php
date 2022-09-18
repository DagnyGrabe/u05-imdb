<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>movietime</title>
    <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
            integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />
    <script src="{{asset('js/main.js')}}" defer></script>
        @stack('other-scripts')

    <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    screens: {
                        sm: '480px',
                        md: '768px',
                        lg: '976px',
                        xl: '1440px'
                    },
                },
            };
        </script>
</head>

<body class="bg-black">
    <nav class="flex justify-between p-4 bg-black sticky z-10 top-0">
        <a href="/" class="text-3xl font-bold text-white">
           Movietime</a>
        <div class="hidden lg:flex justify-around items-center mx-4">
            <form action="">
                <div class="relative border-none rounded-xl mx-2">
                    <div class="absolute top-[7px] left-3">
                        <i class="fa-solid fa-search text-gray-600 z-20"></i>
                    </div>
                    <input
                        type="text"
                        name="search"
                        class="h-9 w-full pl-10 pr-20 rounded-xl z-0 focus:outline-none"
                        placeholder="Vad vill du titta på..."/>
                    <div class="absolute top-0 right-0">
                        <button
                            type="submit"
                            class="h-9 w-16 text-black font-bold text-sm rounded-xl bg-yellow-500 hover:bg-yellow-600">
                            Sök
                        </button>
                    </div>
                </div>
            </form>
            @auth
            <a href="/list" 
               class="py-2 px-4 rounded-xl bg-yellow-500 text-sm font-bold mx-2 hover:bg-yellow-600">
                <i class="fa-solid fa-list-ul"></i> 
                Min lista
            </a>
            <a href="/users/account" 
               class="py-2 px-4 rounded-xl bg-yellow-500 text-sm font-bold mx-2 hover:bg-yellow-600">
                <i class="fa-solid fa-gear"></i> 
                Mitt konto
            </a>
            <form class="inline" method="POST" action="/logout">
                @csrf
                <button type="submit"
                 class="py-2 px-4 rounded-xl bg-yellow-500 text-sm font-bold mx-2 hover:bg-yellow-600">
                    <i class="fa-solid fa-arrow-right-from-bracket"></i> 
                    Logga ut
                </button>
            </form> 
            @else  
            <a href="/register" 
               class="py-2 px-4 rounded-xl bg-yellow-500 text-sm font-bold mx-2 hover:bg-yellow-600">
                <i class="fa-solid fa-user-plus"></i> 
                Skapa konto
            </a>
            <a href="/login"
               class="py-2 px-4 rounded-xl bg-yellow-500 text-sm font-bold mx-2 hover:bg-yellow-600" >
                <i class="fa-solid fa-arrow-right-to-bracket"></i> 
                Logga in
            </a> 
            @endauth   
        </div>
        <button class="hamburger block lg:hidden bg-yellow-500 px-4 py-1 rounded-3xl text-lg font-bold mx-8 hover:bg-yellow-600">
            <i class="fa-solid fa-bars"></i>
        </button>     
    </nav>
    
    <div class="hidden sticky top-16 float-right z-10 menu-items">
        <ul class="flex flex-col justify-between items-stretch bg-black border-2 border-black mx-4 p-2 rounded-xl">
            <li class="my-1 w-full bg-white rounded-xl">
            <form action="">
                <div class="relative border-none rounded-xl mx-2">
                    <div class="absolute top-[7px] left-3">
                        <i class="fa-solid fa-search text-gray-600 z-20"></i>
                    </div>
                    <input
                        type="text"
                        name="search"
                        class="h-9 w-full pl-10 pr-16 rounded-xl z-0 focus:outline-none"
                        placeholder="Vad vill du titta på..."/>
                    <div class="absolute top-0 -right-2">
                        <button
                            type="submit"
                            class="h-9 w-16 text-black font-bold text-sm rounded-xl bg-yellow-500 hover:bg-yellow-600">
                            Sök
                        </button>
                    </div>
                </div>
            </form>
            </li>
            @auth
            <li class="my-1 w-full bg-white rounded-xl py-2 px-4">
            <a href="/list" 
               class="text-sm font-bold mx-2">
                <i class="fa-solid fa-list-ul"></i> 
                Min lista
            </a>
        </li>
        <li class="my-1 w-full bg-white rounded-xl py-2 px-4">
            <a href="/users/account" 
               class="text-sm font-bold mx-2">
                <i class="fa-solid fa-gear"></i> 
                Mitt konto
            </a>
        </li>
        <li class="my-1 w-full bg-white rounded-xl py-2 px-4">
            <form class="inline" method="POST" action="/logout">
                @csrf
                <button type="submit"
                 class="text-sm font-bold mx-2">
                    <i class="fa-solid fa-arrow-right-from-bracket"></i> 
                    Logga ut
                </button>
            </form> 
        </li>
            @else 
        <li class="my-1 w-full bg-white rounded-xl py-2 px-4"> 
            <a href="/register" 
               class="text-sm font-bold mx-2">
                <i class="fa-solid fa-user-plus"></i> 
                Skapa konto
            </a>
        </li>
        <li class="my-1 w-full bg-white rounded-xl py-2 px-4">
            <a href="/login"
               class="text-sm font-bold mx-2" >
                <i class="fa-solid fa-arrow-right-to-bracket"></i> 
                Logga in
            </a> 
        </li>
            @endauth   
        </ul>
    </div>


    <main class="pb-10">
        {{$slot}}
    </main>

    <footer
        class="fixed bottom-0 left-0 w-full flex items-center justify-start bg-black text-white h-20 mt-24 md:justify-center">
            <p class="ml-2">Copyright &copy; 2022, All Rights reserved</p>

            <a  href="/movies/handle"
                class="text-white py-2 px-5">
                Hantera filmer
            </a>
            <a href="/users/manage"
                class="text-white py-2 px-5">
                Hantera användare
            </a>
    </footer>
    <x-flash-message />

</body>
</html>