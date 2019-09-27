<?php
	session_start();
?>
<html>
	<head>
		<meta charset="windows-1251">
		<title>Practice</title>
		<link rel="stylesheet" href="style.css">
		<script type="javascript" src="exercises/dropdown.js"></script>
	</head>
	<body>
		<div>
			<?php
				class Exercises {
					public $exes = array();
					private $decr = 1;

					function __construct() {
						$dir = 'exercises/';
						$this->exes = $this->bubble_sort(scandir($dir), $this->decr);
					}

					public function update() {
						$dir = 'exercises/';
						$this->exes = $this->bubble_sort(scandir($dir), $this->decr);
					}

					public function bubble_sort($arr, $decr) {
						$pattern = '/\d+/';
						if($decr < count($arr)) {
							for($i = 0; $i < count($arr) - $decr; $i++) {
								preg_match($pattern, $arr[$i], $matches_1);
								preg_match($pattern, $arr[$i + 1], $matches_2);

								if($matches_1[0] > $matches_2[0]) {
									$tmp = $arr[$i];
									$arr[$i] = $arr[$i + 1];
									$arr[$i + 1] = $tmp;
								}
							}
							$decr++;
							return $this->bubble_sort($arr, $decr);
						} else {
							return $arr;
						}
					}
				}

				class ExercisesActions {
					public function exeLinksWriter(Exercises $exes) {
						for($i = 0; $i < count($exes->exes); $i++) {
							if($exes->exes[$i] != '.' && $exes->exes[$i] != '..') {
								echo "<a href=\" exercises/{$exes->exes[$i]} \" style = \"color: white\">Exe_{$exes->exes[$i]}</a><br>";
							}
						}
					}

					public function addExe($name, $folder, Exercises $exes) {
						if(!file_exists("exercises/$folder/{$name}.php")) {
							$file = fopen("exercises/$folder/{$name}.php", 'w');
							fwrite($file, "
<html>
	<head>
		<link rel=\"stylesheet\" href=\"../style.css\" >
	</head>
	<body>
		<?php
			
		?>
	</body>
</html>
								");
							fclose($file);
							$exes->update();
						}
					}

				}
				

				$_SESSION['exes'] = new Exercises();
				$_SESSION['exeActions'] = new ExercisesActions();



				if(isset($_GET['name']) && isset($_GET['folder'])) {
					$_SESSION['exeActions']->addExe($_GET['name'], $_GET['folder'], $_SESSION['exes']);
					unset($_GET['name'], $_GET['folder']);
				}


				$_SESSION['exeActions']->exeLinksWriter($_SESSION['exes']);
			?>
		</div>
		<form method="GET">
			<label><input type="text" name="name" />Name</label><br><br>
			<label><input type="text" name="folder" />Folder</label><br><br>
			<input type="submit" value="Add" />
		</form>
	</body>
</html>


