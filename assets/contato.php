<div id="contato" class="container-fluid bg-grey">
  <h2 class="text-center">Contato</h2>
    <form id="frmContato" method="post" action="assets/mensagem.php">
      <div class="row">
        <div class="col-sm-5">
          <p>Atendimento 24 horas. Fale com a gente.</p>
          <p><span class="glyphicon glyphicon-map-marker"></span> Brasília, DF</p>
          <p><span class="glyphicon glyphicon-phone"></span> (61) 8154-6988</p>
          <p><span class="glyphicon glyphicon-envelope"></span> mensagem@happyday.me</p>	   
        </div>
        <div class="col-sm-7 slideanim">
          <div class="row">
            <div class="col-sm-6 form-group">
              <input class="form-control" id="name" name="name" placeholder="Nome" type="text" required>
            </div>
            <div class="col-sm-6 form-group">
              <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
            </div>
          </div>
          <input class="form-control" id="subject" name="subject" placeholder="Assunto" type="text" required><br />
          <textarea class="form-control" id="comments" name="comments" placeholder="Mensagem" rows="5"></textarea><br>
          <div class="row">
            <div class="col-sm-12 form-group">
              <button class="btn btn-default pull-right" type="submit">Enviar</button>
            </div>
          </div>	
        </div>
      </div>
    </form>  
</div>

<div id="googleMap" style="height:400px;width:100%;"></div>

<!-- Add Google Maps -->
<script src="http://maps.googleapis.com/maps/api/js"></script>
<script>
var myCenter = new google.maps.LatLng(-15.718933, -47.881082);

function initialize() {
var mapProp = {
  center:myCenter,
  zoom:12,
  scrollwheel:false,
  draggable:false,
  mapTypeId:google.maps.MapTypeId.ROADMAP
  };

var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);

var marker = new google.maps.Marker({
  position:myCenter,
  });

marker.setMap(map);
}

google.maps.event.addDomListener(window, 'load', initialize);
</script>