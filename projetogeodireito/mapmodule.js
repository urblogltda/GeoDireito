var pt = {
  language: "sp",
  i18n: {
    sp: {
      Survey: "Pesquisa",
      Excellent: "Excelente",
      Great: "Estupendo",
      Good: "Bueno",
      Average: "Mediano",
      Poor: "Ruim",
      Submit: "Enviar",
      complete: "Completo",
    },
  },
};
Formio.createForm(document.getElementById("forminsert"), {
  settings: {
    language: pt,
  },
  components: [
    {
      type: "textarea",
      label: "Conteúdo",
      tooltip: "Contéudo que sera exibido no Popup da Geometria",
      editor: "ckeditor",
      autoExpand: false,
      validate: {
        required: true,
      },
      key: "content",
      input: true,
      inputType: "text",
    },
  ],
});
$(document).ready(function () {
  $("#hideonstart").hide();
  /* console.log($("#buttonlayered"));
    $("#buttonlayered").append('<i class="fa-solid fa-layer-group"></i>'); */
});
/* function testAjax(handleData) {
  $.ajax({
    url: "https://urbanlogics.com.br/urb/projetogeodireito/getlayers.php",
    success: function (data) {
      handleData(data);
    },
  });
} */

/* function Generatefeaturegroup(output) {
  featuregroups = [];
  output.forEach(function (layer) {
    featuregroups.push((layer.layer = L.featureGroup().addTo(map)));
  });
  return featuregroups;
} */
var osmUrl = "http://www.google.cn/maps/vt?lyrs=s@189&gl=cn&x={x}&y={y}&z={z}",
  osm = L.tileLayer(osmUrl, {
    maxZoom: 19,
  });
map = new L.Map("map", {
  center: new L.LatLng(-27.593372, -48.461188),
  zoom: 11,
});
var credctrl = L.controlCredits({
  image: "ufsc.png",
}).addTo(map);
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
      console.log(element);
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
                  console.log(layer.options.attribution);
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
        position: "topright",
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
    console.log(layeradd);
    L.control
      .timelineSlider({
        timelineItems: dataraster,
        changeMap: getDataAddMarkers,

        /*  extraChangeMapParams: { exclamation: "Hello World!" }, */
      })
      .addTo(map);
  },
});
new L.cascadeButtons(
  [
    {
      icon: "fa-solid fa-layer-group",
      ignoreActiveState: true,
      command: () => {
        Formio.createForm(document.getElementById("modaladdlayerforminsert"), {
          settings: {
            language: pt,
          },
          components: [
            {
              label: "Qual é o nome da camda que você quer adicionar ?",
              tooltip: "Nome da camada a ser adicionada",
              autofocus: true,
              tableView: true,
              key: "camadaadicionada",
              type: "textfield",
              input: true,
            },
            {
              label: "Visível",
              tableView: false,
              key: "visivel",
              type: "checkbox",
              input: true,
              defaultValue: false,
            },
            {
              type: "button",
              label: "Salvar",
              key: "submit",
              disableOnInvalid: true,
              input: true,
              tableView: false,
            },
          ],
        }).then(function (form) {
          form.on("submit", function (submission) {
            Swal.fire({
              title: "Adicionar Camada?",
              showDenyButton: true,
              confirmButtonText: "Salvar",
              denyButtonText: `Cancelar`,
            }).then((result) => {
              if (result.isConfirmed) {
                $.ajax({
                  type: "post",
                  async: false,
                  url: "https://urbanlogics.com.br/urb/projetogeodireito/salvarcamada.php",
                  data: {
                    content: JSON.stringify(submission),
                  },
                  success: function (response) {
                    console.log(response);
                    Swal.fire({
                      title: "Camada Adicionada",
                      icon: "success",
                      confirmButtonText: "OK",
                    }).then((result) => {
                      if (result.isConfirmed) {
                        window.location.reload();
                      }
                    });
                  },
                  error: function (jqXHR, exception) {
                    var msg = "";
                    if (jqXHR.status === 0) {
                      msg = "Not connect.\n Verify Network.";
                    } else if (jqXHR.status == 404) {
                      msg = "Requested page not found. [404]";
                    } else if (jqXHR.status == 500) {
                      msg = "Internal Server Error [500].";
                    } else if (exception === "parsererror") {
                      msg = "Requested JSON parse failed.";
                    } else if (exception === "timeout") {
                      msg = "Time out error.";
                    } else if (exception === "abort") {
                      msg = "Ajax request aborted.";
                    } else {
                      msg = "Uncaught Error.\n" + jqXHR.responseText;
                    }
                    console.log(msg);
                  },
                });
              } else if (result.isDenied) {
                Swal.fire("Camada não foi salva", "", "info");
              }
            });
          });
        });
        $("#modaladdlayer").modal("show");
      },
    },
  ],
  { position: "bottomleft", direction: "vertical" }
).addTo(map);
new L.cascadeButtons(
  [
    {
      icon: "fa-solid fa-trash",
      ignoreActiveState: true,
      command: () => {
        Formio.createForm(
          document.getElementById("modalremovelayerforminsert"),
          {
            settings: {
              language: pt,
            },
            components: [
              {
                type: "select",
                label: "Camada",
                key: "layers",
                placeholder: "Selecione qual camada que você deseja remover",
                dataSrc: "url",
                lazyLoad: false,
                data: {
                  url: "https://urbanlogics.com.br/urb/projetogeodireito/getlayers.php",
                },
                validateOn: "blur",
                validate: {
                  required: true,
                  customMessage: "Selecione ao menos uma camada.",
                },
                valueProperty: "layer",
                template: "<span>{{ item.layer }}</span>",
              },
              {
                type: "button",
                label: "Remover",
                key: "submit",
                disableOnInvalid: true,
                input: true,
                tableView: false,
              },
            ],
          }
        ).then(function (form) {
          form.on("submit", function (submission) {
            console.log(submission);
            Swal.fire({
              title: "Remover Camada?",
              showDenyButton: true,
              confirmButtonText: "Remover",
              denyButtonText: `Cancelar`,
            }).then((result) => {
              if (result.isConfirmed) {
                $.ajax({
                  type: "post",
                  async: false,
                  url: "https://urbanlogics.com.br/urb/projetogeodireito/deletelayer.php",
                  data: {
                    content: JSON.stringify(submission),
                  },
                  success: function (response) {
                    console.log(response);
                    Swal.fire({
                      title: "Camada Removida",
                      icon: "success",
                      confirmButtonText: "OK",
                    }).then((result) => {
                      if (result.isConfirmed) {
                        window.location.reload();
                      }
                    });
                  },
                  error: function (jqXHR, exception) {
                    var msg = "";
                    if (jqXHR.status === 0) {
                      msg = "Not connect.\n Verify Network.";
                    } else if (jqXHR.status == 404) {
                      msg = "Requested page not found. [404]";
                    } else if (jqXHR.status == 500) {
                      msg = "Internal Server Error [500].";
                    } else if (exception === "parsererror") {
                      msg = "Requested JSON parse failed.";
                    } else if (exception === "timeout") {
                      msg = "Time out error.";
                    } else if (exception === "abort") {
                      msg = "Ajax request aborted.";
                    } else {
                      msg = "Uncaught Error.\n" + jqXHR.responseText;
                    }
                    console.log(msg);
                  },
                });
              } else if (result.isDenied) {
                Swal.fire("Camada não foi salva", "", "info");
              }
            });
          });
        });
        $("#modalremovelayer").modal("show");
      },
    },
  ],
  { position: "bottomleft", direction: "vertical" }
).addTo(map);
new L.cascadeButtons(
  [
    {
      icon: "fa-solid fa-map-pin",
      ignoreActiveState: true,
      command: () => {
        $("#clickgeometry").click(function (e) {
          var formData = new FormData($("#forminputgeometry").get(0));

          e.preventDefault();
          $.ajax({
            type: "post",
            url: "inputgeometry.php",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function (response) {
              console.log(response);
              Swal.fire({
                title: "Camada Adicionada",
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

        $("#modalinputgeometria").modal("show");
      },
    },
  ],
  { position: "bottomleft", direction: "horizontal" }
).addTo(map);
/* function testAjax() {
  var result = "";
  $.ajax({
    url: "https://urbanlogics.com.br/urb/projetogeodireito/getlayers.php",
    async: false,
    success: function (data) {
      result = data;
    },
  });
  console.log(result)
  return JSON.parse(result);
}
layernames = testAjax(); */
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
  console.log(layers[i]);
  var obj = {};
  obj.truelabel = key;
  obj.label = layers[i].truename;
  obj.children = [];
  obj.selectAllCheckbox = "Selecionar Todas";
  obj.collapsed = "true";
  formatedlayers.push(obj);
}
console.log(formatedlayers);
/* console.log(formatedlayers); */

L.control.scale().addTo(map);
/* var layerControl = L.control
  .layers(
    {
      osm: osm.addTo(map),
      google: L.tileLayer(
        "http://www.google.cn/maps/vt?lyrs=s@189&gl=cn&x={x}&y={y}&z={z}",
        {
          attribution: "google",
        }
      ),
    },
    layers,
    {
      position: "topright",
      collapsed: true,
    }
  )
  .addTo(map); */
osm.addTo(map);
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
};
/* var camadascriadas = {
  label: "Camadas Criadas",
  children: formatedlayers,
};
ctl = L.control.layers.tree(camadasbase, camadascriadas, {

}); */
/* ctl.addTo(map); */
map.addControl(
  new L.Control.Fullscreen({
    title: {
      false: "Ver em Tela Cheia",
      true: "Sair da Tela Cheia",
    },
  })
);
map.addControl(
  new L.Control.LinearMeasurement({
    unitSystem: "metric",
    color: "#4b5320",
    type: "line",
  })
);
function removelayers() {
  map.eachLayer(function (layer) {
    if (layer.feature != undefined) {
      map.removeLayer(layer);
    }
  });
}
// Fetch dos rasters na base de dados

function addspecific(element, legenda) {
  if (element.label == legenda) {
    element.children.forEach((layer) => {
      if (!map.hasLayer(layer.layer)) {
        map.addLayer(layer.layer);
      }
    });
  }
}
function removespecific(element, legenda) {
  if (element.label == legenda) {
    element.children.forEach((layer) => {
      if (map.hasLayer(layer.layer)) {
        map.removeLayer(layer.layer);
      }
    });
  }
}
function checkallon(element) {
  if (
    !$("#legendaagua").hasClass("on") &&
    !$("#legendapoliticas").hasClass("on") &&
    !$("#legendalegislacao").hasClass("on") &&
    !$("#legendajudicial").hasClass("on") &&
    !$("#legendaeficacia").hasClass("on")
  ) {
    element.children.forEach((layer) => {
      if (!map.hasLayer(layer.layer)) {
        map.addLayer(layer.layer);
      }
    });
  }
}
$.getJSON("addcamada.php", function (data) {
  /* array = data[0] */
  if (data != "") {
    data.forEach(myFunction);
    var camadascriadas = {
      label: "Camadas Criadas",
      children: formatedlayers,
    };
    ctl = L.control.layers.tree(camadasbase, camadascriadas, {
      selectAllCheckbox: "true",
    });
    ctl.addTo(map);
    $("#legendaagua").click(function (e) {
      if ($("#legendaagua").hasClass("on")) {
        console.log("temclasse");
        $("#legendaagua").removeClass("on");
      } else {
        $("#legendaagua").addClass("on");
      }
      removelayers();
      formatedlayers.forEach((element) => {
        if ($("#legendaagua").hasClass("on")) {
          addspecific(element, "Qualidade da Água");
        }
        if ($("#legendapoliticas").hasClass("on")) {
          addspecific(element, "Políticas Públicas");
        }
        if ($("#legendalegislacao").hasClass("on")) {
          addspecific(element, "Legislação");
        }
        if ($("#legendajudicial").hasClass("on")) {
          addspecific(element, "Decisões Judiciais");
        }
        if ($("#legendaeficacia").hasClass("on")) {
          addspecific(element, "Eficácia Social");
        }
        checkallon(element);
      });
    });

    $("#legendapoliticas").click(function (e) {
      if ($("#legendapoliticas").hasClass("on")) {
        $("#legendapoliticas").removeClass("on");
      } else {
        $("#legendapoliticas").addClass("on");
      }
      removelayers();
      formatedlayers.forEach((element) => {
        if ($("#legendapoliticas").hasClass("on")) {
          addspecific(element, "Políticas Públicas");
        }
        if ($("#legendaagua").hasClass("on")) {
          addspecific(element, "Qualidade da Água");
        }
        if ($("#legendalegislacao").hasClass("on")) {
          addspecific(element, "Legislação");
        }
        if ($("#legendajudicial").hasClass("on")) {
          addspecific(element, "Decisões Judiciais");
        }
        if ($("#legendaeficacia").hasClass("on")) {
          addspecific(element, "Eficácia Social");
        }
        checkallon(element);
      });
    });
    $("#legendalegislacao").click(function (e) {
      if ($("#legendalegislacao").hasClass("on")) {
        $("#legendalegislacao").removeClass("on");
      } else {
        $("#legendalegislacao").addClass("on");
      }
      removelayers();
      formatedlayers.forEach((element) => {
        if ($("#legendalegislacao").hasClass("on")) {
          addspecific(element, "Legislação");
        }
        if ($("#legendaagua").hasClass("on")) {
          addspecific(element, "Qualidade da Água");
        }
        if ($("#legendapoliticas").hasClass("on")) {
          addspecific(element, "Políticas Públicas");
        }
        if ($("#legendajudicial").hasClass("on")) {
          addspecific(element, "Decisões Judiciais");
        }
        if ($("#legendaeficacia").hasClass("on")) {
          addspecific(element, "Eficácia Social");
        }
        checkallon(element);
      });
    });
    $("#legendajudicial").click(function (e) {
      if ($("#legendajudicial").hasClass("on")) {
        $("#legendajudicial").removeClass("on");
      } else {
        $("#legendajudicial").addClass("on");
      }
      removelayers();
      formatedlayers.forEach((element) => {
        if ($("#legendajudicial").hasClass("on")) {
          addspecific(element, "Decisões Judiciais");
        }
        if ($("#legendaagua").hasClass("on")) {
          addspecific(element, "Qualidade da Água");
        }
        if ($("#legendapoliticas").hasClass("on")) {
          addspecific(element, "Políticas Públicas");
        }
        if ($("#legendalegislacao").hasClass("on")) {
          addspecific(element, "Legislação");
        }
        if ($("#legendaeficacia").hasClass("on")) {
          addspecific(element, "Eficácia Social");
        }
        checkallon(element);
      });
    });
    $("#legendaeficacia").click(function (e) {
      if ($("#legendaeficacia").hasClass("on")) {
        $("#legendaeficacia").removeClass("on");
      } else {
        $("#legendaeficacia").addClass("on");
      }
      removelayers();
      formatedlayers.forEach((element) => {
        if ($("#legendaeficacia").hasClass("on")) {
          addspecific(element, "Eficácia Social");
        }
        if ($("#legendaagua").hasClass("on")) {
          addspecific(element, "Qualidade da Água");
        }
        if ($("#legendapoliticas").hasClass("on")) {
          addspecific(element, "Políticas Públicas");
        }
        if ($("#legendalegislacao").hasClass("on")) {
          addspecific(element, "Legislação");
        }
        if ($("#legendajudicial").hasClass("on")) {
          addspecific(element, "Decisões Judiciais");
        }
        checkallon(element);
      });
    });
  }
});

var popupOptions = {
  minWidth: "400",
  maxWidth: "800",
  maxHeight: "400",
  /* className: "wrapper", */ // classname for another popup
  autoPanPadding: (40, 40),
};
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
  /*   var point = obj.geometry.coordinates;
    var radius = 5;
    var options = { steps: 10, units: "kilometers", properties: { foo: "bar" } };
    var circle = turf.circle(point, radius, options);
    L.geoJson(circle).addTo(map); */
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
    /* style: {
          fillColor: "#ff7800",
          color: "#000",
        }, */
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
      /*  }
            } */
      if (feature.geometry.type == "Point") {
        content =
          "<div class='product-info'><div class='product-text'><div class='d-flex'><h1 style='padding-top:0;'>" +
          feature.properties.titulo +
          "</h1><span data-bs-toggle='modal' data-bs-target='#modaledit' style='place-self: center;'><button class='btn btn-success btn-sm rounded-0' type='button' data-bs-toggle='tooltip' data-bs-placement='top' title='Editar PopUp' style='align-self: center;'><i class='fa fa-edit'></i></button></span></div><h2><strong>LAT/LNG:</strong><br>" +
          feature.geometry.coordinates +
          "</h2>" +
          feature.properties.descricao; /* .replace(/&nbsp;/g, ''); */
      } else {
        content =
          "<div class='product-info'><div class='product-text'><div class='d-flex'><h1 style='padding-top:0;'>" +
          feature.properties.titulo +
          "</h1><span data-bs-toggle='modal' data-bs-target='#modaledit' style='place-self: center;'><button class='btn btn-success btn-sm rounded-0' type='button' data-bs-toggle='tooltip' data-bs-placement='top' title='Editar PopUp' style='align-self: center;'><i class='fa fa-edit'></i></button></span></div>" +
          feature.properties.descricao; /* .replace(/&nbsp;/g, ''); */
      }

      /*  + 
                               feature.properties.titulo +
                               "</h1><p>Descrição: " +
                               feature.properties.descricao +
                               "</p><br><img class='card-img-top' src='imageslayer/" +
                               feature.properties.imagem +
                               "' alt='Card image' style='width:100%'>" */
      var popup = L.popup().setContent(content);
      layer.bindPopup(popup, popupOptions);
      layer.on("pm:update", (e) => {
        $.ajax({
          type: "post",
          url: "editcamada.php",
          data: {
            feature: JSON.stringify(e.layer.toGeoJSON()),
          },
          success: function (response) {
            console.log(response);
            Swal.fire({
              icon: "success",
              title: "Camada Editada!",
            });
          },
          error: function (jqXHR, exception) {
            var msg = "";
            if (jqXHR.status === 0) {
              msg = "Not connect.\n Verify Network.";
            } else if (jqXHR.status == 404) {
              msg = "Requested page not found. [404]";
            } else if (jqXHR.status == 500) {
              msg = "Internal Server Error [500].";
            } else if (exception === "parsererror") {
              msg = "Requested JSON parse failed.";
            } else if (exception === "timeout") {
              msg = "Time out error.";
            } else if (exception === "abort") {
              msg = "Ajax request aborted.";
            } else {
              msg = "Uncaught Error.\n" + jqXHR.responseText;
            }
            console.log(msg);
          },
        });
      });
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
    console.log(evt.layer.feature.properties);
    $("#exampleColorInputedit").val(evt.layer.feature.properties.color);
    $("#exampleColorInputeditcontorno").val(
      evt.layer.feature.properties.contornocolor
    );
    $("#opacidadeedit").val(evt.layer.feature.properties.opacidade);
    $("#espessuraedit").val(evt.layer.feature.properties.espessura);
    $("#outputopacidade").html(evt.layer.feature.properties.opacidade);
    $("#outputespessura").html(evt.layer.feature.properties.espessura);

    var feature = JSON.stringify(evt.layer.toGeoJSON());
    Formio.createForm(document.getElementById("forminsertedit"), {
      settings: {
        language: pt,
      },
      components: [
        {
          type: "textfield",
          label: "Título",
          tooltip: "Título da Geometria",
          placeholder: "Insira o Título.",
          validate: {
            required: true,
          },
          key: "title",
          input: true,
          inputType: "text",
          defaultValue: evt.layer.feature.properties.titulo,
        },
        {
          type: "select",
          label: "Camada",
          tooltip:
            "Seleciona em qual camada(s) você deseja adicionar a geometria",
          key: "layers",
          placeholder: "Selecione em qual camada que você deseja adicionar",
          dataSrc: "url",
          lazyLoad: false,
          data: {
            url: "https://urbanlogics.com.br/urb/projetogeodireito/getlayers.php",
          },
          validateOn: "blur",
          validate: {
            required: true,
            customMessage: "Selecione ao menos uma camada.",
          },
          valueProperty: "layer",
          template: "<span>{{ item.layer }}</span>",
          multiple: true,
          defaultValue: evt.layer.feature.properties.layer,
        },
        {
          type: "textarea",
          label: "Conteúdo",
          tooltip: "Contéudo que sera exibido no Popup da Geometria",
          editor: "ckeditor",
          autoExpand: false,
          validate: {
            required: true,
          },
          key: "content",
          input: true,
          inputType: "text",
          defaultValue: evt.layer.feature.properties.descricao,
        },
        {
          label: "Text Field",
          hidden: true,
          disabled: true,
          tableView: true,
          clearOnHide: false,
          key: "fname",
          type: "textfield",
          input: true,
          defaultValue: feature,
        },
        {
          label: "Text Field",
          hidden: true,
          disabled: true,
          tableView: true,
          clearOnHide: false,
          key: "layerid",
          type: "textfield",
          input: true,
          defaultValue: evt.layer.feature.properties.id,
        },
        {
          label: "Text Field",
          hidden: true,
          tableView: true,
          clearOnHide: false,
          key: "color",
          type: "textfield",
          input: true,
        },
        {
          label: "Text Field",
          hidden: true,
          tableView: true,
          clearOnHide: false,
          key: "contornocolor",
          type: "textfield",
          input: true,
        },
        {
          label: "Text Field",
          hidden: true,
          tableView: true,
          clearOnHide: false,
          key: "opacidade",
          type: "textfield",
          input: true,
        },
        {
          label: "Text Field",
          hidden: true,
          tableView: true,
          clearOnHide: false,
          key: "espessura",
          type: "textfield",
          input: true,
        },
        {
          label: "Salvar",
          showValidations: false,
          theme: "success",
          disableOnInvalid: true,
          tableView: false,
          key: "submit",
          type: "button",
          input: true,
          saveOnEnter: false,
          size: "lg",
        },
      ],
    }).then(function (form) {
      console.log(form.submission.data);
      /* form.submission.data.content = evt.layer.feature.properties.descricao;
            form.submission.data.title = evt.layer.feature.properties.titulo;
            form.submission.data.layers = evt.layer.feature.properties.layer;
            console.log(form.submission.data); */
      form.on("submit", function (submission) {
        submission.data.color = $("#exampleColorInputedit").val();
        submission.data.contornocolor = $(
          "#exampleColorInputeditcontorno"
        ).val();
        submission.data.opacidade = $("#opacidadeedit").val();
        submission.data.espessura = $("#espessuraedit").val();
        console.log(submission);
        Swal.fire({
          title: "Salvar Edição da Geometria ?",
          showDenyButton: true,
          confirmButtonText: "Salvar",
          denyButtonText: `Cancelar`,
        }).then((result) => {
          if (result.isConfirmed) {
            $.ajax({
              type: "post",
              async: false,
              url: "https://urbanlogics.com.br/urb/projetogeodireito/editgeometrycontent.php",
              data: {
                content: JSON.stringify(submission),
              },
              success: function (response) {
                console.log(response);
                Swal.fire({
                  title: "Conteúdo Editado",
                  icon: "success",
                  confirmButtonText: "OK",
                }).then((result) => {
                  if (result.isConfirmed) {
                    window.location.reload();
                  }
                });
              },
              error: function (jqXHR, exception) {
                var msg = "";
                if (jqXHR.status === 0) {
                  msg = "Not connect.\n Verify Network.";
                } else if (jqXHR.status == 404) {
                  msg = "Requested page not found. [404]";
                } else if (jqXHR.status == 500) {
                  msg = "Internal Server Error [500].";
                } else if (exception === "parsererror") {
                  msg = "Requested JSON parse failed.";
                } else if (exception === "timeout") {
                  msg = "Time out error.";
                } else if (exception === "abort") {
                  msg = "Ajax request aborted.";
                } else {
                  msg = "Uncaught Error.\n" + jqXHR.responseText;
                }
                console.log(msg);
              },
            });
          } else if (result.isDenied) {
            Swal.fire("Geometria não foi salva", "", "info");
          }
        });
      });
    });
  });
  /* var camadascriadas = {
      label: "Camadas Criadas",
      children: formatedlayers,
    };
    console.log(camadascriadas);
    ctl = L.control.layers.tree(camadasbase, camadascriadas, {});
  
    ctl.addTo(map); */
}
function addcontrol(value) {
  const obj = JSON.parse(value);
  /*   var point = obj.geometry.coordinates;
      var radius = 5;
      var options = { steps: 10, units: "kilometers", properties: { foo: "bar" } };
      var circle = turf.circle(point, radius, options);
      L.geoJson(circle).addTo(map); */
  var geojson = L.geoJson(obj, {
    onEachFeature: function (feature, layer) {
      console.log(feature, layer);
      /* for (var key in layers) {
                if (key == feature.properties.layer[0]){ */
      formatedlayers.forEach(function (arrayItem) {
        if (arrayItem.label == feature.properties.layer[0]) {
          var obj = {};
          obj.label = feature.properties.titulo;
          obj.layer = layer;
          arrayItem.children.push(obj);
        }
      });
    },
  });

  /* var camadascriadas = {
      label: "Camadas Criadas",
      children: formatedlayers,
    };
    console.log(camadascriadas);
    ctl = L.control.layers.tree(camadasbase, camadascriadas, {});
  
    ctl.addTo(map); */
}

/* console.log(formatedlayers) */
/* var camadascriadas = {
  label: "Camadas Criadas",
  children: formatedlayers,
};
console.log(camadascriadas)
ctl = L.control.layers.tree(camadasbase, camadascriadas, {});
ctl.addTo(map); */
map.pm.addControls({
  position: "topleft",
  drawCircle: false,
  drawText: false,
  cutPolygon: false,
  rotateMode: false,
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
  /* L.control
      .window(map, {
        title: "Adicionar Geometria",
        modal: true,
      })
      .content(coords)
  
      .show(); */
  Formio.createForm(document.getElementById("forminsert"), {
    settings: {
      language: pt,
    },
    components: [
      {
        type: "textfield",
        label: "Título",
        tooltip: "Título da Geometria",
        placeholder: "Insira o Título.",
        validate: {
          required: true,
        },
        key: "title",
        input: true,
        inputType: "text",
      },
      {
        type: "select",
        label: "Camada",
        tooltip:
          "Seleciona em qual camada(s) você deseja adicionar a geometria",
        key: "layers",
        placeholder: "Selecione em qual camada que você deseja adicionar",
        dataSrc: "url",
        lazyLoad: false,
        data: {
          url: "https://urbanlogics.com.br/urb/projetogeodireito/getlayers.php",
        },
        validateOn: "blur",
        validate: {
          required: true,
          customMessage: "Selecione ao menos uma camada.",
        },
        valueProperty: "layer",
        template: "<span>{{ item.layer }}</span>",
        multiple: true,
      },
      {
        type: "textarea",
        label: "Conteúdo",
        tooltip: "Contéudo que sera exibido no Popup da Geometria",
        editor: "ckeditor",
        autoExpand: false,
        validate: {
          required: true,
        },
        key: "content",
        input: true,
        inputType: "text",
      },
      {
        label: "Text Field",
        hidden: true,
        disabled: true,
        tableView: true,
        clearOnHide: false,
        key: "fname",
        type: "textfield",
        input: true,
        defaultValue: feature,
      },
      {
        label: "Text Field",
        hidden: true,
        tableView: true,
        clearOnHide: false,
        key: "color",
        type: "textfield",
        input: true,
      },
      {
        label: "Text Field",
        hidden: true,
        tableView: true,
        clearOnHide: false,
        key: "contornocolor",
        type: "textfield",
        input: true,
      },
      {
        label: "Text Field",
        hidden: true,
        tableView: true,
        clearOnHide: false,
        key: "opacidade",
        type: "textfield",
        input: true,
      },
      {
        label: "Text Field",
        hidden: true,
        tableView: true,
        clearOnHide: false,
        key: "espessura",
        type: "textfield",
        input: true,
      },
      {
        label: "Salvar",
        showValidations: false,
        theme: "success",
        disableOnInvalid: true,
        tableView: false,
        key: "submit",
        type: "button",
        input: true,
        saveOnEnter: false,
        size: "lg",
      },
    ],
  }).then(function (form) {
    form.on("submit", function (submission) {
      /* console.log(submission);
            form.getComponent('color').setValue($("#exampleColorInput").val()) */
      submission.data.color = $("#exampleColorInput").val();
      submission.data.contornocolor = $("#exampleColorInputcontorno").val();
      submission.data.opacidade = $("#opacidade").val();
      submission.data.espessura = $("#espessura").val();
      console.log(submission);

      Swal.fire({
        title: "Salvar Geometria?",
        showDenyButton: true,
        confirmButtonText: "Salvar",
        denyButtonText: `Cancelar`,
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            type: "post",
            async: false,
            url: "https://urbanlogics.com.br/urb/projetogeodireito/salvageometria.php",
            data: {
              content: JSON.stringify(submission),
            },
            success: function (response) {
              console.log(response);
              Swal.fire({
                title: "Geometria Adicionada",
                icon: "success",
                confirmButtonText: "OK",
              }).then((result) => {
                if (result.isConfirmed) {
                  window.location.reload();
                }
              });
            },
            error: function (jqXHR, exception) {
              var msg = "";
              if (jqXHR.status === 0) {
                msg = "Not connect.\n Verify Network.";
              } else if (jqXHR.status == 404) {
                msg = "Requested page not found. [404]";
              } else if (jqXHR.status == 500) {
                msg = "Internal Server Error [500].";
              } else if (exception === "parsererror") {
                msg = "Requested JSON parse failed.";
              } else if (exception === "timeout") {
                msg = "Time out error.";
              } else if (exception === "abort") {
                msg = "Ajax request aborted.";
              } else {
                msg = "Uncaught Error.\n" + jqXHR.responseText;
              }
              console.log(msg);
            },
          });
        } else if (result.isDenied) {
          Swal.fire("Geometria não foi salva", "", "info");
        }
      });
    });
  });
  $("#myModal").modal("show");
  $("#hideonstart").show();
  /* const target = document.querySelector('textarea.rich');
          target.addEventListener('paste', (event) => {
            const clipboard_data = (event.clipboardData || window.clipboardData);
            const text_paste_content = clipboard_data.getData('text/plain');
            const html_paste_content = clipboard_data.getData('text/html');
            console.log(text_paste_content)
            console.log(html_paste_content)
          }); */
  /* layer.bindPopup(coords); */
}
/* L.control.bigImage({ position: "bottomleft" }).addTo(map);
const search = new GeoSearch.GeoSearchControl({
  provider: new GeoSearch.OpenStreetMapProvider(),
}); */

map.setGeocoder("Nominatim" /* , { ... Geocoder options ... } */);
map.addControl(L.control.search());
map.on("pm:create", function (e) {
  var layer = e.layer;
  setPupup(layer);
  layer.on("pm:update", function (e) {
    setPupup(e.layer);
  });
});
map.on("pm:remove", function (e) {
  Swal.fire({
    title: "Excluir Geometria?",
    showDenyButton: true,
    confirmButtonText: "Excluir",
    denyButtonText: `Cancelar`,
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        type: "post",
        async: false,
        url: "https://urbanlogics.com.br/urb/projetogeodireito/excluirgeometria.php",
        data: {
          id: e.layer.feature.properties.id,
        },
        success: function (response) {
          console.log(response);
          Swal.fire({
            title: "Geometria Removida",
            icon: "success",
            confirmButtonText: "OK",
          }).then((result) => {
            if (result.isConfirmed) {
              window.location.reload();
            }
          });
        },
        error: function (jqXHR, exception) {
          var msg = "";
          if (jqXHR.status === 0) {
            msg = "Not connect.\n Verify Network.";
          } else if (jqXHR.status == 404) {
            msg = "Requested page not found. [404]";
          } else if (jqXHR.status == 500) {
            msg = "Internal Server Error [500].";
          } else if (exception === "parsererror") {
            msg = "Requested JSON parse failed.";
          } else if (exception === "timeout") {
            msg = "Time out error.";
          } else if (exception === "abort") {
            msg = "Ajax request aborted.";
          } else {
            msg = "Uncaught Error.\n" + jqXHR.responseText;
          }
          console.log(msg);
        },
      });
    } else if (result.isDenied) {
      Swal.fire("Geometria não foi removida", "", "info");
    }
  });
});
map.on("popupopen", function (e) {
  var px = map.project(e.target._popup._latlng); // find the pixel location on the map where the popup anchor is
  px.y -= e.target._popup._container.clientHeight / 2; // find the height of the popup container, divide by 2, subtract from the Y axis of marker location
  map.panTo(map.unproject(px), {
    animate: true,
  });
});

/* var source = L.WMS.source(
  "http://siscom.ibama.gov.br/geoserver/ows?version=1.3.0",
  {
    transparent: true,
  }
);
source.getLayer("publica:vw_brasil_adm_embargo_a").addTo(map); */
/* L.control
    .coordinates({
        position: "bottomleft", //optional default "bootomright"
        decimals: 2, //optional default 4
        decimalSeperator: ".", //optional default "."
        labelTemplateLat: "Latitude: {y}", //optional default "Lat: {y}"
        labelTemplateLng: "Longitude: {x}", //optional default "Lng: {x}"
        enableUserInput: true, //optional default true
        useDMS: false, //optional default false
        useLatLngOrder: true, //ordering of labels, default false-> lng-lat
        markerType: L.marker, //optional default L.marker
        markerProps: {}, //optional default {},
        labelFormatterLng: function (lng) {
            return lng + " lng";
        }, //optional default none,
        labelFormatterLat: function (lat) {
            return lat + " lat";
        }, //optional default none
        customLabelFcn: function (latLonObj, opts) {
            "Geohash: " + encodeGeoHash(latLonObj.lat, latLonObj.lng);
        }, //optional default none
    })
    .addTo(map); */
