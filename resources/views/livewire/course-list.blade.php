<div> 
    <div class="grid gap-6 grid-cols-1 md:grid-cols-3 mb-6">

        @foreach($courses as $course)

        <div class="max-w-sm rounded-2xl overflow-hidden shadow-xl bg-white">
            <img class="w-full h-48 object-cover" src="{{$course?->image ?? 'images/courses.png'}}" alt="Card image">
            <div class="p-6">
              <p class="text-lg font-semibold text-gray-80">{{ $course->name }}</p>
              <p class="text-gray-600 mb-4">
                {{trim(substr($course->description, 0, 80))}}...
              </p>
              <p class="text-md text-gray-500">
                <span class="font-bold">Precio:</span> $ {{ $course->cost }}
              </p>
              <p class="text-sm text-gray-500">
                <span class="font-bold">Duración:</span> $ {{ $course->duration }} horas
              </p>
              <p class="text-sm text-gray-500">
                <span class="font-bold">Academia:</span> {{ $course->academy?->name ?? 'N/A' }}
              </p>
              <p class="text-sm text-gray-500">
                <span class="font-bold">Modalidad:</span> {{ $course?->modality ?? 'N/D' }}
              </p><br>
              <a href="{{ route('enrollments.create', ['course_id' => $course->id]) }}"
                 class="inline-flex items-center justify-center px-6 py-3 bg-gradient-to-r from-green-500 to-emerald-600 text-white-800 text-sm font-semibold rounded-xl shadow-md hover:shadow-lg hover:scale-105 transition-all duration-300 ease-in-out">
                Inscribir
              </a>
            </div>
        </div>

        @endforeach
        
        {{ $courses->links() }}
    </div>
</div>
