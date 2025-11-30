<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="/css/style.css">
	<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
	<link rel="manifest" href="/site.webmanifest">
	<title>Reference</title>
</head>
<body>
	<table>
		<tr>
		<!-- Main -->
		<td class="main">
			<a href="/public/index.php"><img src="../images/runtime.svg"></a>
			<table class="navitem">
				<tr><td>
						Reference
				</td></tr>
				<tr><td>
					<p>
						This is a full reference of all objects in the standard libraries of Runtime
					</p>
				</td></tr>
			</table>
			<?php
			include "../src/ref.php";			
			?>
			<table class="navitem collapse">
				<tr><td>
						StandardLibrary
				</td></tr>
				<tr><td>
					<b>Objects</b>
					<div class="object">
						<strong>carg0-...</strong>
						<span class="version">v.0.10.0</span>
						<br>
						<p>
							Command line arguments:
							<ul>
								<li>carg0: always the Runtime executable.</li>
							</ul>
							<ul>
								<li>carg1: always the Runtime script being run.</li>
							</ul>
							<ul>
								<li>carg2...: the rest of the arguments supplied.</li>
							</ul>
						</p>
					</div>
					<br>
					<b>Functions</b>
					<?php 
						listData($stData)
					?>					
				</td></tr>
			</table>
			<table class="navitem collapse">
				<tr><td>
						StandardMath
				</td></tr>
				<tr><td>
					<b>Functions</b>
					<?php 
						listData($mtData)
					?>					
				</td></tr>
			</table>
			<table class="navitem collapse">
				<tr><td>
						StandardIO
				</td></tr>
				<tr><td>
					<b>Functions</b>
					<?php 
						listData($ioData)
					?>					
				</td></tr>
			</table>
		</td>
		<!-- Nav -->
		<?php include "../src/nav.php"; ?>
	</table>
	<div class="copyright">
		This page is licensed under the CC0-1.0 license. You are free to use the source code of this site however you want,
		even without any attribution. The source code is available at <a href="https://github.com/Wisdurm/runtime-site">my Github</a>
	</div>
	<script src="https://code.jquery.com/jquery-3.7.1.slim.min.js" integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script>
	<script src="../scripts/script.js"></script>
</body>
</html>
