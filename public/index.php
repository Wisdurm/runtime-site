<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="/css/style.css">
	<title>Index</title>
</head>
<body>
	<table>
		<tr>
		<!-- Main -->
		<td class="main">
			<a href="/public/index.php"><img src="../images/runtime.svg"></a>
			<table class="navitem">
				<tr><td>
						About
				</td></tr>
				<tr><td>
					<b>Runtime</b> is a questionably-evaluated, classless yet purely-object-oriented, interpreted programming language.
					<br>
					The language was developed as just a fun little project, made for fun and learning, rather than actually being functional.
					<br>
					Nontheless, I have made this site to serve as a hub for documentation related to Runtime, and also to pratice web development :P
				</td></tr>
			</table>
			<table class="navitem">
				<tr><td>
						News
				</td></tr>
				<tr><td>
					<dl>
						<?php
						include "../src/data.php";

						/* ACTUAL REQUEST
						$ch = curl_init("https://api.github.com/repos/wisdurm/Runtime/releases");
						curl_setopt($ch, CURLOPT_HTTPHEADER, [
							'Accept: application/vnd.github+json',
							'X-GitHub-Api-Version: 2022-11-28',
							'User-Agent: php-test-project'
						]);
						$data = curl_exec($ch);
						curl_close($ch);
						 */

						$obj = json_decode($data);
						foreach ($obj as $ob){
							echo "<dt>";
							echo "<a href='" . $ob->html_url . "'> Runtime " . $ob->tag_name . "</a> released";
							echo "<small> [" . date('Y-m-d',strtotime($ob->created_at)) ."]</small>";
							echo "</dt>";
							echo "<dd>" . $ob->body . "</dd>";
						}

						?>
						</dl>
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
