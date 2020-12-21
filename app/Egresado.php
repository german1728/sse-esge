<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Egresado extends Model
{
	/**
	* The table associated with the model.
	*
	* @var string
	*/
    public $table = 'Egresado';
    public $primaryKey = 'matricula';
    public $incrementing = false;
    // public $timestamps = false; //Si no se necesitan: created_at and updated_at

    protected $fillable = ['matricula', 'nombre', 'curp', 'genero', 'fecha_nacimiento', 'nacionalidad', 'telefono', 'lugar_origen', 'imagen_url'];
    public $carreras = array( 0 => "ingenieria Geológica-Geotecnia", 1 => 'Geología');
                          

	/**
	* Get the preparacion that owns the egresado.
	*/
    public function preparacion()
    {
        return $this->belongsTo('App\Preparacion');
    }

	/**
	* Get the primerEmpleo that owns the egresado.
	*/
    public function primerempleo()
    {
        return $this->belongsTo('App\PrimerEmpleo');
    }

	/**
	* Get the user record associated with the egresado.
	*/
    public function usuario()
    {
        return $this->hasOne('App\User');
    }
    
    /**
	* Get the empleos for egresado.
	*/
    public function empleos()
    {
        return $this->hasMany('App\Empleo');
    }

    /**
	* Get the calificaciones for Preparacion.
	*/
    public function calificaciones()
    {
        return $this->hasMany('App\Ranking');
    }

    public function scopeTitulo($query, $nombre){
        if (trim( $nombre ) != "")
        {
            $query
                ->where(\DB::raw("CONCAT(ap_paterno, ' ', matricula, ' ', curp)"), 'like', '%'.$nombre.'%');
        }
    }

    //Realiza la busqueda todo, por los campos asignados
    public function scopeTodo( $query, $nombre )
    {

        if (trim( $nombre ) != "")
        {
            if( in_array( $nombre, $this->carreras ) )
            {
                $index = $this->index( $nombre );

                $query
                    ->join( 'Preparacion', 'Preparacion.id', '=', 'Egresado.preparacion_id' )
                    ->where( 'carrera', '=', $index );
            }
            else if( preg_match( '/[0-9]{4}-[0-9]{4}/', $nombre, $math ) )
                $query
                    ->join( 'Preparacion', 'Preparacion.id', '=', 'Egresado.preparacion_id' )
                    ->where( 'generacion', '=', $nombre );
            else
                $query
                    ->where(\DB::raw("CONCAT(ap_paterno, ' ', ap_materno, ' ', nombres, ' ', matricula, ' ', curp )" ), 'like', '%'.$nombre.'%');
        }
    }

    protected function index( $key )
    {
        $index = array_search( $key, $this->carreras );

        switch( $index )
        {
            case 0: $value = 0; break; case 1: $value = 0; break;
          
        }

        return $value;
    }

}