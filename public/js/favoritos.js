$(document).on('click', '.boton', function (e) {
  e.preventDefault();
  
  $.ajax({
    type: "POST",
    url: "/deseado/controlador",
    data:{    
    "_token": "{{ csrf_token() }}", 
    "vehiculo_id":($(this).attr("veh_id")),
    "vendedor_id":($(this).attr("ven_id"))
     },
    dataType: "JSON",
    success: function (response) {
      console.log(response);
    
      if(response.resp==true){
          $(".boton").css("color", "black");
          $(".boton").css("background-color", "red");
      }else{
          $(".boton").css("color", "black");
          $(".boton").css("background-color", "white");
          
      }
  }
  });

});

  $(document).ready(function(){
  $('.fixed-action-btn').floatingActionButton();
});

/*function consulta(id1, id2){
  $.ajax({
    type: "GET",

    url: "/deseado/consulta/"+id1+'/'+id2,
    dataType: "JSON",
    success: function (response) {
      console.log(response);
      return response.resp;
      }
  });
}*/