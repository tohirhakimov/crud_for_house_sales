@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 8 CRUD </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('floors.create') }}"> Create New Floor</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>Name</th>
            <th>Number</th>
            <th>Porche</th>
        </tr>
        @foreach ($floors as $floor)
        <tr>
            <td>{{ $floor->name }}</td>
            <td>{{ $floor->number }}</td>
            <td>{{ $floor->porche['id'] }}</td>
            <td>
                 <a class="btn btn-info" href="{{ route('floors.show',$floor->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('floors.edit',$floor->id) }}">Edit</a>
                <form action="{{ route('floors.destroy',$floor->id) }}" method="POST">
   
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

@endsection