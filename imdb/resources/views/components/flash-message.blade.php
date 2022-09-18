@if(session()->has('message'))
<div class="flash fixed top-24 left-1/2 z-10 transform -translate-x-1/2 bg-black px-4 py-4 rounded-2xl">
    <p class="text-black bg-white text-md px-6 py-2 rounded-xl">
        {{session('message')}}
    </p>
</div>
@endif