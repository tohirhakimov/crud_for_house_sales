@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Sold Flat</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('sold_flats.index') }}"> Back</a>
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

    <form action="{{ route('sold_flats.update',$floor->id) }}" method="POST">
        @csrf

        @method('PUT')
         <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Client:</strong>
                    <select name='client_id' class="form-control" required>
    @foreach ( $clients as $client)
    <option value="{{$client['id']}}">{{$client['id']}}</option>
    @endforeach
                        
                    </select>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Flat:</strong>
                    <select name='flat_id' class="form-control" required>
    @foreach ( $flats as $flat)
    <option value="{{$flat['id']}}">{{$flat['id']}}</option>
    @endforeach
                        
                    </select>
            </div>

        
        

            

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection