<script type="text/javascript" language="javascript" src="assets/js/jquery.dataTables.js"></script>

<script language="javascript">
$(document).ready(function(){
  
   $('#grilla_lista_usu').dataTable( {
        "iDisplayLength": 10,
        "aLengthMenu": [10, 50],
       "sPaginationType": "full_numbers",
       "aaSorting":[[0,'asc']],
        //DAMOS FORMATO A LA PAGINACION(NUMEROS)
        // "aLengthMenu": [30,50,100]

    } );

 if(className === 'hidden')
                {
                    hasClass = true;
                    col.hidden = true;
                    col.control = true;
                    return;
                }


 $("select[name=clasificacion]").change(function(){
            
           if ($(this).val()==''){
            
                $('.contenido tr').show('slow');}
                else{
            var rex = new RegExp($(this).val(), 'i');
            $('.contenido tr').hide('fast');
            $('.contenido tr').filter(function () {
            return rex.test($(this).text());        
        }).show('fast');
        }
        });
  
 })

</script>
<h1 class="page-header">LINEAS REGISTRADAS / <a href="index.php?c=principal">Volver</a></h1>
<div class="well well-sm text-right">
<div class="row">
   <div class="col-md-12">
        <div class="form-inline" style="padding: 5px;">
<select class="form-control" name="clasificacion" id="clasificacion">
     <option value="">Clasificaci&oacute;n</option>
       <?php //foreach($this->model->Listar() as $r): ?>           
     <option  value="<?php echo $r->nombre; ?>"><?php echo $r->nombre; ?></option>           
        <?php //endforeach; ?> 
      </select> 
      <a class="btn btn-primary" href="index.php?c=linea&a=Agregar">Nueva Linea</a>
        </div>
   </div>

</div>
</div>

<div class="table-responsive">
<table class="table table-hover" id="grilla_lista_usu">
    <thead>
         
        <tr><!-- esto es un comentario -->
            <th class="hidden">Linea</th>
            <th>Codigo</th>        
            <th>Nombre</th>
            <th>Ruta</th>
            <th>&nbsp;Tipo de ruta&nbsp;</th>
            <th>Nº Vehiculos</th>
            <th>Pasaje (Bs)</th>
            <th>Estado</th>
            <th></th>
            <th>Ver</th>
            <th>Editar</th>
           
            
        </tr>
    </thead>

    <tbody >
    <?php 
     
     foreach($this->model->Listar($acceso,$entrada) as $r):?>
        <tr>
            <td class="hidden"><?php echo $r->cod_rel; ?></td>
            <td><?php echo $r->cod_linea; ?></td>
            <td><?php echo $r->nombre_linea; ?></td>
            <td><?php echo $r->ruta; ?></td>
            <td><?php echo $r->tipo_ruta; ?></td>
            <td><?php echo $r->cantidad; ?></td>
            <td><?php echo $r->costo_pasaje; ?></td>
            <td><?php echo $r->estado; ?></td>
            <td><?php echo '<span class="label '.$r->color.'">'.$r->nomb_estado.'</span>';?></td>
            <td><a href="index.php?c=Linea&a=Ver&id=<?php echo $r->cod_rel;  ?>" class="btn btn-success" type="button" data-toggle="modal" data-target="#ver_linea" title="Ver Linea" >
                <span class="glyphicon glyphicon-eye-open"></span></a>
            </td>
            <td><a href="index.php?c=Linea&a=Editar&id=<?php echo $r->cod_rel;  ?>" class="btn btn-info"  title="Editar Linea"><span class="glyphicon glyphicon-edit"></span></a></td>
             <!-- -->                    
       
        </tr>

    <?php endforeach; ?>
    </tbody>
</table></div>

<!-- ************************ modal ver linea***************************************** -->
        <div class="modal fade" id="ver_linea" role="dialog" aria-hidden="true" data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog" style="width: 1000px; height: 500px; padding: 20px;">
                <div class="modal-content">
                    <div class="modal-header">
                        
                    </div>
                    <div class="modal-body" style="padding: 20px;">
                        
                    </div>
                    <div class="modal-footer">
                        
                    </div>
                </div>
            </div>
        </div>