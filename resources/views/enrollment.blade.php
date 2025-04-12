@extends('layouts.app')

@section('content')
<section class="is-title-bar">
    <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
      <ul>
        <li>Matrícula</li>
      </ul>
    </div>
    @if (session('error'))
    <div class="notification red text-white">{{ session('error') }}</div>
    @endif
    <livewire:enrollment.form.new-enrollment :course="$course"/>
</section>

@endsection
