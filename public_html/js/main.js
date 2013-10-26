$(function() {
  $('#department').select2();
  var ymap = new Y.Map("map");
  ymap.drawMap(new Y.LatLng(35.665627,139.730738), 17, Y.LayerSetId.NORMAL);
  ymap.setConfigure('dragging',true);
  ymap.setConfigure('singleClickPan',true);
  ymap.setConfigure('doubleClickZoom',true);
  ymap.setConfigure('continuousZoom',true);
  ymap.setConfigure('scrollWheelZoom',true);
  
  /*
  $('#send').click(function() {
    function addMarker( n , single ) {
      var geoBox = map.getBounds();
      var min = geoBox.getSouthWest();
      var max = geoBox.getNorthEast();
      var dx = max.Lon - min.Lon;
      var dy = max.Lat - min.Lat;
      var markers = [];

      for ( var i = 0 ; i < n ; i++ ) {
        //ランダムなマーカーを生成
        var lon = min.Lon + dx * Math.random();
        var lat = min.Lat + dy * Math.random();
        var marker = new Y.Marker( new Y.LatLng(lat,lon) );
        if ( single ) {
          //マーカーをひとつ追加
          map.addFeature(marker);
        } else {
          markers.push( marker );
        }
      }
      if ( !single ) {
         //マーカーを複数追加
         map.addFeatures( markers );
      }
    }
  });
  */
});
