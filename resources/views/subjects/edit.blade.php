@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit Subject') }}</div>

                    <div class="card-body">

                        {!! Form::open(['action' => ['App\Http\Controllers\pageController@update', $subjects->id], 'method' => 'post']) !!}

                        <div class="form-group">
                            {{ Form::label('name', 'Name') }}
                            {!! Form::text('name', $subjects->name, ['class' => 'form-control', 'value' => $subjects->name]) !!}
                        </div>

                        <div class="form-group">
                            {{ Form::label('code', 'Code') }}
                            {!! Form::text('code', $subjects->code, ['class' => 'form-control', 'value' => $subjects->code]) !!}
                        </div>
                        <div class="form-group">
                            {{ Form::label('department_id', 'Department ID') }}
                            {!! Form::text('department_id', $subjects->department_id, [
                                'class' => 'form-control',
                                'value' => $subjects->department_id,
                            ]) !!}
                        </div>
                        <br>
                        {{ Form::hidden('_method', 'PUT') }}
                        <div class="form-group">
                            {!! Form::submit('Edit', ['class' => 'btn btn-success']) !!}
                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
