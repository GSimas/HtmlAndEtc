 jQuery(".piechart-holder").appear(function() {
        jQuery(this).find(".chart").each(function() {
            jQuery(".chart").easyPieChart({
                barColor: "#ffc815",
                trackColor: "#404040",
                scaleColor: "#ffc815",
                size: "150",
                lineWidth: "40",
                lineCap: "butt",
                onStep: function(a, b, c) {
                    jQuery(this.el).find(".percent").text(Math.round(c));
                }
            });
        });
    });