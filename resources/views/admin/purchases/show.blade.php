@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.purchase.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.purchase.fields.item-code')</th>
                            <td field-key='item_code'>{{ $purchase->item_code }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.purchase.fields.quantity')</th>
                            <td field-key='quantity'>{{ $purchase->quantity }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.purchase.fields.photo')</th>
                            <td field-key='photo'>@if($purchase->photo)<a href="{{ asset(env('UPLOAD_PATH').'/' . $purchase->photo) }}" target="_blank"><img src="{{ asset(env('UPLOAD_PATH').'/thumb/' . $purchase->photo) }}"/></a>@endif</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.purchases.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop


