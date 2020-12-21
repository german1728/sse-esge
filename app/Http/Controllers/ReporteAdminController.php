<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Egresado;
use App\Preparacion;
use App\Empresa;
use App\Evento;
use App\Oferta;
use Session;
use App;

class ReporteAdminController extends Controller
{
    protected $carrera = array(
		0=>'Ingeniería Geológica-Geotecnia',
		1=>'Ingeniería en Computación',
		2=>'Ingeniería en Alimentos',
		3=>'Ingeniería en Electrónica',
		4=>'Ingeniería en Mecatrónica',
		5=>'Ingeniería Industrial',
		6=>'Ingeniería en Física Aplicada',
		7=>'Licenciatura en Ciencias Empresariales',
		8=>'Licenciatura en Matemáticas Aplicadas',
		9=>'Licenciatura en Estudios Mexicanos',
		10=>'Ingeniería en Mecánica Automotriz'
	);

    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
	public function showReporteView( Request $request, $string )
    {
        if( $string == "empty" ) $string = "";
        
        $pdf = \App::make( 'dompdf.wrapper' );
        $pdf->loadHTML( $this->get_data_to_html( $string ) );

        return $pdf->stream();
    }

    function showReporteViewEmpresas( Request $request, $string )
    {
        if( $string == "empty" ) $string = "";

        $pdf = \App::make( 'dompdf.wrapper' );
        $pdf->loadHTML( $this->get_data_to_html_empresas( $string ) );

        return $pdf->stream();

    }

    function showReporteViewEventos( Request $request, $string )
    {
        if( $string == "empty" ) $string = "";

        $pdf = \App::make( 'dompdf.wrapper' );
        $pdf->loadHTML( $this->get_data_to_html_eventos( $string ) );

        return $pdf->stream();
    }

    function showReporteViewOfertas( Request $request, $string )
    {
        if( $string == "empty" ) $string = "";

        $pdf = \App::make( 'dompdf.wrapper' );
        $pdf->setPaper('A4', 'portrait');
        $pdf->loadHTML( $this->get_data_to_html_ofertas( $string ) );
        
        return $pdf->stream();
    }

    function get_data_to_html_ofertas( $string )
    {
        $ofertas = Oferta::todo( $string )
            ->get();
        
        $output = '<style>
                    body{font-family: Arial, Helvetica, sans-serif;word-wrap: break-word}
                    table{ table-layout:fixed!important;width: 100%;border: none;font-size: 13px;}
                    table thead {color: white; background-color: #495057; }
                    tr, td {border: none;height: 40px;width:40px;padding-left:2px; }
                    tr:nth-child(even){ background-color: #D8D8D8;}
                    tbody tr:nth-child(odd){ background-color: #FFFFFF;}
                </style>
        <h3 align = "center">Reporte de ofertas laborales</h3>
        <table cellspacing="0" cellpadding="0" style="table-layout:fixed!important;text-align:center">
            <thead>
				<tr>
                <td style="width:8%">ID</td>
                    <td style="width:20%">Puesto</td>
                    <td style="width:20%">Empresa</td>
                    <td style="width:20%">Descripción</td>
                    <td style="width:20%;" >Ubicación</td>
                    <td style="width:20%">Carrera</td>
                </tr>
			</thead>';
        
        $output.='<tbody>';

        $i = 1;
        foreach( $ofertas as $oferta )
        {
            $output.='
                <tr>
                <td>' .$i.'</td>

                    <td>'.$oferta->titulo_empleo.'</td>
                    <td>'.$oferta->empresa->nombre.'</td>
                    <td>'.$oferta->descripcion.'</td>
                    <td style="text-transform: uppercase;">'.$oferta->ubicacion.'</td>
                    <td>'.$this->carrera[ $oferta->carrera ].'</td>
                </tr>';
            ++$i;
        }
        $output.='</tbody>  ';
        
        return $output;
    }

    

    function get_data_to_html_empresas( $string )
    {
        $empresas = Empresa::todo( $string )
            ->where('habilitada','=',1)
            ->orderBy('nombre', 'DESC')
            ->get();
        
        $output = '
        <style>
        body{font-family: Arial, Helvetica, sans-serif;word-wrap: break-word}
                    table{ width: 100%;border-collapse: collapse;border: #ACABAB 1px solid;font-size: 11px;margin: auto;}
                    table thead {color: white; background-color: #495057;  }
                    tr, td {height: 40px;width:40px;border: #ACABAB 1px solid; text-align:center!important;}
                    tr:nth-child(even){ background-color: #D8D8D8;}
                    tbody tr:nth-child(odd){background-color: #FFFFFF;}
                </style>
        <h3 align = "center">Reporte empresas</h3>
        <table cellspacing="0" cellpadding="0" style="table-layout:fixed!important;text-align:center">
            <thead class="thead-dark">
                <tr>
                <td style="width:8%">ID</td>
                    <td style="width:20%">Nombre</td>
                    <td style="width:20%">Ubicación</td>
                    <td style="width:20%">Página web</td>
                    <td style="width:20%">Correo</td>
                    <td style="width:20%">Teléfono</td>
                </tr>
			</thead>';
        
        $output.='<tbody>';

        $i = 1;
        foreach( $empresas as $empresa )
        {
            $output.='
                <tr>
                <td>'.$i.'</td>
               
                    <td >'.$empresa->nombre.'</td>
                    <td>'.$empresa->ciudad.', '.$empresa->departamento.'</td>
                    <td>'.$empresa->pagina_web.'</td>
                    <td>'.$empresa->correo.'</td>
                    <td>'.$empresa->telefono.'</td>
                </tr>';
            ++$i;
        }
        $output.='</tbody>';
        
        return $output;
    }

    function get_data_to_html( $string )
    {
        $egresados = Egresado::todo( $string )
            ->where( 'habilitado','=', 1 )
            ->orderBy( 'ap_paterno', 'DESC' )
            ->get();
        
        $output = '<style>
        body{font-family: Arial, Helvetica, sans-serif;word-wrap: break-word}
                    table{
                        table-layout:fixed!important;width: 100%;border: none;font-size: 13px;
                        }
                        table thead {
                            color: white; background-color: #495057; 
                        }
                        tr, td {
                        height: 48px;
                        border: #ACABAB 1px solid;
                        text-align:center;
                        }
                        tr:nth-child(even){
                        
                        background-color: #D8D8D8;
                        }
                        tbody tr:nth-child(odd){
                       
                        background-color: #FFFFFF;
                        }
                </style>
        <h3 align = "center">Reporte egresados</h3>
        <table cellspacing="0" cellpadding="0" style="table-layout:fixed!important;text-align:center"> 
            <thead>
                <tr> 
                    <td style="width:8%">ID</td>                    
                    <td style="width:20%">Matricula</td>
                    <td style="width:20%">Nombre</td>
                    <td style="width:20%">Carrera</td>
                    <td style="width:20%">Generación</td>
                </tr>
			</thead>';
        
        $output.='<tbody>';

        $i = 1;
        foreach( $egresados as $egresado )
        {
            $output.='
                <tr>
                    <td>'.$i.'</td>
                    <td>'.$egresado->matricula.'</td>
                    <td>'.$egresado->nombres.' '.$egresado->ap_paterno.' '.$egresado->ap_materno.'</td>
                    <td>'.$this->carrera[ $egresado->preparacion->carrera ].'</td>
                    <td>'.$egresado->preparacion->generacion.'</td>
                </tr>';
            ++$i;
        }
        $output.='</tbody>';
        
        return $output;
    }
}