<?php


echo "Internship";
echo "<br>";
echo "<br>";
//var_dump($_FILES);
//var_dump($_POST);
/*
$FileName1=$_POST['FileName1'];
echo "File1: $FileName1";
echo "<br>";
$FileName2=$_POST['FileName2'];
echo "File2: $FileName2";
echo "<br>";
*/
//die();


//File



$target_dir = "files/";
$target_file1 = $target_dir . basename($_FILES["fileToUpload1"]["name"]);
// Check if image file is a actual image or fake image
$allowed =  array('PDF');
$firstfilename = $_FILES['fileToUpload1']['name'];
$ext1 = strtoupper( pathinfo($firstfilename, PATHINFO_EXTENSION));
if(!in_array($ext1,$allowed) ) {
    echo "The file is not PDF. it is $ext1. please try again";
    die();
}else{
    move_uploaded_file($_FILES["fileToUpload1"]["tmp_name"], $target_file1);
    echo "The file ". basename( $_FILES["fileToUpload1"]["name"]). " has been uploaded.<br>";
}
$target_file2 = $target_dir . basename($_FILES["fileToUpload2"]["name"]);
$allowed =  array('PDF');
$secondfilename = $_FILES['fileToUpload2']['name'];
$ext2 = strtoupper( pathinfo($secondfilename, PATHINFO_EXTENSION));
if(!in_array($ext2,$allowed) ) {
    echo "The file is not PDF. it is $ext2. please try again";
    die();
}else{
    move_uploaded_file($_FILES["fileToUpload2"]["tmp_name"], $target_file2);
    echo "The file ". basename( $_FILES["fileToUpload2"]["name"]). " has been uploaded.<br>";
}
$News_Title=$_POST['News_Title'];
$FileName1=$_FILES["fileToUpload1"]["name"];
$FileName2=$_FILES["fileToUpload2"]["name"];
//echo "$FileName1 $FileName2";

include "model/database.php";
if(!empty($FileName1)) {
    $sql = "insert into News (News_Title,News_Lead,News_Desc) values ('$News_Title', '$FileName1','$FileName2')";
    if ($conn->query($sql) === TRUE) {
        echo "New record $News_Title created successfully<br>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

//if(!empty($FileName2)) {
//    $sql = "insert into files_table (FileName) values ('$FileName2')";
//    if ($conn->query($sql) === TRUE) {
//        echo "New record $FileName2 created successfully<br>";
//    } else {
//        echo "Error: " . $sql . "<br>" . $conn->error;
//    }
//}
?>

