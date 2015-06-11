
/* Drop Tables */

DROP TABLE IF EXISTS track.admision;
DROP TABLE IF EXISTS track.clientes;
DROP TABLE IF EXISTS track.receptor;
DROP TABLE IF EXISTS track.contacto;
DROP TABLE IF EXISTS track.maestro;
DROP TABLE IF EXISTS track.ruta_entrega;
DROP TABLE IF EXISTS track.sedes;



/* Drop Sequences */

DROP SEQUENCE IF EXISTS track.admision_id_admision_seq;
DROP SEQUENCE IF EXISTS track.clientes_id_cliente_seq;
DROP SEQUENCE IF EXISTS track.contacto_id_contacto_seq;
DROP SEQUENCE IF EXISTS track.maestro_id_maestro_seq;
DROP SEQUENCE IF EXISTS track.receptor_id_receptor_seq;
DROP SEQUENCE IF EXISTS track.ruta_entrega_id_rutae_seq;
DROP SEQUENCE IF EXISTS track.sedes_id_sede_seq;




/* Create Tables */

CREATE TABLE track.admision
(
	-- ID DE LA ADMISIÓN 
	id_admision serial NOT NULL,
	-- PESO DEL PAQUETE
	peso_admision varchar(100) NOT NULL,
	-- PRECIO DE LA ADMISION DEPENDE DEL PESO DEL PAQUETE
	-- 
	precio_admision varchar NOT NULL,
	-- DIMENSIÓN DE LA ADMISIÓN
	dimension_admision varchar NOT NULL,
	-- PAGO A RECEPCIÓN
	pago_recepcion boolean,
	-- FECHA ENTREGA DE LA ADMISIÓN
	fecha_entrega time with time zone,

	fksede_destino int,
	-- BOLEANO QUE IDENTICA SI EL CAMPO ESTA ACTIVO
	es_activo boolean,
	-- FORANEA DE LA TABLA MAESTRO
	fk_estatus int,
	-- FECHA DE CREACIÓN
	create_date time with time zone,
	-- IDENTIFICADOR DEL ID DEL USUARIO QUE MODIFICO EL REGISTRO
	modified_by int,
	-- IDENTIFICADOR DE LAS CEDES
	id_sede int NOT NULL,
	-- ID DEL CLIENTE
	id_cliente int NOT NULL,
	id_rutae int NOT NULL,
	CONSTRAINT admision_pkey PRIMARY KEY (id_admision)
) WITHOUT OIDS;

/* ----------  Nueva tabla  Envio  --------- */

CREATE TABLE track.envio
(
 id_envio 	        serial NOT NULL, 
 tipo_envio         int NOT NULL,
 cant_articulo      int NOT NULL,
 codigo_envio       varchar(20),
 create_date time with time zone,
	-- FECHA MODIFICACIÓN Envio
 modified_date time with time zone,
	-- ID DEL Usuario 
	CONSTRAINT envio_pkey PRIMARY KEY (id_envio)
) WITHOUT OIDS;

CREATE TABLE track.envio_paquete
(
 id_paquete         int    NOT NULL,	
 id_envio           int    NOT NULL
);

CREATE TABLE track.paquete
(
 id_paquete         serial NOT NULL,	
 peso_envio         int    NOT NULL,	
 dimension_envio    varchar(10) NOT NULL
);

/* ----------------------------------------- */
CREATE TABLE track.clientes
(
	-- ID DEL CLIENTE
	id_cliente serial NOT NULL,
	-- NOMBRE DEL CLIENTE
	nb_cliente varchar(100),
	-- APELLIDO DEL CLIENTE
	apellido_cliente varchar(100),
	-- CEDULA DEL CLIENTE
	cedula_cliente int,
	-- ESTATUS CLIENTE
	es_activo boolean,
	-- FECHA CREACIÓN CLIENTE
	create_date time with time zone,
	-- FECHA MODIFICACIÓN CLIENTE
	modified_date time with time zone,
	-- ID DEL CONTACTO
	id_contacto int NOT NULL,
	CONSTRAINT clientes_pkey PRIMARY KEY (id_cliente)
) WITHOUT OIDS;


CREATE TABLE track.contacto
(
	-- ID DEL CONTACTO
	id_contacto serial NOT NULL,
	-- CONTACTO: REDES SOCIALES, TELEFONO, CORREO
	contacto text,
	-- FECHA CREACIÓN
	create_date time with time zone,
	-- MODIFICADO POR
	modified_by int,
	-- ESTATUS DEL REGISTRO
	fk_estatus int,
	CONSTRAINT contacto_pkey PRIMARY KEY (id_contacto)
) WITHOUT OIDS;


CREATE TABLE track.maestro
(
	-- ID DEL MAESTRO
	id_maestro serial NOT NULL,
	-- DESCRIPCIÓN DE MAESTRO
	descripcion varchar(100),
	-- PADRE QUE IDENTICA EL ID DE CADA ELEMENTO
	padre int,
	-- HIJO A EL CUAL PERTENECE EL REGISTRO
	hijo int,
	CONSTRAINT maestro_pkey PRIMARY KEY (id_maestro)
) WITHOUT OIDS;


CREATE TABLE track.receptor
(
	id_receptor serial NOT NULL,
	nb_cliente varchar(100),
	apellido_cliente varchar(100),
	direccion_receptor text,
	es_activo boolean,
	create_date time with time zone,
	modified_date time with time zone,
	-- ID DEL CONTACTO
	id_contacto int NOT NULL,
	CONSTRAINT receptor_pkey PRIMARY KEY (id_receptor)
) WITHOUT OIDS;


CREATE TABLE track.ruta_entrega
(
	id_rutae serial NOT NULL,
	fksede_salida int,
	fecha_salida time with time zone,
	fksede_llegada int,
	fecha_llegada time with time zone,
	id_fkestatus int,
	create_date time with time zone,
	modified_date time with time zone,
	CONSTRAINT ruta_entrega_pkey PRIMARY KEY (id_rutae)
) WITHOUT OIDS;


CREATE TABLE track.sedes
(
	-- IDENTIFICADOR DE LAS CEDES
	id_sede serial NOT NULL,
	-- NOMBRE DE LA CEDE
	nb_sede varchar(150) NOT NULL,
	-- DIRECCIÓN DE LA CEDE
	direccion_sede text NOT NULL,
	-- CLAVE FOREANEA DE LA TABLA ESTADO
	-- 
	fk_estado int NOT NULL,
	fk_municipio int NOT NULL,
	fk_parroquia int NOT NULL,
	-- ESTATUS DE LA SEDE. PUEDE SER
	--      --ACTIVO
	--      --INACTIVO
	-- ESTA RELACIÓN PROVIENE DE MAESTRO
	fk_estatus int NOT NULL,
	-- FECHA DE CREACIÓN DELREGISTRO
	create_date timestamp with time zone DEFAULT now() NOT NULL,
	-- USUARIO QUE REALIZO LA MODIFICACIÓN EN EL REGISTRO
	modified_by int,
	-- IDENTICADOR SI EL REGISTRO ESTA ACTIVO
	es_activo boolean,
	CONSTRAINT sedes_pkey PRIMARY KEY (id_sede)
) WITHOUT OIDS;



/* Create Foreign Keys */

ALTER TABLE track.admision
	ADD FOREIGN KEY (id_cliente)
	REFERENCES track.clientes (id_cliente)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE track.clientes
	ADD FOREIGN KEY (id_contacto)
	REFERENCES track.contacto (id_contacto)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE track.receptor
	ADD FOREIGN KEY (id_contacto)
	REFERENCES track.contacto (id_contacto)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE track.admision
	ADD FOREIGN KEY (id_rutae)
	REFERENCES track.ruta_entrega (id_rutae)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;


ALTER TABLE track.admision
	ADD FOREIGN KEY (id_sede)
	REFERENCES track.sedes (id_sede)
	ON UPDATE RESTRICT
	ON DELETE RESTRICT
;



/* Comments */

COMMENT ON COLUMN track.admision.id_admision IS 'ID DE LA ADMISIÓN ';
COMMENT ON COLUMN track.admision.peso_admision IS 'PESO DEL PAQUETE';
COMMENT ON COLUMN track.admision.precio_admision IS 'PRECIO DE LA ADMISION DEPENDE DEL PESO DEL PAQUETE
';
COMMENT ON COLUMN track.admision.dimension_admision IS 'DIMENSIÓN DE LA ADMISIÓN';
COMMENT ON COLUMN track.admision.pago_recepcion IS 'PAGO A RECEPCIÓN';
COMMENT ON COLUMN track.admision.fecha_entrega IS 'FECHA ENTREGA DE LA ADMISIÓN';
COMMENT ON COLUMN track.admision.es_activo IS 'BOLEANO QUE IDENTICA SI EL CAMPO ESTA ACTIVO';
COMMENT ON COLUMN track.admision.fk_estatus IS 'FORANEA DE LA TABLA MAESTRO';
COMMENT ON COLUMN track.admision.create_date IS 'FECHA DE CREACIÓN';
COMMENT ON COLUMN track.admision.modified_by IS 'IDENTIFICADOR DEL ID DEL USUARIO QUE MODIFICO EL REGISTRO';
COMMENT ON COLUMN track.admision.id_sede IS 'IDENTIFICADOR DE LAS CEDES';
COMMENT ON COLUMN track.admision.id_cliente IS 'ID DEL CLIENTE';
COMMENT ON COLUMN track.clientes.id_cliente IS 'ID DEL CLIENTE';
COMMENT ON COLUMN track.clientes.nb_cliente IS 'NOMBRE DEL CLIENTE';
COMMENT ON COLUMN track.clientes.apellido_cliente IS 'APELLIDO DEL CLIENTE';
COMMENT ON COLUMN track.clientes.cedula_cliente IS 'CEDULA DEL CLIENTE';
COMMENT ON COLUMN track.clientes.es_activo IS 'ESTATUS CLIENTE';
COMMENT ON COLUMN track.clientes.create_date IS 'FECHA CREACIÓN CLIENTE';
COMMENT ON COLUMN track.clientes.modified_date IS 'FECHA MODIFICACIÓN CLIENTE';
COMMENT ON COLUMN track.clientes.id_contacto IS 'ID DEL CONTACTO';
COMMENT ON COLUMN track.contacto.id_contacto IS 'ID DEL CONTACTO';
COMMENT ON COLUMN track.contacto.contacto IS 'CONTACTO: REDES SOCIALES, TELEFONO, CORREO';
COMMENT ON COLUMN track.contacto.create_date IS 'FECHA CREACIÓN';
COMMENT ON COLUMN track.contacto.modified_by IS 'MODIFICADO POR';
COMMENT ON COLUMN track.contacto.fk_estatus IS 'ESTATUS DEL REGISTRO';
COMMENT ON COLUMN track.maestro.id_maestro IS 'ID DEL MAESTRO';
COMMENT ON COLUMN track.maestro.descripcion IS 'DESCRIPCIÓN DE MAESTRO';
COMMENT ON COLUMN track.maestro.padre IS 'PADRE QUE IDENTICA EL ID DE CADA ELEMENTO';
COMMENT ON COLUMN track.maestro.hijo IS 'HIJO A EL CUAL PERTENECE EL REGISTRO';
COMMENT ON COLUMN track.receptor.id_contacto IS 'ID DEL CONTACTO';
COMMENT ON COLUMN track.sedes.id_sede IS 'IDENTIFICADOR DE LAS CEDES';
COMMENT ON COLUMN track.sedes.nb_sede IS 'NOMBRE DE LA CEDE';
COMMENT ON COLUMN track.sedes.direccion_sede IS 'DIRECCIÓN DE LA CEDE';
COMMENT ON COLUMN track.sedes.fk_estado IS 'CLAVE FOREANEA DE LA TABLA ESTADO
';
COMMENT ON COLUMN track.sedes.fk_estatus IS 'ESTATUS DE LA SEDE. PUEDE SER
     --ACTIVO
     --INACTIVO
ESTA RELACIÓN PROVIENE DE MAESTRO';
COMMENT ON COLUMN track.sedes.create_date IS 'FECHA DE CREACIÓN DELREGISTRO';
COMMENT ON COLUMN track.sedes.modified_by IS 'USUARIO QUE REALIZO LA MODIFICACIÓN EN EL REGISTRO';
COMMENT ON COLUMN track.sedes.es_activo IS 'IDENTICADOR SI EL REGISTRO ESTA ACTIVO';



/*  ------------------  Cruge  ----------------------- */


CREATE TABLE cruge_system (
  idsystem serial,
  name VARCHAR(45) NULL ,
  largename VARCHAR(45) NULL ,
  sessionmaxdurationmins integer NULL DEFAULT 30 ,
  sessionmaxsameipconnections integer NULL DEFAULT 10 ,
  sessionreusesessions integer NULL DEFAULT 1,
  sessionmaxsessionsperday integer NULL DEFAULT -1 ,
  sessionmaxsessionsperuser integer NULL DEFAULT -1 ,
  systemnonewsessions integer NULL DEFAULT 0,
  systemdown integer NULL DEFAULT 0 ,
  registerusingcaptcha integer NULL DEFAULT 0 ,
  registerusingterms integer NULL DEFAULT 0 ,
  terms varchar(4096) ,
  registerusingactivation integer NULL DEFAULT 1 ,
  defaultroleforregistration VARCHAR(64) NULL ,
  registerusingtermslabel VARCHAR(100) NULL ,
  registrationonlogin integer NULL DEFAULT 1 ,
  PRIMARY KEY (idsystem) )
;
delete from cruge_system;
INSERT INTO cruge_system (idsystem,name,largename,sessionmaxdurationmins,sessionmaxsameipconnections,sessionreusesessions,sessionmaxsessionsperday,sessionmaxsessionsperuser,systemnonewsessions,systemdown,registerusingcaptcha,registerusingterms,terms,registerusingactivation,defaultroleforregistration,registerusingtermslabel,registrationonlogin) VALUES
 (1,'default',NULL,30,10,1,-1,-1,0,0,0,0,'',0,'','',1);

CREATE TABLE cruge_session (
  idsession serial,
  iduser INT NOT NULL ,
  created BIGINT NULL ,
  expire bigint NULL ,
  status integer NULL DEFAULT 0 ,
  ipaddress VARCHAR(45) NULL ,
  usagecount integer NULL DEFAULT 0 ,
  lastusage bigint NULL ,
  logoutdate bigint NULL ,
  ipaddressout VARCHAR(45) NULL ,
  PRIMARY KEY (idsession)
  )
;

CREATE  TABLE cruge_user (
  iduser  serial,
  regdate bigint NULL ,
  actdate bigint NULL ,
  logondate bigint NULL ,
  username VARCHAR(64) NULL ,
  email VARCHAR(45) NULL ,
  password VARCHAR(64) NULL,
  authkey VARCHAR(100) NULL,
  state integer NULL DEFAULT 0 ,
  totalsessioncounter integer NULL DEFAULT 0 ,
  currentsessioncounter integer NULL DEFAULT 0 ,
  PRIMARY KEY (iduser)
  )
;

delete from cruge_user;
insert into cruge_user(username, email, password, state) values
 ('admin', 'admin@tucorreo.com','admin',1)
 ,('invitado', 'invitado','nopassword',1)
;


CREATE  TABLE cruge_field (
  idfield  serial,
  fieldname VARCHAR(20) NOT NULL ,
  longname VARCHAR(50) NULL ,
  position integer NULL DEFAULT 0 ,
  required integer NULL DEFAULT 0 ,
  fieldtype integer NULL DEFAULT 0 ,
  fieldsize integer NULL DEFAULT 20 ,
  maxlength integer NULL DEFAULT 45 ,
  showinreports integer NULL DEFAULT 0 ,
  useregexp VARCHAR(512) NULL ,
  useregexpmsg VARCHAR(512) NULL ,
  predetvalue varchar(4096),
  PRIMARY KEY (idfield)
  );

CREATE  TABLE cruge_fieldvalue (
  idfieldvalue  serial,
  iduser INT NOT NULL ,
  idfield INT NOT NULL ,
  value varchar(4096),
  PRIMARY KEY (idfieldvalue) ,
  CONSTRAINT fk_cruge_fieldvalue_cruge_user1
    FOREIGN KEY (iduser )
    REFERENCES cruge_user (iduser )
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT fk_cruge_fieldvalue_cruge_field1
    FOREIGN KEY (idfield )
    REFERENCES cruge_field (idfield )
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
 ;

CREATE TABLE cruge_authitem (
  name VARCHAR(64) NOT NULL ,
  type integer NOT NULL ,
  description TEXT NULL DEFAULT NULL ,
  bizrule TEXT NULL DEFAULT NULL ,
  data TEXT NULL DEFAULT NULL ,
  PRIMARY KEY (name) )
;

CREATE TABLE cruge_authassignment (
  userid INT NOT NULL ,
  bizrule TEXT NULL DEFAULT NULL ,
  data TEXT NULL DEFAULT NULL ,
  itemname VARCHAR(64) NOT NULL ,
  PRIMARY KEY (userid, itemname) ,
  CONSTRAINT fk_cruge_authassignment_cruge_authitem1
    FOREIGN KEY (itemname )
    REFERENCES cruge_authitem (name )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT fk_cruge_authassignment_user
    FOREIGN KEY (userid )
    REFERENCES cruge_user (iduser )
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
;


CREATE TABLE cruge_authitemchild (
  parent VARCHAR(64) NOT NULL ,
  child VARCHAR(64) NOT NULL ,
  PRIMARY KEY (parent, child) ,
  CONSTRAINT crugeauthitemchild_ibfk_1
    FOREIGN KEY (parent )
    REFERENCES cruge_authitem (name )
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT crugeauthitemchild_ibfk_2
    FOREIGN KEY (child )
    REFERENCES cruge_authitem (name )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
;

/* ----------------------------------------------------- */