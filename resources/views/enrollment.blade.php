@extends('layouts.app')

@section('content')
<section class="is-title-bar">
    <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
      <ul>
        <li>Matrícula</li>
      </ul>
    </div>
    <livewire:enrollment.form.new-enrollment :course="$course"/>
</section>

@endsection
