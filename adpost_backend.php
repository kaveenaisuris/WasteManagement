<?php //  include "db.php";   ?>
<!---->
<!---->
<?php
//
//if(isset($_POST['submit'])) {
//
//    $location = $_POST["location"];
//    $pattern = "/[\,]+/";
//    $text = "My ,favourite colors are red, green and blue";
//    $parts = preg_split($pattern, $location);
//
//// Loop through parts array and display substrings
//    $lat = $parts[0];
//    $lng = $parts[1];
//    $description = $_POST["description"];
//
//
////
////                    $target_dir = "./images";
////                    // Check if image file is a actual image or fake image
////                    $target_file = $target_dir . basename($_FILES['fileToUpload']['name']);
////                    if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_file)) {
////
////                        $file="$target_file";
////
////                    }else {
////                        $uploadErr="* image upload failed";
////                    }
//
//    $uploaddir = './uploads/';
//    $uploadfile = $uploaddir . basename($_FILES['fileToUpload']['name']);
//
//    if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $uploadfile)) {
//        echo '<script type="text/javascript">';
//        echo 'alert("review your answer");';
//        echo 'window.location.href = "index.php";';
//        echo '</script>';
//
//
//    } else {
//        echo "Possible file upload attack!\n";
//    }
//
//    if (empty($location)) {
//        $_SESSION['errorMessage'] = "Location Is Emtpy";
//        echo '<script type="text/javascript">';
//        echo 'alert("Location Is Emtpy");';
//        echo 'window.location.href = "adpost.php";';
//        echo '</script>';
//
//    } else if ($description > 50) {
//        $_SESSION['errorMessage'] = "Title Is Too Long";
//        echo '<script type="text/javascript">';
//        echo 'alert("Title Is Too Long");';
//        echo 'window.location.href = "adpost.php";';
//        echo '</script>';
//
//    } else {
//
//        $lat = (float)$lat;
//        $lng = (float)$lng;
//
//        $query = "INSERT INTO gpostnonapproved (description,img,lat,lng) values('{$description}','{$uploadfile}','[$lat]','[$lng]')";
//
//        $create_event_query = mysqli_query($connection, $query);
//        if (!$create_event_query) {
//            die('QUERY FAILED' . mysqli_error($connection));
//        }
//
//        header("Location: allpost.php");
//    }
//}
?>

<?php   include "db.php";   ?>


<?php

if(isset($_POST['submit'])){

    $pattern = "/[\,]+/";
    $location=($_POST["location"]);
    $description =($_POST["description"]);
    $parts = preg_split($pattern, $location);
	
// Loop through parts array and display substrings
    $lat = (float)$parts[0];
    $lng = (float)$parts[1];
    echo $lat . $lng;




//
//                    $target_dir = "./images";
//                    // Check if image file is a actual image or fake image
//                    $target_file = $target_dir . basename($_FILES['fileToUpload']['name']);
//                    if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_file)) {
//
//                        $file="$target_file";
//
//                    }else {
//                        $uploadErr="* image upload failed";
//                    }

    $uploaddir = './uploads/';
    $uploadfile = $uploaddir . basename($_FILES['fileToUpload']['name']);

    if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $uploadfile)) {
        echo "File is valid, and was successfully uploaded.\n";
    } else {
        echo "Possible file upload attack!\n";
    }


    $query ="Insert into gpostnonapproved(description,img,lat,lng)";
    $query .="values('{$description}','{$uploadfile}','{$lat}','{$lng}')";

    $create_event_query=mysqli_query($connection,$query);
    if(!$create_event_query){
        die('QUERY FAILED'.mysqli_error($connection));
    }

    header ("Location: index.php");
}
?>
