@extends('layouts.app_admin')

@section('content')
    <h3 class="page-title">{{ 'User'}}</h3>
    <form method="POST" action="{{route('admin.user.update', $user->id)}}" enctype="multipart/form-data">
        {{csrf_field()}}
        {{method_field('PUT')}}
        <div class="panel panel-default">
            <div class="panel-heading">
                Edit
            </div>

            <div class="panel-body">
                <div class="row">
                    <div class="col-xs-12 form-group">
                        <label for="name" class="control-label">{{ 'Name'}} <span class="text-red"> *</span></label>
                        <input  type="text" name="name" id="name" class="form-control" placeholder="" value="{{old('name', $user->name)}}">
                        @if(isset($errors) && $errors->first('name'))
                            <span class="text-red">
                                {{$errors->first('name')}}
                            </span>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 form-group">
                        <label for="email" class="control-label">{{ 'Email'}} <span class="text-red"> *</span></label>
                        <input  type="email" name="email" id="email" class="form-control" placeholder="" value="{{old('email', $user->email)}}">
                        @if(isset($errors) && $errors->first('email'))
                            <span class="text-red">
                                {{$errors->first('email')}}
                            </span>
                        @endif
                    </div>
                </div>

            </div>
        </div>

        <input class="btn btn-danger" type="submit" value="{{ 'Save' }}">
    </form>
@stop



