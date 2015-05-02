<!doctype html>
<html lang="en">
<head>
	<title>ROTN - Quick Clan Info</title>
	<script src="https://code.jquery.com/jquery-git2.min.js"></script>

	<script>
	$(document).ready(function()
	{
		console.log("ROTN: JQuery started");
	});

	function getClanInfo()
	{
		console.log("ROTN: getting clan info");

		var id = $("#clan_id").val();
		$.get("rotn.php?action=claninfo&id="+id, function(data)
		{
			console.log("ROTN: clan id = "+id);
			$("#claninfo").html(data);
		});
	}
	</script>
</head>

<body>
	<p>
		Enter a clan id: <input type="text" id="clan_id" placeholder="181565" value="181565" />
		<button onclick="getClanInfo()">Get Clan Info</button>
	</p>

	<p><div id="claninfo"></div></p>
</body>

</html>