@extends('layouts.app')

@section('title', 'Toutes les catégories')

@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-ticket">Catégories</i>
                </div>

                <div class="panel-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Catégorie</th>
                            <th>Catérogie parent</th>
                            <th style="text-align:center" colspan="2">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>
                                    {{ $category->name }}
                                </td>
                                <td>
                                    {{ $category->parent_id }}
                                </td>
                                <td>
                                        <a href="{{ url('admin/category/'. $category->id) }}" class="btn btn-primary">Modifier</a>

                                        <form action="{{ url('admin/delete_category/' . $category->id) }}" method="POST">
                                                {!! csrf_field() !!}
                                                <button type="submit" class="btn btn-danger">Supprimer</button>
                                        </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $categories->render() }}
                </div>
            </div>
        </div>
    </div>
@endsection