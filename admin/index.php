<?php
include_once "./config/dbconnect.php";
?>
<?php include "./header.php"; ?>
<body>
  <?php include "./sidebar.php"; ?>
  <main>
    <div class="container all Content-section">
       <div class="container">
            <h4 style="color:white;">Tổng số khách hàng</h4>
                    <h5 style="color:white;">
                    <?php
                        $sql="SELECT * from Customers";
                        $result=$conn-> query($sql);
                        $count=0;
                        if ($result-> num_rows > 0){
                            while ($row=$result-> fetch_assoc()) {
                    
                                $count=$count+1;
                            }
                        }
                        echo $count;
                    ?></h5>
        </div>
        <div class="container">
            <h4 style="color:white;">Tổng số loại sản phẩm</h4>
                    <h5 style="color:white;">
                    <?php
                       
                       $sql="SELECT * from categories";
                       $result=$conn-> query($sql);
                       $count=0;
                       if ($result-> num_rows > 0){
                           while ($row=$result-> fetch_assoc()) {
                   
                               $count=$count+1;
                           }
                       }
                       echo $count;
                   ?>
                   </h5>
        </div>
        <div class="container">
            <h4 style="color:white;">Tổng số sản phẩm</h4>
                    <h5 style="color:white;">
                    <?php
                       
                       $sql="SELECT * from products";
                       $result=$conn-> query($sql);
                       $count=0;
                       if ($result-> num_rows > 0){
                           while ($row=$result-> fetch_assoc()) {
                   
                               $count=$count+1;
                           }
                       }
                       echo $count;
                   ?>
                   </h5>
        </div>
        <div class="container">
            <h4 style="color:white;">Tổng số đơn hàng</h4>
                    <h5 style="color:white;">
                    <?php
                       
                       $sql="SELECT * from orders";
                       $result=$conn-> query($sql);
                       $count=0;
                       if ($result-> num_rows > 0){
                           while ($row=$result-> fetch_assoc()) {
                   
                               $count=$count+1;
                           }
                       }
                       echo $count;
                   ?>
                   </h5>
        </div>
    </div>
  </main>
<?php include "./footer.php"; ?>