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
                            @foreach($category as $cat)
                                <tr>
                                    <td>{{ $cat->id }}</td>
                                    <td>{{ $cat->name }}</td>
                                    <td>{{ (isset($category_parent[$cat->id])) ? $category_parent[$cat->id] : 'Nu are parinte' }}</td>
                                    <td>{!! Form::open(['route' => ['admin.category.destroy', $cat->id], 'method' => 'delete', 'class' => 'form-horizontal']) !!}
                                        <a href="{{ route('admin.category.edit',  $cat->id) }}" class="btn btn-info btn-sm" >
                                            <i class="fa fa-pencil-square-o"></i>
                                        </a>
                                        <a href="javascript:;" onclick="$(this).parent().submit()"  class="btn btn-danger btn-sm">
                                            <i class="fa fa-times"></i>
                                        </a>
                                        {!! Form::close() !!}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
