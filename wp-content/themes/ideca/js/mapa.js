        window.onload = function(){
		var options = {
			zoom: 16
			, center: new google.maps.LatLng(-15.826342,-70.029438)
			, mapTypeId: google.maps.MapTypeId.ROADMAP
		};

		var map = new google.maps.Map(document.getElementById('mapa'), options);
//-15.826342, -70.029438
		var markers = {
			'1':{'lat':'-15.825650','lon':'-70.029454','titulo':'IDECA', 'contenido':'<div style="height:130px; width:280px"><h3>IDECA<p class="subti">Instituto de Estudios de las Culturas Andinas</p></h3><strong>DIRECCIÓN: Jr. Miguel de Cervantes Nº 125.<br>E-MAIL: ideca.emaus@gmail.com<br>idecaperu@gmail.com<br>TELEFONO: (+51) 51 205547</div>','icon':'http:///gruposistemas.org/ideca/wp-content/themes/pjs/image/icons/mapa.png'}
		};


		var popup;
		var marker = new Array();

		for(var i in markers){
			//alert(markers[mark].titulo);
			marker[i] = new google.maps.Marker({
				position: new google.maps.LatLng(markers[i].lat, markers[i].lon)
				, map: map
				, title: markers[i].titulo
				, icon: markers[i].icon
				//, cursor: 'default'
				//, draggable: true
				, contenido : markers[i].contenido
			});

			google.maps.event.addListener(marker[i], 'click', function(){
				//alert('hi' + this.title);
				if(!popup){
					popup = new google.maps.InfoWindow();
				}
				//var note = 'hi' + i;
				popup.setContent(/*markers[i].contenido*/this.contenido);
				popup.open(map, this);
			});
		}
		
		popup = new google.maps.InfoWindow();
		popup.setContent(marker[1].contenido);
		popup.open(map, marker[1]);
		/*
		var popup_inicial = new google.maps.InfoWindow({
			content:markers[1].contenido
			,position:map.getCenter()
		});
		*/
	   /*
		var popup2 = new google.maps.InfoWindow({
			content:markers[1].contenido
			,position:map.getCenter()
		});
		popup2.open(map);
		*/
		////, markers['1']);
		//google.maps.event.trigger(marker[1], 'click');
		//markers[1].openInfoWindow();
		
		//google.maps.event.addDomListener(window, 'load', initialize);
		
	};	
	
	function initialize(){
		google.maps.event.trigger(markers['1'], 'click');
	}
