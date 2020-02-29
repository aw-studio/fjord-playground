@extends('app')

@section('content')
    <div class="container">
        <h1>
            {{$employee->fullName}} ({{$employee->department->name}})
        </h1>
        <div class="row">
            <div class="col-4">
                @isset($employee->image)
                    <div>
                        <img src="{{$employee->image->getFullUrl('md')}}" class="img-fluid">
                    </div>
                @endisset
            </div>
            <div class="col-8">
                <div>
                    <h2>
                        Projects
                    </h2>
                    <ul>
                        @foreach ($employee->projects as $project)
                            <li>{{$project->title}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
