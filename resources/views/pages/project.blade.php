@extends('app')


@section('content')
<main id="main">
  <section id="featured-services" class="featured-services pt-5">
    <div class="container">
      <section id="about" class="about">
        <div class="container">
  
          <div class="row">
            
            <div class="col-lg-6 pt-4 pt-lg-0 content">
              <h3>{{ $project->title }}</h3>
              <p>
                {{ $project->description }}
              </p>
              <h4>Manager: {{ $project->manager->first_name }} {{ $project->manager->last_name }}</h4>
            </div>
            <div class="col-lg-6 content">
            </div>
          </div>
          
  
        </div>
      </section>
    </div>
  </section>

  <section id="team" class="team section-bg">
    <div class="container">

      <div class="section-title">
        <h2>Staff</h2>
      </div>

      <div class="row">
        @foreach($project->staff as $employee)
        <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
          <div class="member">
            <img src="{{ $employee->image->conversion_urls['md'] }}" alt="{{ $employee->image->alt }}" title="{{ $employee->image->title }}">
            <h4>{{ $employee->first_name }} {{ $employee->last_name }}</h4>
            <span>{{  $employee->department->name }}</span>
            <div class="social">
              <a href="https://github.com/aw-studio/fjord" target="_blank"><i class="icofont-twitter"></i></a>
              <a href="https://github.com/aw-studio/fjord" target="_blank"><i class="icofont-facebook"></i></a>
              <a href="https://github.com/aw-studio/fjord" target="_blank"><i class="icofont-instagram"></i></a>
              <a href="https://github.com/aw-studio/fjord" target="_blank"><i class="icofont-linkedin"></i></a>
            </div>
          </div>
        </div>
        @endforeach

      </div>
    </div>
  </section>
</main>
@endsection