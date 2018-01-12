<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Chat</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
</head>
<body>
	
	<div class="container">
		<div class="row" id="app">
			<ul class="list-group col-xl-4 offset-xl-4">
				<li class="list-group-item active">Chatroom</li>
				<li class="list-group-item">Dapibus ac facilisis in</li>
				<li class="list-group-item">Morbi leo risus</li>
				<li class="list-group-item">Porta ac consectetur ac</li>
				<li class="list-group-item">Vestibulum at eros</li>
				<input type="text" class="form-control" name="" placeholder="Type message here ...">
			</ul>
		</div>
	</div>

	<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
</body>
</html>