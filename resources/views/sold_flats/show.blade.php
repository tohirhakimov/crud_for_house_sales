@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Floors</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('floors.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="row">
        

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Flat Number:</strong>
                {{ $sold_flat->client_id }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong> Number:</strong>
                {{ $sold_flat->flat_id }}
            </div>
        </div>

    </div>
@endsection