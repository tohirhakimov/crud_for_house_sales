@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit floor</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('floors.index') }}"> Back</a>
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

    <form action="{{ route('floors.update',$floor->id) }}" method="POST">
        @csrf

        @method('PUT')
         <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Porche:</strong>
                    <select name='porche_id' class="form-control" required>
    @foreach ( $porches as $porche)
    <option value="{{$porche['id']}}">{{$porche['id']}}</option>
    @endforeach
                        
                    </select>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="Name" value="{{ $floor->name }}" class="form-control" placeholder="Name">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Number:</strong>
                    <textarea class="form-control" style="height:150px" name="Number" placeholder="Address">{{ $floor->number }}</textarea>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection