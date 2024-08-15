<?php 
  session_start();
  if(isset($_SESSION['unique_id'])){
    header("location: users.php");
  }
?>

<?php include_once "header.php"; ?>
<body>
  <div class="wrapper">
    <section class="form signup">
    <div class="centrar">
      <img src="php/images/logotxtteal.png" alt="" class="imagen">
      </div>
      <form action="signup.php" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text"></div>
        <div class="name-details">
          <div class="field input">
            <label  class="text-sm">Primer Nombre</label>
            <input type="text" name="fname"  placeholder=" Primer Nombre" required>
          </div>
          <div class="Segundo Nombre">
            <label  class="text-sm">Segundo Nombre</label>
            <input type="text" name="lname"  class="border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder=" Segundo Nombre" required>
          </div>
        </div>
        <div class="field input">
          <label class="text-sm">Email </label>
          <input type="text" name="email" placeholder="Ingresa Tu Correo" required>
        </div>
        <div class="field input">
          <label  class="text-sm">Contraseña</label>
          <input type="password" name="password" placeholder="Ingresa Una Contreseña" required  class="text-sm">
          <i class="fas fa-eye"></i>
        </div>
        <div class="Sube una Imagen">
          <label  class="text-sm">Selecciona Tu Imagen</label>
          <input type="file" name="image" accept="image/x-png,image/gif,image/jpeg,image/jpg" lass="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" required>
        </div>
        <div class="field button">
          <input type="submit" name="submit" value="Continue to Chat">
        </div>
      </form>
      <div class="link">Cuentas en una Cuenta? <a href="login.php">Login Ahora</a></div>
    </section>
  </div>

  <script src="javascript/pass-show-hide.js"></script>
  <script src="javascript/signup.js"></script>

</body>
</html>
