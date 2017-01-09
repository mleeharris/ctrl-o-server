@extends('admin.layouts.app')
@section('title', 'Membership Credits')

@section('page-plugin-css')
<link rel="stylesheet" href="{{ asset('assets/fonts/material-design/material-design.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugin/bootstrap-datepicker/css/bootstrap-datepicker.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/css/bootbox/sweet-alert.min.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/css/jsgrid/jsgrid.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/pagination/style.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/css/toastr/toastr.min.css') }}" />
@endsection

@section('content')
<!-- Start Contain Section -->
<div class="main-content">
    <div class="page-content container-fluid">
        @include('flash::message')

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="panel">
                    <!-- Basic JsGrid -->
                    <header class="panel-heading">
                        <h3 class="panel-title">Membership Credits</h3>
                    </header>
                    <div class="panel-body">
                        <div id="browse"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade modal-scalled" id="form-modal" aria-hidden="true" role="dialog">
        <div class="modal-dialog open-modal-center">
            {!! Form::open([
                'route' => 'admin.membership-credits.store', 
                'id'    => 'add-form', 
                'class' => 'modal-content form-horizontal',
                'novalidate'
            ]) !!}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title">Add Membership Credit</h4>
                </div>
                
                <div class="modal-body">
                    <div class="row">
                        @include('admin.membership_credits.form')
                    </div>
                </div>
                <div class="modal-footer">
                    {!! Form::button('Cancel', [
                        'class'        => 'btn waves-effect waves-light',
                        'data-dismiss' => 'modal'
                    ]) !!}
                    {!! Form::submit('Save', ['class' => 'btn btn-primary waves-effect waves-light']) !!}
                </div> 
            {!! Form::close() !!}
        </div>
    </div>
</div>
<!-- End Contain Section -->
@endsection

@section('page-plugin-js')
<script src="{{ asset('assets/plugin/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('assets/js/toastr/toastr.min.js') }}"></script>
<script src="{{ asset('assets/js/bootbox-page/sweet-alert.min.js') }}"></script>
<script src="{{ asset('assets/js/jsgrid/jsgrid.min.js') }}"></script>
@endsection

@section('page-js')
<script src="{{ asset('assets/js/jsgrid/jsgrid.config.js') }}"></script>
<script src="{{ asset('assets/js/validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('assets/js/jsgrid/grid-builder.js') }}"></script>
@endsection

@section('scripts')
<script>
    $('.datepicker').datepicker({
        'format': 'm/d/yyyy',
        'autoclose': true
    });
    Grid.setOptions({
        deleteConfirm: 'Do you really want to delete this Membership Credit?',
        loadRoute: "{{ route('api.membership-credits.list') }}",
        updateRoute: "{{ route('admin.membership-credits.update', ['id' => ':id']) }}",
        insertRoute: "{{ route('admin.membership-credits.store') }}",
        deleteRoute: "{{ route('admin.membership-credits.destroy', ['id' => ':id']) }}",
        fields: {!! $fields !!},
        rules: {!! $rules !!},
        messages: {!! $messages !!}
    }).render();
</script>  
@endsection
