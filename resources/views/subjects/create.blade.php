@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create Subject') }}</div>

                    <div class="card-body">
                        {!! Form::open(['action' => 'App\Http\Controllers\pageController@store', 'method' => 'post', 'files' => true]) !!}

                        <div class="form-group">
                            {{ Form::label('name', 'Name') }}
                            {{ Form::text('name', '', ['class' => 'form-control']) }}
                            @error('name')
                                <div class="text text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            {{ Form::label('code', 'Code') }}
                            {{ Form::text('code', '', ['class' => 'form-control']) }}
                            @error('code')
                                <div class="text text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        {{-- <div class="form-group">
        {{ Form::label('department_id', 'Department') }}
        {{ Form::select('department_id', [$departments->id => $departments->name], null, ['class' => 'form-select']) }}        {{ Form::text('department_id', '', ['class' => 'form-control']) }}
    </div> --}}
                        <div>
                            <label>Department</label>
                            <select name="department_id" class="form-select">
                                @foreach ($departments as $department)
                                    <option value="{{ $department->id }}">
                                        {{ $department->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <br>
                        <div class="form-group">
                            {!! Form::submit('save', ['class' => 'btn btn-primary']) !!}
                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <h1>Create Subject</h1> --}}
@endsection
