@extends('layouts.app')
@section('title', 'Add New card')

@section('content')
<!-- Start Contain Section -->
<div class="main-content">
	<div class="page-content container-fluid">
		@include('flash::message')

		<div class="row">
            <h1 class="pull-left">Add New card</h1>
        </div>

        <div class="row">
        	{!! Form::open(['route' => 'cards.store', 'class' => 'form-horizontal']) !!}
		        @include('cards.form')
		    {!! Form::close() !!}
        </div>
	</div>
</div>
<!-- End Contain Section -->
@endsection
