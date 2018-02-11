
<form action="uploadimage.php" method="POST" enctype="multipart/form-data">
  <label for="avatar">Choose Image</label>
 <input type="file" name="file"> //this input creates an upload file button
 <button type="sumbit" name="submit">Upload Profile Image</button> //creates a button so something happens when we click.
 </form>
  //we need to tell our php script where to upload the file to. Either a folder in the root, or into the database.

<?php

if (isset($_POST['sumbit'])) //parameters to be checked. If statment to check if we did actually click the button inside our form in order to sumbit the image. Brackets = the name we're checking for inside the post method is submits, because we used sumbit as the name inside our button. If we click the button, then it needs to run the code in here. Inside the brackets is the name of the file which is now "file".
{  $file = $_FILES['file']; //get information of the file, so create a variable. $_FILES is a superglobal, which gets all the information from the file that we want to upload using an input from a form.

  $fileName = $_FILES['file']['name'];
  $fileTmpName = $_FILES['file']['tmp_name']; //temporary location of the file
  $fileSize = $_FILES['file']['size']; // the size of the file
  $fileError = $_FILES['file']['error']; // if we get an error from the file
  $fileType = $_FILES['file']['type']; //the type of file
  //all the information from the file. We can also tell it which type of files we want to allow to be uploaded.
  $fileExt = explode('.', $fileName); //explode = take apart a certain string. When we do an explode, we get an array.
  $fileActualExt = strtolower(end($fileExt));

  //create an array with information inside of it of the file extensions we want to allow inside.
  $allowed = array('jpg', 'jpeg', 'png');
  //next we want to check and see if the file is allowed to get uploaded inside the website, if it has the proper extensions.
  //then we create another if statement inside the current one, to see if any of these extensions we listed up there is inside the variable we created.
//if either a jpg, jpeg, or png is inside of the fileActualExt, then it will be allowed.
  if (in_array($fileActualExt, $allowed)) {
    if ($fileError === 0) {
      if($fileSize < 1000000) //1000000 kilobytes = 1mb. If the file size is less than 1mb, it will upload.
      {
$fileNameNew = uniqi('', true).".".$fileActualExt; //this creates a new id based on the microseconds that we're in right now in current time format. Cannot get replaced by another user if someone uploads a file with the same name.
$fileDestination = 'uploads/'.$fileNameNew;
move_upload($fileTmpName, $fileDestination);
header("Location: profile.php?uploadsuccess");
      } else {
         echo "Your file is too big.";
      }
    } else {
      echo "There was an error uploading your file.";
    }

  } else {
    echo "You cannot upload files of this type.";
  }
}

 ?>
