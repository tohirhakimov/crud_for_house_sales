@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 8 CRUD Example from scratch </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('houses.create') }}"> Create New Product</a>
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
            <th>Address</th>
        </tr>
        @foreach ($houses as $house)
        <tr>
            <td>{{ $house->name }}</td>
            <td>{{ $house->address }}</td>
            <td>
                 <a class="btn btn-info" href="{{ route('houses.show',$house->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('houses.edit',$house->id) }}">Edit</a>
                <form action="{{ route('houses.destroy',$house->id) }}" method="POST">
   
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

@endsection