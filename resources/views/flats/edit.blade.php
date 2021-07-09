@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Flat</h2>
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
                    <strong>Name:</strong>
                    <input type="text" name="Name" value="{{ $flat->name }}" class="form-control" placeholder="Name">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Number:</strong>
                    <textarea class="form-control" style="height:150px" name="Number" placeholder="Address">{{ $flat->number }}</textarea>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Floor:</strong>
                    <select name='porche_id' class="form-control" required>
    @foreach ( $floors as $floor)
    <option value="{{$floor['id']}}">{{$floor['id']}}</option>
    @endforeach
                        
                    </select>
            
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Area:</strong>
                    <textarea class="form-control" style="height:150px" name="Are" placeholder="Area">{{ $flat->number }}</textarea>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Price:</strong>
                    <textarea class="form-control" style="height:150px" name="Price" placeholder="Price">{{ $flat->number }}</textarea>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Status:</strong>
                    <select name='status' class="form-control" required>
    
    <option value="sold">Sold</option>
    <option value="not_sold">Not sold</option>
                        
                    </select>
                

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection