@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <a href="{{ route('admin.category.create') }}" class="btn btn-primary">Creaza Categorie</a>
            <div class="panel panel-default">
                <div class="panel-heading">Categorie</div>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nume</th>
                                <th>Parinte</th>
                                <th>Actiuni</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>

                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
