

<?php
	$db = db::connect();
?>
 <link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css"
   integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
   crossorigin=""/> 
 <script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js"
   integrity="sha512-GffPMF3RvMeYyc1LWMHtK8EbPv0iNZ8/oTtHPx9/cc2ILxQ+u905qIwdpULaqDkyBKgOaB57QTMg7ztg8Jm2Og=="
   crossorigin=""></script> 

<!-- MARKER CLUSTER -->
<!--    <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.css"   crossorigin=""/>
   <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.Default.css"   crossorigin=""/>
   <script src="https://unpkg.com/leaflet.markercluster@1.4.1/dist/leaflet.markercluster.js"  crossorigin=""></script> -->



<!-- FULL SCREEN PLUGIN -->
<script src='https://api.mapbox.com/mapbox.js/plugins/leaflet-fullscreen/v1.0.1/Leaflet.fullscreen.min.js'></script>

<link href='https://api.mapbox.com/mapbox.js/plugins/leaflet-fullscreen/v1.0.1/leaflet.fullscreen.css' rel='stylesheet' />



<!-- PLUGIN DIBUJAR MAPA -->
<!-- <link href='https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/0.2.3/leaflet.draw.css' rel='stylesheet' />
 <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/0.2.3/leaflet.draw.js"></script>  -->

<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
<!-- <script  async defer type="text/javascript" 	src="https://maps.google.com/maps/api/js?sensor=false&key=AIzaSyCNcYR6WpUvPNgEWC2uu9j3B2I0ePgKOGE"></script>
<script type="text/javascript" src="<?php echo URL; ?>dist/js/googlemaps.js"></script> -->


<style type="text/css" media="screen">
	.icono_camaras{
		color:#f00;
	}
	.icono_datos{
		color:#000;
	}
	.cuadrado{
		height: 80px;
		width: 80px;
	}	

	.boton{
		height: 80px;
	}
	.seleccionado{
		border: 5px solid #000;
	}
</style>

<div class="row" id="panel1">
	<div class="col-lg-12">
		<h1>Carga de luminarias</h1>
	</div>
</div>
<div class="row">
	<div class="col-md-6">
	<!-- 	<div class="panel panel-default panel-filtros">
		  	<div class="panel-heading">Maximo de marcadores <input type="number" id="cantidad_maxima" value="1" class="pull-right"> </div>
		</div> -->
		<div class="form-group grupo-filtros" id="localidad">
					<label for="inplocalidad">Busca por localidad</label>
					<select name="inplocalidad" id="inplocalidad"  class="form-control ">
						<option value="">Seleccione una localidad</option>';
						<?php $db->llenarlista('pklocalidad','detalle','gis.localidad '); ?>						
					</select>
					<br>
						<label for="inplocalidad">Busca por Poste</label>
					<select name="inpposte" id="inpposte"  class="form-control ">
							<option value="" selected>Seleccione una Poste</option>';
							 <option value="HIERRO GALVANIZADA NUEVA">HIERRO GALVANIZADA NUEVA</option>
						 	 <option value="HIERRO VIEJA" >HIERRO VIEJA</option>
						  	<option value="MADERA">MADERA</option>	
						  	<option value="HORMIGON">HORMIGON</option>					
					</select>
					<br>
						<label for="inppotencia">Busca por Potencia</label>
					<select name="inppotencia" id="inppotencia"  class="form-control ">
							<option value="" selected>Seleccione una Potencia</option>';
							 <option value="180">180W</option>
						 	 <option value="120" >120W</option>
						  	<option value="60">60W</option>	
						  	<option value="Reflector">REFLECTOR</option>					
					</select>
					<br>
						<div class="col-lg-12">
		  		<button type="button" class="btn btn-primary btn-block pull-right" id="btnbuscar">Buscar</button>
		  	</div>
				</div>
				<br><br>
		<div class="panel panel-default panel-filtros">
		  	<div class="panel-heading">Seleccion de caracteristicas</div>
		  	<div class="panel-body">
		  		<p>POSTE</p>
		  		<div class="col-md-12">
		  			<button type="button" tecla="q" soporte="HIERRO GALVANIZADA NUEVA" class="control btn btn-danger boton seleccionado">
                    <span class="glyphicon glyphicon-align-left"></span>
		  			HIERRO GALVANIZADA NUEVA</button>
		  			<button type="button" tecla="w" soporte="HIERRO VIEJA" class="control btn btn-info boton">HIERRO VIEJA</button>
		  			<button type="button" tecla="e" soporte="MADERA" class="control btn btn-warning boton">MADERA</button>
		  			<button type="button" tecla="r" soporte="HORMIGON" class="control btn btn-dark boton">HORMIGON</button>
				</div>
				<p>POTENCIA</p>
		  		<div class="col-md-12">
		  			<button type="button" potencia = "180" class="potencia btn btn-primary cuadrado seleccionado" style="background: #bb4545!important; ">180w</button> 
		  			<button type="button" potencia = "120" class="potencia btn btn-primary cuadrado" style="background: #0905fc; ">120w</button> 

		  			<button type="button" potencia = "60" class="potencia btn btn-primary cuadrado" style="background: #68a01e; ">60w</button> 

		  			<button type="button" potencia = "1000" class="potencia btn btn-primary cuadrado" style="background: #ef5adc; ">Reflector</button> 

		  		</div>
			</div>
		</div>
			<div class="panel panel-default panel-filtros">
		  	<div class="panel-heading">Puntos Marcados <button type="button" id="guardarTodo" class="btn btn-primary pull-right" style="margin: 0">GUARDAR</button></div>
		  	<div class="panel-body" id="marcadores-texto">
				No hay ningun marcador nuevo
			</div>
		</div>
	

	</div>

	<div class="col-md-6" id="panelmapa">
	<div class="panel panel-default panel-filtros">
  		<div class="panel-body">
<!-- 	  			<div class="col-md-12" id="panel3">
  				<button type="button" class="btn btn-primary btn-block pull-right" id="imprimir_mapa">Imprimir</button>
			</div> 
			<hr>-->
			 <div class="col-md-12" id="contenedor-mapa">
				<div id="map" style="width: 100%;float:left; height: 700px;"></div>
          	</div>
			</div>
		</div>
	</div>


</div>

</div>
  <link 
        rel="stylesheet" 
        href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.css"
    />
<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet"> 


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script
        src="http://cdn.leafletjs.com/leaflet-0.7/leaflet.js">
    </script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.js">
    </script>

<script>

	var mymap=null;
	var markers=[];
	var markersFijos=[];
	var printPlugin=null ;
	var poly = null;
	var cont=0;
	
	function iniciarMapa(bound=[-36.800014, -56.363516],zoom=9){
		$("#contenedor-mapa").html('<div id="map" style="width: 100%;float:left; height: 700px;"></div>');

		poly = null;
		lastmks = []; 

		mymap = L.map('map',{fullscreenControl:true}).setView(bound, zoom);


		mymap.on('click', handleClick);

		L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
	        attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
	    }).addTo(mymap);
            
        var LeafIcon = L.Icon.extend({
			options: {
				shadowUrl: 
				    'http://leafletjs.com/docs/images/leaf-shadow.png',
				iconSize:     [38, 95],
				shadowSize:   [50, 64],
				iconAnchor:   [22, 94],
				shadowAnchor: [4, 62],
				popupAnchor:  [-3, -76]
			}
		});

		var greenIcon = new LeafIcon({
			iconUrl: 'http://leafletjs.com/docs/images/leaf-green.png'
			});

		var drawnItems = new L.FeatureGroup();
		mymap.addLayer(drawnItems);

		var drawControl = new L.Control.Draw({
			position: 'topright',
			draw: {
				polygon: {
					shapeOptions: {
						color: 'purple'
					},
					allowIntersection: false,
					drawError: {
						color: 'orange',
						timeout: 1000
					},
					showArea: true,
					metric: true,
					repeatMode: true
				},
				polyline: {
					shapeOptions: {
						color: 'red'
					},
				},
				rect: {
					shapeOptions: {
						color: 'green'
					},
                 
					showArea: true,
					metric: true,
					repeatMode: true
				},
				circle: {
					shapeOptions: {
						color: 'steelblue'
					},
				},
				marker: {
					icon: greenIcon
				},
			},
			edit: {
				featureGroup: drawnItems
			}
		});
		// mymap.addControl(drawControl);

		// mymap.on('draw:created', function (e) {
		// 	var type = e.layerType,
		// 		layer = e.layer;

		// 	if (type === 'marker') {
		// 		layer.bindPopup('A popup!');
		// 	}

		// 	drawnItems.addLayer(layer);
		// 	console.log(layer._latlngs
		// 	)
		// });    



	}

	$("#cantidad_maxima").on('change', function(event) {
		event.preventDefault();
		traerMarcadores();
	});
	function ponerTodosLosMarcadores(){

		iniciarMapa(mymap.getCenter(),mymap.getZoom());
		markers.map(function(marker, i) {
			// console.log(location);

				// var mk = L.marker(marker.latLng /*,{ icon: icon }*/)
				var color = "";
				var colorContorno="";
						switch (marker.potencia) {
					case "180":
						    color = "#bb4545";
							if(marker.soporte=="HIERRO VIEJA"){
							
							colorContorno="#4ca5b5";
						}else if(marker.soporte=="HIERRO GALVANIZADA NUEVA"){
						
							colorContorno="#b5584c";
						}else if(marker.soporte=="MADERA"){
							
							colorContorno="#e0b84a";
						}else if(marker.soporte=="HORMIGON"){
							
							colorContorno="#21201e";
						}

					break;
					case "120":
						color = "#0905fc";
						if(marker.soporte=="HIERRO VIEJA"){
							
							colorContorno="#4ca5b5";
						}else if(marker.soporte=="HIERRO GALVANIZADA NUEVA"){
							
							colorContorno="#b5584c";
						}else if(marker.soporte=="MADERA"){
							
							colorContorno="#e0b84a";
						}else if(marker.soporte=="HORMIGON"){
							
							colorContorno="#21201e";
						}
						
					break;
					case "60":
						    color = "#68a01e";
							if(marker.soporte=="HIERRO VIEJA"){
							
							colorContorno="#4ca5b5";
						}else if(marker.soporte=="HIERRO GALVANIZADA NUEVA"){
							
							colorContorno="#b5584c";
						}else if(marker.soporte=="MADERA"){
							
							colorContorno="#e0b84a";
						}else if(marker.soporte=="HORMIGON"){
						
							colorContorno="#21201e";
						}
						
					break;
					case "1000":
						color = "#ef5adc";
							if(marker.soporte=="HIERRO VIEJA"){
							
							colorContorno="#4ca5b5";
						}else if(marker.soporte=="HIERRO GALVANIZADA NUEVA"){
							
							colorContorno="#b5584c";
						}else if(marker.soporte=="MADERA"){
							
							colorContorno="#e0b84a";
						}else if(marker.soporte=="HORMIGON"){
						
							colorContorno="#21201e";
						}
					break;
				}

				var mk = L.circleMarker(marker.latLng, {
									radius: 8.0,
									fillColor: color,
									color: colorContorno,
									weight: 2,
									opacity: 1.0,
									fillOpacity: 1.0,

									
								})

				mk.bindPopup(`
					<p><strong style="font-weight:bold">SOPORTE:${marker.soporte}</strong></p>
					<p><strong style="font-weight:bold">POTENCIA:${ (marker.potencia == 1000)? "reflector":marker.potencia }</strong></p>
                
					`);

			 	mk.addTo(mymap);
          	return 0;
        });		
		ponerLosMarcadoresFijos();
	}	

	function ponerLosMarcadoresFijos(){

		  for (var i = 0; i < markersFijos.length; i++) {
					//console.log(markersFijos[i]);				   
				};
	        console.log(markersFijos[cont].fklocalidad);
		markersFijos.map(function(marker, i) {
			 //console.log(marker.pkluminaria + '  es el pkluminaria');
            //  console.log('ponerLosMarcadoresFijos   '+ markersFijos.lng);
				var color = "";
				var colorContorno="";
				switch (marker.potencia) {
					case "180":
						    color = "#bb4545";
							if(marker.soporte=="HIERRO VIEJA"){
							
							colorContorno="#4ca5b5";
						}else if(marker.soporte=="HIERRO GALVANIZADA NUEVA"){
						
							colorContorno="#b5584c";
						}else if(marker.soporte=="MADERA"){
							
							colorContorno="#e0b84a";
						}else if(marker.soporte=="HORMIGON"){
							
							colorContorno="#21201e";
						}

					break;
					case "120":
						color = "#0905fc";
						if(marker.soporte=="HIERRO VIEJA"){
							
							colorContorno="#4ca5b5";
						}else if(marker.soporte=="HIERRO GALVANIZADA NUEVA"){
							
							colorContorno="#b5584c";
						}else if(marker.soporte=="MADERA"){
							
							colorContorno="#e0b84a";
						}else if(marker.soporte=="HORMIGON"){
							
							colorContorno="#21201e";
						}
						
					break;
					case "60":
						    color = "#68a01e";
							if(marker.soporte=="HIERRO VIEJA"){
							
							colorContorno="#4ca5b5";
						}else if(marker.soporte=="HIERRO GALVANIZADA NUEVA"){
							
							colorContorno="#b5584c";
						}else if(marker.soporte=="MADERA"){
							
							colorContorno="#e0b84a";
						}else if(marker.soporte=="HORMIGON"){
						
							colorContorno="#21201e";
						}
						
					break;
					case "1000":
						color = "#ef5adc";
							if(marker.soporte=="HIERRO VIEJA"){
							
							colorContorno="#4ca5b5";
						}else if(marker.soporte=="HIERRO GALVANIZADA NUEVA"){
							
							colorContorno="#b5584c";
						}else if(marker.soporte=="MADERA"){
							
							colorContorno="#e0b84a";
						}else if(marker.soporte=="HORMIGON"){
						
							colorContorno="#21201e";
						}
					break;
				}

				var mk = L.circleMarker(marker.latLng, {
									radius: 8.0,
									fillColor: color,
									color: colorContorno,
									weight: 6,
									opacity: 1.0,
									fillOpacity: 1.0,
									
								})

				mk.bindPopup(`
					<p><strong style="font-weight:bold">SOPORTE:${marker.soporte}</strong></p>
					<p><strong style="font-weight:bold">POTENCIA:${ (marker.potencia == 1000)? "reflector":marker.potencia }</strong></p>
                    <button type="button" id="boton-eliminar" class="btn btn-danger eliminar" title="Eliminar"
                     data-id=${marker.pkluminaria}>Eliminar  
										</button>
					`);

			 	mk.addTo(mymap);
          	return 0;
        });	

        cont ++;	

	}	

	function ponerMarcador(marker){
		var color = "";
		var colorContorno="";
					switch (marker.potencia) {
					case "180":
						    color = "#bb4545";
							if(marker.soporte=="HIERRO VIEJA"){
							
							colorContorno="#4ca5b5";
						}else if(marker.soporte=="HIERRO GALVANIZADA NUEVA"){
						
							colorContorno="#b5584c";
						}else if(marker.soporte=="MADERA"){
							
							colorContorno="#e0b84a";
						}else if(marker.soporte=="HORMIGON"){
							
							colorContorno="#21201e";
						}

					break;
					case "120":
						color = "#0905fc";
						if(marker.soporte=="HIERRO VIEJA"){
							
							colorContorno="#4ca5b5";
						}else if(marker.soporte=="HIERRO GALVANIZADA NUEVA"){
							
							colorContorno="#b5584c";
						}else if(marker.soporte=="MADERA"){
							
							colorContorno="#e0b84a";
						}else if(marker.soporte=="HORMIGON"){
							
							colorContorno="#21201e";
						}
						
					break;
					case "60":
						    color = "#68a01e";
							if(marker.soporte=="HIERRO VIEJA"){
							
							colorContorno="#4ca5b5";
						}else if(marker.soporte=="HIERRO GALVANIZADA NUEVA"){
							
							colorContorno="#b5584c";
						}else if(marker.soporte=="MADERA"){
							
							colorContorno="#e0b84a";
						}else if(marker.soporte=="HORMIGON"){
						
							colorContorno="#21201e";
						}
						
					break;
					case "1000":
						color = "#ef5adc";
							if(marker.soporte=="HIERRO VIEJA"){
							
							colorContorno="#4ca5b5";
						}else if(marker.soporte=="HIERRO GALVANIZADA NUEVA"){
							
							colorContorno="#b5584c";
						}else if(marker.soporte=="MADERA"){
							
							colorContorno="#e0b84a";
						}else if(marker.soporte=="HORMIGON"){
						
							colorContorno="#21201e";
						}
					break;
				}


		var mk = L.circleMarker(marker.latLng, {
									radius: 8.0,
									fillColor: color,
									color: colorContorno,
									weight: 2,
									opacity: 1.0,
									fillOpacity: 1.0,
									
								})

		mk.bindPopup(`
			<p><strong style="font-weight:bold">SOPORTE:${marker.soporte}</strong></p>
			<p><strong style="font-weight:bold">POTENCIA:${ (marker.potencia == 1000)? "reflector":marker.potencia }</strong></p>	`);

	 	mk.addTo(mymap);

	}

function handleClick(e){
	let marker = {potencia:$(".potencia.seleccionado").attr("potencia"),soporte:$(".control.seleccionado").attr("soporte"),latLng:e.latlng}
	markers.push(marker);
	ponerMarcador(marker);

	listarMarcadores();

}
function listarMarcadores(){
	$("#marcadores-texto").html("");
	let txt = "background: #b6ead9;";
	 markers.map(function(elem, index) {

	 	$("#marcadores-texto").prepend(`<div style="height:36px;${(index==markers.length-1)?txt:''}"> ${elem.soporte},  ${ (elem.potencia == 1000)? "reflector":elem.potencia+"w" }  <button type="button" data-index="${index}" class="btn btn-default pull-right eliminarMarcador" data-icon="" title="Eliminar"></button></div>`);
 	 })
}
function traerMarcadores(){

	$.post('modulos/modulo_luminarias2.mod', {consulta: 'traerMarcadores',maximo:$("#cantidad_maxima").val()}, function(data, textStatus, xhr) {
		data = JSON.parse(data);
		//console.log(data);


		data.map((el,index)=>{
		    el.latLng = {lat:el.lat,lng:el.lng};
		    return el;
		})

         
		markersFijos = data;

		ponerTodosLosMarcadores();
	});

}

//////////////////
function traerMarcadoresPorLoc(pkloc){

       console.log("volvi"+pkloc);
	  

	
	$.post('modulos/modulo_luminarias2.mod', {consulta: 'traerMarcadoresPorLoc',pkloc:pkloc}, function(data, textStatus, xhr) {
		data = JSON.parse(data);
		console.log(data);
		
		console.log("asd"+data);
		data.map((el,index)=>{
		    el.latLng = {lat:el.lat,lng:el.lng};
		    return el;
		})
       
         
		markersFijos = data;

		console.log(data);


		ponerLosMarcadoresFijos(markersFijos);
	});
            
}
//////////////////
function  traerCoordenadasPorLocPostePoten(pkloc,tipoposte,tipopotencia){

//	alert(pkloc+tipoposte+tipopotencia);
	$.post('modulos/modulo_luminarias2.mod', {consulta: 'traerCoordenadasPorLocPostePoten',pkloc:pkloc,tpost:tipoposte,tpot:tipopotencia}, function(data, textStatus, xhr) {
		data = JSON.parse(data);
		
		data.map((el,index)=>{
		    el.latLng = {lat:el.lat,lng:el.lng};
		    return el;
		})
       
         
		markersFijos = data;

		


		ponerLosMarcadoresFijos(markersFijos);
	});
}

//////////////////////

$(document).ready(function(){
		iniciarMapa();
	//	traerMarcadores();
	$('#inplocalidad').focus();


////////////////////}
		$('#btnbuscar').on('click', function(event) {

			var localidad = $("#inplocalidad").val();
			var poste = $("#inpposte").val();
			var potencia = $("#inppotencia").val();

			 if(localidad != ''&& poste!='' && potencia !='')
              {
              	
                  traerCoordenadasPorLocPostePoten(localidad,poste,potencia);
              }else if(localidad != ''){	

			 		traerMarcadoresPorLoc(localidad);	
			
				
			}else{
				// $().alertBox({msg:'Debe completar la busqueda'});
				alert('no entra');
			}
		});
		
		$(document).on('click', '.control', function(event) {
			event.preventDefault();
			$(".control").removeClass('seleccionado');
			$(this).addClass('seleccionado');
		});

		$(document).on('click', '.potencia', function(event) {
			event.preventDefault();
			$(".potencia").removeClass('seleccionado');
			$(this).addClass('seleccionado');
		});

		$(document).on('click', '.eliminarMarcador', function(event) {
			event.preventDefault();
			markers.splice($(this).attr("data-index"), 1);
			ponerTodosLosMarcadores();
			listarMarcadores();
		});		

		$(document).on('click', '#guardarTodo', function(event) {

			markers.map(function(elem, index) {
					elem.latLng = {lat:elem.latLng.lat,lng:elem.latLng.lng};
				return elem;
			})
			
			$.post('modulos/modulo_luminarias2.mod', {consulta: 'insertMarcadores',marcadores:markers}, function(data, textStatus, xhr) {
				console.log(data);
				data = JSON.parse(data);
				if(data.estado){
					alert("Guardados con exito");
					markers = [];
				//	traerMarcadores();
					listarMarcadores();
				}else{
					alert("Ocurrio un error al guardar, contacta un administrador");
				}

			});
		});

		$(document).on('click', '#boton-eliminar', function(event) {
			var pk = $(this).attr("data-id");
				Swal.fire({
					  title: 'Deseas eliminar este marcador?',
					  showCancelButton: true, 
					  confirmButtonText: 'Eliminar',
					  showLoaderOnConfirm: true,
					  preConfirm: () => {
					    	return new Promise((resolve)=>{ 
					resolve(resolve);
				$.post('modulos/modulo_luminarias2.mod', {
			  		consulta: 'EliminarMarcador',
			  		pk : pk
			  	}, function(data, textStatus, xhr) {
			  		console.log(data);
					if(data==1){
						Swal.fire({
				 			title:"eliminado con exito",
				 			type: "success"
				 		 });
					}else{
							Swal.fire({
				 			title:"error al eliminar",
				 			type: "error"
				 		 });
					}
			 	
			 	    traerMarcadores();
					listarMarcadores();

			 	});
					   			
							});
					  },
					  allowOutsideClick: () => !Swal.isLoading()

					});	 
		});

		$(document).on('keypress' ,function(event) {
			$(".control").removeClass('seleccionado');
			// console.log(event.key);
			$("[tecla="+event.key+"]").addClass('seleccionado');
		});

		var estado_vacias = true;

		var listamarker = new Array();

});
	
</script>




<?php
	include('../../../includes/funciones.php');
	$opciones = $_POST['consulta'];
    $nada='88255';
	switch ($opciones) {
		case 'insertMarcadores':
			$db = db::connect();
			$consulta = "INSERT INTO gis.LUMINARIAS_2 (potencia,soporte,lat,lng) VALUES (%s,'%s',%s,%s)";
			$estado = true;
			foreach ($_POST["marcadores"] as $key => $marcador) {
				$db->execute($consulta,array($marcador["potencia"],$marcador["soporte"],$marcador["latLng"]["lat"],$marcador["latLng"]["lng"]));
				$estado = $estado && $db->estado();
				if(!$db->estado()){
					break;
				}
			}

			echo json_encode(array("estado"=>$estado,"error"=>mysql_error()));

		break;

		case 'traerMarcadores':
			$db = db::connect();
			$max = intval($_POST["maximo"]);
			$where = ($max!="") ? 'LIMIT '.$max : "";
			$consulta = "SELECT * FROM gis.LUMINARIAS_2 WHERE eliminado = 0 ORDER BY pkluminaria DESC ".$where ;
			$db->execute($consulta);
			echo json_encode($db->fetch_array());
		break;
		case 'traerMarcadoresPorLoc':
			$db = db::connect();
			$db1 = db::connect();
			$pkloc = intval($_POST["pkloc"]);


			/////////////////////////
			$consulta = "SELECT * FROM `general`.`localidades_poligonos` AS pol WHERE pol.fklocalidad=".$pkloc ;
			$db->execute($consulta);

			/////////////////////
			
			// $consulta1 = "SELECT * FROM general.`localidades_poligonos` AS loc INNER JOIN gis.LUMINARIAS_2  AS lumi
   //           ON loc.latitud  <= lumi.lat AND loc.longitud <= lumi.lng WHERE loc.fklocalidad= ".$pkloc ;
			// $db1->execute($consulta1);
   //          $aux=$db1->fetch_array();


			/////////////////////////

			 $consulta1 = "SELECT * FROM gis.LUMINARIAS_2 " ;
			 $db1->execute($consulta1);
			 $resultado1=$db1->fetch_array();
			 $r=$db->fetch_array();
             $cont=0;

            foreach ($resultado1 as $key) {
					if ($r[0]["latitud"] > $key['lat'] && $r[0]["longitud"] < $key['lng'] &&
					$r[1]["latitud"] > $key['lat'] && $r[1]["longitud"] > $key['lng'] &&
					$r[2]["latitud"] < $key['lat'] && $r[2]["longitud"] > $key['lng']) {

						$aux[$cont]=$key;

						$cont++;

					}
			}
 
			

			/////////////////////////



	 		             
			
			echo json_encode($aux);
		break;
		case 'traerCoordenadasPorLocPostePoten':
			$db = db::connect();
			$db1 = db::connect();
			$pkloc = $_POST["pkloc"];
			$tpost = $_POST["tpost"];
			$tpot = $_POST["tpot"];


			$consulta = "SELECT * FROM `general`.`localidades_poligonos` AS pol WHERE pol.fklocalidad=".$pkloc ;
			$db->execute($consulta);


			 $consulta1 = "SELECT * FROM  gis.LUMINARIAS_2  AS lumi
             WHERE  lumi.potencia='".$tpot."' AND lumi.soporte='".$tpost."' ";
			 $db1->execute($consulta1);
			 $resultado1=$db1->fetch_array();
			 $r=$db->fetch_array();
             $cont=0;

            foreach ($resultado1 as $key) {
					if ($r[0]["latitud"] > $key['lat'] && $r[0]["longitud"] < $key['lng'] &&
					$r[1]["latitud"] > $key['lat'] && $r[1]["longitud"] > $key['lng'] &&
					$r[2]["latitud"] < $key['lat'] && $r[2]["longitud"] > $key['lng']) {

						$aux[$cont]=$key;

						$cont++;

					}
			}
 
			

		echo json_encode($aux);
			//echo $pkloc;
		break;


		case 'EliminarMarcador':
		    $db = db::connect();
			$pk = $_POST["pk"];
			$consulta = "UPDATE gis.LUMINARIAS_2  SET  
						`eliminado` =  %s
					  WHERE  `pkluminaria` = %s";
			$data = array(1,$pk);
			
			$db->execute($consulta,$data);

			echo $db->estado();
		break;
	
	}
?>


