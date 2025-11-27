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
	<title>Installation</title>
</head>
<body>
	<table>
		<tr>
		<!-- Main -->
		<td class="main">
			<a href="/public/index.php"><img src="../images/runtime.svg"></a>
			<table class="navitem">
				<tr><td>
						Installation
				</td></tr>
				<tr><td>
					<strong>
							Runtime is currently in pre-release, which means any code you write is not quaranteed to work in later versions.
					</strong><br>
					You can download the latest version of Runtime here:
					<ul>
						<?php
						// Get data
						include "../src/data.php";
						$obj = json_decode($data);
						// Map github file types to human readable (pretty) names
						$r_names = [
							"application/vnd.debian.binary-package" => "Debian package (deb)",
							"application/gzip" => "Linux (tar-gz)",
							"application/x-compress" => "Linux (tar-Z)",
						];
						// Get download links from newest release
						foreach ($obj[0]->assets as $asset) {
							$link = $asset->browser_download_url;
							echo "<li>";
							echo "<a href='" . $link . "'>" . $r_names[$asset->content_type] . "</a>";
							echo "</li>";
						}
					?>
					</ul>
					As it is a relatively simple project, Runtime requires no dependencies. <br>
					After installation is complete, you should start looking at <a href="getting_started.php">getting started</a>.
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
