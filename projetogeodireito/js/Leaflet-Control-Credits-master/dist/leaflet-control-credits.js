// a simple control to display a logo and credits in the corner of the map, with some neat interactive behavior
// in Leaflet tradition, a shortcut method is also provided, so you may use either version:
//     new L.CreditsControl(options)
//     L.controlCredits(options)
L.controlCredits = function (options) {
    return new L.CreditsControl(options);
}

L.CreditsControl = L.Control.extend({
    options: {
        position: 'bottomright'
    },
    initialize: function(options) {
        if (! options.image) throw "L.CreditsControl missing required option: image";

        L.setOptions(this,options);
    },
    onAdd: function (map) {
        this._map = map;

        // create our container, and set the background image
        var container = L.DomUtil.create('div', 'leaflet-credits-control', container);
        /* container.style.backgroundImage = 'url(' + this.options.image + ')'; */
        container.style.backgroundColor = 'transparent';
        container.style.border = '0px';
        container.style.display = 'flex';
        container.style.gap = '10px';
        container.tabIndex = 0;
        var container3 = L.DomUtil.create('a', 'leaflet-credits-control', container);
        container3.style.backgroundImage = 'url("https://urbanlogics.com.br/urb/projetogeodireito/IMG_0426.PNG")';
        container3.style.backgroundColor = 'transparent';
        container3.style.border = '0px';
        container3.href = "https://www.gpda.ufsc.br/";
        container3.target     = '_blank';
        container3.tabIndex = 0;
        var container1 = L.DomUtil.create('a', 'leaflet-credits-control', container);
        container1.style.backgroundImage = 'url("https://urbanlogics.com.br/urb/projetogeodireito/IMG_0427.PNG")';
        container1.style.backgroundColor = 'transparent';
        container1.style.border = '0px';
        container1.href = "https://justicaecologica.ufsc.br/";
        container1.target     = '_blank';
        container1.tabIndex = 0; 
        var container2 = L.DomUtil.create('a', 'leaflet-credits-control', container);
        container2.style.backgroundImage = 'url("https://urbanlogics.com.br/urb/projetogeodireito/IMG_0428.PNG")';
        container2.style.backgroundColor = 'transparent';
        container2.style.border = '0px';
        container2.href = "https://ufsc.br/";
        container2.target     = '_blank';
        container2.tabIndex = 0;
        /* if (this.options.width)  container.style.paddingRight = this.options.width + 'px';
        if (this.options.height) container.style.height       = this.options.height + 'px'; */
        /* container3.style.height = '75px';
        container1.style.height = '75px';
        container2.style.height = '75px';  */
/*         var link        = L.DomUtil.create('div', '', container);
        link.target     = '_blank';
        link.href       = 'https://ufsc.br/';
        link.style.backgroundImage = 'url("https://png.pngtree.com/element_pic/16/11/02/bd886d7ccc6f8dd8db17e841233c9656.jpg")'; */
/*         // generate the hyperlink to the left-hand side
        var link        = L.DomUtil.create('a', '', container);
        link.target     = '_blank';
        link.href       = this.options.link;
        link.innerHTML  = this.options.text;

        // create a linkage between this control and the hyperlink bit, since we will be toggling CSS for that hyperlink section
        container.link = link;

        // clicking the control (the image bit) expands the left-hand hyperlink/text bit
        L.DomEvent.addListener(container, 'click', function () {
            var link = this.link;
            if ( L.DomUtil.hasClass(link, 'leaflet-credits-showlink') ) {
                L.DomUtil.removeClass(link, 'leaflet-credits-showlink');
            } else {
                L.DomUtil.addClass(link, 'leaflet-credits-showlink');
            }
        });
        L.DomEvent.addListener(container, 'keydown', function(event) {
            if (event.key == 'Enter') container.click();
        }); */

        // keep mouse events from falling through to the map: don't drag-pan or double-click the map on accident
        L.DomEvent.disableClickPropagation(container);
        L.DomEvent.disableScrollPropagation(container);

        // keep a reference to our container and to the link
        this._container = container;
        /* this._link      = link; */

        // all done
        return container;
    },
});
