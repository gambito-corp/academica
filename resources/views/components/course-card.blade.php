@props(['course'])
<article class="card">
    @isset($course->Image)
        <img class="h-36 w-full object-cover" src="{{route('image', ['id' => $course->Image->hash($course->Image->id)])}}" alt="imagen de portada del curso {{$course->title}}">
    @endisset
    <div class="card-body">
        <div class="h-16 mb-2 sm:mb-4 md:mb-6 lg:mb-4 xl:mb-1">
            <h2 class="card-title">{{Str::limit($course->title, 40)}}</h2>
        </div>
        <div class="h-24 mb-2">
            <a href="#" class="text-gray-500 text-sm">Prof: {{'@'.$course->Teacher->username}}</a>
            <p>{{Str::limit($course->description,50)}}</p>
            <div class="flex">
                <ul class="flex text-sm">
                    <li class="mr-2"><i class="fas fa-star text-{{$course->rating >= 1?'yellow':'gray'}}-400"></i></li>
                    <li class="mr-2"><i class="fas fa-star text-{{$course->rating >= 2?'yellow':'gray'}}-400"></i></li>
                    <li class="mr-2"><i class="fas fa-star text-{{$course->rating >= 3?'yellow':'gray'}}-400"></i></li>
                    <li class="mr-2"><i class="fas fa-star text-{{$course->rating >= 4?'yellow':'gray'}}-400"></i></li>
                    <li class="mr-2"><i class="fas fa-star text-{{$course->rating == 5?'yellow':'gray'}}-400"></i></li>
                </ul>
                <p class="text-sm text-gray-500 ml-auto"><i class="fas fa-users"></i>({{$course->students_count}})</p>
            </div>
        </div>
        <div class="sm:mb-4 mt-8">
            <a href="{{route('courses.show', $course)}}" class="btn btn-outline-primary btn-block">Acceder!!</a>
        </div>
    </div>
</article>

