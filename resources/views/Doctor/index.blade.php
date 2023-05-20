@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Subjects') }}</div>

                    <div class="card-body">
                        @foreach ($subjects as $subject)
                            <div class="d-flex justify-content-between">
                                <div>
                                    <a href="{{ route('doctor.show', $subject->id) }} " class="link-dark link-offset-2 "
                                        style="text-decoration: none">
                                        <h5>{{ $subject->name }}</h5>
                                    </a>
                                </div>

                                @auth
                                    @can('update')
                                        <div class="btn-group" role="group" aria-label="...">
                                            <a href="{{ route('doctor.edit', $subject->id) }}" class="btn btn-primary">Edit </a>

                                        </div>
                                    @endcan

                                @endauth




                            </div>
                        @endforeach
                        <br><br>
                        {{ $subjects->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
