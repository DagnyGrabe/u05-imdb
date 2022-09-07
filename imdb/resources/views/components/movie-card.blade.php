            <div class="col-auto m-3 max-w-[250px]">
                <a href="/movie/{{$movie->id}}">
                    <img src="img/batman.jpg">
                </a>
                <ul class="flex justify-between mx-2 my-1">
                    <li class="text-white text-sm">
                        {{$movie->country}} {{$movie->year}}
                    </li>
                    <li class="text-white text-sm">
                       <i class="fa-solid fa-star text-yellow-500 mr-1"></i>
                       5.0
                    </li>
                </ul>
                <h3 class="text-white text-2xl mx-2 my-1">{{$movie->title}}</h3>
                <ul class="flex justify-items-center flex-wrap">
                    <li class="bg-yellow-500 text-black text-xs font-bold px-2 py-1 rounded-xl m-1">
                        <a href="#">action</a>
                    </li>
                    <li class="bg-yellow-500 text-black text-xs font-bold px-2 py-1 rounded-xl m-1">
                        <a href="#">äventyr</a>
                    </li>
                    <li class="bg-yellow-500 text-black text-xs font-bold px-2 py-1 rounded-xl m-1">
                        <a href="#">superhjältar</a>
                    </li>
                </ul>
            </div>