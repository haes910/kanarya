
<div class="container">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <br>
      <br>
      <br>
      <form action="islem.php" method="POST">
  <div class="form-group">
    <label for="user">Kullanıcı Adı</label>
    <input type="text" name="user" class="form-control" id="user" >
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" name="password" class="form-control" id="password" placeholder="Password">
  </div>
  <div class="form-check">
    <input type="checkbox" class="form-check-input" id="dropdownCheck2">
    <label class="form-check-label" for="dropdownCheck2">
      Remember me
    </label>
  </div>
  <input type="hidden" name="klasor" value="login">
  <button type="submit" name="islem" value="login" class="btn btn-primary">Giriş Yap</button>

</form>
    </div>
  </div>
</div>
