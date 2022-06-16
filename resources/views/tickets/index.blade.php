@extends('layouts.app')

@section('title', 'Tout les tickets')

@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-ticket"> Tickets</i>
                </div>

                <div class="panel-body">
                    @if ($tickets->isEmpty())
                        <p>Il n'y a actuellement pas de ticket.</p>
                    @else
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Catégorie</th>
                                <th>Titre</th>
                                <th>Statut</th>
                                <th>Projet</th>
                                <th>Dernière mise à jour</th>
                                <th style="text-align:center">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($tickets as $ticket)
                                <tr>
                                    <td>
                                        {{ $ticket->category->name }}
                                    </td>
                                    <td>
                                        <a href="{{ url('tickets/'. $ticket->ticket_id) }}">
                                            #{{ $ticket->ticket_id }} - {{ $ticket->title }}
                                        </a>
                                    </td>
                                    <td>
                                        @if ($ticket->status === 'Ouvert')
                                            <span class="label label-success">{{ $ticket->status }}</span>
                                        @else
                                            <span class="label label-danger">{{ $ticket->status }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        {{ $ticket->projet_id }}
                                    <td>
                                        {{ $ticket->updated_at }}
                                    </td>
                                    <td>
                                        @if($ticket->status === 'Ouvert')
                                            <a href="{{ url('tickets/' . $ticket->ticket_id) }}" class="btn btn-primary">Commenter</a>

                                            <form action="{{ url('admin/close_ticket/' . $ticket->ticket_id) }}" method="POST">
                                                {!! csrf_field() !!}
                                                <button type="submit" class="btn btn-warning">Fermer</button>
                                            </form>
                                        @endif

                                        <form action="{{ url('admin/delete_ticket/' . $ticket->id) }}" method="POST">
                                                {!! csrf_field() !!}
                                                <button type="submit" class="btn btn-danger">Supprimer</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        {{ $tickets->render() }}
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection