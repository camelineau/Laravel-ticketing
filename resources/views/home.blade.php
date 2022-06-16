@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Tableau de bord</div>

                <div class="panel-body">

                    <p>Vous êtes connecté !</p>

                    @if(Auth::user()->is_admin)

                        <p>
                            Voir tout les <a href="{{ url('admin/tickets') }}">tickets</a>
                        </p>
                        <p>
                            Voir tout les <a href="{{ url('admin/users') }}">utilisateurs</a> ou <a href="{{ url('admin/new-user')}}"> en créer un nouveau</a>
                        </p>
                        <p>
                            Voir toutes les <a href="{{ url('admin/categories') }}">catégories</a> ou <a href="{{ url('admin/new-category')}}"> en créer une nouvelle</a>
                        </p>
                        <p>
                            Voir tout les <a href="{{ url('admin/projets') }}">projets</a> ou <a href="{{ url('admin/new-projet')}}"> en créer un nouveau</a>
                        </p>

                    @elseif(Auth::user()->is_dev)

                        <p>
                            Voir tout les <a href="{{ url('dev/tickets') }}">tickets</a>
                        </p>

                        <p>
                            Voir tout les <a href="{{ url('dev/projets') }}">projets</a> ou <a href="{{ url('dev/new-projet')}}"> en créer un nouveau</a>
                        </p>
                        
                    @else

                        <p>
                            Voir tout les <a href="{{ url('my_tickets') }}">tickets</a> ou <a href="{{ url('new-ticket') }}">en créer un nouveau</a>
                        </p>

                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection