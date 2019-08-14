<?php

class Varien_Data_Form_Element_Fmgscript extends Varien_Data_Form_Element_Abstract {

    public function __construct($attributes = array()) {
        parent::__construct($attributes);
        $this->setType('selectordimensions');
    }

    /**
     * Generates element html
     *
     * @return string
     */
    public function getElementHtml() {
        $data = json_decode($this->getValue());

        $html = "<input type= 'hidden' class='' value='" . $this->getEscapedValue() . "' name='groups[settings][fields][selector][value]' id='flashmediagallery_settings_selector'/>";
        $html .= "<table id='fmg-selectors'><thead><tr><th>#</th><th>css selector</th><th>width(px)</th><th>height(px)</th></tr></thead><tbody>";
        for ($i = 0; $i < 10; $i++) {
            $html.="<tr>"
                    . "<td>" . ($i + 1) . "</td>"
                    . "<td><input type='text' id='selector-" . ($i + 1) . "' style='width:250px' value='".$data[$i]->selector."'/></td>"
                    . "<td><input type='text' id='width-" . ($i + 1) . "' style='width:60px' value='".$data[$i]->width."'/></td>"
                    . "<td><input type='text' id='height-" . ($i + 1) . "' style='width:60px' value='".$data[$i]->height."'/></td>"
                    . "</tr>";
        }
        $html.= "</tbody></table>";
        $html.=" 
            <script>
            document.observe('dom:loaded', function() {

                $$('#fmg-selectors INPUT').each(function(e) {
                    
                    e.observe('change', function() {
                        data=new Array; 
                       $$('#fmg-selectors TBODY TR').each(function(tr){
                          tds=tr.select('INPUT');
                            data.push({selector:tds[0].getValue(),width:tds[1].getValue(),height:tds[2].getValue()});
                            
                       })
                       flashmediagallery_settings_selector.value=Object.toJSON(data);
                    })
                })


            })</script>

        ";
        return $html;
    }

}
