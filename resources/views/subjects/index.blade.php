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

                                @auth
                                    @can('update')
                                        <div class="btn-group" role="group" aria-label="...">
                                            <a href="{{ route('subjects.edit', $subject->id) }}" class="btn btn-primary">Edit </a>

                                            {!! Form::open([
                                                'action' => ['App\Http\Controllers\pageController@destroy', $subject->id],
                                                'method' => 'post',
                                                'class' => 'd-inline floate-right',
                                            ]) !!}


                                            {{ Form::hidden('_method', 'DELETE') }}

                                            <div class="form-group">
                                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                            </div>

                                            {!! Form::close() !!}

                                        </div>
                                    @endcan

                                @endauth




                            </div>
                        @endforeach
                        <br><br>
                        {{ $subjects->links() }}
                        <div class="d-flex justify-content-between">
                            @auth
                                @can('create')
                                    <h1>
                                        <a href="{{ route('subjects.create') }}" class="btn btn-success">Create Subject </a>
                                    </h1>
                                @endcan
                                @can('create')
                                    <h1>
                                        <a href="{{ route('account.create') }}" class="btn btn-success">Generate Account </a>
                                    </h1>
                                @endcan

                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
