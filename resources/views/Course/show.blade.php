<x-app-layout>
    <section class="bg-gray-700 py-12 mb-12">
        <div class="container grid grid-cols-1 lg:grid-cols-2 gap-6">
            <figure>
                <img class="h-72 w-full object-cover" src="{{route('image', ['id' => $course->Image->hash($course->Image->id)])}}" alt="">
            </figure>
            <div class="text-white">
                <h1 class="text-4xl">{{$course->title}}</h1>
                <h2 class="text-xl mb-3">{{$course->subtitle}}</h2>
                <p class="mb-2"><i class="fas fa-chart-line"></i> Nivel: {{$course->Level->title}}</p>
                <p class="mb-2"><i class="fas fa-tags"></i> Categoria: {{$course->CategoryCourse->title}}</p>
                <p class="mb-2"><i class="fas fa-user"></i> Matriculados: {{$course->students_count}}</p>
                <p class="mb-2"><i class="far fa-star"></i> Calificacion: {{$course->rating}}</p>
                <p class="mb-2"><i class="fas fa-comment"></i> Comentarios: {{$course->Comments}}</p>
                <p class="mb-2"><i class="fas fa-dollar-sign"></i> Precio: {{$course->Prize->value}} $</p>
            </div>
        </div>
    </section>
    <div class="container grid grid-cols-3">
        <div class="col-span-2">
            <section class="card mb-12">
                <div class="card-body">
                    <h1 class="font-bold text-2xl mb-2">Lo Que Aprenderas</h1>
                    <ul class="grid grid-cols-2 gap-x-6 gap-y-2">
                        @forelse($course->Goals as $goal)
                            <li class="text-gray-700 text-base">
                                <i class="fas fa-check text-gray-600 mr-2"></i>
                                {{$goal->title}}
                            </li>
                        @empty
                        @endforelse
                    </ul>
                </div>
            </section>
            <section>
                <h1 class="font-bold text-3xl mb-2">Temario</h1>
                @forelse($course->Sections as $section)
                    <article class="mb-4 shadow">
                        <header class="border border-gray-200 px-4 py-2 cursor-pointer bg-gray-200">
                            <h1 class="font-bold text-lg text-gray-600">{{$section->title}}</h1>
                        </header>
                        <div class="bg-white py-2 px-4">
                            <ul>
                                @forelse($section->Lessons as $lesson)

                                    <li class="text-gray-700 text-base w-full relative {{$loop->last?'':'mb-2'}}">
                                        <i class="{{$lesson->Icon}} mr-2 text-{{$lesson->free?'blue':'gray'}}-600"></i>

                                            @if($lesson->free)<a href="" class="text-blue-500">@endif
                                                {{$lesson->title}}
                                                {{$lesson->type == 'Meeting'? '(Clase en Vivo)':''}}
                                            @if($lesson->free)<span class="absolute right-0 mr-2"> Session Gratuita de Prueba</span>@endif
                                            @if($lesson->free)</a>@endif
                                    </li>
                                @empty
                                @endforelse
                            </ul>
                        </div>
                    </article>
                @empty
                @endforelse
            </section>
        </div>
        <div></div>
    </div>
</x-app-layout>
