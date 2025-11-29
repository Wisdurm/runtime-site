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
	<title>About</title>
</head>
<body>
	<table>
		<tr>
		<!-- Main -->
		<td class="main">
			<a href="/public/index.php"><img src="../images/runtime.svg"></a>
			<table class="navitem">
				<tr><td>
						Who?
				</td></tr>
				<tr><td>
					Runtime was created by me, Wisdurm. Some Finnish guy who had a lot of time and not a lot to do.
					I don't actually have much to write here, I just need something to fill all the empty space :D
				</td></tr>
			</table>
			<table class="navitem">
				<tr><td>
						What?
				</td></tr>
				<tr><td>
					<b>Runtime</b> is a questionably-evaluated, classless yet purely-object-oriented, interpreted programming language.
					What this means, is that everything is an object, <i> sort of </i>. You cannot create an int by itself, you must
					create an object, that contains an int. Even so, you can still reference the pure int, which is why I'm a bit
					hesitant to call this <em>truly</em> purely-object-oriented. But in the end it's really just semantics.<br>
					I would like to say that this is just an oversimplification, and that the documentation contains a more comprehensive,
					<b>true</b> explanation, but honestly this language isn't really that complex, and the previous description does do
					a good job of explaining it.
				</td></tr>
			</table>
			<table class="navitem">
				<tr><td>
						Why?
				</td></tr>
				<tr><td>
					As previously mentioned, I had a lot of freetime when I started working on this. Since then, I've been busy with other
					stuff, such as lying in bed and doing nothing, so the progress on this language has been inconsistent. The main reasons						I started working on this language were to do it just for fun, and also to serve as a learning experience, both in
					general, as well C++ specifically, which I hadn't really used much at the time. 
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
</body>
</html>
