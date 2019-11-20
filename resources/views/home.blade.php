{{-- Este arquivo é referente ao [RFS01] Cadastro de cargas. Tarefa no Redmine #34 --}}
{{-- Este arquivo é referente ao [RFS02] Visualização de cargas. Tarefa no Redmine #35 --}}
{{-- Este arquivo é referente ao [RFS03] Atualização de cargas. Tarefa no Redmine #36 --}}
{{-- Este arquivocode class=""> Exclusão de cargas. Tarefa no Redmine #37 --}}
{{-- Este arquivo é referente ao [RFS05] Cadastro de Demandante. Tarefa no Redmine #38 --}}

@extends('adminlte::page')
   {{-- CSS para interação com maps --}}
   <link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css"
   integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
   crossorigin=""/>

    <!--MAPS -->
    <script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js"
    integrity="sha512-GffPMF3RvMeYyc1LWMHtK8EbPv0iNZ8/oTtHPx9/cc2ILxQ+u905qIwdpULaqDkyBKgOaB57QTMg7ztg8Jm2Og=="
    crossorigin=""></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    
    {{-- Modal --}}
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>    

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
    ])
{{-- Fim div map --}}
</div>

{{-- Inicio modal --}}
<div class="container">
    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Cadastrar Carga</h4>
          </div>
          {{-- Conteúdo do modal --}}
          <div class="modal-body">
            <form method="post" action={{ route('salvaCarga') }}>
            <!-- TOken para não dar erro de envio de dados -->
            {!! csrf_field() !!}
            <p>Veículo:</p>
            <select id="comboVeiculos" name="comboVeiculos" class="form-control"></select>
            <p>Motoristas:</p>
            <select id="comboMotoristas" name="comboMotoristas" class="form-control"></select>

            <p>Lat:</p>
            <input type="text" id="lat" name="lat" class="form-control" value=""/>
            <p>lon:</p>
            <input type="text" id="lon" name="lon" class="form-control" value=""/>

            <p>Descrição:</p>
            <textarea id="obs" name="obs" rows="5" cols="33" class="form-control"></textarea>            
          {{-- Fim conteúdo do modal --}}
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-success">Salvar</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
          </form>
          </div>
        </div>
        
      </div>
    </div>
  </div>
{{-- Fim modal --}}

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

// Evento de click para o mapa
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

    // Modal será aberto quando clicar no map
    $(document).ready(function(){
        $("#myModal").modal();
    });
    
    latInput = document.getElementById("lat"); //searches for and detects the input element from the 'myButton' id
    latInput.value = lat; //changes the value

    lonInput = document.getElementById("lon"); //searches for and detects the input element from the 'myButton' id
    lonInput.value = lon; //changes the value

}
mymap.on('click', onMapClick);

// função para salvar dados da carga no bd
function saveLatLon(pos) {
  $.post('/home', {'_token':'{{csrf_token()}}', pos},function(data) {
    console.log(data.pos);
  });
}
// Fim para scripts para o map funcionar    
</script>  
  
{{-- Busca dados no banco de dados, pela rota /moda que acessa o controler HomeController e a função dadosModal --}}
<script type="text/javascript">  
  // dados de veiculos
$.getJSON('/modalVeiculo', function(data){
    for (i = 0; i < data.length; i++) {
        var _htmlOptions = "";
        console.log("Data: " + data[i]['placa']);
        _htmlOptions += "<option value='"+data[i]['id']+"'>"+data[i]['placa']+"</option>";
        $("#comboVeiculos").append(_htmlOptions);  
    }     
});

  // dados de motoristas
  $.getJSON('/modalMotorista', function(data){
    for (i = 0; i < data.length; i++) {
        var _htmlOptions = "";
        console.log("Data: ", data);
        _htmlOptions += "<option value='"+data[i]['id']+"'>"+data[i]['name']+"</option>";
        $("#comboMotoristas").append(_htmlOptions);  
    }     
});

</script>

{{-- scrips maps --}}
@mapscripts    

@stop