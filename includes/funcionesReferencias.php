<?php

/**
 * @Usuarios clase en donde se accede a la base de datos
 * @ABM consultas sobre las tablas de usuarios y usarios-clientes
 */

date_default_timezone_set('America/Buenos_Aires');

class ServiciosReferencias {

function GUID()
{
    if (function_exists('com_create_guid') === true)
    {
        return trim(com_create_guid(), '{}');
    }

    return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
}



/* PARA Ciudades */

function insertarCiudades($refprovincia,$ciudad) {
$sql = "insert into ciudades(idciudad,refprovincia,ciudad)
values ('',".$refprovincia.",'".utf8_decode($ciudad)."')";
$res = $this->query($sql,1);
return $res;
}


function modificarCiudades($id,$refprovincia,$ciudad) {
$sql = "update ciudades
set
refprovincia = ".$refprovincia.",ciudad = '".utf8_decode($ciudad)."'
where idciudad =".$id;
$res = $this->query($sql,0);
return $res;
}


function eliminarCiudades($id) {
$sql = "delete from ciudades where idciudad =".$id;
$res = $this->query($sql,0);
return $res;
}


function traerCiudades() {
$sql = "select 
			c.idciudad, c.ciudad, p.provincia, pa.nombre, c.refprovincia, pa.idpais
		from ciudades c
		inner join provincias p on p.idprovincia = c.refprovincia
		inner join paises pa on pa.idpais = p.refpais 
		order by 2";
$res = $this->query($sql,0);
return $res;
}


function traerCiudadesPorId($id) {
$sql = "select idciudad,refprovincia,ciudad from ciudades where idciudad =".$id;
$res = $this->query($sql,0);
return $res;
}

/* Fin */

/* PARA Provincias */

function insertarProvincias($refpais,$provincia) {
$sql = "insert into provincias(idprovincia,refpais,provincia)
values ('',".$refpais.",'".utf8_decode($provincia)."')";
$res = $this->query($sql,1);
return $res;
}


function modificarProvincias($id,$refpais,$provincia) {
$sql = "update provincias
set
refpais = ".$refpais.",provincia = '".utf8_decode($provincia)."'
where idprovincia =".$id;
$res = $this->query($sql,0);
return $res;
}


function eliminarProvincias($id) {
$sql = "delete from provincias where idprovincia =".$id;
$res = $this->query($sql,0);
return $res;
}


function traerProvincias() {
$sql = "select 
			p.idprovincia, p.provincia, pa.nombre, p.refpais
		from provincias  p
		inner join paises pa on pa.idpais = p.refpais 
		order by 2";
$res = $this->query($sql,0);
return $res;
}


function traerProvinciasPorId($id) {
$sql = "select 
			p.idprovincia, p.provincia, p.refpais
		from provincias p
		inner join paises pa on pa.idpais = p.refpais
			where idprovincia =".$id;
$res = $this->query($sql,0);
return $res;
}

/* Fin */


/* PARA Paises */

function insertarPaises($nombre) {
$sql = "insert into paises(idpais,nombre)
values ('','".utf8_decode($nombre)."')";
$res = $this->query($sql,1);
return $res;
}


function modificarPaises($id,$nombre) {
$sql = "update paises
set
nombre = '".utf8_decode($nombre)."'
where idpais =".$id;
$res = $this->query($sql,0);
return $res;
}


function eliminarPaises($id) {
$sql = "delete from paises where idpais =".$id;
$res = $this->query($sql,0);
return $res;
}


function traerPaises() {
$sql = "select idpais,nombre from paises order by 2";
$res = $this->query($sql,0);
return $res;
}


function traerPaisesPorId($id) {
$sql = "select idpais,nombre from paises where idpais =".$id;
$res = $this->query($sql,0);
return $res;
}

/* Fin */

/* PARA Valoracion */

function insertarValoracion($valoracion,$observacion) {
$sql = "insert into valoracion(idvaloracion,valoracion,observacion)
values ('','".utf8_decode($valoracion)."','".utf8_decode($observacion)."')";
$res = $this->query($sql,1);
return $res;
}


function modificarValoracion($id,$valoracion,$observacion) {
$sql = "update valoracion
set
valoracion = '".utf8_decode($valoracion)."',observacion = '".utf8_decode($observacion)."'
where idvaloracion =".$id;
$res = $this->query($sql,0);
return $res;
}


function eliminarValoracion($id) {
$sql = "delete from valoracion where idvaloracion =".$id;
$res = $this->query($sql,0);
return $res;
}


function traerValoracion() {
$sql = "select idvaloracion,valoracion,observacion from valoracion order by 1";
$res = $this->query($sql,0);
return $res;
}


function traerValoracionPorId($id) {
$sql = "select idvaloracion,valoracion,observacion from valoracion where idvaloracion =".$id;
$res = $this->query($sql,0);
return $res;
}

/* Fin */


/* PARA Usos */

function insertarUsos($usos) {
$sql = "insert into usos(iduso,usos)
values ('','".utf8_decode($usos)."')";
$res = $this->query($sql,1);
return $res;
}


function modificarUsos($id,$usos) {
$sql = "update usos
set
usos = '".utf8_decode($usos)."'
where iduso =".$id;
$res = $this->query($sql,0);
return $res;
}


function eliminarUsos($id) {
$sql = "delete from usos where iduso =".$id;
$res = $this->query($sql,0);
return $res;
}


function traerUsos() {
$sql = "select iduso,usos from usos order by 1";
$res = $this->query($sql,0);
return $res;
}


function traerUsosPorId($id) {
$sql = "select iduso,usos from usos where iduso =".$id;
$res = $this->query($sql,0);
return $res;
}

/* Fin */


/* PARA TipoVivienda */

function insertarTipoVivienda($tipovivienda) {
$sql = "insert into tipovivienda(idtipovivienda,tipovivienda)
values ('','".utf8_decode($tipovivienda)."')";
$res = $this->query($sql,1);
return $res;
}


function modificarTipoVivienda($id,$tipovivienda) {
$sql = "update tipovivienda
set
tipovivienda = '".utf8_decode($tipovivienda)."'
where idtipovivienda =".$id;
$res = $this->query($sql,0);
return $res;
}


function eliminarTipoVivienda($id) {
$sql = "delete from tipovivienda where idtipovivienda =".$id;
$res = $this->query($sql,0);
return $res;
}


function traerTipoVivienda() {
$sql = "select idtipovivienda,tipovivienda from tipovivienda order by 1";
$res = $this->query($sql,0);
return $res;
}


function traerTipoViviendaPorId($id) {
$sql = "select idtipovivienda,tipovivienda from tipovivienda where idtipovivienda =".$id;
$res = $this->query($sql,0);
return $res;
}

/* Fin */

/* PARA TipoUsuarios */

function insertarTipoUsuarios($descripcion) {
$sql = "insert into tipousuarios(idtipousuario,descripcion)
values ('','".utf8_decode($descripcion)."')";
$res = $this->query($sql,1);
return $res;
}


function modificarTipoUsuarios($id,$descripcion) {
$sql = "update tipousuarios
set
descripcion = '".utf8_decode($descripcion)."'
where idtipousuario =".$id;
$res = $this->query($sql,0);
return $res;
}


function eliminarTipoUsuarios($id) {
$sql = "delete from tipousuarios where idtipousuario =".$id;
$res = $this->query($sql,0);
return $res;
}


function traerTipoUsuarios() {
$sql = "select idtipousuario,descripcion from tipousuarios order by 1";
$res = $this->query($sql,0);
return $res;
}


function traerTipoUsuariosPorId($id) {
$sql = "select idtipousuario,descripcion from tipousuarios where idtipousuario =".$id;
$res = $this->query($sql,0);
return $res;
}

/* Fin */

/* PARA TipodeInformacion */

function insertarTipodeInformacion($tipodeinformacion) {
$sql = "insert into tipodeinformacion(idtipodeinformacion,tipodeinformacion)
values ('','".utf8_decode($tipodeinformacion)."')";
$res = $this->query($sql,1);
return $res;
}


function modificarTipodeInformacion($id,$tipodeinformacion) {
$sql = "update tipodeinformacion
set
tipodeinformacion = '".utf8_decode($tipodeinformacion)."'
where idtipodeinformacion =".$id;
$res = $this->query($sql,0);
return $res;
}


function eliminarTipodeInformacion($id) {
$sql = "delete from tipodeinformacion where idtipodeinformacion =".$id;
$res = $this->query($sql,0);
return $res;
}


function traerTipodeInformacion() {
$sql = "select idtipodeinformacion,tipodeinformacion from tipodeinformacion order by 1";
$res = $this->query($sql,0);
return $res;
}


function traerTipodeInformacionPorId($id) {
$sql = "select idtipodeinformacion,tipodeinformacion from tipodeinformacion where idtipodeinformacion =".$id;
$res = $this->query($sql,0);
return $res;
}

/* Fin */


/* PARA SituacionInmueble */

function insertarSituacionInmueble($situacioninmueble) {
$sql = "insert into situacioninmueble(idsituacioninmueble,situacioninmueble)
values ('','".utf8_decode($situacioninmueble)."')";
$res = $this->query($sql,1);
return $res;
}


function modificarSituacionInmueble($id,$situacioninmueble) {
$sql = "update situacioninmueble
set
situacioninmueble = '".utf8_decode($situacioninmueble)."'
where idsituacioninmueble =".$id;
$res = $this->query($sql,0);
return $res;
}


function eliminarSituacionInmueble($id) {
$sql = "delete from situacioninmueble where idsituacioninmueble =".$id;
$res = $this->query($sql,0);
return $res;
}


function traerSituacionInmueble() {
$sql = "select idsituacioninmueble,situacioninmueble from situacioninmueble order by 1";
$res = $this->query($sql,0);
return $res;
}


function traerSituacionInmueblePorId($id) {
$sql = "select idsituacioninmueble,situacioninmueble from situacioninmueble where idsituacioninmueble =".$id;
$res = $this->query($sql,0);
return $res;
}

/* Fin */


/* PARA Situaciones */

function insertarSituaciones($situacion) {
$sql = "insert into situaciones(idsituacion,situacion)
values ('','".utf8_decode($situacion)."')";
$res = $this->query($sql,1);
return $res;
}


function modificarSituaciones($id,$situacion) {
$sql = "update situaciones
set
situacion = '".utf8_decode($situacion)."'
where idsituacion =".$id;
$res = $this->query($sql,0);
return $res;
}


function eliminarSituaciones($id) {
$sql = "delete from situaciones where idsituacion =".$id;
$res = $this->query($sql,0);
return $res;
}


function traerSituaciones() {
$sql = "select idsituacion,situacion from situaciones order by 1";
$res = $this->query($sql,0);
return $res;
}


function traerSituacionesPorId($id) {
$sql = "select idsituacion,situacion from situaciones where idsituacion =".$id;
$res = $this->query($sql,0);
return $res;
}

/* Fin */



/* PARA Urbanizacion */

function insertarUrbanizacion($refciudad,$urbanizacion) {
$sql = "insert into urbanizacion(idurbanizacion,refciudad,urbanizacion)
values ('',".$refciudad.",'".utf8_decode($urbanizacion)."')";
$res = $this->query($sql,1);
return $res;
}


function modificarUrbanizacion($id,$refciudad,$urbanizacion) {
$sql = "update urbanizacion
set
refciudad = ".$refciudad.",urbanizacion = '".utf8_decode($urbanizacion)."'
where idurbanizacion =".$id;
$res = $this->query($sql,0);
return $res;
}


function eliminarUrbanizacion($id) {
$sql = "delete from urbanizacion where idurbanizacion =".$id;
$res = $this->query($sql,0);
return $res;
}


function traerUrbanizacion() {
$sql = "select 
			u.idurbanizacion, u.urbanizacion, c.ciudad, p.provincia, pa.nombre , u.refciudad, c.idciudad, p.idprovincia, pa.idpais
		from urbanizacion u
		inner join ciudades c on c.idciudad = u.refciudad
		inner join provincias p on p.idprovincia = c.refprovincia
		inner join paises pa on pa.idpais = p.refpais 
		order by 2";
$res = $this->query($sql,0);
return $res;
}


function traerUrbanizacionPorId($id) {
$sql = "select idurbanizacion,refciudad,urbanizacion from urbanizacion where idurbanizacion =".$id;
$res = $this->query($sql,0);
return $res;
}

/* Fin */




/* PARA Perfiles */

function insertarPerfiles($reftipousuario,$nombreperfil) {
$sql = "insert into perfiles(idperfil,reftipousuario,nombreperfil)
values ('',".$reftipousuario.",'".utf8_decode($nombreperfil)."')";
$res = $this->query($sql,1);
return $res;
}


function modificarPerfiles($id,$reftipousuario,$nombreperfil) {
$sql = "update perfiles
set
reftipousuario = ".$reftipousuario.",nombreperfil = '".utf8_decode($nombreperfil)."'
where idperfil =".$id;
$res = $this->query($sql,0);
return $res;
}


function eliminarPerfiles($id) {
$sql = "delete from perfiles where idperfil =".$id;
$res = $this->query($sql,0);
return $res;
}


function traerPerfiles() {
$sql = "select idperfil,reftipousuario,nombreperfil from perfiles order by 1";
$res = $this->query($sql,0);
return $res;
}


function traerPerfilesPorId($id) {
$sql = "select idperfil,reftipousuario,nombreperfil from perfiles where idperfil =".$id;
$res = $this->query($sql,0);
return $res;
}

/* Fin */



/* PARA CostoNacional */

function insertarCostoNacional($refpais,$valormts,$fechamodi,$refusuario) {
$sql = "insert into costonacional(idcostonacional,refpais,valormts,fechamodi,refusuario)
values ('',".$refpais.",".$valormts.",'".utf8_decode($fechamodi)."',".$refusuario.")";
$res = $this->query($sql,1);
return $res;
}


function modificarCostoNacional($id,$refpais,$valormts,$fechamodi,$refusuario) {
$sql = "update costonacional
set
refpais = ".$refpais.",valormts = ".$valormts.",fechamodi = '".utf8_decode($fechamodi)."',refusuario = ".$refusuario."
where idcostonacional =".$id;
$res = $this->query($sql,0);
return $res;
}


function eliminarCostoNacional($id) {
$sql = "delete from costonacional where idcostonacional =".$id;
$res = $this->query($sql,0);
return $res;
}


function traerCostoNacional() {
$sql = "select idcostonacional,refpais,valormts,fechamodi,refusuario from costonacional order by 1";
$res = $this->query($sql,0);
return $res;
}


function traerCostoNacionalPorId($id) {
$sql = "select idcostonacional,refpais,valormts,fechamodi,refusuario from costonacional where idcostonacional =".$id;
$res = $this->query($sql,0);
return $res;
}

/* Fin */


/* PARA Costomts */

function insertarCostomts($refciudad,$refuso,$valormts,$fechamodi,$refusuario) {
$sql = "insert into costomts(idcostomts,refciudad,refuso,valormts,fechamodi,refusuario)
values ('',".$refciudad.",".$refuso.",".$valormts.",'".utf8_decode($fechamodi)."',".$refusuario.")";
$res = $this->query($sql,1);
return $res;
}


function modificarCostomts($id,$refciudad,$refuso,$valormts,$fechamodi,$refusuario) {
$sql = "update costomts
set
refciudad = ".$refciudad.",refuso = ".$refuso.",valormts = ".$valormts.",fechamodi = '".utf8_decode($fechamodi)."',refusuario = ".$refusuario."
where idcostomts =".$id;
$res = $this->query($sql,0);
return $res;
}


function eliminarCostomts($id) {
$sql = "delete from costomts where idcostomts =".$id;
$res = $this->query($sql,0);
return $res;
}


function traerCostomts() {
$sql = "select idcostomts,refciudad,refuso,valormts,fechamodi,refusuario from costomts order by 1";
$res = $this->query($sql,0);
return $res;
}


function traerCostomtsPorId($id) {
$sql = "select idcostomts,refciudad,refuso,valormts,fechamodi,refusuario from costomts where idcostomts =".$id;
$res = $this->query($sql,0);
return $res;
}

/* Fin */



/* PARA Comision */

function insertarComision($comision) {
$sql = "insert into comision(idcomision,comision)
values ('','".utf8_decode($comision)."')";
$res = $this->query($sql,1);
return $res;
}


function modificarComision($id,$comision) {
$sql = "update comision
set
comision = '".utf8_decode($comision)."'
where idcomision =".$id;
$res = $this->query($sql,0);
return $res;
}


function eliminarComision($id) {
$sql = "delete from comision where idcomision =".$id;
$res = $this->query($sql,0);
return $res;
}


function traerComision() {
$sql = "select idcomision,comision from comision order by 1";
$res = $this->query($sql,0);
return $res;
}


function traerComisionPorId($id) {
$sql = "select idcomision,comision from comision where idcomision =".$id;
$res = $this->query($sql,0);
return $res;
}

/* Fin */



/* PARA Pedidos */

function insertarPedidos($reftipoinformacion,$refinmueble,$refusuario,$fechapedido,$comentariousuario) {
$sql = "insert into pedidos(idpedido,reftipoinformacion,refinmueble,refusuario,fechapedido,comentariousuario)
values ('',".$reftipoinformacion.",".$refinmueble.",".$refusuario.",'".utf8_decode($fechapedido)."','".utf8_decode($comentariousuario)."')";
$res = $this->query($sql,1);
return $res;
}


function modificarPedidos($id,$reftipoinformacion,$refinmueble,$refusuario,$fechapedido,$comentariousuario) {
$sql = "update pedidos
set
reftipoinformacion = ".$reftipoinformacion.",refinmueble = ".$refinmueble.",refusuario = ".$refusuario.",fechapedido = '".utf8_decode($fechapedido)."',comentariousuario = '".utf8_decode($comentariousuario)."'
where idpedido =".$id;
$res = $this->query($sql,0);
return $res;
}


function eliminarPedidos($id) {
$sql = "delete from pedidos where idpedido =".$id;
$res = $this->query($sql,0);
return $res;
}


function traerPedidos() {
$sql = "select idpedido,reftipoinformacion,refinmueble,refusuario,fechapedido,comentariousuario from pedidos order by 1";
$res = $this->query($sql,0);
return $res;
}


function traerPedidosPorId($id) {
$sql = "select idpedido,reftipoinformacion,refinmueble,refusuario,fechapedido,comentariousuario from pedidos where idpedido =".$id;
$res = $this->query($sql,0);
return $res;
}

/* Fin */




/* PARA UsuariosRegistrados */

function insertarUsuariosRegistrados($fechadeingreso,$reftipousuario,$apellidoynombre,$nombreentidad,$celular1,$celular2,$celular3,$email1,$email2,$refperfil,$refurbanizacion,$calle,$nro,$codpostal) {
$sql = "insert into usuariosregistrados(idusuarioregistrado,fechadeingreso,reftipousuario,apellidoynombre,nombreentidad,celular1,celular2,celular3,email1,email2,refperfil,refurbanizacion,calle,nro,codpostal)
values ('','".utf8_decode($fechadeingreso)."',".$reftipousuario.",'".utf8_decode($apellidoynombre)."','".utf8_decode($nombreentidad)."','".utf8_decode($celular1)."','".utf8_decode($celular2)."','".utf8_decode($celular3)."','".utf8_decode($email1)."','".utf8_decode($email2)."',".$refperfil.",".$refurbanizacion.",'".utf8_decode($calle)."','".utf8_decode($nro)."','".utf8_decode($codpostal)."')";
$res = $this->query($sql,1);
return $res;
}


function modificarUsuariosRegistrados($id,$fechadeingreso,$reftipousuario,$apellidoynombre,$nombreentidad,$celular1,$celular2,$celular3,$email1,$email2,$refperfil,$refurbanizacion,$calle,$nro,$codpostal) {
$sql = "update usuariosregistrados
set
fechadeingreso = '".utf8_decode($fechadeingreso)."',reftipousuario = ".$reftipousuario.",apellidoynombre = '".utf8_decode($apellidoynombre)."',nombreentidad = '".utf8_decode($nombreentidad)."',celular1 = '".utf8_decode($celular1)."',celular2 = '".utf8_decode($celular2)."',celular3 = '".utf8_decode($celular3)."',email1 = '".utf8_decode($email1)."',email2 = '".utf8_decode($email2)."',refperfil = ".$refperfil.",refurbanizacion = ".$refurbanizacion.",calle = '".utf8_decode($calle)."',nro = '".utf8_decode($nro)."',codpostal = '".utf8_decode($codpostal)."'
where idusuarioregistrado =".$id;
$res = $this->query($sql,0);
return $res;
}


function eliminarUsuariosRegistrados($id) {
$sql = "delete from usuariosregistrados where idusuarioregistrado =".$id;
$res = $this->query($sql,0);
return $res;
}


function traerUsuariosRegistrados() {
$sql = "select idusuarioregistrado,fechadeingreso,reftipousuario,apellidoynombre,nombreentidad,celular1,celular2,celular3,email1,email2,refperfil,refurbanizacion,calle,nro,codpostal from usuariosregistrados order by 1";
$res = $this->query($sql,0);
return $res;
}


function traerUsuariosRegistradosPorId($id) {
$sql = "select idusuarioregistrado,fechadeingreso,reftipousuario,apellidoynombre,nombreentidad,celular1,celular2,celular3,email1,email2,refperfil,refurbanizacion,calle,nro,codpostal from usuariosregistrados where idusuarioregistrado =".$id;
$res = $this->query($sql,0);
return $res;
}

/* Fin */



/* PARA Inmuebles */

function calc_edadconstruccion($anioConstruccion) {
	if ($anioConstruccion >= 0) {
		return (integer)date('Y') - (integer)$anioConstruccion;	
	}
	return 0;
}

function calc_porcentajedepreciacion($edad) {
	return $edad * 1.666666667;
}

function calc_avaluoconstruccion($mtrsConstruccion, $precioNacional) {
	//tabla costonacional
	return $mtrsConstruccion * $precioNacional;
}

function calc_depreciacion($edad) {
	if ($edad != 0) {
		return 60 / $edad;
	}
	return 0;
}

function calc_avaluoterreno($mtrsTerreno, $precio) {
	//tabla costomts
	return $mtrsTerreno * $precio;
}

function calc_preciorealmercado() {
	
}

function calc_restacliente() {
	
}

function calc_porcentaje() {
	
}


function insertarInmuebles($refurbanizacion,$reftipovivienda,$refuso,$refsituacioninmueble,$dormitorios,$banios,$encontruccion,$mts2,$anioconstruccion,$precioventapropietario,$nombrepropietario,$apellidopropietario,$fechacarga,$refusuario,$refcomision,$calc_edadconstruccion,$calc_porcentajedepreciacion,$calc_avaluoconstruccion,$calc_depreciacion,$calc_avaluoterreno,$calc_preciorealmercado,$calc_restacliente,$calc_porcentaje,$refvaloracion,$refsituacion) {
$sql = "insert into inmuebles(idinmueble,refurbanizacion,reftipovivienda,refuso,refsituacioninmueble,dormitorios,banios,encontruccion,mts2,anioconstruccion,precioventapropietario,nombrepropietario,apellidopropietario,fechacarga,refusuario,refcomision,calc_edadconstruccion,calc_porcentajedepreciacion,calc_avaluoconstruccion,calc_depreciacion,calc_avaluoterreno,calc_preciorealmercado,calc_restacliente,calc_porcentaje,refvaloracion,refsituacion)
values ('',".$refurbanizacion.",".$reftipovivienda.",".$refuso.",".$refsituacioninmueble.",".$dormitorios.",".$banios.",".$encontruccion.",".$mts2.",".$anioconstruccion.",".$precioventapropietario.",'".utf8_decode($nombrepropietario)."','".utf8_decode($apellidopropietario)."','".$fechacarga."',".$refusuario.",".$refcomision.",".$calc_edadconstruccion.",".$calc_porcentajedepreciacion.",".$calc_avaluoconstruccion.",".$calc_depreciacion.",".$calc_avaluoterreno.",".$calc_preciorealmercado.",".$calc_restacliente.",".$calc_porcentaje.",".$refvaloracion.",".$refsituacion.")";
$res = $this->query($sql,1);
return $res;
}


function modificarInmuebles($id,$refurbanizacion,$reftipovivienda,$refuso,$refsituacioninmueble,$dormitorios,$banios,$encontruccion,$mts2,$anioconstruccion,$precioventapropietario,$nombrepropietario,$apellidopropietario,$fechacarga,$refusuario,$refcomision,$calc_edadconstruccion,$calc_porcentajedepreciacion,$calc_avaluoconstruccion,$calc_depreciacion,$calc_avaluoterreno,$calc_preciorealmercado,$calc_restacliente,$calc_porcentaje,$refvaloracion,$refsituacion) {
$sql = "update inmuebles
set
refurbanizacion = ".$refurbanizacion.",reftipovivienda = ".$reftipovivienda.",refuso = ".$refuso.",refsituacioninmueble = ".$refsituacioninmueble.",dormitorios = ".$dormitorios.",banios = ".$banios.",encontruccion = ".$encontruccion.",mts2 = ".$mts2.",anioconstruccion = ".$anioconstruccion.",precioventapropietario = ".$precioventapropietario.",nombrepropietario = '".utf8_decode($nombrepropietario)."',apellidopropietario = '".utf8_decode($apellidopropietario)."',fechacarga = '".utf8_decode($fechacarga)."',refusuario = ".$refusuario.",refcomision = ".$refcomision.",calc_edadconstruccion = ".$calc_edadconstruccion.",calc_porcentajedepreciacion = ".$calc_porcentajedepreciacion.",calc_avaluoconstruccion = ".$calc_avaluoconstruccion.",calc_depreciacion = ".$calc_depreciacion.",calc_avaluoterreno = ".$calc_avaluoterreno.",calc_preciorealmercado = ".$calc_preciorealmercado.",calc_restacliente = ".$calc_restacliente.",calc_porcentaje = ".$calc_porcentaje.",refvaloracion = ".$refvaloracion.",refsituacion = ".$refsituacion."
where idinmueble =".$id;
$res = $this->query($sql,0);
return $res;
}


function eliminarInmuebles($id) {
$sql = "delete from inmuebles where idinmueble =".$id;
$res = $this->query($sql,0);
return $res;
}


function traerInmuebles() {
$sql = "select idinmueble,refurbanizacion,reftipovivienda,refuso,refsituacioninmueble,dormitorios,banios,encontruccion,mts2,anioconstruccion,precioventapropietario,nombrepropietario,apellidopropietario,fechacarga,refusuario,refcomision,calc_edadconstruccion,calc_porcentajedepreciacion,calc_avaluoconstruccion,calc_depreciacion,calc_avaluoterreno,calc_preciorealmercado,calc_restacliente,calc_porcentaje,refvaloracion,refsituacion from inmuebles order by 1";
$res = $this->query($sql,0);
return $res;
}


function traerInmueblesPorId($id) {
$sql = "select idinmueble,refurbanizacion,reftipovivienda,refuso,refsituacioninmueble,dormitorios,banios,encontruccion,mts2,anioconstruccion,precioventapropietario,nombrepropietario,apellidopropietario,fechacarga,refusuario,refcomision,calc_edadconstruccion,calc_porcentajedepreciacion,calc_avaluoconstruccion,calc_depreciacion,calc_avaluoterreno,calc_preciorealmercado,calc_restacliente,calc_porcentaje,refvaloracion,refsituacion from inmuebles where idinmueble =".$id;
$res = $this->query($sql,0);
return $res;
}

/* Fin */

function query($sql,$accion) {
		
		
		
		require_once 'appconfig.php';

		$appconfig	= new appconfig();
		$datos		= $appconfig->conexion();	
		$hostname	= $datos['hostname'];
		$database	= $datos['database'];
		$username	= $datos['username'];
		$password	= $datos['password'];
		
		$conex = mysql_connect($hostname,$username,$password) or die ("no se puede conectar".mysql_error());
		
		mysql_select_db($database);
		
		        $error = 0;
		mysql_query("BEGIN");
		$result=mysql_query($sql,$conex);
		if ($accion && $result) {
			$result = mysql_insert_id();
		}
		if(!$result){
			$error=1;
		}
		if($error==1){
			mysql_query("ROLLBACK");
			return false;
		}
		 else{
			mysql_query("COMMIT");
			return $result;
		}
		
	}

}

?>