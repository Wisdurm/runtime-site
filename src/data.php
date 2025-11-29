<?php
$cachefile = "../cache/data.cache";
$cachetime = 21600; // time to cache in seconds: 6 hours

// Cached data
if (file_exists($cachefile) && time() - $cachetime <= filemtime($cachefile)) {
	$data = @file_get_contents($cachefile);
} else {
	unlink($cachefile); // Delete old file I guess
	// ACTUAL REQUEST
	$ch = curl_init("https://api.github.com/repos/wisdurm/Runtime/releases");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // bruhhhhhhhhhhhhhhhhhhhhhhhhhhh
	curl_setopt($ch, CURLOPT_HTTPHEADER, [
		'Accept: application/vnd.github+json',
		'X-GitHub-Api-Version: 2022-11-28',
		'User-Agent: runtime-site'
	]);
	$data = curl_exec($ch);
	curl_close($ch);
	// Cache data
	file_put_contents($cachefile, $data);
}
?>
