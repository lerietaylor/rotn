<?php
//mrkoolaid
//5:45 PM 5/1/2015

if(!$_GET['action'])
{
	$_GET['action'] = '';
} else {
	$action = filter_var($_GET['action'], FILTER_SANITIZE_STRING);
}

switch($action)
{
	default:
	break;

	case "claninfo";
		$id = filter_var($_GET['id'], FILTER_SANITIZE_STRING);
		$clan = getClanInfo($id);

		echo '	<table cellpadding="10" width="420">
			<tr valign="top">
				<td><img src="http://quakelive.com/'.$clan->avatar_url.'" /></td>
				<td>
					<h3 style="margin:0px;padding:0px;">'.$clan->name.'</h3>

					<table width="100%">
					<tr>
						<td>
							<b>Creator</b><br/>
							'.$clan->creator_name.'
						</td>
						<td>
							<b>Creation Date</b><br/>
							'.$clan->creation_time.'
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<b>Biography</b><br/>
							'.$clan->biography.'
						</td>
					</tr>
					</table>
				</td>
			</tr>
			</table>';
	break;
}

//ROTN id=181565
function getClanInfo($id)
{
	$data = file_get_contents('http://quakelive.com/clans/summary/'.$id);
	$r = '/pageData\s[=]\s([{].+?[}])/';
	preg_match($r, $data, $matches);

	$clan_info = json_decode(substr($matches[0], 18, strlen($matches[0])));

	return $clan_info;
}
?>