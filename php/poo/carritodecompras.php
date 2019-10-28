<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Fuentes y nuestro stylesheet -->
    <link href="https://fonts.googleapis.com/css?family=Ceviche+One|Sedgwick+Ave|Sedgwick+Ave+Display&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Playfair+Display|Raleway|Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.css">

    <link rel="stylesheet" href="../css/carritodecompras.css">
    <title>Carrito</title>
  </head>

<body>
  <div class="container-fluid m-0 p-0">
    <?php require_once 'parciales/header.php'; ?>
      <div><h1 class="_tituloPagina ml-1 mr-1  bg-light text-dark pl-3 mb-3  text-center">Carrito de Compras</h1>
      </div>
      <section class="row ml-0 mr-0">
        <article class="col-sm-12 col-md-8">
          <ul class="list-group list-group-flush w-100 ml-2 ">
            <li class=" list-group-item  w-90">
              <a href=""><i class="fas fa-window-close float-right fa-2x"></i></a>
              <img class="float-left mr-3 " src="../IMG/basquet.png" alt="basquet">
              <h3 class="d-inline-block">Nike Basquet</h3>
              <p class="">Lorem ipsum dolor sit amet, consectetur adipisicing elit. In tenetur temporibus nisi consequatur, consequuntur commodi. Expedita id nulla eius aperiam distinctio, molestiae velit sit ratione exercitationem officia, quaerat rerum mollitia?</p>
              <h5 class="">Precio: $3000</h5>
              <select class="custom-select ">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
              </select>
              <select class="custom-select  ">
                <option value="1">US 9</option>
                <option value="2">US 10</option>
                <option value="3">US 11</option>
              </select>

            </li>

            <li class="list-group-item   ">
              <a href=""><i class="fas fa-window-close float-right fa-2x"></i></a>
              <img class="float-left mr-3" src="../IMG/BS5991_0.jpg" width="225" alt="basquet">
              <h3 class="d-inline-block">Adidas Running</h3>
              <p class="">Lorem ipsum dolor sit amet, consectetur adipisicing elit. In tenetur temporibus nisi consequatur, consequuntur commodi. Expedita id nulla eius aperiam distinctio, molestiae velit sit ratione exercitationem officia, quaerat rerum mollitia?</p>
              <h5 class="">Precio: $3000</h5>
              <!-- cantidad -->
              <select class="custom-select">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
              </select>
              <!-- talle -->
              <select class="custom-select _comprasList">
                <option value="1">US 9</option>
                <option value="2">US 10</option>
                <option value="3">US 11</option>
              </select>

            </li>
          </ul>
        </article>
        <article class="col-sm-12 col-md-4">
          <section class="row text-center rounded-top _resumen  _comprasList ml-5 mt-1 mb-1">
            <article class="col-sm-12 " id="resumenProductos">
              <h4>Resumen</h4>
              <ul class="text-left">
                <li>1x Nike Basquet = $3000</li>
                <li>1x Adidas Running = $3000</li>
              </ul>
            </article>
            <article class="col-sm-12 " id="totalCompra">
              <h4>Total:</h4>
              <h3>$6000</h3>
              <button type="button" class="btn btn-primary w-50 h-50 t-center ">Comprar<br><i class="fas fa-money-check-alt fa-2x"></i></button>

            </article>
          </section>
        </article>


    <!-- FOOTER con redes y nada mas -->
    <?php require_once 'parciales/footer.php'; ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </div>
  </body>
</html>
