 <!-- MAIN-CONTENT -->
 <div class="main-content my-5">
     <main>
         <div class="container ">
             <div class="row">
                 <?php require_once "../site/view/layout/menuAccount.php" ?>
                 <div class="col">
                     <div class="user-title mb-5">
                         <h2>ĐỔI MẬT KHẨU</h2>
                         <p class="text-danger"><?=isset($noti)?$noti:''?></p>
                     </div>
                     <div class="user-list-infor">
                         <form action="index.php?url=account&act=changePass" method="post">
                             <!-- id -->
                             <input type="text" hidden name="id" value="<?=$_SESSION['user']['customer_id']?>">
                             <!-- mật khẩu cũ -->
                             <div class="mb-3">
                                 <label for="exampleInputPassword1" class="form-label">Mật khẩu cũ<span
                                         class="text-danger">*</span></label>
                                 <input name="curPass" type="password" class="form-control" id="exampleInputPassword1">
                                 <p class="text-danger">
                                     <?php if(isset($err['curPass'])) {echo $err['curPass'];}else{echo '';}?>
                                 </p>
                             </div>
                             <!-- mật khẩu mới -->
                             <div class="mb-3">
                                 <label for="exampleInputPassword1" class="form-label">Mật khẩu mới<span
                                         class="text-danger">*</span></label>
                                 <input name="newPass" type="password" class="form-control" id="exampleInputPassword1">
                                 <p class="text-danger">
                                     <?php if(isset($err['newPass'])) {echo $err['newPass'];}elseif(isset($err['pass'])){echo $err['pass'];}?>
                                 </p>

                             </div>
                             <!-- Nhập lại mật khẩu -->
                             <div class="mb-3">
                                 <label for="exampleInputPassword1" class="form-label">Nhập lại mật khẩu<span
                                         class="text-danger">*</span></label>
                                 <input name="rePass" type="password" class="form-control" id="exampleInputPassword1">
                                 <p class="text-danger">
                                     <?php if(isset($err['rePass'])) {echo $err['rePass'];}elseif(isset($err['pass'])){echo $err['pass'];}?>
                                 </p>
                             </div>
                             <button type="submit" name="btn-update" class="btn btn-danger">Đặt lại mật khẩu</button>
                         </form>
                     </div>
                 </div>
             </div>

         </div>
     </main>
 </div>