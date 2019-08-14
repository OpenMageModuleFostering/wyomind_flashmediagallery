

document.observe("dom:loaded", function() {

    data = fmg_selector.evalJSON();
    paths = new Array;
    data.each(function(s) {
        if (s.selector != "") {
            $$(s.selector).each(function(img) {
                src = img.src;


                if (img.readAttribute("height"))
                    height = img.readAttribute("height")
                else
                    height = s.height
                if (img.readAttribute("width"))
                    width = img.readAttribute("width")
                else
                    width = s.width
                
                if (src.indexOf('.swf') > -1) {

                    embed = Builder.node("EMBED", {"src": src, "type": "application/x-shockwave-flash", "allowscriptaccess": "false", "allowfullscreen": "true", "width": height, "height": width, "wmode": "transparent"})
                    img.replace(embed)
                }
                if (src.indexOf('.flv') > -1) {

                    embed = Builder.node("EMBED", {"src": src, "width": height, "height": width})
                    img.replace(embed)
                }

            })
        }
    })
})

