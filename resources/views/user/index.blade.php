@extends('layouts.app')

@section('title', 'Tout les utilisateurs')

@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-ticket">Utilisateurs</i>
                </div>

                <div class="panel-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Mot de passe</th>
                            <th>Mail</th>
                            <th>Rôle</th>
                            <th style="text-align:center" colspan="2">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>
                                    {{ $user->name }}
                                </td>
                                <td>
                                    {{ $user->password }}
                                </td>
                                <td>
                                    {{ $user->email }}
                                </td>
                                <td>
                                    <?php if($user->is_dev == 0 && $user->is_admin == 0)
                                    { 
                                    ?>
                                        Utilisateur
                                    <?php
                                    }
                                    else if($user->is_dev  == 1 && $user->is_admin == 0)
                                    {
                                    ?>
                                        Développeur
                                    <?php
                                    }
                                    else
                                    {
                                    ?>
                                        Administrateur
                                    <?php
                                    }
                                    ?>
                                    
                                </td>
                                <td>
                                    <a href="{{ url('admin/user/'. $user->id) }}" class="btn btn-primary">Modifier</a>

                                    <form action="{{ url('admin/delete_user/' . $user->id) }}" method="POST">
                                        {!! csrf_field() !!}
                                        <button type="submit" class="btn btn-danger">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $users->render() }}
                </div>
            </div>
        </div>
    </div>
@endsection