@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 8 CRUD Example from scratch </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('porches.create') }}"> Create New Porche</a>
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
            <th>House</th>
        </tr>
        @foreach ($porches as $porche)
        <tr>
            <td>{{ $porche->name }}</td>
            <td>{{ $porche->number }}</td>
            <td>{{ $porche->house['name'] }}</td>
            <td>
                 <a class="btn btn-info" href="{{ route('porches.show',$porche->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('porches.edit',$porche->id) }}">Edit</a>
                <form action="{{ route('porches.destroy',$porche->id) }}" method="POST">
   
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

@endsection