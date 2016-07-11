<?php

// error_reporting(E_ERROR | E_WARNING | E_PARSE);

$xml_archivo = $_GET['archivo_bak'];

$contenido = file_get_contents($xml_archivo);
$xmls = explode('<?xml version="1.0" encoding="ISO-8859-1"?>', $contenido);

$docs = [];

$docs[] = [
	'tipo_doc'              => 'tipo_doc',
	'fecha'                 => 'fecha',
	'folio'                 => 'folio',
	
	'emisor_rut'            => 'emisor_rut',
	'emisor_razon_social'   => 'emisor_razon_social',
	'emisor_giro'           => 'emisor_giro',
	'emisor_ciudad'         => 'emisor_ciudad',
	'emisor_comuna'         => 'emisor_comuna',
	'emisor_direccion'      => 'emisor_direccion',
	
	'receptor_rut'          => 'receptor_rut',
	'receptor_razon_social' => 'receptor_razon_social',
	'receptor_giro'         => 'receptor_giro',
	'receptor_ciudad'       => 'receptor_ciudad',
	'receptor_comuna'       => 'receptor_comuna',
	'receptor_direccion'    => 'receptor_direccion',
	
	'neto'                  => 'neto',
	'exento'                => 'exento',
	'iva_tasa'              => 'iva_tasa',
	'iva'                   => 'iva',
	'total'                 => 'total',
];


foreach ($xmls as $i => $str) {

	if ( $xml = simplexml_load_string('<?xml version="1.0" encoding="ISO-8859-1"?>'.$str) )

		foreach ($xml->DTE as $j => $dte)

			$docs[] = [
				'tipo_doc'              => $dte->Documento->Encabezado->IdDoc->TipoDTE,
				'fecha'                 => $dte->Documento->Encabezado->IdDoc->FchEmis,
				'folio'                 => $dte->Documento->Encabezado->IdDoc->Folio,
				
				'emisor_rut'            => $dte->Documento->Encabezado->Emisor->RUTEmisor,
				'emisor_razon_social'   => $dte->Documento->Encabezado->Emisor->RznSoc,
				'emisor_giro'           => $dte->Documento->Encabezado->Emisor->GiroEmis,
				'emisor_ciudad'         => $dte->Documento->Encabezado->Emisor->CiudadOrigen,
				'emisor_comuna'         => $dte->Documento->Encabezado->Emisor->CmnaOrigen,
				'emisor_direccion'      => $dte->Documento->Encabezado->Emisor->DirOrigen,
				
				'receptor_rut'          => $dte->Documento->Encabezado->Receptor->RUTRecep,
				'receptor_razon_social' => $dte->Documento->Encabezado->Receptor->RznSocRecep,
				'receptor_giro'         => $dte->Documento->Encabezado->Receptor->GiroRecep,
				'receptor_ciudad'       => $dte->Documento->Encabezado->Receptor->CiudadRecep,
				'receptor_comuna'       => $dte->Documento->Encabezado->Receptor->CmnaRecep,
				'receptor_direccion'    => $dte->Documento->Encabezado->Receptor->DirRecep,
				
				'neto'                  => $dte->Documento->Encabezado->Totales->MntNeto,
				'exento'                => $dte->Documento->Encabezado->Totales->MntExe,
				'iva_tasa'              => $dte->Documento->Encabezado->Totales->TasaIVA,
				'iva'                   => $dte->Documento->Encabezado->Totales->IVA,
				'total'                 => $dte->Documento->Encabezado->Totales->MntTotal,
			];


}





include __DIR__.'/_pie.php';
