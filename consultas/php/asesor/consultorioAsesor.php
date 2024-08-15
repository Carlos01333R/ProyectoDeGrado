<?php
include_once("../../bd/conexion.php");
session_start();
if (!isset($_SESSION['correo'])) {
  
    header("Location: ../../login.php");
    exit();
}

// Ahora puedes acceder a las variables de sesión

$correo = $_SESSION['correo'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asesor</title>
    <link href="../../css/dashboard.css" rel="stylesheet" type="text/css">
    <link rel="shortcut icon" href="../../img/logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css"  rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</head>

<?php 
$query = "SELECT * FROM asesor WHERE correo = '$correo'"; // poner el where donde correo == $correo y 
$result = $db_connection->query($query);

while ($row = $result->fetch_assoc()) {
    $nombre = $row['nombre'];
    $categoria = $row['categoria'];
      
}


$categoria_asesor = "SELECT * FROM respuestas WHERE categoria = '$categoria' ORDER BY `fecha` DESC";
$result_asesor = $db_connection->query($categoria_asesor);
while ($row = $result_asesor->fetch_assoc()) {
$nombre_proyecto = $row['proyecto'];

}
?>

<body>
 


<nav class="bg-white border-gray-200 dark:bg-gray-900 ">
<div style="background-color: orange; width:100%; height:20px; "></div>
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
  <a href="consultorio.php" class="flex items-center space-x-3 rtl:space-x-reverse">
      <img src="../../img\logotxtteal.png" class="w-40 h-15" alt="Flowbite Logo" />
     
  </a>
  <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
      <button type="button" class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
        <span class="sr-only">Open user menu</span>
        <img class="w-8 h-8 rounded-full" src="https://img.freepik.com/vector-premium/ilustracion-avatar-hombre-negocios-retrato-usuario-dibujos-animados-icono-perfil-usuario_118339-5502.jpg" alt="user photo">
      </button>
      <!-- Dropdown menu -->
      <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600" id="user-dropdown">
        <div class="px-4 py-3">
          <span class="block text-sm text-gray-900 dark:text-white"><?php echo($nombre) ?></span>
          <span class="block text-sm  text-gray-500 truncate dark:text-gray-400"><?php echo($correo) ?></span>
        </div>
        <ul class="py-2" aria-labelledby="user-menu-button">

          <li>
            <a data-modal-target="popup-modal" data-modal-toggle="popup-modal" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white cursor-pointer">Salir</a>
          </li>
        </ul>
      </div>
      <button data-collapse-toggle="navbar-user" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-user" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
        </svg>
    </button>
  </div>
  <div class="flex items-center justify-between w-full md:flex md:w-auto md:order-1  mx-auto" id="navbar-user">
    <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700 md:mr-14">
    
    
     
      <li>
        <a href="perfilAsesor.php" class="flex items-center gap-x-1 text-sm font-semibold leading-6 text-gray-900">Perfil</a>
      </li>
      <li>
        <a href="acercadeAsesor.php" class="flex items-center gap-x-1 text-sm font-semibold leading-6 text-gray-900">Acerca de</a>
      </li>
    </ul>
  </div>
  </div>
</nav>

<div id="popup-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto  justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white flex flex-row" data-modal-hide="popup-modal">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="text-center mb-3 mt-3 p-2">
                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                </svg>
                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Estas seguro de cerrar la cession?</h3>
                <a data-modal-hide="popup-modal" type="button" href="../../index.php"  class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                    Si
                </a>
                <button data-modal-hide="popup-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No, Cancelar</button>
            </div>
        </div>
    </div>
</div>


<div class="flex justify-center mb-3">
<button type="button" style="background-color: orange;" data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="text-white  focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
<svg  xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-3.5 h-3.5 me-2" viewBox="0 0 16 16">
  <path d="M8.5 2.687c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783"/>
</svg>
Responder Consulta
</button>
</div>


<!-- Main modal -->
<div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Create New Product
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form class="p-4 md:p-5" action="insertarRespuesta.php" method="POST">
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <div class="col-span-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Numero del Radicado</label>
                        <input type="text" name="radicado"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="DIgite el numero de radicado a responder" required>
                    </div>
                
                    <div class="col-span-2">
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Respuesta</label>
                        <textarea id="description" name="respuesta" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Escriba su Respuesta aqui" required></textarea>                    
                    </div>
                </div>
                <button type="submit" style="background-color: orange;" class="text-white inline-flex items-center focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">
                    <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                    Enviar Respuesta
                </button>
            </form>
        </div>
    </div>
</div> 


<?php

if(isset($_GET['errorActualizar']) && $_GET['errorActualizar'] == 1) {
  echo "<div id='mensaje'>No se encontró el numero de radicado</div>";
}
?>
  <?php

if(isset($_GET['succces']) && $_GET['succces'] == 1) {
  echo "<div id='mensajeActualizar'>¡Respuesta enviada exitosamente!</div>";
}
?>

<style>
    
#mensaje {
  background-color: #ffcccc; /* Color de fondo */
  color: #ff0000; /* Color del texto */
  padding: 10px; /* Espaciado interno */
  border: 1px solid #ff0000; /* Borde */
  border-radius: 5px; /* Borde redondeado */
  margin-top: 10px; /* Espacio superior */
  text-align: center; /* Centrar el texto */
  width: 300px;
  margin: 0 auto;
}

#mensajeActualizar{
  
    background-color: rgb(96, 251, 96); /* Color de fondo */
    color: #fff; /* Color del texto */
    padding: 10px; /* Espaciado interno */
    border: 1px solid #03ff5b; /* Borde */
    border-radius: 5px; /* Borde redondeado */
    margin-top: 10px; /* Espacio superior */
    text-align: center; /* Centrar el texto */
    width: 300px;
    margin: 0 auto;
  
}

@media only screen and (max-width: 768px) {
  /* Hide 'RESPUESTA' on screens less than 768px wide */
  .hide-on-small {
    display: none;
  }
}
</
</style>




<div class="tablaPosicion">
     
<div class="inline-flex rounded-md shadow-sm" role="group">
  <button type="button"  onclick="showRecords(5)" class="px-4 py-2 text-sm font-medium text-gray-900 bg-transparent border border-gray-900 rounded-s-lg hover:bg-gray-900 hover:text-black focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-gray-900 focus:text-black dark:border-black dark:text-black dark:hover:text-black dark:hover:bg-gray-700 dark:focus:bg-gray-700">
    5
  </button>
  <button type="button"  onclick="showRecords(15)" class="px-4 py-2 text-sm font-medium text-gray-900 bg-transparent border-t border-b border-gray-900 hover:bg-gray-900 hover:text-black focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-gray-900 focus:text-black dark:border-black dark:text-black dark:hover:text-black dark:hover:bg-gray-700 dark:focus:bg-gray-700">
    10
  </button>
  <button type="button"  onclick="showRecords(20)" class="px-4 py-2 text-sm font-medium text-gray-900 bg-transparent border border-gray-900 rounded-e-lg hover:bg-gray-900 hover:text-black focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-gray-900 focus:text-black dark:border-black dark:text-black dark:hover:text-black dark:hover:bg-gray-700 dark:focus:bg-gray-700">
    20
  </button>
</div><br>
<?php
// preguntamas si la $categoria es asesoria, consultoria y emprendimiento, y mostramos la info 
$sql = "SELECT * FROM respuestas WHERE categoria = '$categoria' or categoria = 'consultoria' or categoria = 'emprendimiento'  ORDER BY `fecha` DESC "; // where categoria == $categorias 
$result = $db_connection->query($sql);

if ($result->num_rows > 0 && empty($nombre_proyecto) ) {
    // Si hay resultados, mostrar la primera tabla
    echo "<h3 class='w-full text-left rtl:text-right text-gray-500 dark:text-gray-400 text-xs min-h-3' style='width: 100%;'>consultoria $categoria, Consultoria y innovacion</h3>";
    echo "<table class='w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 mt-2' style='width: 100%;'>";
    echo "<thead class='text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400'>";
    echo "<tr>";
    echo "<th style='width: 100px; padding: 10px; border-bottom: 2px solid #ddd; text-align: center;'>RADICADO</th>";
    echo "<th style='width: 100px; padding: 10px; border-bottom: 2px solid #ddd; text-align: center;'>FECHA</th>";
    echo "<th style='width: 100px; padding: 10px; border-bottom: 2px solid #ddd; text-align: center;'  class='hide-on-small'>CATEGORIA</th>";
    echo "<th style='width: 130px; padding: 10px; border-bottom: 2px solid #ddd; text-align: center;'>CONSULTA</th>";
    echo "<th style='padding: 10px; border-bottom: 2px solid #ddd; width: 200px; text-align: center;'  class='hide-on-small'>RESPUESTA</th>";
    echo "<th style='padding: 10px; border-bottom: 2px solid #ddd; width: 50px; text-align: center;' scope='col' class='px-6 py-3'>REVISAR</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";

    while ($row = $result->fetch_assoc()) {
      $estado = strtolower(trim($row['estado']));
      $color_texto = ($estado == 'sin responder') ? 'red' : 'green';
      $numeroRadicado = $row['radicado'];
     
      echo "<tr style='background-color: #f9f9f9;'>";
      echo "<td style='padding: 10px; border-bottom: 1px solid #ddd; text-align: center;'>" . $row['radicado'] . "</td>";
      echo "<td style='padding: 10px; border-bottom: 1px solid #ddd; text-align: center;'>" . $row['fecha'] . "</td>";
      echo "<td style='padding: 10px; border-bottom: 1px solid #ddd; text-align: center;'  class='hide-on-small'>" . $row['categoria'] . "</td>";
      echo "<td style='padding: 10px; border-bottom: 1px solid #ddd; text-align: center;'>" . $row['asunto'] . "</td>";
      echo "<td style='padding: 10px; border-bottom: 1px solid #ddd; color: $color_texto; text-align: center;'  class='hide-on-small'>" . $row['estado'] . "</td>";
      echo "<td style='padding: 10px; border-bottom: 1px solid #ddd; text-align: center;'><a  style='background-color: orange; width: 90px; height: 40px; color: #fff; border-radius: 5px; padding:5px;' href='VerInfoACE.php?id=" . $row['radicado'] . "'>Ver</a></td>";
 

    }

    echo "</tbody>";
    echo "</table>";
} 

if($categoria != 'asesoria' && $categoria != 'Consultoria' && $categoria != 'emprendimiento'   ){
  $sqlGestion = "SELECT * FROM respuestas WHERE categoria = 'gestion de proyectos'  ORDER BY `fecha` DESC ";

  $result_gestion = $db_connection->query($sqlGestion);
  
  if ($result_gestion->num_rows > 0 ) {
    echo "<h3 class='w-full text-left rtl:text-right text-gray-500 dark:text-gray-400 text-xs min-h-3' style='width: 100%;'>consultoria $categoria</h3>";
    echo "<table class='w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 mt-2' style='width: 100%;'>";
    echo "<thead class='text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400'>";
    echo "<tr>";
    echo "<th style='width: 100px; padding: 10px; border-bottom: 2px solid #ddd; text-align: center;'>RADICADO</th>";
    echo "<th style='width: 100px; padding: 10px; border-bottom: 2px solid #ddd; text-align: center;'>FECHA</th>";
    echo "<th style='width: 100px; padding: 10px; border-bottom: 2px solid #ddd; text-align: center;'  class='hide-on-small'>CATEGORIA</th>";
    echo "<th style='width: 100px; padding: 10px; border-bottom: 2px solid #ddd; text-align: center;'>PROYECTO</th>";
    echo "<th style='width: 130px; padding: 10px; border-bottom: 2px solid #ddd; text-align: center;'>CONSULTA</th>";
    echo "<th style='padding: 10px; border-bottom: 2px solid #ddd; width: 200px; text-align: center;'  class='hide-on-small'>RESPUESTA</th>";
    echo "<th style='padding: 10px; border-bottom: 2px solid #ddd; width: 50px; text-align: center;' scope='col' class='px-6 py-3'>REVISAR</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
  
    while ($row = $result_gestion->fetch_assoc()) {
      $estado = strtolower(trim($row['estado']));
      $color_texto = ($estado == 'sin responder') ? 'red' : 'green';
      $numeroRadicado = $row['radicado'];
     
      echo "<tr style='background-color: #f9f9f9;'>";
      echo "<td style='padding: 10px; border-bottom: 1px solid #ddd; text-align: center;'>" . $row['radicado'] . "</td>";
      echo "<td style='padding: 10px; border-bottom: 1px solid #ddd; text-align: center;'>" . $row['fecha'] . "</td>";
      echo "<td style='padding: 10px; border-bottom: 1px solid #ddd; text-align: center;'  class='hide-on-small'>" . $row['categoria'] . "</td>";
      echo "<td style='padding: 10px; border-bottom: 1px solid #ddd; text-align: center;'>" . $row['proyecto'] . "</td>";
      echo "<td style='padding: 10px; border-bottom: 1px solid #ddd; text-align: center;'>" . $row['asunto'] . "</td>";
      echo "<td style='padding: 10px; border-bottom: 1px solid #ddd; color: $color_texto; text-align: center;'  class='hide-on-small'>" . $row['estado'] . "</td>";
      echo "<td style='padding: 10px; border-bottom: 1px solid #ddd; text-align: center;'><a  style='background-color: orange; width: 90px; height: 40px; color: #fff; border-radius: 5px; padding:5px;' href='VerInfo.php?id=" . $row['radicado'] . "'>Ver</a></td>";
  
  
    }
  
    echo "</tbody>";
    echo "</table>";
  }
}
?>

</div>


<footer class="bg-white dark:bg-gray-900">
    <div class="mx-auto w-full max-w-screen-xl p-4 py-6 lg:py-8">
        <div class="md:flex md:justify-between">
          <div class="mb-6 md:mb-0">
              <a href="https://flowbite.com/" class="flex items-center">
                  <img src="../../img/logotxtteal.png" class=" w-40 h-25 me-3" alt="curn Logo" />
                 
              </a>
          </div>
          <div class="grid grid-cols-2 gap-8 sm:gap-6 sm:grid-cols-3">
              <div>
                  <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Corporación</h2>
                  <ul class="text-gray-500 dark:text-gray-400 font-medium">
                      <li class="mb-4">
                          <a href="https://www.uninunez.edu.co/politicas/politicadatospersonalescurn.html" class="hover:underline">Politica de tratamiento de datos</a>
                      </li>
                      <li>
                          <a href="https://axis.uninunez.edu.co:2641/soporte/" class="hover:underline">PQRS</a>
                      </li>
                  </ul>
              </div>
              <div>
                  <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Informacion</h2>
                  <ul class="text-gray-500 dark:text-gray-400 font-medium">
                      <li class="mb-4">
                          <a href="https://www.uninunez.edu.co/sedes.html?ml=1" class="hover:underline ">Contacto</a>
                      </li>
                      <li>
                          <a href="tel:6056439499" class="hover:underline">Telefono</a>
                      </li>
                  </ul>
              </div>
              <div>
                  <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Legal</h2>
                  <ul class="text-gray-500 dark:text-gray-400 font-medium">
                      <li class="mb-4">
                          <a href="#" class="hover:underline">Privacy Policy</a>
                      </li>
                      <li>
                          <a href="#" class="hover:underline">Terms &amp; Conditions</a>
                      </li>
                  </ul>
              </div>
          </div>
      </div>
      <hr class="my-6 border-orange-500 sm:mx-auto dark:border-orange-500 lg:my-8" />
      <div class="sm:flex sm:items-center sm:justify-between">
          <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2024 <a href="#" class="hover:underline">Carlos Rodriguez</a>. All Rights Reserved.
          </span>
          <div class="flex mt-4 sm:justify-center sm:mt-0">
              <a href="https://www.facebook.com/uninunezcolombia" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                  <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 8 19">
                        <path fill-rule="evenodd" d="M6.135 3H8V0H6.135a4.147 4.147 0 0 0-4.142 4.142V6H0v3h2v9.938h3V9h2.021l.592-3H5V3.591A.6.6 0 0 1 5.592 3h.543Z" clip-rule="evenodd"/>
                    </svg>
                  <span class="sr-only">Facebook page</span>
              </a>
              
              <a href="https://twitter.com/uninunez" class="text-gray-500 hover:text-gray-900 dark:hover:text-white ms-5">
                  <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 17">
                    <path fill-rule="evenodd" d="M20 1.892a8.178 8.178 0 0 1-2.355.635 4.074 4.074 0 0 0 1.8-2.235 8.344 8.344 0 0 1-2.605.98A4.13 4.13 0 0 0 13.85 0a4.068 4.068 0 0 0-4.1 4.038 4 4 0 0 0 .105.919A11.705 11.705 0 0 1 1.4.734a4.006 4.006 0 0 0 1.268 5.392 4.165 4.165 0 0 1-1.859-.5v.05A4.057 4.057 0 0 0 4.1 9.635a4.19 4.19 0 0 1-1.856.07 4.108 4.108 0 0 0 3.831 2.807A8.36 8.36 0 0 1 0 14.184 11.732 11.732 0 0 0 6.291 16 11.502 11.502 0 0 0 17.964 4.5c0-.177 0-.35-.012-.523A8.143 8.143 0 0 0 20 1.892Z" clip-rule="evenodd"/>
                </svg>
                  <span class="sr-only">Twitter page</span>
              </a>
             
              <a href="https://plus.google.com/+curneduco" class="text-gray-500 hover:text-gray-900 dark:hover:text-white ms-5">
                  <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 0a10 10 0 1 0 10 10A10.009 10.009 0 0 0 10 0Zm6.613 4.614a8.523 8.523 0 0 1 1.93 5.32 20.094 20.094 0 0 0-5.949-.274c-.059-.149-.122-.292-.184-.441a23.879 23.879 0 0 0-.566-1.239 11.41 11.41 0 0 0 4.769-3.366ZM8 1.707a8.821 8.821 0 0 1 2-.238 8.5 8.5 0 0 1 5.664 2.152 9.608 9.608 0 0 1-4.476 3.087A45.758 45.758 0 0 0 8 1.707ZM1.642 8.262a8.57 8.57 0 0 1 4.73-5.981A53.998 53.998 0 0 1 9.54 7.222a32.078 32.078 0 0 1-7.9 1.04h.002Zm2.01 7.46a8.51 8.51 0 0 1-2.2-5.707v-.262a31.64 31.64 0 0 0 8.777-1.219c.243.477.477.964.692 1.449-.114.032-.227.067-.336.1a13.569 13.569 0 0 0-6.942 5.636l.009.003ZM10 18.556a8.508 8.508 0 0 1-5.243-1.8 11.717 11.717 0 0 1 6.7-5.332.509.509 0 0 1 .055-.02 35.65 35.65 0 0 1 1.819 6.476 8.476 8.476 0 0 1-3.331.676Zm4.772-1.462A37.232 37.232 0 0 0 13.113 11a12.513 12.513 0 0 1 5.321.364 8.56 8.56 0 0 1-3.66 5.73h-.002Z" clip-rule="evenodd"/>
                </svg>
                  <span class="sr-only">Dribbble account</span>
              </a>
          </div>
      </div>
    </div>
</footer>




<div class="modal fade" id="insertar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered ">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="parrafo2">Ingrese su nueva consulta</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container-fluid"> 
        <form class="row g-3" action="insertarRespuesta.php" method="POST">
        <div class="col-12">
   <div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Numero de Radicado</label>
  <input type="number" class="form-control" name="radicado" placeholder="Ingrese el Radicado a Responder" required>
</div>
<div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Respuesta</label>
  <textarea class="form-control" name="respuesta" rows="3" required></textarea>
</div>


        <button style="width: 100%;
  border: none;
  height: 50px;
  background-color: orange;
  margin-top: 10px; border-radius: 12px;" type="submit">Enviar</button>
      
</form>
        </div>
      </div>
    </div>
  </div>

  
</div>


</body>

<script>
    
function limpiarErrorEnURLerror() {
    if (history.replaceState) {
        var urlSinError = window.location.pathname + window.location.search.replace(/(\?|&)errorActualizar=1/g, '');
        history.replaceState(null, null, urlSinError);
    }
}

function limpiarErrorEnURLSuccess() {
    if (history.replaceState) {
        var urlSinError = window.location.pathname + window.location.search.replace(/(\?|&)succces=1/g, '');
        history.replaceState(null, null, urlSinError);
    }
}


  function ocultarMensajeError() {
    setTimeout(function() {
        var mensaje = document.getElementById('mensaje');
        if (mensaje) {
            mensaje.style.display = 'none';
        }
    }, 2000); // 5000 milisegundos = 5 segundos
}


function ocultarMensajesucces() {
    setTimeout(function() {
        var mensaje = document.getElementById('mensajeActualizar');
        if (mensaje) {
            mensaje.style.display = 'none';
        }
    }, 2000); // 5000 milisegundos = 5 segundos
}

function recargarPagina() {
        // Recargar la página
        location.reload();
    }
    
     function showRecords(num) {
        // Obtener todas las filas de la tabla
        var rows = document.querySelectorAll('tbody tr');
        
        // Ocultar todas las filas
        for (var i = 0; i < rows.length; i++) {
            rows[i].style.display = 'none';
        }

        // Mostrar solo las primeras 'num' filas
        for (var i = 0; i < num; i++) {
            if (rows[i]) {
                rows[i].style.display = '';
            }
        }
    }


window.onload = function() {
    ocultarMensajeError()
  limpiarErrorEnURLSuccess()
  ocultarMensajesucces()
  limpiarErrorEnURLerror()
  
};
</script>
</html>


