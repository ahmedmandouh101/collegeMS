@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Department') }}</div>

                    <div class="card-body">
                        @foreach ($departments as $department)
                            <h1>{{ $department->name }}</h1>

                            <div>{{ $department->code }}</div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
