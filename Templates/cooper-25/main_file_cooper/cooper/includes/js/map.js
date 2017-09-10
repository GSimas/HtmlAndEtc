// Map  ------------------
    jQuery("#map-canvas").gmap3({
        action: "init",
        marker: {
            values: [ {
                latLng: [ object_name1.some_string1, object_name2.some_string2 ],
                data: object_name4.some_string4,
                options: {
                 icon: object_name3.some_string3
                }
            } ],
            options: {
                draggable: false
            },
            events: {
                mouseover: function(a, b, c) {
                    var d = jQuery(this).gmap3("get"), e = jQuery(this).gmap3({
                        get: {
                            name: "infowindow"
                        }
                    });
                    if (e) {
                        e.open(d, a);
                        e.setContent(c.data);
                    } else jQuery(this).gmap3({
                        infowindow: {
                            anchor: a,
                            options: {
                                content: c.data
                            }
                        }
                    });
                },
                mouseout: function() {
                    var a = jQuery(this).gmap3({
                        get: {
                            name: "infowindow"
                        }
                    });
                    if (a) a.close();
                }
            }
        },
        map: {
            options: {
                zoom: 14,
                zoomControl: true,
                mapTypeControl: true,
                scaleControl: true,
                scrollwheel: false,
                streetViewControl: true,
                draggable: true,
                styles: [ {
                    featureType: "landscape",
                    stylers: [ {
                        saturation: -100
                    }, {
                        lightness: 65
                    }, {
                        visibility: "on"
                    } ]
                }, {
                    featureType: "poi",
                    stylers: [ {
                        saturation: -100
                    }, {
                        lightness: 51
                    }, {
                        visibility: "simplified"
                    } ]
                }, {
                    featureType: "road.highway",
                    stylers: [ {
                        saturation: -100
                    }, {
                        visibility: "simplified"
                    } ]
                }, {
                    featureType: "road.arterial",
                    stylers: [ {
                        saturation: -100
                    }, {
                        lightness: 30
                    }, {
                        visibility: "on"
                    } ]
                }, {
                    featureType: "road.local",
                    stylers: [ {
                        saturation: -100
                    }, {
                        lightness: 40
                    }, {
                        visibility: "on"
                    } ]
                }, {
                    featureType: "transit",
                    stylers: [ {
                        saturation: -100
                    }, {
                        visibility: "simplified"
                    } ]
                }, {
                    featureType: "administrative.province",
                    stylers: [ {
                        visibility: "off"
                    } ]
                }, {
                    featureType: "water",
                    elementType: "labels",
                    stylers: [ {
                        visibility: "on"
                    }, {
                        lightness: -25
                    }, {
                        saturation: -100
                    } ]
                }, {
                    featureType: "water",
                    elementType: "geometry",
                    stylers: [ {
                        hue: "#ffff00"
                    }, {
                        lightness: -25
                    }, {
                        saturation: -97
                    } ]
                } ]
            }
        }
    });