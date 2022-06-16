@extends('layouts.app')

@section('title', 'Tout les projets')

@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-projet">Projets</i>
                </div>

                <div class="panel-body">
                    @if ($projets->isEmpty())
                        <p>Il n'y a actuellement pas de projet.</p>
                    @else
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Titre</th>
                                <th>Statut</th>
                                <th>Dernière mise à jour</th>
                                <th>Tickets</th>
                                <th style="text-align:center" colspan="2">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($projets as $projet)
                                <tr>
                                    <td>
                                        <a href="{{ url('projets/'. $projet->id) }}">
                                            {{ $projet->id }} - {{ $projet->titre }}
                                        </a>
                                    </td>

                                    <td>
                                        @if ($projet->status === 'Ouvert')
                                            <span class="label label-success">{{ $projet->status }}</span>
                                        @else
                                            <span class="label label-danger">{{ $projet->status }}</span>
                                        @endif
                                    </td>
                                    <td>{{ $projet->updated_at }}</td>
                                    <td>Les tickets liés</td>

                                    <td>
                                        <a href="{{ url('admin/projets/'. $projet->id) }}" class="btn btn-primary">Modifier</a>

                                        <form action="{{ url('admin/delete_projet/' . $projet->projet_id) }}" method="POST">
                                                {!! csrf_field() !!}
                                                <button type="submit" class="btn btn-danger">Supprimer</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        {{ $projets->render() }}
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection