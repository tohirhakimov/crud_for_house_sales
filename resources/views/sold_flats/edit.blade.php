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

    <form action="{{ route('sold_flats.update',$sold_flat->id) }}" method="POST">
        @csrf

        @method('PUT')
         <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Client:</strong>
                    <select name='client_id' class="form-control" required>
    @foreach ( $sold_flats as $sold_flat)
    <option value="{{$sold_flat->client_id}}">{{$sold_flat->client_id}}</option>
    @endforeach
                        
                    </select>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Flat:</strong>
                    <select name='flat_id' class="form-control" required>
    @foreach ( $sold_flats as $sold_flat)
    <option value="{{$sold_flat->flat_id}}">{{$sold_flat->flat_id}}</option>
    @endforeach
                        
                    </select>
            </div>

        
        

            

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection