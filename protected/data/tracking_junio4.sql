--
-- PostgreSQL database dump
--

-- Dumped from database version 9.1.16
-- Dumped by pg_dump version 9.1.15
-- Started on 2015-06-04 08:13:39 VET

SET statement_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- TOC entry 6 (class 2615 OID 136734)
-- Name: track; Type: SCHEMA; Schema: -; Owner: postgres
--

CREATE SCHEMA track;


ALTER SCHEMA track OWNER TO postgres;

--
-- TOC entry 221 (class 3079 OID 11645)
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- TOC entry 2249 (class 0 OID 0)
-- Dependencies: 221
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 162 (class 1259 OID 136735)
-- Dependencies: 7
-- Name: cruge_authassignment; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE cruge_authassignment (
    userid integer NOT NULL,
    bizrule text,
    data text,
    itemname character varying(64) NOT NULL
);


ALTER TABLE public.cruge_authassignment OWNER TO postgres;

--
-- TOC entry 163 (class 1259 OID 136741)
-- Dependencies: 7
-- Name: cruge_authitem; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE cruge_authitem (
    name character varying(64) NOT NULL,
    type integer NOT NULL,
    description text,
    bizrule text,
    data text
);


ALTER TABLE public.cruge_authitem OWNER TO postgres;

--
-- TOC entry 164 (class 1259 OID 136747)
-- Dependencies: 7
-- Name: cruge_authitemchild; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE cruge_authitemchild (
    parent character varying(64) NOT NULL,
    child character varying(64) NOT NULL
);


ALTER TABLE public.cruge_authitemchild OWNER TO postgres;

--
-- TOC entry 165 (class 1259 OID 136750)
-- Dependencies: 1944 1945 1946 1947 1948 1949 7
-- Name: cruge_field; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE cruge_field (
    idfield integer NOT NULL,
    fieldname character varying(20) NOT NULL,
    longname character varying(50),
    "position" integer DEFAULT 0,
    required integer DEFAULT 0,
    fieldtype integer DEFAULT 0,
    fieldsize integer DEFAULT 20,
    maxlength integer DEFAULT 45,
    showinreports integer DEFAULT 0,
    useregexp character varying(512),
    useregexpmsg character varying(512),
    predetvalue character varying(4096)
);


ALTER TABLE public.cruge_field OWNER TO postgres;

--
-- TOC entry 166 (class 1259 OID 136762)
-- Dependencies: 7 165
-- Name: cruge_field_idfield_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE cruge_field_idfield_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.cruge_field_idfield_seq OWNER TO postgres;

--
-- TOC entry 2250 (class 0 OID 0)
-- Dependencies: 166
-- Name: cruge_field_idfield_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE cruge_field_idfield_seq OWNED BY cruge_field.idfield;


--
-- TOC entry 167 (class 1259 OID 136764)
-- Dependencies: 7
-- Name: cruge_fieldvalue; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE cruge_fieldvalue (
    idfieldvalue integer NOT NULL,
    iduser integer NOT NULL,
    idfield integer NOT NULL,
    value character varying(4096)
);


ALTER TABLE public.cruge_fieldvalue OWNER TO postgres;

--
-- TOC entry 168 (class 1259 OID 136770)
-- Dependencies: 7 167
-- Name: cruge_fieldvalue_idfieldvalue_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE cruge_fieldvalue_idfieldvalue_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.cruge_fieldvalue_idfieldvalue_seq OWNER TO postgres;

--
-- TOC entry 2251 (class 0 OID 0)
-- Dependencies: 168
-- Name: cruge_fieldvalue_idfieldvalue_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE cruge_fieldvalue_idfieldvalue_seq OWNED BY cruge_fieldvalue.idfieldvalue;


--
-- TOC entry 169 (class 1259 OID 136772)
-- Dependencies: 1952 1953 7
-- Name: cruge_session; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE cruge_session (
    idsession integer NOT NULL,
    iduser integer NOT NULL,
    created bigint,
    expire bigint,
    status integer DEFAULT 0,
    ipaddress character varying(45),
    usagecount integer DEFAULT 0,
    lastusage bigint,
    logoutdate bigint,
    ipaddressout character varying(45)
);


ALTER TABLE public.cruge_session OWNER TO postgres;

--
-- TOC entry 170 (class 1259 OID 136777)
-- Dependencies: 7 169
-- Name: cruge_session_idsession_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE cruge_session_idsession_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.cruge_session_idsession_seq OWNER TO postgres;

--
-- TOC entry 2252 (class 0 OID 0)
-- Dependencies: 170
-- Name: cruge_session_idsession_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE cruge_session_idsession_seq OWNED BY cruge_session.idsession;


--
-- TOC entry 171 (class 1259 OID 136779)
-- Dependencies: 1955 1956 1957 1958 1959 1960 1961 1962 1963 1964 1965 7
-- Name: cruge_system; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE cruge_system (
    idsystem integer NOT NULL,
    name character varying(45),
    largename character varying(45),
    sessionmaxdurationmins integer DEFAULT 30,
    sessionmaxsameipconnections integer DEFAULT 10,
    sessionreusesessions integer DEFAULT 1,
    sessionmaxsessionsperday integer DEFAULT (-1),
    sessionmaxsessionsperuser integer DEFAULT (-1),
    systemnonewsessions integer DEFAULT 0,
    systemdown integer DEFAULT 0,
    registerusingcaptcha integer DEFAULT 0,
    registerusingterms integer DEFAULT 0,
    terms character varying(4096),
    registerusingactivation integer DEFAULT 1,
    defaultroleforregistration character varying(64),
    registerusingtermslabel character varying(100),
    registrationonlogin integer DEFAULT 1
);


ALTER TABLE public.cruge_system OWNER TO postgres;

--
-- TOC entry 172 (class 1259 OID 136796)
-- Dependencies: 7 171
-- Name: cruge_system_idsystem_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE cruge_system_idsystem_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.cruge_system_idsystem_seq OWNER TO postgres;

--
-- TOC entry 2253 (class 0 OID 0)
-- Dependencies: 172
-- Name: cruge_system_idsystem_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE cruge_system_idsystem_seq OWNED BY cruge_system.idsystem;


--
-- TOC entry 173 (class 1259 OID 136798)
-- Dependencies: 1967 1968 1969 7
-- Name: cruge_user; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE cruge_user (
    iduser integer NOT NULL,
    regdate bigint,
    actdate bigint,
    logondate bigint,
    username character varying(64),
    email character varying(45),
    password character varying(64),
    authkey character varying(100),
    state integer DEFAULT 0,
    totalsessioncounter integer DEFAULT 0,
    currentsessioncounter integer DEFAULT 0
);


ALTER TABLE public.cruge_user OWNER TO postgres;

--
-- TOC entry 174 (class 1259 OID 136804)
-- Dependencies: 173 7
-- Name: cruge_user_iduser_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE cruge_user_iduser_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.cruge_user_iduser_seq OWNER TO postgres;

--
-- TOC entry 2254 (class 0 OID 0)
-- Dependencies: 174
-- Name: cruge_user_iduser_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE cruge_user_iduser_seq OWNED BY cruge_user.iduser;


SET search_path = track, pg_catalog;

--
-- TOC entry 175 (class 1259 OID 136806)
-- Dependencies: 6
-- Name: apertura; Type: TABLE; Schema: track; Owner: postgres; Tablespace: 
--

CREATE TABLE apertura (
    id_apertura integer NOT NULL,
    fk_despacho integer NOT NULL,
    fk_motivo integer NOT NULL,
    status integer
);


ALTER TABLE track.apertura OWNER TO postgres;

--
-- TOC entry 176 (class 1259 OID 136809)
-- Dependencies: 175 6
-- Name: Apertura_id_apertura_seq; Type: SEQUENCE; Schema: track; Owner: postgres
--

CREATE SEQUENCE "Apertura_id_apertura_seq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE track."Apertura_id_apertura_seq" OWNER TO postgres;

--
-- TOC entry 2255 (class 0 OID 0)
-- Dependencies: 176
-- Name: Apertura_id_apertura_seq; Type: SEQUENCE OWNED BY; Schema: track; Owner: postgres
--

ALTER SEQUENCE "Apertura_id_apertura_seq" OWNED BY apertura.id_apertura;


--
-- TOC entry 177 (class 1259 OID 136811)
-- Dependencies: 6
-- Name: admision; Type: TABLE; Schema: track; Owner: postgres; Tablespace: 
--

CREATE TABLE admision (
    id_admision integer NOT NULL,
    peso_admision character varying(100) NOT NULL,
    precio_admision character varying NOT NULL,
    dimension_admision character varying,
    pago_recepcion boolean,
    es_activo boolean,
    fk_estatus integer,
    create_date time with time zone,
    modified_by integer,
    id_sede integer NOT NULL,
    id_cliente integer NOT NULL,
    empaque integer,
    articulo integer,
    tipo_envio integer,
    fk_receptor integer NOT NULL,
    cod_paquete character varying(18),
    estado character varying(20),
    fecha_entrega date
);


ALTER TABLE track.admision OWNER TO postgres;

--
-- TOC entry 2256 (class 0 OID 0)
-- Dependencies: 177
-- Name: COLUMN admision.id_admision; Type: COMMENT; Schema: track; Owner: postgres
--

COMMENT ON COLUMN admision.id_admision IS 'ID DE LA ADMISIÓN ';


--
-- TOC entry 2257 (class 0 OID 0)
-- Dependencies: 177
-- Name: COLUMN admision.peso_admision; Type: COMMENT; Schema: track; Owner: postgres
--

COMMENT ON COLUMN admision.peso_admision IS 'PESO DEL PAQUETE';


--
-- TOC entry 2258 (class 0 OID 0)
-- Dependencies: 177
-- Name: COLUMN admision.precio_admision; Type: COMMENT; Schema: track; Owner: postgres
--

COMMENT ON COLUMN admision.precio_admision IS 'PRECIO DE LA ADMISION DEPENDE DEL PESO DEL PAQUETE
';


--
-- TOC entry 2259 (class 0 OID 0)
-- Dependencies: 177
-- Name: COLUMN admision.dimension_admision; Type: COMMENT; Schema: track; Owner: postgres
--

COMMENT ON COLUMN admision.dimension_admision IS 'DIMENSIÓN DE LA ADMISIÓN';


--
-- TOC entry 2260 (class 0 OID 0)
-- Dependencies: 177
-- Name: COLUMN admision.pago_recepcion; Type: COMMENT; Schema: track; Owner: postgres
--

COMMENT ON COLUMN admision.pago_recepcion IS 'PAGO A RECEPCIÓN';


--
-- TOC entry 2261 (class 0 OID 0)
-- Dependencies: 177
-- Name: COLUMN admision.es_activo; Type: COMMENT; Schema: track; Owner: postgres
--

COMMENT ON COLUMN admision.es_activo IS 'BOLEANO QUE IDENTICA SI EL CAMPO ESTA ACTIVO';


--
-- TOC entry 2262 (class 0 OID 0)
-- Dependencies: 177
-- Name: COLUMN admision.fk_estatus; Type: COMMENT; Schema: track; Owner: postgres
--

COMMENT ON COLUMN admision.fk_estatus IS 'FORANEA DE LA TABLA MAESTRO';


--
-- TOC entry 2263 (class 0 OID 0)
-- Dependencies: 177
-- Name: COLUMN admision.create_date; Type: COMMENT; Schema: track; Owner: postgres
--

COMMENT ON COLUMN admision.create_date IS 'FECHA DE CREACIÓN';


--
-- TOC entry 2264 (class 0 OID 0)
-- Dependencies: 177
-- Name: COLUMN admision.modified_by; Type: COMMENT; Schema: track; Owner: postgres
--

COMMENT ON COLUMN admision.modified_by IS 'IDENTIFICADOR DEL ID DEL USUARIO QUE MODIFICO EL REGISTRO';


--
-- TOC entry 2265 (class 0 OID 0)
-- Dependencies: 177
-- Name: COLUMN admision.id_sede; Type: COMMENT; Schema: track; Owner: postgres
--

COMMENT ON COLUMN admision.id_sede IS 'IDENTIFICADOR DE LAS CEDES';


--
-- TOC entry 2266 (class 0 OID 0)
-- Dependencies: 177
-- Name: COLUMN admision.id_cliente; Type: COMMENT; Schema: track; Owner: postgres
--

COMMENT ON COLUMN admision.id_cliente IS 'ID DEL CLIENTE';


--
-- TOC entry 178 (class 1259 OID 136817)
-- Dependencies: 6 177
-- Name: admision_id_admision_seq; Type: SEQUENCE; Schema: track; Owner: postgres
--

CREATE SEQUENCE admision_id_admision_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE track.admision_id_admision_seq OWNER TO postgres;

--
-- TOC entry 2267 (class 0 OID 0)
-- Dependencies: 178
-- Name: admision_id_admision_seq; Type: SEQUENCE OWNED BY; Schema: track; Owner: postgres
--

ALTER SEQUENCE admision_id_admision_seq OWNED BY admision.id_admision;


--
-- TOC entry 179 (class 1259 OID 136819)
-- Dependencies: 6
-- Name: bitacora_transito; Type: TABLE; Schema: track; Owner: postgres; Tablespace: 
--

CREATE TABLE bitacora_transito (
    id_transito integer NOT NULL,
    fksede_salida integer,
    fecha_salida time with time zone,
    fksede_llegada integer,
    fecha_llegada time with time zone,
    id_fkestatus integer,
    create_date time with time zone,
    modified_date time with time zone,
    peso_salida integer NOT NULL,
    peso_llegada integer,
    fk_despacho integer
);


ALTER TABLE track.bitacora_transito OWNER TO postgres;

--
-- TOC entry 180 (class 1259 OID 136822)
-- Dependencies: 6
-- Name: cliente_contacto; Type: TABLE; Schema: track; Owner: postgres; Tablespace: 
--

CREATE TABLE cliente_contacto (
    id_cliente integer NOT NULL,
    id_contacto integer NOT NULL
);


ALTER TABLE track.cliente_contacto OWNER TO postgres;

--
-- TOC entry 181 (class 1259 OID 136825)
-- Dependencies: 1974 6
-- Name: clientes; Type: TABLE; Schema: track; Owner: postgres; Tablespace: 
--

CREATE TABLE clientes (
    id_cliente integer NOT NULL,
    nb_cliente character varying(100),
    apellido_cliente character varying(100),
    cedula_cliente integer,
    es_activo boolean DEFAULT true,
    create_date time with time zone,
    modified_date time with time zone,
    id_contacto integer,
    nacionalidad integer,
    fk_created_by integer
);


ALTER TABLE track.clientes OWNER TO postgres;

--
-- TOC entry 2268 (class 0 OID 0)
-- Dependencies: 181
-- Name: COLUMN clientes.id_cliente; Type: COMMENT; Schema: track; Owner: postgres
--

COMMENT ON COLUMN clientes.id_cliente IS 'ID DEL CLIENTE';


--
-- TOC entry 2269 (class 0 OID 0)
-- Dependencies: 181
-- Name: COLUMN clientes.nb_cliente; Type: COMMENT; Schema: track; Owner: postgres
--

COMMENT ON COLUMN clientes.nb_cliente IS 'NOMBRE DEL CLIENTE';


--
-- TOC entry 2270 (class 0 OID 0)
-- Dependencies: 181
-- Name: COLUMN clientes.apellido_cliente; Type: COMMENT; Schema: track; Owner: postgres
--

COMMENT ON COLUMN clientes.apellido_cliente IS 'APELLIDO DEL CLIENTE';


--
-- TOC entry 2271 (class 0 OID 0)
-- Dependencies: 181
-- Name: COLUMN clientes.cedula_cliente; Type: COMMENT; Schema: track; Owner: postgres
--

COMMENT ON COLUMN clientes.cedula_cliente IS 'CEDULA DEL CLIENTE';


--
-- TOC entry 2272 (class 0 OID 0)
-- Dependencies: 181
-- Name: COLUMN clientes.es_activo; Type: COMMENT; Schema: track; Owner: postgres
--

COMMENT ON COLUMN clientes.es_activo IS 'ESTATUS CLIENTE';


--
-- TOC entry 2273 (class 0 OID 0)
-- Dependencies: 181
-- Name: COLUMN clientes.create_date; Type: COMMENT; Schema: track; Owner: postgres
--

COMMENT ON COLUMN clientes.create_date IS 'FECHA CREACIÓN CLIENTE';


--
-- TOC entry 2274 (class 0 OID 0)
-- Dependencies: 181
-- Name: COLUMN clientes.modified_date; Type: COMMENT; Schema: track; Owner: postgres
--

COMMENT ON COLUMN clientes.modified_date IS 'FECHA MODIFICACIÓN CLIENTE';


--
-- TOC entry 2275 (class 0 OID 0)
-- Dependencies: 181
-- Name: COLUMN clientes.id_contacto; Type: COMMENT; Schema: track; Owner: postgres
--

COMMENT ON COLUMN clientes.id_contacto IS 'ID DEL CONTACTO';


--
-- TOC entry 182 (class 1259 OID 136829)
-- Dependencies: 6 181
-- Name: clientes_id_cliente_seq; Type: SEQUENCE; Schema: track; Owner: postgres
--

CREATE SEQUENCE clientes_id_cliente_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE track.clientes_id_cliente_seq OWNER TO postgres;

--
-- TOC entry 2276 (class 0 OID 0)
-- Dependencies: 182
-- Name: clientes_id_cliente_seq; Type: SEQUENCE OWNED BY; Schema: track; Owner: postgres
--

ALTER SEQUENCE clientes_id_cliente_seq OWNED BY clientes.id_cliente;


--
-- TOC entry 205 (class 1259 OID 137059)
-- Dependencies: 6
-- Name: conductor; Type: TABLE; Schema: track; Owner: postgres; Tablespace: 
--

CREATE TABLE conductor (
    id_persona integer NOT NULL,
    nombre character varying(40),
    apellido character varying(40),
    nacionalidad integer,
    cedula integer,
    tipo_trab integer,
    licencia boolean,
    grado character(1),
    es_activo boolean
);


ALTER TABLE track.conductor OWNER TO postgres;

--
-- TOC entry 206 (class 1259 OID 137062)
-- Dependencies: 205 6
-- Name: conductor_id_persona_seq; Type: SEQUENCE; Schema: track; Owner: postgres
--

CREATE SEQUENCE conductor_id_persona_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE track.conductor_id_persona_seq OWNER TO postgres;

--
-- TOC entry 2277 (class 0 OID 0)
-- Dependencies: 206
-- Name: conductor_id_persona_seq; Type: SEQUENCE OWNED BY; Schema: track; Owner: postgres
--

ALTER SEQUENCE conductor_id_persona_seq OWNED BY conductor.id_persona;


--
-- TOC entry 183 (class 1259 OID 136831)
-- Dependencies: 6
-- Name: contacto; Type: TABLE; Schema: track; Owner: postgres; Tablespace: 
--

CREATE TABLE contacto (
    id_contacto integer NOT NULL,
    contacto text,
    create_date time with time zone,
    modified_by integer,
    fk_estatus integer,
    fk_created_by integer
);


ALTER TABLE track.contacto OWNER TO postgres;

--
-- TOC entry 2278 (class 0 OID 0)
-- Dependencies: 183
-- Name: COLUMN contacto.id_contacto; Type: COMMENT; Schema: track; Owner: postgres
--

COMMENT ON COLUMN contacto.id_contacto IS 'ID DEL CONTACTO';


--
-- TOC entry 2279 (class 0 OID 0)
-- Dependencies: 183
-- Name: COLUMN contacto.contacto; Type: COMMENT; Schema: track; Owner: postgres
--

COMMENT ON COLUMN contacto.contacto IS 'CONTACTO: REDES SOCIALES, TELEFONO, CORREO';


--
-- TOC entry 2280 (class 0 OID 0)
-- Dependencies: 183
-- Name: COLUMN contacto.create_date; Type: COMMENT; Schema: track; Owner: postgres
--

COMMENT ON COLUMN contacto.create_date IS 'FECHA CREACIÓN';


--
-- TOC entry 2281 (class 0 OID 0)
-- Dependencies: 183
-- Name: COLUMN contacto.modified_by; Type: COMMENT; Schema: track; Owner: postgres
--

COMMENT ON COLUMN contacto.modified_by IS 'MODIFICADO POR';


--
-- TOC entry 2282 (class 0 OID 0)
-- Dependencies: 183
-- Name: COLUMN contacto.fk_estatus; Type: COMMENT; Schema: track; Owner: postgres
--

COMMENT ON COLUMN contacto.fk_estatus IS 'ESTATUS DEL REGISTRO';


--
-- TOC entry 184 (class 1259 OID 136837)
-- Dependencies: 6 183
-- Name: contacto_id_contacto_seq; Type: SEQUENCE; Schema: track; Owner: postgres
--

CREATE SEQUENCE contacto_id_contacto_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE track.contacto_id_contacto_seq OWNER TO postgres;

--
-- TOC entry 2283 (class 0 OID 0)
-- Dependencies: 184
-- Name: contacto_id_contacto_seq; Type: SEQUENCE OWNED BY; Schema: track; Owner: postgres
--

ALTER SEQUENCE contacto_id_contacto_seq OWNED BY contacto.id_contacto;


--
-- TOC entry 185 (class 1259 OID 136839)
-- Dependencies: 6
-- Name: desp_envio; Type: TABLE; Schema: track; Owner: postgres; Tablespace: 
--

CREATE TABLE desp_envio (
    id_despacho integer NOT NULL,
    id_envio integer NOT NULL
);


ALTER TABLE track.desp_envio OWNER TO postgres;

--
-- TOC entry 186 (class 1259 OID 136842)
-- Dependencies: 6
-- Name: despacho; Type: TABLE; Schema: track; Owner: postgres; Tablespace: 
--

CREATE TABLE despacho (
    id_despacho integer NOT NULL,
    tipo_despacho integer,
    fk_transporte integer,
    fecha_despacho date,
    serial_precinto character varying(13)
);


ALTER TABLE track.despacho OWNER TO postgres;

--
-- TOC entry 187 (class 1259 OID 136845)
-- Dependencies: 6 186
-- Name: despacho_id_despacho_seq; Type: SEQUENCE; Schema: track; Owner: postgres
--

CREATE SEQUENCE despacho_id_despacho_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE track.despacho_id_despacho_seq OWNER TO postgres;

--
-- TOC entry 2284 (class 0 OID 0)
-- Dependencies: 187
-- Name: despacho_id_despacho_seq; Type: SEQUENCE OWNED BY; Schema: track; Owner: postgres
--

ALTER SEQUENCE despacho_id_despacho_seq OWNED BY despacho.id_despacho;


--
-- TOC entry 188 (class 1259 OID 136847)
-- Dependencies: 6
-- Name: envio; Type: TABLE; Schema: track; Owner: postgres; Tablespace: 
--

CREATE TABLE envio (
    id_envio integer NOT NULL,
    tipo_envio integer NOT NULL,
    cant_articulo integer NOT NULL,
    codigo_envio character varying(20),
    create_date time with time zone,
    modified_date time with time zone,
    num_saca character varying(10),
    peso_total integer
);


ALTER TABLE track.envio OWNER TO postgres;

--
-- TOC entry 189 (class 1259 OID 136850)
-- Dependencies: 188 6
-- Name: envio_id_envio_seq; Type: SEQUENCE; Schema: track; Owner: postgres
--

CREATE SEQUENCE envio_id_envio_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE track.envio_id_envio_seq OWNER TO postgres;

--
-- TOC entry 2285 (class 0 OID 0)
-- Dependencies: 189
-- Name: envio_id_envio_seq; Type: SEQUENCE OWNED BY; Schema: track; Owner: postgres
--

ALTER SEQUENCE envio_id_envio_seq OWNED BY envio.id_envio;


--
-- TOC entry 190 (class 1259 OID 136852)
-- Dependencies: 6
-- Name: envio_paquete; Type: TABLE; Schema: track; Owner: postgres; Tablespace: 
--

CREATE TABLE envio_paquete (
    id_admision integer NOT NULL,
    id_envio integer
);


ALTER TABLE track.envio_paquete OWNER TO postgres;

--
-- TOC entry 207 (class 1259 OID 137064)
-- Dependencies: 6
-- Name: gps; Type: TABLE; Schema: track; Owner: postgres; Tablespace: 
--

CREATE TABLE gps (
    id_gps integer NOT NULL,
    id_vehiculo integer,
    codigo character varying(15),
    modelo character varying(20),
    reporta boolean,
    imei character varying(15),
    sim_card character varying(15),
    fecha_instalacion date,
    linea character varying(12)
);


ALTER TABLE track.gps OWNER TO postgres;

--
-- TOC entry 208 (class 1259 OID 137067)
-- Dependencies: 6 207
-- Name: gps_id_gps_seq; Type: SEQUENCE; Schema: track; Owner: postgres
--

CREATE SEQUENCE gps_id_gps_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE track.gps_id_gps_seq OWNER TO postgres;

--
-- TOC entry 2286 (class 0 OID 0)
-- Dependencies: 208
-- Name: gps_id_gps_seq; Type: SEQUENCE OWNED BY; Schema: track; Owner: postgres
--

ALTER SEQUENCE gps_id_gps_seq OWNED BY gps.id_gps;


--
-- TOC entry 191 (class 1259 OID 136855)
-- Dependencies: 6
-- Name: maestro; Type: TABLE; Schema: track; Owner: postgres; Tablespace: 
--

CREATE TABLE maestro (
    id_maestro integer NOT NULL,
    descripcion character varying(250),
    padre integer,
    hijo integer
);


ALTER TABLE track.maestro OWNER TO postgres;

--
-- TOC entry 2287 (class 0 OID 0)
-- Dependencies: 191
-- Name: COLUMN maestro.id_maestro; Type: COMMENT; Schema: track; Owner: postgres
--

COMMENT ON COLUMN maestro.id_maestro IS 'ID DEL MAESTRO';


--
-- TOC entry 2288 (class 0 OID 0)
-- Dependencies: 191
-- Name: COLUMN maestro.descripcion; Type: COMMENT; Schema: track; Owner: postgres
--

COMMENT ON COLUMN maestro.descripcion IS 'DESCRIPCIÓN DE MAESTRO';


--
-- TOC entry 2289 (class 0 OID 0)
-- Dependencies: 191
-- Name: COLUMN maestro.padre; Type: COMMENT; Schema: track; Owner: postgres
--

COMMENT ON COLUMN maestro.padre IS 'PADRE QUE IDENTICA EL ID DE CADA ELEMENTO';


--
-- TOC entry 2290 (class 0 OID 0)
-- Dependencies: 191
-- Name: COLUMN maestro.hijo; Type: COMMENT; Schema: track; Owner: postgres
--

COMMENT ON COLUMN maestro.hijo IS 'HIJO A EL CUAL PERTENECE EL REGISTRO';


--
-- TOC entry 192 (class 1259 OID 136858)
-- Dependencies: 191 6
-- Name: maestro_id_maestro_seq; Type: SEQUENCE; Schema: track; Owner: postgres
--

CREATE SEQUENCE maestro_id_maestro_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE track.maestro_id_maestro_seq OWNER TO postgres;

--
-- TOC entry 2291 (class 0 OID 0)
-- Dependencies: 192
-- Name: maestro_id_maestro_seq; Type: SEQUENCE OWNED BY; Schema: track; Owner: postgres
--

ALTER SEQUENCE maestro_id_maestro_seq OWNED BY maestro.id_maestro;


--
-- TOC entry 209 (class 1259 OID 137069)
-- Dependencies: 6
-- Name: marca; Type: TABLE; Schema: track; Owner: postgres; Tablespace: 
--

CREATE TABLE marca (
    id_marca integer NOT NULL,
    descripcion character varying(20)
);


ALTER TABLE track.marca OWNER TO postgres;

--
-- TOC entry 210 (class 1259 OID 137072)
-- Dependencies: 6 209
-- Name: marca_id_marca_seq; Type: SEQUENCE; Schema: track; Owner: postgres
--

CREATE SEQUENCE marca_id_marca_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE track.marca_id_marca_seq OWNER TO postgres;

--
-- TOC entry 2292 (class 0 OID 0)
-- Dependencies: 210
-- Name: marca_id_marca_seq; Type: SEQUENCE OWNED BY; Schema: track; Owner: postgres
--

ALTER SEQUENCE marca_id_marca_seq OWNED BY marca.id_marca;


--
-- TOC entry 211 (class 1259 OID 137074)
-- Dependencies: 6
-- Name: marca_tvehiculo; Type: TABLE; Schema: track; Owner: postgres; Tablespace: 
--

CREATE TABLE marca_tvehiculo (
    id_marca integer,
    id_tipov integer
);


ALTER TABLE track.marca_tvehiculo OWNER TO postgres;

--
-- TOC entry 212 (class 1259 OID 137077)
-- Dependencies: 6
-- Name: modelo; Type: TABLE; Schema: track; Owner: postgres; Tablespace: 
--

CREATE TABLE modelo (
    id_modelo integer NOT NULL,
    descripcion character varying(20),
    fk_marca integer
);


ALTER TABLE track.modelo OWNER TO postgres;

--
-- TOC entry 213 (class 1259 OID 137080)
-- Dependencies: 212 6
-- Name: modelo_id_modelo_seq; Type: SEQUENCE; Schema: track; Owner: postgres
--

CREATE SEQUENCE modelo_id_modelo_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE track.modelo_id_modelo_seq OWNER TO postgres;

--
-- TOC entry 2293 (class 0 OID 0)
-- Dependencies: 213
-- Name: modelo_id_modelo_seq; Type: SEQUENCE OWNED BY; Schema: track; Owner: postgres
--

ALTER SEQUENCE modelo_id_modelo_seq OWNED BY modelo.id_modelo;


--
-- TOC entry 214 (class 1259 OID 137082)
-- Dependencies: 6
-- Name: nocturno; Type: TABLE; Schema: track; Owner: postgres; Tablespace: 
--

CREATE TABLE nocturno (
    id_nocturno integer NOT NULL,
    fecha_registro date,
    pernorta boolean
);


ALTER TABLE track.nocturno OWNER TO postgres;

--
-- TOC entry 215 (class 1259 OID 137085)
-- Dependencies: 6 214
-- Name: nocturno_id_nocturno_seq; Type: SEQUENCE; Schema: track; Owner: postgres
--

CREATE SEQUENCE nocturno_id_nocturno_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE track.nocturno_id_nocturno_seq OWNER TO postgres;

--
-- TOC entry 2294 (class 0 OID 0)
-- Dependencies: 215
-- Name: nocturno_id_nocturno_seq; Type: SEQUENCE OWNED BY; Schema: track; Owner: postgres
--

ALTER SEQUENCE nocturno_id_nocturno_seq OWNED BY nocturno.id_nocturno;


--
-- TOC entry 216 (class 1259 OID 137087)
-- Dependencies: 6
-- Name: nocturno_vehiculo; Type: TABLE; Schema: track; Owner: postgres; Tablespace: 
--

CREATE TABLE nocturno_vehiculo (
    id_nocturno integer,
    id_vehiculo integer
);


ALTER TABLE track.nocturno_vehiculo OWNER TO postgres;

--
-- TOC entry 193 (class 1259 OID 136860)
-- Dependencies: 6
-- Name: obser_desp; Type: TABLE; Schema: track; Owner: postgres; Tablespace: 
--

CREATE TABLE obser_desp (
    id_observacion integer NOT NULL,
    id_despacho integer NOT NULL
);


ALTER TABLE track.obser_desp OWNER TO postgres;

--
-- TOC entry 194 (class 1259 OID 136863)
-- Dependencies: 6
-- Name: obser_transito; Type: TABLE; Schema: track; Owner: postgres; Tablespace: 
--

CREATE TABLE obser_transito (
    id_observacion integer NOT NULL,
    id_transito integer NOT NULL
);


ALTER TABLE track.obser_transito OWNER TO postgres;

--
-- TOC entry 195 (class 1259 OID 136866)
-- Dependencies: 6
-- Name: observacion; Type: TABLE; Schema: track; Owner: postgres; Tablespace: 
--

CREATE TABLE observacion (
    id_observacion integer NOT NULL,
    descripcion text NOT NULL,
    status integer
);


ALTER TABLE track.observacion OWNER TO postgres;

--
-- TOC entry 196 (class 1259 OID 136872)
-- Dependencies: 6 195
-- Name: observacion_id_observacion_seq; Type: SEQUENCE; Schema: track; Owner: postgres
--

CREATE SEQUENCE observacion_id_observacion_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE track.observacion_id_observacion_seq OWNER TO postgres;

--
-- TOC entry 2295 (class 0 OID 0)
-- Dependencies: 196
-- Name: observacion_id_observacion_seq; Type: SEQUENCE OWNED BY; Schema: track; Owner: postgres
--

ALTER SEQUENCE observacion_id_observacion_seq OWNED BY observacion.id_observacion;


--
-- TOC entry 197 (class 1259 OID 136874)
-- Dependencies: 6
-- Name: receptor; Type: TABLE; Schema: track; Owner: postgres; Tablespace: 
--

CREATE TABLE receptor (
    id_receptor integer NOT NULL,
    nb_receptor character varying(100),
    apellido_receptor character varying(100),
    direccion_receptor text,
    es_activo boolean,
    create_date time with time zone,
    modified_date time with time zone,
    nacionalidad integer,
    cedula_receptor integer,
    fk_created_by integer
);


ALTER TABLE track.receptor OWNER TO postgres;

--
-- TOC entry 198 (class 1259 OID 136880)
-- Dependencies: 6
-- Name: receptor_contacto; Type: TABLE; Schema: track; Owner: postgres; Tablespace: 
--

CREATE TABLE receptor_contacto (
    id_receptor integer NOT NULL,
    id_contacto integer NOT NULL
);


ALTER TABLE track.receptor_contacto OWNER TO postgres;

--
-- TOC entry 199 (class 1259 OID 136883)
-- Dependencies: 6 197
-- Name: receptor_id_receptor_seq; Type: SEQUENCE; Schema: track; Owner: postgres
--

CREATE SEQUENCE receptor_id_receptor_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE track.receptor_id_receptor_seq OWNER TO postgres;

--
-- TOC entry 2296 (class 0 OID 0)
-- Dependencies: 199
-- Name: receptor_id_receptor_seq; Type: SEQUENCE OWNED BY; Schema: track; Owner: postgres
--

ALTER SEQUENCE receptor_id_receptor_seq OWNED BY receptor.id_receptor;


--
-- TOC entry 200 (class 1259 OID 136885)
-- Dependencies: 179 6
-- Name: ruta_entrega_id_rutae_seq; Type: SEQUENCE; Schema: track; Owner: postgres
--

CREATE SEQUENCE ruta_entrega_id_rutae_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE track.ruta_entrega_id_rutae_seq OWNER TO postgres;

--
-- TOC entry 2297 (class 0 OID 0)
-- Dependencies: 200
-- Name: ruta_entrega_id_rutae_seq; Type: SEQUENCE OWNED BY; Schema: track; Owner: postgres
--

ALTER SEQUENCE ruta_entrega_id_rutae_seq OWNED BY bitacora_transito.id_transito;


--
-- TOC entry 201 (class 1259 OID 136887)
-- Dependencies: 1982 6
-- Name: sedes; Type: TABLE; Schema: track; Owner: postgres; Tablespace: 
--

CREATE TABLE sedes (
    id_sede integer NOT NULL,
    nb_sede character varying(150),
    direccion_sede text,
    fk_estado integer NOT NULL,
    fk_municipio integer NOT NULL,
    fk_parroquia integer NOT NULL,
    fk_estatus integer NOT NULL,
    create_date timestamp with time zone DEFAULT now() NOT NULL,
    modified_by integer,
    es_activo boolean,
    tipo_sede integer,
    fk_sede integer,
    fk_created_by integer,
    localidad integer
);


ALTER TABLE track.sedes OWNER TO postgres;

--
-- TOC entry 2298 (class 0 OID 0)
-- Dependencies: 201
-- Name: COLUMN sedes.id_sede; Type: COMMENT; Schema: track; Owner: postgres
--

COMMENT ON COLUMN sedes.id_sede IS 'IDENTIFICADOR DE LAS CEDES';


--
-- TOC entry 2299 (class 0 OID 0)
-- Dependencies: 201
-- Name: COLUMN sedes.nb_sede; Type: COMMENT; Schema: track; Owner: postgres
--

COMMENT ON COLUMN sedes.nb_sede IS 'NOMBRE DE LA CEDE';


--
-- TOC entry 2300 (class 0 OID 0)
-- Dependencies: 201
-- Name: COLUMN sedes.direccion_sede; Type: COMMENT; Schema: track; Owner: postgres
--

COMMENT ON COLUMN sedes.direccion_sede IS 'DIRECCIÓN DE LA CEDE';


--
-- TOC entry 2301 (class 0 OID 0)
-- Dependencies: 201
-- Name: COLUMN sedes.fk_estado; Type: COMMENT; Schema: track; Owner: postgres
--

COMMENT ON COLUMN sedes.fk_estado IS 'CLAVE FOREANEA DE LA TABLA ESTADO
';


--
-- TOC entry 2302 (class 0 OID 0)
-- Dependencies: 201
-- Name: COLUMN sedes.fk_estatus; Type: COMMENT; Schema: track; Owner: postgres
--

COMMENT ON COLUMN sedes.fk_estatus IS 'ESTATUS DE LA SEDE. PUEDE SER
     --ACTIVO
     --INACTIVO
ESTA RELACIÓN PROVIENE DE MAESTRO';


--
-- TOC entry 2303 (class 0 OID 0)
-- Dependencies: 201
-- Name: COLUMN sedes.create_date; Type: COMMENT; Schema: track; Owner: postgres
--

COMMENT ON COLUMN sedes.create_date IS 'FECHA DE CREACIÓN DELREGISTRO';


--
-- TOC entry 2304 (class 0 OID 0)
-- Dependencies: 201
-- Name: COLUMN sedes.modified_by; Type: COMMENT; Schema: track; Owner: postgres
--

COMMENT ON COLUMN sedes.modified_by IS 'USUARIO QUE REALIZO LA MODIFICACIÓN EN EL REGISTRO';


--
-- TOC entry 2305 (class 0 OID 0)
-- Dependencies: 201
-- Name: COLUMN sedes.es_activo; Type: COMMENT; Schema: track; Owner: postgres
--

COMMENT ON COLUMN sedes.es_activo IS 'IDENTICADOR SI EL REGISTRO ESTA ACTIVO';


--
-- TOC entry 202 (class 1259 OID 136894)
-- Dependencies: 201 6
-- Name: sedes_id_sede_seq; Type: SEQUENCE; Schema: track; Owner: postgres
--

CREATE SEQUENCE sedes_id_sede_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE track.sedes_id_sede_seq OWNER TO postgres;

--
-- TOC entry 2306 (class 0 OID 0)
-- Dependencies: 202
-- Name: sedes_id_sede_seq; Type: SEQUENCE OWNED BY; Schema: track; Owner: postgres
--

ALTER SEQUENCE sedes_id_sede_seq OWNED BY sedes.id_sede;


--
-- TOC entry 203 (class 1259 OID 136896)
-- Dependencies: 6
-- Name: tarifario; Type: TABLE; Schema: track; Owner: postgres; Tablespace: 
--

CREATE TABLE tarifario (
    peso integer,
    tipo_envio integer,
    precio_unitario numeric(5,2),
    iva numeric(5,2),
    precio_total numeric(5,2),
    id_tarifario integer NOT NULL
);


ALTER TABLE track.tarifario OWNER TO postgres;

--
-- TOC entry 204 (class 1259 OID 136899)
-- Dependencies: 6 203
-- Name: tarifario_id_tarifario_seq; Type: SEQUENCE; Schema: track; Owner: postgres
--

CREATE SEQUENCE tarifario_id_tarifario_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE track.tarifario_id_tarifario_seq OWNER TO postgres;

--
-- TOC entry 2308 (class 0 OID 0)
-- Dependencies: 204
-- Name: tarifario_id_tarifario_seq; Type: SEQUENCE OWNED BY; Schema: track; Owner: postgres
--

ALTER SEQUENCE tarifario_id_tarifario_seq OWNED BY tarifario.id_tarifario;


--
-- TOC entry 217 (class 1259 OID 137090)
-- Dependencies: 6
-- Name: tipo_vehiculo; Type: TABLE; Schema: track; Owner: postgres; Tablespace: 
--

CREATE TABLE tipo_vehiculo (
    id_tipov integer NOT NULL,
    descripcion character varying(20)
);


ALTER TABLE track.tipo_vehiculo OWNER TO postgres;

--
-- TOC entry 218 (class 1259 OID 137093)
-- Dependencies: 217 6
-- Name: tipo_vehiculo_id_tipov_seq; Type: SEQUENCE; Schema: track; Owner: postgres
--

CREATE SEQUENCE tipo_vehiculo_id_tipov_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE track.tipo_vehiculo_id_tipov_seq OWNER TO postgres;

--
-- TOC entry 2309 (class 0 OID 0)
-- Dependencies: 218
-- Name: tipo_vehiculo_id_tipov_seq; Type: SEQUENCE OWNED BY; Schema: track; Owner: postgres
--

ALTER SEQUENCE tipo_vehiculo_id_tipov_seq OWNED BY tipo_vehiculo.id_tipov;


--
-- TOC entry 219 (class 1259 OID 137095)
-- Dependencies: 6
-- Name: vehiculo; Type: TABLE; Schema: track; Owner: postgres; Tablespace: 
--

CREATE TABLE vehiculo (
    id_vehiculo integer NOT NULL,
    placa character varying(7),
    serial_carroseria character varying(20),
    serial_motor character varying(20),
    color character varying(20),
    descripcion character varying(250),
    anio integer,
    transmision integer,
    tipov integer,
    marca integer,
    rotulado boolean,
    numero integer,
    logo boolean,
    dependencia integer,
    modelo integer
);


ALTER TABLE track.vehiculo OWNER TO postgres;

--
-- TOC entry 220 (class 1259 OID 137098)
-- Dependencies: 219 6
-- Name: vehiculo_id_vehiculo_seq; Type: SEQUENCE; Schema: track; Owner: postgres
--

CREATE SEQUENCE vehiculo_id_vehiculo_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE track.vehiculo_id_vehiculo_seq OWNER TO postgres;

--
-- TOC entry 2310 (class 0 OID 0)
-- Dependencies: 220
-- Name: vehiculo_id_vehiculo_seq; Type: SEQUENCE OWNED BY; Schema: track; Owner: postgres
--

ALTER SEQUENCE vehiculo_id_vehiculo_seq OWNED BY vehiculo.id_vehiculo;


SET search_path = public, pg_catalog;

--
-- TOC entry 1950 (class 2604 OID 136901)
-- Dependencies: 166 165
-- Name: idfield; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY cruge_field ALTER COLUMN idfield SET DEFAULT nextval('cruge_field_idfield_seq'::regclass);


--
-- TOC entry 1951 (class 2604 OID 136902)
-- Dependencies: 168 167
-- Name: idfieldvalue; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY cruge_fieldvalue ALTER COLUMN idfieldvalue SET DEFAULT nextval('cruge_fieldvalue_idfieldvalue_seq'::regclass);


--
-- TOC entry 1954 (class 2604 OID 136903)
-- Dependencies: 170 169
-- Name: idsession; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY cruge_session ALTER COLUMN idsession SET DEFAULT nextval('cruge_session_idsession_seq'::regclass);


--
-- TOC entry 1966 (class 2604 OID 136904)
-- Dependencies: 172 171
-- Name: idsystem; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY cruge_system ALTER COLUMN idsystem SET DEFAULT nextval('cruge_system_idsystem_seq'::regclass);


--
-- TOC entry 1970 (class 2604 OID 136905)
-- Dependencies: 174 173
-- Name: iduser; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY cruge_user ALTER COLUMN iduser SET DEFAULT nextval('cruge_user_iduser_seq'::regclass);


SET search_path = track, pg_catalog;

--
-- TOC entry 1972 (class 2604 OID 136906)
-- Dependencies: 178 177
-- Name: id_admision; Type: DEFAULT; Schema: track; Owner: postgres
--

ALTER TABLE ONLY admision ALTER COLUMN id_admision SET DEFAULT nextval('admision_id_admision_seq'::regclass);


--
-- TOC entry 1971 (class 2604 OID 136907)
-- Dependencies: 176 175
-- Name: id_apertura; Type: DEFAULT; Schema: track; Owner: postgres
--

ALTER TABLE ONLY apertura ALTER COLUMN id_apertura SET DEFAULT nextval('"Apertura_id_apertura_seq"'::regclass);


--
-- TOC entry 1973 (class 2604 OID 136908)
-- Dependencies: 200 179
-- Name: id_transito; Type: DEFAULT; Schema: track; Owner: postgres
--

ALTER TABLE ONLY bitacora_transito ALTER COLUMN id_transito SET DEFAULT nextval('ruta_entrega_id_rutae_seq'::regclass);


--
-- TOC entry 1975 (class 2604 OID 136909)
-- Dependencies: 182 181
-- Name: id_cliente; Type: DEFAULT; Schema: track; Owner: postgres
--

ALTER TABLE ONLY clientes ALTER COLUMN id_cliente SET DEFAULT nextval('clientes_id_cliente_seq'::regclass);


--
-- TOC entry 1985 (class 2604 OID 137100)
-- Dependencies: 206 205
-- Name: id_persona; Type: DEFAULT; Schema: track; Owner: postgres
--

ALTER TABLE ONLY conductor ALTER COLUMN id_persona SET DEFAULT nextval('conductor_id_persona_seq'::regclass);


--
-- TOC entry 1976 (class 2604 OID 136910)
-- Dependencies: 184 183
-- Name: id_contacto; Type: DEFAULT; Schema: track; Owner: postgres
--

ALTER TABLE ONLY contacto ALTER COLUMN id_contacto SET DEFAULT nextval('contacto_id_contacto_seq'::regclass);


--
-- TOC entry 1977 (class 2604 OID 136911)
-- Dependencies: 187 186
-- Name: id_despacho; Type: DEFAULT; Schema: track; Owner: postgres
--

ALTER TABLE ONLY despacho ALTER COLUMN id_despacho SET DEFAULT nextval('despacho_id_despacho_seq'::regclass);


--
-- TOC entry 1978 (class 2604 OID 136912)
-- Dependencies: 189 188
-- Name: id_envio; Type: DEFAULT; Schema: track; Owner: postgres
--

ALTER TABLE ONLY envio ALTER COLUMN id_envio SET DEFAULT nextval('envio_id_envio_seq'::regclass);


--
-- TOC entry 1986 (class 2604 OID 137101)
-- Dependencies: 208 207
-- Name: id_gps; Type: DEFAULT; Schema: track; Owner: postgres
--

ALTER TABLE ONLY gps ALTER COLUMN id_gps SET DEFAULT nextval('gps_id_gps_seq'::regclass);


--
-- TOC entry 1979 (class 2604 OID 136913)
-- Dependencies: 192 191
-- Name: id_maestro; Type: DEFAULT; Schema: track; Owner: postgres
--

ALTER TABLE ONLY maestro ALTER COLUMN id_maestro SET DEFAULT nextval('maestro_id_maestro_seq'::regclass);


--
-- TOC entry 1987 (class 2604 OID 137102)
-- Dependencies: 210 209
-- Name: id_marca; Type: DEFAULT; Schema: track; Owner: postgres
--

ALTER TABLE ONLY marca ALTER COLUMN id_marca SET DEFAULT nextval('marca_id_marca_seq'::regclass);


--
-- TOC entry 1988 (class 2604 OID 137103)
-- Dependencies: 213 212
-- Name: id_modelo; Type: DEFAULT; Schema: track; Owner: postgres
--

ALTER TABLE ONLY modelo ALTER COLUMN id_modelo SET DEFAULT nextval('modelo_id_modelo_seq'::regclass);


--
-- TOC entry 1989 (class 2604 OID 137104)
-- Dependencies: 215 214
-- Name: id_nocturno; Type: DEFAULT; Schema: track; Owner: postgres
--

ALTER TABLE ONLY nocturno ALTER COLUMN id_nocturno SET DEFAULT nextval('nocturno_id_nocturno_seq'::regclass);


--
-- TOC entry 1980 (class 2604 OID 136914)
-- Dependencies: 196 195
-- Name: id_observacion; Type: DEFAULT; Schema: track; Owner: postgres
--

ALTER TABLE ONLY observacion ALTER COLUMN id_observacion SET DEFAULT nextval('observacion_id_observacion_seq'::regclass);


--
-- TOC entry 1981 (class 2604 OID 136915)
-- Dependencies: 199 197
-- Name: id_receptor; Type: DEFAULT; Schema: track; Owner: postgres
--

ALTER TABLE ONLY receptor ALTER COLUMN id_receptor SET DEFAULT nextval('receptor_id_receptor_seq'::regclass);


--
-- TOC entry 1983 (class 2604 OID 136916)
-- Dependencies: 202 201
-- Name: id_sede; Type: DEFAULT; Schema: track; Owner: postgres
--

ALTER TABLE ONLY sedes ALTER COLUMN id_sede SET DEFAULT nextval('sedes_id_sede_seq'::regclass);


--
-- TOC entry 1984 (class 2604 OID 136917)
-- Dependencies: 204 203
-- Name: id_tarifario; Type: DEFAULT; Schema: track; Owner: postgres
--

ALTER TABLE ONLY tarifario ALTER COLUMN id_tarifario SET DEFAULT nextval('tarifario_id_tarifario_seq'::regclass);


--
-- TOC entry 1990 (class 2604 OID 137105)
-- Dependencies: 218 217
-- Name: id_tipov; Type: DEFAULT; Schema: track; Owner: postgres
--

ALTER TABLE ONLY tipo_vehiculo ALTER COLUMN id_tipov SET DEFAULT nextval('tipo_vehiculo_id_tipov_seq'::regclass);


--
-- TOC entry 1991 (class 2604 OID 137106)
-- Dependencies: 220 219
-- Name: id_vehiculo; Type: DEFAULT; Schema: track; Owner: postgres
--

ALTER TABLE ONLY vehiculo ALTER COLUMN id_vehiculo SET DEFAULT nextval('vehiculo_id_vehiculo_seq'::regclass);


SET search_path = public, pg_catalog;

--
-- TOC entry 2183 (class 0 OID 136735)
-- Dependencies: 162 2242
-- Data for Name: cruge_authassignment; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY cruge_authassignment (userid, bizrule, data, itemname) FROM stdin;
\.


--
-- TOC entry 2184 (class 0 OID 136741)
-- Dependencies: 163 2242
-- Data for Name: cruge_authitem; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY cruge_authitem (name, type, description, bizrule, data) FROM stdin;
action_ui_usermanagementadmin	0		\N	N;
admin	0		\N	N;
action_ui_usermanagementupdate	0		\N	N;
edit-advanced-profile-features	0	/var/www/trackingipostel/protected/modules/cruge/views/ui/usermanagementupdate.php linea 114	\N	N;
action_ui_rbaclistroles	0		\N	N;
controller_admision	0		\N	N;
action_admision_view	0		\N	N;
action_admision_create	0		\N	N;
action_admision_update	0		\N	N;
action_admision_delete	0		\N	N;
action_admision_index	0		\N	N;
action_admision_buscarprecio	0		\N	N;
action_admision_admin	0		\N	N;
controller_ciudades	0		\N	N;
action_ciudades_view	0		\N	N;
action_ciudades_create	0		\N	N;
action_ciudades_update	0		\N	N;
action_ciudades_delete	0		\N	N;
action_ciudades_index	0		\N	N;
action_ciudades_admin	0		\N	N;
controller_clientes	0		\N	N;
action_clientes_view	0		\N	N;
action_clientes_create	0		\N	N;
action_clientes_update	0		\N	N;
action_clientes_delete	0		\N	N;
action_clientes_index	0		\N	N;
action_clientes_admin	0		\N	N;
controller_envio	0		\N	N;
action_envio_view	0		\N	N;
action_envio_create	0		\N	N;
action_envio_update	0		\N	N;
action_envio_delete	0		\N	N;
action_envio_index	0		\N	N;
action_envio_admin	0		\N	N;
controller_estados	0		\N	N;
action_estados_view	0		\N	N;
action_estados_create	0		\N	N;
action_estados_update	0		\N	N;
action_estados_delete	0		\N	N;
action_estados_index	0		\N	N;
action_estados_admin	0		\N	N;
controller_municipios	0		\N	N;
action_municipios_view	0		\N	N;
action_municipios_create	0		\N	N;
action_municipios_update	0		\N	N;
action_municipios_delete	0		\N	N;
action_municipios_index	0		\N	N;
action_municipios_admin	0		\N	N;
controller_parroquias	0		\N	N;
action_parroquias_view	0		\N	N;
action_parroquias_create	0		\N	N;
action_parroquias_update	0		\N	N;
action_parroquias_delete	0		\N	N;
action_parroquias_index	0		\N	N;
action_parroquias_admin	0		\N	N;
controller_sedes	0		\N	N;
action_sedes_view	0		\N	N;
action_sedes_create	0		\N	N;
action_sedes_update	0		\N	N;
action_sedes_delete	0		\N	N;
action_sedes_index	0		\N	N;
action_sedes_admin	0		\N	N;
controller_site	0		\N	N;
action_site_index	0		\N	N;
action_site_error	0		\N	N;
action_site_contact	0		\N	N;
action_site_login	0		\N	N;
action_site_logout	0		\N	N;
action_ui_systemupdate	0		\N	N;
action_bitacoraTransito_create	0		\N	N;
action_ui_editprofile	0		\N	N;
action_admision_crearcodigo	0		\N	N;
action_admision_buscarmunicipios	0		\N	N;
action_admision_buscarparroquias	0		\N	N;
action_admision_buscarlocalidad	0		\N	N;
action_admision_buscarsedes	0		\N	N;
controller_apertura	0		\N	N;
action_apertura_view	0		\N	N;
action_apertura_create	0		\N	N;
action_apertura_update	0		\N	N;
action_apertura_delete	0		\N	N;
action_apertura_index	0		\N	N;
action_apertura_admin	0		\N	N;
controller_bitacoratransito	0		\N	N;
action_bitacoratransito_view	0		\N	N;
action_bitacoratransito_create	0		\N	N;
action_bitacoratransito_insertentradas	0		\N	N;
action_bitacoratransito_buscarsiexistepaquete	0		\N	N;
action_bitacoratransito_update	0		\N	N;
action_bitacoratransito_delete	0		\N	N;
action_bitacoratransito_index	0		\N	N;
action_bitacoratransito_admin	0		\N	N;
controller_busqueda_vehiculo	0		\N	N;
action_busqueda_vehiculo_view	0		\N	N;
action_busqueda_vehiculo_create	0		\N	N;
action_busqueda_vehiculo_update	0		\N	N;
action_busqueda_vehiculo_delete	0		\N	N;
action_busqueda_vehiculo_index	0		\N	N;
action_busqueda_vehiculo_admin	0		\N	N;
controller_despacho	0		\N	N;
action_despacho_view	0		\N	N;
action_despacho_create	0		\N	N;
action_despacho_update	0		\N	N;
action_despacho_delete	0		\N	N;
action_despacho_index	0		\N	N;
action_despacho_admin	0		\N	N;
action_envio_buscarordenesf	0		\N	N;
action_envio_buscarordenes	0		\N	N;
controller_gps	0		\N	N;
action_gps_view	0		\N	N;
action_gps_create	0		\N	N;
action_gps_update	0		\N	N;
action_gps_delete	0		\N	N;
action_gps_index	0		\N	N;
action_gps_admin	0		\N	N;
controller_localidades	0		\N	N;
action_localidades_view	0		\N	N;
action_localidades_create	0		\N	N;
action_localidades_update	0		\N	N;
action_localidades_delete	0		\N	N;
action_localidades_index	0		\N	N;
action_localidades_admin	0		\N	N;
controller_marca	0		\N	N;
action_marca_view	0		\N	N;
action_marca_create	0		\N	N;
action_marca_update	0		\N	N;
action_marca_delete	0		\N	N;
action_marca_index	0		\N	N;
action_marca_admin	0		\N	N;
controller_modelo	0		\N	N;
action_modelo_view	0		\N	N;
action_modelo_create	0		\N	N;
action_modelo_update	0		\N	N;
action_modelo_delete	0		\N	N;
action_modelo_index	0		\N	N;
action_modelo_admin	0		\N	N;
controller_nocturno	0		\N	N;
action_nocturno_view	0		\N	N;
action_nocturno_create	0		\N	N;
action_nocturno_update	0		\N	N;
action_nocturno_delete	0		\N	N;
action_nocturno_index	0		\N	N;
action_nocturno_admin	0		\N	N;
controller_oficinaspostales	0		\N	N;
action_oficinaspostales_view	0		\N	N;
action_oficinaspostales_create	0		\N	N;
action_oficinaspostales_update	0		\N	N;
action_oficinaspostales_delete	0		\N	N;
action_oficinaspostales_index	0		\N	N;
action_oficinaspostales_admin	0		\N	N;
controller_personas	0		\N	N;
action_personas_view	0		\N	N;
action_personas_create	0		\N	N;
action_personas_update	0		\N	N;
action_personas_delete	0		\N	N;
action_personas_index	0		\N	N;
action_personas_admin	0		\N	N;
controller_tipovehiculo	0		\N	N;
action_tipovehiculo_view	0		\N	N;
action_tipovehiculo_create	0		\N	N;
action_tipovehiculo_update	0		\N	N;
action_tipovehiculo_delete	0		\N	N;
action_tipovehiculo_index	0		\N	N;
action_tipovehiculo_admin	0		\N	N;
controller_vehiculo	0		\N	N;
action_vehiculo_view	0		\N	N;
action_vehiculo_create	0		\N	N;
action_vehiculo_update	0		\N	N;
action_vehiculo_delete	0		\N	N;
action_vehiculo_index	0		\N	N;
action_vehiculo_admin	0		\N	N;
action_vehiculo_cargarmodelo	0		\N	N;
action_ui_fieldsadmincreate	0		\N	N;
action_ui_rbacusersassignments	0		\N	N;
\.


--
-- TOC entry 2185 (class 0 OID 136747)
-- Dependencies: 164 2242
-- Data for Name: cruge_authitemchild; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY cruge_authitemchild (parent, child) FROM stdin;
\.


--
-- TOC entry 2186 (class 0 OID 136750)
-- Dependencies: 165 2242
-- Data for Name: cruge_field; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY cruge_field (idfield, fieldname, longname, "position", required, fieldtype, fieldsize, maxlength, showinreports, useregexp, useregexpmsg, predetvalue) FROM stdin;
\.


--
-- TOC entry 2311 (class 0 OID 0)
-- Dependencies: 166
-- Name: cruge_field_idfield_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('cruge_field_idfield_seq', 1, false);


--
-- TOC entry 2188 (class 0 OID 136764)
-- Dependencies: 167 2242
-- Data for Name: cruge_fieldvalue; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY cruge_fieldvalue (idfieldvalue, iduser, idfield, value) FROM stdin;
\.


--
-- TOC entry 2312 (class 0 OID 0)
-- Dependencies: 168
-- Name: cruge_fieldvalue_idfieldvalue_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('cruge_fieldvalue_idfieldvalue_seq', 1, false);


--
-- TOC entry 2190 (class 0 OID 136772)
-- Dependencies: 169 2242
-- Data for Name: cruge_session; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY cruge_session (idsession, iduser, created, expire, status, ipaddress, usagecount, lastusage, logoutdate, ipaddressout) FROM stdin;
63	1	1417412303	1417414103	1	127.0.0.1	1	1417412303	\N	\N
64	1	1417416106	1417417906	1	127.0.0.1	1	1417416106	\N	\N
31	1	1415872748	1415874548	0	127.0.0.1	1	1415872748	\N	\N
65	1	1417451112	1417452912	1	127.0.0.1	1	1417451112	\N	\N
3	1	1413456894	1413458694	0	127.0.0.1	2	1413457477	\N	\N
33	1	1415877899	1415879699	0	127.0.0.1	1	1415877899	\N	\N
34	1	1415880479	1415882279	1	127.0.0.1	1	1415880479	\N	\N
35	1	1415884880	1415886680	1	127.0.0.1	1	1415884880	\N	\N
10	1	1413950366	1413952166	0	127.0.0.1	1	1413950366	\N	\N
11	1	1413953813	1413955613	1	127.0.0.1	1	1413953813	\N	\N
12	1	1414038363	1414040163	1	127.0.0.1	1	1414038363	\N	\N
36	1	1416101349	1416103149	1	127.0.0.1	1	1416101349	\N	\N
4	1	1413459018	1413460818	0	127.0.0.1	1	1413459018	\N	\N
37	1	1416401616	1416403416	1	127.0.0.1	1	1416401616	\N	\N
38	1	1416706782	1416708582	1	127.0.0.1	1	1416706782	\N	\N
66	1	1417457362	1417459162	0	127.0.0.1	1	1417457362	1417458689	127.0.0.1
1	1	1413374570	1413376370	0	127.0.0.1	1	1413374570	\N	\N
58	1	1417374723	1417376523	0	127.0.0.1	1	1417374723	\N	\N
47	1	1417150448	1417152248	0	127.0.0.1	1	1417150448	\N	\N
48	1	1417153066	1417154866	1	127.0.0.1	1	1417153066	\N	\N
13	1	1414064300	1414066100	0	127.0.0.1	1	1414064300	\N	\N
14	1	1414066291	1414068091	1	127.0.0.1	1	1414066291	\N	\N
15	1	1414629855	1414631655	1	127.0.0.1	1	1414629855	\N	\N
16	1	1414641897	1414643697	1	127.0.0.1	1	1414641897	\N	\N
17	1	1414673833	1414675633	1	127.0.0.1	1	1414673833	\N	\N
18	1	1414977168	1414978968	1	127.0.0.1	1	1414977168	\N	\N
19	1	1414981721	1414983521	1	127.0.0.1	1	1414981721	\N	\N
20	1	1414984645	1414986445	1	127.0.0.1	1	1414984645	\N	\N
21	1	1415549520	1415551320	1	127.0.0.1	1	1415549520	\N	\N
59	1	1417377540	1417379340	1	127.0.0.1	1	1417377540	\N	\N
60	1	1417380032	1417381832	1	127.0.0.1	1	1417380032	\N	\N
32	1	1415874736	1415876536	0	127.0.0.1	1	1415874736	\N	\N
61	1	1417399704	1417401504	1	127.0.0.1	1	1417399704	\N	\N
51	1	1417309927	1417311727	0	127.0.0.1	2	1417310901	\N	\N
5	1	1413460832	1413462632	0	127.0.0.1	1	1413460832	\N	\N
2	1	1413376537	1413378337	0	127.0.0.1	1	1413376537	\N	\N
6	1	1413686952	1413688752	1	127.0.0.1	1	1413686952	\N	\N
7	1	1413768933	1413770733	1	127.0.0.1	1	1413768933	\N	\N
8	1	1413773141	1413774941	1	127.0.0.1	1	1413773141	\N	\N
22	1	1415555466	1415557266	0	127.0.0.1	1	1415555466	\N	\N
23	1	1415557447	1415559247	1	127.0.0.1	1	1415557447	\N	\N
24	1	1415572613	1415574413	1	127.0.0.1	1	1415572613	\N	\N
25	1	1415580012	1415581812	1	127.0.0.1	1	1415580012	\N	\N
26	1	1415584602	1415586402	1	127.0.0.1	1	1415584602	\N	\N
69	1	1417482231	1417484031	1	127.0.0.1	1	1417482231	\N	\N
39	1	1416711046	1416712846	0	127.0.0.1	1	1416711046	\N	\N
40	1	1416713234	1416715034	1	127.0.0.1	1	1416713234	\N	\N
9	1	1413948518	1413950318	0	127.0.0.1	1	1413948518	\N	\N
41	1	1416774686	1416776486	1	127.0.0.1	1	1416774686	\N	\N
42	1	1416796297	1416798097	1	127.0.0.1	1	1416796297	\N	\N
54	1	1417320014	1417321814	0	127.0.0.1	1	1417320014	\N	\N
49	1	1417305173	1417306973	0	127.0.0.1	1	1417305173	\N	\N
27	1	1415845599	1415847399	0	127.0.0.1	1	1415845599	\N	\N
28	1	1415849498	1415851298	1	127.0.0.1	1	1415849498	\N	\N
29	1	1415870437	1415872237	0	127.0.0.1	1	1415870437	1415871382	127.0.0.1
30	1	1415872314	1415874114	0	127.0.0.1	1	1415872314	1415872668	127.0.0.1
55	1	1417321880	1417323680	1	127.0.0.1	1	1417321880	\N	\N
56	1	1417360452	1417362252	1	127.0.0.1	1	1417360452	\N	\N
57	1	1417371850	1417373650	1	127.0.0.1	1	1417371850	\N	\N
43	1	1416798791	1416800591	0	127.0.0.1	1	1416798791	\N	\N
44	1	1416800674	1416802474	1	127.0.0.1	1	1416800674	\N	\N
45	1	1416807613	1416809413	1	127.0.0.1	1	1416807613	\N	\N
46	1	1417148768	1417150568	0	127.0.0.1	1	1417148768	1417150443	127.0.0.1
52	1	1417311848	1417313648	0	127.0.0.1	1	1417311848	\N	\N
53	1	1417314830	1417316630	1	127.0.0.1	1	1417314830	\N	\N
70	1	1417517989	1417519789	0	127.0.0.1	1	1417517989	\N	\N
50	1	1417306989	1417308789	0	127.0.0.1	1	1417306989	\N	\N
72	1	1417521788	1417523588	0	127.0.0.1	1	1417521788	\N	\N
73	1	1417523998	1417525798	1	127.0.0.1	1	1417523998	\N	\N
71	1	1417519802	1417521602	0	127.0.0.1	1	1417519802	\N	\N
67	1	1417458695	1417460495	0	127.0.0.1	1	1417458695	\N	\N
62	1	1417408061	1417409861	0	127.0.0.1	1	1417408061	\N	\N
68	1	1417460513	1417462313	1	127.0.0.1	1	1417460513	\N	\N
74	1	1417526034	1417527834	1	127.0.0.1	1	1417526034	\N	\N
75	1	1418734384	1418736184	1	127.0.0.1	1	1418734384	\N	\N
76	1	1418737589	1418739389	0	127.0.0.1	1	1418737589	\N	\N
77	1	1418739449	1418741249	0	127.0.0.1	1	1418739449	\N	\N
79	1	1418744091	1418745891	1	127.0.0.1	1	1418744091	\N	\N
78	1	1418741315	1418743115	0	127.0.0.1	1	1418741315	\N	\N
81	1	1418754656	1418756456	1	127.0.0.1	1	1418754656	\N	\N
80	1	1418752849	1418754649	0	127.0.0.1	1	1418752849	\N	\N
83	1	1418759471	1418761271	1	127.0.0.1	1	1418759471	\N	\N
82	1	1418757641	1418759441	0	127.0.0.1	1	1418757641	\N	\N
84	1	1418768030	1418769830	1	127.0.0.1	1	1418768030	\N	\N
85	1	1418779090	1418780890	0	127.0.0.1	1	1418779090	\N	\N
86	1	1418782342	1418784142	1	127.0.0.1	1	1418782342	\N	\N
87	1	1418789737	1418791537	1	127.0.0.1	1	1418789737	\N	\N
116	1	1420510956	1420512756	0	127.0.0.1	1	1420510956	\N	\N
142	1	1422250183	1422251983	1	127.0.0.1	1	1422250183	\N	\N
153	1	1423188095	1423189895	0	127.0.0.1	1	1423188095	\N	\N
154	1	1423190746	1423192546	1	127.0.0.1	1	1423190746	\N	\N
144	1	1422256342	1422258142	0	127.0.0.1	1	1422256342	\N	\N
127	1	1421816935	1421818735	0	127.0.0.1	1	1421816935	\N	\N
99	1	1419252102	1419253902	0	127.0.0.1	1	1419252102	\N	\N
100	1	1419254914	1419256714	1	127.0.0.1	1	1419254914	\N	\N
128	1	1421819342	1421821142	1	127.0.0.1	1	1421819342	\N	\N
129	1	1421825228	1421827028	1	127.0.0.1	1	1421825228	\N	\N
117	1	1420514594	1420516394	0	127.0.0.1	1	1420514594	\N	\N
118	1	1420517256	1420519056	1	127.0.0.1	1	1420517256	\N	\N
119	1	1420524738	1420526538	1	127.0.0.1	1	1420524738	\N	\N
120	1	1420554897	1420556697	1	127.0.0.1	1	1420554897	\N	\N
121	1	1420558441	1420560241	1	127.0.0.1	1	1420558441	\N	\N
122	1	1420562725	1420564525	1	127.0.0.1	1	1420562725	\N	\N
123	1	1420601319	1420603119	1	127.0.0.1	1	1420601319	\N	\N
88	1	1418874313	1418876113	0	127.0.0.1	1	1418874313	\N	\N
124	1	1420646035	1420647835	1	127.0.0.1	1	1420646035	\N	\N
125	1	1421001479	1421003279	1	127.0.0.1	1	1421001479	\N	\N
101	1	1419260266	1419262066	0	127.0.0.1	3	1419260437	\N	\N
130	1	1421862687	1421864487	1	127.0.0.1	1	1421862687	\N	\N
131	1	1421895254	1421897054	1	127.0.0.1	1	1421895254	\N	\N
145	1	1422258495	1422260295	1	127.0.0.1	1	1422258495	\N	\N
89	1	1418876188	1418877988	0	127.0.0.1	1	1418876188	\N	\N
90	1	1418878057	1418879857	1	127.0.0.1	1	1418878057	\N	\N
146	1	1422998731	1423000531	1	127.0.0.1	1	1422998731	\N	\N
134	1	1422033259	1422035059	0	127.0.0.1	1	1422033259	\N	\N
102	1	1419262707	1419264507	0	127.0.0.1	1	1419262707	\N	\N
103	1	1419353549	1419355349	1	127.0.0.1	1	1419353549	\N	\N
104	1	1419734868	1419736668	1	127.0.0.1	1	1419734868	\N	\N
149	1	1423028766	1423030566	0	127.0.0.1	1	1423028766	\N	\N
91	1	1418905363	1418907163	0	127.0.0.1	1	1418905363	\N	\N
92	1	1418908435	1418910235	1	127.0.0.1	1	1418908435	\N	\N
93	1	1418945772	1418947572	1	127.0.0.1	1	1418945772	\N	\N
94	1	1419001763	1419003563	1	127.0.0.1	1	1419001763	\N	\N
95	1	1419008333	1419010133	1	127.0.0.1	1	1419008333	\N	\N
96	1	1419198210	1419200010	1	127.0.0.1	1	1419198210	\N	\N
97	1	1419220771	1419222571	1	127.0.0.1	1	1419220771	\N	\N
150	1	1423030907	1423032707	0	127.0.0.1	1	1423030907	\N	\N
151	1	1423032842	1423034642	1	127.0.0.1	1	1423032842	\N	\N
132	1	1422029191	1422030991	0	127.0.0.1	1	1422029191	\N	\N
152	1	1423057529	1423059329	1	127.0.0.1	1	1423057529	\N	\N
105	1	1419789472	1419791272	0	127.0.0.1	1	1419789472	\N	\N
106	1	1419791597	1419793397	1	127.0.0.1	1	1419791597	\N	\N
107	1	1419818408	1419820208	1	127.0.0.1	1	1419818408	\N	\N
108	1	1419913185	1419914985	1	127.0.0.1	1	1419913185	\N	\N
109	1	1419947885	1419949685	1	127.0.0.1	1	1419947885	\N	\N
110	1	1420256611	1420258411	1	127.0.0.1	1	1420256611	\N	\N
111	1	1420351106	1420352906	1	127.0.0.1	1	1420351106	\N	\N
112	1	1420354335	1420356135	1	127.0.0.1	1	1420354335	\N	\N
113	1	1420418917	1420420717	1	127.0.0.1	1	1420418917	\N	\N
114	1	1420489179	1420490979	1	127.0.0.1	1	1420489179	\N	\N
115	1	1420503861	1420505661	1	127.0.0.1	1	1420503861	\N	\N
148	1	1423026953	1423028753	0	127.0.0.1	1	1423026953	\N	\N
143	1	1422254298	1422256098	0	127.0.0.1	1	1422254298	\N	\N
98	1	1419249086	1419250886	0	127.0.0.1	1	1419249086	\N	\N
155	1	1423196153	1423197953	0	127.0.0.1	1	1423196153	\N	\N
133	1	1422031390	1422033190	0	127.0.0.1	1	1422031390	\N	\N
126	1	1421814222	1421816022	0	127.0.0.1	1	1421814222	\N	\N
159	1	1423230531	1423232331	0	127.0.0.1	1	1423230531	\N	\N
135	1	1422035764	1422037564	0	127.0.0.1	1	1422035764	\N	\N
136	1	1422037641	1422039441	1	127.0.0.1	1	1422037641	\N	\N
137	1	1422040657	1422042457	1	127.0.0.1	1	1422040657	\N	\N
138	1	1422068986	1422070786	1	127.0.0.1	1	1422068986	\N	\N
160	1	1423232965	1423234765	1	127.0.0.1	1	1423232965	\N	\N
139	1	1422157659	1422159459	1	127.0.0.1	1	1422157659	\N	\N
140	1	1422229305	1422231105	1	127.0.0.1	1	1422229305	\N	\N
141	1	1422242754	1422244554	1	127.0.0.1	1	1422242754	\N	\N
158	1	1423228650	1423230450	0	127.0.0.1	1	1423228650	\N	\N
156	1	1423198562	1423200362	0	127.0.0.1	1	1423198562	\N	\N
147	1	1423025123	1423026923	0	127.0.0.1	1	1423025123	\N	\N
157	1	1423200707	1423202507	1	127.0.0.1	1	1423200707	\N	\N
161	1	1423450911	1423452711	1	127.0.0.1	1	1423450911	\N	\N
162	1	1425323883	1425325683	1	127.0.0.1	1	1425323883	\N	\N
163	1	1425403024	1425404824	1	127.0.0.1	1	1425403024	\N	\N
164	1	1425408706	1425410506	1	127.0.0.1	1	1425408706	\N	\N
166	1	1425420250	1425422050	1	127.0.0.1	1	1425420250	\N	\N
165	1	1425417989	1425419789	0	127.0.0.1	1	1425417989	\N	\N
167	1	1425424239	1425426039	1	127.0.0.1	1	1425424239	\N	\N
168	1	1425438365	1425440165	1	127.0.0.1	1	1425438365	\N	\N
169	1	1425482825	1425484625	1	127.0.0.1	1	1425482825	\N	\N
170	1	1425494177	1425495977	0	127.0.0.1	1	1425494177	\N	\N
171	1	1425496869	1425498669	1	127.0.0.1	2	1425496938	\N	\N
173	1	1425508070	1425509870	1	127.0.0.1	1	1425508070	\N	\N
172	1	1425505894	1425507694	0	127.0.0.1	1	1425505894	\N	\N
174	1	1425529199	1425530999	1	127.0.0.1	1	1425529199	\N	\N
175	1	1425565788	1425567588	1	127.0.0.1	1	1425565788	\N	\N
176	1	1425577240	1425579040	1	127.0.0.1	1	1425577240	\N	\N
177	1	1425591774	1425593574	1	127.0.0.1	1	1425591774	\N	\N
194	1	1428180233	1428182033	0	127.0.0.1	1	1428180233	1428180507	127.0.0.1
178	1	1425617767	1425619567	0	127.0.0.1	1	1425617767	\N	\N
179	1	1425620050	1425621850	1	127.0.0.1	1	1425620050	\N	\N
180	1	1425647131	1425648931	1	127.0.0.1	1	1425647131	\N	\N
188	1	1426215230	1426217030	0	127.0.0.1	1	1426215230	\N	\N
195	1	1428201986	1428203786	0	127.0.0.1	1	1428201986	\N	\N
196	1	1428206330	1428208130	0	127.0.0.1	1	1428206330	1428206378	127.0.0.1
197	1	1428206387	1428213587	1	127.0.0.1	1	1428206387	\N	\N
198	1	1428271277	1428278477	1	127.0.0.1	2	1428273790	\N	\N
199	1	1428977298	1428984498	1	127.0.0.1	1	1428977298	\N	\N
200	1	1429005593	1429012793	1	127.0.0.1	1	1429005593	\N	\N
189	1	1426217568	1426219368	0	127.0.0.1	1	1426217568	\N	\N
201	1	1429013836	1429021036	1	127.0.0.1	1	1429013836	\N	\N
181	1	1425649974	1425651774	0	127.0.0.1	1	1425649974	\N	\N
182	1	1425652371	1425654171	1	127.0.0.1	1	1425652371	\N	\N
183	1	1425992865	1425994665	1	127.0.0.1	1	1425992865	\N	\N
184	1	1425997118	1425998918	1	127.0.0.1	2	1425997881	\N	\N
185	1	1426006847	1426008647	1	127.0.0.1	1	1426006847	\N	\N
186	1	1426009173	1426010973	0	127.0.0.1	1	1426009173	\N	\N
187	1	1426011020	1426012820	1	127.0.0.1	2	1426011197	\N	\N
190	1	1426219756	1426221556	0	127.0.0.1	1	1426219756	\N	\N
191	1	1426222369	1426224169	1	127.0.0.1	1	1426222369	\N	\N
192	1	1427038470	1427040270	1	127.0.0.1	1	1427038470	\N	\N
193	1	1428180055	1428181855	0	127.0.0.1	1	1428180055	1428180225	127.0.0.1
202	1	1430108582	1430115782	1	127.0.0.1	1	1430108582	\N	\N
203	1	1430186979	1430194179	1	127.0.0.1	1	1430186979	\N	\N
204	1	1430227856	1430235056	1	127.0.0.1	1	1430227856	\N	\N
205	1	1430284673	1430291873	1	127.0.0.1	1	1430284673	\N	\N
206	1	1430302860	1430310060	1	127.0.0.1	1	1430302860	\N	\N
207	1	1430705671	1430712871	1	127.0.0.1	2	1430709869	\N	\N
208	1	1430718000	1430725200	1	127.0.0.1	1	1430718000	\N	\N
209	1	1430725916	1430733116	1	127.0.0.1	1	1430725916	\N	\N
210	1	1430794759	1430801959	0	127.0.0.1	2	1430800497	\N	\N
211	1	1430802011	1430809211	1	127.0.0.1	1	1430802011	\N	\N
221	1	1432502693	1432509893	0	127.0.0.1	1	1432502693	\N	\N
222	1	1432523036	1432530236	0	::1	2	1432530062	\N	\N
212	1	1430827845	1430835045	0	127.0.0.1	2	1430834653	\N	\N
213	1	1430835181	1430842381	1	127.0.0.1	1	1430835181	\N	\N
223	1	1432530442	1432537642	1	::1	1	1432530442	\N	\N
214	1	1431314119	1431321319	0	127.0.0.1	1	1431314119	\N	\N
215	1	1431321610	1431328810	1	127.0.0.1	2	1431326514	\N	\N
216	1	1432015130	1432022330	1	127.0.0.1	3	1432018643	\N	\N
217	1	1432048762	1432055962	1	127.0.0.1	1	1432048762	\N	\N
218	1	1432058681	1432065881	1	127.0.0.1	1	1432058681	\N	\N
219	1	1432260388	1432267588	1	127.0.0.1	1	1432260388	\N	\N
220	1	1432495599	1432502799	0	127.0.0.1	2	1432502682	1432502688	127.0.0.1
224	1	1432700259	1432707459	0	127.0.0.1	1	1432700259	\N	\N
225	1	1432729073	1432736273	1	127.0.0.1	1	1432729073	\N	\N
226	1	1432813128	1432820328	1	127.0.0.1	1	1432813128	\N	\N
227	1	1432890961	1432898161	1	127.0.0.1	1	1432890961	\N	\N
228	1	1432900623	1432907823	1	127.0.0.1	1	1432900623	\N	\N
229	1	1432908721	1432915921	1	127.0.0.1	1	1432908721	\N	\N
230	1	1433041460	1433048660	1	127.0.0.1	2	1433047556	\N	\N
231	1	1433118495	1433125695	1	127.0.0.1	1	1433118495	\N	\N
232	1	1433136489	1433143689	1	127.0.0.1	1	1433136489	\N	\N
233	1	1433143989	1433151189	1	127.0.0.1	1	1433143989	\N	\N
234	1	1433180544	1433187744	1	127.0.0.1	1	1433180544	\N	\N
235	1	1433274686	1433281886	1	127.0.0.1	1	1433274686	\N	\N
236	1	1433304831	1433312031	1	127.0.0.1	1	1433304831	\N	\N
237	1	1433352583	1433359783	1	127.0.0.1	1	1433352583	\N	\N
238	1	1433360912	1433368112	1	127.0.0.1	1	1433360912	\N	\N
239	1	1433404338	1433411538	1	127.0.0.1	1	1433404338	\N	\N
\.


--
-- TOC entry 2313 (class 0 OID 0)
-- Dependencies: 170
-- Name: cruge_session_idsession_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('cruge_session_idsession_seq', 239, true);


--
-- TOC entry 2192 (class 0 OID 136779)
-- Dependencies: 171 2242
-- Data for Name: cruge_system; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY cruge_system (idsystem, name, largename, sessionmaxdurationmins, sessionmaxsameipconnections, sessionreusesessions, sessionmaxsessionsperday, sessionmaxsessionsperuser, systemnonewsessions, systemdown, registerusingcaptcha, registerusingterms, terms, registerusingactivation, defaultroleforregistration, registerusingtermslabel, registrationonlogin) FROM stdin;
1	default	\N	120	10	1	-1	-1	0	0	1	0		0			1
\.


--
-- TOC entry 2314 (class 0 OID 0)
-- Dependencies: 172
-- Name: cruge_system_idsystem_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('cruge_system_idsystem_seq', 1, false);


--
-- TOC entry 2194 (class 0 OID 136798)
-- Dependencies: 173 2242
-- Data for Name: cruge_user; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY cruge_user (iduser, regdate, actdate, logondate, username, email, password, authkey, state, totalsessioncounter, currentsessioncounter) FROM stdin;
2	\N	\N	\N	invitado	invitado	nopassword	\N	1	0	0
1	\N	\N	1433404338	admin	admin@tucorreo.com	admin	\N	1	0	0
\.


--
-- TOC entry 2315 (class 0 OID 0)
-- Dependencies: 174
-- Name: cruge_user_iduser_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('cruge_user_iduser_seq', 2, true);


SET search_path = track, pg_catalog;

--
-- TOC entry 2316 (class 0 OID 0)
-- Dependencies: 176
-- Name: Apertura_id_apertura_seq; Type: SEQUENCE SET; Schema: track; Owner: postgres
--

SELECT pg_catalog.setval('"Apertura_id_apertura_seq"', 1, false);


--
-- TOC entry 2198 (class 0 OID 136811)
-- Dependencies: 177 2242
-- Data for Name: admision; Type: TABLE DATA; Schema: track; Owner: postgres
--

COPY admision (id_admision, peso_admision, precio_admision, dimension_admision, pago_recepcion, es_activo, fk_estatus, create_date, modified_by, id_sede, id_cliente, empaque, articulo, tipo_envio, fk_receptor, cod_paquete, estado, fecha_entrega) FROM stdin;
9	50	26		t	t	\N	04:50:02-04:30	\N	7	13	2	20	2	13	XP29057001VE	1	2015-05-22
10	140	20		t	t	\N	04:50:02-04:30	\N	7	13	2	23	1	13	XP2905102VE	1	2015-05-22
11	150	26		t	t	\N	04:50:02-04:30	\N	7	13	2	17	2	13	XP290543VE	1	2015-05-28
\.


--
-- TOC entry 2317 (class 0 OID 0)
-- Dependencies: 178
-- Name: admision_id_admision_seq; Type: SEQUENCE SET; Schema: track; Owner: postgres
--

SELECT pg_catalog.setval('admision_id_admision_seq', 11, true);


--
-- TOC entry 2196 (class 0 OID 136806)
-- Dependencies: 175 2242
-- Data for Name: apertura; Type: TABLE DATA; Schema: track; Owner: postgres
--

COPY apertura (id_apertura, fk_despacho, fk_motivo, status) FROM stdin;
\.


--
-- TOC entry 2200 (class 0 OID 136819)
-- Dependencies: 179 2242
-- Data for Name: bitacora_transito; Type: TABLE DATA; Schema: track; Owner: postgres
--

COPY bitacora_transito (id_transito, fksede_salida, fecha_salida, fksede_llegada, fecha_llegada, id_fkestatus, create_date, modified_date, peso_salida, peso_llegada, fk_despacho) FROM stdin;
\.


--
-- TOC entry 2201 (class 0 OID 136822)
-- Dependencies: 180 2242
-- Data for Name: cliente_contacto; Type: TABLE DATA; Schema: track; Owner: postgres
--

COPY cliente_contacto (id_cliente, id_contacto) FROM stdin;
\.


--
-- TOC entry 2202 (class 0 OID 136825)
-- Dependencies: 181 2242
-- Data for Name: clientes; Type: TABLE DATA; Schema: track; Owner: postgres
--

COPY clientes (id_cliente, nb_cliente, apellido_cliente, cedula_cliente, es_activo, create_date, modified_date, id_contacto, nacionalidad, fk_created_by) FROM stdin;
12	nathaniel	cedeño	17643429	t	04:47:04-04:30	\N	\N	1	1
13	nathaniel	cedeño	17643429	t	04:50:02-04:30	\N	\N	1	1
\.


--
-- TOC entry 2318 (class 0 OID 0)
-- Dependencies: 182
-- Name: clientes_id_cliente_seq; Type: SEQUENCE SET; Schema: track; Owner: postgres
--

SELECT pg_catalog.setval('clientes_id_cliente_seq', 13, true);


--
-- TOC entry 2226 (class 0 OID 137059)
-- Dependencies: 205 2242
-- Data for Name: conductor; Type: TABLE DATA; Schema: track; Owner: postgres
--

COPY conductor (id_persona, nombre, apellido, nacionalidad, cedula, tipo_trab, licencia, grado, es_activo) FROM stdin;
2	Pedro	Perez	1	17985656	\N	t	4	t
\.


--
-- TOC entry 2319 (class 0 OID 0)
-- Dependencies: 206
-- Name: conductor_id_persona_seq; Type: SEQUENCE SET; Schema: track; Owner: postgres
--

SELECT pg_catalog.setval('conductor_id_persona_seq', 2, true);


--
-- TOC entry 2204 (class 0 OID 136831)
-- Dependencies: 183 2242
-- Data for Name: contacto; Type: TABLE DATA; Schema: track; Owner: postgres
--

COPY contacto (id_contacto, contacto, create_date, modified_by, fk_estatus, fk_created_by) FROM stdin;
12	02126356565	04:50:02-04:30	\N	\N	1
13	02126356565	04:50:02-04:30	\N	\N	1
\.


--
-- TOC entry 2320 (class 0 OID 0)
-- Dependencies: 184
-- Name: contacto_id_contacto_seq; Type: SEQUENCE SET; Schema: track; Owner: postgres
--

SELECT pg_catalog.setval('contacto_id_contacto_seq', 13, true);


--
-- TOC entry 2206 (class 0 OID 136839)
-- Dependencies: 185 2242
-- Data for Name: desp_envio; Type: TABLE DATA; Schema: track; Owner: postgres
--

COPY desp_envio (id_despacho, id_envio) FROM stdin;
\.


--
-- TOC entry 2207 (class 0 OID 136842)
-- Dependencies: 186 2242
-- Data for Name: despacho; Type: TABLE DATA; Schema: track; Owner: postgres
--

COPY despacho (id_despacho, tipo_despacho, fk_transporte, fecha_despacho, serial_precinto) FROM stdin;
\.


--
-- TOC entry 2321 (class 0 OID 0)
-- Dependencies: 187
-- Name: despacho_id_despacho_seq; Type: SEQUENCE SET; Schema: track; Owner: postgres
--

SELECT pg_catalog.setval('despacho_id_despacho_seq', 1, false);


--
-- TOC entry 2209 (class 0 OID 136847)
-- Dependencies: 188 2242
-- Data for Name: envio; Type: TABLE DATA; Schema: track; Owner: postgres
--

COPY envio (id_envio, tipo_envio, cant_articulo, codigo_envio, create_date, modified_date, num_saca, peso_total) FROM stdin;
8	1	2	xxx	08:24:45-04:30	\N	455	290
9	2	1	EM000000009VE	22:52:11-04:30	\N		50
\.


--
-- TOC entry 2322 (class 0 OID 0)
-- Dependencies: 189
-- Name: envio_id_envio_seq; Type: SEQUENCE SET; Schema: track; Owner: postgres
--

SELECT pg_catalog.setval('envio_id_envio_seq', 9, true);


--
-- TOC entry 2211 (class 0 OID 136852)
-- Dependencies: 190 2242
-- Data for Name: envio_paquete; Type: TABLE DATA; Schema: track; Owner: postgres
--

COPY envio_paquete (id_admision, id_envio) FROM stdin;
10	8
11	8
9	9
\.


--
-- TOC entry 2228 (class 0 OID 137064)
-- Dependencies: 207 2242
-- Data for Name: gps; Type: TABLE DATA; Schema: track; Owner: postgres
--

COPY gps (id_gps, id_vehiculo, codigo, modelo, reporta, imei, sim_card, fecha_instalacion, linea) FROM stdin;
\.


--
-- TOC entry 2323 (class 0 OID 0)
-- Dependencies: 208
-- Name: gps_id_gps_seq; Type: SEQUENCE SET; Schema: track; Owner: postgres
--

SELECT pg_catalog.setval('gps_id_gps_seq', 1, false);


--
-- TOC entry 2212 (class 0 OID 136855)
-- Dependencies: 191 2242
-- Data for Name: maestro; Type: TABLE DATA; Schema: track; Owner: postgres
--

COPY maestro (id_maestro, descripcion, padre, hijo) FROM stdin;
1	Nacionalidad	1	0
2	Venezolano	1	1
3	Extranjero	1	2
4	Tipo Empaque	2	0
5	Sobre	2	1
6	Valija	2	2
7	Tipo Envio	3	0
11	Gobierno	1	4
10	Juridico	1	3
8	Urbano	3	1
9	Intraestatal	3	2
12	Nacional	3	3
13	Articulos	4	0
15	Productos del reino vegetal	4	2
18	Productos de la química o industrias conexas 	4	5
19	Materias textiles y sus manufacturas	4	6
22	Metales comunes y manufacturas de metal	4	9
24	Mercancías y productos diversos	4	11
25	Objetos de arte, de colección o de antigüedades	4	12
14	Animales vivos	4	1
17	Productos de las industrias alimentarías	4	4
23	Óptica, fotografía o cinematografía, de medida, control, precisión, médico o quirúrgico, instrumentos y aparatos	4	10
16	Animales o vegetales, grasas y aceites y sus productos de desdoblamiento	4	3
20	Calzado, sombrerería, paraguas, sombrillas, bastones, bastones-asiento, látigos, fustas y sus partes	4	7
21	Manufacturas de piedra, yeso, cemento, amianto, mica o materias análogas	4	8
29	GENERO PERSONA	29	0
30	Femenino	29	1
31	Masculino	29	2
27	Saca	5	1
28	Paquete al Descubierto	5	2
26	Tipo Despacho	26	0
32	Motivos	32	0
33	pruebas motivos	32	1
\.


--
-- TOC entry 2324 (class 0 OID 0)
-- Dependencies: 192
-- Name: maestro_id_maestro_seq; Type: SEQUENCE SET; Schema: track; Owner: postgres
--

SELECT pg_catalog.setval('maestro_id_maestro_seq', 33, true);


--
-- TOC entry 2230 (class 0 OID 137069)
-- Dependencies: 209 2242
-- Data for Name: marca; Type: TABLE DATA; Schema: track; Owner: postgres
--

COPY marca (id_marca, descripcion) FROM stdin;
1	Toyota
2	Chevrolet
3	Jeep
4	Suzuki
5	Yamaha
6	Honda
\.


--
-- TOC entry 2325 (class 0 OID 0)
-- Dependencies: 210
-- Name: marca_id_marca_seq; Type: SEQUENCE SET; Schema: track; Owner: postgres
--

SELECT pg_catalog.setval('marca_id_marca_seq', 6, true);


--
-- TOC entry 2232 (class 0 OID 137074)
-- Dependencies: 211 2242
-- Data for Name: marca_tvehiculo; Type: TABLE DATA; Schema: track; Owner: postgres
--

COPY marca_tvehiculo (id_marca, id_tipov) FROM stdin;
\.


--
-- TOC entry 2233 (class 0 OID 137077)
-- Dependencies: 212 2242
-- Data for Name: modelo; Type: TABLE DATA; Schema: track; Owner: postgres
--

COPY modelo (id_modelo, descripcion, fk_marca) FROM stdin;
1	V-strom	4
\.


--
-- TOC entry 2326 (class 0 OID 0)
-- Dependencies: 213
-- Name: modelo_id_modelo_seq; Type: SEQUENCE SET; Schema: track; Owner: postgres
--

SELECT pg_catalog.setval('modelo_id_modelo_seq', 2, true);


--
-- TOC entry 2235 (class 0 OID 137082)
-- Dependencies: 214 2242
-- Data for Name: nocturno; Type: TABLE DATA; Schema: track; Owner: postgres
--

COPY nocturno (id_nocturno, fecha_registro, pernorta) FROM stdin;
\.


--
-- TOC entry 2327 (class 0 OID 0)
-- Dependencies: 215
-- Name: nocturno_id_nocturno_seq; Type: SEQUENCE SET; Schema: track; Owner: postgres
--

SELECT pg_catalog.setval('nocturno_id_nocturno_seq', 1, false);


--
-- TOC entry 2237 (class 0 OID 137087)
-- Dependencies: 216 2242
-- Data for Name: nocturno_vehiculo; Type: TABLE DATA; Schema: track; Owner: postgres
--

COPY nocturno_vehiculo (id_nocturno, id_vehiculo) FROM stdin;
\.


--
-- TOC entry 2214 (class 0 OID 136860)
-- Dependencies: 193 2242
-- Data for Name: obser_desp; Type: TABLE DATA; Schema: track; Owner: postgres
--

COPY obser_desp (id_observacion, id_despacho) FROM stdin;
\.


--
-- TOC entry 2215 (class 0 OID 136863)
-- Dependencies: 194 2242
-- Data for Name: obser_transito; Type: TABLE DATA; Schema: track; Owner: postgres
--

COPY obser_transito (id_observacion, id_transito) FROM stdin;
\.


--
-- TOC entry 2216 (class 0 OID 136866)
-- Dependencies: 195 2242
-- Data for Name: observacion; Type: TABLE DATA; Schema: track; Owner: postgres
--

COPY observacion (id_observacion, descripcion, status) FROM stdin;
\.


--
-- TOC entry 2328 (class 0 OID 0)
-- Dependencies: 196
-- Name: observacion_id_observacion_seq; Type: SEQUENCE SET; Schema: track; Owner: postgres
--

SELECT pg_catalog.setval('observacion_id_observacion_seq', 1, false);


--
-- TOC entry 2218 (class 0 OID 136874)
-- Dependencies: 197 2242
-- Data for Name: receptor; Type: TABLE DATA; Schema: track; Owner: postgres
--

COPY receptor (id_receptor, nb_receptor, apellido_receptor, direccion_receptor, es_activo, create_date, modified_date, nacionalidad, cedula_receptor, fk_created_by) FROM stdin;
12			\N	\N	04:47:04-04:30	\N	3	\N	1
13	minmujer		\N	\N	04:50:02-04:30	\N	3	2325230	1
\.


--
-- TOC entry 2219 (class 0 OID 136880)
-- Dependencies: 198 2242
-- Data for Name: receptor_contacto; Type: TABLE DATA; Schema: track; Owner: postgres
--

COPY receptor_contacto (id_receptor, id_contacto) FROM stdin;
13	13
\.


--
-- TOC entry 2329 (class 0 OID 0)
-- Dependencies: 199
-- Name: receptor_id_receptor_seq; Type: SEQUENCE SET; Schema: track; Owner: postgres
--

SELECT pg_catalog.setval('receptor_id_receptor_seq', 13, true);


--
-- TOC entry 2330 (class 0 OID 0)
-- Dependencies: 200
-- Name: ruta_entrega_id_rutae_seq; Type: SEQUENCE SET; Schema: track; Owner: postgres
--

SELECT pg_catalog.setval('ruta_entrega_id_rutae_seq', 1, false);


--
-- TOC entry 2222 (class 0 OID 136887)
-- Dependencies: 201 2242
-- Data for Name: sedes; Type: TABLE DATA; Schema: track; Owner: postgres
--

COPY sedes (id_sede, nb_sede, direccion_sede, fk_estado, fk_municipio, fk_parroquia, fk_estatus, create_date, modified_by, es_activo, tipo_sede, fk_sede, fk_created_by, localidad) FROM stdin;
6	\N	setgfdrhgfrtjhtf	1	1	10	1	2015-04-29 06:18:58-04:30	\N	\N	\N	\N	1	\N
7	\N	oficina central	1	1	10	1	2015-05-29 04:50:02-04:30	\N	\N	\N	\N	1	\N
\.


--
-- TOC entry 2331 (class 0 OID 0)
-- Dependencies: 202
-- Name: sedes_id_sede_seq; Type: SEQUENCE SET; Schema: track; Owner: postgres
--

SELECT pg_catalog.setval('sedes_id_sede_seq', 7, true);


--
-- TOC entry 2224 (class 0 OID 136896)
-- Dependencies: 203 2242
-- Data for Name: tarifario; Type: TABLE DATA; Schema: track; Owner: postgres
--

COPY tarifario (peso, tipo_envio, precio_unitario, iva, precio_total, id_tarifario) FROM stdin;
500	1	20.00	2.40	22.40	1
2000	1	30.00	3.60	33.60	2
5000	1	32.00	3.84	35.84	3
6000	1	35.50	4.26	39.76	4
7000	1	39.00	4.68	43.68	5
8000	1	42.50	5.10	47.60	6
9000	1	46.00	5.52	51.52	7
10000	1	49.50	5.94	55.44	8
11000	1	53.00	6.36	59.36	9
12000	1	56.50	6.78	63.28	10
13000	1	60.00	7.20	67.20	11
14000	1	63.50	7.62	71.12	12
15000	1	67.00	8.04	75.04	13
16000	1	70.50	8.46	78.96	14
17000	1	74.00	8.88	82.88	15
18000	1	77.50	9.30	86.80	16
19000	1	81.00	9.72	90.72	17
20000	1	84.50	10.14	94.64	18
21000	1	88.00	10.56	98.56	19
22000	1	91.50	10.98	102.48	20
23000	1	95.00	11.40	106.40	21
24000	1	98.50	11.82	110.32	22
25000	1	102.00	12.24	114.24	23
26000	1	105.50	12.66	118.16	24
27000	1	109.00	13.08	122.08	25
28000	1	112.50	13.50	126.00	26
29000	1	116.00	13.92	129.92	27
30000	1	119.50	14.34	133.84	28
500	2	26.00	3.12	29.12	29
2000	2	33.00	3.96	36.96	30
3000	2	44.00	5.28	49.28	31
\.


--
-- TOC entry 2332 (class 0 OID 0)
-- Dependencies: 204
-- Name: tarifario_id_tarifario_seq; Type: SEQUENCE SET; Schema: track; Owner: postgres
--

SELECT pg_catalog.setval('tarifario_id_tarifario_seq', 31, true);


--
-- TOC entry 2238 (class 0 OID 137090)
-- Dependencies: 217 2242
-- Data for Name: tipo_vehiculo; Type: TABLE DATA; Schema: track; Owner: postgres
--

COPY tipo_vehiculo (id_tipov, descripcion) FROM stdin;
2	Camioneta 4x2
3	Camioneta 4x4
1	Moto x
\.


--
-- TOC entry 2333 (class 0 OID 0)
-- Dependencies: 218
-- Name: tipo_vehiculo_id_tipov_seq; Type: SEQUENCE SET; Schema: track; Owner: postgres
--

SELECT pg_catalog.setval('tipo_vehiculo_id_tipov_seq', 3, true);


--
-- TOC entry 2240 (class 0 OID 137095)
-- Dependencies: 219 2242
-- Data for Name: vehiculo; Type: TABLE DATA; Schema: track; Owner: postgres
--

COPY vehiculo (id_vehiculo, placa, serial_carroseria, serial_motor, color, descripcion, anio, transmision, tipov, marca, rotulado, numero, logo, dependencia, modelo) FROM stdin;
17	ABN254	sfdsf		sfdsf	\N	1899	2	1	6	\N	\N	\N	3	1
\.


--
-- TOC entry 2334 (class 0 OID 0)
-- Dependencies: 220
-- Name: vehiculo_id_vehiculo_seq; Type: SEQUENCE SET; Schema: track; Owner: postgres
--

SELECT pg_catalog.setval('vehiculo_id_vehiculo_seq', 18, true);


SET search_path = public, pg_catalog;

--
-- TOC entry 1993 (class 2606 OID 136919)
-- Dependencies: 162 162 162 2243
-- Name: cruge_authassignment_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY cruge_authassignment
    ADD CONSTRAINT cruge_authassignment_pkey PRIMARY KEY (userid, itemname);


--
-- TOC entry 1995 (class 2606 OID 136921)
-- Dependencies: 163 163 2243
-- Name: cruge_authitem_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY cruge_authitem
    ADD CONSTRAINT cruge_authitem_pkey PRIMARY KEY (name);


--
-- TOC entry 1997 (class 2606 OID 136923)
-- Dependencies: 164 164 164 2243
-- Name: cruge_authitemchild_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY cruge_authitemchild
    ADD CONSTRAINT cruge_authitemchild_pkey PRIMARY KEY (parent, child);


--
-- TOC entry 1999 (class 2606 OID 136925)
-- Dependencies: 165 165 2243
-- Name: cruge_field_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY cruge_field
    ADD CONSTRAINT cruge_field_pkey PRIMARY KEY (idfield);


--
-- TOC entry 2001 (class 2606 OID 136927)
-- Dependencies: 167 167 2243
-- Name: cruge_fieldvalue_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY cruge_fieldvalue
    ADD CONSTRAINT cruge_fieldvalue_pkey PRIMARY KEY (idfieldvalue);


--
-- TOC entry 2003 (class 2606 OID 136929)
-- Dependencies: 169 169 2243
-- Name: cruge_session_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY cruge_session
    ADD CONSTRAINT cruge_session_pkey PRIMARY KEY (idsession);


--
-- TOC entry 2005 (class 2606 OID 136931)
-- Dependencies: 171 171 2243
-- Name: cruge_system_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY cruge_system
    ADD CONSTRAINT cruge_system_pkey PRIMARY KEY (idsystem);


--
-- TOC entry 2007 (class 2606 OID 136933)
-- Dependencies: 173 173 2243
-- Name: cruge_user_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY cruge_user
    ADD CONSTRAINT cruge_user_pkey PRIMARY KEY (iduser);


SET search_path = track, pg_catalog;

--
-- TOC entry 2009 (class 2606 OID 136935)
-- Dependencies: 175 175 2243
-- Name: Apertura_pkey; Type: CONSTRAINT; Schema: track; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY apertura
    ADD CONSTRAINT "Apertura_pkey" PRIMARY KEY (id_apertura);


--
-- TOC entry 2011 (class 2606 OID 136937)
-- Dependencies: 177 177 2243
-- Name: admision_pkey; Type: CONSTRAINT; Schema: track; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY admision
    ADD CONSTRAINT admision_pkey PRIMARY KEY (id_admision);


--
-- TOC entry 2015 (class 2606 OID 136939)
-- Dependencies: 180 180 180 2243
-- Name: cli_cont; Type: CONSTRAINT; Schema: track; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY cliente_contacto
    ADD CONSTRAINT cli_cont PRIMARY KEY (id_cliente, id_contacto);


--
-- TOC entry 2017 (class 2606 OID 136942)
-- Dependencies: 181 181 2243
-- Name: clientes_pkey; Type: CONSTRAINT; Schema: track; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY clientes
    ADD CONSTRAINT clientes_pkey PRIMARY KEY (id_cliente);


--
-- TOC entry 2043 (class 2606 OID 137108)
-- Dependencies: 205 205 2243
-- Name: conductor_pk_id; Type: CONSTRAINT; Schema: track; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY conductor
    ADD CONSTRAINT conductor_pk_id PRIMARY KEY (id_persona);


--
-- TOC entry 2037 (class 2606 OID 136944)
-- Dependencies: 198 198 198 2243
-- Name: contac_recep; Type: CONSTRAINT; Schema: track; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY receptor_contacto
    ADD CONSTRAINT contac_recep PRIMARY KEY (id_receptor, id_contacto);


--
-- TOC entry 2019 (class 2606 OID 136946)
-- Dependencies: 183 183 2243
-- Name: contacto_pkey; Type: CONSTRAINT; Schema: track; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY contacto
    ADD CONSTRAINT contacto_pkey PRIMARY KEY (id_contacto);


--
-- TOC entry 2021 (class 2606 OID 136948)
-- Dependencies: 185 185 185 2243
-- Name: desp_envio_pkey; Type: CONSTRAINT; Schema: track; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY desp_envio
    ADD CONSTRAINT desp_envio_pkey PRIMARY KEY (id_despacho, id_envio);


--
-- TOC entry 2025 (class 2606 OID 136950)
-- Dependencies: 188 188 2243
-- Name: envio_pkey; Type: CONSTRAINT; Schema: track; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY envio
    ADD CONSTRAINT envio_pkey PRIMARY KEY (id_envio);


--
-- TOC entry 2045 (class 2606 OID 137110)
-- Dependencies: 207 207 2243
-- Name: gps_pk_id; Type: CONSTRAINT; Schema: track; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY gps
    ADD CONSTRAINT gps_pk_id PRIMARY KEY (id_gps);


--
-- TOC entry 2023 (class 2606 OID 136952)
-- Dependencies: 186 186 2243
-- Name: id_; Type: CONSTRAINT; Schema: track; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY despacho
    ADD CONSTRAINT id_ PRIMARY KEY (id_despacho);


--
-- TOC entry 2041 (class 2606 OID 136954)
-- Dependencies: 203 203 2243
-- Name: id_tarifario; Type: CONSTRAINT; Schema: track; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY tarifario
    ADD CONSTRAINT id_tarifario PRIMARY KEY (id_tarifario);


--
-- TOC entry 2027 (class 2606 OID 136956)
-- Dependencies: 191 191 2243
-- Name: maestro_pkey; Type: CONSTRAINT; Schema: track; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY maestro
    ADD CONSTRAINT maestro_pkey PRIMARY KEY (id_maestro);


--
-- TOC entry 2047 (class 2606 OID 137112)
-- Dependencies: 209 209 2243
-- Name: marca_pk_id; Type: CONSTRAINT; Schema: track; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY marca
    ADD CONSTRAINT marca_pk_id PRIMARY KEY (id_marca);


--
-- TOC entry 2049 (class 2606 OID 137114)
-- Dependencies: 212 212 2243
-- Name: modelo_pk_id; Type: CONSTRAINT; Schema: track; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY modelo
    ADD CONSTRAINT modelo_pk_id PRIMARY KEY (id_modelo);


--
-- TOC entry 2051 (class 2606 OID 137116)
-- Dependencies: 214 214 2243
-- Name: nocturno_pk_id; Type: CONSTRAINT; Schema: track; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY nocturno
    ADD CONSTRAINT nocturno_pk_id PRIMARY KEY (id_nocturno);


--
-- TOC entry 2029 (class 2606 OID 136958)
-- Dependencies: 193 193 193 2243
-- Name: obser_desp_pkey; Type: CONSTRAINT; Schema: track; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY obser_desp
    ADD CONSTRAINT obser_desp_pkey PRIMARY KEY (id_observacion, id_despacho);


--
-- TOC entry 2031 (class 2606 OID 136960)
-- Dependencies: 194 194 194 2243
-- Name: obser_transito_pkey; Type: CONSTRAINT; Schema: track; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY obser_transito
    ADD CONSTRAINT obser_transito_pkey PRIMARY KEY (id_observacion, id_transito);


--
-- TOC entry 2033 (class 2606 OID 136962)
-- Dependencies: 195 195 2243
-- Name: observacion_pkey; Type: CONSTRAINT; Schema: track; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY observacion
    ADD CONSTRAINT observacion_pkey PRIMARY KEY (id_observacion);


--
-- TOC entry 2035 (class 2606 OID 136964)
-- Dependencies: 197 197 2243
-- Name: receptor_pkey; Type: CONSTRAINT; Schema: track; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY receptor
    ADD CONSTRAINT receptor_pkey PRIMARY KEY (id_receptor);


--
-- TOC entry 2013 (class 2606 OID 136966)
-- Dependencies: 179 179 2243
-- Name: ruta_entrega_pkey; Type: CONSTRAINT; Schema: track; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY bitacora_transito
    ADD CONSTRAINT ruta_entrega_pkey PRIMARY KEY (id_transito);


--
-- TOC entry 2039 (class 2606 OID 136968)
-- Dependencies: 201 201 2243
-- Name: sedes_pkey; Type: CONSTRAINT; Schema: track; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY sedes
    ADD CONSTRAINT sedes_pkey PRIMARY KEY (id_sede);


--
-- TOC entry 2053 (class 2606 OID 137118)
-- Dependencies: 217 217 2243
-- Name: tvehiculo_pk_id; Type: CONSTRAINT; Schema: track; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY tipo_vehiculo
    ADD CONSTRAINT tvehiculo_pk_id PRIMARY KEY (id_tipov);


--
-- TOC entry 2055 (class 2606 OID 137120)
-- Dependencies: 219 219 2243
-- Name: vehiculo_pk_id; Type: CONSTRAINT; Schema: track; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY vehiculo
    ADD CONSTRAINT vehiculo_pk_id PRIMARY KEY (id_vehiculo);


SET search_path = public, pg_catalog;

--
-- TOC entry 2058 (class 2606 OID 136969)
-- Dependencies: 164 1994 163 2243
-- Name: crugeauthitemchild_ibfk_1; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY cruge_authitemchild
    ADD CONSTRAINT crugeauthitemchild_ibfk_1 FOREIGN KEY (parent) REFERENCES cruge_authitem(name) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 2059 (class 2606 OID 136974)
-- Dependencies: 1994 164 163 2243
-- Name: crugeauthitemchild_ibfk_2; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY cruge_authitemchild
    ADD CONSTRAINT crugeauthitemchild_ibfk_2 FOREIGN KEY (child) REFERENCES cruge_authitem(name) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 2056 (class 2606 OID 136979)
-- Dependencies: 163 1994 162 2243
-- Name: fk_cruge_authassignment_cruge_authitem1; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY cruge_authassignment
    ADD CONSTRAINT fk_cruge_authassignment_cruge_authitem1 FOREIGN KEY (itemname) REFERENCES cruge_authitem(name);


--
-- TOC entry 2057 (class 2606 OID 136984)
-- Dependencies: 173 2006 162 2243
-- Name: fk_cruge_authassignment_user; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY cruge_authassignment
    ADD CONSTRAINT fk_cruge_authassignment_user FOREIGN KEY (userid) REFERENCES cruge_user(iduser) ON DELETE CASCADE;


--
-- TOC entry 2060 (class 2606 OID 136989)
-- Dependencies: 167 165 1998 2243
-- Name: fk_cruge_fieldvalue_cruge_field1; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY cruge_fieldvalue
    ADD CONSTRAINT fk_cruge_fieldvalue_cruge_field1 FOREIGN KEY (idfield) REFERENCES cruge_field(idfield) ON DELETE CASCADE;


--
-- TOC entry 2061 (class 2606 OID 136994)
-- Dependencies: 167 2006 173 2243
-- Name: fk_cruge_fieldvalue_cruge_user1; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY cruge_fieldvalue
    ADD CONSTRAINT fk_cruge_fieldvalue_cruge_user1 FOREIGN KEY (iduser) REFERENCES cruge_user(iduser) ON DELETE CASCADE;


SET search_path = track, pg_catalog;

--
-- TOC entry 2063 (class 2606 OID 136999)
-- Dependencies: 177 2016 181 2243
-- Name: admision_id_cliente_fkey; Type: FK CONSTRAINT; Schema: track; Owner: postgres
--

ALTER TABLE ONLY admision
    ADD CONSTRAINT admision_id_cliente_fkey FOREIGN KEY (id_cliente) REFERENCES clientes(id_cliente) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- TOC entry 2062 (class 2606 OID 137004)
-- Dependencies: 2022 186 175 2243
-- Name: apert_desp; Type: FK CONSTRAINT; Schema: track; Owner: postgres
--

ALTER TABLE ONLY apertura
    ADD CONSTRAINT apert_desp FOREIGN KEY (fk_despacho) REFERENCES despacho(id_despacho);


--
-- TOC entry 2066 (class 2606 OID 137009)
-- Dependencies: 183 2018 181 2243
-- Name: clientes_id_contacto_fkey; Type: FK CONSTRAINT; Schema: track; Owner: postgres
--

ALTER TABLE ONLY clientes
    ADD CONSTRAINT clientes_id_contacto_fkey FOREIGN KEY (id_contacto) REFERENCES contacto(id_contacto) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- TOC entry 2072 (class 2606 OID 137014)
-- Dependencies: 2018 198 183 2243
-- Name: contac; Type: FK CONSTRAINT; Schema: track; Owner: postgres
--

ALTER TABLE ONLY receptor_contacto
    ADD CONSTRAINT contac FOREIGN KEY (id_contacto) REFERENCES contacto(id_contacto);


--
-- TOC entry 2067 (class 2606 OID 137019)
-- Dependencies: 2022 185 186 2243
-- Name: desp_desp; Type: FK CONSTRAINT; Schema: track; Owner: postgres
--

ALTER TABLE ONLY desp_envio
    ADD CONSTRAINT desp_desp FOREIGN KEY (id_despacho) REFERENCES despacho(id_despacho);


--
-- TOC entry 2068 (class 2606 OID 137024)
-- Dependencies: 188 2024 185 2243
-- Name: desp_env; Type: FK CONSTRAINT; Schema: track; Owner: postgres
--

ALTER TABLE ONLY desp_envio
    ADD CONSTRAINT desp_env FOREIGN KEY (id_envio) REFERENCES envio(id_envio);


--
-- TOC entry 2065 (class 2606 OID 137029)
-- Dependencies: 186 2022 179 2243
-- Name: fk_bita_desp; Type: FK CONSTRAINT; Schema: track; Owner: postgres
--

ALTER TABLE ONLY bitacora_transito
    ADD CONSTRAINT fk_bita_desp FOREIGN KEY (fk_despacho) REFERENCES despacho(id_despacho);


--
-- TOC entry 2074 (class 2606 OID 137121)
-- Dependencies: 219 2054 207 2243
-- Name: gps_vehiculo; Type: FK CONSTRAINT; Schema: track; Owner: postgres
--

ALTER TABLE ONLY gps
    ADD CONSTRAINT gps_vehiculo FOREIGN KEY (id_vehiculo) REFERENCES vehiculo(id_vehiculo);


--
-- TOC entry 2075 (class 2606 OID 137126)
-- Dependencies: 209 211 2046 2243
-- Name: marca_tipov; Type: FK CONSTRAINT; Schema: track; Owner: postgres
--

ALTER TABLE ONLY marca_tvehiculo
    ADD CONSTRAINT marca_tipov FOREIGN KEY (id_marca) REFERENCES marca(id_marca);


--
-- TOC entry 2077 (class 2606 OID 137131)
-- Dependencies: 212 209 2046 2243
-- Name: modelo_marca; Type: FK CONSTRAINT; Schema: track; Owner: postgres
--

ALTER TABLE ONLY modelo
    ADD CONSTRAINT modelo_marca FOREIGN KEY (fk_marca) REFERENCES marca(id_marca);


--
-- TOC entry 2078 (class 2606 OID 137136)
-- Dependencies: 2054 216 219 2243
-- Name: noct_vehiculo; Type: FK CONSTRAINT; Schema: track; Owner: postgres
--

ALTER TABLE ONLY nocturno_vehiculo
    ADD CONSTRAINT noct_vehiculo FOREIGN KEY (id_vehiculo) REFERENCES vehiculo(id_vehiculo);


--
-- TOC entry 2070 (class 2606 OID 137034)
-- Dependencies: 2012 179 194 2243
-- Name: ob_trans; Type: FK CONSTRAINT; Schema: track; Owner: postgres
--

ALTER TABLE ONLY obser_transito
    ADD CONSTRAINT ob_trans FOREIGN KEY (id_transito) REFERENCES bitacora_transito(id_transito);


--
-- TOC entry 2069 (class 2606 OID 137039)
-- Dependencies: 195 193 2032 2243
-- Name: obs1_obs1; Type: FK CONSTRAINT; Schema: track; Owner: postgres
--

ALTER TABLE ONLY obser_desp
    ADD CONSTRAINT obs1_obs1 FOREIGN KEY (id_observacion) REFERENCES observacion(id_observacion);


--
-- TOC entry 2071 (class 2606 OID 137044)
-- Dependencies: 194 2032 195 2243
-- Name: obs_obs; Type: FK CONSTRAINT; Schema: track; Owner: postgres
--

ALTER TABLE ONLY obser_transito
    ADD CONSTRAINT obs_obs FOREIGN KEY (id_observacion) REFERENCES observacion(id_observacion);


--
-- TOC entry 2073 (class 2606 OID 137049)
-- Dependencies: 197 2034 198 2243
-- Name: recep; Type: FK CONSTRAINT; Schema: track; Owner: postgres
--

ALTER TABLE ONLY receptor_contacto
    ADD CONSTRAINT recep FOREIGN KEY (id_receptor) REFERENCES receptor(id_receptor);


--
-- TOC entry 2064 (class 2606 OID 137054)
-- Dependencies: 2034 177 197 2243
-- Name: recept; Type: FK CONSTRAINT; Schema: track; Owner: postgres
--

ALTER TABLE ONLY admision
    ADD CONSTRAINT recept FOREIGN KEY (fk_receptor) REFERENCES receptor(id_receptor);


--
-- TOC entry 2076 (class 2606 OID 137141)
-- Dependencies: 211 2052 217 2243
-- Name: tipov_marca; Type: FK CONSTRAINT; Schema: track; Owner: postgres
--

ALTER TABLE ONLY marca_tvehiculo
    ADD CONSTRAINT tipov_marca FOREIGN KEY (id_tipov) REFERENCES tipo_vehiculo(id_tipov);


--
-- TOC entry 2080 (class 2606 OID 137146)
-- Dependencies: 2046 219 209 2243
-- Name: vehiculo_marca; Type: FK CONSTRAINT; Schema: track; Owner: postgres
--

ALTER TABLE ONLY vehiculo
    ADD CONSTRAINT vehiculo_marca FOREIGN KEY (marca) REFERENCES marca(id_marca);


--
-- TOC entry 2079 (class 2606 OID 137151)
-- Dependencies: 214 216 2050 2243
-- Name: vehiculo_noct; Type: FK CONSTRAINT; Schema: track; Owner: postgres
--

ALTER TABLE ONLY nocturno_vehiculo
    ADD CONSTRAINT vehiculo_noct FOREIGN KEY (id_nocturno) REFERENCES nocturno(id_nocturno);


--
-- TOC entry 2081 (class 2606 OID 137156)
-- Dependencies: 217 2052 219 2243
-- Name: vehiculo_tipo; Type: FK CONSTRAINT; Schema: track; Owner: postgres
--

ALTER TABLE ONLY vehiculo
    ADD CONSTRAINT vehiculo_tipo FOREIGN KEY (tipov) REFERENCES tipo_vehiculo(id_tipov);


--
-- TOC entry 2248 (class 0 OID 0)
-- Dependencies: 7
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- TOC entry 2307 (class 0 OID 0)
-- Dependencies: 203
-- Name: tarifario; Type: ACL; Schema: track; Owner: postgres
--

REVOKE ALL ON TABLE tarifario FROM PUBLIC;
REVOKE ALL ON TABLE tarifario FROM postgres;
GRANT ALL ON TABLE tarifario TO postgres;


-- Completed on 2015-06-04 08:13:40 VET

--
-- PostgreSQL database dump complete
--

