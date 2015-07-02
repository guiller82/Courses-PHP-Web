
<link rel="stylesheet" type="text/css" href="ddsmoothmenu.css" />
<link rel="stylesheet" type="text/css" href="ddsmoothmenu-v.css" />

<script type="text/javascript" src="jquery.min.js"></script>
<script type="text/javascript" src="ddsmoothmenu.js">

/***********************************************
* Smooth Navigational Menu- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
***********************************************/

</script>

<script type="text/javascript">

ddsmoothmenu.init({
	mainmenuid: "smoothmenu1", //menu DIV id
	orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
	classname: 'ddsmoothmenu', //class added to menu's outer DIV
	//customtheme: ["#1c5a80", "#18374a"],
	contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
})

ddsmoothmenu.init({
	mainmenuid: "smoothmenu2", //Menu DIV id
	orientation: 'v', //Horizontal or vertical menu: Set to "h" or "v"
	classname: 'ddsmoothmenu-v', //class added to menu's outer DIV
	//customtheme: ["#804000", "#482400"],
	contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
})

</script>

<div id="smoothmenu1" class="ddsmoothmenu">
<ul>

<li><a href="<?php echo MYURL ?>">Inicio</a></li>

  <li><a href="insider.php?seccion=nosotros">Nosotros</a>
<!--  
   <ul>
  <li><a href="#">Misión</a></li>
  <li><a href="#">Visión</a></li>
  <li><a href="#">Valores</a></li>
  </ul> -->
  
  </li>





<!-- <li><a href="#">Instituciones</a></li> 





<li><a href="#">Proyectos</a></li>



<li><a href="#">Actividades</a></li> 

<li><a href="#" target="_blank">Galería</a></li> -->


<li><a href="insider.php?seccion=contacto">Contacto</a></li>

<li><a href="rss.php">RSS Feed</a></li>


</ul>
<br style="clear: left" />
</div> 

