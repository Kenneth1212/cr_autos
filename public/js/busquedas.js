        $(document).ready(function () {
            
            marcas = [];
            document.querySelectorAll('.marca').forEach(aux => {
                marcas.push({
                    "id": JSON.parse(aux.value).id,
                    "text": JSON.parse(aux.value).nombre
                });
            });
            $('#marca').select2({
                data: marcas
            });
       
            modelos = [];
            document.querySelectorAll('.modelo').forEach(aux => {
                modelos.push(
                    {
                        "id": JSON.parse(aux.value).id,
                        "text": JSON.parse(aux.value).nombre
                    }
                );
            });

            $('#modelo').select2({
                data: modelos
            });

 
            
            estilos = [];
            document.querySelectorAll('.estilo').forEach(aux => {
                estilos.push( {
                    "id": JSON.parse(aux.value).id,
                    "text": JSON.parse(aux.value).nombre
                });
            });

            $('#estilo').select2({
                data: estilos
            });
 
            
            colorExteriores = [];
            document.querySelectorAll('.colorExterior').forEach(aux => {
                colorExteriores.push( {
                    "id": JSON.parse(aux.value).id,
                    "text": JSON.parse(aux.value).tipo
                });
            });

            $('#colorExterior').select2({
                data: colorExteriores
            });
 
            
            colorInteriores = [];
            document.querySelectorAll('.colorInterior').forEach(aux => {
                colorInteriores.push({
                    "id": JSON.parse(aux.value).id,
                    "text": JSON.parse(aux.value).tipo
                });
            });

            $('#colorInterior').select2({
                data: colorInteriores
            });


        
            
            combustibles = [];
            document.querySelectorAll('.combustible').forEach(aux => {
                combustibles.push({
                    "id": JSON.parse(aux.value).id,
                    "text": JSON.parse(aux.value).tipo
                });
            });

            $('#combustible').select2({
                data: combustibles
            });



            transmisiones = [];
            document.querySelectorAll('.transmision').forEach(aux => {
                transmisiones.push(
                    {
                        "id": JSON.parse(aux.value).id,
                        "text": JSON.parse(aux.value).nombre
                    }
                );
            });
            

            $('#transmision').select2({
                data: transmisiones
            });
            
            


    
            
            anos = [];
            for (let index = new Date().getFullYear(); index > 1940; index--) {
                anos.push({
                    "id": index,
                    "text": index
                });
            }
            $('#ano').select2({
                data: anos
            });

        });
