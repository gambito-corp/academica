<div>
    <div class="bg-gray-200 py-4 mb-16">
        <div class="container flex">
            <buttom class="btn btn-ligth mr-4" wire:click="resetFilters">
                <i class="text-sm mr-2 fas fa-archway"></i>
                todos los cursos
            </buttom>
            <div class="relative" x-data="{ open: false }">
                <button class="btn btn-ligth mr-4" x-on:click="open = true">
                    <i class="text-sm mr-2 fas fa-tags"></i>
                    Categorias
                    <i class="text-sm mr-2 fas fa-angle-down"></i>
                </button>
                <div class="absolute right-0 w-40 mt-2 py-2 bg-white border rounded shadow-xl" x-show.transition="open" x-on:click.away="open = false">
                    @foreach($categories as $category)
                        <a class=" cursor-pointer transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-yellow-500 hover:text-white" wire:click="$set('category_id', {{$category->id}})" x-on:click="open = false">{{$category->title}}</a>
                        @if(!$loop->last)
                            <div class="py-1">
                                <hr>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="relative" x-data="{ open: false }">
                <button class="btn btn-ligth mr-4" x-on:click="open = true">
                    <i class="text-sm mr-2 fas fa-tags"></i>
                    Niveles
                    <i class="text-sm mr-2 fas fa-angle-down"></i>
                </button>
                <div class="absolute right-0 w-40 mt-2 py-2 bg-white border rounded shadow-xl" x-show.transition="open" x-on:click.away="open = false">
                    @foreach($levels as $level)
                        <a class=" cursor-pointer transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-yellow-500 hover:text-white" wire:click="$set('level_id', {{$level->id}})" x-on:click="open = false">{{$level->title}}</a>
                        @if(!$loop->last)
                            <div class="py-1">
                                <hr>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="relative" x-data="{ open: false }">
                <button class="btn btn-ligth mr-4" x-on:click="open = true">
                    <i class="text-sm mr-2 fas fa-tags"></i>
                    Precios
                    <i class="text-sm mr-2 fas fa-angle-down"></i>
                </button>
                <div class="absolute right-0 w-40 mt-2 py-2 bg-white border rounded shadow-xl" x-show.transition="open" x-on:click.away="open = false">
                    @foreach($prizes as $prize)
                        <a class=" cursor-pointer transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-yellow-500 hover:text-white" wire:click="$set('prize_id', {{$prize->id}})" x-on:click="open = false">{{$prize->value == '0'?'Gratuitos':$prize->value.' $'}}</a>
                        @if(!$loop->last)
                            <div class="py-1">
                                <hr>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="container grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">
        @forelse($courses as $course)
            <x-course-card :course="$course"/>
        @empty

        @endforelse
    </div>

    <div class="container py-4">
        {{$courses->links()}}
    </div>
</div>
