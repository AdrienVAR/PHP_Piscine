#!/usr/bin/php
<?php
    $file = file_get_contents($argv[1]);
    $file = str_replace("\n", "ZZZ", $file);
    function title_upper($match)
    {
        return ($match[1].strtoupper($match[2]).$match[3]);
    }
    
    function linkname_upper($match)
    {
        return ($match[1].strtoupper($match[2]).$match[3]);
    }
    function get_link($match)
    {
        $match[0]= preg_replace_callback("/( title=\")(.*?)(\")/", "title_upper", $match[0]);
        $match[0] = preg_replace_callback("/(>)(.*?)(<)/", "linkname_upper", $match[0]);
        return ($match[0]);
    }
    $res = preg_replace_callback("/(<a )(.*?)(<\/a>)/", "get_link", $file);
    $res = str_replace("ZZZ", "\n", $res);
    echo $res;
?>
