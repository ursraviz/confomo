@extends('layouts.public')

@section('content')
	<h2>Public view for user {{ $user->username }}</h2>

	<div id="old-friends" data-type="old">
		<h3>Old friends to meet at conf</h3>
		<i>(Grey = met)</i>
		<ul>
			@foreach($user->oldFriends as $friend)
			<li class="{{ $friend->met ? 'public-mark-as-met' : '' }}"><a href="http://twitter.com/{{ $friend->twitter }}">{{ '@' . $friend->twitter }}</a></li>
			@endforeach
		</ul>

		<form data-bind="submit: addItem">
			<label for="suggestOldFriend">Suggest old friend for `{{ $user->username }}` to meet:</label><br>
			@<input data-bind='value: itemToAdd, valueUpdate: "afterkeydown"' type="text" autocorrect="off" autocapitalize="off">
			<button type="submit" data-bind="enable: itemToAdd().length > 0">Add</button>
			<div class="addItem-message"></div>
		</form>
	</div>

	<div id="new-friends" data-type="new">
		<h3>New friends met at conf</h3>
		<ul>
			@foreach($user->newFriends as $friend)
			<li><a href="http://twitter.com/{{ $friend->twitter }}">{{ '@' . $friend->twitter }}</a></li>
			@endforeach
		</ul>

		<form data-bind="submit: addItem">
			<label for="suggestOldFriend">Suggest new friend for `{{ $user->username }}` to track as "met":</label><br>
			@<input data-bind='value: itemToAdd, valueUpdate: "afterkeydown"' type="text" autocorrect="off" autocapitalize="off">
			<button type="submit" data-bind="enable: itemToAdd().length > 0">Add</button>
			<div class="addItem-message"></div>
		</form>
	</form>
	</div>
@stop