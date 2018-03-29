@extends('Emails::layout')

@section('content')    		
	<div class="title">
		<h1>Jafra</h1>
	</div>
	<div class="content">
		<p><b>Hey {{ $user->name }},</b></p>

		<p>Allons-y! A request to change email has been made.</p>

		<a class='btn btn-primary' href="{{ env('EMAILS_URL') }}/confirm-email/{{ $user->pendingEmail->token }}">Verify Email</a>
		
	</div>
@endsection