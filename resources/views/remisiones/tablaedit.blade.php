                        <div class="card">
                        <div class="container">
                        <div class="row justify-content-center">
                          <h4>Cilindros en la remisión</h4>
                          <div class="col-sm-10">
                            
                              
                           
                            <table id="tablaedit" class="table table-hover table-condensed table-bordered tablaedit display responsive no-wrap" width="100%">
                              
                              <tr>
                              <td hidden="">Id</td>
                              <td hidden="">Id remision</td>
                              <td>Id envase</td>
                              <td>Producto</td>
                              <td>Capacidad</td>
                              <td>Acciones</td>
                              
                              </tr>
                              
                              @foreach($datos as $item)
                              <tr>
                                <td hidden="">{{$item->Id}}</td>
                                <td hidden="">{{$item->Id_remision}}</td>
                                <td class="valorid">{{$item->Id_envase}}</td>
                                <td>{{$item->Producto}}</td>
                                <td>{{$item->Cantidad}}</td>


                                <td>

                                  <button type="submit" class="btn btn-danger elim" id="elim" name="elim" onclick="
                                  eliminar({{$item->Id}});"
                                  
                                  >

                                    <i class="fas fa-trash-alt"></i>
                                  </button>
                                  
                                  <button type="submit" hidden="" id="submit" name="submit" onclick="antistock('{{$item->Id_envase}}');">Prueba</button>
                               
                                </td>
                              </tr>
                             @endforeach
                            </table>
                            <input type="text" hidden="" name="txtNombre" id="txtNombre" value=""> 
                          </div>
                        </div>
                        
                        </div>
                      </div>

                        <script>
$(document).ready(function(){
 $('#tablaedit tr').on('click', function(){
 var dato=$(this).find("td").eq(2).html(); 
  var dato2 = $('#txtNombre').val(dato);
});
  });

var antistock= (function(Id) {     

  var token=$('input[name="_token"]').val();
  var Id_envase =$('#txtNombre').val();
      $.ajax({
    type:'put',
    url:"{!!URL::to('antistockremisiones')!!}/"+Id,
    data:{Id_envase:Id_envase,_token:token},
    success:function(data){
      console.log(data.Id_envase);
     
        console.log('SI');
       
        //alertify.success('Guardado con exito');
    
       
  },
  
      
    }); 

});
                        </script>