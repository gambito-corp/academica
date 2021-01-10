<div>
    <section class="bg-cover" style="background-image: url({{asset('img/home/portada.jpg')}})">
        <div class="container pb-4 md:py-16">
            <div class="w-full md:w-1/2 lg:w-1/3">
                <h2 class="text-white text-4xl text-bold">
                    Empieza a Estudiar Ahora en el Mejor Centro de Capacitacion online
                </h2>
                <p class="text-white text-lg mt-2 mb-4">
                    Busca el curso que dessees Desde La Comodidad de tu Hogar
                </p>
                <form autocomplete="off" class="pt-2 relative mx-auto text-gray-600">
                    <input class="w-full border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded text-sm focus:outline-none"
                           type="search" name="search" placeholder="Busca un curso" wire:model="search">
                    <button type="submit" class="btn btn-primary absolute right-px top-px mt-2">
                        Busca Ahora!!!
                    </button>
                    @if($search)
                        <ul class="absolute left-0 w-full bg-white mt-1 rounded-lg z-10 overflow-hidden">
                            @forelse($this->results as $result)
                                <li class="leading-10 px-5 text-sm cursor-pointer hover:bg-gray-300">
                                    <a href="{{route('courses.show', $result)}}">{{$result->title}}</a>
                                </li>
                            @empty
                                <li class="leading-10 px-5 text-sm">
                                    No Hay Ningun Resultado T_T
                                </li>
                            @endforelse
                        </ul>
                    @endif

                </form>
            </div>
        </div>
    </section>
</div>
