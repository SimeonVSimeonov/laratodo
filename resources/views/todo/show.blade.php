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
                                    <td >Deadline</td>
                                    <td >Edit Task</td>
                                    <td >Delete Task</td>
                                </tr>
                                </thead>
                                <tbody>
                                @isset($tasks)
                                @foreach ($tasks as $task)
                                    @if($task->is_disabled)
                                        <tr>
                                            <td style="color: red">{{$task['name']}}</td>
                                            <td style="color: red">NO</td>
                                            <td style="color: red">{{$task['created_at']}}</td>
                                            <td style="color: red">{{$task['deadline']}}</td>
                                            <td style="color: red">Overdue</td>
                                            <td style="color: red">Overdue</td>
                                        </tr>
                                    @else
                                    <tr>
                                        <td>{{$task['name']}}</td>
                                        @if($task['is_completed'])
                                            <td >YES</td>
                                        @else
                                            <td >NO</td>
                                        @endif
                                        <td>{{$task['created_at']}}</td>
                                        <td>{{$task['deadline']}}</td>
                                        <td><a href="{{route('task.edit', $task['id'])}}" >Edit</a></td>
                                        <td><form action="{{ route('task.destroy', $task->id) }}" method="POST" id="task-destroy-{{ $task->id }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">
                                                    Delete
                                                </button>
                                            </form></td>
                                    </tr>
                                    @endif
                                @endforeach
                                @endisset
                                </tbody>
                            </table>
                            <div class='sm-12 text-center'>
                                <a href="{{route('task.create', ['todo_id' => $todo->id])}}" >Add New Task</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
