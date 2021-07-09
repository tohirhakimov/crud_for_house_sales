@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 8 CRUD </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('flats.create') }}"> Create New Flats</a>
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
            <th>Floor</th>
            <th>Area</th>
            <th>Price</th>
            <th>Status</th>
        </tr>
        @foreach ($flats as $flat)
        <tr>
            <td>{{ $flat->name }}</td>
            <td>{{ $flat->number }}</td>
            <td>{{ $flat->floor['name'] }}</td>
            <td>{{ $flat->area }}</td>
            <td>{{ $flat->price }}</td>
            <td>{{ $flat->status }}</td>
            <td>
                 <a class="btn btn-info" href="{{ route('house.porche.floor.flat.show',[$flat->floor->porche->house->id, $flat->floor->porche_id, $flat->floor_id, $flat->id]) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('flats.edit',$flat->id) }}">Edit</a>
                <form action="{{ route('flats.destroy',$flat->id) }}" method="POST">
                    <a class="btn btn-primary" href="{{ route('flats.sell',$flat->id) }}">Sell</a>
                
   
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

@endsection