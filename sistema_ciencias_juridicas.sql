-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-04-2015 a las 14:32:29
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `sistema_ciencias_juridicas`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `pa_eliminar_actividad`(in id_Actividades int)
begin
delete from actividades where actividades.id_actividad=id_Actividades;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pa_eliminar_actividad_terminada`(in id_Actividades_Terminadas int)
begin
delete from actividades_terminadas where actividades_terminadas.id_Actividades_Terminadas=id_Actividades_Terminadas;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pa_eliminar_area`(in id_area int)
begin
delete from area where tipo_area.id_Area=id_area;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pa_eliminar_costo_porcentaje_actividad_por_trimestre`(in id int)
begin
delete from costo_porcentaje_actividad_por_trimestre where id_Costo_Porcentaje_Actividad_Por_Trimesrte=id;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pa_eliminar_indicador`(in id_indicador int)
begin
delete from indicadores where indicadores.id_indicadores= id_indicador;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pa_eliminar_objetivo_institucional`(in id_objetivo int)
begin
delete from objetivos_institucionales where objetivos_institucionales.id_Objetivo= id_objetivo;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pa_eliminar_poa`(in id int)
begin
delete from poa where poa.id_Poa=id;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pa_eliminar_responsables_por_actividad`(IN `id` INT)
begin
delete from responsables_por_actividad where responsables_por_actividad.id_Responsable_por_Actividad=id;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pa_eliminar_sub_actividad`(in id_sub_Actividad int)
begin
delete from sub_actividad where sub_actividad.id_sub_Actividad=id_sub_Actividad;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pa_eliminar_sub_actividad_realizada`(IN `id_subActividadRealizada` INT)
begin
delete from sub_actividades_realizadas where sub_actividades_realizadas.id_subActividadRealizada=id_subActividadRealizada;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pa_eliminar_tipo_area`(in id_tipo_area int)
begin
delete from tipo_area where tipo_area.id_Tipo_Area=id_tipo_area;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pa_insertar_actividad`(IN `id_Indicador` INT, IN `descripcion` TEXT, IN `correlativo` VARCHAR(10), IN `supuestos` TEXT, IN `justificacion` TEXT, IN `medio_Verificacion` TEXT, IN `poblacion_Objetivo` VARCHAR(20), IN `fecha_Inicio` DATE, IN `fecha_Fin` DATE)
begin
insert into actividades (id_indicador, descripcion, correlativo, supuesto, justificacion, medio_verificacion, poblacion_objetivo,fecha_inicio, fecha_fin) values( id_Indicador, descripcion, correlativo, supuestos, justificacion, medio_Verificacion, poblacion_Objetivo,fecha_Inicio, fecha_Fin) ;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pa_insertar_actividades_terminadas`(IN `id_Actividad` INT, IN `fecha` DATE, IN `estado` VARCHAR(15), IN `id_Usuario` VARCHAR(20), IN `observaciones` TEXT)
begin 
	insert into actividades_terminadas (id_Actividad, fecha, estado, No_Empleado, observaciones) values (id_Actividad, fecha, estado, id_Usuario, observaciones);
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pa_insertar_area`(IN `nombre` VARCHAR(30), IN `id_tipo_Area` INT, IN `observacion` TEXT)
begin
	insert into area (nombre,id_tipo_area,observacion) values(nombre, id_tipo_Area,observacion);
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pa_insertar_costo_porcentaje_actividad_por_trimestre`(IN `id_Actividad` INT, IN `costo` INT, IN `porcentaje` INT, IN `observacion` TEXT, IN `trimestre` INT)
begin 
insert into costo_porcentaje_actividad_por_trimestre (id_Actividad, costo,porcentaje,observacion, trimestre)values(id_Actividad, costo,porcentaje,observacion, trimestre);
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pa_insertar_indicador`(IN `id_ObjetivosInstitucionales` INT, IN `nombre` VARCHAR(30), IN `descripcion` TEXT)
begin
	insert into indicadores (id_ObjetivosInsitucionales, nombre, descripcion) values (id_ObjetivosInstitucionales, nombre, descripcion);
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pa_insertar_objetivos_institucionales`(IN `definicion` TEXT, IN `area_Estrategica` TEXT, IN `resultados_Esperados` TEXT, IN `id_Area` INT, IN `id_Poa` INT)
begin 
	insert into objetivos_institucionales  (definicion,area_Estrategica,resultados_Esperados,id_Area,id_Poa) values (definicion,area_Estrategica,resultados_Esperados,id_Area,id_Poa);
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pa_insertar_poa`(IN `nombre` VARCHAR(30), IN `fecha_de_Inicio` DATE, IN `fecha_Fin` DATE, IN `descripcion` TEXT)
begin
insert into poa (nombre,fecha_de_Inicio,fecha_Fin,descripcion) values (nombre,fecha_de_Inicio,fecha_Fin, descripcion);
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pa_insertar_responsables_por_actividad`(IN `id_Actividad` INT, IN `id_Responsable` INT, IN `fecha_Asignacion` DATE, IN `observacion` TEXT)
begin
	insert into responsables_por_actividad (id_Actividad,id_Responsable,fecha_Asignacion,observacion) values (id_Actividad,id_Responsable,fecha_Asignacion,observacion);
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pa_insertar_sub_actividad`(IN `id_Actividad` INT, IN `nombre` VARCHAR(30), IN `descripcion` TEXT, IN `fecha_monitoreo` DATE, IN `id_Encargado` VARCHAR(20), IN `ponderacion` INT, IN `costo` INT, IN `observacion` TEXT)
begin
insert into sub_actividad (idActividad,nombre,descripcion,fecha_monitoreo,id_Encargado,ponderacion,costo,observacion) values(id_Actividad,nombre,descripcion,fecha_monitoreo,id_Encargado,ponderacion,costo,observacion);
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pa_insertar_sub_actividades_realizadas`(IN `id_SubActividad` INT, IN `fecha_Realizacion` DATE, IN `observacion` TEXT)
begin
	insert into sub_actividades_realizadas (id_SubActividad,fecha_Realizacion,observacion) values (id_SubActividad,fecha_Realizacion,observacion);
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pa_insertar_tipo_area`(IN `nombre` VARCHAR(30), IN `observaciones` TEXT)
begin
	insert into  tipo_area (nombre,observaciones) values(nombre,observaciones);
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pa_modificar_actividad`(IN `id_Actividad` INT, IN `id_Indicador` INT, IN `descripcion` TEXT, IN `correlativo` VARCHAR(10), IN `supuestos` TEXT, IN `justificacion` TEXT, IN `medio_Verificacion` TEXT, IN `poblacion_Objetivo` VARCHAR(20), IN `fecha_Inicio` DATE, IN `fecha_Fin` DATE)
begin
update actividades set id_indicador=id_Indicador, descripcion=descripcion, correlativo=correlativo, supuesto=supuesto, justificacion=justificacion, medio_verificacion=medio_Verificacion, poblacion_objetivo=poblacion_Objetivo,fecha_inicio=fecha_Inicio, fecha_fin=fecha_Fin 
where actividades.id_actividad= id_Actividad;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pa_modificar_actividades_terminadas`(IN `id_Actividad_Terminada` INT, IN `id_Actividad` INT, IN `fecha` DATE, IN `estado` VARCHAR(15), IN `id_Usuario` VARCHAR(20), IN `observaciones` TEXT)
begin 
	update actividades_terminadas set id_Actividad=id_Actividad, fecha=fecha, estado=estado, No_Empleado=id_Usuario, observaciones=observaciones where actividades_terminadas.id_Actividades_Terminadas= id_Actividad_Terminada; 
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pa_modificar_area`(IN id_Area int ,IN nombre VARCHAR(30), IN id_tipo_Area INT, IN observacion TEXT)
begin
	update area set nombre=nombre,id_tipo_Area=id_tipo_Area,observaciones=observacion where area.id_Area=id_Area;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pa_modificar_costo_porcentaje_actividad_por_trimestre`(IN id_Costo_Porcentaje_Actividad_Por_Trimesrte INT,IN id_Actividad INT, IN costo INT, IN porcentaje INT, IN observacion TEXT, IN trimestre INT)
begin 
update costo_porcentaje_actividad_por_trimestre set id_Actividad=id_ACtividad, costo=costo,porcentaje=porcentaje,observacion=observacion, trimestre=trimestre where costo_porcentaje_actividad_por_trimestre.id_Costo_Porcentaje_Actividad_Por_Trimesrte=id_Costo_Porcentaje_Actividad_Por_Trimesrte ;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pa_modificar_indicador`(IN `id_Indicador` INT, IN `id_ObjetivosInstitucionales` INT, IN `nombre` VARCHAR(30), IN `descripcion` TEXT)
begin
update indicadores set id_ObjetivosInsitucionales=id_ObjetivosInstitucionales, nombre=nombre, descripcion=descripcion where indicadores.id_Indicadores=id_Indicador;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pa_modificar_objetivos_institucionales`(IN id_Objetivo int,IN definicion TEXT, IN area_Estrategica TEXT, IN resultados_Esperados TEXT, IN id_Area INT, IN id_Poa INT)
begin 
update objetivos_institucionales set definicion=definicion,area_Estrategica=area_Estrategica,resultados_Esperados=resultados_Esperados,id_Area=id_Area,id_Poa=id_Poa where objetivos_institucionales.id_Objetivo= id_Objetivo ;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pa_modificar_poa`(in id_Poa int,IN nombre VARCHAR(30), IN fecha_de_Inicio DATE, IN fecha_Fin DATE, IN descripcion TEXT)
begin
update poa set nombre=nombre,fecha_de_Inicio=fecha_de_Inicio,fecha_Fin=fecha_Fin,descripcion=descripcion
where poa.id_Poa=id_Poa;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pa_modificar_responsables_por_actividad`(IN `id_Responsable_por_Act` INT, IN `id_Actividad` INT, IN `id_Responsable` INT, IN `fecha_Asignacion` DATE, IN `observacion` TEXT)
begin
update responsables_por_actividad set id_Actividad=id_Actividad,id_Responsable=id_Responsable,fecha_Asignacion=Fecha_Asignacion,observacion=observacion where responsables_por_actividad.id_Responsable_por_Actividad=id_Responsable_por_Act;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pa_modificar_sub_actividad`(IN `id_sub_Act` INT, IN `id_Actividad` INT, IN `nombre` VARCHAR(30), IN `descripcion` TEXT, IN `fecha_monitoreo` DATE, IN `id_Encargado` VARCHAR(20), IN `ponderacion` INT, IN `costo` INT, IN `observacion` TEXT)
begin
update sub_actividad set idActividad=id_Actividad,nombre=nombre,descripcion=descripcion,fecha_monitoreo=fecha_monitoreo,id_Encargado=id_Encargado,ponderacion=ponderacion,costo=costo,observacion=observacion
where sub_actividad.id_sub_Actividad=id_sub_Act;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pa_modificar_sub_actividades_realizadas`(in id_subActividadRealizada int,IN id_SubActividad INT, IN fecha_Realizacion DATE, IN observacion TEXT)
begin
update sub_actividades_realizadas set id_SubActividad=id_SubActividad,fecha_Realizacion=fecha_Realizacion,observacion=observacion 
where sub_actividades_Realizadas.id_subActividadRealizada=id_subActividadRealizada;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pa_modificar_tipo_area`(IN id_Tipo_Area int,IN nombre VARCHAR(30), IN observaciones TEXT)
begin
	 update tipo_area set nombre=nombre,observaciones=observaciones where tipo_area.id_Tipo_Area=id_Tipo_Area;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_actualizar_asignado_folio`(
    IN numFolio_ VARCHAR(25), 
    IN usuarioAsg INT, 
    OUT `mensaje` VARCHAR(150), 
    OUT `codMensaje` TINYINT)
BEGIN 
 
   DECLARE id INTEGER DEFAULT 0;

   DECLARE EXIT HANDLER FOR SQLEXCEPTION
   BEGIN
     SET mensaje = "No se pudo realizar la operacion, por favor intende de nuevo dentro de un momento";
     SET codMensaje = 0;
     ROLLBACK;
   END;

   START TRANSACTION;
   
   UPDATE seguimiento SET UsuarioAsignado = usuarioAsg WHERE NroFolio = numFolio_;

     SET mensaje = "El usuario ha sido asignado correctamente al seguimiento de este folio."; 
     SET codMensaje = 1; 
   
   COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_actualizar_categorias_folios`(IN `Id_categoria_` INT(11), IN `NombreCategoria_` TEXT, IN `DescripcionCategoria_` TEXT, OUT `mensaje` VARCHAR(150), OUT `codMensaje` TINYINT)
BEGIN 

DECLARE EXIT HANDLER FOR SQLEXCEPTION
BEGIN
ROLLBACK;
SET mensaje = "No se pudo actualizar la categoria de los folios por favor revise los datos que desea modificar";
		SET codMensaje = 0; 
END;

   START TRANSACTION;
        UPDATE categorias_folios
        SET  NombreCategoria=NombreCategoria_,DescripcionCategoria = DescripcionCategoria_ 
        WHERE Id_categoria=Id_categoria_;
		
		SET mensaje = "la categoria de los folios se ha actualizado satisfactoriamente."; 
		SET codMensaje = 1;               
COMMIT;   
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_actualizar_estado_seguimiento`(IN `Id_Estado_Seguimiento_` TINYINT(4), IN `DescripcionEstadoSeguimiento_` TEXT, OUT `mensaje` VARCHAR(150), OUT `codMensaje` TINYINT)
BEGIN 

DECLARE EXIT HANDLER FOR SQLEXCEPTION
BEGIN
ROLLBACK;
SET mensaje = "No se pudo actualizar el estado por favor revise los datos que desea modificar";
		SET codMensaje = 0; 
END;

   START TRANSACTION;
        UPDATE estado_seguimiento
        SET  DescripcionEstadoSeguimiento=DescripcionEstadoSeguimiento_
        where Id_Estado_Seguimiento = Id_Estado_Seguimiento_;
		SET mensaje = "el estado se ha actualizado satisfactoriamente."; 
		SET codMensaje = 1;                  
COMMIT;   
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_actualizar_folio`( 
    IN numFolioAnt_ VARCHAR(25),
    IN numFolio_ VARCHAR(25), 
	IN fechaCreacion_ DATE, 
	IN fechaEntrada_ DATE, 
	IN personaReferente_ TEXT, 
	IN unidadAcademica_ INT, 
	IN organizacion_ INT, 
	IN descripcion_ TEXT,
	IN tipoFolio_ TINYINT, 
	IN ubicacionFisica_ INT(5), 
    IN prioridadAnt_ TINYINT,
	IN prioridad_ TINYINT,
    IN categoria_ INT,
    OUT mensaje VARCHAR(150), 
    OUT codMensaje TINYINT  
)
BEGIN 

   START TRANSACTION;

   IF (numFolioAnt_ = numFolio_) THEN
       UPDATE folios SET  FechaCreacion = fechaCreacion_, personaReferente = PersonaReferente_, UnidadAcademica = unidadAcademica_, Organizacion = organizacion_, DescripcionAsunto = descripcion_, TipoFolio = tipoFolio_, UbicacionFisica = ubicacionFisica_, Prioridad = prioridad_, categoria=categoria_ WHERE NroFolio = numFolio_;
       IF (prioridadAnt_ != prioridad_) THEN
          INSERT INTO prioridad_folio VALUES (NULL,numFolio_,prioridad_,CURDATE() );
       END IF;
	   SET mensaje = "Los datos del folio ha sido actualizados satisfactoriamente."; 
       SET codMensaje = 1; 
   ELSE 
       IF EXISTS ( SELECT 1 FROM folios WHERE NroFolio = numFolio_ ) THEN
	      SET mensaje = "El folio ya existe en sistema, por favor revise el numero del folio que desea ingresar";
          SET codMensaje = 0;
	   ELSE
	      UPDATE folios SET NroFolio = numFolio_, FechaCreacion = fechaCreacion_, PersonaReferente = personaReferente_, UnidadAcademica = unidadAcademica_, Organizacion = organizacion_, 
		  DescripcionAsunto = descripcion_,TipoFolio = tipoFolio_, UbicacionFisica = ubicacionFisica_, Prioridad = prioridad_, categoria=categoria_ WHERE NroFolio = numFolioAnt_;
		
       IF (prioridadAnt_ != prioridad_) THEN
         INSERT INTO prioridad_folio VALUES (NULL,numFolio_,prioridad_,CURDATE() );
       END IF;		
			
		  SET mensaje = "Los datos del folio han sido actualizados satisfactoriamente."; 
          SET codMensaje = 1;  
	   END IF;
   END IF;
   
   COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_actualizar_organizacion`(IN `Id_Organizacion_` INT(11), IN `NombreOrganizacion_` TEXT, IN `Ubicacion_` TEXT, OUT `mensaje` VARCHAR(150), OUT `codMensaje` TINYINT)
BEGIN 

DECLARE EXIT HANDLER FOR SQLEXCEPTION
BEGIN
ROLLBACK;
SET mensaje = "No se pudo actualizar la organizacion por favor revise los datos que desea modificar";
		SET codMensaje = 0; 
END;

   START TRANSACTION;
        UPDATE organizacion
        SET  NombreOrganizacion=NombreOrganizacion_,Ubicacion = Ubicacion_ 
        WHERE Id_Organizacion=Id_Organizacion_;
		
		SET mensaje = "la organizacion se ha actualizado satisfactoriamente."; 
		SET codMensaje = 1;               
COMMIT;   
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_actualizar_prioridad`(IN `Id_Prioridad_` TINYINT(4), IN `DescripcionPrioridad_` TEXT, OUT `mensaje` VARCHAR(150), OUT `codMensaje` TINYINT)
BEGIN 

DECLARE EXIT HANDLER FOR SQLEXCEPTION
BEGIN
ROLLBACK;
SET mensaje = "No se pudo actualizar la prioridad por favor revise los datos que desea modificar";
		SET codMensaje = 0; 
END;

   START TRANSACTION;
        UPDATE prioridad
        SET  DescripcionPrioridad=DescripcionPrioridad_
        where Id_Prioridad = Id_Prioridad_;
		
		SET mensaje = "la prioridad se ha actualizado satisfactoriamente."; 
		SET codMensaje = 1;               
COMMIT;   
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_actualizar_seguimiento`(IN `numFolio_` VARCHAR(25), IN `fechaFin_` DATE, IN `prioridad_` TINYINT, IN `seguimiento_` TINYINT, IN `notas_` TEXT, OUT `mensaje` VARCHAR(150), OUT `codMensaje` TINYINT)
BEGIN 
 
   DECLARE id INTEGER DEFAULT 0;

   DECLARE EXIT HANDLER FOR SQLEXCEPTION
   BEGIN
     SET mensaje = "No se pudo realizar la operacion, por favor intende de nuevo dentro de un momento";
     SET codMensaje = 0;
     ROLLBACK;
   END;

   START TRANSACTION;
   
   IF NOT EXISTS (SELECT 1 FROM folios WHERE NroFolio = numFolio_) THEN 
	 SET mensaje = "El folio no existe en sistema, por favor notifiquelo al administrador del sistema";
     SET codMensaje = 0;	 
   ELSE
     SET id = (SELECT Id_Seguimiento FROM seguimiento WHERE NroFolio = numFolio_);
     
	 IF( IFNULL(fechaFin_,0) = 0 ) THEN
       UPDATE seguimiento SET Notas = notas_, Prioridad = prioridad_, EstadoSeguimiento = seguimiento_ WHERE NroFolio = numFolio_;
	 ELSE
	   UPDATE seguimiento SET Notas = notas_, Prioridad = prioridad_, FechaFinal = fechaFin_, EstadoSeguimiento = seguimiento_ WHERE NroFolio = numFolio_;
       UPDATE alerta SET Atendido=1 WHERE NroFolioGenera = numFolio_;
	 END IF;
	 
     INSERT INTO seguimiento_historico VALUES(NULL,id,seguimiento_,notas_,prioridad_,NOW());

     SET mensaje = "El seguimiento ha sido actualizado satisfactoriamente."; 
     SET codMensaje = 1; 
   END IF; 
   
   COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_actualizar_ubicacion_archivo_fisica`(IN `Id_UbicacionArchivoFisico_` INT(5), IN `DescripcionUbicacionFisica_` TEXT, IN `Capacidad_` INT(10), IN `TotalIngresados_` INT(10), IN `HabilitadoParaAlmacenar_` TINYINT(1), OUT `mensaje` VARCHAR(150), OUT `codMensaje` TINYINT)
BEGIN 

DECLARE EXIT HANDLER FOR SQLEXCEPTION
BEGIN
ROLLBACK;
SET mensaje = "No se pudo actualizar la ubicacion fisica por favor revise los datos que desea modificar";
		SET codMensaje = 0; 
END;

   START TRANSACTION;

        UPDATE ubicacion_archivofisico
        SET  DescripcionUbicacionFisica=DescripcionUbicacionFisica_,Capacidad=Capacidad_,     TotalIngresados=TotalIngresados_,HabilitadoParaAlmacenar=HabilitadoParaAlmacenar_  where Id_UbicacionArchivoFisico = Id_UbicacionArchivoFisico_;
		
		SET mensaje = "la ubicacion se ha actualizado satisfactoriamente."; 
		SET codMensaje = 1;               
COMMIT;  
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_actualizar_ubicacion_notificaciones`(IN `Id_UbicacionNotificaciones_` TINYINT(4), IN `DescripcionUbicacionNotificaciones_` TEXT, OUT `mensaje` VARCHAR(150), OUT `codMensaje` TINYINT)
BEGIN 

DECLARE EXIT HANDLER FOR SQLEXCEPTION
BEGIN
ROLLBACK;
SET mensaje = "No se pudo actualizar la ubicacion de las notificaciones por favor revise los datos que desea modificar";
		SET codMensaje = 0; 
END;

   START TRANSACTION;
        UPDATE ubicacion_notificaciones
        SET  DescripcionUbicacionNotificaciones=DescripcionUbicacionNotificaciones_
        where Id_UbicacionNotificaciones = Id_UbicacionNotificaciones_;
		
		SET mensaje = "la ubicacion se ha actualizado satisfactoriamente."; 
		SET codMensaje = 1;               
COMMIT;   
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_actualizar_unidad_academica`(IN `Id_UnidadAcademica_` INT(11), IN `NombreUnidadAcademica_` TEXT, IN `UbicacionUnidadAcademica_` TEXT, OUT `mensaje` VARCHAR(150), OUT `codMensaje` TINYINT)
BEGIN 

DECLARE EXIT HANDLER FOR SQLEXCEPTION
BEGIN
ROLLBACK;
SET mensaje = "No se pudo actualizar la unidad academica por favor revise los datos que desea modificar";
		SET codMensaje = 0; 
END;

   START TRANSACTION;
        UPDATE unidad_academica
        SET  NombreUnidadAcademica=NombreUnidadAcademica_,UbicacionUnidadAcademica=UbicacionUnidadAcademica_
        where  Id_UnidadAcademica = Id_UnidadAcademica_;
		SET mensaje = "la unidad academica se ha actualizado satisfactoriamente."; 
		SET codMensaje = 1;               
COMMIT;   
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_actualizar_usuario`(IN `idUsuario` INT(11), IN `numEmpleado_` VARCHAR(13), IN `nombreAnt_` VARCHAR(30), IN `nombre_` VARCHAR(30), IN `Password_` VARCHAR(20), IN `rol_` INT(4), IN `fecha_` DATE, IN `estado_` BOOLEAN, OUT `mensaje` VARCHAR(150), OUT `codMensaje` TINYINT)
BEGIN 
   START TRANSACTION;
   IF (nombreAnt_ = nombre_) THEN 
     UPDATE usuario SET No_Empleado = numEmpleado_, nombre = nombre_, Password = udf_Encrypt_derecho(Password_), Id_Rol = rol_, Fecha_Alta = fecha_, Estado = estado_ 
     WHERE id_Usuario = idUsuario;
     
     SET mensaje = "El usuario ha sido modificado satisfactoriamente."; 
       SET codMensaje = 1; 
   ELSE
   
     IF NOT EXISTS (SELECT 1 FROM usuario WHERE nombre = nombre_) THEN 

       UPDATE usuario SET No_Empleado = numEmpleado_, nombre = nombre_, Password = udf_Encrypt_derecho(Password_), Id_Rol = rol_, Fecha_Alta = fecha_, Estado = estado_ 
       WHERE id_Usuario = idUsuario;

       SET mensaje = "El usuario ha sido modificado satisfactoriamente."; 
       SET codMensaje = 1;  
     ELSE
       SET mensaje = "El usuario ya existe en sistema, por favor revise el nombre del usuario que desea modificar";
       SET codMensaje = 0;
     END IF;
   END IF;
   
   COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_check_seguimiento`( 
    IN numFolio_ VARCHAR(25),
	IN seguimiento INT(11)
)
BEGIN 
    DECLARE v_finished INTEGER DEFAULT 0;
    DECLARE prioridad_ INTEGER DEFAULT 0;
    DECLARE fechaIni DATE;	
	DECLARE usuario INTEGER DEFAULT 0;
	DECLARE rol TINYINT DEFAULT 0;
	DECLARE alertId INTEGER DEFAULT 0;
	
	-- declare cursor 
	DEClARE usuarios_cursor CURSOR FOR
    SELECT id_usuario FROM usuario WHERE Estado = 1;
	
	-- declare NOT FOUND handler
    DECLARE CONTINUE HANDLER
    FOR NOT FOUND SET v_finished = 1;
	
    START TRANSACTION;
	
	    SET fechaIni = (SELECT FechaCambio FROM seguimiento_historico WHERE Id_Seguimiento = seguimiento ORDER BY FechaCambio DESC LIMIT 1);
	
        IF( DATEDIFF(NOW(),DATE_ADD(fechaIni,INTERVAL 3 DAY)) > 0 ) THEN
		
		    SET prioridad_ = (SELECT sp_get_prioridad (numFolio_));
			
		    INSERT INTO alerta VALUES(NULL,numFolio_,NOW(),0);
			
			SET alertId = LAST_INSERT_ID();

		    IF(prioridad_ < 3) THEN
			    UPDATE folios SET Prioridad = prioridad_ + 1 WHERE NroFolio = numFolio_;
				INSERT INTO prioridad_folio VALUES (NULL,numFolio_,prioridad_,CURDATE());
			END IF;	
			
				OPEN usuarios_cursor;
				    usuarios_loop: LOOP
				        FETCH usuarios_cursor INTO usuario;
						
						IF v_finished = 1 THEN
					        LEAVE usuarios_loop;
                        END IF;
						
						SET rol = (SELECT Id_Rol FROM usuario WHERE id_Usuario = usuario);

						IF( rol > 39 AND rol < 51 AND prioridad_ + 1 = 2 ) THEN
						    INSERT INTO usuario_alertado VALUES (NULL,alertId,usuario);
						END IF;
						IF( rol > 49 AND prioridad_ = 3 ) THEN
						    INSERT INTO usuario_alertado VALUES (NULL,alertId,usuario);
						END IF;
				    END LOOP usuarios_loop;
				CLOSE usuarios_cursor;		
		END IF;
    COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_eliminar_categorias_folios`(IN `sp_Id_categoria` INT, OUT `mensaje` VARCHAR(150), IN `codMensaje` TINYINT)
BEGIN 
   IF NOT EXISTS (SELECT 1 FROM folios WHERE Categoria = sp_Id_categoria) THEN 
     DELETE FROM categorias_folios WHERE Id_categoria = sp_Id_categoria; 
     SET mensaje = "Exito al eliminar la categoria de los folios"; 
     SET codMensaje = 1;  -- codigo del mensaje de salida
   ELSE
     SET mensaje = "Error al eliminar la categoria de los folios, esta esta enlazada a un folio"; -- mensaje de salida
     SET codMensaje = 0; -- codigo del mensaje de salida
   END IF; 
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_eliminar_estado_seguimiento`( 
IN `Id_Estado_Seguimiento_` tinyint(4), 
    OUT mensaje VARCHAR(150), -- Parametro de salida
    OUT codMensaje TINYINT  -- ParamentroId_Prioridad
)
BEGIN 
   IF NOT EXISTS (SELECT 1 FROM seguimiento_historico WHERE  Id_Estado_Seguimiento = Id_Estado_Seguimiento_) THEN -- Revisa si NO hay un registro en seguimiento historico con este estado
     DELETE FROM estado_seguimiento WHERE Id_Estado_Seguimiento  = Id_Estado_Seguimiento_; -- Borra la ubicacion si no existe el registro 
     SET mensaje = "Exito al eliminar el estado de seguimiento"; -- mensaje de salida
     SET codMensaje = 1;  -- codigo del mensaje de salida
   ELSE
     SET mensaje = "Error al eliminar el estado, esta esta enlazada a un seguimiento historico"; -- mensaje de salida
     SET codMensaje = 0; -- codigo del mensaje de salida
   END IF; 
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_eliminar_organizacion`( 
    IN sp_Id_Organizacion TINYINT, 
    OUT mensaje VARCHAR(150), -- Parametro de salida
    OUT codMensaje TINYINT  -- Paramentro
)
BEGIN 
   IF NOT EXISTS (SELECT 1 FROM folios WHERE Organizacion = sp_Id_Organizacion) THEN -- Revisa si NO hay un registro en folios con esta organizacion
     DELETE FROM organizacion WHERE Id_Organizacion = sp_Id_Organizacion; -- Borra la organizacion si no existe el registro 
     SET mensaje = "Exito al eliminar la organizacion"; -- mensaje de salida
     SET codMensaje = 1;  -- codigo del mensaje de salida
   ELSE
     SET mensaje = "Error al eliminar la organizacion, esta esta enlazada a un folio"; -- mensaje de salida
     SET codMensaje = 0; -- codigo del mensaje de salida
   END IF; 
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_eliminar_prioridad`( 
	IN `Id_Prioridad_` tinyint(4),
    OUT mensaje VARCHAR(150), -- Parametro de salida
    OUT codMensaje TINYINT  -- ParamentroId_Prioridad
)
BEGIN 
   IF NOT EXISTS (SELECT 1 FROM folios WHERE  Prioridad = Id_Prioridad_) THEN -- Revisa si NO hay un registro en folios con esta prioridad
     DELETE FROM prioridad WHERE Id_Prioridad = Id_Prioridad_; -- Borra la prioridad si no existe el registro 
     SET mensaje = "Exito al eliminar la prioridad"; -- mensaje de salida
     SET codMensaje = 1;  -- codigo del mensaje de salida
   ELSE
     SET mensaje = "Error al eliminar la prioridad, esta esta enlazada a un folio"; -- mensaje de salida
     SET codMensaje = 0; -- codigo del mensaje de salida
   END IF; 
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_eliminar_ubicacion_archivo_fisica`( 
IN `Id_UbicacionArchivoFisico_` int(5), 
    OUT mensaje VARCHAR(150), -- Parametro de salida
    OUT codMensaje TINYINT  -- ParamentroId_Prioridad
)
BEGIN 
   IF NOT EXISTS (SELECT 1 FROM folios WHERE  UbicacionFisica = Id_UbicacionArchivoFisico_) THEN -- Revisa si NO hay un registro en folios con esta ubicacion
     DELETE FROM ubicacion_archivofisico WHERE  Id_UbicacionArchivoFisico = Id_UbicacionArchivoFisico_; -- Borra la ubicacion si no existe el registro 
     SET mensaje = "Exito al eliminar la ubicacion"; -- mensaje de salida
     SET codMensaje = 1;  -- codigo del mensaje de salida
   ELSE
     SET mensaje = "Error al eliminar la ubicacion, esta esta enlazada a un folio"; -- mensaje de salida
     SET codMensaje = 0; -- codigo del mensaje de salida
   END IF; 
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_eliminar_ubicacion_notificaciones`( 
IN `Id_UbicacionNotificaciones_` tinyint(4),
    OUT mensaje VARCHAR(150), -- Parametro de salida
    OUT codMensaje TINYINT  -- ParamentroId_Prioridad
)
BEGIN 
   IF NOT EXISTS (SELECT 1 FROM usuario_notificado WHERE  IdUbicacionNotificacion = Id_UbicacionNotificaciones_) THEN -- Revisa si NO hay un registro en usuario_notificado con esta ubicacion
     DELETE FROM ubicacion_notificaciones WHERE  Id_UbicacionNotificaciones = Id_UbicacionNotificaciones_; -- Borra la ubicacion si no existe el registro 
     SET mensaje = "Exito al eliminar la ubicacion"; -- mensaje de salida
     SET codMensaje = 1;  -- codigo del mensaje de salida
   ELSE
     SET mensaje = "Error al eliminar la ubicacion, esta esta enlazada a un folio"; -- mensaje de salida
     SET codMensaje = 0; -- codigo del mensaje de salida
   END IF; 
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_eliminar_unidad_academica`( 
	IN `Id_UnidadAcademica_` int(11), 
    OUT mensaje VARCHAR(150), -- Parametro de salida
    OUT codMensaje TINYINT  -- ParamentroId_Prioridad
)
BEGIN 
   IF NOT EXISTS (SELECT 1 FROM folios WHERE  UnidadAcademica = Id_UnidadAcademica_) THEN -- Revisa si NO hay un registro en permisos con esta unidad academica
     DELETE FROM unidad_academica WHERE Id_UnidadAcademica = Id_UnidadAcademica_; -- Borra la unidad si no existe el registro 
     SET mensaje = "Exito al eliminar el la unidad academica"; -- mensaje de salida
     SET codMensaje = 1;  -- codigo del mensaje de salida
   ELSE
     SET mensaje = "Error al eliminar la unidad, esta esta enlazada a un permiso"; -- mensaje de salida
     SET codMensaje = 0; -- codigo del mensaje de salida
   END IF; 
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insertar_categorias_folios`(
	 IN `NombreCategoria_` text, IN `DescripcionCategoria_` text,
    OUT `mensaje` VARCHAR(150), OUT `codMensaje` TINYINT)
BEGIN 

   START TRANSACTION;

   IF NOT EXISTS (SELECT 1 FROM categorias_folios WHERE NombreCategoria = NombreCategoria_) THEN 
     
     INSERT INTO categorias_folios (Id_categoria, NombreCategoria, DescripcionCategoria) 
     VALUES(null,NombreCategoria_,DescripcionCategoria_);				
     SET mensaje = "la categoria de los folios se ha insertado satisfactoriamente."; 
     SET codMensaje = 1;  
   ELSE
     SET mensaje = "esta categoria de los folios ya estÃ¡ en sistema, por favor revise el numero de la categoria que desea ingresar";
     SET codMensaje = 0;
   END IF; 
   
   COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insertar_estado_seguimiento`(
IN `Id_Estado_Seguimiento_` tinyint(4), 
IN `DescripcionEstadoSeguimiento_` text,
OUT `mensaje` VARCHAR(150), OUT `codMensaje` TINYINT)
BEGIN 
   START TRANSACTION;
   IF NOT EXISTS (SELECT 1 FROM estado_seguimiento WHERE Id_Estado_Seguimiento = Id_Estado_Seguimiento_) THEN 
     INSERT INTO  estado_seguimiento(Id_Estado_Seguimiento,DescripcionEstadoSeguimiento) 
     VALUES(Id_Estado_Seguimiento_,DescripcionEstadoSeguimiento_);			
     
     SET mensaje = "el estado de seguimiento ha sido insertado satisfactoriamente"; 
     SET codMensaje = 1;  
   ELSE
     SET mensaje = "existe un seguimiento igual, por favor revise el numero del seguimiento que desea ingresar";
     SET codMensaje = 0;
   END IF; 
      COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insertar_folio`(IN `numFolio_` VARCHAR(25), IN `fechaCreacion_` DATE, IN `fechaEntrada_` TIMESTAMP, IN `personaReferente_` TEXT, IN `unidadAcademica_` INT, IN `organizacion_` INT, IN categoria_ INT, IN `descripcion_` TEXT, IN `tipoFolio_` TINYINT, IN `ubicacionFisica_` INT(5), IN `prioridad_` TINYINT, IN `seguimiento_` INT(11), IN `notas_` TEXT, IN encargado INT, OUT `mensaje` VARCHAR(150), OUT `codMensaje` TINYINT)
BEGIN 

   START TRANSACTION;

   IF NOT EXISTS (SELECT 1 FROM folios WHERE NroFolio = numFolio_) THEN 
     INSERT INTO folios (NroFolio, FechaCreacion, FechaEntrada, PersonaReferente, UnidadAcademica, Organizacion, Categoria, DescripcionAsunto, 
            TipoFolio,UbicacionFisica, Prioridad) VALUES(numFolio_,fechaCreacion_,fechaEntrada_,personaReferente_,unidadAcademica_,organizacion_, categoria_, descripcion_,
			tipoFolio_,ubicacionFisica_,prioridad_);
			
     INSERT INTO seguimiento VALUES(NULL,numFolio_,encargado,notas_,prioridad_,fechaEntrada_,NULL,seguimiento_);
	 
     INSERT INTO seguimiento_historico VALUES(NULL,LAST_INSERT_ID(),seguimiento_,notas_,prioridad_,NOW());
	 
     INSERT INTO prioridad_folio VALUES(NULL,numFolio_,prioridad_,fechaEntrada_);

     SET mensaje = "El folio ha sido insertado satisfactoriamente."; 
     SET codMensaje = 1;  
   ELSE
     SET mensaje = "El folio ya existe en sistema, por favor revise el numero del folio que desea ingresar";
     SET codMensaje = 0;
   END IF; 
   
   COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insertar_folio_2`(IN `numFolio_` VARCHAR(25), IN `fechaCreacion_` DATE, IN `fechaEntrada_` TIMESTAMP, IN `personaReferente_` TEXT, IN `unidadAcademica_` INT, IN `organizacion_` INT, IN categoria_ INT, IN `descripcion_` TEXT, IN `tipoFolio_` TINYINT, IN `ubicacionFisica_` INT(5), IN `prioridad_` TINYINT, IN `seguimiento_` INT(11), IN `notas_` TEXT, IN encargado INT, IN folioRef VARCHAR(25), OUT `mensaje` VARCHAR(150), OUT `codMensaje` TINYINT)
BEGIN 

      START TRANSACTION;

   IF NOT EXISTS (SELECT 1 FROM folios WHERE NroFolio = numFolio_) THEN 
     INSERT INTO folios (NroFolio, FechaCreacion, FechaEntrada, PersonaReferente, UnidadAcademica, Organizacion, Categoria, DescripcionAsunto, 
            TipoFolio,UbicacionFisica, Prioridad) VALUES(numFolio_,fechaCreacion_,fechaEntrada_,personaReferente_,unidadAcademica_,organizacion_, categoria_, descripcion_,
			tipoFolio_,ubicacionFisica_,prioridad_);
			
     INSERT INTO seguimiento VALUES(NULL,numFolio_,encargado,notas_,prioridad_,fechaEntrada_,NULL,seguimiento_);
	 
     INSERT INTO seguimiento_historico VALUES(NULL,LAST_INSERT_ID(),seguimiento_,notas_,prioridad_,NOW());
	 
     INSERT INTO prioridad_folio VALUES(NULL,numFolio_,prioridad_,fechaEntrada_);
     
     UPDATE folios SET NroFolioRespuesta = numFolio_ WHERE NroFolio = folioRef;
 
     SET mensaje = "El folio ha sido insertado satisfactoriamente."; 
     SET codMensaje = 1;  
   ELSE
     SET mensaje = "El folio ya existe en sistema, por favor revise el numero del folio que desea ingresar";
     SET codMensaje = 0;
   END IF; 
   
   COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insertar_organizacion`(
	 IN `nombreOrganizacion_` text, IN `ubicacion_` text,
    OUT `mensaje` VARCHAR(150), OUT `codMensaje` TINYINT)
BEGIN 

   START TRANSACTION;

   IF NOT EXISTS (SELECT 1 FROM organizacion WHERE NombreOrganizacion = nombreOrganizacion_) THEN 
     
     INSERT INTO organizacion (Id_Organizacion, NombreOrganizacion, Ubicacion) 
     VALUES(null,nombreOrganizacion_,ubicacion_);				
     SET mensaje = "la organizacion ha insertado satisfactoriamente."; 
     SET codMensaje = 1;  
   ELSE
     SET mensaje = "la organizacion ya estÃ¡ en sistema, por favor revise el numero de organizacion que desea ingresar";
     SET codMensaje = 0;
   END IF; 
   
   COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insertar_prioridad`(
IN `Id_Prioridad_` tinyint(4), 
IN `DescripcionPrioridad_` text,
 OUT `mensaje` VARCHAR(150), OUT `codMensaje` TINYINT)
BEGIN 
   START TRANSACTION;
   IF NOT EXISTS (SELECT 1 FROM prioridad WHERE Id_Prioridad = Id_Prioridad_) THEN 
     INSERT INTO  prioridad(Id_Prioridad, DescripcionPrioridad) 
     VALUES(Id_Prioridad_,DescripcionPrioridad_);			
     
     SET mensaje = "la prioridad ha sido insertado satisfactoriamente"; 
     SET codMensaje = 1;  
   ELSE
     SET mensaje = "existe una prioridad igual, por favor revise el nombre del folio que desea ingresar";
     SET codMensaje = 0;
   END IF; 
      COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insertar_ubicacion_archivo_fisica`(
IN `DescripcionUbicacionFisica_` text,
IN `Capacidad_` int(10),
IN `TotalIngresados_` int(10),
IN `HabilitadoParaAlmacenar_` tinyint(1), OUT `mensaje` VARCHAR(150), OUT `codMensaje` TINYINT)
BEGIN 
   START TRANSACTION;
   
     INSERT INTO ubicacion_archivofisico (Id_UbicacionArchivoFisico, DescripcionUbicacionFisica, Capacidad,
     TotalIngresados,HabilitadoParaAlmacenar) 
     VALUES(NULL, DescripcionUbicacionFisica_, Capacidad_,
     TotalIngresados_,HabilitadoParaAlmacenar_);			
     
     SET mensaje = "la ubicacion ha sido insertado satisfactoriamente"; 
     SET codMensaje = 1;  
  
      COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insertar_ubicacion_notificacion`(
IN `DescripcionUbicacionNotificaciones_` text,
OUT `mensaje` VARCHAR(150), OUT `codMensaje` TINYINT)
BEGIN 
   START TRANSACTION;
  
     INSERT INTO ubicacion_notificaciones (Id_UbicacionNotificaciones, DescripcionUbicacionNotificaciones) 
     VALUES(NULL, DescripcionUbicacionNotificaciones_);			
     
     SET mensaje = "la ubicacion ha sido insertado satisfactoriamente"; 
     SET codMensaje = 1;  
  
      COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insertar_unidad_academica`( 
IN `NombreUnidadAcademica_` text,
in `UbicacionUnidadAcademica_` text,
OUT `mensaje` VARCHAR(150), OUT `codMensaje` TINYINT)
BEGIN 
   START TRANSACTION;

     INSERT INTO unidad_academica (Id_UnidadAcademica,NombreUnidadAcademica,UbicacionUnidadAcademica) 
     VALUES(NULL,NombreUnidadAcademica_,UbicacionUnidadAcademica_);			
     
     SET mensaje = "la unidad academica ha sido insertado satisfactoriamente"; 
     SET codMensaje = 1;  

      COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insertar_usuario`(IN `numEmpleado_` VARCHAR(13), IN `nombre_` VARCHAR(30), IN `Password_` VARCHAR(25), IN `rol_` INT(4), IN `fechaCreacion_` DATE, OUT `mensaje` VARCHAR(150), OUT `codMensaje` TINYINT)
BEGIN 

   START TRANSACTION;

   IF NOT EXISTS (SELECT 1 FROM usuario WHERE nombre = nombre_) THEN 

     INSERT INTO usuario VALUES(NULL,numEmpleado_,nombre_,udf_Encrypt_derecho(Password_),rol_,fechaCreacion_,NULL,1);

     SET mensaje = "El usuario ha sido insertado satisfactoriamente."; 
     SET codMensaje = 1;  
   ELSE
     SET mensaje = "El usuario ya existe en sistema, por favor revise el nombre del usuario que desea ingresar";
     SET codMensaje = 0;
   END IF; 
   
   COMMIT;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_lee_actividades_no_terminadas_poa`()
begin

select id_actividad,(select nombre from indicadores where indicadores.id_Indicadores=actividades.id_indicador) as indicador,descripcion,correlativo,supuesto,justificacion,medio_verificacion,poblacion_objetivo,fecha_inicio,fecha_fin from actividades where id_actividad not in (SELECT actividades_terminadas.id_Actividad FROM actividades_terminadas) and (select fecha_Fin from poa where poa.id_Poa in (select id_Poa from objetivos_institucionales where objetivos_institucionales.id_Objetivo in (select id_ObjetivosInsitucionales from indicadores where indicadores.id_Indicadores in (select id_indicador from actividades ))) and year(fecha_Fin) = year(now())) and (select fecha_de_Inicio from poa where poa.id_Poa in (select id_Poa from objetivos_institucionales where objetivos_institucionales.id_Objetivo in (select id_ObjetivosInsitucionales from indicadores where indicadores.id_Indicadores in (select id_indicador from actividades ))) and year(fecha_de_Inicio) = year(now())) and id_indicador in (select id_indicadores from indicadores where id_ObjetivosInsitucionales in (select id_Objetivo from objetivos_institucionales where id_Poa in(select id_Poa from poa where objetivos_institucionales.id_Poa =poa.id_Poa)));
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_lee_actividades_terminadas_poa`()
begin
select id_Actividad,No_Empleado,fecha,
(select nombre from indicadores where indicadores.id_Indicadores in (select id_indicador from actividades where id_actividad in (SELECT actividades_terminadas.id_Actividad FROM actividades_terminadas) and id_indicador in (select id_indicadores from indicadores where id_ObjetivosInsitucionales in (select id_Objetivo from objetivos_institucionales where id_Poa = ID_POA)))) as id_Indicador,
(select descripcion from actividades where id_actividad in (SELECT actividades_terminadas.id_Actividad FROM actividades_terminadas) and id_indicador in (select id_indicadores from indicadores where id_ObjetivosInsitucionales in (select id_Objetivo from objetivos_institucionales where objetivos_institucionales.id_Poa in(select id_Poa from poa where objetivos_institucionales.id_Poa =poa.id_Poa)))) as Descripcion,
(select correlativo from actividades where id_actividad in (SELECT actividades_terminadas.id_Actividad FROM actividades_terminadas) and id_indicador in (select id_indicadores from indicadores where id_ObjetivosInsitucionales in (select id_Objetivo from objetivos_institucionales where objetivos_institucionales.id_Poa in(select id_Poa from poa where objetivos_institucionales.id_Poa =poa.id_Poa)))) as Correlativo,
(select supuesto from actividades where id_actividad in (SELECT actividades_terminadas.id_Actividad FROM actividades_terminadas) and id_indicador in (select id_indicadores from indicadores where id_ObjetivosInsitucionales in (select id_Objetivo from objetivos_institucionales where objetivos_institucionales.id_Poa in(select id_Poa from poa where objetivos_institucionales.id_Poa =poa.id_Poa)))) as Supuesto,
(select justificacion from actividades where id_actividad in (SELECT actividades_terminadas.id_Actividad FROM actividades_terminadas) and id_indicador in (select id_indicadores from indicadores where id_ObjetivosInsitucionales in (select id_Objetivo from objetivos_institucionales where objetivos_institucionales.id_Poa in(select id_Poa from poa where objetivos_institucionales.id_Poa =poa.id_Poa)))) as Justificacion,
(select medio_verificacion from actividades where id_actividad in (SELECT actividades_terminadas.id_Actividad FROM actividades_terminadas) and id_indicador in (select id_indicadores from indicadores where id_ObjetivosInsitucionales in (select id_Objetivo from objetivos_institucionales where objetivos_institucionales.id_Poa in(select id_Poa from poa where objetivos_institucionales.id_Poa =poa.id_Poa)))) as Medio_De_Verificacion,
(select poblacion_objetivo from actividades where id_actividad in (SELECT actividades_terminadas.id_Actividad FROM actividades_terminadas) and id_indicador in (select id_indicadores from indicadores where id_ObjetivosInsitucionales in (select id_Objetivo from objetivos_institucionales where objetivos_institucionales.id_Poa in(select id_Poa from poa where objetivos_institucionales.id_Poa =poa.id_Poa)))) as Poblacion_Objetivo,
(select fecha_inicio from actividades where id_actividad in (SELECT actividades_terminadas.id_Actividad FROM actividades_terminadas) and id_indicador in (select id_indicadores from indicadores where id_ObjetivosInsitucionales in (select id_Objetivo from objetivos_institucionales where objetivos_institucionales.id_Poa in(select id_Poa from poa where objetivos_institucionales.id_Poa =poa.id_Poa)))) as Fecha_Inicio,
(select fecha_fin from actividades where id_actividad in (SELECT actividades_terminadas.id_Actividad FROM actividades_terminadas) and id_indicador in (select id_indicadores from indicadores where id_ObjetivosInsitucionales in (select id_Objetivo from objetivos_institucionales where objetivos_institucionales.id_Poa in(select id_Poa from poa where objetivos_institucionales.id_Poa =poa.id_Poa)))) as Fecha_Fin
from actividades_terminadas where actividades_terminadas.id_Actividad in (select id_actividad from actividades where id_indicador in (select id_indicadores from indicadores where id_ObjetivosInsitucionales in (select id_Objetivo from objetivos_institucionales where id_Poa in(select id_Poa from poa where objetivos_institucionales.id_Poa =poa.id_Poa))))
AND (select fecha_de_Inicio  from poa where poa.id_Poa in (select id_Poa from objetivos_institucionales where objetivos_institucionales.id_Objetivo in (select id_ObjetivosInsitucionales from indicadores where indicadores.id_Indicadores in (select id_indicador from actividades ))) and year(fecha_de_Inicio) = year(now()))
AND(select fecha_Fin as ff from poa where poa.id_Poa in (select id_Poa from objetivos_institucionales where objetivos_institucionales.id_Objetivo in (select id_ObjetivosInsitucionales from indicadores where indicadores.id_Indicadores in (select id_indicador from actividades ))) and year(fecha_Fin) = year(now()))
;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_login`(IN `user_` VARCHAR(30), IN `pass` VARCHAR(25))
BEGIN
   SELECT id_Usuario,Id_Rol FROM usuario WHERE nombre = user_ AND pass = udf_Decrypt_derecho(Password) AND Estado = 1;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_log_user`(IN `usuario_` INT(11), IN `ip` VARCHAR(45))
begin
    insert into usuario_log values (null,usuario_,now(),ip);
end$$

--
-- Funciones
--
CREATE DEFINER=`root`@`localhost` FUNCTION `sp_get_prioridad`(`numFolio_` VARCHAR(25)) RETURNS int(11)
BEGIN
   DECLARE pri INTEGER;
   SELECT Prioridad INTO pri FROM folios WHERE NroFolio = numFolio_;
   RETURN pri;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `udf_Decrypt_derecho`(`var` VARBINARY(150)) RETURNS varchar(25) CHARSET latin1
BEGIN
   DECLARE ret varchar(25);
   SET ret = cast(AES_DECRYPT(unhex(var), 'Der3ch0') as char);
   RETURN ret;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `udf_Encrypt_derecho`(`var` VARCHAR(25)) RETURNS varchar(150) CHARSET latin1
BEGIN  
   DECLARE ret BLOB;
   SET ret = hex(AES_ENCRYPT(var, 'Der3ch0'));
   RETURN ret;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividades`
--

CREATE TABLE IF NOT EXISTS `actividades` (
`id_actividad` int(11) NOT NULL,
  `id_indicador` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `correlativo` varchar(20) NOT NULL,
  `supuesto` text NOT NULL,
  `justificacion` text NOT NULL,
  `medio_verificacion` text NOT NULL,
  `poblacion_objetivo` varchar(30) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividades_terminadas`
--

CREATE TABLE IF NOT EXISTS `actividades_terminadas` (
`id_Actividades_Terminadas` int(11) NOT NULL,
  `id_Actividad` int(11) NOT NULL,
  `No_Empleado` varchar(20) NOT NULL,
  `fecha` date NOT NULL,
  `estado` varchar(15) NOT NULL,
  `observaciones` text
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alerta`
--

CREATE TABLE IF NOT EXISTS `alerta` (
`Id_Alerta` int(11) NOT NULL,
  `NroFolioGenera` varchar(25) NOT NULL,
  `FechaCreacion` datetime NOT NULL,
  `Atendido` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `area`
--

CREATE TABLE IF NOT EXISTS `area` (
`id_Area` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `id_tipo_area` int(11) NOT NULL,
  `observacion` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE IF NOT EXISTS `cargo` (
`ID_cargo` int(11) NOT NULL,
  `Cargo` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias_folios`
--

CREATE TABLE IF NOT EXISTS `categorias_folios` (
`Id_categoria` int(11) NOT NULL,
  `NombreCategoria` text NOT NULL,
  `DescripcionCategoria` text
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clases`
--

CREATE TABLE IF NOT EXISTS `clases` (
`ID_Clases` int(11) NOT NULL,
  `Clase` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clases_has_experiencia_academica`
--

CREATE TABLE IF NOT EXISTS `clases_has_experiencia_academica` (
  `ID_Clases` int(11) NOT NULL,
  `ID_Experiencia_academica` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `costo_porcentaje_actividad_por_trimestre`
--

CREATE TABLE IF NOT EXISTS `costo_porcentaje_actividad_por_trimestre` (
`id_Costo_Porcentaje_Actividad_Por_Trimesrte` int(11) NOT NULL,
  `id_Actividad` int(11) NOT NULL,
  `costo` int(11) NOT NULL,
  `porcentaje` int(11) NOT NULL,
  `observacion` text,
  `trimestre` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento_laboral`
--

CREATE TABLE IF NOT EXISTS `departamento_laboral` (
`Id_departamento_laboral` int(11) NOT NULL,
  `nombre_departamento` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `departamento_laboral`
--

INSERT INTO `departamento_laboral` (`Id_departamento_laboral`, `nombre_departamento`) VALUES
(1, 'Administrativo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `edificios`
--

CREATE TABLE IF NOT EXISTS `edificios` (
`Edificio_ID` int(11) NOT NULL,
  `descripcion` text
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE IF NOT EXISTS `empleado` (
  `No_Empleado` varchar(20) NOT NULL,
  `N_identidad` varchar(20) NOT NULL,
  `Id_departamento` int(11) NOT NULL,
  `Fecha_ingreso` date NOT NULL,
  `fecha_salida` date DEFAULT NULL,
  `Observacion` text,
  `estado_empleado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`No_Empleado`, `N_identidad`, `Id_departamento`, `Fecha_ingreso`, `fecha_salida`, `Observacion`, `estado_empleado`) VALUES
('1234', '0000-0000-00000', 1, '2015-03-06', '0000-00-00', 'prueba', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado_has_cargo`
--

CREATE TABLE IF NOT EXISTS `empleado_has_cargo` (
  `No_Empleado` varchar(20) NOT NULL,
  `ID_cargo` int(11) NOT NULL,
  `Fecha_ingreso_cargo` date NOT NULL,
  `Fecha_salida_cargo` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_seguimiento`
--

CREATE TABLE IF NOT EXISTS `estado_seguimiento` (
`Id_Estado_Seguimiento` tinyint(4) NOT NULL,
  `DescripcionEstadoSeguimiento` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estado_seguimiento`
--

INSERT INTO `estado_seguimiento` (`Id_Estado_Seguimiento`, `DescripcionEstadoSeguimiento`) VALUES
(1, 'en seguimiento'),
(2, 'Empezo con seguimiento'),
(3, 'En espera'),
(4, 'Sin seguimiento'),
(5, 'Seguimiento finalizado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudios_academico`
--

CREATE TABLE IF NOT EXISTS `estudios_academico` (
`ID_Estudios_academico` int(11) NOT NULL,
  `Nombre_titulo` varchar(45) NOT NULL,
  `ID_Tipo_estudio` int(11) NOT NULL,
  `N_identidad` varchar(20) NOT NULL,
  `Id_universidad` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `experiencia_academica`
--

CREATE TABLE IF NOT EXISTS `experiencia_academica` (
`ID_Experiencia_academica` int(11) NOT NULL,
  `Institucion` varchar(45) NOT NULL,
  `Tiempo` int(3) NOT NULL,
  `N_identidad` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `experiencia_laboral`
--

CREATE TABLE IF NOT EXISTS `experiencia_laboral` (
`ID_Experiencia_laboral` int(11) NOT NULL,
  `Nombre_empresa` varchar(45) NOT NULL,
  `Tiempo` int(3) NOT NULL,
  `N_identidad` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `experiencia_laboral_has_cargo`
--

CREATE TABLE IF NOT EXISTS `experiencia_laboral_has_cargo` (
  `ID_Experiencia_laboral` int(11) NOT NULL,
  `ID_cargo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `folios`
--

CREATE TABLE IF NOT EXISTS `folios` (
  `NroFolio` varchar(25) NOT NULL,
  `NroFolioRespuesta` varchar(25) DEFAULT NULL,
  `FechaCreacion` date NOT NULL,
  `FechaEntrada` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `PersonaReferente` text NOT NULL,
  `UnidadAcademica` int(11) DEFAULT NULL,
  `Organizacion` int(11) DEFAULT NULL,
  `Categoria` int(11) NOT NULL,
  `DescripcionAsunto` text,
  `TipoFolio` tinyint(1) NOT NULL,
  `UbicacionFisica` int(5) NOT NULL,
  `Prioridad` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo_o_comite`
--

CREATE TABLE IF NOT EXISTS `grupo_o_comite` (
`ID_Grupo_o_comite` int(11) NOT NULL,
  `Nombre_Grupo_o_comite` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo_o_comite_has_empleado`
--

CREATE TABLE IF NOT EXISTS `grupo_o_comite_has_empleado` (
  `ID_Grupo_o_comite` int(11) NOT NULL,
  `No_Empleado` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `idioma`
--

CREATE TABLE IF NOT EXISTS `idioma` (
`ID_Idioma` int(11) NOT NULL,
  `Idioma` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `idioma_has_persona`
--

CREATE TABLE IF NOT EXISTS `idioma_has_persona` (
  `ID_Idioma` int(11) NOT NULL,
  `N_identidad` varchar(20) NOT NULL,
  `Nivel` varchar(45) DEFAULT NULL,
`Id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `indicadores`
--

CREATE TABLE IF NOT EXISTS `indicadores` (
`id_Indicadores` int(11) NOT NULL,
  `id_ObjetivosInsitucionales` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `descripcion` text
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `motivos`
--

CREATE TABLE IF NOT EXISTS `motivos` (
`Motivo_ID` int(11) NOT NULL,
  `descripcion` text
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificaciones_folios`
--

CREATE TABLE IF NOT EXISTS `notificaciones_folios` (
`Id_Notificacion` int(11) NOT NULL,
  `NroFolio` varchar(25) NOT NULL,
  `IdEmisor` int(15) NOT NULL,
  `Titulo` text NOT NULL,
  `Cuerpo` text NOT NULL,
  `FechaCreacion` datetime NOT NULL,
  `IdUbicacionNotificacion` int(11) NOT NULL,
  `Estado` tinyint(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `objetivos_institucionales`
--

CREATE TABLE IF NOT EXISTS `objetivos_institucionales` (
`id_Objetivo` int(11) NOT NULL,
  `definicion` text NOT NULL,
  `area_Estrategica` text NOT NULL,
  `resultados_Esperados` text NOT NULL,
  `id_Area` int(11) NOT NULL,
  `id_Poa` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `organizacion`
--

CREATE TABLE IF NOT EXISTS `organizacion` (
`Id_Organizacion` int(11) NOT NULL,
  `NombreOrganizacion` text NOT NULL,
  `Ubicacion` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pais`
--

CREATE TABLE IF NOT EXISTS `pais` (
`Id_pais` int(11) NOT NULL,
  `Nombre_pais` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE IF NOT EXISTS `permisos` (
`id_Permisos` int(11) NOT NULL,
  `id_departamento` int(11) NOT NULL,
  `No_Empleado` varchar(20) NOT NULL,
  `id_motivo` int(11) NOT NULL,
  `dias_permiso` int(11) NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_finalizacion` time NOT NULL,
  `fecha` datetime NOT NULL,
  `fecha_solicitud` date NOT NULL,
  `estado` varchar(15) DEFAULT NULL,
  `observacion` varchar(200) DEFAULT NULL,
  `revisado_por` varchar(15) DEFAULT NULL,
  `id_Edificio_Registro` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE IF NOT EXISTS `persona` (
  `N_identidad` varchar(20) NOT NULL,
  `Primer_nombre` varchar(20) NOT NULL,
  `Segundo_nombre` varchar(20) DEFAULT NULL,
  `Primer_apellido` varchar(45) NOT NULL,
  `Segundo_apellido` varchar(20) DEFAULT NULL,
  `Fecha_nacimiento` date NOT NULL,
  `Sexo` varchar(1) DEFAULT NULL,
  `Direccion` varchar(300) NOT NULL,
  `Correo_electronico` varchar(40) DEFAULT NULL,
  `Estado_Civil` varchar(15) DEFAULT NULL,
  `Nacionalidad` varchar(20) NOT NULL,
  `foto_perfil` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`N_identidad`, `Primer_nombre`, `Segundo_nombre`, `Primer_apellido`, `Segundo_apellido`, `Fecha_nacimiento`, `Sexo`, `Direccion`, `Correo_electronico`, `Estado_Civil`, `Nacionalidad`, `foto_perfil`) VALUES
('0000-0000-00000', 'Prueba', 'Prueba', 'Prueba', 'Prueba', '2015-03-29', 'M', 'prueba', 'prueba@prueba.com', 'soltero', 'prueba', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `poa`
--

CREATE TABLE IF NOT EXISTS `poa` (
`id_Poa` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `fecha_de_Inicio` date NOT NULL,
  `fecha_Fin` date NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prioridad`
--

CREATE TABLE IF NOT EXISTS `prioridad` (
  `Id_Prioridad` tinyint(4) NOT NULL,
  `DescripcionPrioridad` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `prioridad`
--

INSERT INTO `prioridad` (`Id_Prioridad`, `DescripcionPrioridad`) VALUES
(1, 'Informativo'),
(2, 'Normal'),
(3, 'Urgente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prioridad_folio`
--

CREATE TABLE IF NOT EXISTS `prioridad_folio` (
`Id_PrioridadFolio` int(11) NOT NULL,
  `IdFolio` varchar(25) NOT NULL,
  `Id_Prioridad` tinyint(4) NOT NULL,
  `FechaEstablecida` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `responsables_por_actividad`
--

CREATE TABLE IF NOT EXISTS `responsables_por_actividad` (
`id_Responsable_por_Actividad` int(11) NOT NULL,
  `id_Actividad` int(11) NOT NULL,
  `id_Responsable` int(11) NOT NULL,
  `fecha_Asignacion` date NOT NULL,
  `observacion` text
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `Id_Rol` tinyint(4) NOT NULL,
  `Descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`Id_Rol`, `Descripcion`) VALUES
(10, 'Usuario Basico'),
(20, 'Docente'),
(29, 'Asistente Jefatura'),
(30, 'Jefe Departamento'),
(40, 'Secretaria General'),
(45, 'Secretaria Decana'),
(50, 'Decano'),
(100, 'root');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguimiento`
--

CREATE TABLE IF NOT EXISTS `seguimiento` (
`Id_Seguimiento` int(11) NOT NULL,
  `NroFolio` varchar(25) NOT NULL,
  `UsuarioAsignado` int(11) DEFAULT NULL,
  `Notas` text NOT NULL,
  `Prioridad` tinyint(4) NOT NULL,
  `FechaInicio` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `FechaFinal` date DEFAULT NULL,
  `EstadoSeguimiento` tinyint(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguimiento_historico`
--

CREATE TABLE IF NOT EXISTS `seguimiento_historico` (
`Id_SeguimientoHistorico` int(11) NOT NULL,
  `Id_Seguimiento` int(11) NOT NULL,
  `Id_Estado_Seguimiento` tinyint(4) NOT NULL,
  `Notas` text NOT NULL,
  `Prioridad` tinyint(4) NOT NULL,
  `FechaCambio` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sub_actividad`
--

CREATE TABLE IF NOT EXISTS `sub_actividad` (
`id_sub_Actividad` int(11) NOT NULL,
  `idActividad` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `descripcion` text NOT NULL,
  `fecha_monitoreo` date NOT NULL,
  `id_Encargado` varchar(20) NOT NULL,
  `ponderacion` int(11) NOT NULL,
  `costo` int(11) NOT NULL,
  `observacion` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sub_actividades_realizadas`
--

CREATE TABLE IF NOT EXISTS `sub_actividades_realizadas` (
`id_subActividadRealizada` int(11) NOT NULL,
  `id_SubActividad` int(11) NOT NULL,
  `fecha_Realizacion` date NOT NULL,
  `observacion` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telefono`
--

CREATE TABLE IF NOT EXISTS `telefono` (
`ID_Telefono` int(11) NOT NULL,
  `Tipo` varchar(45) NOT NULL,
  `Numero` varchar(20) NOT NULL,
  `N_identidad` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_area`
--

CREATE TABLE IF NOT EXISTS `tipo_area` (
`id_Tipo_Area` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `observaciones` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_estudio`
--

CREATE TABLE IF NOT EXISTS `tipo_estudio` (
`ID_Tipo_estudio` int(11) NOT NULL,
  `Tipo_estudio` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_estudio`
--

INSERT INTO `tipo_estudio` (`ID_Tipo_estudio`, `Tipo_estudio`) VALUES
(1, 'licenciatura'),
(2, 'Maestria'),
(3, 'Doctorado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `titulo`
--

CREATE TABLE IF NOT EXISTS `titulo` (
`id_titulo` int(11) NOT NULL,
  `titulo` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ubicacion_archivofisico`
--

CREATE TABLE IF NOT EXISTS `ubicacion_archivofisico` (
`Id_UbicacionArchivoFisico` int(5) NOT NULL,
  `DescripcionUbicacionFisica` text NOT NULL,
  `Capacidad` int(10) NOT NULL,
  `TotalIngresados` int(10) NOT NULL DEFAULT '0',
  `HabilitadoParaAlmacenar` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ubicacion_archivofisico`
--

INSERT INTO `ubicacion_archivofisico` (`Id_UbicacionArchivoFisico`, `DescripcionUbicacionFisica`, `Capacidad`, `TotalIngresados`, `HabilitadoParaAlmacenar`) VALUES
(2, 'ubi', 100, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ubicacion_notificaciones`
--

CREATE TABLE IF NOT EXISTS `ubicacion_notificaciones` (
`Id_UbicacionNotificaciones` tinyint(4) NOT NULL,
  `DescripcionUbicacionNotificaciones` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ubicacion_notificaciones`
--

INSERT INTO `ubicacion_notificaciones` (`Id_UbicacionNotificaciones`, `DescripcionUbicacionNotificaciones`) VALUES
(1, 'Basurero'),
(2, 'Enviadas'),
(3, 'Recibidas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidad_academica`
--

CREATE TABLE IF NOT EXISTS `unidad_academica` (
`Id_UnidadAcademica` int(11) NOT NULL,
  `NombreUnidadAcademica` text NOT NULL,
  `UbicacionUnidadAcademica` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `universidad`
--

CREATE TABLE IF NOT EXISTS `universidad` (
`Id_universidad` int(11) NOT NULL,
  `nombre_universidad` varchar(50) NOT NULL,
  `Id_pais` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
`id_Usuario` int(11) NOT NULL,
  `No_Empleado` varchar(13) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `Password` varbinary(250) NOT NULL,
  `Id_Rol` tinyint(4) NOT NULL,
  `Fecha_Creacion` date NOT NULL,
  `Fecha_Alta` date DEFAULT NULL,
  `Estado` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_Usuario`, `No_Empleado`, `nombre`, `Password`, `Id_Rol`, `Fecha_Creacion`, `Fecha_Alta`, `Estado`) VALUES
(1, '1234', 'prueba', 0x3831444637443233344633423846353438374146353038433243373942303041, 100, '2015-03-11', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_alertado`
--

CREATE TABLE IF NOT EXISTS `usuario_alertado` (
`Id_UsuarioAlertado` int(11) NOT NULL,
  `Id_Alerta` int(11) NOT NULL,
  `Id_Usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_log`
--

CREATE TABLE IF NOT EXISTS `usuario_log` (
`Id_log` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  `fecha_log` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ip_conn` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario_log`
--

INSERT INTO `usuario_log` (`Id_log`, `usuario`, `fecha_log`, `ip_conn`) VALUES
(66, 1, '2015-04-30 12:24:09', '::1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_notificado`
--

CREATE TABLE IF NOT EXISTS `usuario_notificado` (
`Id_UsuarioNotificado` int(11) NOT NULL,
  `Id_Notificacion` int(11) NOT NULL,
  `Id_Usuario` int(11) NOT NULL,
  `IdUbicacionNotificacion` tinyint(4) NOT NULL,
  `Estado` tinyint(11) NOT NULL,
  `Fecha` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividades`
--
ALTER TABLE `actividades`
 ADD PRIMARY KEY (`id_actividad`), ADD KEY `id_indicador` (`id_indicador`);

--
-- Indices de la tabla `actividades_terminadas`
--
ALTER TABLE `actividades_terminadas`
 ADD PRIMARY KEY (`id_Actividades_Terminadas`), ADD KEY `id_Actividad` (`id_Actividad`), ADD KEY `No_Empleado` (`No_Empleado`);

--
-- Indices de la tabla `alerta`
--
ALTER TABLE `alerta`
 ADD PRIMARY KEY (`Id_Alerta`), ADD KEY `fk_alerta_folios` (`NroFolioGenera`);

--
-- Indices de la tabla `area`
--
ALTER TABLE `area`
 ADD PRIMARY KEY (`id_Area`), ADD KEY `id_tipo_area` (`id_tipo_area`);

--
-- Indices de la tabla `cargo`
--
ALTER TABLE `cargo`
 ADD PRIMARY KEY (`ID_cargo`);

--
-- Indices de la tabla `categorias_folios`
--
ALTER TABLE `categorias_folios`
 ADD PRIMARY KEY (`Id_categoria`);

--
-- Indices de la tabla `clases`
--
ALTER TABLE `clases`
 ADD PRIMARY KEY (`ID_Clases`);

--
-- Indices de la tabla `clases_has_experiencia_academica`
--
ALTER TABLE `clases_has_experiencia_academica`
 ADD PRIMARY KEY (`ID_Clases`,`ID_Experiencia_academica`), ADD KEY `fk_Clases_has_Experiencia_academica_Experiencia_academica1_idx` (`ID_Experiencia_academica`), ADD KEY `fk_Clases_has_Experiencia_academica_Clases1_idx` (`ID_Clases`);

--
-- Indices de la tabla `costo_porcentaje_actividad_por_trimestre`
--
ALTER TABLE `costo_porcentaje_actividad_por_trimestre`
 ADD PRIMARY KEY (`id_Costo_Porcentaje_Actividad_Por_Trimesrte`), ADD KEY `id_Actividad` (`id_Actividad`);

--
-- Indices de la tabla `departamento_laboral`
--
ALTER TABLE `departamento_laboral`
 ADD PRIMARY KEY (`Id_departamento_laboral`);

--
-- Indices de la tabla `edificios`
--
ALTER TABLE `edificios`
 ADD PRIMARY KEY (`Edificio_ID`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
 ADD PRIMARY KEY (`No_Empleado`,`N_identidad`), ADD UNIQUE KEY `No_Empleado_2` (`No_Empleado`), ADD KEY `fk_Empleado_Persona1_idx` (`N_identidad`), ADD KEY `fk_empleado_dep` (`Id_departamento`), ADD KEY `No_Empleado` (`No_Empleado`);

--
-- Indices de la tabla `empleado_has_cargo`
--
ALTER TABLE `empleado_has_cargo`
 ADD PRIMARY KEY (`No_Empleado`,`ID_cargo`), ADD KEY `fk_Empleado_has_Cargo_Cargo1_idx` (`ID_cargo`), ADD KEY `fk_Empleado_has_Cargo_Empleado1_idx` (`No_Empleado`), ADD KEY `No_Empleado` (`No_Empleado`);

--
-- Indices de la tabla `estado_seguimiento`
--
ALTER TABLE `estado_seguimiento`
 ADD PRIMARY KEY (`Id_Estado_Seguimiento`);

--
-- Indices de la tabla `estudios_academico`
--
ALTER TABLE `estudios_academico`
 ADD PRIMARY KEY (`ID_Estudios_academico`), ADD KEY `fk_Estudios_academico_Tipo_estudio1_idx` (`ID_Tipo_estudio`), ADD KEY `fk_Estudios_academico_Persona1_idx` (`N_identidad`), ADD KEY `fk_estudio_universidad` (`Id_universidad`);

--
-- Indices de la tabla `experiencia_academica`
--
ALTER TABLE `experiencia_academica`
 ADD PRIMARY KEY (`ID_Experiencia_academica`), ADD KEY `fk_Experiencia_academica_Persona1_idx` (`N_identidad`);

--
-- Indices de la tabla `experiencia_laboral`
--
ALTER TABLE `experiencia_laboral`
 ADD PRIMARY KEY (`ID_Experiencia_laboral`), ADD KEY `fk_Experiencia_laboral_Persona1_idx` (`N_identidad`);

--
-- Indices de la tabla `experiencia_laboral_has_cargo`
--
ALTER TABLE `experiencia_laboral_has_cargo`
 ADD PRIMARY KEY (`ID_Experiencia_laboral`,`ID_cargo`), ADD KEY `fk_Experiencia_laboral_has_Cargo_Cargo1_idx` (`ID_cargo`), ADD KEY `fk_Experiencia_laboral_has_Cargo_Experiencia_laboral1_idx` (`ID_Experiencia_laboral`);

--
-- Indices de la tabla `folios`
--
ALTER TABLE `folios`
 ADD PRIMARY KEY (`NroFolio`), ADD KEY `fk_folios_unidad_academica_unidadAcademica` (`UnidadAcademica`), ADD KEY `fk_folios_organizacion_organizacion` (`Organizacion`), ADD KEY `fk_folios_tblTipoPrioridad` (`Prioridad`), ADD KEY `fk_folios_ubicacion_archivofisico_ubicacionFisica` (`UbicacionFisica`), ADD KEY `fk_folio_folioRespuesta` (`NroFolioRespuesta`), ADD KEY `fk_folios_categoria` (`Categoria`);

--
-- Indices de la tabla `grupo_o_comite`
--
ALTER TABLE `grupo_o_comite`
 ADD PRIMARY KEY (`ID_Grupo_o_comite`);

--
-- Indices de la tabla `grupo_o_comite_has_empleado`
--
ALTER TABLE `grupo_o_comite_has_empleado`
 ADD PRIMARY KEY (`ID_Grupo_o_comite`,`No_Empleado`), ADD KEY `fk_Grupo_o_comite_has_Empleado_Empleado1_idx` (`No_Empleado`), ADD KEY `fk_Grupo_o_comite_has_Empleado_Grupo_o_comite1_idx` (`ID_Grupo_o_comite`);

--
-- Indices de la tabla `idioma`
--
ALTER TABLE `idioma`
 ADD PRIMARY KEY (`ID_Idioma`);

--
-- Indices de la tabla `idioma_has_persona`
--
ALTER TABLE `idioma_has_persona`
 ADD PRIMARY KEY (`Id`), ADD KEY `fk_Idioma_has_Persona_Persona1_idx` (`N_identidad`), ADD KEY `fk_Idioma_has_Persona_Idioma_idx` (`ID_Idioma`);

--
-- Indices de la tabla `indicadores`
--
ALTER TABLE `indicadores`
 ADD PRIMARY KEY (`id_Indicadores`), ADD KEY `id_ObjetivosInsitucionales` (`id_ObjetivosInsitucionales`);

--
-- Indices de la tabla `motivos`
--
ALTER TABLE `motivos`
 ADD PRIMARY KEY (`Motivo_ID`);

--
-- Indices de la tabla `notificaciones_folios`
--
ALTER TABLE `notificaciones_folios`
 ADD PRIMARY KEY (`Id_Notificacion`,`IdEmisor`), ADD KEY `fk_notificaciones_folios_folios` (`NroFolio`), ADD KEY `fk_usuario_notificaciones` (`IdEmisor`);

--
-- Indices de la tabla `objetivos_institucionales`
--
ALTER TABLE `objetivos_institucionales`
 ADD PRIMARY KEY (`id_Objetivo`), ADD KEY `id_Area` (`id_Area`), ADD KEY `id_Poa` (`id_Poa`), ADD KEY `id_Area_2` (`id_Area`);

--
-- Indices de la tabla `organizacion`
--
ALTER TABLE `organizacion`
 ADD PRIMARY KEY (`Id_Organizacion`);

--
-- Indices de la tabla `pais`
--
ALTER TABLE `pais`
 ADD PRIMARY KEY (`Id_pais`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
 ADD PRIMARY KEY (`id_Permisos`), ADD KEY `fk_motivo` (`id_motivo`), ADD KEY `fk_empleado` (`No_Empleado`), ADD KEY `fk_edificio_registro` (`id_Edificio_Registro`), ADD KEY `fk_revisado` (`revisado_por`), ADD KEY `fk_departamento` (`id_departamento`), ADD KEY `fk_usuario` (`id_usuario`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
 ADD PRIMARY KEY (`N_identidad`);

--
-- Indices de la tabla `poa`
--
ALTER TABLE `poa`
 ADD PRIMARY KEY (`id_Poa`);

--
-- Indices de la tabla `prioridad`
--
ALTER TABLE `prioridad`
 ADD PRIMARY KEY (`Id_Prioridad`);

--
-- Indices de la tabla `prioridad_folio`
--
ALTER TABLE `prioridad_folio`
 ADD PRIMARY KEY (`Id_PrioridadFolio`), ADD KEY `fk_prioridad_folio_folios` (`IdFolio`), ADD KEY `fk_prioridad_folio_prioridad` (`Id_Prioridad`);

--
-- Indices de la tabla `responsables_por_actividad`
--
ALTER TABLE `responsables_por_actividad`
 ADD PRIMARY KEY (`id_Responsable_por_Actividad`), ADD KEY `id_Actividad` (`id_Actividad`,`id_Responsable`), ADD KEY `id_Responsable` (`id_Responsable`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
 ADD PRIMARY KEY (`Id_Rol`);

--
-- Indices de la tabla `seguimiento`
--
ALTER TABLE `seguimiento`
 ADD PRIMARY KEY (`Id_Seguimiento`), ADD KEY `fk_seguimiento_folios` (`NroFolio`), ADD KEY `fk_seguimiento_usuarioAsignado` (`UsuarioAsignado`);

--
-- Indices de la tabla `seguimiento_historico`
--
ALTER TABLE `seguimiento_historico`
 ADD PRIMARY KEY (`Id_SeguimientoHistorico`), ADD KEY `fk_seguimiento_historico_seguimiento` (`Id_Seguimiento`), ADD KEY `fk_seguimiento_historico_tblEstdoSeguimiento` (`Id_Estado_Seguimiento`);

--
-- Indices de la tabla `sub_actividad`
--
ALTER TABLE `sub_actividad`
 ADD PRIMARY KEY (`id_sub_Actividad`), ADD KEY `idActividad` (`idActividad`), ADD KEY `id_Encargado(Usuario)` (`id_Encargado`);

--
-- Indices de la tabla `sub_actividades_realizadas`
--
ALTER TABLE `sub_actividades_realizadas`
 ADD PRIMARY KEY (`id_subActividadRealizada`), ADD UNIQUE KEY `id_SubActividad_2` (`id_SubActividad`), ADD KEY `id_SubActividad` (`id_SubActividad`);

--
-- Indices de la tabla `telefono`
--
ALTER TABLE `telefono`
 ADD PRIMARY KEY (`ID_Telefono`), ADD KEY `fk_Telefono_Persona1_idx` (`N_identidad`);

--
-- Indices de la tabla `tipo_area`
--
ALTER TABLE `tipo_area`
 ADD PRIMARY KEY (`id_Tipo_Area`);

--
-- Indices de la tabla `tipo_estudio`
--
ALTER TABLE `tipo_estudio`
 ADD PRIMARY KEY (`ID_Tipo_estudio`);

--
-- Indices de la tabla `titulo`
--
ALTER TABLE `titulo`
 ADD PRIMARY KEY (`id_titulo`);

--
-- Indices de la tabla `ubicacion_archivofisico`
--
ALTER TABLE `ubicacion_archivofisico`
 ADD PRIMARY KEY (`Id_UbicacionArchivoFisico`);

--
-- Indices de la tabla `ubicacion_notificaciones`
--
ALTER TABLE `ubicacion_notificaciones`
 ADD PRIMARY KEY (`Id_UbicacionNotificaciones`);

--
-- Indices de la tabla `unidad_academica`
--
ALTER TABLE `unidad_academica`
 ADD PRIMARY KEY (`Id_UnidadAcademica`);

--
-- Indices de la tabla `universidad`
--
ALTER TABLE `universidad`
 ADD PRIMARY KEY (`Id_universidad`), ADD KEY `fk_universidad_pais` (`Id_pais`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
 ADD PRIMARY KEY (`id_Usuario`), ADD KEY `fk_usuarios_roles` (`Id_Rol`), ADD KEY `fk_usuario_empleado` (`No_Empleado`);

--
-- Indices de la tabla `usuario_alertado`
--
ALTER TABLE `usuario_alertado`
 ADD PRIMARY KEY (`Id_UsuarioAlertado`), ADD KEY `fk_usuario_alertado_usuario` (`Id_Usuario`), ADD KEY `fk_usuario_alertado_alerta` (`Id_Alerta`);

--
-- Indices de la tabla `usuario_log`
--
ALTER TABLE `usuario_log`
 ADD PRIMARY KEY (`Id_log`);

--
-- Indices de la tabla `usuario_notificado`
--
ALTER TABLE `usuario_notificado`
 ADD PRIMARY KEY (`Id_UsuarioNotificado`), ADD KEY `fk_usuario_notificado_notificaciones_folios` (`Id_Notificacion`), ADD KEY `fk_usuario_notificado_ubicacion_notificacionesFolios` (`IdUbicacionNotificacion`), ADD KEY `fk_usuario_notificado_usuario` (`Id_Usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividades`
--
ALTER TABLE `actividades`
MODIFY `id_actividad` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `actividades_terminadas`
--
ALTER TABLE `actividades_terminadas`
MODIFY `id_Actividades_Terminadas` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `alerta`
--
ALTER TABLE `alerta`
MODIFY `Id_Alerta` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `area`
--
ALTER TABLE `area`
MODIFY `id_Area` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `cargo`
--
ALTER TABLE `cargo`
MODIFY `ID_cargo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `categorias_folios`
--
ALTER TABLE `categorias_folios`
MODIFY `Id_categoria` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `clases`
--
ALTER TABLE `clases`
MODIFY `ID_Clases` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `costo_porcentaje_actividad_por_trimestre`
--
ALTER TABLE `costo_porcentaje_actividad_por_trimestre`
MODIFY `id_Costo_Porcentaje_Actividad_Por_Trimesrte` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `departamento_laboral`
--
ALTER TABLE `departamento_laboral`
MODIFY `Id_departamento_laboral` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `edificios`
--
ALTER TABLE `edificios`
MODIFY `Edificio_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `estado_seguimiento`
--
ALTER TABLE `estado_seguimiento`
MODIFY `Id_Estado_Seguimiento` tinyint(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `estudios_academico`
--
ALTER TABLE `estudios_academico`
MODIFY `ID_Estudios_academico` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `experiencia_academica`
--
ALTER TABLE `experiencia_academica`
MODIFY `ID_Experiencia_academica` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `experiencia_laboral`
--
ALTER TABLE `experiencia_laboral`
MODIFY `ID_Experiencia_laboral` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `grupo_o_comite`
--
ALTER TABLE `grupo_o_comite`
MODIFY `ID_Grupo_o_comite` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `idioma`
--
ALTER TABLE `idioma`
MODIFY `ID_Idioma` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `idioma_has_persona`
--
ALTER TABLE `idioma_has_persona`
MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `indicadores`
--
ALTER TABLE `indicadores`
MODIFY `id_Indicadores` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `motivos`
--
ALTER TABLE `motivos`
MODIFY `Motivo_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `notificaciones_folios`
--
ALTER TABLE `notificaciones_folios`
MODIFY `Id_Notificacion` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `objetivos_institucionales`
--
ALTER TABLE `objetivos_institucionales`
MODIFY `id_Objetivo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `organizacion`
--
ALTER TABLE `organizacion`
MODIFY `Id_Organizacion` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `pais`
--
ALTER TABLE `pais`
MODIFY `Id_pais` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
MODIFY `id_Permisos` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `poa`
--
ALTER TABLE `poa`
MODIFY `id_Poa` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `prioridad_folio`
--
ALTER TABLE `prioridad_folio`
MODIFY `Id_PrioridadFolio` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `responsables_por_actividad`
--
ALTER TABLE `responsables_por_actividad`
MODIFY `id_Responsable_por_Actividad` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `seguimiento`
--
ALTER TABLE `seguimiento`
MODIFY `Id_Seguimiento` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `seguimiento_historico`
--
ALTER TABLE `seguimiento_historico`
MODIFY `Id_SeguimientoHistorico` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `sub_actividad`
--
ALTER TABLE `sub_actividad`
MODIFY `id_sub_Actividad` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `sub_actividades_realizadas`
--
ALTER TABLE `sub_actividades_realizadas`
MODIFY `id_subActividadRealizada` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `telefono`
--
ALTER TABLE `telefono`
MODIFY `ID_Telefono` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tipo_area`
--
ALTER TABLE `tipo_area`
MODIFY `id_Tipo_Area` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `tipo_estudio`
--
ALTER TABLE `tipo_estudio`
MODIFY `ID_Tipo_estudio` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `titulo`
--
ALTER TABLE `titulo`
MODIFY `id_titulo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `ubicacion_archivofisico`
--
ALTER TABLE `ubicacion_archivofisico`
MODIFY `Id_UbicacionArchivoFisico` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `ubicacion_notificaciones`
--
ALTER TABLE `ubicacion_notificaciones`
MODIFY `Id_UbicacionNotificaciones` tinyint(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `unidad_academica`
--
ALTER TABLE `unidad_academica`
MODIFY `Id_UnidadAcademica` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `universidad`
--
ALTER TABLE `universidad`
MODIFY `Id_universidad` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
MODIFY `id_Usuario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `usuario_alertado`
--
ALTER TABLE `usuario_alertado`
MODIFY `Id_UsuarioAlertado` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuario_log`
--
ALTER TABLE `usuario_log`
MODIFY `Id_log` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=67;
--
-- AUTO_INCREMENT de la tabla `usuario_notificado`
--
ALTER TABLE `usuario_notificado`
MODIFY `Id_UsuarioNotificado` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `actividades_terminadas`
--
ALTER TABLE `actividades_terminadas`
ADD CONSTRAINT `actividades_terminadas_ibfk_3` FOREIGN KEY (`id_Actividad`) REFERENCES `actividades` (`id_actividad`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `alerta`
--
ALTER TABLE `alerta`
ADD CONSTRAINT `fk_alerta_folios` FOREIGN KEY (`NroFolioGenera`) REFERENCES `folios` (`NroFolio`);

--
-- Filtros para la tabla `area`
--
ALTER TABLE `area`
ADD CONSTRAINT `area_ibfk_1` FOREIGN KEY (`id_tipo_area`) REFERENCES `tipo_area` (`id_Tipo_Area`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `clases_has_experiencia_academica`
--
ALTER TABLE `clases_has_experiencia_academica`
ADD CONSTRAINT `fk_Clases_has_Experiencia_academica_Clases1` FOREIGN KEY (`ID_Clases`) REFERENCES `clases` (`ID_Clases`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_Clases_has_Experiencia_academica_Experiencia_academica1` FOREIGN KEY (`ID_Experiencia_academica`) REFERENCES `experiencia_academica` (`ID_Experiencia_academica`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `costo_porcentaje_actividad_por_trimestre`
--
ALTER TABLE `costo_porcentaje_actividad_por_trimestre`
ADD CONSTRAINT `costo_porcentaje_actividad_por_trimestre_ibfk_1` FOREIGN KEY (`id_Actividad`) REFERENCES `actividades` (`id_actividad`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
ADD CONSTRAINT `fk_Empleado_Persona1` FOREIGN KEY (`N_identidad`) REFERENCES `persona` (`N_identidad`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_empleado_dep` FOREIGN KEY (`Id_departamento`) REFERENCES `departamento_laboral` (`Id_departamento_laboral`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `empleado_has_cargo`
--
ALTER TABLE `empleado_has_cargo`
ADD CONSTRAINT `fk_Empleado_has_Cargo_Cargo1` FOREIGN KEY (`ID_cargo`) REFERENCES `cargo` (`ID_cargo`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_Empleado_has_Cargo_Empleado1` FOREIGN KEY (`No_Empleado`) REFERENCES `empleado` (`No_Empleado`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `estudios_academico`
--
ALTER TABLE `estudios_academico`
ADD CONSTRAINT `fk_Estudios_academico_Persona1` FOREIGN KEY (`N_identidad`) REFERENCES `persona` (`N_identidad`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_Estudios_academico_Tipo_estudio1` FOREIGN KEY (`ID_Tipo_estudio`) REFERENCES `tipo_estudio` (`ID_Tipo_estudio`),
ADD CONSTRAINT `fk_estudio_universidad` FOREIGN KEY (`Id_universidad`) REFERENCES `universidad` (`Id_universidad`);

--
-- Filtros para la tabla `experiencia_academica`
--
ALTER TABLE `experiencia_academica`
ADD CONSTRAINT `fk_Experiencia_academica_Persona1` FOREIGN KEY (`N_identidad`) REFERENCES `persona` (`N_identidad`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `experiencia_laboral`
--
ALTER TABLE `experiencia_laboral`
ADD CONSTRAINT `fk_Experiencia_laboral_Persona1` FOREIGN KEY (`N_identidad`) REFERENCES `persona` (`N_identidad`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `experiencia_laboral_has_cargo`
--
ALTER TABLE `experiencia_laboral_has_cargo`
ADD CONSTRAINT `fk_Experiencia_laboral_has_Cargo_Cargo1` FOREIGN KEY (`ID_cargo`) REFERENCES `cargo` (`ID_cargo`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_Experiencia_laboral_has_Cargo_Experiencia_laboral1` FOREIGN KEY (`ID_Experiencia_laboral`) REFERENCES `experiencia_laboral` (`ID_Experiencia_laboral`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `folios`
--
ALTER TABLE `folios`
ADD CONSTRAINT `fk_folio_folioRespuesta` FOREIGN KEY (`NroFolioRespuesta`) REFERENCES `folios` (`NroFolio`) ON UPDATE CASCADE,
ADD CONSTRAINT `fk_folios_categoria` FOREIGN KEY (`Categoria`) REFERENCES `categorias_folios` (`Id_categoria`) ON UPDATE CASCADE,
ADD CONSTRAINT `fk_folios_organizacion_organizacion` FOREIGN KEY (`Organizacion`) REFERENCES `organizacion` (`Id_Organizacion`) ON UPDATE CASCADE,
ADD CONSTRAINT `fk_folios_tblTipoPrioridad` FOREIGN KEY (`Prioridad`) REFERENCES `prioridad` (`Id_Prioridad`) ON DELETE NO ACTION ON UPDATE CASCADE,
ADD CONSTRAINT `fk_folios_ubicacion_archivofisico_ubicacionFisica` FOREIGN KEY (`UbicacionFisica`) REFERENCES `ubicacion_archivofisico` (`Id_UbicacionArchivoFisico`) ON UPDATE CASCADE,
ADD CONSTRAINT `fk_folios_unidad_academica_unidadAcademica` FOREIGN KEY (`UnidadAcademica`) REFERENCES `unidad_academica` (`Id_UnidadAcademica`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `grupo_o_comite_has_empleado`
--
ALTER TABLE `grupo_o_comite_has_empleado`
ADD CONSTRAINT `fk_Grupo_o_comite_has_Empleado_Empleado1` FOREIGN KEY (`No_Empleado`) REFERENCES `empleado` (`No_Empleado`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_Grupo_o_comite_has_Empleado_Grupo_o_comite1` FOREIGN KEY (`ID_Grupo_o_comite`) REFERENCES `grupo_o_comite` (`ID_Grupo_o_comite`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `idioma_has_persona`
--
ALTER TABLE `idioma_has_persona`
ADD CONSTRAINT `fk_Idioma_has_Persona_Idioma` FOREIGN KEY (`ID_Idioma`) REFERENCES `idioma` (`ID_Idioma`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_Idioma_has_Persona_Persona1` FOREIGN KEY (`N_identidad`) REFERENCES `persona` (`N_identidad`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `indicadores`
--
ALTER TABLE `indicadores`
ADD CONSTRAINT `indicadores_ibfk_1` FOREIGN KEY (`id_ObjetivosInsitucionales`) REFERENCES `objetivos_institucionales` (`id_Objetivo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `notificaciones_folios`
--
ALTER TABLE `notificaciones_folios`
ADD CONSTRAINT `fk_notificaciones_folios_folios` FOREIGN KEY (`NroFolio`) REFERENCES `folios` (`NroFolio`) ON UPDATE CASCADE,
ADD CONSTRAINT `fk_usuario_notificaciones` FOREIGN KEY (`IdEmisor`) REFERENCES `usuario` (`id_Usuario`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `objetivos_institucionales`
--
ALTER TABLE `objetivos_institucionales`
ADD CONSTRAINT `objetivos_institucionales_ibfk_2` FOREIGN KEY (`id_Poa`) REFERENCES `poa` (`id_Poa`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `objetivos_institucionales_ibfk_3` FOREIGN KEY (`id_Area`) REFERENCES `area` (`id_Area`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `permisos`
--
ALTER TABLE `permisos`
ADD CONSTRAINT `fk_departamento` FOREIGN KEY (`id_departamento`) REFERENCES `departamento_laboral` (`Id_departamento_laboral`),
ADD CONSTRAINT `fk_edificio_registro` FOREIGN KEY (`id_Edificio_Registro`) REFERENCES `edificios` (`Edificio_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_empleado` FOREIGN KEY (`No_Empleado`) REFERENCES `empleado` (`No_Empleado`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_motivo` FOREIGN KEY (`id_motivo`) REFERENCES `motivos` (`Motivo_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_revisado` FOREIGN KEY (`revisado_por`) REFERENCES `usuario` (`No_Empleado`),
ADD CONSTRAINT `fk_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_Usuario`);

--
-- Filtros para la tabla `prioridad_folio`
--
ALTER TABLE `prioridad_folio`
ADD CONSTRAINT `fk_prioridad_folio_folios` FOREIGN KEY (`IdFolio`) REFERENCES `folios` (`NroFolio`) ON UPDATE CASCADE,
ADD CONSTRAINT `fk_prioridad_folio_prioridad` FOREIGN KEY (`Id_Prioridad`) REFERENCES `prioridad` (`Id_Prioridad`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `responsables_por_actividad`
--
ALTER TABLE `responsables_por_actividad`
ADD CONSTRAINT `responsables_por_actividad_ibfk_3` FOREIGN KEY (`id_Actividad`) REFERENCES `actividades` (`id_actividad`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `responsables_por_actividad_ibfk_4` FOREIGN KEY (`id_Responsable`) REFERENCES `grupo_o_comite` (`ID_Grupo_o_comite`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `seguimiento`
--
ALTER TABLE `seguimiento`
ADD CONSTRAINT `fk_seguimiento_folios` FOREIGN KEY (`NroFolio`) REFERENCES `folios` (`NroFolio`) ON UPDATE CASCADE,
ADD CONSTRAINT `fk_seguimiento_usuarioAsignado` FOREIGN KEY (`UsuarioAsignado`) REFERENCES `usuario` (`id_Usuario`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `seguimiento_historico`
--
ALTER TABLE `seguimiento_historico`
ADD CONSTRAINT `fk_seguimiento_historico_seguimiento1` FOREIGN KEY (`Id_Seguimiento`) REFERENCES `seguimiento` (`Id_Seguimiento`) ON UPDATE CASCADE,
ADD CONSTRAINT `fk_seguimiento_historico_tblEstdoSeguimiento` FOREIGN KEY (`Id_Estado_Seguimiento`) REFERENCES `estado_seguimiento` (`Id_Estado_Seguimiento`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `sub_actividad`
--
ALTER TABLE `sub_actividad`
ADD CONSTRAINT `sub_actividad_ibfk_3` FOREIGN KEY (`idActividad`) REFERENCES `actividades` (`id_actividad`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `sub_actividad_ibfk_4` FOREIGN KEY (`id_Encargado`) REFERENCES `empleado` (`No_Empleado`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `sub_actividades_realizadas`
--
ALTER TABLE `sub_actividades_realizadas`
ADD CONSTRAINT `sub_actividades_realizadas_ibfk_2` FOREIGN KEY (`id_SubActividad`) REFERENCES `sub_actividad` (`id_sub_Actividad`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `telefono`
--
ALTER TABLE `telefono`
ADD CONSTRAINT `fk_Telefono_Persona1` FOREIGN KEY (`N_identidad`) REFERENCES `persona` (`N_identidad`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `universidad`
--
ALTER TABLE `universidad`
ADD CONSTRAINT `fk_universidad_pais` FOREIGN KEY (`Id_pais`) REFERENCES `pais` (`Id_pais`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
ADD CONSTRAINT `fk_usuario_empleado` FOREIGN KEY (`No_Empleado`) REFERENCES `empleado` (`No_Empleado`) ON UPDATE CASCADE,
ADD CONSTRAINT `fk_usuarios_roles` FOREIGN KEY (`Id_Rol`) REFERENCES `roles` (`Id_Rol`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario_alertado`
--
ALTER TABLE `usuario_alertado`
ADD CONSTRAINT `fk_usuario_alertado_alerta` FOREIGN KEY (`Id_Usuario`) REFERENCES `usuario` (`id_Usuario`),
ADD CONSTRAINT `fk_usuario_alertado_usuario` FOREIGN KEY (`Id_Alerta`) REFERENCES `alerta` (`Id_Alerta`);

--
-- Filtros para la tabla `usuario_notificado`
--
ALTER TABLE `usuario_notificado`
ADD CONSTRAINT `fk_usuario_notificado_notificaciones_folios` FOREIGN KEY (`Id_Notificacion`) REFERENCES `notificaciones_folios` (`Id_Notificacion`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_usuario_notificado_usuario` FOREIGN KEY (`Id_Usuario`) REFERENCES `usuario` (`id_Usuario`);

DELIMITER $$
--
-- Eventos
--
CREATE DEFINER=`root`@`localhost` EVENT `crear_alertas_diarias` ON SCHEDULE EVERY 1 DAY STARTS '2015-03-14 20:32:06' ON COMPLETION NOT PRESERVE ENABLE COMMENT 'Crea las alertas que se generan por la no atencion a el seguimie' DO BEGIN
	      DECLARE v_finished INTEGER DEFAULT 0;
		  DECLARE numFolio varchar(25) DEFAULT "";
		  DECLARE seguimiento INTEGER DEFAULT 0;
		  DECLARE fechaFin DATE;
 
          -- declare cursor 
		  DEClARE folio_cursor CURSOR FOR
          SELECT NroFolio FROM folios;
 
          -- declare NOT FOUND handler
          DECLARE CONTINUE HANDLER
          FOR NOT FOUND SET v_finished = 1;
 
		  OPEN folio_cursor ;
		  
			folios_loop: LOOP
 
                FETCH folio_cursor INTO numFolio;
				
                IF v_finished = 1 THEN
					LEAVE folios_loop;
                END IF;
 
                SET fechaFin = (SELECT FechaFinal FROM seguimiento WHERE NroFolio = numFolio);
				SET seguimiento = (SELECT Id_Seguimiento FROM seguimiento WHERE NroFolio = numFolio);
				
                IF fechaFin IS NULL THEN
					CALL sp_check_seguimiento(numFolio,seguimiento);
				END IF;
				
			END LOOP folios_loop;
 
          CLOSE folio_cursor ;
      END$$

DELIMITER ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
