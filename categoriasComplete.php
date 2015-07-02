<script type="text/javascript" src="js/bsn.AutoSuggest_c_2.0.js"></script>
<link rel="stylesheet" href="css/autosuggest_inquisitor.css" type="text/css" media="screen" charset="utf-8" />
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">


<link href="style.css" rel="stylesheet" type="text/css" />
<input name="categoria" style="width:190px" type="text" class="Selectors" id="testinput" value="Categoría" onClick="this.value=''" />

<script type="text/javascript">
	var options = {
		script:"autoComplete.php?json=true&",
		varname:"input",
		json:true,
		callback: function (obj) { document.getElementById('testid').value = obj.id; }
	};
	var as_json = new AutoSuggest('testinput', options);
	
	
/*	var options_xml = {
		script:"test.php?",
		varname:"input"
	};
	var as_xml = new AutoSuggest('testinput_xml', options_xml); */
</script>