// Função para registrar comentários dos usuários
$("#savecomment").click(function (e) {
  e.preventDefault();
  var formData = new FormData($("#modaldocomentario").get(0));
  e.preventDefault();
  $.ajax({
    type: "post",
    url: "savecomment.php",
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
    success: function (response) {
      Swal.fire({
        title: "Comentário Cadastrado",
        icon: "success",
        confirmButtonText: "OK",
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.reload();
        }
      });
    },
  });
});
// Cria o objeto mapa
map = new L.Map("map", {
  center: new L.LatLng(-27.593372, -48.461188),
  zoom: 11,
});
var credctrl = L.controlCredits({
  image: "ufsc.png",
}).addTo(map);
//Atribuição a camadas iniciais do mapa
var osmUrl = "http://www.google.cn/maps/vt?lyrs=s@189&gl=cn&x={x}&y={y}&z={z}",
  osmAttrib =
    '&copy; <a href="http://openstreetmap.org/copyright">OpenStreetMap</a> contributors',
  osm = L.tileLayer(osmUrl, {
    maxZoom: 18,
    attribution: osmAttrib,
  });
osm.addTo(map);
//Adiciona camada
L.control.scale().addTo(map);
// Pega as layers salvas no Banco
function getfeaturegroup() {
  var result = "";
  $.ajax({
    url: "https://urbanlogics.com.br/urb/projetogeodireito/gelayerpublic.php",
    async: false,
    success: function (data) {
      result = data;
    },
  });
  output = JSON.parse(result);
  /* console.log(output); */
  var obj = [];
  /* output.forEach(function (layer) {
      obj[layer.layer] = layer.layer = L.featureGroup().addTo(map);
    }); */

  output.forEach(function (layer) {
    /* console.log(layer) */
    var insidelayer = {};
    insidelayer[layer.layer] = L.featureGroup().addTo(map);
    insidelayer["truename"] = layer.showname;
    obj.push(insidelayer);
    /*  */
  });
  return obj;
}
layers = getfeaturegroup();
formatedlayers = [];
// Função para atribuição de legendas e configurações
for (var i = 0; i < layers.length; i++) {
  key = Object.keys(layers[i])[0];
  if (key == "Decisões Judiciais") {
    legend = '<div class="box pink"></div>';
  }
  if (key == "ProjetoGeoDireito") {
    legend =
      '<div class="col-auto border-3 border-bottom  pt-2 rounded pb-1"><div class="boxsatelite satelite"></div></div>';
  }
  if (key == "Legislação") {
    legend =
      '<div class="col-auto border-3 border-bottom  pt-2 rounded pb-1"><div class="box green"></div></div>';
  }
  if (key == "Políticas Públicas") {
    legend =
      '<div class="col-auto border-3 border-bottom  pt-2 rounded pb-1"><div class="box yellow"></div></div>';
  }
  if (key == "Qualidade da Água") {
    legend =
      '<div class="col-auto border-3 border-bottom  pt-2 rounded pb-1"><div class="box orange"></div></div>';
  }
  if (key == "Eficácia Social") {
    legend =
      '<div class="col-auto border-3 border-bottom  pt-2 rounded pb-1"><div class="box red"></div></div>';
  } else if (
    key != "Decisões Judiciais" &&
    key != "ProjetoGeoDireito" &&
    key != "Legislação" &&
    key != "Políticas Públicas" &&
    key != "Qualidade da Água" &&
    key != "Eficácia Social"
  ) {
    legend = "";
  }
  var obj = {};
  obj.truelabel = key;
  obj.label = layers[i].truename;
  obj.children = [];
  obj.selectAllCheckbox = "Selecionar Todas";
  obj.collapsed = "true";
  formatedlayers.push(obj);
}
// Objeto das camadas fundamenteis para o mapa
var camadasbase = {
  label: "Camadas Bases",
  children: [
    {
      label: "google",
      layer: osm,
    },
    {
      label: "osm",
      layer: L.tileLayer("http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png"),
    },
  ],
  collapsed: true,
};
//Função de fullscreen
map.addControl(
  new L.Control.Fullscreen({
    title: {
      false: "Ver em Tela Cheia",

      true: "Sair da Tela Cheia",
    },
  })
);

//Função de Régua para o mapa
map.addControl(
  new L.Control.LinearMeasurement({
    unitSystem: "metric",
    color: "#4b5320",
    type: "line",
  })
);
// Função para remover as camadas do mapa
function removelayers() {
  map.eachLayer(function (layer) {
    if (layer.feature != undefined) {
      map.removeLayer(layer);
    }
  });
}
// Fetch dos rasters na base de dados
$.ajax({
  type: "POST",
  url: "getrasters.php",
  dataType: "json",
  success: function (response) {
    arraylayers = {};
    dataraster = [];
    addraster = [];
    dataraster.push("Inicio");
    response.forEach((element) => {
      if (element.tipo == "TMS") {
        raster = new L.tileLayer(element.urlraster, {
          opacity: 0,
          attribution: element.dataraster + " Raster",
        });
      }
      if (element.tipo == "WMS") {
        console.log(raster, "123");
        raster = L.tileLayer.wms(element.urlraster, {
          layers: element.basename,
          format: "image/png",
          transparent: true,
          attribution: element.dataraster + " Raster",
        });
        console.log(raster);
      }
      
      nameraster = element.nome;
      arraylayers[nameraster] = raster;

      raster.addTo(map);
      dataraster.push(element.dataraster);
      addraster.push(L.tileLayer(element.urlraster, {}));
    });
    var layeradd = L.layerGroup(addraster);
    getDataAddMarkers = function ({ label, value, map, exclamation }) {
      map.eachLayer(function (layer) {
        if (label == "Inicio") {
          map.eachLayer(function (layer) {
            if (layer.options.attribution != null) {
              if (layer.options.attribution.includes("Raster")) {
                layer.options.opacity = 0;
                layer.redraw();
              }
            }
          });
        } else if (layer.options.attribution != null) {
          if (layer.options.attribution.includes(label)) {
            map.eachLayer(function (layer) {
              if (layer.options.attribution != null) {
                if (
                  !layer.options.attribution.includes(label) &&
                  layer.options.attribution.includes("Raster")
                ) {
                  layer.options.opacity = 0;
                  layer.redraw();
                }
              }
            });
            map.removeLayer(layer);
            layer.addTo(map);
            layer.options.opacity = 1;
          }
        }
      });
    };
    const Map_BaseLayer = {};
    rastercontrol = L.control
      .layers(Map_BaseLayer, arraylayers, {
        collapsed: true,
        position: "bottomleft",
      })
      .addTo(map);
    opacitycontrol = L.control
      .opacity(arraylayers, {
        label: "",
        position: "bottomleft",
        collapsed: true,
      })
      .addTo(map);
    $(opacitycontrol._container).each(function () {
      $(this).find("a").css({
        "background-image": "url(3304965.png)",
        "background-size": "contain",
      });
    });
    /* map.addControl(L.control.search({ position: "topleft" })); */
    L.control
      .timelineSlider({
        timelineItems: dataraster,
        changeMap: getDataAddMarkers,

        /*  extraChangeMapParams: { exclamation: "Hello World!" }, */
      })
      .addTo(map);
  },
});
// Camadas Geométricas salvas na base de dados
$.getJSON("addcamada.php", function (data) {
  if (data != "") {
    data.forEach(myFunction);
    var camadascriadas = {
      label: "Controle de Dados",
      children: formatedlayers,
      collapsed: true,
    };
    ctl = L.control.layers.tree(camadasbase, camadascriadas, {
      selectAllCheckbox: "false",
      collapsed: true,
    });
    ctl.addTo(map);
  }
});
// Adiciona o estilo as geometrias
function setStyle(feature) {
  if (
    typeof feature.properties.color !== "undefined" &&
    feature.geometry.type != "Point"
  ) {
    if (feature.properties.opacidade == "100") {
      return {
        fillColor: feature.properties.color,
        color: feature.properties.contornocolor,
        weight: feature.properties.espessura,
        fillOpacity: feature.properties.opacidade,
      };
    } else {
      return {
        fillColor: feature.properties.color,
        color: feature.properties.contornocolor,
        weight: feature.properties.espessura,
        fillOpacity: "." + feature.properties.opacidade,
      };
    }
  }
}

function myFunction(value, index, array) {
  const obj = JSON.parse(value);
  if (typeof obj.properties.opacidade !== "undefined") {
    var geojsonMarkerOptions = {
      radius: 8,
      fillColor: obj.properties.color,
      color: obj.properties.contornocolor,
      weight: obj.properties.espessura,
      fillOpacity: obj.properties.opacidade,
    };
  }
  var geojson = L.geoJson(obj, {
    style: setStyle,
    pointToLayer: function (feature, latlng) {
      if (feature.properties.layer[0] != "ProjetoGeoDireito") {
        return L.circleMarker(latlng, geojsonMarkerOptions);
      } else {
        return L.marker(latlng);
      }
    },

    onEachFeature: function (feature, layer) {
      formatedlayers.forEach(function (arrayItem) {
        if (arrayItem.truelabel == feature.properties.layer[0]) {
          var obj = {};
          /* console.log(feature.properties); */
          obj.label =
            '<div class="col-auto border-3 border-bottom  pt-2 rounded pb-1 me-2"><div style="background-color: ' +
            feature.properties.color +
            ";border: 2px solid " +
            feature.properties.contornocolor +
            ';" class="box"></div></div>' +
            feature.properties.titulo;

          obj.layer = layer;

          arrayItem.children.push(obj);
        }
      });
      if (feature.geometry.type == "Point") {
        content =
          "<div class='product-info'><div class='product-text'><div class='d-flex'><h1 style='padding-top:0;'>" +
          feature.properties.titulo +
          "</h1><span data-bs-toggle='modal' data-bs-target='#modaledit' style='place-self: center;'><button class='btn btn-success btn-sm rounded-0' type='button' data-bs-toggle='tooltip' data-bs-placement='top' title='Editar PopUp' style='align-self: center;'><i class='fa fa-edit'></i></button></span></div><h2><strong>LAT/LNG:</strong><br>" +
          feature.geometry.coordinates +
          "</h2>" +
          feature.properties.descricao.replace(/&nbsp;/g, "");
      } else {
        content =
          "<div class='product-info'><div class='product-text'><div class='d-flex'><h1 style='padding-top:0;'>" +
          feature.properties.titulo +
          "</h1></div>" +
          feature.properties.descricao.replace(/&nbsp;/g, "");
      }
      layer.on("pm:dragstart", (e) => {
        e.layer.unbindPopup();
      });
      layer.on("pm:dragend", (e) => {
        e.layer.bindPopup(popup);
      });
    },
  });

  obj.properties.layer.forEach(function (layer) {
    if (layer == "ProjetoGeoDireito") {
      layers.forEach(function (getlayers) {
        for (var key in getlayers) {
          if (key == "ProjetoGeoDireito") {
            geojson.addTo(getlayers[layer]);
          }
        }
        /* geojson.addTo(getlayers[layer]); */
      });
    }
  });

  geojson.on("click", function (evt) {
    if (evt.layer.feature.properties.layer == "ProjetoGeoDireito") {
      if (evt.layer.feature.geometry.type == "Point") {
        content =
          "<div id='geometrypanel' class='product-info'><div class='product-text'><div class='d-flex'><h1 style='padding-top:0;'>" +
          evt.layer.feature.properties.titulo +
          "</h1></div><div class='d-flex gap-3' style='place-content: center;'><span data-bs-toggle='modal' data-bs-target='#modalcoment' style='place-self: center;' ><button class='btn btn-success btn-sm' type='button' data-bs-toggle='tooltip' data-bs-placement='top' title='Fazer um comentário' style='border-radius:1.2rem;align-self: center;height:30px;width:40px'><i style='font-size:20px' class='fa fa-comment'></i></button></span><span data-bs-toggle='modal' data-bs-target='#modalcomentshow' data-id='"+evt.layer.feature.properties.id+"' class='comments' style='place-self: center;'><button class='btn btn-success btn-sm' type='button' data-bs-toggle='tooltip' data-bs-placement='top' title='Exibir comentários' style='border-radius:1.2rem;align-self: center;height:30px;width:40px'><i style='font-size:20px' class='fa fa-comments'></i></button></span></div><h2><strong>LAT/LNG:</strong><br>" +
          evt.layer.feature.geometry.coordinates +
          "</h2>" +
          evt.layer.feature.properties.descricao.replace(/&nbsp;/g, "");
      } else {
        content =
          "<div id='geometrypanel' class='product-info'><div class='product-text'><div class='d-flex'><h1 style='padding-top:0;'>" +
          evt.layer.feature.properties.titulo +
          "</h1></div><div class='d-flex gap-3' style='place-content: center;'><span data-bs-toggle='modal' data-bs-target='#modalcoment' style='place-self: center;'><button class='btn btn-success btn-sm' type='button' data-bs-toggle='tooltip' data-bs-placement='top' title='Fazer um comentário' style='border-radius:1.2rem;align-self: center;height:30px;width:40px'><i style='font-size:20px' class='fa fa-comment'></i></button></span><span data-bs-toggle='modal' data-bs-target='#modalcomentshow' data-id='"+evt.layer.feature.properties.id+"' class='comments' style='place-self: center;'><button class='btn btn-success btn-sm' type='button' data-bs-toggle='tooltip' data-bs-placement='top' title='Exibir comentários' style='border-radius:1.2rem;align-self: center;height:30px;width:40px'><i style='font-size:20px' class='fa fa-comments'></i></button></span></div>" +
          evt.layer.feature.properties.descricao.replace(/&nbsp;/g, "");
      }
    } else {
      if (evt.layer.feature.geometry.type == "Point") {
        content =
          "<div id='geometrypanel' class='product-info'><div class='product-text'><div class='d-flex'><h1 style='padding-top:0;'>" +
          evt.layer.feature.properties.titulo +
          "</h1></div><h2><strong>LAT/LNG:</strong><br>" +
          evt.layer.feature.geometry.coordinates +
          "</h2>" +
          evt.layer.feature.properties.descricao.replace(/&nbsp;/g, "");
      } else {
        content =
          "<div id='geometrypanel' class='product-info'><div class='product-text'><div class='d-flex'><h1 style='padding-top:0;'>" +
          evt.layer.feature.properties.titulo +
          "</h1></div>" +
          evt.layer.feature.properties.descricao.replace(/&nbsp;/g, "");
      }
    }
    $('#modalcomentshow').attr('data-id',evt.layer.feature.properties.id );
    $('#modalcoment').on('shown.bs.modal', function (e) {
      $("#contentmodal").modal("hide");
    })
    $('#modalcomentshow').on('shown.bs.modal', function (e) {
      $("#contentmodal").modal("hide");
      id = $(this).attr('data-id')
      console.log(id)
      $.ajax({
        type: "POST",
        url: "getcomments.php",
        data: {id:id},
        success: function (response) {
          $("#commentsdiv").remove();
          $("#bodycomments").append(response);
        }
      });
    })
    $("#geometrypanel").remove();

    $("#titulomodal").empty();
    $("#divcontentmodal").empty();
    $("#infogeometry").append(content);
    $("#titulomodal").append(evt.layer.feature.properties.titulo);
    $("#divcontentmodal").append(content);
    $("#contentmodal").modal("show");
    
    $("html, body").animate(
      {
        scrollTop: $("#infogeometry").offset().top,
      },

      500
    );

    $("#idlayercomment").val(evt.layer.feature.properties.id);
  });
}
/* $.ajax({
  type: "GET", 
  url:"https://geoservicos.inde.gov.br/geoserver/wms?service=WMS&version=1.1.0&request=GetMap&layers=BNDES:AP_2014",
  contentType: "application/json",
  responseType: "application/json",
  headers: {
    "Access-Control-Allow-Credentials": true,
    "Access-Control-Allow-Origin": "*",
    "Access-Control-Allow-Methods": "GET",
    "Access-Control-Allow-Headers": "application/json",
  },
  success: function (data) {
    console.log(data);
  },
  error: function (error) {
    console.log(error);
  },
}); */
/* var basemaps = {
  Topography: L.tileLayer.wms("http://ows.mundialis.de/services/service?", {
    layers: "TOPO-WMS",
  }),

  Places: L.tileLayer.wms("http://ows.mundialis.de/services/service?", {
    layers: "OSM-Overlay-WMS",
  }),

  "Topography, then places": L.tileLayer.wms(
    "http://ows.mundialis.de/services/service?",
    {
      layers: "TOPO-WMS,OSM-Overlay-WMS",
    }
  ),

  "Places, then topography": L.tileLayer.wms(
    "http://ows.mundialis.de/services/service?",
    {
      layers: "OSM-Overlay-WMS,TOPO-WMS",
    }
  ),
}; */
teste = L.tileLayer.wms("http://sigsc.sc.gov.br/sigserver/SIGSC/wms", {
  layers: "OrtoRGB-Landsat-2012",
});
teste32 = L.tileLayer.wms(
  "http://ows.mundialis.de/services/service?",
  {
    layers: "OSM-Overlay-WMS,TOPO-WMS",
  }
)
console.log(teste,teste32);
/* map.fitBounds(teste.getBounds()); */
/* L.control.layers(basemaps).addTo(map); */
/* var wmsLayer = L.tileLayer.wms('http://sigsc.sc.gov.br/sigserver/SIGSC/wms', {
    layers: "ana_foz"
    }).addTo(map) */
/* var wfs_url =
  "https://geoinfo.cpamt.embrapa.br/geoserver/ows?service=wfs&version=1.3.0&request=GetCapabilities";

$.getJSON(wfs_url).then((res) => {
  console.log(res);
  var layer = L.geoJson(res, {
    onEachFeature: function (f, l) {
      l.bindPopup("BU: " + f.properties.BU + " USE:" + f.properties.USE);
    },

    style: geojsonStyle,
  }).addTo(map);

  map.fitBounds(layer.getBounds());
}); */
map.pm.addControls({
  position: "topleft",

  drawCircle: false,

  cutPolygon: false,

  rotateMode: false,
  drawRectangle: false,
  editMode: false,
  drawCircleMarker: false,
  dragMode: false,
});

const customTranslation = {
  tooltips: {
    placeMarker: "Clique para posicionar o marcador",

    firstVertex: "Clique para posicionar o primeiro vértice",

    continueLine: "Clique para continuar desenhando",

    finishLine: "Clique em qualquer marcador existente para finalizar",

    finishPoly: "Clique no primeiro ponto para fechar o polígono",

    finishRect: "Clique para finalizar",

    startCircle: "Clique para posicionar o centro do círculo",

    finishCircle: "Clique para fechar o círculo",

    placeCircleMarker: "Clique para posicionar o marcador circular",
  },

  actions: {
    finish: "Finalizar",

    cancel: "Cancelar",

    removeLastVertex: "Remover último vértice",
  },

  buttonTitles: {
    drawMarkerButton: "Desenhar um marcador",

    drawPolyButton: "Desenhar um polígono",

    drawLineButton: "Desenhar uma polilinha",

    drawCircleButton: "Desenhar um círculo",

    drawRectButton: "Desenhar um retângulo",

    editButton: "Editar camada(s)",

    dragButton: "Mover camada(s)",

    cutButton: "Recortar camada(s)",

    deleteButton: "Remover camada(s)",

    drawCircleMarkerButton: "Marcador de círculos de desenho",

    snappingButton: "Marcador arrastado para outras camadas e vértices",

    pinningButton: "Vértices compartilhados de pinos juntos",
  },
};

map.pm.setLang("customName", customTranslation, "en");

function makePopupContent() {
  return "<div id='formio'></div>";
}

function setPupup(layer) {
  var feature = JSON.stringify(layer.toGeoJSON());
  var coords = makePopupContent();
}

L.control
  .bigImage({ position: "bottomleft", title: "Imprimir Mapa" })
  .addTo(map);
map.setGeocoder("Nominatim" /* , { ... Geocoder options ... } */);
map.on("popupopen", function (e) {
  var px = map.project(e.target._popup._latlng); // find the pixel location on the map where the popup anchor is

  px.y -= e.target._popup._container.clientHeight / 2; // find the height of the popup container, divide by 2, subtract from the Y axis of marker location

  map.panTo(map.unproject(px), {
    animate: true,
  });
});
