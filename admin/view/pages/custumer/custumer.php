 <div class="wrapper" style="margin-top:20px;width:1050px;">
    <h2 style="padding: 20px; background:#c2dec2;border-radius:10px;color:green">QUẢN LÝ KHÁCH HÀNG</h2>
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
       <div class="col-md-6">
          <label for="validationCustom03" class="form-label">Kích hoạt</label>
          <div class="check">
             <div class="form-check form-check-inline">
                <input class="form-check-input" name="kichhoat"
                   <?php if(!empty($dataupdate)&&$dataupdate['status']==1) echo "checked" ?> type="radio" value="0">
                <label class="form-check-label" for="inlineCheckbox1">Chưa kích hoạt</label>
             </div>
             <div class="form-check form-check-inline">
                <input class="form-check-input" name="kichhoat"
                   <?php if(!empty($dataupdate)&&$dataupdate['status']==1) echo "checked" ?> type="radio" value="1">
                <label class="form-check-label" for="inlineCheckbox2">Kích hoạt</label>
             </div>
          </div>
          <div class="invalid-feedback">
             Please provide a valid city.
          </div>
       </div>
       <div class="col-md-6">
          <label for="validationCustom03" class="form-label">Vai trò</label>
          <div class="check">
             <div class="form-check form-check-inline">
                <input class="form-check-input" name="vaitro"
                   <?php if(!empty($dataupdate)&&$dataupdate['role']==1) echo "checked" ?> type="radio" value="0">
                <label class="form-check-label" for="inlineCheckbox1">Khách hàng</label>
             </div>
             <div class="form-check form-check-inline">
                <input class="form-check-input" name="vaitro"
                   <?php if(!empty($dataupdate)&&$dataupdate['role']==1) echo "checked" ?> type="radio" value="1">
                <label class="form-check-label" for="inlineCheckbox2">Admin</label>
             </div>
          </div>
          <div class="invalid-feedback">
             Please provide a valid city.
          </div>
       </div>
       <div class="button">
          <?php
         if(!empty($dataupdate)){
            ?>
          <button name="btn-update">Update</button>
          <?php
         }else{
            ?>
          <button name="btn">Thêm mới</button>

          <button>Nhập lại</button>
          <button type="submit" name="btnlist"><a href="index.php?url=customer-list">Danh sách</a></button>
          <?php
         }
         
         ?>


       </div>



    </form>
 </div>