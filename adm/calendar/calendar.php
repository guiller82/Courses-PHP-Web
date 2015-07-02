<script type='text/javascript' src='calendar/utils/zapatec.js'></script>
<script type="text/javascript" src="calendar/src/calendar.js"></script>
<script type="text/javascript" src="calendar/lang/calendar-en.js"></script>

<style type="text/css">
		body {
			width: 778px;
		}
¿</style>
<link href="calendar/themes/aqua.css" rel="stylesheet" type="text/css">
	
</head>
<body>

<b>Fecha:</b>
<input type="text" name="date1" id="sel1" size="30" >
<input type="reset" value=" ... " id='button1'>
		<script type="text/javascript">
		var cal = new Zapatec.Calendar.setup({
		
		inputField:"sel1",
	//	ifFormat:"%Y-%m-%d [%W] ",
		ifFormat:"%Y-%m-%d",
		button:"button1",
		showsTime:false

		});		
	</script>


</body>
</html>