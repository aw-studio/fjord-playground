@extends('app')

@section('content')
    <div class="container">
        <h1>
            {{$department->name}}
        </h1>
        <div class="row">
            <ul>
                @foreach ($department->employees as $employee)
                    <li>
                        <a href="{{route('employees.show', $employee->id)}}">{{$employee->fullName}}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
