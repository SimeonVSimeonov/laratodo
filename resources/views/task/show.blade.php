@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card text-center">
                    <div class="card-header">{{$task->name}}</div>
                    <div class="row justify-content-center">
                        <div class="col-auto">

{{--                            <div class='sm-12 text-center'>--}}
{{--                                <a href="{{route('task.create')}}" >Add new</a>--}}
{{--                            </div>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
