@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Sell Flat</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('flats.index') }}"> Back</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('flats.update',$flat->id) }}" method="POST">
        @csrf

        @method('PUT')
        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Client:</strong>
                    <select name='name' class="form-control" required>
    @foreach ( $clients as $client)
    <option value="{{$client['name']}}">{{$client['name']}}</option>
    @endforeach
                        
                    </select>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Status:</strong>
                    <select name='status' class="form-control" required>
    
    <option value="sold">Sold</option>
    <option value="not_sold">Not sold</option>
                        
                    </select>
                

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Sell</button>
            </div>
        </div>
    </form>
@endsection