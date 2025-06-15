<?php include "./header.php"; ?>
<?php include "./sidebar.php"; ?>
<div >
  <table class="table ">
    <thead>
      <tr>
        <th class="text-center">Mã số</th>
        <th class="text-center">Đối tượng</th>
        <th class="text-center" colspan="2">Hành động</th>
      </tr>
    </thead>
    <?php
      include_once "./config/dbconnect.php";
      $sql="SELECT * from targets";
      $result=$conn-> query($sql);
      $count=1;
      if ($result-> num_rows > 0){
        while ($row=$result-> fetch_assoc()) {
    ?>
    <tr>
      <td><?=$count?></td>
      <td><?=$row["target_name"]?></td>   
      <!-- <td><button class="btn btn-primary" >Edit</button></td> -->
      <td><button class="btn btn-danger" style="height:40px" onclick="targetDelete('<?=$row['target_id']?>')">Xóa</button></td>
      </tr>
      <?php
            $count=$count+1;
          }
        }
      ?>
  </table>

  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-secondary" style="height:40px" data-toggle="modal" data-target="#myModal">
    Thêm đối tượng
  </button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Thêm mới đối tượng</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form  enctype='multipart/form-data' action="phanloai/doituong/addTarget.php" method="POST">
            <div class="form-group">
              <label for="t_name">Đối tượng:</label>
              <input type="text" class="form-control" name="t_name" required>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-secondary" name="upload" style="height:40px">Thêm</button>
            </div>
          </form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" style="height:40px">Đóng</button>
        </div>
      </div>
      
    </div>
  </div>

  
</div>
<?php include "./footer.php"; ?>
   