<?php

mb_language("Japanese");
mb_internal_encoding("utf-8");

echo '<div class="topicsArea clearfix">';
xmlLoader(0);
echo '</div>';

echo '<div class="topicsArea clearfix">';
xmlLoader(1);
echo '</div>';

function xmlLoader($num){

    $rss_url = array(
        'http://www.tcd.jp/case/outxml/',
        'http://www.tcd.jp/branding/outxml/'
    );

    $count = 0;
    $maxCount = 8;
    if($num == 1){$maxCount = 4;}
    $xml = simplexml_load_file($rss_url[$num]);
    //$site_title =  $rss->channel->title;

    foreach ($xml->post as $item) {

        if ($count == $maxCount) {
            break;
        }
        $count++;

        $name = $item ->blog;
        $target = '';
        if($name=="blog"){$target = ' target="_blank"';}
        $link = $item ->url;
        $title = $item ->title;
        $alt = $item ->alt;
        $shortttl = $title;
        if(mb_strlen($title) > 23){
            $shortttl = mb_substr($title,"0","22")."...";
        }
        date_default_timezone_set('Asia/Tokyo');
        //$dc = $item ->children('http://purl.org/dc/elements/1.1/');
        $day = $item ->date;
        $time = $item ->time;
        $day = $day." ".$time;
        $key = strtotime($day);
        //echo $key."<br />";
        $thum = $item ->thum;

        echo '<dl><dt><p>'.$name.'</p></dt><dd class="pic"><a href="'.$link.'?from=top"'.$target.'><img src="'.$thum.'" alt="'.$alt.'" /></a></dd><dd class="shadow"><div><a href="'.$link.'?from=top"'.$target.'>'.$shortttl.'</a></div></dd></dl>'."\n";

    }
}



?>