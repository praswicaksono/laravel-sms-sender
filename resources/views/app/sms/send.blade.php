@extends('backpack::layout')

@section('header')
    <section class="content-header">
        <h1>
            SMS Sender<small>spend your sms credit</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url(config('backpack.base.route_prefix', 'admin')) }}">{{ config('backpack.base.project_name') }}</a></li>
            <li class="active">SMS Sender</li>
        </ol>
    </section>
@endsection


@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="post" action="{{ route('sms.send') }}">
        {{ csrf_field() }}
    <div class="panel panel-primary">
        <div class="panel-heading bg-black">
            <h3 class="panel-title">Send SMS</h3>
        </div>
        <div class="panel-body" style="padding-left:30px">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 form-group ">
                    <label for="email">Phone Number</label> :
                    <input class="form-control" placeholder="Phone Number (+62xxxxxxxx)" name="phone_number" type="text" id="email">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 form-group ">
                    <label for="message">Message</label> :
                    <textarea rows="15" class="form-control" placeholder="Message" name="message"></textarea>
                </div>
            </div>
        </div>
    </div>
    <div class="box-footer">
        <button type="submit" class="btn btn-primary pull-right">Send</button>
    </div>
    </form>
@endsection
