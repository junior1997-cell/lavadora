<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\PermisoModel;
use App\Models\RegistrosModel;

class Permiso extends Controller {

    public function index() {
        //realiza solicitud a services y le decimos que ejecute el metodo request()
        $request = \Config\Services::request();
        $validation = \Config\Services::validation();
        $headers = $request->getHeaders();

        $registroModel = new RegistrosModel($db);
        $registro = $registroModel->where('estado', 1)
                ->findAll();

        //$db = \Config\Database::connect();
        //$pager = \Config\Services::pager();
        foreach ($registro as $key => $value) {

            if (array_key_exists('Authorization', $headers) && !empty($headers['Authorization'])) {

                if ($request->getHeader('Authorization') == 'Authorization: Basic ' . base64_encode($value["cliente_id"] . ":" . $value["llave_secreta"])) {

                    $permisoModel = new PermisoModel();
                    
                    $permiso = $permisoModel
                            ->findAll();

                    
                    if (!empty($permiso)) {

                        $data = array(
                            "Status" => 200,
                            "Total_Resultados" => count($permiso),
                            "Detalle" => $permiso
                                //"Paginador"=>$paginador
                        );
                    } else {

                        $data = array(
                            "Status" => 404,
                            "Total_Resultados" => 0,
                            "Detalle" => "Ningún registro cargado"
                        );
                    }
                } else {

                    $data = array(
                        "Status" => 404,
                        "Detalle" => "El token es inválido"
                    );
                }
            } else {

                $data = array(
                    "Status" => 404,
                    "Detalle" => "No está autorizado para recibir los registros"
                );
            }
        }

        return json_encode($data, true);
    }

    public function show($id) {
        //realiza solicitud a services y le decimos que ejecute el metodo request()
        $request = \Config\Services::request();
        $validation = \Config\Services::validation();
        $headers = $request->getHeaders();

        $registroModel = new RegistrosModel($db);
        $registro = $registroModel->where('estado', 1)
                ->findAll();

        foreach ($registro as $key => $value) {
            //verificacion del toquen de seguridad 
            if (array_key_exists('Authorization', $headers) && !empty($headers['Authorization'])) {

                if ($request->getHeader('Authorization') == 'Authorization: Basic ' . base64_encode($value["cliente_id"] . ":" . $value["llave_secreta"])) {
                    
                    $permisoModel = new permisoModel();

                    $permiso = $permisoModel
                            
                            ->find($id);
                    if (!empty($permiso)) {

                        $data = array(
                            "Status" => 200,
                            "Número Registro" =>$id,
                            "Detalle" => $permiso
                        );
                    } else {

                        $data = array(
                            "Status" => 404,
                            "Detalle" => "No hay ningún cliente registrado"
                        );
                    }
                } else {

                    $data = array(
                        "Status" => 404,
                        "Detalle" => "El token es inválido"
                    );
                }
            } else {

                $data = array(
                    "Status" => 404,
                    "Detalle" => "No está autorizado para recibir los registros"
                );
            }
        }

        return json_encode($data, true);
    }

    

    

}
