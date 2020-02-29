@extends('app')


@section('content')
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
@endsection
