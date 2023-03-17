function modalAgregar(pagina,usuario){
    if (usuario != ""){
        $('#usuario').val(usuario);
    }
    $('#myModal' + pagina).modal('show');
}

// -------- Basicas -----------

function modalEditarAsesor(id){
    
    $.ajax({
        url: "../../../General/Queries/Basicas/infoasesor.php",
        type: "POST",
        dataType: "JSON",
        data: {id: id}
    })
    .done(function(info){

        var nombre = info[0].nombre;
        var correo = info[0].correo;
        var telefono = info[0].telefono;

        $("#ideditar").val(id);
        $("#nombre").val(nombre);
        $("#correo").val(correo);
        $("#telefono").val(telefono);
        $('#myModalEditarAsesor').modal('show');
    });
}

function modalEditarCiudad(id){
    
    $.ajax({
        url: "../../../General/Queries/Basicas/infociudad.php",
        type: "POST",
        dataType: "JSON",
        data: {id: id}
    })
    .done(function(info){

        var departamento = info[0].id_departamento;
        var ciudad = info[0].nombre_ciudad;

        $("#ideditar").val(id);
        $("#id_departamento").val(departamento);
        $("#nombre_ciudad").val(ciudad);
        $('#myModalEditarCiudad').modal('show');
    });
}

function modalEditarDepartamento(id){
    
    $.ajax({
        url: "../../../General/Queries/Basicas/infodepartamento.php",
        type: "POST",
        dataType: "JSON",
        data: {id: id}
    })
    .done(function(info){

        var nombre = info[0].nombre_departamento;

        $("#ideditar").val(id);
        $("#nombre_departamento").val(nombre);
        $('#myModalEditarDepartamento').modal('show');
    });
}

function modalEditarEstado(id){
    
    $.ajax({
        url: "../../../General/Queries/Basicas/infoestado.php",
        type: "POST",
        dataType: "JSON",
        data: {id: id}
    })
    .done(function(info){

        var descripcion = info[0].descripcion;

        $("#ideditar").val(id);
        $("#descripcion").val(descripcion);
        $('#myModalEditarEstado').modal('show');
    });
}

function modalEditarProceso(id){
    
    $.ajax({
        url: "../../../General/Queries/Basicas/infoproceso.php",
        type: "POST",
        dataType: "JSON",
        data: {id: id}
    })
    .done(function(info){

        var nombre_proceso = info[0].nombre_proceso;

        $("#ideditar").val(id);
        $("#nombre_proceso").val(nombre_proceso);
        $('#myModalEditarProceso').modal('show');
    });
}

function modalEditarUnidades(id){
    
    $.ajax({
        url: "../../../General/Queries/Basicas/infounidad.php",
        type: "POST",
        dataType: "JSON",
        data: {id: id}
    })
    .done(function(info){

        var nombre_unidad = info[0].nombre_unidad;

        $("#ideditar").val(id);
        $("#nombre_unidad").val(nombre_unidad);
        $('#myModalEditarUnidades').modal('show');
    });
}

function modalEditarTipoEntrega(id){
    
    $.ajax({
        url: "../../../General/Queries/Basicas/infotipoentrega.php",
        type: "POST",
        dataType: "JSON",
        data: {id: id}
    })
    .done(function(info){

        var descripcion = info[0].descripcion;

        $("#ideditar").val(id);
        $("#descripcion").val(descripcion);
        $('#myModalEditarTipoEntrega').modal('show');
    });
}

function modalEditarPersona(id){
    $.ajax({
        url: "../../../General/Queries/Basicas/infopersona.php",
        type: "POST",
        dataType: "JSON",
        data: {id: id}
    })
    .done(function(info){
        var identificacion = info[0].identificacion;
        var nombre = info[0].nombre;
        var telefono = info[0].telefono;
        var correo = info[0].correo;
        var proceso = info[0].proceso;

        $("#ideditar").val(id);
        $("#identificacion").val(identificacion);
        $("#nombre").val(nombre);
        $("#telefono").val(telefono);
        $("#correo").val(correo);
        $("#proceso").val(proceso);
        $('#myModalEditarPersona').modal('show');
    });
}

function modalEditarUsuario(id){
    $.ajax({
        url: "../../../General/Queries/Basicas/infousuario.php",
        type: "POST",
        dataType: "JSON",
        data: {id: id}
    })
    .done(function(info){
        var user_nombre = info[0].user_nombre;
        var perfil = info[0].perfil;

        $("#ideditar").val(id);
        $("#user_nombre").val(user_nombre);
        $("#perfil").val(perfil);
        $('#myModalEditarUsuario').modal('show');
    });
}

function modalEditarCategoria(id){
    $.ajax({
        url: "../../../General/Queries/Basicas/infocategoria.php",
        type: "POST",
        dataType: "JSON",
        data: {id: id}
    })
    .done(function(info){
        var nombre = info[0].nombre;

        $("#ideditar").val(id);
        $("#nombre").val(nombre);
        $('#myModalEditarCategoria').modal('show');
    });
}

function modalEditarInsumo(id){
    
    $.ajax({
        url: "../../../General/Queries/Basicas/infoinsumo.php",
        type: "POST",
        dataType: "JSON",
        data: {id: id}
    })
    .done(function(info){
        var codigo = info[0].codigo;
        var nombre = info[0].nombre;
        var categoria = info[0].categoria;
        var precio_costo = info[0].precio_costo;
        var unidad = info[0].unidad;

        $("#ideditar").val(id);
        $("#codigo").val(codigo);
        $("#nombre").val(nombre);
        $("#categoria").val(categoria);
        $("#precio_costo").val(precio_costo);
        $("#unidad").val(unidad);
        $('#myModalEditarInsumo').modal('show');
    });
}

function modalEditarProducto(id){
    $.ajax({
        url: "../../../General/Queries/Basicas/infoproducto.php",
        type: "POST",
        dataType: "JSON",
        data: {id: id}
    })
    .done(function(info){
        var codigo = info[0].codigo;
        var nombre = info[0].nombre;
        var categoria = info[0].categoria;
        var precio_venta = info[0].precio_venta;
        var precio_costo = info[0].precio_costo;
        var unidad = info[0].unidad;
        var prod_compuesto = info[0].prod_compuesto;

        $("#ideditar").val(id);
        $("#codigo").val(codigo);
        $("#nombre").val(nombre);
        $("#categoria").val(categoria);
        $("#precio_venta").val(precio_venta);
        $("#precio_costo").val(precio_costo);
        $("#unidad").val(unidad);
        if (prod_compuesto!=1){      
            // $(".form-check > input[type='checkbox'][value='1']").attr("Unchecked", "Unchecked");   
            $(".form-check > input[type='checkbox']").prop("checked", false);                          
        } else{
            // $(".form-check > input[type='checkbox'][value='1']").attr("checked", "checked");
            $(".form-check > input[type='checkbox']").prop("checked", true);  
        }
        $('#myModalEditarProducto').modal('show');
    });
}

function modalPrecio(id_producto,usuario){
    $('#id_producto').val(id_producto);
    $('#user').val(usuario);
    $.ajax({
        url: "../../../General/Queries/Basicas/lstprecio.php",
        type: "POST",
        dataType: "JSON",
        data: {id_producto: id_producto}
    })
    .done(function(info){
        console.log(info);
        var valores = info;
        $('#tablaPrecio').empty();
             
        for(var i=0; i<valores.length; i++){
                
            var td = `<tr>
                <td>` + valores[i].referencia + `</td>
                <td>` + valores[i].precio + `</td>
                <td><a href="javascript:void(0);" onclick="modalEliminarPrecio('`+ valores[i].id_precio +`')"><button type="button" class="btn btn-sm btn-danger btn-sm" title="Eliminar"><i class="bi bi-trash3"></i> </button></a></td>
            </tr>`;

            $("#tablaPrecio").append(td);                
        }
    });

    $('#myModalPrecio').modal('show');
}

function modalInsumoProducto(id_producto,producto){
    window.location.href = "insumo.php?id_producto="+id_producto+"&producto="+producto;
}

// --------- Comercial ----------

function cargarCiudad(departamento){
    $.ajax({
        url: "../../../General/Queries/Comercial/filtrociudad.php",
        type: "POST",
        dataType: "HTML",
        data: {departamento: departamento},
        success: function(selectCiudad){
            $('#crearCiudad').html(selectCiudad);
        }
    });
}

function modalEditarCliente(id){
    $.ajax({
        url: "../../../General/Queries/Comercial/infocliente.php",
        type: "POST",
        dataType: "JSON",
        data: {id: id}
    })
    .done(function(info){
        var identificacion = info[0].identificacion;
        var nombre = info[0].nombre;
        var marca = info[0].marca;
        var telefono = info[0].telefono;
        var correo = info[0].correo;
        var direccion = info[0].direccion;
        var departamento = info[0].departamento;
        var ciudad = info[0].ciudad;

        $("#ideditar").val(id);
        $("#identificacion").val(identificacion);
        $("#nombre").val(nombre);
        $("#marca").val(marca);
        $("#telefono").val(telefono);
        $("#correo").val(correo);
        $("#direccion").val(direccion);
        $("#departamento").val(departamento);
        cargarCiudadEditar(departamento,ciudad);
        $('#myModalEditarCliente').modal('show');
    });
}

function cargarCiudadEditar(departamento,ciudad){
    $.ajax({
        url: "../../../General/Queries/Comercial/filtrociudad.php",
        type: "POST",
        dataType: "HTML",
        data: {departamento: departamento, ciudad: ciudad},
        success: function(selectCiudad){
            $('#editarCiudad').html(selectCiudad);
        }
    });
}

function cargarPrecio(producto){
    $.ajax({
        url: "../../../General/Queries/Comercial/filtroprecio.php",
        type: "POST",
        dataType: "JSON",
        data: {producto: producto},
        success: function(selectPrecio){
            $('#crearPrecio').html(selectPrecio);
        }
    });
}

function modalEliminar(id){
    $("#ideliminar").val(id);
    $('#myModalEliminar').modal('show');
}

function modalEliminarPrecio(id){
    $("#idprecio").val(id);
    $('#myModalEliminarPrecio').modal('show');
}

function modalEliminarInsumo(id){
    $("#idinsumo").val(id);
    $('#myModalEliminarInsumo').modal('show');
}

$('#nuevoPedido').click(() => {
    //busca el numero del consecutivo
    $.ajax({
        url: "../../../General/Queries/Comercial/buscarNumPedido.php",
        type: "POST",
        dataType: "HTML",
        success: function(numPedido){
            $('#numero_pedido').val(numPedido);
            $('#cliente').val("");
            $('#fecha_entrega').val("");
            $('#observaciones').val("");
            $('#producto').val("");
            $('#cantidad').val("");
            $('#precio').val("");
            $('#total').val("");
            location.href ="../../../Comercial/Pedidos/Vista/index.php?numero_pedido="+numPedido;
        }
    });    
});

$('#buscarPedido').click(() => {
    $("#numero_pedido").prop("readonly", false);
    var num_pedido = $('#numero_pedido').val();
    $.ajax({
        url: "../../../General/Queries/Comercial/infopedido.php",
        type: "POST",
        dataType: "JSON",
        data: {num_pedido: num_pedido}
    })
    .done(function(info){
        var cliente = info[0].cliente;
        var fecha = info[0].fecha;
        var fecha_entrega = info[0].fecha_entrega;
        var observaciones = info[0].observaciones;

        $("#numero_pedido").val(num_pedido);
        $("#cliente").val(cliente);
        $("#fecha").val(fecha);
        $("#fecha_entrega").val(fecha_entrega);
        $("#observaciones").val(observaciones);
    }); 
})

// function filtroPedido(){
//     var valor = $('#numero_pedido').val();
//     alert(valor);
// }

// ----------------- Cerrar Modales ----------------------

function CerrarModal(modal){
    $('#myModal' + modal).modal('hide');
}

function CerrarModalPrecio(){
    $('#myModalEliminarPrecio').modal('hide');
    $('#myModalPrecio').modal('show');
}


// ----------------- Operaciones ----------------------

function CalcularTotal(){
    var cantidad = $('#cantidad').val();
    var precio = $('#precio').val();
    var total = cantidad * precio;
    $('#total').val(total); 
}