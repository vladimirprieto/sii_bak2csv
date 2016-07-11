<?php

// error_reporting(E_ERROR | E_WARNING | E_PARSE);

$xml_archivo = $_GET['archivo_bak'];

$contenido = file_get_contents($xml_archivo);
$xmls = explode('<?xml version="1.0" encoding="ISO-8859-1"?>', $contenido);

$docs = [];

$docs[] = [
	'tipo_doc'             => 'tipo_doc',
	'fecha'                => 'fecha',
	'folio'                => 'folio',
	
	'numero_linea'         => 'numero_linea',
	'codigo'               => 'codigo',
	'descripcion'          => 'descripcion',
	'cantidad'             => 'cantidad',
	'unidad'               => 'unidad',
	'valor_unitario'       => 'valor_unitario',
	'valor_total'          => 'valor_total',
	'descuento_porcentaje' => 'descuento_porcentaje',
	'descuento_monto'      => 'descuento_monto',
	'exento'               => 'exento',
];


foreach ($xmls as $i => $str) {

	if ( $xml = simplexml_load_string('<?xml version="1.0" encoding="ISO-8859-1"?>'.$str) )

		foreach ($xml->DTE as $j => $dte)

			foreach ($dte->Documento->Detalle as $r => $det) {

				$docs[] = [
					'tipo_doc'             => $dte->Documento->Encabezado->IdDoc->TipoDTE,
					'fecha'                => $dte->Documento->Encabezado->IdDoc->FchEmis,
					'folio'                => $dte->Documento->Encabezado->IdDoc->Folio,
					
					'numero_linea'         => $det->NroLinDet,
					'codigo'               => $det->CdgItem->VlrCodigo,
					'descripcion'          => $det->NmbItem,
					'cantidad'             => $det->QtyItem,
					'unidad'               => $det->UnmdItem,
					'valor_unitario'       => $det->PrcItem,
					'valor_total'          => $det->MontoItem,
					'descuento_porcentaje' => $det->DescuentoPct,
					'descuento_monto'      => $det->DescuentoMonto,
					'exento'               => $det->IndExe,
				];

			}


}





include __DIR__.'/_pie.php';
