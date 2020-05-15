@extends('app')


@section('content')
<main id="main">


  <section id="featured-services" class="featured-services pt-5">
    <div class="container">

      <div class="row">
        @foreach($projects as $project)
              <div class="col-lg-4 col-md-6 mt-4 mt-md-0 mb-4">
                <div class="icon-box">
                  {{--<div class="icon"><i class="icofont-computer"></i></div>--}}
                  <h4 class="title"><a href="">{{ $project->title }}</a></h4>
                  <p>{{ $project->description }}</p>
                  <span>Manager: {{ $project->manager->fullName }}</span>
                </div>
              </div>
              @endforeach

    </div>
  </section><!-- End Featured Services Section -->



</main>

@endsection