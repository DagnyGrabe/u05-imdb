
<div class="hidden message fixed top-24 left-1/2 z-10 transform -translate-x-1/2 w-72 bg-black px-4 py-4 rounded-2xl">
    <div class="text-black bg-white rounded-xl px-2 py-2 text-center">
        <p class="text-black bg-white text-md px-6 py-2 my-2 rounded-xl">
            Är du säker?
        </p>
        <div class="flex flex-row justify-between">
            <button class="close text-black text-sm font-bold px-3 py-2 rounded-xl hover:bg-yellow-500">
                <i class="fa-solid fa-xmark mr-1"></i>
                Tillbaka
            </button>
            {{$slot}}
        </div>
    </div>
</div>

