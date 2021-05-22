<?php

/**
 * WECOP
 *
 * @author fperezm1
 * PHP version: 8.0.2
 */

namespace App\Models;
 
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class School
 *
 * @package App/Models
 */
class School extends Model
{
    use HasFactory;

    public $timestamps = false;

    //attributes id, nombre, comuna, carrera
    protected $fillable = ['nombre', 'comuna', 'carrera', 'user_id'];

    public function getNombre()
    {
        return $this->attributes['nombre'];
    }

    public function setNombre($nombre)
    {
        $this->attributes['nombre'] = $nombre;
    }

    public function getComuna()
    {
        return $this->attributes['comuna'];
    }

    public function setComuna($comuna)
    {
        $this->attributes['comuna'] = $comuna;
    }

    public function getCarrera()
    {
        return $this->attributes['carrera'];
    }

    public function setCarrera($carrera)
    {
        $this->attributes['carrera'] = $carrera;
    }
    
    public function getUser()
    {
        return $this->attributes['user_id'];
    }

    public static function validate(Request $request)
    {

        $request->validate([
            'nombre' => 'required',
            'comuna' => 'required|numeric|gt:0|max:10',
            'carrera' => 'required',
        ]);
    }
}
