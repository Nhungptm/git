
   
    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBp8Mf4PJMAn8tTvU_am67VHp6mk3_RvZA&sensor=false&libraries=places"></script>
<script type="text/javascript">
    var source, destination;
    var directionsDisplay;
    var directionsService = new google.maps.DirectionsService();
    google.maps.event.addDomListener(window, 'load', function () {
        debugger;
        new google.maps.places.SearchBox(document.getElementById('txtSource'));
        new google.maps.places.SearchBox(document.getElementById('txtDestination'));
        directionsDisplay = new google.maps.DirectionsRenderer({ 'draggable': true });   // khai bao muon dung Google Map kieu nao
    });

    function GetRoute() {     // route la lo trinh
        var mumbai = new google.maps.LatLng(18.9750, 72.8258);
        var mapOptions = {
            zoom: 7,
            center: mumbai,
            durationInTraffic: true
        };
        map = new google.maps.Map(document.getElementById('dvMap'), mapOptions);
        directionsDisplay.setMap(map);
        directionsDisplay.setPanel(document.getElementById('dvPanel'));

        //*********DIRECTIONS AND ROUTE**********************//
        source = document.getElementById("txtSource_1").value;
        destination = document.getElementById("txtDestination_1").value;

        var request = {
            origin: source,
            destination: destination,
            //travelMode: google.maps.TravelMode.DRIVING
            travelMode: google.maps.TravelMode.WALKING
        };
        directionsService.route(request, function (response, status) {
            if (status == google.maps.DirectionsStatus.OK) {
                directionsDisplay.setDirections(response);
          google.maps.event.addListener(directionsDisplay, 'directions_changed', function() {
        var directions = directionsDisplay.getDirections();  // cai nay quan trong: khai bao mang de hung cac thong tin chi duong cua google map
        //console.log(directions); lenh debug nay show ra giá trị của tất cả các loại dữ liệu như number, integer, array, object    
      
        
          // lay dia chi satrt va end
         document.getElementById('address').value = directions.routes[0].legs[0].start_address;
         var a5=document.getElementById('address').value;  
         document.getElementById('address').value = directions.routes[0].legs[directions.routes[0].legs.length-1].end_address;
         var a6=document.getElementById('address').value;         
          
       
         document.getElementById("address").innerHTML= "Start address: "+a5+ "</br>";
         document.getElementById("address").innerHTML+="End address: "+a6+ "</br>";
        
      })           
            }
        });

        //*********DISTANCE AND DURATION**********************//
        var service = new google.maps.DistanceMatrixService();
        service.getDistanceMatrix({
            origins: [source],
            destinations: [destination],
            //travelMode: google.maps.TravelMode.DRIVING,
             travelMode: google.maps.TravelMode.WALKING,
            unitSystem: google.maps.UnitSystem.METRIC,
            avoidHighways: true,
            avoidTolls: true
        }, function (response, status) {
            debugger;
            if (status == google.maps.DistanceMatrixStatus.OK && response.rows[0].elements[0].status != "ZERO_RESULTS") {
             
            } else {
                alert("Unable to find the distance via road.");
            }
        });
       
    }
    window.onload = GetRoute;
</script>


  
     <div class=""> <!-- class="calendar-detail-map-area" -->
      <table border="0" cellpadding="0" cellspacing="3">
        <tr>
          <td>
            <!-- <input type="button" value="地図表示" onclick="GetRoute()" /> -->
            <hr />
          </td>
        </tr>
        <tr>
          <td><div id ="address"></div></td>
        </tr>
        <tr>
            <td>
<!--                 <div id="dvMap" style="width: 700px; height: 500px"></div>  
 -->                <div id="dvMap" style="width: 1350px; height: 300px"></div>               
            </td>           
        </tr>
      </table>
    </div>

