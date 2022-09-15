                
                <div class="bg-white rounded-xl p-4 m-4 max-w-[400px]">
                    <div class="flex justify-between text-sm">
                        <h4>{{$review->user->username}}</h4>
                        <ul class="flex ml-2">
                             
                            @for ($i = 0; $i < $review['rating']; $i++)
                            <li><i class="fa-solid fa-star text-yellow-500"></i></li>
                            
                            @endfor
                        </ul>
                    </div>
                    <h3 class="text-lg font-bold my-2">{{$review->title}}</h3>
                    <p class="text-xs">
                    {{$review->description}}
                    </p>


                    <!--only allow review creator and admin to delete-->
                    @auth
                    @if($review->user_id == auth()->id() || auth()->user()->admin)
                    <form action="/reviews/{{$review->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button 
                        type="submit"
                        class="px-2 py-1 mt-1 rounded-xl text-sm font-bold ml-64 hover:bg-red-500">
                            Ta bort
                            <i class="fa-solid fa-xmark ml-2"></i>
                        </button>
                    </form>
                    @endif
                    @endauth
                </div>