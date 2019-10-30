@extends('adminlte::page')
{{-- CSS para interação com maps --}}
 <link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css"
   integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
   crossorigin=""/>

 <!-- Make sure you put this AFTER Leaflet's CSS -->
 <script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js"
   integrity="sha512-GffPMF3RvMeYyc1LWMHtK8EbPv0iNZ8/oTtHPx9/cc2ILxQ+u905qIwdpULaqDkyBKgOaB57QTMg7ztg8Jm2Og=="
   crossorigin=""></script>


{{-- css maps --}}
@mapstyles

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Mapa</h1>
@stop

@section('content')

<div id="mapid">
    @map([
        'lat' => '-22.4269',
        'lng' => '-45.453',
        'zoom' => '13',
            'markers' => [[
                'title' => 'Go NoWare',
                'lat' => '-22.417218',
                'lng' => '-45.47224',
            ]],

    ])


</div>

<script>
    var mymap = L.map('mapid').setView([-22.4269, -45.453], 13);
    // var marker = L.marker([-22.42055, -45.437222]).addTo(mymap);

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


</script>    


{{-- scrips maps --}}
    @mapscripts    

@stop