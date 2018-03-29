@extends('Emails::layout')

@section('content')    		
	<div class="title">
		<h1>Welcome to Jafra!</h1>
	</div>
	<div class="content">
		<p><b>Hey {{ $user->name }},</b></p>

		<p>Allons-y! Thanks for registering an account with MangaRader.</p>

		<p>Just one step more, we'll need to verify your email</p>

		<p>Your code is: <b>{{ $user->pendingEmail->token }}</b></p>

		<p>Or you can simply click the folling button</p>

		<a class='btn btn-primary' href="{{ env('EMAILS_URL') }}/confirm-email/{{ $user->pendingEmail->token }}">Verify Email</a>
		
	</div>
@endsection