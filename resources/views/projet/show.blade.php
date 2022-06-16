@extends('layouts.app')

@section('title', $projet->title)

@section('content')


    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    #{{ $projet->id }} - {{ $projet->titre }}
                </div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="projet-info">
                        <p>{{ $projet->description }}</p>
                        <p>
                            @if ($projet->status === 'Ouvert')
                                Status: <span class="label label-success">{{ $projet->status }}</span>
                            @else
                                Status: <span class="label label-danger">{{ $projet->status }}</span>
                            @endif
                        </p>
                        <p>Créé le: {{ $projet->created_at->diffForHumans() }}</p>
                    </div>

                </div>
            </div>
        </div>
    </div>


@endsection