$(document).ready(function () {
   
    marcas = [];
    document.querySelectorAll('.marca').forEach(aux => {
        marcas.push({
            "id": JSON.parse(aux.value).id+'/'+JSON.parse(aux.value).nombre,
            "text": JSON.parse(aux.value).nombre
        });
    });
    $('#marca').select2({
        data: marcas,
        dropdownParent: $("#modal1")
    });


    modelos = [];
    document.querySelectorAll('.modelo').forEach(aux => {
        modelos.push(
            {
                "id": JSON.parse(aux.value).nombre,
                "text": JSON.parse(aux.value).nombre
            }
        );
    });

    $('#modelo').select2({
        data: modelos,
        dropdownParent: $("#modal1")
    });


    
    estilos = [];
    document.querySelectorAll('.estilo').forEach(aux => {
        estilos.push( {
            "id": JSON.parse(aux.value).nombre,
            "text": JSON.parse(aux.value).nombre
        });
    });

    $('#estilo').select2({
        data: estilos,
        dropdownParent: $("#modal1")
    });

    
    colorExteriores = [];
    document.querySelectorAll('.colorExterior').forEach(aux => {
        colorExteriores.push( {
            "id": JSON.parse(aux.value).tipo,
            "text": JSON.parse(aux.value).tipo
        });
    });

    $('#colorExterior').select2({
        data: colorExteriores,
        dropdownParent: $("#modal1")
    });

    
    colorInteriores = [];
    document.querySelectorAll('.colorInterior').forEach(aux => {
        colorInteriores.push({
            "id": JSON.parse(aux.value).tipo,
            "text": JSON.parse(aux.value).tipo
        });
    });

    $('#colorInterior').select2({
        data: colorInteriores,
        dropdownParent: $("#modal1")
    });

 
 
   
});
