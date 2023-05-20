@extends('layouts.app')
@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if (session('delete'))
        <div class="alert alert-danger">
            {{ session('delete') }}
        </div>
    @endif




    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Subjects') }}</div>

                    <div class="card-body">
                        @foreach ($subjects as $subject)
                            <div class="d-flex justify-content-between">
                                <div>
                                    <a href="{{ route('subjects.show', $subject->id) }} " class="link-dark link-offset-2 "
                                        style="text-decoration: none">
                                        <h5>{{ $subject->name }}</h5>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                        <div class="d-flex justify-content-between">
                            <h1>
                                <a href="{{ route('form') }}" class="btn btn-success">Choose Subject </a>
                            </h1>
                        </div>
                        <br><br>
                        {{ $subjects->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
