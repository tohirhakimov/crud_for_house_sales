@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 8 CRUD </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('sold_flats.create') }}"> Create New Sold Flat</a>
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
            <th>Client</th>
            <th>Flat</th>
            <th>Total price</th>
        </tr>
        @foreach ($sold_flats as $sold_flat)
        <tr>
            
            <td>{{ $sold_flat->name }}</td>
            <td>{{ $sold_flat->id }}</td>
            <td>{{ $sold_flat->total_amount}}</td>
            <td>
                 <a class="btn btn-info" href="{{ route('sold_flats.show',$sold_flat->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('sold_flats.edit',$sold_flat->id) }}">Edit</a>
                <form action="{{ route('sold_flats.destroy',$sold_flat->id) }}" method="POST">
   
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

@endsection