@extends('app')

@section('content')
    <div class="container">
        <h1>
            Employees
        </h1>
        <div class="row">
            @foreach ($employees as $employee)
                <div class="col-12 col-md-4 col-lg-3 mb-5">
                    <a href="{{route('employees.show', $employee->id)}}">
                        @isset($employee->image)
                            <div>
                                <img src="{{$employee->image->getFullUrl('sm')}}" class="img-fluid">
                            </div>
                        @endisset
                        {{$employee->fullName}}
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
