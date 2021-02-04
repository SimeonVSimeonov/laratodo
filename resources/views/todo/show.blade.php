@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card text-center">
                    <div class="card-header">{{$todo->name}}</div>
                    <div class="row justify-content-center">
                        <div class="col-auto">
                            <table class="table table-responsive">
                                <thead>
                                <tr>
                                    <td >Task</td>
                                    <td >Completed</td>
                                    <td >Created</td>
                                    <td >Edit Task</td>
                                </tr>
                                </thead>
                                <tbody>
{{--                                @foreach ($todos as $todo)--}}
{{--                                    <tr>--}}
{{--                                        <td>{{$todo['name']}}</td>--}}
{{--                                        <td >{{$todo['is_completed']}}</td>--}}
{{--                                        <td>{{$todo['created_at']}}</td>--}}
{{--                                        <td><a href="{{route('todo.show', $todo['id'])}}" >show</a></td>--}}
{{--                                    </tr>--}}
{{--                                @endforeach--}}
                                </tbody>
                            </table>
                            <div class='sm-12 text-center'>
                                <a href="{{route('todo.create')}}" >Add new</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
