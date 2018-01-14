<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Chat</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
	<style type="text/css">
		.list-group {
			overflow-y: scroll;
			height: 500px;
		},
	</style>
</head>
<body>
	
	<div class="container">
		<div class="row" id="app">
			<div class="chatbox col-xl-4 offset-xl-4">
				<li class="list-group-item active">Chatroom
					<span class="badge badge-pill badge-danger">@{{ numberOfUsers }}</span>
				</li>
				<ul class="list-group" v-chat-scroll>
					<br>
					<message-component 
					v-for="value,index in chatbox.message" 
					:key="value.index" 
					:color="chatbox.color[index]" 
					:user="chatbox.user[index]"
					:time="chatbox.time[index]">
						@{{ value }}
					</message-component>
					<br>
				</ul>
				<div class="badge badge-pill badge-primary">@{{ typing }}</div>
				<br><br>
				<input type="text" class="form-control" name="message" placeholder="Type message here ..." v-model="message" @keyup.enter="send">
			</div>
		</div>
	</div>

	<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
</body>
</html>