function getData() {//// ref="OpenS"
  jQuery.ajax({//// ref="jQuery-Ajax"
    type: "GET",//// ref="type"
    url: "./svg-polygon-ajax.php",//// ref="url"
    data: "N=" + encodeURI($("#N").val()),//// ref="data"
    datatype: "text",   //// ref="datatype"
    success: function (DATA) {//// ref="GetS"
      alert(DATA);
      $("#npolygon").attr("points", DATA); //// ref="setDE"
    }//// ref="GetE"
  });
}
