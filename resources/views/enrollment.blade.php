@extends('layouts.app')

@section('content')
<section class="is-title-bar">
    <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
      <ul>
        <li>Matrícula</li>
      </ul>
    </div>

    <section class="section main-section">
        <div class="card mb-6">
          <header class="card-header">
            <p class="card-header-title">
              <span class="icon"><i class="mdi mdi-ballot"></i></span>
              Datos del Curso
            </p>
          </header>
          <div class="card-content">
            <h1>CURSO</h1>
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
                    <div class="control icons-left">
                      <input class="input" type="text" placeholder="Nombre" id="first_name">
                      <span class="icon left"><i class="mdi mdi-account"></i></span>
                    </div>
                  </div>
                  <div class="field">
                    <div class="control icons-left">
                      <input class="input" type="text" placeholder="Apellido" id="last_name">
                      <span class="icon left"><i class="mdi mdi-account"></i></span>
                    </div>
                  </div>
                  <div class="field">
                    <div class="control icons-left icons-right">
                      <input class="input" type="date">
                      <span class="icon left"><i class="mdi mdi-calendar"></i></span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="field grouped">
                <div class="control">
                  <button type="submit" class="button green">
                    Matricular
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>

        

    @php
        dump($course);
        dump($guardian?->students);
    @endphp
</section>

@endsection
