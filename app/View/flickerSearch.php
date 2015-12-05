<?php
/**
 * Created by PhpStorm.
 * User: lahbib
 * Date: 17/11/2015
 * Time: 22:53
 */

require_once("../Controller/Flickr.php");
use App\Controller\Flickr;

        $Flickr = new Flickr('e9d736c6e88d3848b053cf70aa883080');
        $data = $Flickr->search(implode(" ",$_POST["q"]));
echo '<div class="row break-480px text-center"><ul class="row row-masonry simple-gallery pop-gallery">';
$images = $data['photos']['photo'];
require_once("gallery.php");