@extends('layouts.admin')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
    <link rel="stylesheet" type="text/css" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap"
        rel="stylesheet">
</head>

<body>

    <style type="text/css">
        html {
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
            text-size-adjust: 100%;
            line-height: 1.4;
        }


        * {
            margin: 0;
            padding: 0;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }

        body {
            color: #000000;
            font-family: "Arial", Segoe UI, Tahoma, sans-serifl, Helvetica Neue, Helvetica;
            background-color: #80B7BB;
            padding: 1rem;
        }

        /*=====================================
estilos de la utilidad
Copiar esto
=====================================*/
        .body-chat img {
            width: 100%;
        }

        .body-chat .avatar img {
            width: 55px;
            height: 55px;
            border-radius: 150px;
        }

        .body-chat {
            display: flex;
            flex-wrap: wrap;
            padding: 40px;
            background-color: #fff;
            margin-left: auto;
            margin-right: auto;
            max-width: 1230px;
            border-radius: 20px;
        }

        .seccion-titulo {
            display: block;
            width: 100%;
            margin-bottom: 1.5rem;
            color: #7E7E7E;
        }

        .seccion-titulo h3 {
            font-size: 20px;
            font-weight: normal;
            color: #000000;
        }

        .seccion-titulo i {
            margin-right: 20.5rem;
        }

        .seccion-usuarios {
            width: 320px;
            margin-right: 1.5rem;
            border-right: 1px solid #E7E7E7;
            padding-right: 15px;
        }

        /* seccion usuarios */
        .input-buscar {
            display: flex;
            align-items: center;
            position: relative;
            width: 100%;
            margin-bottom: 1rem;
        }

        .seccion-buscar input[type="search"] {
            display: block;
            font-size: 18px;
            width: 100%;
            background-color: #F3F3F3;
            border: 0;
            padding: 6px 15px;
            border-radius: 2rem;
        }

        .seccion-buscar i {
            position: absolute;
            right: 15px;
        }

        .seccion-lista-usuarios {
            display: flex;
            flex-direction: column;
            width: 100%;
        }

        .usuario {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            margin-bottom: 1rem;
        }

        .mensaje .avatar,
        .usuario-seleccionado .avatar,
        .usuario .avatar {
            display: block;
            width: 50px;
            height: 50px;
            margin-right: 1rem;
            position: relative;
            background-color: #E4E8F0;
            border-radius: 50%;
        }

        .mensaje .avatar {
            width: 35px;
            height: 35px;
            margin-right: 1rem;
        }

        .mensaje.left .avatar {
            margin-right: 0;
            margin-left: 1rem;
        }

        .usuario .cuerpo {
            flex-grow: 1;
            flex-basis: 0;
        }

        .cuerpo {
            font-size: 24px;
        }

        .usuario .cuerpo span {
            display: block;
            font-size: 18px;
        }

        .usuario-seleccionado .cuerpo span:nth-child(2),
        .usuario .cuerpo span:nth-child(2) {
            font-size: 18px;
            color: #929292;
        }

        .usuario .estado-usuario {
            position: absolute;
            display: block;
            width: 15px;
            height: 15px;
            background-color: #ADADAD;
            bottom: 0;
            right: 0;
            border-radius: 50%;
            border: 2px solid #fff;
        }

        .usuario .estado-usuario.enlinea {
            background-color: #49DD45;
        }

        .usuario .estado-usuario.ocupado {
            background-color: #5160F0;
        }

        .usuario .estado-usuario.desconectado {
            background-color: #ADADAD;
        }

        .notificacion {
            display: block;
            width: auto;
            float: right;
            background-color: #4981D5;
            color: #fff;
            padding: 0 8px;
            border-radius: 8px;
            vertical-align: center;
        }

        /* seccion chat */
        .seccion-chat {
            flex-basis: 0;
            flex-grow: 1;
        }

        .usuario-seleccionado {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            margin-bottom: 1.25rem;
            border-bottom: 1px solid #E7E7E7;
            padding-bottom: 15px;
        }

        .panel-escritura .textarea textarea,
        .usuario-seleccionado .cuerpo {
            flex-grow: 1;
            flex-basis: 0;
        }

        .usuario-seleccionado .cuerpo span {
            display: block;
        }

        .usuario-seleccionado .opciones {
            display: block;
            width: auto;
            margin-left: 1rem;
        }

        .usuario-seleccionado .opciones ul {
            list-style: none;
            display: flex;
        }

        .usuario-seleccionado .opciones ul li+li {
            margin-left: .5rem;
        }

        .usuario-seleccionado .opciones button {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 35px;
            height: 35px;
            border-radius: 50%;
            border: 0;
            cursor: pointer;
            box-shadow: 0 0 12px rgba(0, 0, 0, .05);
        }

        /* mensaje */
        .panel-chat {
            display: block;
            overflow-y: auto;
            padding-right: 15px;
            margin-bottom: 1rem;
        }

        .mensaje {
            display: flex;
            flex-wrap: wrap;
            margin-bottom: 2.5rem;
            justify-content: flex-start;
        }

        .mensaje.left {
            justify-content: flex-end;
        }

        .mensaje img {
            margin-bottom: .5rem;
        }

        .mensaje .cuerpo {
            font-size: 18px;
            padding: 10px;
            background-color: #EEEEEE;
            border-radius: 8px;
            position: relative;
            width: calc(100% - 35px - 1rem - 5rem);
        }

        .mensaje .cuerpo::before {
            content: '';
            width: 0;
            height: 0;
            position: absolute;
            border-width: 9px;
            border-color: transparent #EEEEEE transparent transparent;
            border-style: solid;
            left: -18px;
            top: 7px;
        }

        .mensaje.left .cuerpo::before {
            border-color: transparent transparent transparent #EEEEEE;
            left: initial;
            right: -18px;
        }

        .mensaje .texto {
            display: block;
            position: relative;
        }

        .mensaje .cuerpo .tiempo {
            position: absolute;
            display: block;
            bottom: -2.1rem;
            color: #919191;
            width: 100%;
        }

        .mensaje.left .tiempo {
            text-align: right;
        }

        .mensaje .opciones-msj {
            position: absolute;
            right: -35px;
            top: 0;
            list-style: none;
            opacity: 0;
            visibility: hidden;
        }

        .mensaje.left .opciones-msj {
            right: initial;
            left: -35px;
        }

        .mensaje:hover .opciones-msj {
            opacity: 1;
            visibility: visible;
        }

        .mensaje .opciones-msj button {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            border: 0;
            background-color: #F1F1F1;
            margin-bottom: .2rem;
            cursor: pointer;
            color: #757575;
        }

        .panel-escritura button:active,
        .usuario-seleccionado .opciones button:active,
        .mensaje .opciones-msj button:active {
            background-color: #D7D7D7;
        }

        /* panel escritura */
        .panel-escritura {
            display: block;
        }

        .panel-escritura .textarea {
            display: flex;
            flex-wrap: wrap;
            border-top: 1px solid #E7E7E7;
            padding-top: 1rem;
        }

        .panel-escritura .textarea textarea,
        .panel-escritura .opcines {
            margin-right: .5rem;
        }

        .panel-escritura button {
            border: 0;
            background-color: #E3E3E3;
            display: inline-flex;
            width: 35px;
            height: 35px;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            cursor: pointer;
            position: relative;
        }

        .panel-escritura button label {
            display: block;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
        }

        .panel-escritura button input {
            display: none;
            position: absolute;
            top: 0;
            left: 0;
        }

        .panel-escritura button.enviar {
            background-color: #4580F7;
            color: #fff;
        }

        .panel-escritura .textarea textarea {
            border: 0;
            font-size: 18px;
            background-color: #F2F2F2;
            border-radius: 63px;
            padding: 0px;
        }

        @media (max-width: 780px) {
            .seccion-usuarios {
                width: 280px;
            }
        }
    </style>

    <!--==========================
=            html            =
===========================-->
    <section class="body-chat">
        <div class="seccion-titulo">
            <h3>
                <i class="fas fa-comments"></i>
                Mensajes
            </h3>
        </div>
        <div class="seccion-usuarios">
            <div class="seccion-buscar">
                <div class="input-buscar">
                    <input type="search" placeholder="Buscar usuario">
                    <i class="fas fa-search"></i>
                </div>
            </div>
            <div class="seccion-lista-usuarios">
                <div class="usuario">
                    <div class="avatar">
                        <img src="img/1.png" alt="img">
                        <span class="estado-usuario enlinea"></span>
                    </div>
                    <div class="cuerpo">
                        <span> Ana Moreno</span>
                        <span>Buenos días</span>
                    </div>
                    <span class="notificacion">
                        3
                    </span>
                </div>
                <div class="usuario">
                    <div class="avatar">
                        <img src="img/2.png" alt="img">
                        <span class="estado-usuario ocupado"></span>
                    </div>
                    <div class="cuerpo">
                        <span> Carlos Arauz</span>
                        <span>¿Tienes este producto</span>
                    </div>
                    <span class="notificacion">
                        1
                    </span>
                </div>
                <div class="usuario">
                    <div class="avatar">
                        <img src="img/3.png" alt="img">
                        <span class="estado-usuario desconectado"></span>
                    </div>
                    <div class="cuerpo">
                        <span> Maria Perez</span>
                        <span>Me hace el envió hoy</span>
                    </div>
                    <span class="notificacion">
                        1
                    </span>
                </div>
            </div>
        </div>
        <div class="seccion-chat">
            <div class="usuario-seleccionado">
                <div class="avatar">
                    <img src="img/4.png" alt="img">
                </div>
                <div class="cuerpo">
                    <span>Denisse Fuentes</span>
                    <span>Activo hace 10 minutos</span>
                </div>
                <div class="opciones">
                    <ul>
                        <li>
                            <button type="button"><i class="fas fa-video"></i></button>
                        </li>
                        <li>
                            <button type="button"><i class="fas fa-phone"></i></button>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="panel-chat">
                <div class="mensaje">
                    <div class="avatar">
                        <img src="img/4.png" alt="img">
                    </div>
                    <div class="cuerpo">
                        <!-- <img src="http://localhost/multimedia/png/user-foto-3.png" alt=""> -->
                        <div class="texto">
                            ¡Buenos días!, ¿Podría darme más detalles de sus productos?, los que publicó
                            el día de hoy.
                            <span class="tiempo">
                                <i class="far fa-clock"></i>
                                Hace 12 min
                            </span>
                        </div>
                        <ul class="opciones-msj">
                            <li>
                                <button type="button">
                                    <i class="fas fa-times"></i>
                                </button>
                            </li>
                            <li>
                                <button type="button">
                                    <i class="fas fa-share-square"></i>
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- derecha -->
                <div class="mensaje left">
                    <div class="cuerpo">
                        <!-- <img src="http://localhost/multimedia/png/user-foto-3.png" alt=""> -->
                        <div class="texto">
                            ¡Claro que sí!, ya se la envío.
                            <span class="tiempo">
                                <i class="far fa-clock"></i>
                                Hace 2 min
                            </span>
                        </div>
                        <ul class="opciones-msj">
                            <li>
                                <button type="button">
                                    <i class="fas fa-times"></i>
                                </button>
                            </li>
                            <li>
                                <button type="button">
                                    <i class="fas fa-share-square"></i>
                                </button>
                            </li>
                        </ul>
                    </div>
                    <div class="avatar">
                        <img src="img/5.png" alt="img">
                    </div>
                </div>
            </div>
            <div class="panel-escritura">
                <form class="textarea">
                    <div class="opcines">
                        <button type="button">
                            <i class="fas fa-file"></i>
                            <label for="file"></label>
                            <input type="file" id="file">
                        </button>
                    </div>
                    <textarea placeholder="   Escribir mensaje"></textarea>
                    <button type="button" class="enviar">
                        <i class="fas fa-paper-plane"></i>
                    </button>
                </form>
            </div>
        </div>
    </section>
    <!--====  End of html  ====-->



</body>

</html>
@endsection
