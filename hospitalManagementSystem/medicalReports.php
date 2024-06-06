<?php
include 'connect.php';
include 'header.php';

if (isset($_POST['upload_image'])) {

    $uploadDir="images/";
    $tmp_name =$_FILES['image']['tmp_name'];
    $name=$_FILES['image']['name'];
    $size =$_FILES['image']['name'];
    $type =$_FILES ['image']['type'];
    $path = substr($name,-4,4);
    $random =rand(10000,50000);
    $random2 =rand(10000,50000);
   
    $img_name =$random.$random2.$path;
    $upload_date = date("Y-m-d H:i:s", filemtime($_FILES['image']['tmp_name']));
    $extension = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
    if(strlen($name)==0)
    {
        Header("location:medicalReports.php?selectFileError=1");
        
    
        exit;
    }
    if ($extension != 'jpg' && $extension != 'jpeg' && $extension != 'png') {
        header("Location: medicalReports.php?selectFileTypeError=1");
        exit;
    }
    

    move_uploaded_file($tmp_name,"$uploadDir/$img_name");

    $query_img =$db->prepare("INSERT INTO medical_reports  SET 
    report_name =:name,report_title =:title,report_description=:description,report_date =:upload_date");
    $upload_img =$query_img->execute(array('name' =>$img_name,'title' => $_POST['title'],'description' =>$_POST['description'],'upload_date'=>$upload_date));
    
    if ($upload_img) {
        Header("location:medicalReports.php?success=1");
    } else {
        Header("location:medicalReports.php?imagError=1");
    }
   
}

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title> Upload Medical Report </title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
       

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link"  >Upload Medical Report</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="medicalReportsList.php">Medical Report List</a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>
    <style>
            .card{
                background:transparent;
            }
           
        </style>
    <main class="login-form">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <?php if (isset($_GET['imageError'])) : ?>
                        <div class="alert alert-danger">
                            <?php echo $_GET['imageError'] ?>
                        </div>
                    <?php endif; ?>
                    <?php if (isset($_GET['selectFileError'])) : ?>
                        <div class="alert alert-danger">
                           Please select file!
                        </div>
                    <?php endif; ?>

                    <?php if (isset($_GET['selectFileTypeError'])) : ?>
                        <div class="alert alert-danger">
                        Can only be in jpeg or png file type!
                        </div>
                    <?php endif; ?>


                    <?php if (isset($_GET['success'])) : ?>
                        <div class="alert alert-success">
                        The file has been added successfully.
                        </div>
                    <?php endif; ?>
                    <div class="card " style="margin-top: 75x;">
                        <div class="card-header">Upload Medical Report</div>
                        <div class="card-body">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="form-group row">
                                    <label for="title" class="col-md-4 col-form-label text-md-right">Title</label>
                                    <div class="col-md-8">
                                    <input type="text" class="form-control"  name="title" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="description" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email_address" class="col-md-4 col-form-label text-md-right">File</label>
                                    <div class="col-md-5 " style="margin-left: 10px;">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="customFile" name="image">
                                            <label class="custom-file-label" for="customFile">Select</label>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-6 offset-md-3">
                                    <button type="submit" class="btn btn-primary " name="upload_image"  >
                                        Upload
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>

<script>
   
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>