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
        @foreach ($flats as $flat)
        <tr>
            
            <td>{{ $flat->name }}</td>
            <td>{{ $flat->id }}</td>
            <td>{{ $flat->price*$flat->area;}}</td>
            <td>

   
                    @csrf
                    @method('DELETE')

                </form>
            </td>
        </tr>
        @endforeach
    </table>

@endsection