<?php
  require "../database_key.php";

  $key = connection();

  $getcall = "SELECT * FROM msuser WHERE occupied = 1 and calling = 1";
  $sql = "SELECT * FROM msuser WHERE rank = 1 order by capacity";

  $run = $key->prepare($sql);
  $run->execute();

  $hasil = $key->prepare($getcall);
  $hasil->execute();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <meta charset="utf-8">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <!-- Page Title -->
    <title>Waiter Page </title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="../assets/images/logo/favicon.png" type="image/x-icon">

    <!-- CSS Files -->
    <link rel="stylesheet" href="../assets/css/animate-3.7.0.css">
    <link rel="stylesheet" href="../assets/css/font-awesome-4.7.0.min.css">
    <link rel="stylesheet" href="../assets/css/bootstrap-4.1.3.min.css">
    <link rel="stylesheet" href="../assets/css/owl-carousel.min.css">
    <link rel="stylesheet" href="../assets/css/jquery.datetimepicker.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <!-- Preloader Starts -->
    <div class="preloader">
        <div class="spinner"></div>
    </div>
     <!-- Preloader End -->

    <!-- Header Area Starts -->
    <header class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <div class="logo-area">
                        <a href="index.html"><img src="../assets/images/logo/logo.png" alt="logo" height="80px"></a>
                    </div>
                </div>
                <div class="col-lg-10">
                    <div class="custom-navbar">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>  
                    <div class="main-menu">
                        <ul>
                            <li> User <b> Waiter </b> </li> &nbsp;
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header Area End -->

    <!-- Food Area starts -->
    <section class="food-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="section-top">
                        <h3> Waiter <span class="style-change">Page</span></h3>
                        

                        <br>
                        
                    </div>
                </div>
            </div>

            

            <!-- Customer request Start -->
            <div class="row">
                <div class="col-md-4 col-sm-6">
                    <div class="single-food">
                        
                        <div class="food-content">
                            <div class="d-flex justify-content-between">
                                <h5>Customer Request</h5>
                            </div>
                            <table border="1">
                              <tr>
                                <th>No</th>
                                <th>Nama Table</th>
                                <th>Status</th>
                                <th>Tindakan</th>
                              </tr>
                              <?php $a = 0; 
                              while($baris = $hasil->fetch()):
                              $a++; ?>
                              <tr>
                                <td><?= $a; ?></td>
                                <td><?= $baris['name']; ?></td>
                                <td>
                                  <?php if($baris['calling'] == 1): ?>
                                    <p>Request Call</p>
                                  <?php endif; ?>
                                </td>
                                <td>
                                  <a href="acceptcall.php?id=<?= $baris['id']; ?>">Go to the table</a>
                                </td>
                              </tr>
                              <?php endwhile; ?>
                          </table>
                            
                        </div>
                    </div>
                </div>
    <!-- Customer request End -->

<!-- start menu -->
                    <div class="col-md-4 col-sm-6">
                    <div class="single-food">
                        
                        <div class="food-content">
                            <div class="d-flex justify-content-between">
                                <h5>Table List</h5>
                            </div>
                            <table border="1">
                              <tr>
                                <th>No</th>
                                <th>Nama Table</th>
                                <th>Kapasitas</th>
                                <th>Status</th>
                                <th>Tindakan</th>
                              </tr>
                              <?php $i = 0; 
                              while($row = $run->fetch()):
                              $i++; ?>
                              <tr>
                                <td><?= $i; ?></td>
                                <td><?= $row['name']; ?></td>
                                <td><?= $row['capacity']; ?></td>
                                <td>
                                  <?php if($row['occupied'] == 0): ?>
                                    <p>Available</p>
                                  <?php else: ?>
                                    <p>Occupied</p>
                                  <?php endif; ?>
                                </td>
                                <td>
                                  <?php if($row['occupied'] == 0): ?>
                                    <a href="avail.php?id=<?= $row['id']; ?>">Available</a>
                                  <?php else: ?>
                                    <p> Occupied </p>
                                  <?php endif; ?>
                                </td>
                              </tr>
                            <?php endwhile; ?>
                          </table>
                        </div>
                    </div>
                </div>
                <!-- End Menu -->

                <!-- start menu -->
                    <div class="col-md-4 col-sm-6">
                    <div class="single-food">
                        
                        <div class="food-content">
                            <div class="d-flex justify-content-between">
                                <h5>Order Review</h5>
                                
                            </div>
                            
                            
                             <a href="#" class="template-btn mt-3" data-toggle="modal" data-target="#myOrder"> Executive 1 </a><br>
                              <a href="#" class="template-btn mt-3" data-toggle="modal" data-target="#myOrder"> Executive 2 </a><br>
                               <a href="#" class="template-btn mt-3" data-toggle="modal" data-target="#myOrder"> Family 2 </a><br>
                        </div>
                    </div>
                </div>
                <!-- End Menu -->



    <!-- Start Order Review -->

  <div class="modal fade" id="myOrder" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
         

        </div>
        

        <div class="modal-body">
          <h4 style="color: black;">Order Review</h4>
          Table ....
          <br><br>
          <table border="1">
                              <tr>
                                <th width="15px">No</th>
                                <th width="300px">Menu Name</th><br>
                                <th width="300px">Category</th>
                                <th width="15px">Qty</th>
                              </tr>
                              <tr>
                                <td>1</td>
                                <td>Egg Rolls</td>
                                <td>Appetizer</td>
                                 <td>3</td>
                              </tr>
                              <tr>
                                <td>2</td>
                                <td>Chicken Burger</td>
                                <td>Main Menu</td>
                                 <td>1</td>
                              </tr>
                            </table>
                           
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>


<!-- End of Total Sales -->

    <!-- Javascript -->
    <script src="../assets/js/vendor/jquery-2.2.4.min.js"></script>
    <script src="../assets/js/vendor/bootstrap-4.1.3.min.js"></script>
    <script src="../assets/js/vendor/wow.min.js"></script>
    <script src="../assets/js/vendor/owl-carousel.min.js"></script>
    <script src="../assets/js/vendor/jquery.datetimepicker.full.min.js"></script>
    <script src="../assets/js/vendor/jquery.nice-select.min.js"></script>
    <script src="../assets/js/main.js"></script>
</body>
</html>
