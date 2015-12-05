<?php
/**
 * Created by PhpStorm.
 * User: lahbib
 * Date: 21/11/2015
 * Time: 11:56
 */

namespace App\Controller;

use \App\Model\FileModel;
require_once("app/Model/FileModel.php");
require_once("AppController.php");
require_once("Flickr.php");
require_once("ExifTool.php");
require_once("ImageUploader.php");

class ImagesController extends AppController
{
    private $actions;
    private $current_action;
    private $uploader;
    
    public function __construct($current_action)
    {
        $this->uploader = new ImageUploader("../uploads/");
        $this->flickr = new Flickr('e9d736c6e88d3848b053cf70aa883080');
        $this->exiftool = new ExifTool("");
        $this->current_action = $current_action;
        $this->actions = array (
            'home' => 'homeAction',
            'download' => "downloadAction",
            'downloadXMP' => "downloadXMPAction",
            'search' => "searchAction",
            'upload' => "uploadAction",
        );
    }

    public function dispatch()
    {
        if ($this->current_action!==null) {
            if (array_key_exists($this->current_action,$this->actions)) {
                if (method_exists($this,$this->actions[$this->current_action])) {
                    $method = $this->actions[$this->current_action];
                    return $this->$method();
                }
            }
        } else
            return $this->homeAction();
    }

    public function homeAction()
    {
        $images=json_decode(file_get_contents("images.json"),true);
        return $this->render('index',compact('images'));

    }

    public function downloadAction(){
        if (file_exists("app/uploads/".$_GET["img"])) {
            header('Content-Type: image/' . pathinfo($_GET["img"], PATHINFO_EXTENSION));
            header("Content-Disposition: attachment; filename=" . $_GET["img"]);
            print file_get_contents("app/uploads/".$_GET["img"]);
        }else{
            echo($_GET["img"]." not found");
        }
    }

    public function downloadXMPAction(){
        $file_name=basename($_GET["file"],pathinfo($_GET["file"], PATHINFO_EXTENSION))."xmp";
        if (file_exists("app/data/xmp/".$file_name)) {
            header("Content-Disposition: attachment; filename=" . urlencode($file_name));
            //header("Content-Type: application/force-download");
            //header("Content-Type: application/octet-stream");
            //header("Content-Type: application/download");
            header("Content-type: text/xml");
            header("Content-Description: File Transfer");
            header("Content-Length: " . filesize("app/data/xmp/".$file_name));
            flush(); // this doesn't really matter.

            $fp = fopen("app/data/xmp/".$file_name, "r");
            while (!feof($fp))
            {
                echo fread($fp, 65536);
                flush(); // this is essential for large downloads
            }
            fclose($fp);
        }
    }

    function searchAction(){
        $data = $this->flickr->search($_GET["q"]);
        $images = $data['photos']['photo'];
        return $this->render('gallery',compact('images'));

    }

    public function uploadAction(){
        $uploaded_file = $this->uploader->upload();
        if(isset($uploaded_file)){
            $this->exiftool->getXMPdata($uploaded_file);
            $metadatas=$this->exiftool->getMetadata($uploaded_file);
            $data = array(array("SourceFile" => "{$metadatas[0]["SourceFile"]}",
                "XMP:Title" => "image",
                "XMP:Rights" => "image",
                "XMP:Creator" => "image",
                "XMP:City" => "image",
                "XMP:Country" => "image",
                "IPTC:Credit" => "image",
                "IPTC:Source" => "image"
            ));
            file_put_contents('app/data/tmp.json', json_encode($data));
            $this->exiftool->setMetadata($uploaded_file,"app/data/tmp.json");
            $model = new FileModel(pathinfo(basename($uploaded_file))['filename'] . ".json", "app/data/");
            $model->saveToFile($this->exiftool->getMetadata($uploaded_file));
            return $this->homeAction();
            //header('Location: http://127.0.0.1:82/projects/MVCProject/');
            //die();
        }else{

        }
    }

}