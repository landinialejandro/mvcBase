<?php
// Especifica la ubicación del archivo XML
$archivoXML = 'model.xml'; // Cambia esto a la ruta de tu archivo XML

// Verifica si el archivo existe
if (file_exists($archivoXML)) {
    // Cargar y analizar el contenido del archivo XML
    $xmlString = file_get_contents($archivoXML);
    $xml = simplexml_load_string($xmlString);

    // Acceder a la información de las tablas
    $tables = $xml->table;

    foreach ($tables as $table) {
        // Obtener el nombre de la tabla
        $tableName = (string)$table->name;

        // Acceder a los campos de la tabla
        $fields = $table->field;

        echo "Tabla: $tableName\n";

        foreach ($fields as $field) {
            // Obtener información sobre los campos de la tabla
            $fieldName = (string)$field->name;
            $dataType = (int)$field->dataType;
            $notNull = (bool)$field->notNull;

            echo " - Campo: $fieldName\n";
            echo "   - Tipo de dato: $dataType\n";
            echo "   - Requiere valor no nulo: " . ($notNull ? "Sí" : "No") . "\n";
        }

        echo "\n";
    }

    // Aquí puedes realizar operaciones adicionales con la información de las tablas según tus necesidades.
} else {
    echo "El archivo XML no existe.";
}
?>
