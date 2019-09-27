<html>
	<head>
		<meta charset="utf-8">
		<title>Dropdown list</title>
		<style>
			html {
				background-color: #282923;
				color: white;
				font-size: 1.2em;
			}
			#dropdown {
				width: 200px;
				margin: 0;
				padding: 0;
				background-color: #000000;
			}
			li {
				list-style: none;
			}
			.list ul {
				position: absolute;
				display: none;
				margin-left: 30px;
			}

			.title:hover {
				cursor: pointer;
			}

			/*.list:hover ul {
				display: block;
			}*/

			.list.open ul {
				display: block;
			}
		</style>
	</head>
	<body>
		<ul id="dropdown">
			<li class="list">
				<span class="title">folder_1</span>
				<ul>
					<li>php_1</li>
					<li>php_2</li>
					<li>php_3</li>
					<li>php_4</li>
				</ul>
			</li>
			<li class="list">
				<span class="title">folder_2</span>
				<ul>
					<li>html_1</li>
					<li>html_2</li>
					<li>html_3</li>
				</ul>
			</li>
			<li class="list">
				<span class="title">folder_3</span>
				<ul>
					<li>js_1</li>
					<li>js_2</li>
					<li>js_3</li>
				</ul>
			</li>
			<li class="list">Exe_4</li>
			<li class="list">Exe_5</li>
		</ul>
		<script>
			let list = document.getElementsByClassName('list');
			
			for(let i = 0; i < list.length; i++) {
				if(list[i].querySelector('.title') !== null) {
					let drop = list[i].querySelector('.title');
					drop.onclick = function() {
						list[i].classList.toggle('open');
					}
				}
			}
		  </script>
	</body>
</html>
