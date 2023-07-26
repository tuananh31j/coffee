 <!-- MAIN-CONTENT -->
 <div class="main-content my-5">
     <main>
         <div class="container ">
             <div class="row">
                 <?php require_once "site/view/layout/menuAccount.php" ?>
                 <div class="col">
                     <div class="user-title mb-5">
                         <h2>ĐỔI MẬT KHẨU</h2>
                     </div>
                     <div class="user-list-infor">
                         <form action="" method="post">

                             <div class="mb-3">
                                 <label for="exampleInputPassword1" class="form-label">Mật khẩu cũ<span
                                         class="text-danger">*</span></label>
                                 <input type="password" class="form-control" id="exampleInputPassword1">
                             </div>
                             <div class="mb-3">
                                 <label for="exampleInputPassword1" class="form-label">Mật khẩu mới<span
                                         class="text-danger">*</span></label>
                                 <input type="password" class="form-control" id="exampleInputPassword1">
                             </div>
                             <div class="mb-3">
                                 <label for="exampleInputPassword1" class="form-label">Nhập lại mật khẩu<span
                                         class="text-danger">*</span></label>
                                 <input type="password" class="form-control" id="exampleInputPassword1">
                             </div>
                             <button type="submit" class="btn btn-danger">Đặt lại mật khẩu</button>
                         </form>
                     </div>
                 </div>
             </div>

         </div>
     </main>
 </div>