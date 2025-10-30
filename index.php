<?php
include "data.php";

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
	echo "<p>";
	echo "<a href='" . $ob->html_url . "'> Runtime " . $ob->tag_name . "</a> released";
	echo "<small> [" . date('Y-m-d',strtotime($ob->created_at)) ."]</small>";
	echo "</p>";
	echo "<small>" . $ob->body . "</small>";
}

?>
