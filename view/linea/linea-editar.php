<h1 class="page-header">
    <?php echo $alm->cod_rel!= null ? 'Modificar Linea' : 'Nueva Linea'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="index.php?c=Linea">Linea</a></li>
  <li class="active"><?php echo $alm->cod_rel != null ? $alm->nombre_linea : 'Nuevo Registro'; ?></li>
</ol>

<form id="frm-plus" action="index.php?c=Linea&a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id_int" id="id_int" value="<?php echo $alm->cod_rel; ?>" />
    <input type="hidden" name="id_consulta" id="id_consulta" value="<?php echo $alm->id_consulta; ?>" />
    <input type="hidden" name="fing" id="fing" value="<?php echo date('d-m-Y'); ?>" />
    <input type="hidden" name="id_inmueble" id="id_inmueble" value="<?php echo $alm->id_inmueble; ?>" />
    <input type="hidden" name="id_propietario" id="id_propietario" value="" />
    <input type="hidden" name="operacion" id="operacion" value="" />
 <ol class="breadcrumb">
 <label>Datos de la Linea</label>
     <div class="row">        
        <div class="col-md-2 col-xs-12">
            <div class="form-group">
                <label>Codigo:</label>
                <input name="codigo" id="codigo" type="email" class="form-control" value="<?php echo $alm->codigo; ?>"
    data-fv-emailaddress-message="El valor no es un codigo valido"  required/>
            </div>
        </div>
        <div class="col-md-3 col-xs-12">
            <div class="form-group">
                <label>Nombre</label>
                <input id="nombre" type="text" name="nombre" class="form-control" value="<?php echo $alm->nombre; ?>"/>
            </div>
        </div>
        <div class="col-md-3 col-xs-12">
            <div class="form-group">
                <label>Tel&eacute;fono:</label>
                <input id="telefono" type="number" min="11" name="telefono" class="form-control" value="<?php echo $alm->tlf; ?>"/>
            </div>
        </div>

    </div> 
<div class="row">
        <div class="col-md-2 col-xs-12">
            <div class="form-group">
                <label>Ruta:</label>
                <input type="text" name="fc" id="fc" class="form-control" value="<?php echo $alm->fechac; ?>" required/>
            </div>
        </div>
        <div class="col-md-3 col-xs-12">
            <div class="form-group">
                <label>Tipo de ruta</label>
                <input type="text" name="fv" id="fv" class="form-control" value="<?php echo $alm->fechav; ?>" required/> 
            </div>
        </div>
        <div class="col-md-2 col-xs-12" id="fi" name="fi">
        <div class="form-group">
            <label>Costo del pasaje: </label>
            <input type="text" name="fi" id="fi" class="form-control" value="<?php echo $alm->fechai; ?>"> 
        </div>
    </div>

    
 
</div>
<div class="row">
    <div class="col-md-12 col-xs-12">
        <div class="form-group">
            <label>Notas:</label>
            <textarea cols="40" rows="4" class="form-control" id="notas_interesado" name="notas_interesado"><?php echo $alm->notas_interesado; ?></textarea>
        </div>

    </div>
</div>
    

<div class="row"> 

       <? if(!empty($alm->cod_rel)){?>
        <div class="col-md-3 col-xs-12">
            <div class="form-group">
                <label>Estado</label>
                <select name="estado" id="estado" class="form-control">
                <?php foreach($this->model->Listar_estado() as $r): ?>           
                 <option <?php echo $r->id == $alm->estado ? 'selected' : ''; ?> value="<?php echo $r->id; ?>" background-color="<?php echo $r->color; ?>"><?php echo $r->nombre; ?></option>           
                <?php endforeach; ?> 
               </select>
            </div>
        </div><? } else {?> <div class="col-md-3 col-xs-12">
            <div class="form-group">
                <label>Estado</label>
                <select name="estado" id="estado" class="form-control">                       
                 <option value="9" background-color="bg-fuchsia">Sin Atender</option>                       
               </select>
            </div>
        </div><? }?>
    <!--<div class="col-md-3 col-xs-12">
        <div class="form-group">
        <label>Ambientes a usar:</label>
        <select name="ambientes" id="ambientes" class="form-control">
        </select>
        </div>
    </div>--> 


    <?php  if(!empty($alm->cod_rel)){ ?>
     <div class="col-md-3 col-xs-12">
            <div class="form-group">
                <label>Clasificación</label>
                <select name="clasificacion" id="clasificacion" class="form-control">
            <?php foreach($this->model->Listar_plus() as $r): ?>           
            <option <?php echo $r->id == $alm->clasificacion ? 'selected' : ''; ?> value="<?php echo $r->id; ?>"><?php echo $r->nombre; ?></option>           
            <?php endforeach; ?> 
       </select>
            </div>
        </div>
       <?php } //else { ?>
        <!--<div class="col-md-3 col-xs-12" style="display: none;">        
    </div>--><?php //} ?>
</div> 
</ol>
    <div class="row">
        <div class="text-right col-md-12">
        <button class="btn btn-success">Guardar</button>
    </div>
    </div>
   
   
</form>

<script>
    $(document).ready(function(){
        $("#frm-metricar").submit(function(){
            return $(this).validate();
        });
    })
</script>