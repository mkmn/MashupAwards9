$(function() {
  $('#department').select2();
  ymap.drawMap(new Y.LatLng(35.665627,139.730738), 17, Y.LayerSetId.NORMAL);
  ymap.setConfigure('dragging',true);
  ymap.setConfigure('singleClickPan',true);
  ymap.setConfigure('doubleClickZoom',true);
  ymap.setConfigure('continuousZoom',true);
  ymap.setConfigure('scrollWheelZoom',true);
});
