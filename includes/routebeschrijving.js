$(document).ready(function() {
    var map;
    var directionsPanel;
    var directions;

   // $('p.set').click(function(){
      map = new GMap2($('#map_canvas'));    
      map.setCenter(new GLatLng(42.351505,-71.094455), 15);
      directionsPanel = $('#routebeschrijving');
      directions = new GDirections(map, directionsPanel);
      directions.load("from: 500 Memorial Drive, Cambridge, MA to: 4 Yawkey Way, Boston, MA 02215 (Fenway Park)");
   // });
});



