@extends('layouts.app')

@section('content')
<section class="is-title-bar">
    <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
      <ul>
        <li>Cursos</li>
      </ul>
    </div>
  </section>
  @if (session('success'))
    <div class="notification green text-white">{{ session('success') }}</div>
  @endif
  <livewire:course-list/>
@endsection