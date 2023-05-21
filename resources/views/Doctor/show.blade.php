@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Subject Details') }}</div>

                    <div class="card-body">
                        <h1 style="text-align: center">
                            {{ $subjects->name }}
                        </h1>
                        <h4>
                            <h1>Department :</h1>
                            {{ $subjects->department->name }}
                        </h4>
                        <div> <br>
                            <h1>Department ID :</h1>
                            {{ $subjects->department_id }}
                        </div>
                        <div>
                            <h1>Code :</h1>
                            {{ $subjects->code }}
                        </div>
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2 col-sm-6-offset-4">
                                <h1>Files :</h1>
                                @foreach ($media as $m)
                                    <img src="/photos/{{ $m->name }}" style="width:60%;height:60%">
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
