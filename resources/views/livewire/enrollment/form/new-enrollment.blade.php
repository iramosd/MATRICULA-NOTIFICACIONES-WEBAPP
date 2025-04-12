<div>
    <section class="section main-section">
        <div class="card mb-6">
            <header class="card-header">
                <p class="card-header-title">
                <span class="icon"><i class="mdi mdi-ballot"></i></span>
                Datos del Curso
                </p>
            </header>
            <div class="card-content">
                <form>
                    <div class="field">
                        <label class="label">Cursos disponibles</label>
                        <div class="control">
                          <div class="select">
                            <select wire:model="courseId" wire:change="onCourseSelected">
                                <option value="" selected disabled></option>
                                @foreach ($courseList as $course)
                                    <option value="{{$course->id}}">{{ $course->name }}</option>
                                @endforeach
                            </select>
                          </div>
                        </div>
                      </div>
                </form>
                <p class="text-lg font-medium text-black">{{ $courseName ??  'No ha elegido curso, seleccione uno por favor.'}}</p><br/>
                @if(isset($courseName))
                    <p>{{ $courseDescription ??  '' }}</p><br/>
                    <p><span class="font-semibold text-slate-900">Costo:</span> U$ {{ $courseCost }}</p>
                    <p><span class="font-semibold text-slate-900">Duración:</span> {{ $courseDuration }} horas</p>
                    <p><span class="font-semibold text-slate-900">Academia:</span> {{ $academyName }}</p>
                @endif
            </div>
        </div>
    </section>

    <section class="section main-section">
        <div class="card mb-6">
        <header class="card-header">
            <p class="card-header-title">
            <span class="icon"><i class="mdi mdi-ballot"></i></span>
            Datos del Estudiante
            </p>
        </header>
        <div class="card-content">
            <form method="post">
            <div class="field">
                <div class="field-body">
                <div class="field">
                    <label class="text-gray-500" for="first_name">Nombres</label>
                    <div class="control icons-left">
                    <input class="input" type="text" placeholder="Nombre" id="first_name" wire:model='firstName'>
                    <span class="icon left"><i class="mdi mdi-account"></i></span>
                    </div>
                </div>
                <div class="field">
                    <label class="text-gray-500" for="last_name">Apellidos</label>
                    <div class="control icons-left">
                    <input class="input" type="text" placeholder="Apellido" id="last_name" wire:model='lastName'>
                    <span class="icon left"><i class="mdi mdi-account"></i></span>
                    </div>
                </div>
                <div class="field">
                    <label class="text-gray-500" for="birth_date">Fecha de Nacimiento</label>
                    <div class="control icons-left icons-right">
                    <input class="input" type="date" id="birth_date" wire:model='dateOfBirth'>
                    <span class="icon left"><i class="mdi mdi-calendar"></i></span>
                    </div>
                </div>
                </div>
            </div>
            <div class="field grouped">
                <div class="control">
                <button type="submit" class="button green" wire:click.prevent='enroll'>
                    Matricular
                </button>
                </div>
            </div>
            </form>
        </div>
        </div>
    </section>
</div>
