<?php 
  session_start();
  if(isset($_SESSION['unique_id'])){
    header("location: users.php");
  }
?>

<?php include_once "header.php"; ?>
<body>
  <div class="wrapper">
    <section class="form login">
      <div class="centrar">
      <img src="php/images/logotxtteal.png" alt="" class="imagen">
      </div>
  
      <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text"></div>
        <div class="field input">
          <label> Tu Email</label>
          <input type="text" name="email" placeholder="Ingrese su Correo"  required>
        </div>
        <div class="field input">
          <label>Tu Contraseña</label>
          <input type="password" name="password" placeholder="Ingrese su Contraseña" required>
          <i class="fas fa-eye"></i>
        </div>
        <div class="field button">
          <input type="submit" name="submit" value="Continuar al Chat">
        </div>
      </form>
      <div class="link">No tengo una cuenta? <a href="index.php">Registrarse Ahora</a></div>
    </section>
  </div>
  
  <script src="javascript/pass-show-hide.js"></script>
  <script src="javascript/login.js"></script>

</body>
</html>
