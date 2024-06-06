<?php
include 'connect.php';
include 'config.php';
include 'header.php';

global $report_id;
$query_reports=$db->prepare("SELECT * FROM medical_reports ORDER BY report_id DESC ");
$query_reports->execute();
$reports = $query_reports->fetchAll(PDO::FETCH_ASSOC);



if(isset($_POST['open_image']))
{
   
    foreach($reports  as $report)
    {   
        ?>
            <img style="width:200px; height:200px; border:3px solid #ddd;"src="images/<?php echo $report['report_name'];?>" >
        <?php
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
    <style>
        .login-form {
            margin-top: 50px;
        }
        #medical_report_upload{
            margin-top: -200px;
            margin-left:auto;
        }
        #medical_report_list{
            margin-top: -200px;
            margin-left:auto;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
        <div class="container">
            
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="medicalReports.php" id="medical_report_upload">Medical Report Upload</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="medicalReportsList.php" id="medical_report_list">Medical Report List</a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>
    <?php 
    if( !(isset($_POST['open_image'])))
    {
    ?>
    <main class="login-form">
        <div class="container">
            <div class="row">
                <?php foreach ($reports as $v) : ?>
                    <?php
                    $image = PATH . "images/" . $v['report_name'];
                    ?>
                    <div class="col-md-3">
                        <div class="card">
                            <img class="card-img-top" src="<?php echo $image ?>" alt="Card image cap" width="300" height="200">
                            <div class="card-body">
                            <form action="" method="POST">
                                <h5 class="card-title"><?php echo $v['report_title'] ?></h5>
                                <p class="card-text"><?php echo $v['report_description'] ?></p>
                                <?php  $report_id =$v['report_id'];?>
                                <button type="submit" class="btn btn-primary "  style ="width: 200px; height: 50px;" name="open_image"  >
                                        Go Medical Report
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </main>
    <?php }?>
</body>

</html>