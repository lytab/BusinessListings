@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create Listing <span class="pull-right"><a href="/dashboard" class="btn btn-default btn-xs">Go Back</a></span></div>

                <div class="panel-body">
                   {!!Form::open(['action'=>'ListingController@store'])!!}
                        {{Form::bsText('name',null,['placeholder'=>'Enter Name'])}}
                        {{Form::bsText('email',null,['placeholder'=>'Enter Email'])}}
                        {{Form::bsText('website',null,['placeholder'=>'Enter Website'])}}
                        {{Form::bsText('phone',null,['placeholder'=>'Enter Phone'])}}
                        {{Form::bsText('address',null,['placeholder'=>'Enter Address'])}}
                        {{Form::bsTextArea('bio',null,['placeholder'=>'Enter Bio'])}}
                        {{Form::bsSubmit('Create Listing',['class'=>'btn btn-info'])}}
                   {!!Form::close()!!}
                </div>
               
            </div>
        </div>
    </div>
@endsection
