<?php // เรียกใช้ไฟล์ เชื่อมต่อ  database
    include("conf/connect_db.php");
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4"
        crossorigin="anonymous">

    <link rel="stylesheet" href="assets/css/main.css">
    <title>MY Portfolio</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-secondary fixed-top text-uppercase" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="#page-top">MY Portfolio</a>
            <button class="navbar-toggler navbar-toggler-right text-uppercase bg-primary text-white rounded" type="button" data-toggle="collapse"
                data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fa fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item mx-0 mx-lg-1">
                        <a class="nav-link py-3 px-0 px-lg-3" href="#portfolio">Portfolio</a>
                    </li>
                    <li class="nav-item mx-0 mx-lg-1">
                        <a class="nav-link py-3 px-0 px-lg-3" href="#about">About</a>
                    </li>
                    <li class="nav-item mx-0 mx-lg-1">
                        <a class="nav-link py-3 px-0 px-lg-3" href="#contact">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <header class="masthead bg-primary text-white text-center">
        <div class="container" style="letter-spacing: 2px;">
            <!-- <img class="img-fluid mb-5 d-block mx-auto rounded-circle" src="assets/images/1.jpg" alt=""> -->
            <h1 class="text-uppercase font5em mb-0">Portfolio</h1>
            <p>
                <h2 class="font-weight-light mb-0">Web Developer - Fullstack Developer, MEAN Stack (Mongodb,Express,Angular,NodeJs)</h2>
            </p>
        </div>
    </header>


    <section class="portfolio" id="portfolio">
        <div class="container">
            <h2 class="text-center text-uppercase text-secondary mb-0">Portfolio</h2>
            <hr class="star-dark mb-5">
            <div class="row">
                <div class="col-md-6 col-lg-4">
                    <a class="portfolio-item d-block mx-auto shadow-sm" href="#portfolio-modal-1">
                        <img class="img-fluid" src="assets/images/1.jpg" alt="">
                    </a>
                </div>

                <div class="col-md-6 col-lg-4">
                    <a class="portfolio-item d-block mx-auto shadow-sm" href="#portfolio-modal-2">
                        <img class="img-fluid" src="assets/images/1.jpg" alt="">
                    </a>
                </div>

                <div class="col-md-6 col-lg-4">
                    <a class="portfolio-item d-block mx-auto shadow-sm" href="#portfolio-modal-3">
                        <img class="img-fluid" src="assets/images/1.jpg" alt="">
                    </a>
                </div>

                <div class="col-md-6 col-lg-4">
                    <a class="portfolio-item d-block mx-auto shadow-sm" href="#portfolio-modal-4">
                        <img class="img-fluid" src="assets/images/1.jpg" alt="">
                    </a>
                </div>

                <div class="col-md-6 col-lg-4">
                    <a class="portfolio-item d-block mx-auto shadow-sm" href="#portfolio-modal-5">
                        <img class="img-fluid" src="assets/images/1.jpg" alt="">
                    </a>
                </div>

                <div class="col-md-6 col-lg-4">
                    <a class="portfolio-item d-block mx-auto shadow-sm" href="#portfolio-modal-6">
                        <img class="img-fluid" src="assets/images/1.jpg" alt="">
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Message</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql = "SELECT * FROM tb_contact";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<th>".$row['contact_name']."</th>";
                                    echo "<th>".$row['contact_email']."</th>";
                                    echo "<th>".$row['contact_phone']."</th>";
                                    echo "<th>".$row['contact_message']."</th>";
                                    echo "<th><a href='".$_SERVER['PHP_SELF']."?id=".$row['contact_id']."'>แก้ไขข้อมูล</th>";
                                    echo "<th><a href='del_contact.php?id=".$row['contact_id']."'>ลบข้อมูล</th>";
                                    
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr>";
                                echo "<th colspan='4'>No data available</th>";
                                echo "</tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
            
            <?php
                if(isset($_GET['id'])){
                    $sql    = "SELECT * FROM tb_contact WHERE contact_id = '".$_GET['id']."'";
                    $result = $conn->query($sql);
                    $row    = $result->fetch_assoc();

            ?>
                <!-- สำหรับแก้ไขข้อมูล -->
                <form action="edit_contact.php" method="POST" >
                    <input type="hidden" name="contact_id" value="<?php echo $row['contact_id']; ?>" >
                    <div class="form-group">
                        <label >Name</label>
                        <input type="text" name="Name" value="<?php echo $row['contact_name']; ?>" class="form-control"  placeholder="Name">
                    </div>
                    <div class="form-group">
                        <label >Email</label>
                        <input type="email" name="Email" value="<?php echo $row['contact_email']; ?>" class="form-control"  placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label >Phone</label>
                        <input type="text" name="Phone" value="<?php echo $row['contact_phone']; ?>" class="form-control"  placeholder="Phone">
                    </div>
                    <div class="form-group">
                        <label >Message</label>
                        <textarea class="form-control" name="Message" rows="3">
                            <?php echo $row['contact_message']; ?> 
                        </textarea>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            <?php 
                } else { 
            ?>
                <!-- สำหรับเพิ่มข้อมูล -->
                <form action="add_contact.php" method="POST" >
                    <div class="form-group">
                        <label >Name</label>
                        <input type="text" name="Name" value="" class="form-control"  placeholder="Name">
                    </div>
                    <div class="form-group">
                        <label >Email</label>
                        <input type="email" name="Email" value="" class="form-control"  placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label >Phone</label>
                        <input type="text" name="Phone" value="" class="form-control"  placeholder="Phone">
                    </div>
                    <div class="form-group">
                        <label >Message</label>
                        <textarea class="form-control" name="Message" value="" rows="3"></textarea>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            <?php 
                }  
            ?>
        </div>
    </section>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm"
        crossorigin="anonymous"></script>
</body>

</html>