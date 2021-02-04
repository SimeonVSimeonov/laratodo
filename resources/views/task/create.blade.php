@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="card-body">
                <form method="POST" action="{{ route('task.store') }}">
                    @csrf

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                   name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="birthday" class="col-md-4 col-form-label text-md-right">{{ __('Deadline') }}</label>
                        <div class="col-md-6">
                            <input type="date" class="form-control @error('name') is-invalid @enderror"
                                   id="deadline" name="deadline">
                        </div>
                    </div>

                    <div class="form-group row">
                        <input name="todo_id" type="hidden" value="{{ request()->query('todo_id') }}">
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                Save
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
