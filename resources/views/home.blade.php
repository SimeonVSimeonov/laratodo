@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card text-center">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="row justify-content-center">
                <div class="col-auto">
                    <table class="table table-responsive">
                        <thead>
                        <tr>
                            <td >Todo</td>
                            <td >Completed</td>
                            <td >Created</td>
                            <td >Show</td>
                            <td >Edit</td>
                            <td >Delete</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($todos as $todo)
                        <tr>
                            <td>{{$todo['name']}}</td>
                            <td >{{$todo['is_completed']}}</td>
                            <td>{{$todo['created_at']}}</td>
                            <td><a href="{{route('todo.show', $todo['id'])}}" >Show</a></td>
                            <td><a href="{{route('todo.edit', $todo['id'])}}" >Edit</a></td>
                            <td><form action="{{ route('todo.destroy', $todo->id) }}" method="POST" id="todo-destroy-{{ $todo->id }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        Delete
                                    </button>
                                </form></td>
                        </tr>
                        @endforeach
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
