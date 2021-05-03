--
-- PostgreSQL database dump
--

-- Dumped from database version 9.6.6
-- Dumped by pg_dump version 9.6.6

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: apartado; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE apartado (
    id_apartado_usuario integer NOT NULL,
    id_usuario integer,
    fecha_hora_apartado character varying(20),
    estatus integer,
    precio_unidad character varying(200)
);


ALTER TABLE apartado OWNER TO postgres;

--
-- Name: apartados_usuario_id_apartado_usuario_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE apartados_usuario_id_apartado_usuario_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE apartados_usuario_id_apartado_usuario_seq OWNER TO postgres;

--
-- Name: apartados_usuario_id_apartado_usuario_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE apartados_usuario_id_apartado_usuario_seq OWNED BY apartado.id_apartado_usuario;


--
-- Name: bancos_empresa; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE bancos_empresa (
    id_banco_empresa integer NOT NULL,
    nomb_banc_empr character varying(50),
    tipo_cuen_empr character varying(20),
    num_cuen_empr character varying(20),
    titu_cuen_empr character varying(100),
    cedula_titular_cuenta character varying(13),
    cedu_cuen_empr character varying(15),
    estatus integer
);


ALTER TABLE bancos_empresa OWNER TO postgres;

--
-- Name: bancos_empresa_id_banco_empresa_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE bancos_empresa_id_banco_empresa_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE bancos_empresa_id_banco_empresa_seq OWNER TO postgres;

--
-- Name: bancos_empresa_id_banco_empresa_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE bancos_empresa_id_banco_empresa_seq OWNED BY bancos_empresa.id_banco_empresa;


--
-- Name: bancos_usuario; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE bancos_usuario (
    id_banco_usuario integer NOT NULL,
    nomb_banc_usua character varying(100) NOT NULL,
    tipo_cuen_usua character varying(10) NOT NULL,
    num_cuen_usua character varying(20) NOT NULL,
    titu_cuen_usua character varying(50) NOT NULL,
    cedu_cuen_usua character varying(15) NOT NULL,
    estatus integer NOT NULL,
    id_usuario integer NOT NULL
);


ALTER TABLE bancos_usuario OWNER TO postgres;

--
-- Name: bancos_usuarios_cedu_cuen_usua_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE bancos_usuarios_cedu_cuen_usua_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE bancos_usuarios_cedu_cuen_usua_seq OWNER TO postgres;

--
-- Name: bancos_usuarios_cedu_cuen_usua_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE bancos_usuarios_cedu_cuen_usua_seq OWNED BY bancos_usuario.cedu_cuen_usua;


--
-- Name: bancos_usuarios_estatus_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE bancos_usuarios_estatus_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE bancos_usuarios_estatus_seq OWNER TO postgres;

--
-- Name: bancos_usuarios_estatus_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE bancos_usuarios_estatus_seq OWNED BY bancos_usuario.estatus;


--
-- Name: bancos_usuarios_id_banco_usuario_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE bancos_usuarios_id_banco_usuario_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE bancos_usuarios_id_banco_usuario_seq OWNER TO postgres;

--
-- Name: bancos_usuarios_id_banco_usuario_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE bancos_usuarios_id_banco_usuario_seq OWNED BY bancos_usuario.id_banco_usuario;


--
-- Name: bancos_usuarios_id_usuario_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE bancos_usuarios_id_usuario_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE bancos_usuarios_id_usuario_seq OWNER TO postgres;

--
-- Name: bancos_usuarios_id_usuario_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE bancos_usuarios_id_usuario_seq OWNED BY bancos_usuario.id_usuario;


--
-- Name: bancos_usuarios_nomb_banc_usua_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE bancos_usuarios_nomb_banc_usua_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE bancos_usuarios_nomb_banc_usua_seq OWNER TO postgres;

--
-- Name: bancos_usuarios_nomb_banc_usua_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE bancos_usuarios_nomb_banc_usua_seq OWNED BY bancos_usuario.nomb_banc_usua;


--
-- Name: bancos_usuarios_num_cuen_usua_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE bancos_usuarios_num_cuen_usua_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE bancos_usuarios_num_cuen_usua_seq OWNER TO postgres;

--
-- Name: bancos_usuarios_num_cuen_usua_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE bancos_usuarios_num_cuen_usua_seq OWNED BY bancos_usuario.num_cuen_usua;


--
-- Name: bancos_usuarios_tipo_cuen_usua_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE bancos_usuarios_tipo_cuen_usua_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE bancos_usuarios_tipo_cuen_usua_seq OWNER TO postgres;

--
-- Name: bancos_usuarios_tipo_cuen_usua_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE bancos_usuarios_tipo_cuen_usua_seq OWNED BY bancos_usuario.tipo_cuen_usua;


--
-- Name: bancos_usuarios_titu_cuen_usua_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE bancos_usuarios_titu_cuen_usua_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE bancos_usuarios_titu_cuen_usua_seq OWNER TO postgres;

--
-- Name: bancos_usuarios_titu_cuen_usua_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE bancos_usuarios_titu_cuen_usua_seq OWNED BY bancos_usuario.titu_cuen_usua;


--
-- Name: catalogo_venta; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE catalogo_venta (
    id_producto_venta integer NOT NULL,
    codigo_producto_v character varying(30),
    nombre_producto_v character varying(32),
    id_usuario_a character varying(10),
    categoria character varying(40),
    marca character varying(30),
    descripcion character varying(250),
    imagen character varying(250),
    tipo_unidad character varying(15),
    productos_vendidos character varying(10),
    precio_base character varying(30),
    iva_producto character varying(30),
    pvp character varying(30),
    numero_pedido character varying(25),
    estatus integer,
    productos_disponibles integer,
    numero_comentario integer,
    precio_costo character varying(100)
);


ALTER TABLE catalogo_venta OWNER TO postgres;

--
-- Name: catalogo_venta_id_producto_venta_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE catalogo_venta_id_producto_venta_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE catalogo_venta_id_producto_venta_seq OWNER TO postgres;

--
-- Name: catalogo_venta_id_producto_venta_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE catalogo_venta_id_producto_venta_seq OWNED BY catalogo_venta.id_producto_venta;


--
-- Name: detalle_apartado; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE detalle_apartado (
    id_detalle_apartado integer NOT NULL,
    id_producto_venta integer,
    cantidad_apartada integer,
    fecha_hora character varying(25),
    estatus integer,
    id_usuario integer,
    id_apartado integer,
    precio_unidad character varying(100),
    precio_base character varying(20),
    iva character varying(5),
    ganancia character varying(5)
);


ALTER TABLE detalle_apartado OWNER TO postgres;

--
-- Name: detalle_apartado_id_detalle_apartado_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE detalle_apartado_id_detalle_apartado_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE detalle_apartado_id_detalle_apartado_seq OWNER TO postgres;

--
-- Name: detalle_apartado_id_detalle_apartado_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE detalle_apartado_id_detalle_apartado_seq OWNED BY detalle_apartado.id_detalle_apartado;


--
-- Name: empresa; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE empresa (
    id_empresa integer NOT NULL,
    rif_empresa character varying(12),
    nombre_empresa character varying(100),
    direccion_empresa character varying(250),
    telefono_empresa character varying(12),
    correo_empresa character varying(50)
);


ALTER TABLE empresa OWNER TO postgres;

--
-- Name: empresa_id_empresa_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE empresa_id_empresa_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE empresa_id_empresa_seq OWNER TO postgres;

--
-- Name: empresa_id_empresa_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE empresa_id_empresa_seq OWNED BY empresa.id_empresa;


--
-- Name: ganancia_iva; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE ganancia_iva (
    ganancia character varying(10),
    iva character varying(10)
);


ALTER TABLE ganancia_iva OWNER TO postgres;

--
-- Name: opiniones; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE opiniones (
    id_opinion integer NOT NULL,
    opinion_usuario character varying(255),
    id_usuario integer,
    id_venta_producto integer,
    estatus integer,
    id_producto_venta integer,
    fecha_hora_opinion timestamp without time zone
);


ALTER TABLE opiniones OWNER TO postgres;

--
-- Name: opiniones_id_opinion_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE opiniones_id_opinion_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE opiniones_id_opinion_seq OWNER TO postgres;

--
-- Name: opiniones_id_opinion_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE opiniones_id_opinion_seq OWNED BY opiniones.id_opinion;


--
-- Name: pedidos; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE pedidos (
    id_pedido integer NOT NULL,
    numero_pedido character varying(20),
    id_usuario_a character varying(10),
    id_proveedor character varying(10),
    codigo_producto character varying(30),
    nombre_producto character varying(32),
    cantidad_producto character varying(10),
    precio_costo character varying(20),
    fecha_pedido character varying(30)
);


ALTER TABLE pedidos OWNER TO postgres;

--
-- Name: pedidos_id_pedido_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE pedidos_id_pedido_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE pedidos_id_pedido_seq OWNER TO postgres;

--
-- Name: pedidos_id_pedido_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE pedidos_id_pedido_seq OWNED BY pedidos.id_pedido;


--
-- Name: proveedores; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE proveedores (
    id_proveedor integer NOT NULL,
    id_usuario_a character varying(10) NOT NULL,
    nombre_proveedor character varying(100) NOT NULL,
    razon_social_proveedor character varying(200) NOT NULL,
    direccion_proveedor character varying(250) NOT NULL,
    telef_proveedor character varying(13) NOT NULL,
    tipo_producto character varying(35) NOT NULL,
    correo_proveedor character varying(100) NOT NULL,
    estatus integer
);


ALTER TABLE proveedores OWNER TO postgres;

--
-- Name: proveedores_correo_proveedor_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE proveedores_correo_proveedor_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE proveedores_correo_proveedor_seq OWNER TO postgres;

--
-- Name: proveedores_correo_proveedor_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE proveedores_correo_proveedor_seq OWNED BY proveedores.correo_proveedor;


--
-- Name: proveedores_direccion_proveedor_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE proveedores_direccion_proveedor_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE proveedores_direccion_proveedor_seq OWNER TO postgres;

--
-- Name: proveedores_direccion_proveedor_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE proveedores_direccion_proveedor_seq OWNED BY proveedores.direccion_proveedor;


--
-- Name: proveedores_id_proveedor_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE proveedores_id_proveedor_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE proveedores_id_proveedor_seq OWNER TO postgres;

--
-- Name: proveedores_id_proveedor_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE proveedores_id_proveedor_seq OWNED BY proveedores.id_proveedor;


--
-- Name: proveedores_id_usuario_a_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE proveedores_id_usuario_a_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE proveedores_id_usuario_a_seq OWNER TO postgres;

--
-- Name: proveedores_id_usuario_a_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE proveedores_id_usuario_a_seq OWNED BY proveedores.id_usuario_a;


--
-- Name: proveedores_nombre_proveedor_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE proveedores_nombre_proveedor_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE proveedores_nombre_proveedor_seq OWNER TO postgres;

--
-- Name: proveedores_nombre_proveedor_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE proveedores_nombre_proveedor_seq OWNED BY proveedores.nombre_proveedor;


--
-- Name: proveedores_razon_social_proveedor_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE proveedores_razon_social_proveedor_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE proveedores_razon_social_proveedor_seq OWNER TO postgres;

--
-- Name: proveedores_razon_social_proveedor_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE proveedores_razon_social_proveedor_seq OWNED BY proveedores.razon_social_proveedor;


--
-- Name: proveedores_telef_proveedor_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE proveedores_telef_proveedor_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE proveedores_telef_proveedor_seq OWNER TO postgres;

--
-- Name: proveedores_telef_proveedor_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE proveedores_telef_proveedor_seq OWNED BY proveedores.telef_proveedor;


--
-- Name: proveedores_tipo_producto_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE proveedores_tipo_producto_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE proveedores_tipo_producto_seq OWNER TO postgres;

--
-- Name: proveedores_tipo_producto_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE proveedores_tipo_producto_seq OWNED BY proveedores.tipo_producto;


--
-- Name: session; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE session (
    id_session integer NOT NULL,
    id_usuario character varying(10) NOT NULL,
    fecha_hora_session character varying(200) NOT NULL,
    ip_session character varying(50) NOT NULL,
    permiso_session integer NOT NULL
);


ALTER TABLE session OWNER TO postgres;

--
-- Name: session_fecha_hora_session_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE session_fecha_hora_session_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE session_fecha_hora_session_seq OWNER TO postgres;

--
-- Name: session_fecha_hora_session_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE session_fecha_hora_session_seq OWNED BY session.fecha_hora_session;


--
-- Name: session_id_session_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE session_id_session_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE session_id_session_seq OWNER TO postgres;

--
-- Name: session_id_session_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE session_id_session_seq OWNED BY session.id_session;


--
-- Name: session_ip_session_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE session_ip_session_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE session_ip_session_seq OWNER TO postgres;

--
-- Name: session_ip_session_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE session_ip_session_seq OWNED BY session.ip_session;


--
-- Name: usuario; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE usuario (
    id_usuario integer NOT NULL,
    cedula_usuario character varying(13) NOT NULL,
    nombre_usuario character varying(50),
    apellido_usuario character varying(50),
    correo_usuario character varying(50),
    contra_usuario character varying(35),
    estado character varying(20),
    ciudad character varying(200),
    direccion character varying(250),
    cod_telef_pers character varying(4),
    telef_personal character varying(7),
    cod_telef_hog character varying(4),
    telef_hog character varying(7),
    pregunta_seguridad character varying(50),
    respuesta_seguridad character varying(100),
    bandera character varying(2),
    estatus integer NOT NULL
);


ALTER TABLE usuario OWNER TO postgres;

--
-- Name: usuario_id_usuario_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE usuario_id_usuario_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE usuario_id_usuario_seq OWNER TO postgres;

--
-- Name: usuario_id_usuario_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE usuario_id_usuario_seq OWNED BY usuario.id_usuario;


--
-- Name: ventas_productos; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE ventas_productos (
    id_venta_producto integer NOT NULL,
    id_apartado integer,
    id_banco_usuario integer,
    id_banco_empresa integer,
    monto_cancelado character varying,
    estatus integer,
    numero_referencia character varying(20),
    id_usuario integer,
    fecha_hora_venta timestamp without time zone,
    iva character varying(5),
    ganancia character varying(5),
    precio_base character varying(20)
);


ALTER TABLE ventas_productos OWNER TO postgres;

--
-- Name: ventas_productos_id_venta_producto_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE ventas_productos_id_venta_producto_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE ventas_productos_id_venta_producto_seq OWNER TO postgres;

--
-- Name: ventas_productos_id_venta_producto_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE ventas_productos_id_venta_producto_seq OWNED BY ventas_productos.id_venta_producto;


--
-- Name: apartado id_apartado_usuario; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY apartado ALTER COLUMN id_apartado_usuario SET DEFAULT nextval('apartados_usuario_id_apartado_usuario_seq'::regclass);


--
-- Name: bancos_empresa id_banco_empresa; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY bancos_empresa ALTER COLUMN id_banco_empresa SET DEFAULT nextval('bancos_empresa_id_banco_empresa_seq'::regclass);


--
-- Name: bancos_usuario id_banco_usuario; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY bancos_usuario ALTER COLUMN id_banco_usuario SET DEFAULT nextval('bancos_usuarios_id_banco_usuario_seq'::regclass);


--
-- Name: bancos_usuario nomb_banc_usua; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY bancos_usuario ALTER COLUMN nomb_banc_usua SET DEFAULT nextval('bancos_usuarios_nomb_banc_usua_seq'::regclass);


--
-- Name: bancos_usuario tipo_cuen_usua; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY bancos_usuario ALTER COLUMN tipo_cuen_usua SET DEFAULT nextval('bancos_usuarios_tipo_cuen_usua_seq'::regclass);


--
-- Name: bancos_usuario num_cuen_usua; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY bancos_usuario ALTER COLUMN num_cuen_usua SET DEFAULT nextval('bancos_usuarios_num_cuen_usua_seq'::regclass);


--
-- Name: bancos_usuario titu_cuen_usua; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY bancos_usuario ALTER COLUMN titu_cuen_usua SET DEFAULT nextval('bancos_usuarios_titu_cuen_usua_seq'::regclass);


--
-- Name: bancos_usuario cedu_cuen_usua; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY bancos_usuario ALTER COLUMN cedu_cuen_usua SET DEFAULT nextval('bancos_usuarios_cedu_cuen_usua_seq'::regclass);


--
-- Name: bancos_usuario estatus; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY bancos_usuario ALTER COLUMN estatus SET DEFAULT nextval('bancos_usuarios_estatus_seq'::regclass);


--
-- Name: bancos_usuario id_usuario; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY bancos_usuario ALTER COLUMN id_usuario SET DEFAULT nextval('bancos_usuarios_id_usuario_seq'::regclass);


--
-- Name: catalogo_venta id_producto_venta; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY catalogo_venta ALTER COLUMN id_producto_venta SET DEFAULT nextval('catalogo_venta_id_producto_venta_seq'::regclass);


--
-- Name: detalle_apartado id_detalle_apartado; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY detalle_apartado ALTER COLUMN id_detalle_apartado SET DEFAULT nextval('detalle_apartado_id_detalle_apartado_seq'::regclass);


--
-- Name: empresa id_empresa; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY empresa ALTER COLUMN id_empresa SET DEFAULT nextval('empresa_id_empresa_seq'::regclass);


--
-- Name: opiniones id_opinion; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY opiniones ALTER COLUMN id_opinion SET DEFAULT nextval('opiniones_id_opinion_seq'::regclass);


--
-- Name: pedidos id_pedido; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY pedidos ALTER COLUMN id_pedido SET DEFAULT nextval('pedidos_id_pedido_seq'::regclass);


--
-- Name: proveedores id_proveedor; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY proveedores ALTER COLUMN id_proveedor SET DEFAULT nextval('proveedores_id_proveedor_seq'::regclass);


--
-- Name: proveedores id_usuario_a; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY proveedores ALTER COLUMN id_usuario_a SET DEFAULT nextval('proveedores_id_usuario_a_seq'::regclass);


--
-- Name: proveedores nombre_proveedor; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY proveedores ALTER COLUMN nombre_proveedor SET DEFAULT nextval('proveedores_nombre_proveedor_seq'::regclass);


--
-- Name: proveedores razon_social_proveedor; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY proveedores ALTER COLUMN razon_social_proveedor SET DEFAULT nextval('proveedores_razon_social_proveedor_seq'::regclass);


--
-- Name: proveedores direccion_proveedor; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY proveedores ALTER COLUMN direccion_proveedor SET DEFAULT nextval('proveedores_direccion_proveedor_seq'::regclass);


--
-- Name: proveedores telef_proveedor; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY proveedores ALTER COLUMN telef_proveedor SET DEFAULT nextval('proveedores_telef_proveedor_seq'::regclass);


--
-- Name: proveedores tipo_producto; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY proveedores ALTER COLUMN tipo_producto SET DEFAULT nextval('proveedores_tipo_producto_seq'::regclass);


--
-- Name: proveedores correo_proveedor; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY proveedores ALTER COLUMN correo_proveedor SET DEFAULT nextval('proveedores_correo_proveedor_seq'::regclass);


--
-- Name: session id_session; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY session ALTER COLUMN id_session SET DEFAULT nextval('session_id_session_seq'::regclass);


--
-- Name: session fecha_hora_session; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY session ALTER COLUMN fecha_hora_session SET DEFAULT nextval('session_fecha_hora_session_seq'::regclass);


--
-- Name: session ip_session; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY session ALTER COLUMN ip_session SET DEFAULT nextval('session_ip_session_seq'::regclass);


--
-- Name: usuario id_usuario; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY usuario ALTER COLUMN id_usuario SET DEFAULT nextval('usuario_id_usuario_seq'::regclass);


--
-- Name: ventas_productos id_venta_producto; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY ventas_productos ALTER COLUMN id_venta_producto SET DEFAULT nextval('ventas_productos_id_venta_producto_seq'::regclass);


--
-- Data for Name: apartado; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY apartado (id_apartado_usuario, id_usuario, fecha_hora_apartado, estatus, precio_unidad) FROM stdin;
57	3	11/07/2019 09:52	10	\N
58	3	11/07/2019 10:33	2	\N
59	3	11/07/2019 10:46	2	\N
\.


--
-- Name: apartados_usuario_id_apartado_usuario_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('apartados_usuario_id_apartado_usuario_seq', 59, true);


--
-- Data for Name: bancos_empresa; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY bancos_empresa (id_banco_empresa, nomb_banc_empr, tipo_cuen_empr, num_cuen_empr, titu_cuen_empr, cedula_titular_cuenta, cedu_cuen_empr, estatus) FROM stdin;
2	banesco	Corriente	01020924200000108889	yurley contreras	\N	V-24819181	1
3	BanPlussss	Corriente	01234578983738939303	Leidy carvajala	\N	V-24882728	0
\.


--
-- Name: bancos_empresa_id_banco_empresa_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('bancos_empresa_id_banco_empresa_seq', 3, true);


--
-- Data for Name: bancos_usuario; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY bancos_usuario (id_banco_usuario, nomb_banc_usua, tipo_cuen_usua, num_cuen_usua, titu_cuen_usua, cedu_cuen_usua, estatus, id_usuario) FROM stdin;
1	BANCO DE VENEZUELA, S.A.I.C.A.	Corriente	01022189128734812398	Julian Contreras	V-24819181	1	2
2	BANCO CARONI, C.A. BANCO UNIVERSAL	Ahorro	04949483829292838474	adams contreras	V-24819181	1	2
3	BANCO DE VENEZUELA, S.A.I.C.A.	Corriente	01021231312312312312	vidermid sanchez	V-19121212	1	3
\.


--
-- Name: bancos_usuarios_cedu_cuen_usua_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('bancos_usuarios_cedu_cuen_usua_seq', 1, false);


--
-- Name: bancos_usuarios_estatus_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('bancos_usuarios_estatus_seq', 1, false);


--
-- Name: bancos_usuarios_id_banco_usuario_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('bancos_usuarios_id_banco_usuario_seq', 3, true);


--
-- Name: bancos_usuarios_id_usuario_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('bancos_usuarios_id_usuario_seq', 1, false);


--
-- Name: bancos_usuarios_nomb_banc_usua_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('bancos_usuarios_nomb_banc_usua_seq', 1, false);


--
-- Name: bancos_usuarios_num_cuen_usua_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('bancos_usuarios_num_cuen_usua_seq', 1, false);


--
-- Name: bancos_usuarios_tipo_cuen_usua_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('bancos_usuarios_tipo_cuen_usua_seq', 1, false);


--
-- Name: bancos_usuarios_titu_cuen_usua_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('bancos_usuarios_titu_cuen_usua_seq', 1, false);


--
-- Data for Name: catalogo_venta; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY catalogo_venta (id_producto_venta, codigo_producto_v, nombre_producto_v, id_usuario_a, categoria, marca, descripcion, imagen, tipo_unidad, productos_vendidos, precio_base, iva_producto, pvp, numero_pedido, estatus, productos_disponibles, numero_comentario, precio_costo) FROM stdin;
4	ACC1012	prueba	1	Accesorios para Motociclistas	keeway	adadasdad	../imagenesRepuestos/IMG_20160428_162828 - copia.jpg	Unidad	9	65.000,00	10.400,00	75.400,00	12312	1	3	\N	\N
2	CAR6545	CARETA R1 BLANCAss	1	Carenaje	BERAS	CARETA BERA R1 BLANCA ORIGINAL	1469736508676 - copia.jpg	Unico	0	97.500,00	15.600,00	113.100,00	9955	1	5	\N	\N
3	CHA342	chaleco	1	Chasis	Bera	chaleco para motociclistas	../imagenesRepuestos/1464034253956 - copia - copia.jpg	Unico	0	5.850.000,00	936.000,00	6.786.000,00	13123	1	20	\N	\N
1	ACC2528	CASCO EK	1	Accesorios para Motociclistas	KEEWAY	CASCO KEEWAY	1463849799021 - copia - copia.jpg	Unico	8	52.000,00	8.320,00	60.320,00	23123	1	7	\N	40.000,00
5	ACC710	prueba	1	Accesorios para Motociclistas	keeway	adadasdad	../imagenesRepuestos/IMG_20160428_162828 - copia.jpg	Unidad	8	65.000,00	10.400,00	75.400,00	1231	1	4	\N	50.000,00
\.


--
-- Name: catalogo_venta_id_producto_venta_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('catalogo_venta_id_producto_venta_seq', 5, true);


--
-- Data for Name: detalle_apartado; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY detalle_apartado (id_detalle_apartado, id_producto_venta, cantidad_apartada, fecha_hora, estatus, id_usuario, id_apartado, precio_unidad, precio_base, iva, ganancia) FROM stdin;
34	5	2	11/07/2019 09:52	10	3	57	75.400,00	\N	\N	\N
35	4	2	11/07/2019 10:33	2	3	58	75.400,00	\N	\N	\N
36	4	2	11/07/2019 10:46	2	3	59	75.400,00	65.000,00	0.16	0.30
\.


--
-- Name: detalle_apartado_id_detalle_apartado_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('detalle_apartado_id_detalle_apartado_seq', 36, true);


--
-- Data for Name: empresa; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY empresa (id_empresa, rif_empresa, nombre_empresa, direccion_empresa, telefono_empresa, correo_empresa) FROM stdin;
1	J-407404032	YURAL C.A.	Venezuela - Tàchira San Cristòbal. Sector la Concordia AV.  Lucio Oquendo Al frente del Restaurante el Fogón de la Abuela. Al Lado de la Central Telefónica de CANTV. \r\n                                  	0276-3489493	yuralrepuestos@gmail.com
\.


--
-- Name: empresa_id_empresa_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('empresa_id_empresa_seq', 1, true);


--
-- Data for Name: ganancia_iva; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY ganancia_iva (ganancia, iva) FROM stdin;
0.30	0.16
\.


--
-- Data for Name: opiniones; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY opiniones (id_opinion, opinion_usuario, id_usuario, id_venta_producto, estatus, id_producto_venta, fecha_hora_opinion) FROM stdin;
1	excelente recomendados	3	4	1	4	2019-07-11 10:56:00
\.


--
-- Name: opiniones_id_opinion_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('opiniones_id_opinion_seq', 1, true);


--
-- Data for Name: pedidos; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY pedidos (id_pedido, numero_pedido, id_usuario_a, id_proveedor, codigo_producto, nombre_producto, cantidad_producto, precio_costo, fecha_pedido) FROM stdin;
1	23123	1	3	8USH22	CASCO EK	2	5.500.000,00	2018-04-17
2	9955	1	2	7HYSH22	CARETA R1	4	1.000.000,00	2018-04-18
3	13123	1	3	38jsja	chaleco	20	4.500.000,00	2018-06-01
4	12312	1	3	2s37700	prueba	12	50.000,00	2019-07-08
5	1231	1	3	2s3770	prueba	12	50.000,00	2019-07-08
\.


--
-- Name: pedidos_id_pedido_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('pedidos_id_pedido_seq', 5, true);


--
-- Data for Name: proveedores; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY proveedores (id_proveedor, id_usuario_a, nombre_proveedor, razon_social_proveedor, direccion_proveedor, telef_proveedor, tipo_producto, correo_proveedor, estatus) FROM stdin;
3	1	adams	J-409822-3	valencia estado carabobo                                                                                                                                            	0276-3453298	Cauchos	provadams@hotmail.com	1
4	1	adasd	J-407404083-2	asdasdasdasdasdasd	0276-3489493	Accesorios	provadams@gmail.comk	1
2	1	adamsito	J-40740403-2	tachira san cristoba                    	0276-3489493	Repuestos Varios	yuralrepuestos@gmail.com	1
\.


--
-- Name: proveedores_correo_proveedor_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('proveedores_correo_proveedor_seq', 1, false);


--
-- Name: proveedores_direccion_proveedor_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('proveedores_direccion_proveedor_seq', 1, false);


--
-- Name: proveedores_id_proveedor_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('proveedores_id_proveedor_seq', 4, true);


--
-- Name: proveedores_id_usuario_a_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('proveedores_id_usuario_a_seq', 1, false);


--
-- Name: proveedores_nombre_proveedor_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('proveedores_nombre_proveedor_seq', 1, false);


--
-- Name: proveedores_razon_social_proveedor_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('proveedores_razon_social_proveedor_seq', 1, false);


--
-- Name: proveedores_telef_proveedor_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('proveedores_telef_proveedor_seq', 1, false);


--
-- Name: proveedores_tipo_producto_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('proveedores_tipo_producto_seq', 1, false);


--
-- Data for Name: session; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY session (id_session, id_usuario, fecha_hora_session, ip_session, permiso_session) FROM stdin;
11	1	24/04/2018 10:30	::1	0
12	2	24/04/2018 10:32	::1	1
13	2	24/04/2018 10:33	::1	0
14	1	24/04/2018 10:34	::1	1
15	1	24/04/2018 10:41	::1	0
16	3	24/04/2018 10:47	::1	1
17	3	24/04/2018 10:52	::1	0
18	1	24/04/2018 10:53	::1	1
19	1	24/04/2018 11:04	::1	0
20	3	24/04/2018 11:12	::1	1
21	3	24/04/2018 11:12	::1	0
22	1	01/05/2018 18:53	::1	1
23	1	01/05/2018 19:44	::1	0
24	2	01/05/2018 19:44	::1	1
25	2	01/05/2018 19:52	::1	0
26	1	01/05/2018 20:00	::1	1
27	1	01/05/2018 20:01	::1	0
28	1	01/05/2018 20:02	::1	1
29	1	01/05/2018 20:11	::1	0
30	2	01/05/2018 20:11	::1	1
31	2	01/05/2018 20:11	::1	0
32	1	01/05/2018 20:14	::1	1
33	1	01/05/2018 20:14	::1	0
34	2	01/05/2018 20:15	::1	1
35	2	01/05/2018 20:19	::1	0
36	1	01/05/2018 20:21	::1	1
37	1	01/05/2018 20:28	::1	0
38	2	01/05/2018 20:29	::1	1
39	2	01/05/2018 20:47	::1	0
40	1	01/05/2018 21:00	::1	1
41	1	01/05/2018 21:36	::1	0
42	2	01/05/2018 21:36	::1	1
43	2	01/05/2018 21:46	::1	0
44	1	01/05/2018 21:47	::1	1
45	1	01/05/2018 21:48	::1	0
46	1	01/05/2018 21:49	::1	1
47	1	01/05/2018 21:50	::1	0
48	1	01/05/2018 21:53	::1	1
49	1	01/05/2018 21:54	::1	0
50	1	01/05/2018 21:55	::1	1
51	1	01/05/2018 21:57	::1	0
52	1	01/05/2018 21:58	::1	1
53	1	01/05/2018 22:00	::1	0
54	1	01/05/2018 22:00	::1	1
55	1	01/05/2018 22:00	::1	0
56	2	27/05/2018 11:35	::1	1
57	2	27/05/2018 17:22	::1	0
58	1	27/05/2018 17:34	::1	1
59	1	29/05/2018 08:31	::1	0
60	2	29/05/2018 08:32	::1	1
61	2	29/05/2018 09:13	::1	0
62	2	29/05/2018 10:18	::1	1
63	2	29/05/2018 10:44	::1	0
64	1	29/05/2018 10:46	::1	1
65	1	29/05/2018 10:58	::1	0
66	1	03/06/2018 16:37	::1	1
67	1	03/06/2018 18:12	::1	0
68	1	03/06/2018 18:12	::1	1
69	1	03/06/2018 18:12	::1	0
70	2	03/06/2018 18:13	::1	1
71	2	03/06/2018 18:13	::1	0
72	1	03/06/2018 18:15	::1	1
73	1	03/06/2018 18:16	::1	0
74	1	03/06/2018 18:17	::1	1
75	1	03/06/2018 23:02	::1	0
76	2	07/06/2018 05:23	::1	1
77	2	11/06/2018 08:54	::1	1
78	1	08/07/2019 19:49	::1	0
79	3	08/07/2019 19:52	::1	1
80	1	08/07/2019 20:27	::1	1
81	1	10/07/2019 20:06	::1	1
82	3	10/07/2019 20:11	::1	1
83	1	11/07/2019 09:53	::1	1
\.


--
-- Name: session_fecha_hora_session_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('session_fecha_hora_session_seq', 1, false);


--
-- Name: session_id_session_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('session_id_session_seq', 83, true);


--
-- Name: session_ip_session_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('session_ip_session_seq', 1, false);


--
-- Data for Name: usuario; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY usuario (id_usuario, cedula_usuario, nombre_usuario, apellido_usuario, correo_usuario, contra_usuario, estado, ciudad, direccion, cod_telef_pers, telef_personal, cod_telef_hog, telef_hog, pregunta_seguridad, respuesta_seguridad, bandera, estatus) FROM stdin;
2	70000000	leydi	carrero	leydi@gmail.com	12345678	Táchira	San Cristóbal	vivo por hay	0426	8292827	0416	8272829	Cual fue tu mejor amigo de la infancia?	omaira	1	1
1	24819181	adams contreras	contreras ramirez	adamspurry@gmail.com	adams2481	Táchira	San Cristóbal	centro de la ciudad calle 5 la catedral	0416	1231232	0416	1312312	Cual fue tu mejor amigo de la infancia?	LEIDY	10	1
3	18987289	vidermid	sanchez	vidermid@gmail.com	12345678	Cojedes	El Baúl	en mi casa	0416	6785672	0212	2789654	Donde Nacistes?	en el hospital	1	1
\.


--
-- Name: usuario_id_usuario_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('usuario_id_usuario_seq', 3, true);


--
-- Data for Name: ventas_productos; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY ventas_productos (id_venta_producto, id_apartado, id_banco_usuario, id_banco_empresa, monto_cancelado, estatus, numero_referencia, id_usuario, fecha_hora_venta, iva, ganancia, precio_base) FROM stdin;
3	57	3	2	150.800,00	10	231231212	3	2019-07-11 09:53:00	0.16	0.30	\N
4	58	3	2	150.800,00	2	23123123	3	2019-07-11 10:38:00	0.16	0.30	65.000,00
5	59	3	2	150.800,00	2	231231211	3	2019-07-11 10:47:00	0.16	0.30	65.000,00
\.


--
-- Name: ventas_productos_id_venta_producto_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('ventas_productos_id_venta_producto_seq', 5, true);


--
-- Name: apartado apartados_usuario_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY apartado
    ADD CONSTRAINT apartados_usuario_pkey PRIMARY KEY (id_apartado_usuario);


--
-- Name: bancos_empresa bancos_empresa_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY bancos_empresa
    ADD CONSTRAINT bancos_empresa_pkey PRIMARY KEY (id_banco_empresa);


--
-- Name: bancos_usuario bancos_usuarios_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY bancos_usuario
    ADD CONSTRAINT bancos_usuarios_pkey PRIMARY KEY (id_banco_usuario);


--
-- Name: catalogo_venta catalogo_venta_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY catalogo_venta
    ADD CONSTRAINT catalogo_venta_pkey PRIMARY KEY (id_producto_venta);


--
-- Name: detalle_apartado detalle_apartado_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY detalle_apartado
    ADD CONSTRAINT detalle_apartado_pkey PRIMARY KEY (id_detalle_apartado);


--
-- Name: empresa empresa_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY empresa
    ADD CONSTRAINT empresa_pkey PRIMARY KEY (id_empresa);


--
-- Name: opiniones opiniones_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY opiniones
    ADD CONSTRAINT opiniones_pkey PRIMARY KEY (id_opinion);


--
-- Name: pedidos pedidos_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY pedidos
    ADD CONSTRAINT pedidos_pkey PRIMARY KEY (id_pedido);


--
-- Name: proveedores proveedores_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY proveedores
    ADD CONSTRAINT proveedores_pkey PRIMARY KEY (id_proveedor);


--
-- Name: session session_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY session
    ADD CONSTRAINT session_pkey PRIMARY KEY (id_session);


--
-- Name: usuario usuario_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY usuario
    ADD CONSTRAINT usuario_pkey PRIMARY KEY (id_usuario);


--
-- Name: ventas_productos ventas_productos_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY ventas_productos
    ADD CONSTRAINT ventas_productos_pkey PRIMARY KEY (id_venta_producto);


--
-- Name: apartado.id_apartado_usuario; Type: ACL; Schema: public; Owner: postgres
--

GRANT ALL(id_apartado_usuario) ON TABLE apartado TO PUBLIC;


--
-- Name: bancos_empresa.id_banco_empresa; Type: ACL; Schema: public; Owner: postgres
--

GRANT ALL(id_banco_empresa) ON TABLE bancos_empresa TO PUBLIC;


--
-- Name: bancos_empresa.nomb_banc_empr; Type: ACL; Schema: public; Owner: postgres
--

GRANT ALL(nomb_banc_empr) ON TABLE bancos_empresa TO PUBLIC;


--
-- Name: bancos_empresa.tipo_cuen_empr; Type: ACL; Schema: public; Owner: postgres
--

GRANT ALL(tipo_cuen_empr) ON TABLE bancos_empresa TO PUBLIC;


--
-- Name: bancos_empresa.num_cuen_empr; Type: ACL; Schema: public; Owner: postgres
--

GRANT ALL(num_cuen_empr) ON TABLE bancos_empresa TO PUBLIC;


--
-- Name: bancos_empresa.titu_cuen_empr; Type: ACL; Schema: public; Owner: postgres
--

GRANT ALL(titu_cuen_empr) ON TABLE bancos_empresa TO PUBLIC;


--
-- Name: bancos_empresa.cedula_titular_cuenta; Type: ACL; Schema: public; Owner: postgres
--

GRANT ALL(cedula_titular_cuenta) ON TABLE bancos_empresa TO PUBLIC;


--
-- Name: empresa.id_empresa; Type: ACL; Schema: public; Owner: postgres
--

GRANT ALL(id_empresa) ON TABLE empresa TO PUBLIC;


--
-- Name: empresa.rif_empresa; Type: ACL; Schema: public; Owner: postgres
--

GRANT ALL(rif_empresa) ON TABLE empresa TO PUBLIC;


--
-- Name: empresa.nombre_empresa; Type: ACL; Schema: public; Owner: postgres
--

GRANT ALL(nombre_empresa) ON TABLE empresa TO PUBLIC;


--
-- Name: empresa.direccion_empresa; Type: ACL; Schema: public; Owner: postgres
--

GRANT ALL(direccion_empresa) ON TABLE empresa TO PUBLIC;


--
-- Name: empresa.telefono_empresa; Type: ACL; Schema: public; Owner: postgres
--

GRANT ALL(telefono_empresa) ON TABLE empresa TO PUBLIC;


--
-- Name: empresa.correo_empresa; Type: ACL; Schema: public; Owner: postgres
--

GRANT ALL(correo_empresa) ON TABLE empresa TO PUBLIC;


--
-- Name: proveedores.id_proveedor; Type: ACL; Schema: public; Owner: postgres
--

GRANT ALL(id_proveedor) ON TABLE proveedores TO PUBLIC;


--
-- Name: proveedores.id_usuario_a; Type: ACL; Schema: public; Owner: postgres
--

GRANT ALL(id_usuario_a) ON TABLE proveedores TO PUBLIC;


--
-- Name: proveedores.nombre_proveedor; Type: ACL; Schema: public; Owner: postgres
--

GRANT ALL(nombre_proveedor) ON TABLE proveedores TO PUBLIC;


--
-- Name: proveedores.razon_social_proveedor; Type: ACL; Schema: public; Owner: postgres
--

GRANT ALL(razon_social_proveedor) ON TABLE proveedores TO PUBLIC;


--
-- Name: proveedores.direccion_proveedor; Type: ACL; Schema: public; Owner: postgres
--

GRANT ALL(direccion_proveedor) ON TABLE proveedores TO PUBLIC;


--
-- Name: proveedores.telef_proveedor; Type: ACL; Schema: public; Owner: postgres
--

GRANT ALL(telef_proveedor) ON TABLE proveedores TO PUBLIC;


--
-- Name: proveedores.tipo_producto; Type: ACL; Schema: public; Owner: postgres
--

GRANT ALL(tipo_producto) ON TABLE proveedores TO PUBLIC;


--
-- Name: proveedores.correo_proveedor; Type: ACL; Schema: public; Owner: postgres
--

GRANT ALL(correo_proveedor) ON TABLE proveedores TO PUBLIC;


--
-- Name: usuario.id_usuario; Type: ACL; Schema: public; Owner: postgres
--

GRANT ALL(id_usuario) ON TABLE usuario TO PUBLIC;


--
-- Name: usuario.cedula_usuario; Type: ACL; Schema: public; Owner: postgres
--

GRANT ALL(cedula_usuario) ON TABLE usuario TO PUBLIC;


--
-- Name: usuario.nombre_usuario; Type: ACL; Schema: public; Owner: postgres
--

GRANT ALL(nombre_usuario) ON TABLE usuario TO PUBLIC;


--
-- Name: usuario.apellido_usuario; Type: ACL; Schema: public; Owner: postgres
--

GRANT ALL(apellido_usuario) ON TABLE usuario TO PUBLIC;


--
-- Name: usuario.correo_usuario; Type: ACL; Schema: public; Owner: postgres
--

GRANT ALL(correo_usuario) ON TABLE usuario TO PUBLIC;


--
-- Name: usuario.contra_usuario; Type: ACL; Schema: public; Owner: postgres
--

GRANT ALL(contra_usuario) ON TABLE usuario TO PUBLIC;


--
-- Name: usuario.estado; Type: ACL; Schema: public; Owner: postgres
--

GRANT ALL(estado) ON TABLE usuario TO PUBLIC;


--
-- Name: usuario.ciudad; Type: ACL; Schema: public; Owner: postgres
--

GRANT ALL(ciudad) ON TABLE usuario TO PUBLIC;


--
-- Name: usuario.direccion; Type: ACL; Schema: public; Owner: postgres
--

GRANT ALL(direccion) ON TABLE usuario TO PUBLIC;


--
-- PostgreSQL database dump complete
--

