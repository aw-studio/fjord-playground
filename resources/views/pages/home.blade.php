@extends('app')


@section('content')
<section id="hero" class="d-flex align-items-center">

  <div class="container">
      <div class="row">
        <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
          <h1 class="pb-3">{{ $home->header }}</h1>
          <h2 class="pb-4">{{ $home->text }}</h2>
          <a href="/admin" class="btn btn-primary">
            Login to Fjord
          </a>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img">
          @if ($home->image)
          <img src="{{ $home->image->conversion_urls['lg'] }}" 
            class="img-fluid animated" 
            alt="{{ $home->image->alt }}" 
            title="{{ $home->image->title }}">
          @endif
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

    <main id="main">
        <section id="featured-services" class="featured-services">
            <div class="container">

                <div class="row">
                    @foreach($home->cards as $card)
                    <div class="col-lg-4 col-md-6 mt-4 mb-4 mt-md-0 text-center">
                        <div class="icon-box">
                          <div class="icon">{!! $card->icon !!}</div>
                          <h4 class="title"><a href="#">{{ $card->title }}</a></h4>
                          <p class="description">{{ $card->text }}</p>
                        </div>
                      </div>
                    @endforeach
                </div>
            </div>
        </section>

      <section id="portfolio" class="portfolio">
        <div class="container">
  
          <div class="section-title">
            <span>{{ $home->portfolio_title }}</span>
            <h2>{{ $home->portfolio_title }}</h2>
            {!! $home->portfolio_text !!}
          </div>
  
          <div class="row">
            <div class="col-lg-12 d-flex justify-content-center">
              <ul id="portfolio-flters">
                <li data-filter="*" class="filter-active">All</li>
                @foreach($home->portfolio_images as $block)
                    <li data-filter=".filter-{{ $block->name }}">{{ $block->name }}</li>
                @endforeach
              </ul>
            </div>
          </div>
  
          <div class="row portfolio-container">
            @foreach($home->portfolio_images as $block)
                @foreach($block->images as $id => $image) 
                <div class="col-lg-4 col-md-6 portfolio-item filter-{{ $block->name }}">
                    <img src="{{ $image->conversion_urls['lg'] }}" class="img-fluid" alt="{{ $image->alt }}" title="{{ $image->title }}">
                    <div class="portfolio-info">
                      <h4>{{ $block->name }} {{ $id + 1 }}</h4>
                      <p>{{ $block->name }}</p>
                      <a href="{{ $image->conversion_urls['lg'] }}" data-gall="portfolioGallery" class="venobox preview-link" title="App 1"><i class="bx bx-plus"></i></a>
                      <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                    </div>
                  </div>
                @endforeach
            @endforeach
              </div>
  
        </div>
      </section><!-- End Portfolio Section -->
  

  </main>
{{-- 
    <div class="container">
        <h1>{{$formFields->h1}}</h1>

        @if($formFields->executives)
            <div class="row">
                @foreach ($formFields->executives as $employee)
                    <div class="col-12 col-md-4">
                        @isset($employee->image)
                            <div class="text-center">
                                <img src="{{$employee->image->getFullUrl('md')}}" class="img-fluid" style="border-radius: 100px; width: 100px; height: 100px; object-fit: cover">
                            </div>
                        @endisset
                        <div class="text-center">
                            {{$employee->fullName}}
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        @if($formFields->content_block)
            <div class="row">
                @foreach ($formFields->content_block as $block)
                    @include('blocks.'.$block->type, [
                        'block' => $block
                    ])
                @endforeach
            </div>
        @endif

    </div>
     --}}
@endsection
