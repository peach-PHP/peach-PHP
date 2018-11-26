<?php

/*
|===============================================
|   including requires here
|===============================================
*/
require_once 'connect.php';


/*
|===============================================
|   Backend form validations
|===============================================
*/
if(!isset($_POST['file']) or empty($_POST['file'])) {
    die("Something Went Horribly Wrong !!!");
}


/*
|===============================================
|   getting filehash from form submitted
|===============================================
*/
$filehash = mysqli_real_escape_string($conn, $_POST['file']);


/*
|===============================================
|   Find file to downlaad in database and
|   set download headers
|===============================================
*/
function initDownload($filehash, $conn) {
    $query = "SELECT * FROM files WHERE file_hash = '$filehash'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $filename = $row['file_loc'];
    $mime_type = $row['mime_type'];
    $orig_name = $row['orig_name'];
    require_once 'downloader.php';
}


/*
|===============================================
|   trigger download here !!!
|===============================================
*/
initDownload($filehash, $conn);

?>