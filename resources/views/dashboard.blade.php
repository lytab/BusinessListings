@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard <span class="pull-right"><a href="/listings/create" class="btn btn-success btn-xs">Create listing</a></span></div>

                <div class="panel-body">
                    
                <h3>Your Listings</h3>
                @if (count($listings)>0)
                    <table class="table table-striped">
                       <tr>
                           <th>Company</th>
                           <th></th>
                           <th></th>
                           
                       </tr>
                       @foreach ($listings as $l)
                        <tr>
                            <td>{{$l->name}}</td>
                            <td><a href="/listings/{{$l->id}}/edit" class="btn btn-warning btn-xs">Edit listing</a></td>
                            <td>
                                
                            </td>
                            
                        </tr>
                        @endforeach

                    </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
