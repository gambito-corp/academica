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
    <div class="container grid grid-cols-1 lg:grid-cols-3 gap-x-6">
        <div class="order-2 lg:col-span-2 lg:order-1">
            <section class="card mb-12">
                <div class="card-body">
                    <h1 class="font-bold text-2xl mb-2">Lo Que Aprenderas</h1>
                    <ul class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-2">
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
                    <article class="mb-4 shadow" x-data="{open: {{$loop->first?'true':'false'}}}">
                        <header class="border border-gray-200 px-4 py-2 cursor-pointer bg-gray-200" x-on:click="open = !open">
                            <h1 class="font-bold text-lg text-gray-600">{{$section->title}}</h1>
                        </header>
                        <div class="bg-white py-2 px-4" x-show.transition="open">
                            <ul x-on:click="open = true">
                                @forelse($section->Lessons as $lesson)
                                    <li class="text-gray-700 text-base w-full relative {{$loop->last?'':'mb-2'}}" x-on:click="open = true">
                                        <i class="{{$lesson->icon()}}"></i>
                                        {{$lesson->title}}
                                        {{$lesson->Meeting? '(Clase en Vivo)':''}}
                                        @if($lesson->Free())
                                            <a href="" class="underline text-blue-600 text-sm absolute right-0 mr-2" target="_blank" x-on:click="open = true">Session Gratuita de Prueba</a>
                                        @endif
                                    </li>
                                    @if($loop->last != true) <hr class="mb-2"> @endif
                                @empty
                                @endforelse
                            </ul>
                        </div>
                    </article>
                @empty
                @endforelse
            </section>
            <section class="card mb-8">
                <div class="card-body">
                    <h1 class="font-bold text-2xl mb-2">Requisitos</h1>
                    <ul class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-2">
                        @forelse($course->Requirements as $requirement)
                            <li class="text-gray-700 text-base list-disc list-inside">
                                {{$requirement->title}}
                            </li>
                        @empty
                        @endforelse
                    </ul>
                </div>
            </section>
            <section class="mb-8 card">
                <div class="card-body">
                    <h1 class="font-bold text-2xl mb-2">
                        Descripcion del Curso
                    </h1>

                    <div class="text-gray-700 text-base">
                        <p>{{$course->description}}</p>
                    </div>
                </div>
            </section>
            {{--Pendiente de Comentarios y reseñas del curso--}}

            <section class="mb-8 card">
                <div class="card-body">
                    <h1 class="font-bold text-2xl mb-2">
                        Reseñas
                    </h1>
                    <!-- component -->
                    @forelse($course->Coments as $comment)
                        <div class="bg-white border shadow-sm px-4 py-3 rounded-lg w-full">
                            <div class="flex items-center">
                                <img class="h-12 w-12 rounded-full" src="{{$comment->User->profile_photo_url}}"/>
                                <div class="ml-2">
                                    <div class="text-sm ">
                                        <span class="font-semibold">{{$comment->User->username}}</span>
                                    </div>
                                </div>
                            </div>
                            <p class="text-gray-800 text-sm mt-2 leading-normal md:leading-relaxed">
                                {{$comment->description}}
                            </p>
                            <div class="text-gray-500 text-xs flex items-center mt-3">
{{--                                <img class="mr-0.5" src="https://static-exp1.licdn.com/sc/h/d310t2g24pvdy4pt1jkedo4yb"/>--}}
{{--                                <img class="mr-0.5" src="https://static-exp1.licdn.com/sc/h/5thsbmikm6a8uov24ygwd914f"/>--}}
{{--                                <img class="mr-0.5" src="https://static-exp1.licdn.com/sc/h/7fx9nkd7mx8avdpqm5hqcbi97"/>--}}
{{--                                <span class="ml-1">47 • 26 comments</span>--}}
                            </div>
                        </div>
                        @empty
                    @endforelse
                <!-- component -->
                    <!-- comment form -->
                    <form class="w-full max-w-xl bg-white rounded-lg px-4 pt-2" action="#" method="post">
                        @csrf
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <h2 class="px-4 pt-3 pb-2 text-gray-800 text-lg">Escribe un Comentario o Pregunta al Profesor Antes de Comprar el Curso</h2>
                            <div class="w-full md:w-full px-3 mb-2 mt-2">
                                <textarea class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white" name="body" placeholder='Escribe Tu Comentario o pregunta' required></textarea>
                            </div>
                            <div class="w-full md:w-full flex items-start md:w-full px-3">
                                <div class="-mr-1">
                                    <input type='submit' class="bg-white text-gray-700 font-medium py-1 px-4 border border-gray-400 rounded-lg tracking-wide mr-1 hover:bg-gray-100" value='Comentar'>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
            <section class="mb-8 card">
                <div class="card-body">
                    <h1 class="font-bold text-2xl mb-2">
                        Comentarios
                    </h1>
                    <!-- component -->
                    @forelse($course->Coments as $comment)
                        <div class="bg-white border shadow-sm px-4 py-3 rounded-lg w-full">
                            <div class="flex items-center">
                                <img class="h-12 w-12 rounded-full" src="{{$comment->User->profile_photo_url}}"/>
                                <div class="ml-2">
                                    <div class="text-sm ">
                                        <span class="font-semibold">{{$comment->User->username}}</span>
                                    </div>
                                </div>
                            </div>
                            <p class="text-gray-800 text-sm mt-2 leading-normal md:leading-relaxed">
                                {{$comment->description}}
                            </p>
                            <div class="text-gray-500 text-xs flex items-center mt-3">
{{--                                <img class="mr-0.5" src="https://static-exp1.licdn.com/sc/h/d310t2g24pvdy4pt1jkedo4yb"/>--}}
{{--                                <img class="mr-0.5" src="https://static-exp1.licdn.com/sc/h/5thsbmikm6a8uov24ygwd914f"/>--}}
{{--                                <img class="mr-0.5" src="https://static-exp1.licdn.com/sc/h/7fx9nkd7mx8avdpqm5hqcbi97"/>--}}
{{--                                <span class="ml-1">47 • 26 comments</span>--}}
                            </div>
                        </div>
                        @empty
                    @endforelse
                <!-- component -->
                    <!-- comment form -->
                    <form class="w-full max-w-xl bg-white rounded-lg px-4 pt-2" action="#" method="post">
                        @csrf
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <h2 class="px-4 pt-3 pb-2 text-gray-800 text-lg">Escribe un Comentario o Pregunta al Profesor Antes de Comprar el Curso</h2>
                            <div class="w-full md:w-full px-3 mb-2 mt-2">
                                <textarea class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white" name="body" placeholder='Escribe Tu Comentario o pregunta' required></textarea>
                            </div>
                            <div class="w-full md:w-full flex items-start md:w-full px-3">
                                <div class="-mr-1">
                                    <input type='submit' class="bg-white text-gray-700 font-medium py-1 px-4 border border-gray-400 rounded-lg tracking-wide mr-1 hover:bg-gray-100" value='Comentar'>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>
        <div class="order-1 lg:order-2">
            <section class="card">
                <div class="card-body">
                    <div class="flex items-center mb-4">
                        <img src="{{$course->Teacher->profile_photo_url}}" alt="{{$course->Teacher->name}}" class="h-16 w-16 shadow rounded-full object-cover">
                        <div class="ml-4">
                            <h1 class="font-bold text-lg text-gray-500">
                                Prof. {{$course->Teacher->name}}
                            </h1>
                            <a href="" class="text-blue-400 font-bold text-sm cursor-pointer ">
                                {{'@'. $course->Teacher->username }}
                            </a>
                        </div>
                    </div>
                    @can('enrrolled', $course)
                        <a href="{{route('courses.status', $course)}}" class="btn btn-outline-success btn-block">continuar este Curso</a>
                    @else
                        <form action="{{route('courses.enrrolled', $course)}}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger btn-block">Llevar este Curso</button>
                        </form>
                    @endcan
                </div>
            </section>
            <aside class="mt-4 hidden lg:block">
                @forelse($course->Related() as $related)
                    <article class="flex mb-6">
                        <img class="h-32 w-40 object-cover shadow" src="{{route('image', ['id' => $related->Image->hash($related->Image->id)])}}" alt="">
                        <div class="ml-4">
                            <h1>
                                <a href="{{route('courses.show', $related)}}" class="font-bold text-gray-500 mb-4">
                                    {{Str::limit($related->title, 40)}}
                                </a>
                            </h1>
                            <div class="flex items-center mb-2">
                                <img src="{{$related->Teacher->profile_photo_url}}" alt="{{$related->Teacher->name}}" class="h-4 w-4 shadow rounded-full object-cover">
                                <div class="ml-4">
                                    <a href="" class="text-blue-400 font-bold text-sm cursor-pointer ">
                                        {{'@'. $related->Teacher->username }}
                                    </a>
                                </div>
                            </div>
                            <p class="text-sm"><i class="fas fa-star text-yellow-400"></i> &nbsp{{$related->rating}}</p>
                        </div>
                    </article>
                @empty
                @endforelse
            </aside>
        </div>
    </div>
</x-app-layout>
