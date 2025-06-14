
        <?php
            include "./adminHeader.php";
            include_once "./config/dbconnect.php";
        ?>
        <?php include "./sidebar.php"; ?>
<section class="content">
    <div id="main-content" class="container allContent-section py-4">
        <div class="row">
            <div class="col-sm-3">
                <div class="card" style="background-color: #836FFF;">
                    <i class="fa fa-users  mb-2" style="font-size: 70px;"></i>
                    <h4 style="color:black;">Tổng số khách hàng</h4>
                    <h5 style="color:black;">
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
            </div>
            <div class="col-sm-3">
                <div class="card" style="background-color: #836FFF;">
                    <i class="fa fa-th-large mb-2" style="font-size: 70px;"></i>
                    <h4 style="color:black;">Tổng số loại sản phẩm</h4>
                    <h5 style="color:black;">
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
            </div>
            <div class="col-sm-3">
            <div class="card" style="background-color: #836FFF;">
                    <i class="fa fa-th mb-2" style="font-size: 70px;"></i>
                    <h4 style="color:black;">Tổng số sản phẩm</h4>
                    <h5 style="color:black;">
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
            </div>
            <div class="col-sm-3">
                <div class="card" style="background-color: #836FFF;">
                    <i class="fa fa-list mb-2" style="font-size: 70px;"></i>
                    <h4 style="color:black;">Tổng số đơn hàng</h4>
                    <h5 style="color:black;">
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
        </div>
        
    </div>
            
        <?php
            if (isset($_GET['categories']) && $_GET['categories'] == "success") {
                echo '<script> alert("Category Successfully Added")</script>';
            }else if (isset($_GET['categories']) && $_GET['categories'] == "error") {
                echo '<script> alert("Adding Unsuccess")</script>';
            }
            if (isset($_GET['size']) && $_GET['size'] == "success") {
                echo '<script> alert("Size Successfully Added")</script>';
            }else if (isset($_GET['size']) && $_GET['size'] == "error") {
                echo '<script> alert("Adding Unsuccess")</script>';
            }
            if (isset($_GET['variation']) && $_GET['variation'] == "success") {
                echo '<script> alert("Variation Successfully Added")</script>';
            }else if (isset($_GET['variation']) && $_GET['variation'] == "error") {
                echo '<script> alert("Adding Unsuccess")</script>';
            }
        ?>
</section>
<?php include "./footer.php"; ?>