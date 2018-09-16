@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app_admin')

@section('content')
    <h3 class="page-title">{{ __('Users')}}</h3>
    <p>
        <a href="{{ route('admin.user.create') }}" class="btn btn-success">{{ 'Add new' }}</a>
    </p>
    <div class="panel panel-default">
        <div class="panel-heading">
            {{__('Users')}}
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>&nbsp;</th>
                </tr>
                </thead>

                <tbody>
                @if ($users->count() > 0)
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->name}}</td>
                            <td>{{ $user->email}}</td>
                            <td>
                                <a href="{{ route('admin.user.edit',[$user->id]) }}" class="btn btn-xs btn-info">{{ 'Edit' }}</a>
                                <form method="POST" action="{{route("admin.user.destroy", $user->id)}}" accept-charset="UTF-8" style="display: inline-block;" onsubmit="return confirm('Are You sure');">
                                    {{method_field("DELETE")}}
                                    {{csrf_field()}}
                                    <input class="btn btn-xs btn-danger" type="submit" value="Delete">
                                </form>
                            </td>

                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="6">{{trans('No entries in table.')}}</td>
                    </tr>
                @endif
                </tbody>
                {!! $users->render() !!}
            </table>
        </div>
    </div>
@stop

@section('javascript')
@endsection