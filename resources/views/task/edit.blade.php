@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="card-body">
                <form method="POST" action="{{ route('task.update', $task->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                   name="name" value="{{ $task->name }}" required autocomplete="name" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Status') }}</label>

                    <div class="col-md-6">
                        <select name="is_completed" class="col-md-6 form-control">
                            @if($task->is_completed)
                                <option selected value="1">Done</option>
                                <option value="0">In Progress</option>
                            @else
                                <option value="1">Done</option>
                                <option selected value="0">In Progress</option>
                            @endif
                        </select>

                        @error('is_completed')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    </div>

                    <div class="form-group row">
                        <label for="deadline" class="col-md-4 col-form-label text-md-right">{{ __('Deadline') }}</label>
                        <div class="col-md-6">
                            <input type="date" class="form-control @error('name') is-invalid @enderror"
                                   id="deadline" name="deadline" value="{{$task->deadline->format('Y-m-d')}}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <input name="todo_id" type="hidden" value="{{$task->todo_id}}">
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                Update
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
