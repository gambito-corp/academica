<x-app-layout>
    <div class="hidden md:block">
        <x-assets.slide/>
    </div>
    <div class="block md:hidden">
        <x-assets.buscador/>
    </div>
    <section class="mt-24">
        <h2 class="titulo mb-6">contenido</h2>
        <div class="container grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">
            <article>
                <figure>
                    <img class="rounded-xl h-36 w-full object-cover" src="{{asset('img/home/portada.jpg')}}" alt="">
                </figure>
                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-700">texto imagen</h1>
                </header>
                <p class="text-sm text-gray-500 mt-4">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus ad
                </p>
                <a class="btn btn-primary mt-4">Accede</a>
            </article>
            <article>
                <figure>
                    <img class="rounded-xl h-36 w-full object-cover" src="{{asset('img/home/portada.jpg')}}" alt="">
                </figure>
                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-700">texto imagen</h1>
                </header>
                <p class="text-sm text-gray-500 mt-4">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. A atque
                </p>
                <a class="btn btn-primary mt-4">Accede</a>
            </article>
            <article>
                <figure>
                    <img class="rounded-xl h-36 w-full object-cover" src="{{asset('img/home/portada.jpg')}}" alt="">
                </figure>
                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-700">texto imagen</h1>
                </header>
                <p class="text-sm text-gray-500 mb-5">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus autem
                </p>
                <a class="btn btn-primary mt-4">Accede</a>
            </article>
            <article>
                <figure>
                    <img class="rounded-xl h-36 w-full object-cover" src="{{asset('img/home/portada.jpg')}}" alt="">
                </figure>
                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-700">texto imagen</h1>
                </header>
                <p class="text-sm text-gray-500 mt-4">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab aliquid
                </p>
                <a class="btn btn-primary mt-4">Accede</a>
            </article>
        </div>
    </section>
    <section class="mt-24 bg-gray-700 py-12">
        <h2 class="titulo-blanco mb-6">
            ¿No Sabes Que Curso Llevar?
        </h2>
        <p class="text-center text-white">
            dirigete a nuestro catalogo de cursos y encontraras el Curso o Diplomado Perfecto para ti
        </p>
        <div class="flex justify-center mt-4">
            <a href="{{route('cursos')}}" class="btn btn-danger"> Catalogo de Cursos</a>
        </div>
    </section>
    <section class="mt-24">
        <h2 class="titulo">ultimos cursos</h2>
        <p class="text-center text-gray-500 text-sm mb-6">
            descubre algunos de nuestros ultimos cursos/diplomados
        </p>
        <div class="container grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">
            @forelse($courses as $course)
                <article>
                    @isset($course->Image)
                        <img src="{{route('image', ['id' => $course->Image->hash($course->Image->id)])}}" alt="imagen de portada del curso {{$course->title}}">
                    @endisset
                </article>
            @empty

            @endforelse
        </div>
    </section>
    <section class="mt-24 bg-gray-700 py-12">
        <h2 class="titulo-blanco mb-6">
            ¿quieres Dictar un curso con nosotros?
        </h2>
        <p class="text-center text-white">
            Contactanos a este formulario y nos comunicaremos a la brevedad contigo para ver que curso podemos crear
        </p>
        <div class="flex justify-center mt-4">
            <a href="#" class="btn btn-danger"> Catalogo de Cursos</a>
        </div>
    </section>
</x-app-layout>



