<div class="container">
    <div class="row justify-content-center">
        <form method="POST" action="{{ route('todo.store') }}">
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

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        Save
                    </button>
                </div>
            </div>
        </form>
        <div class="col-auto">
            <table class="table table-responsive">
                <thead>
                <tr>
                    <td style="text-align: center">Task</td>
                    <td style="text-align: center">Completed</td>
                    <td style="text-align: center">Created</td>
                    <td style="text-align: center">Edit Task</td>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>name</td>
                    <td >no</td>
                    <td>date</td>
                    <td>edit</td>
                </tr>
                </tbody>
            </table>
            <div class='sm-12 text-center'>
                <a href="#" >Add new</a>
            </div>
        </div>
    </div>
</div>
