<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use Facade\FlareClient\Http\Client;
use Illuminate\Support\Facades\DB;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Cliente::all();
        return $clientes;
    }

    /*
    * Funcion login
    */

    public function login(Request $request)
    {
        $datos = request();
        $cliente = Cliente::where('correo', '=', $datos->correo)->first();
        if(password_verify($datos->pass, $cliente->pass)){
            $response = array(
                'resultado' => true,
                'cliente' => [
                    'id' => $cliente->id,
                    'nombre' => $cliente->nombre,
                    'correo' => $cliente->correo
                ]
            );
        }else{
            $response = array(
                'resultado' => false
            );
        }
        return $response;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datos = request();
        $opciones = array(
            'cost' => 12
        );
        $password_hashed = password_hash($datos->pass, PASSWORD_BCRYPT, $opciones);
        $cliente = new Cliente();
        $cliente->nombre = $datos->nombre;
        $cliente->edad = $datos->edad;
        $cliente->sexo = $datos->sexo;
        $cliente->domicilio = $datos->domicilio;
        $cliente->cp = $datos->cp;
        $cliente->cel = $datos->cel;
        $cliente->correo = $datos->correo;
        $cliente->user = $datos->user;
        $cliente->pass = $password_hashed;
        $cliente->imagen = $datos->imagen;
        $cliente->ultimo_acceso = $datos->ultimo_acceso;
        $cliente->calificaciones = $datos->calificaciones;
        $cliente->save();
        if($cliente->id > 0){
            $response = array(
                'resultado' => true,
                'cliente' => [
                    'id' => $cliente->id,
                    'nombre' => $cliente->nombre,
                    'correo' => $cliente->correo
                ]
            );
        }else{
            $response = array(
                'resultado' => false
            );
        }
        return $response;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datos = request();
        $cliente = Cliente::where('id', $id)->first();
        if($cliente){
            if($datos->pass != ''){
                $opciones = array(
                    'cost' => 12
                );
                $password_hashed = password_hash($datos->pass, PASSWORD_BCRYPT, $opciones);
                $cliente->pass = $password_hashed;
            }
            $cliente->nombre = $datos->nombre;
            $cliente->edad = $datos->edad;
            $cliente->sexo = $datos->sexo;
            $cliente->domicilio = $datos->domicilio;
            $cliente->cp = $datos->cp;
            $cliente->cel = $datos->cel;
            $cliente->correo = $datos->correo;
            $cliente->user = $datos->user;
            $cliente->imagen = $datos->imagen;
            $cliente->ultimo_acceso = $datos->ultimo_acceso;
            $cliente->calificaciones = $datos->calificaciones;
            $cliente->save();
            $response = array(
                'resultado' => true,
                'cliente' => [
                    'id' => $cliente->id,
                    'nombre' => $cliente->nombre,
                    'correo' => $cliente->correo
                ]
            );
        }else{
            $response = array(
                'resultado' => false
            );
        }
        return $response;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cliente = Cliente::where('id', $id)->first();
        $cliente->delete();
        $response = array(
            'resultado' => true
        );
        return $response;
    }
}
