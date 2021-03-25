<?php
if (! function_exists('isActive')) {

    function isActive($href, $class = 'active')
    {
        return $class = (strpos(Route::currentRouteName(), $href) === 0 ? $class : '');
    }
}

function ver($data1 = null, $data2 = null, $data3 = null, $data4 = null, $data5 = null)
{
    echo "<div style='
    box-shadow: 0px 5px 10px 8px #888888;
    padding-top: 5px;
    padding-right: 5px;
    padding-bottom: 5px;
    padding-left: 8px;
    width: 600px; border-box;
    float: left;
    z-index:1;
    position: relative;
    margin: 10px 10px 10px 10px;
    border: 1px solid #BFBFBF;'>";
    echo "<pre>";
    highlight_string("<?php \n\$data =\n" . var_export($data1, true) . ";\n?>");
    if ($data2) {
        highlight_string("\n<?php \n\$data =\n" . var_export($data2, true) . ";\n?>");
    }
    if ($data3) {
        highlight_string("\n<?php \n\$data =\n" . var_export($data3, true) . ";\n?>");
    }
    if ($data4) {
        highlight_string("\n<?php \n\$data =\n" . var_export($data4, true) . ";\n?>");
    }
    if ($data5) {
        highlight_string("\n<?php \n\$data =\n" . var_export($data5, true) . ";\n?>");
    }
    echo "</pre>";
    echo "</div>\n";
}
