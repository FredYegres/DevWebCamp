<?php

namespace Controllers;

use Classes\Paginacion;
use Model\Categoria;
use Model\Dia;
use Model\Evento;
use Model\Hora;
use Model\Ponente;
use MVC\Router;

class EventosController {

    public static function index(Router $router) {
        if(!is_admin()) {
            header('Location: /');
        }

        $pagina_actual = $_GET['page'];
        $pagina_actual = filter_var($pagina_actual, FILTER_VALIDATE_INT);

        if(!$pagina_actual || $pagina_actual < 1) {
            header('Location: /admin/eventos?page=1');
        }

        $registros_por_pagina = 5;
        $total_registros = Evento::total();
        $paginacion = new Paginacion($pagina_actual, $registros_por_pagina, $total_registros);

        if($paginacion->total_paginas() < $pagina_actual) {
            header('Location: /admin/eventos?page=1');
        }

        $eventos = Evento::paginar($registros_por_pagina, $paginacion->offset());

        foreach($eventos as $evento) {
            $evento->categoria = Categoria::find($evento->categoria_id);
            $evento->dia = Dia::find($evento->dia_id);
            $evento->hora = Hora::find($evento->hora_id);
            $evento->ponente = Ponente::find($evento->ponente_id);
            
        }

        $router->render('admin/eventos/index', [
            'titulo' => 'Workshops y Conferencias',
            'eventos' => $eventos,
            'paginacion' => $paginacion->paginacion()
        ]);
    }

    public static function crear(Router $router) {
        if(!is_admin()) {
            header('Location: /');
        }

        $alertas = []; 

        $categorias = Categoria::all('ASC');
        $dias = Dia::all('ASC');
        $horas = Hora::all('ASC');
        $evento = new Evento;

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(!is_admin()) {
                header('Location: /');
            }

            $evento->sincronizar($_POST);

            $alertas = $evento->validar();

            if(empty($alertas)) {
                $resultado = $evento->guardar();

                if($resultado) {
                    header('Location: /admin/eventos');
                }
            }
        }

        $router->render('admin/eventos/crear', [
            'titulo' => 'Registrar Evento',
            'alertas' => $alertas,
            'categorias' => $categorias,
            'dias' => $dias,
            'horas' => $horas,
            'evento' => $evento
        ]);
    }

    public static function editar(Router $router) {
        if(!is_admin()) {
            header('Location: /');
        }

        $alertas = [];
        $id = $_GET['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if(!$id) {
            header('Location: /admin/eventos');
        }

        $categorias = Categoria::all('ASC');
        $dias = Dia::all('ASC');
        $horas = Hora::all('ASC');
        $evento = Evento::find($id);

        if(!$evento) {
            header('Location: /admin/eventos');
        }


        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(!is_admin()) {
                header('Location: /');
            }

            $evento->sincronizar($_POST);

            $alertas = $evento->validar();

            if(empty($alertas)) {

                $resultado = $evento->guardar();

                if($resultado) {
                    header('Location: /admin/eventos');
                } else {
                    debuguear('error');
                }
            }
        }

        $router->render('admin/eventos/editar', [
            'titulo' => 'Actualizar Evento',
            'alertas' => $alertas,
            'categorias' => $categorias,
            'dias' => $dias,
            'horas' => $horas,
            'evento' => $evento
        ]);
    }

    public static function eliminar() {

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(!is_admin()) {
                header('Location: /');
            }

            $id = $_POST['id'];
        
            if(!$id) {
                header('Location: /admin/eventos');
            }
    
            $evento = Evento::find($id);
    
            if(!$evento) {
                header('Location: /admin/eventos');
            }
    
            $resultado = $evento->eliminar();
    
            if($resultado) {
                header('Location: /admin/eventos');
            }
        }
    }
}