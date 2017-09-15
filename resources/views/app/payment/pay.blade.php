@extends('backpack::layout')

@section('header')
    <section class="content-header">
        <h1>
            Buy Credit<small>buy credit to send sms</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url(config('backpack.base.route_prefix', 'admin')) }}">{{ config('backpack.base.project_name') }}</a></li>
            <li class="active">Buy Credit</li>
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
    <form method="post" action="{{route('buy.credit.pay') }}">
        {{ csrf_field() }}
    <div class="panel panel-primary">
        <div class="panel-heading bg-black">
            <h3 class="panel-title">Order Detail</h3>
        </div>
        <div class="panel-body" style="padding-left:30px">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                    <label for="email">Amount</label> :
                    <input class="form-control" placeholder="$1 = 1 SMS Credit" name="amount" type="text" value="{{ old('amount') }}">
                </div>
            </div>
        </div>
    </div>

    <div class="panel panel-primary">
        <div class="panel-heading bg-black">
            <h3 class="panel-title">Card Information</h3>
        </div>
        <div class="panel-body" style="padding-left:30px">
            <div class="row">
                <div class="col-md-8 col-sm-8 col-xs-8 form-group">
                    <label for="cc_number">Card Number</label> :
                    <input class="form-control" placeholder="XXXXXXXXXXXXXXXX" name="cc_number" type="text">
                </div>
                <div class="col-md-4 col-sm-4 col-xs-4 form-group ">
                    <label for="cc_cvc">CVC</label> :
                    <input class="form-control" placeholder="XXX" name="cc_cvc" type="text">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-4 form-group pull-right">
                    <label for="cc_expiration">Expiration</label> :
                    <input class="form-control" placeholder="00/0000" name="cc_expiration" type="text">
                </div>
            </div>
        </div>
    </div>
    <div class="box-footer">
        <button type="submit" class="btn btn-primary pull-right">Buy</button>
    </div>
    </form>
@endsection
