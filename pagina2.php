<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sistema Garantias</title>

    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/font-awesome.css">

    <script src="js/jquery-3.2.1.js"></script>
    <script src="js/script.js"></script>
</head>
<body>

    <section class="form_wrap">

        <section class="cantact_info">
            <section class="info_title">
                <span class="fa fa-user-circle"></span>
                <h2>Sistema<br>De Garantias</h2>
            </section>
            <!--<section class="info_items">
                <p><span class="fa fa-envelope"></span> info.contact@gmail.com</p>
                <p><span class="fa fa-mobile"></span> +1(585) 902-8665</p>
            </section>-->
        </section>

        <form action="" class="form_contact">
            <h2>Cargar Garantia</h2>
            <div class="user_info">
                <label for="names">Tipo de Garantia</label>
                <input type="text" id="Tipo_Garantia">

                <label for="phone">Nro de Expediente</label>
                <input type="text" id="Nro_Expediente">

                <label for="email">Nro de Proceso</label>
                <input type="text" id="Nro de Proceso">

                <label for="names">Proveedor</label>
                <input type="text" id="Proveedor">

                <label for="phone">Se Ajusta</label><br>
                <label for="boton_si">Si</label>
                <input type="radio" id="boton_si" name="fav_language" value="Si">
                <label for="boton_no">No</label>
                <input type="radio" id="boton_no" name="fav_language" value="No">
                <!--<label for="mensaje">Mensaje *</label>
                <textarea id="mensaje"></textarea>-->

                <input type="button" value="Enviar Mensaje" id="btnSend">
            </div>
        </form>

    </section>

</body>
</html>
