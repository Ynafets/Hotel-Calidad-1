
<link rel="stylesheet" href="assets/js/vendor/footable/css/footable.core.min.css">
<body id="minovate" class="appWrapper sidebar-sm-forced">
<div class="row">
<section class="content-header">
    <ol class="breadcrumb">
      <li><a href="index.php?view=reserva"><i class="fa fa-home"></i> Inicio</a></li>
      <li class="active"><a href="#">Egresos</a></li>
    </ol>
</section> 
</div> 




<section>
<div class="row">

  <div class="col-md-12">
          <!-- Custom Tabs (Pulled to the right) -->

          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs" style="background-color: #d2d6de;">
              <li class="active"><a href="#tab_1" data-toggle="tab">Lista de egresos</a></li>
              <li><a href="#tab_2" data-toggle="tab">Egresos anulados</a></li>
              <!--
              <li class="pull-right text-red"><a href="reporte/pdf/documentos/reporte_diario.php" target="_blank" class="text-muted"><i class="fa fa-print"></i> IMPRIMIR</a></li>
            -->
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                <?php if(isset($_GET['start']) and $_GET['start']!="" and isset($_GET['end']) and $_GET['end']!=""){
                  $gastos = GastoData::getFiltroFechas($_GET['start'],$_GET['end']);
                }else{
                  $gastos = GastoData::getAll(); 
                } ?> 
                <?php  
                if(count($gastos)>0){  ?>
                  <table summary="Mi tabla" aria-describedby="descripcion" id="searchTextResults" data-filter="#filter" data-page-size="7" class="footable table table-custom" style="font-size: 11px;">

                  <thead style="color: black; background-color: #d2d6de;">
                        <th scope = "col">Nº</th> 
                        <th scope = "col">Descripción</th>
                        <th data-hide="phone">Precio</th>
                        <th data-hide='phone, tablet'>Fecha</th>
                        <th data-hide='phone, tablet'>Responsable</th>

                        <th scope = "col"></th>
                        <th scope = "col"></th>
                  </thead> 
                   <?php foreach($gastos as $gasto):?> 
                      <tr>
                        <td><?php echo $gasto->id; ?></td>
                        <td><strong><?php echo $gasto->descripcion; ?></strong></td>
                        <td><?php echo $gasto->precio; ?></td>
                        <td><?php echo $gasto->fecha; ?></td>
                        <td><?php if($gasto->id_usuario!=NULL){ echo $gasto->getUsuario()->name;}else{ echo "--------";} ?></td>
                        
                        <td>
                        <a href=""  data-toggle="modal" data-target="#myModal<?php echo $gasto->id; ?>" class="btn btn-warning btn-xs"><em class="glyphicon glyphicon-trash"></em> Anular</a>
                        </td>
                        <td>
                        <a href="index.php?view=imprimir_gasto&id=<?php echo $gasto->id;?>"  class="btn btn-success btn-xs"><em class="glyphicon glyphicon-print"></em> Imprimir</a>
                        </td>
                      </tr> 
                  

                       

 <div class="modal fade bs-example-modal-xm" id="myModal<?php echo $gasto->id; ?>" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-warning">
          <div class="modal-dialog">
            <div class="modal-content">
                <form class="form-horizontal" method="post" id="addproduct" action="index.php?view=anular_gasto" role="form">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><span class="fa fa-warning"></span> ESTÁ SEGURO DE ANULAR?</h4>
              </div>
              <div class="modal-body" style="background-color:#fff !important;">
                
                <div class="row">
                <div class="col-md-offset-1 col-md-10">
 
                  
      

                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"> Descripción </span>
                      <input type="text" class="form-control col-md-8" value="<?php echo $gasto->descripcion; ?>" >
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="input-group">
                      <span class="input-group-addon"> Precio </span>
                      <input type="text" class="form-control col-md-8" value="<?php echo $gasto->precio; ?>" >
                    </div>
                  </div>

                  

                 
                  
                </div>
                </div>

              </div>
              <div class="modal-footer">
                <input type="hidden" name="id_gasto" value="<?php echo $gasto->id; ?>">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-outline">Anular</button>
              </div>
            </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
      </div>

                    <?php endforeach; ?>
                    </tbody>
                      <tfoot class="hide-if-no-paging">
                        <tr>
                          <td colspan="7" class="text-center">
                            <ul class="pagination"></ul>
                          </td>
                        </tr>
                      </tfoot>
                  </table>

               <?php }else{ 
            echo"<h4 class='alert alert-success'>NO HAY REGISTRO</h4>";

                };
                ?>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">
                <?php if(isset($_GET['start']) and $_GET['start']!="" and isset($_GET['end']) and $_GET['end']!=""){
                  $gastos = GastoData::getFiltroFechasAnulado($_GET['start'],$_GET['end']);
                }else{
                  $gastos = GastoData::getAllAnulado(); 
                } ?> 
                <?php  
                if(count($gastos)>0){  ?>
                  <table summary="Mi tabla" aria-describedby="descripcion" id="searchTextResults" data-filter="#filter" data-page-size="7" class="footable table table-custom" style="font-size: 11px;">

                  <thead style="color: black; background-color: #d2d6de;">
                        <th scope = "col">Nº</th> 
                        <th scope = "col">Descripción</th>
                        <th scope = "col" data-hide="phone">Precio</th>
                        <th scope = "col" data-hide='phone, tablet'>Fecha</th>
                        <th scope = "col" data-hide='phone, tablet'>Responsable</th> 

                        <th scope = "col">Estado</th>
                      
                  </thead> 
                   <?php foreach($gastos as $gasto):?> 
                      <tr>
                        <td><?php echo $gasto->id; ?></td>
                        <td><strong><?php echo $gasto->descripcion; ?></strong></td>
                        <td><?php echo $gasto->precio; ?></td>
                        <td><?php echo $gasto->fecha; ?></td>
                        <td><?php if($gasto->id_usuario!=NULL){ echo $gasto->getUsuario()->name;}else{ echo "--------";} ?></td>
                        
                        <td>
                        <a class="btn btn-danger btn-xs"><em class="glyphicon glyphicon-trash"></em> Anulado</a>
                        </td>

                      </tr> 
                  


                    <?php endforeach; ?>
                    </tbody>
                      <tfoot class="hide-if-no-paging">
                        <tr>
                          <td colspan="6" class="text-center">
                            <ul class="pagination"></ul>
                          </td>
                        </tr>
                      </tfoot>
                  </table>

               <?php }else{ 
            echo"<h4 class='alert alert-success'>NO HAY REGISTRO</h4>";

                };
                ?>
              </div>
              <!-- /.tab-pane -->
              
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>

    </div>
</div>

</section>








       
        <script src="assets/js/vendor/bootstrap/bootstrap.min.js"></script>
        <script src="assets/js/vendor/jRespond/jRespond.min.js"></script>
        <script src="assets/js/vendor/sparkline/jquery.sparkline.min.js"></script>
        <script src="assets/js/vendor/slimscroll/jquery.slimscroll.min.js"></script>
        <script src="assets/js/vendor/animsition/js/jquery.animsition.min.js"></script>
        <script src="assets/js/vendor/screenfull/screenfull.min.js"></script>
        <script src="assets/js/vendor/footable/footable.all.min.js"></script>
        <script src="assets/js/main.js"></script>
         <script src="assets/js/vendor/jquery/jquery-1.11.2.min.js"></script>
 <script>
            $(window).load(function(){

                $('.footable').footable();

            });
</script>  