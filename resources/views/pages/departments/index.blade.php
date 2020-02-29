@extends('app')

@section('content')
    <div class="container">
        <h1>
            Departments
        </h1>
        <div class="row">
            <ul>
                @foreach ($departments as $department)
                    <li>
                        <a href="{{route('departments.show', $department->id)}}">{{$department->name}}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
