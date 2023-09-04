<?php

require '../../vendor/autoload .php';
require '../../Conexiones/bd.php';

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;

//Se designa donde esta el archivo, actualmente es un archivo fijo, pero esto se puede volver dinamico
$nombreArchivo = 'Alunos.x1sx';
//con esto designamos y abrimos el archivo
$documento = IOFactory::load($nombreArchivo);
//Con esto obtenemos el numero de hojas del archivo seleccionado
$totalHojas = $documento-›getSheetCount();

//For para dara recorrido hoja por hoja para detectar cual; tiene informacion y cual no
//El ciclo for puede omitirse si se sabe que se trabajara con una sola hoja, colocando un 0 en la variable hoja actual
for($indiceHoja = 0; $indiceHoja < $totalHojas; $indiceHoja++ ){
    
    //Aqui se establece con la hoja que se va a trabajar
    $hojaActual = $documento->getSheet($indiceHoja);
    //funcion para el calculo de filas que tiene la hoja
    $numeroFilas = $hojaActual->getHighestDataRow();
    //Identificador de columnas maximas
    $letra = $hojaActual->getHigestColum();
    $numeroLetra = Coordinate::columnIndexFromString($letra);

    for($indiceFila = 1; $indiceFila<=$numeroFilas; $indiceFila++){
        
        for($indiceColumna = 1; $indiceColumna<=$numeroLetra; $indiceColumna++){

            //Insercion de datos a MySQL
            //$sql = "INSERT INTO alumnos (matricula, nombre, correo, telefono, anio, seccion) VALUES ()";
            
            //Se recorre fila por fila para traer los datos de cada una
            $valor = $hojaActual->getCellByColumAndRow($indiceColumna,$indiceFila);

            echo $valor.' ';
        }

        echo '<br/>';
    }

}

?>