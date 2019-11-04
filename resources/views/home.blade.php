@extends('adminlte::page')
{{-- CSS para interação com maps --}}
 <link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css"
   integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
   crossorigin=""/>

 <!-- Make sure you put this AFTER Leaflet's CSS -->
 <script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js"
   integrity="sha512-GffPMF3RvMeYyc1LWMHtK8EbPv0iNZ8/oTtHPx9/cc2ILxQ+u905qIwdpULaqDkyBKgOaB57QTMg7ztg8Jm2Og=="
   crossorigin=""></script>


   <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    

{{-- css maps --}}
@mapstyles

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Mapa</h1>
@stop

@section('content')


{{-- Inicio div map --}}
<div id="mapid">
    @map([
        'lat' => '-22.4269',
        'lng' => '-45.453',
        'zoom' => '13',
            // 'markers' => [[
            //     'title' => 'Go NoWare',
            //     'lat' => '-22.417218',
            //     'lng' => '-45.47224',
            // ]],

    ])
{{-- Fim div map --}}

</div>

<script>
    // Inicio para scripts para o map funcionar    
    var mymap = L.map('mapid').setView([-22.4269, -45.453], 13);
    //adiciona marcador ao mapa
    var marker = L.marker([-22.42055, -45.437222]).addTo(mymap);

    L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
	attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
	maxZoom: 18,
	id: 'mapbox.streets',
	accessToken: 'your.mapbox.access.token'

}).addTo(mymap);

var popup = L.popup();

function onMapClick(e) {
    popup
        .setLatLng(e.latlng)
        .setContent("You clicked the map at " + e.latlng.toString())
        .openOn(mymap);
    teste = e.latlng.toString().split(",")
    latString = teste[0].toString().split("(");
    lngString = teste[1].toString().split(")");
    lon = lngString[0]; 
    lat = latString[1];    

    var latlon = JSON.stringify({
        lat:lat,
        lon:lon
        });

    saveLatLon(latlon);

}
mymap.on('click', onMapClick);

function saveLatLon(pos) {
  $.post('/home', {'_token':'{{csrf_token()}}', pos},function(data) {
    console.log(data.pos); // aqui voce trata data como quiser
  });
}
// Fim para scripts para o map funcionar    


function getDados(){
    console.log("teste"); // aqui voce trata data como quiser
    // $("button").click(function(){
    $.get('/modal', function(data){
    alert("Data: " + data);
//   });
    });
 
}

</script>    


<div id="Container">
    <h1>Agenda de Contatos utilizando AJAX</h1>
    <hr/>

    <h2>Pesquisar Contato:</h2>
    <div id="Pesquisar">
        <input type="button" name="btnPesquisar" value="Pesquisar" onclick="getDados();"/>
    </div>
    <hr/>

    <h2>Resultados da pesquisa:</h2>
    <div id="Resultado"></div>
    <hr>

</div>


{{-- scrips maps --}}
    @mapscripts    

@stop