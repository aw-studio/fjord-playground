@extends('app')


@section('content')
<main id="main">
  <section id="team" class="team section-bg">
    <div class="container">

      <div class="section-title">
        <h2>Team</h2>
        <p>Sit sint consectetur velit quisquam cupiditate impedit suscipit alias</p>
      </div>

      <div class="row">
        @foreach($employees as $employee)
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
            <div class="member">
              @if ($employee->image)
              <img src="{{ $employee->image->conversion_urls['md'] }}" alt="{{ $employee->image->alt }}" title="{{ $employee->image->title }}">
              @endif
              <h4>{{ $employee->first_name }} {{ $employee->last_name }}</h4>
              <span>{{  $employee->department->name }}</span>
              <div class="social">
                <a href="https://github.com/aw-studio/fjord" target="_blank"><i class="fa fas-github"></i></a>
              </div>
            </div>
          </div>
        @endforeach

      </div>
    </div>
  </section>

</main>

@endsection