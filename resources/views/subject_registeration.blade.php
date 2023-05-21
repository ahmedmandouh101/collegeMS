@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register Subject') }}</div>

                    <div class="card-body">
                        {!! Form::open(['action' => 'App\Http\Controllers\studentController@store',
                        'method' => 'post']) !!}


                        <div>
                            <label>Choose Subject</label>
                            <select name="name" class="form-select">
                                @foreach ($subjects as $s)
                                    <option value="{{ $s->name }}">
                                        {{ $s->name }}
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
@endsection
