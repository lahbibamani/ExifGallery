<?php
use \App\Controller\ImageUploader;
use \App\Controller\ExifTool;
use \App\Model\FileModel;
require_once("../Model/FileModel.php");
require_once("ImageUploader.php");
require_once("ExifTool.php");

$uploader = new ImageUploader("../uploads/");
$uploaded_file=$uploader->upload();

if(isset($uploaded_file)){
    $exiftool = new ExifTool("");
    $exiftool->getXMPdata($uploaded_file);
    $metadatas=$exiftool->getMetadata($uploaded_file);
   /* $data = array(array("SourceFile" => "{$metadatas[0]["SourceFile"]}",
        "XMP:Title" => "image",
        "XMP:Rights" => "image",
        "XMP:Creator" => "image",
        "XMP:City" => "image",
        "XMP:Country" => "image",
        "IPTC:Credit" => "image",
        "IPTC:Source" => "image"
    ));
    file_put_contents('../data/tmp.json', json_encode($data));
    $exiftool->setMetadata($uploaded_file,"../data/tmp.json");*/
    $model = new FileModel(pathinfo(basename($uploaded_file))['filename'] . ".json", "../data/");
    $metas=$exiftool->getMetadata($uploaded_file);
    $model->saveToFile($metas);


    $img = array(
        'name' => $metas[0]["XMP"]["Title"],
        'creator' => $metas[0]['XMP']["Creator"],
        'filename' => pathinfo(basename($uploaded_file))['filename'],
        'url' => "app/uploads/".$metas[0]["File"]["FileName"]
    );

    append_to_file(json_encode($img),"../../images.json");

}

function append_to_file($data=array(),$file){
    if(file_exists($file)) {

        $inp = file_get_contents($file);
        $tempArray = json_decode($inp, true);
        if(isset($tempArray) && !empty($tempArray))
            array_push($tempArray, $data);
        else
            $tempArray=[$data];
        $jsonData = json_encode($tempArray);
        file_put_contents($file, $jsonData);
    }else
        echo "not exists";


}