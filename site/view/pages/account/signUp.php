<div class="wrapper" style="margin:0px auto;width:1050px;">
   <h2 style="padding: 20px; background:#c4c4c4;border-radius:10px;color:green">Đăng ký</h2>
   <img src="../../../../public/img/item1.jpg" alt="">
   <form class="row g-3 needs-validation" method="post" enctype="multipart/form-data" novalidate>
      <?php if(isset($check)){
            ?>
      <button class="btn btn-success"><?php echo $check; ?></button>

      <?php
         }
         ?>

      <div class="col-md-6">
         <label for="validationCustom03" class="form-label">Mã khách hàng</label>
         <input type="text" class="form-control" name="makh"
            value="<?php if(!empty($dataupdate)) echo $dataupdate['customer_id'] ?>" id="validationCustom03" disabled
            required>
         <div style="color:red">
            <!-- <?php if(!empty($err['makh'])) echo $err['makh']; ?> -->
         </div>
      </div>
      <div class="col-md-6">
         <label for="validationCustom03" class="form-label">Họ và Tên</label>
         <input type="text" class="form-control" name="name"
            value="<?php if(!empty($dataupdate)) echo $dataupdate['name'] ?>" id="validationCustom03" required>
         <div style="color:red">
            <!-- <?php if(!empty($err['name'])) echo $err['name']; ?> -->
         </div>
      </div>
      <?php if(!empty($dataupdate)) {

         ?>
      <div></div>
      <?php
       }else{
         ?>

      <div class="col-md-6">
         <label for="validationCustom03" class="form-label">Mật khẩu</label>
         <input type="password" class="form-control" <?php if(!empty($dataupdate)) echo "disable" ?> name="password1"
            id="validationCustom03" required>
         <div style="color:red">
            <!-- <?php if(!empty($err['password'])) echo $err['password']; ?> -->
         </div>
      </div>
      <div class="col-md-6">
         <label for="validationCustom03" class="form-label">Xác nhận mật khẩu</label>
         <input type="password" class="form-control" name="password2" <?php if(!empty($dataupdate)) echo "disable" ?>
            id="validationCustom03" required>
         <div style="color:red">
            <!-- <?php if(!empty($err['password'])) echo $err['password']; ?> -->
         </div>
      </div>
      <?php
       } ?>
      <div class="col-md-6">
         <label for="validationCustom03" class="form-label">Địa chỉ</label>
         <input type="text" class="form-control" name="address"
            value="<?php if(!empty($dataupdate)) echo $dataupdate['address'] ?>" id="validationCustom03" required>
         <div style="color:red">
            <!-- <?php if(!empty($err['password'])) echo $err['password']; ?> -->
         </div>
      </div>
      <div class="col-md-6">
         <label for="validationCustom03" class="form-label">Phone</label>
         <input type="text" class="form-control" name="phone"
            value="<?php if(!empty($dataupdate)) echo $dataupdate['phone'] ?>" id="validationCustom03" required>
         <div style="color:red">
            <!-- <?php if(!empty($err['password'])) echo $err['password']; ?> -->
         </div>
      </div>

      <div class="col-md-6">
         <label for="validationCustom03" class="form-label">Email</label>
         <input type="text" class="form-control" name="email"
            value="<?php if(!empty($dataupdate)) echo $dataupdate['email'] ?>" id="validationCustom03" required>
         <div style="color:red">
            <!-- <?php if(!empty($err['email'])) echo $err['email']; ?> -->
         </div>
      </div>
      <div class="col-md-6">
         <label for="validationCustom03" class="form-label">Hình ảnh</label>
         <input type="file" class="form-control" name="anh" id="validationCustom03" required>
         <div class="invalid-feedback">
            Please provide a valid city.
         </div>
      </div>

      <div class="button">

         <button name="btn-client" class="btn btn-primary">Đăng ký</button>
      </div>



   </form>
</div>