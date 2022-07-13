JavaScript
$(document).ready(function(){
    $('#data_table').Tabledit({
        deleteButton: false,
        editButton: false,          
        columns: {
          identifier: [0, 'producto'],                    
          editable: [[1, 'estilo'], [2, 'tamano'], [3, 'genero'], [4, 'existencia'], [5, 'imagen'], [6, 'precio'], [7, 'codigo_barras'], [8, 'oferta']]
        },
        hideIdentifier: true,
        url: 'editarCelda.php'      
    });
});
