<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ClientesModel;
use App\Models\RegistrosModel;

class Clientes extends Controller {

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

                    $clienteModel = new ClientesModel();
                    
                    $cliente = $clienteModel
                            ->findAll();

                    
                    if (!empty($cliente)) {

                        $data = array(
                            "Status" => 200,
                            "Total_Resultados" => count($cliente),
                            "Detalle" => $cliente
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
                    
                    $clienteModel = new ClientesModel();
                    $cliente = $clienteModel
                            ->select("p.id as id,p.nombre as cliente,p.apellidos as apellidospatmat,
                                td.nombre as tipo_doc,p.email as email,p.password as clave,
                                p.celular as celular,p.id_sexo as id_sexo,p.id_cargo as id_cargo,
                                p.direccion as direccion, p.imagen as imagen,p.id_distrito as id_distrito,
                                p.num_doc as num_doc,p.id_tipo_doc as id_tipo_doc,
                                s.nombre as sexo,
                                c.nombre as cargo,
                                d.nombre as distrito")
                           ->from("persona as p")
                           ->join("sexo as s", "p.id_sexo = s.id", "inner")
                           ->join("cargo as c", "p.id_cargo = c.id", "inner")
                           ->join("distrito as d", "p.id_distrito = d.id", "inner")
                           ->join("tipo_doc as td", "p.id_tipo_doc = td.id", "inner")
                           ->where("p.id", $id)
                           ->where("p.estado", 1)
                            ->find($id);
                    if (!empty($cliente)) {

                        $data = array(
                            "Status" => 200,
                            "Número Registro" =>$id,
                            "Detalle" => $cliente
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

    public function create() {
        //realiza solicitud a services y le decimos que ejecute el metodo request()
        $request = \Config\Services::request();
        $validation = \Config\Services::validation();
        $headers = $request->getHeaders();

        $registroModel = new RegistrosModel($db);
        $registro = $registroModel->where('estado', 1)
                ->findAll();
        foreach ($registro as $key => $value) {

            if (array_key_exists('Authorization', $headers) && !empty($headers['Authorization'])) {

                if ($request->getHeader('Authorization') == 'Authorization: Basic ' . base64_encode($value["cliente_id"] . ":" . $value["llave_secreta"])){

                    // Registro de datos
                    //El getVar()método extraerá de $ _REQUEST, por lo que devolverá cualquier dato de $ _GET, $ POST 
                    $datos = array("nombre" => $request->getVar("nombre"),
                        "apellidos" => $request->getVar("apellidos"),
                        "id_sexo" => $request->getVar("id_sexo"),
                        "id_tipo_doc" => $request->getVar("id_tipo_doc"),
                        "num_doc" => $request->getVar("num_doc"),
                        "email" => $request->getVar("email"),
                        "password" => $request->getVar("password"),
                        "celular" => $request->getVar("celular"),
                        "id_cargo" => $request->getVar("id_cargo"),
                        "id_distrito" => $request->getVar("id_distrito"),
                        "direccion" => $request->getVar("direccion"),                                      
                        "imagen" => $request->getVar("imagen")

                    );

                    if (!empty($datos)) {

                        // Validar los datos

                        $validation->setRules([
                            'nombre' => 'string|max_length[255]',
                            'apellidos' => 'string|max_length[255]',
                            'id_sexo' => 'numeric|max_length[255]',
                            'id_tipo_doc' => 'numeric|max_length[255]', 
                            'num_doc' => 'numeric|max_length[255]',
                            'email' => 'string|max_length[255]',
                            'direccion' => 'string|max_length[255]',
                            'password' => 'string|max_length[255]',
                            'celular' => 'string|max_length[255]',
                            'id_cargo' => 'numeric|max_length[255]',
                            'id_distrito' => 'numeric|max_length[255]',
                            'imagen' => 'string|max_length[255]'
                        ]);

                        $validation->withRequest($this->request)
                                ->run();

                        if ($validation->getErrors()) {
                            $errors = $validation->getErrors();
                            $data = array(
                                "Status" => 404,
                                "Detalle" => $errors
                            );
                            return json_encode($data, true);
                        } else {
                            $datos = array("nombre" => $datos["nombre"],
                                "apellidos" => $datos["apellidos"],
                                "id_sexo" => $datos["id_sexo"],
                                "id_tipo_doc" => $datos["id_tipo_doc"],
                                "num_doc" => $datos["num_doc"],
                                "email" => $datos["email"],
                                "direccion" => $datos["direccion"],
                                "password" => $datos["password"],
                                "celular" => $datos["celular"],
                                "id_cargo" => $datos["id_cargo"],
                                "id_distrito" => $datos["id_distrito"],
                                "imagen" => $value["imagen"]);

                            $clienteModel = new ClientesModel($db);
                            $cliente = $clienteModel->insert($datos);
                            $data = array(
                                "Status" => 200,
                                "Detalle" => "Registro exitoso, cliente guardado (creado)"
                            );
                            return json_encode($data, true);
                        }
                    } else {

                        $data = array(
                            "Status" => 404,
                            "Detalle" => "Registro con errores"
                        );

                        return json_encode($data, true);
                    }
                }else {

                    $data = array(
                        "Status" => 404,
                        "Detalles" => "El token es inválido"
                    );
                }
            } else {

                $data = array(
                    "Status" => 404,
                    "Detalles" => "No está autorizado para guardar los registros"
                );
            }
        }

        return json_encode($data, true);
    }

    public function update($id) {
        //realiza solicitud a services y le decimos que ejecute el metodo request()
        $request = \Config\Services::request();
        $validation = \Config\Services::validation();
        $headers = $request->getHeaders();
        $registroModel = new RegistrosModel($db);
        $registro = $registroModel->where('estado', 1)
                ->findAll();
        foreach ($registro as $key => $value) {
            if (array_key_exists('Authorization', $headers) && !empty($headers['Authorization'])) {
                if ($request->getHeader('Authorization') == 'Authorization: Basic ' . base64_encode($value["cliente_id"] . ":" . $value["llave_secreta"])) {
                    // Tomar datos      
                    $datos = $this->request->getRawInput();
                    if (!empty($datos)) {
                        //Validar datos
                        $validation->setRules([
                            'nombre' => 'required|string|max_length[255]',
                            'apellidos' => 'string|max_length[255]',
                            'id_sexo' => 'required|string|max_length[255]',
                            'id_tipo_doc' => 'required|string|max_length[255]', 
                            'num_doc' => 'required|string|max_length[255]',
                            'email' => 'required|string|max_length[255]',
                            'direccion' => 'required|string|max_length[255]',
                            'password' => 'required|string|max_length[255]',
                            'celular' => 'required|string|max_length[255]',
                            'id_cargo' => 'required|string|max_length[255]',
                            'id_distrito' => 'required|string|max_length[255]',
                            'imagen' => 'string|max_length[255]'
                        ]);

                        $validation->withRequest($this->request)
                                ->run();

                        if ($validation->getErrors()) {
                            $errors = $validation->getErrors();
                            $data = array(
                                "Status" => 404,
                                "Detalle" => $errors
                            );

                            return json_encode($data, true);
                        } else {

                            $clienteModel = new ClientesModel($db);
                            $cliente = $clienteModel->find($id);
                            $datos = array(
                                "nombre" => $datos["nombre"],
                                "apellidos" => $datos["apellidos"],
                                "id_sexo" => $datos["id_sexo"],
                                "id_tipo_doc" => $datos["id_tipo_doc"],
                                "num_doc" => $datos["num_doc"],
                                "email" => $datos["email"],
                                "direccion" => $datos["direccion"],
                                "password" => $datos["password"],
                                "celular" => $datos["celular"],
                                "id_cargo" => $datos["id_cargo"],
                                "id_tipo_persona" => $datos["id_tipo_persona"],
                                "id_distrito" => $datos["id_distrito"],
                                "imagen" => $datos["imagen"]
                               
                            );

                            $cliente = $clienteModel->update($id, $datos);
                            $data = array(
                                "Status" => 200,
                                "Detalle" => "Datos de cliente actualizado"
                            );
                            return json_encode($data, true);
                        }
                    } else {

                        $data = array(
                            "Status" => 404,
                            "Detalle" => "Registro con errores"
                        );

                        return json_encode($data, true);
                    }
                } else {

                    $data = array(
                        "Status" => 404,
                        "Detalles" => "El token es inválido"
                    );
                }
            } else {

                $data = array(
                    "Status" => 404,
                    "Detalles" => "No está autorizado para editar los registros"
                );
            }
        }

        return json_encode($data, true);
    }

    public function delete($id) {
        //realiza solicitud a services y le decimos que ejecute el metodo request()
        $request = \Config\Services::request();
        $validation = \Config\Services::validation();

        $headers = $request->getHeaders();

        $registroModel = new RegistrosModel($db);

        $registro = $registroModel->where('estado', 1)
                ->findAll();

        foreach ($registro as $key => $value) {

            if (array_key_exists('Authorization', $headers) && !empty($headers['Authorization'])) {

                if ($request->getHeader('Authorization') == 'Authorization: Basic ' . base64_encode($value["cliente_id"] . ":" . $value["llave_secreta"])) {

                    $clienteModel = new ClientesModel($db);
                    $cliente = $clienteModel->find($id);


                    if (!empty($cliente)) {
                        $datos = array('estado' => 0);
                        $cliente = $clienteModel->update($id, $datos);

                        $data = array(
                            "Status" => 200,
                            "Detalle" => "Se ha borrado con éxito"
                        );

                        return json_encode($data, true);
                    } else {

                        $data = array(
                            "Status" => 404,
                            "Detalle" => "El cliente no existe"
                        );

                        return json_encode($data, true);
                    }
                } else {

                    $data = array(
                        "Status" => 404,
                        "Detalles" => "El token es inválido"
                    );
                }
            } else {

                $data = array(
                    "Status" => 404,
                    "Detalles" => "No está autorizado para editar los registros"
                );
            }
        }

        return json_encode($data, true);
    }

    public function recuperar($id) {
        //realiza solicitud a services y le decimos que ejecute el metodo request()
        $request = \Config\Services::request();
        $validation = \Config\Services::validation();

        $headers = $request->getHeaders();

        $registroModel = new RegistrosModel($db);

        $registro = $registroModel->where('estado', 1)
                ->findAll();

        foreach ($registro as $key => $value) {

            if (array_key_exists('Authorization', $headers) && !empty($headers['Authorization'])) {

                if ($request->getHeader('Authorization') == 'Authorization: Basic ' . base64_encode($value["cliente_id"] . ":" . $value["llave_secreta"])) {

                    $clienteModel = new ClientesModel($db);
                    $cliente = $clienteModel->find($id);


                    if (!empty($cliente)) {
                        $datos = array('estado' => 1);
                        $cliente = $clienteModel->update($id, $datos);

                        $data = array(
                            "Status" => 200,
                            "Detalle" => "Se ha recuperado con éxito"
                        );

                        return json_encode($data, true);
                    } else {

                        $data = array(
                            "Status" => 404,
                            "Detalle" => "El cliente no existe"
                        );

                        return json_encode($data, true);
                    }
                } else {

                    $data = array(
                        "Status" => 404,
                        "Detalles" => "El token es inválido"
                    );
                }
            } else {

                $data = array(
                    "Status" => 404,
                    "Detalles" => "No está autorizado para editar los registros"
                );
            }
        }

        return json_encode($data, true);
    }

}
