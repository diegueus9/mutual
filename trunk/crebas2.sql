/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     04/01/2007 14:43:48                          */
/*==============================================================*/


drop table if exists TACTIVACION;

drop table if exists TACTIVIDADFILTRAR;

drop table if exists TACTIVIDAD_PROGRAMAR;

drop table if exists TACTIVIDAD_X_PROGRAMA;

drop table if exists TACTUALIZACION;

drop table if exists TAFILIADOS;

drop table if exists TCONTRATO;

drop table if exists TCUPS;

drop table if exists TDEPARTAMENTO;

drop table if exists TEMP_AFILIADOS;

drop table if exists TEMP_PYP;

drop table if exists TENTIDADES_CONTRATANTES;

drop table if exists TENTIDAD_CONTRATANTE;

drop table if exists TESTADOS_AFILIACIONES;

drop table if exists TGRUPOS_POBLACIONALES;

drop table if exists TMES;

drop table if exists TMETAS;

drop table if exists TMUNICIPIO;

drop table if exists TNIVEL_SISBEN2;

drop table if exists TPARENTESCOS;

drop table if exists TPERTENENCIA_ETNICA2;

drop table if exists TPROGRAMAS;

drop table if exists TSEXOS;

drop table if exists TTIPOACT;

drop table if exists TTIPOS_AFILIADO;

drop table if exists TTIPOS_DE_IDENTIFICACION;

drop table if exists TTIPO_CONTRATO;

drop table if exists TVIGENCIAFILTROS;

drop table if exists TZONAS;

/*==============================================================*/
/* Table: TACTIVACION                                           */
/*==============================================================*/
create table TACTIVACION
(
   COD_ACTIVACION       int(10) not null auto_increment,
   COD_AFILIADO         char(13) not null,
   COD_MES              int not null,
   CONSECTUVO2          int not null,
   CONTRATO             int,
   FECHA_ACTIVACION     date,
   primary key (COD_ACTIVACION)
);

/*==============================================================*/
/* Table: TACTIVIDADFILTRAR                                     */
/*==============================================================*/
create table TACTIVIDADFILTRAR
(
   COD_ACTIVIDAD        decimal not null,
   GENERO               char(1),
   FRECUENCIA           int,
   INDICE1              int,
   INDICE2              int,
   primary key (COD_ACTIVIDAD)
);

/*==============================================================*/
/* Table: TACTIVIDAD_PROGRAMAR                                  */
/*==============================================================*/
create table TACTIVIDAD_PROGRAMAR
(
   COD_ACTIVIDAD_PROGRAMAR int not null,
   COD_AFILIADO         char(13) not null,
   COD_PROGRAMA         int,
   COD_CUPS             char(6),
   FECHA_PROGRAMO       date,
   FIRMA_NEGACION       longblob,
   primary key (COD_ACTIVIDAD_PROGRAMAR)
);

/*==============================================================*/
/* Table: TACTIVIDAD_X_PROGRAMA                                 */
/*==============================================================*/
create table TACTIVIDAD_X_PROGRAMA
(
   COD_PROGRAMA         int not null,
   COD_CUPS             char(6) not null,
   ESTADO               bool,
   primary key (COD_PROGRAMA, COD_CUPS)
);

/*==============================================================*/
/* Table: TACTUALIZACION                                        */
/*==============================================================*/
create table TACTUALIZACION
(
   COD_ACTUALIZACION    int(10) not null auto_increment,
   COD_TIPO_IDENTIFICACION2 char(3),
   COD_ACT              int,
   COD_ENTIDAD_CONTRATANTE char(6) not null,
   COD_AFILIADO         char(13) not null,
   FECHA_ACTUALIZACION  date not null,
   CONSECUTIVO1         int not null,
   FOTO                 longblob,
   CARNE_ENTIDAD_CONTRATANTE longblob,
   DOCUMENTO_IDENTIDAD  longblob,
   DIRECCION_ACTUAL     char(30),
   TELEFONO_ACTUAL      char(11),
   CELULAR1             bigint,
   CELULAR2             bigint,
   RESPONSABLE_MEDICO   char(30),
   TELEFONO_RESPONSABLE_MEDICO char(30),
   EMAIL                char(25),
   TIPO_DOCUMENTO_IDENTIDAD char(3),
   DOCUMENTO_IDENTIDAD_ACT char(16),
   PRIMER_NOMBRE_ACT    char(20),
   SEGUNDO_NOMBRE_ACT   char(20),
   PRIMER_APELLIDO_ACT  char(20),
   SEGUNDO_APELLIDO_ACTS char(20),
   FECHA_NACIMIENTO_ACT date,
   ESTADO               bool,
   TIPO_ACTUALIZACION   int,
   primary key (COD_ACTUALIZACION)
);

/*==============================================================*/
/* Table: TAFILIADOS                                            */
/*==============================================================*/
create table TAFILIADOS
(
   COD_AFILIADO         char(13) not null,
   COD_MUN              char(3),
   COD_TIPO_IDENTIFICACION2 char(3),
   COD_PARENTESCO2      char(1),
   COD_TIPO_AFILIADO2   char(1),
   COD_ENTIDAD_CONTRATANTE2 char(6),
   COD_TIPO_CONTRATO    int not null,
   COD_ZONA2            char(1),
   COD_SEXO2            char(2),
   COD_PERTENENCIA_ETNICA2 char(2),
   COD_NIVEL_SISBEN2    char(1),
   TTI_COD_TIPO_IDENTIFICACION2 char(3),
   COD_GRUP_POBLACIONAL char(2),
   COD_DEP              char(2) not null,
   TAF_COD_AFILIADO     char(13),
   COD_ESTADO_AFILIACION2 char(2),
   COD_ARS              char(6) not null,
   TIPO_IDENTIFICACION_CABEZA_FAMILIA char(3) not null,
   NUMERO_IDENTIFICACION_CABEZA_FAMILIA char(16) not null,
   TIPO_IDENTIFICACION  char(3) not null,
   NUMERO_IDENTIFICACION char(16) not null,
   PRIMER_APELLIDO      char(20) not null,
   SEGUNDO_APELLIDO     char(20) not null,
   PRIMER_NOMBRE        char(20) not null,
   SEGUNDO_NOMBRE       char(20) not null,
   EDAD                 int not null,
   SEXO                 char(2) not null,
   TIPO_AFILIADO        char(1) not null,
   PARENTESCO_CABEZA_FAMILIA char(1) not null,
   GRUPO_POBLACIONAL    char(1) not null,
   NIVEL_SISBEN         int not null,
   NUMERO_FICHA_SISBEN  char(13) not null,
   NUCLEO_FAMILIAR_SISBEN char(5) not null,
   COD_DEPARTAMENTO     char(2) not null,
   COD_MUNICIPIO        char(3) not null,
   ZONA                 char(1) not null,
   FEC_AFILIACION_SGSSS date not null,
   FEC_AFILIACION_ENTIDAD_CONTRATANTE date not null,
   NUM_CONTRATO_ENTE_TERRITORIAL char(10) not null,
   FECHA_INICIO_CONTRATO_ENTE_TERRITORIAL date not null,
   TIPO_CONTRATO_ENTE_TERRITORIAL char(2) not null,
   PERTENENCIA_ETNICA   char(2) not null,
   ESTADO_AFILIACION    char(2) not null,
   DIRECCION            char(30),
   TELEFONO             char(20),
   LOCALIDAD            char(2),
   FECHA_CARNETIZACION  date,
   BARRIO               char(30),
   COD_IPS              char(11),
   COD_CONTRATO         char(10),
   primary key (COD_AFILIADO)
);

/*==============================================================*/
/* Table: TCONTRATO                                             */
/*==============================================================*/
create table TCONTRATO
(
   COD_CONTRATO         char(10) not null,
   DESC_CONTRATO        char(100),
   FECHA_INICIO         date,
   VIGENCIA             int,
   UPC                  float(8,2),
   _UPC                 decimal,
   CUPS                 char(6),
   primary key (COD_CONTRATO)
);

/*==============================================================*/
/* Table: TCUPS                                                 */
/*==============================================================*/
create table TCUPS
(
   COD_CUPS             char(6) not null,
   DESCRIPCION_CUPS     char(255),
   AREA                 int,
   primary key (COD_CUPS)
);

/*==============================================================*/
/* Table: TDEPARTAMENTO                                         */
/*==============================================================*/
create table TDEPARTAMENTO
(
   COD_DEP              char(2) not null,
   DEPARTAMENTO         char(30),
   primary key (COD_DEP)
);

/*==============================================================*/
/* Table: TEMP_AFILIADOS                                        */
/*==============================================================*/
create table TEMP_AFILIADOS
(
   CONSECUTIVO3         int not null,
   COD_ARS              char(6) not null,
   TIPO_IDENTIFICACION_CABEZA_FAMILIA char(3) not null,
   NUMERO_IDENTIFICACION_CABEZA_FAMILIA char(16) not null,
   TIPO_IDENTIFICACION  char(3) not null,
   NUMERO_IDENTIFICACION char(16) not null,
   PRIMER_APELLIDO      char(20) not null,
   SEGUNDO_APELLIDO     char(20) not null,
   PRIMER_NOMBRE        char(20) not null,
   SEGUNDO_NOMBRE       char(20) not null,
   EDAD                 int not null,
   SEXO                 char(2) not null,
   TIPO_AFILIADO        char(1) not null,
   PARENTESCO_CABEZA_FAMILIA char(1) not null,
   GRUPO_POBLACIONAL    char(1) not null,
   NIVEL_SISBEN         int not null,
   NUMERO_FICHA_SISBEN  char(13) not null,
   NUCLEO_FAMILIAR_SISBEN char(5) not null,
   COD_DEPARTAMENTO     char(2) not null,
   COD_MUNICIPIO        char(3) not null,
   ZONA                 char(1) not null,
   FEC_AFILIACION_SGSSS date not null,
   FEC_AFILIACION_ENTIDAD_CONTRATANTE date not null,
   NUM_CONTRATO_ENTE_TERRITORIAL char(10) not null,
   FECHA_INICIO_CONTRATO_ENTE_TERRITORIAL date not null,
   TIPO_CONTRATO_ENTE_TERRITORIAL char(2) not null,
   PERTENENCIA_ETNICA   char(2) not null,
   ESTADO_AFILIACION    char(2) not null,
   DIRECCION            char(30),
   TELEFONO             char(20),
   LOCALIDAD            char(2),
   FECHA_CARNETIZACION  date,
   primary key (CONSECUTIVO3)
);

/*==============================================================*/
/* Table: TEMP_PYP                                              */
/*==============================================================*/
create table TEMP_PYP
(
   CONSECUTIVO4         int not null,
   EDAD                 int not null,
   SEXO                 char(2) not null,
   primary key (CONSECUTIVO4)
);

/*==============================================================*/
/* Table: TENTIDADES_CONTRATANTES                               */
/*==============================================================*/
create table TENTIDADES_CONTRATANTES
(
   COD_ENTIDAD_CONTRATANTE2 char(6) not null,
   DESC_ARS             char(200) not null,
   primary key (COD_ENTIDAD_CONTRATANTE2)
);

/*==============================================================*/
/* Table: TENTIDAD_CONTRATANTE                                  */
/*==============================================================*/
create table TENTIDAD_CONTRATANTE
(
   COD_ENTIDAD_CONTRATANTE char(6) not null,
   DESC_ENTIDAD_CONTRATANTE char(255) not null,
   primary key (COD_ENTIDAD_CONTRATANTE)
);

/*==============================================================*/
/* Table: TESTADOS_AFILIACIONES                                 */
/*==============================================================*/
create table TESTADOS_AFILIACIONES
(
   COD_ESTADO_AFILIACION2 char(2) not null,
   DESC_ESTADO_AFILIACION char(30),
   primary key (COD_ESTADO_AFILIACION2)
);

/*==============================================================*/
/* Table: TGRUPOS_POBLACIONALES                                 */
/*==============================================================*/
create table TGRUPOS_POBLACIONALES
(
   COD_GRUP_POBLACIONAL char(2) not null,
   DESC_GRUP_POBLACIONAL char(40),
   primary key (COD_GRUP_POBLACIONAL)
);

/*==============================================================*/
/* Table: TMES                                                  */
/*==============================================================*/
create table TMES
(
   COD_MES              int not null,
   MES                  char(10),
   primary key (COD_MES)
);

/*==============================================================*/
/* Table: TMETAS                                                */
/*==============================================================*/
create table TMETAS
(
   COD_META             int not null auto_increment,
   COD_PROGRAMA         int,
   COD_CUPS             char(6),
   PROGRAMA             int,
   FECHA_META_ANO       date,
   AREALIZARANO         int,
   primary key (COD_META)
);

/*==============================================================*/
/* Table: TMUNICIPIO                                            */
/*==============================================================*/
create table TMUNICIPIO
(
   COD_MUN              char(3) not null,
   COD_DEP              char(2) not null,
   DESC_MUNICIPIO       char(20),
   primary key (COD_MUN)
);

/*==============================================================*/
/* Table: TNIVEL_SISBEN2                                        */
/*==============================================================*/
create table TNIVEL_SISBEN2
(
   COD_NIVEL_SISBEN2    char(1) not null,
   DESC_NIVEL_SISBEN    char(30),
   primary key (COD_NIVEL_SISBEN2)
);

/*==============================================================*/
/* Table: TPARENTESCOS                                          */
/*==============================================================*/
create table TPARENTESCOS
(
   COD_PARENTESCO2      char(1) not null,
   DESC_PARENTESCO      char(30),
   primary key (COD_PARENTESCO2)
);

/*==============================================================*/
/* Table: TPERTENENCIA_ETNICA2                                  */
/*==============================================================*/
create table TPERTENENCIA_ETNICA2
(
   COD_PERTENENCIA_ETNICA2 char(2) not null,
   DESC_PERTENENCIA_ETNICA char(30),
   primary key (COD_PERTENENCIA_ETNICA2)
);

/*==============================================================*/
/* Table: TPROGRAMAS                                            */
/*==============================================================*/
create table TPROGRAMAS
(
   COD_PROGRAMA         int not null,
   NOMBRE_PROGRAMA      char(30),
   DETALLE_PROGRAMA     text,
   primary key (COD_PROGRAMA)
);

/*==============================================================*/
/* Table: TSEXOS                                                */
/*==============================================================*/
create table TSEXOS
(
   COD_SEXO2            char(2) not null,
   DESC_SEXO            char(30),
   primary key (COD_SEXO2)
);

/*==============================================================*/
/* Table: TTIPOACT                                              */
/*==============================================================*/
create table TTIPOACT
(
   COD_ACT              int not null,
   TIPO_ACTUALIZACION   int,
   primary key (COD_ACT)
);

/*==============================================================*/
/* Table: TTIPOS_AFILIADO                                       */
/*==============================================================*/
create table TTIPOS_AFILIADO
(
   COD_TIPO_AFILIADO2   char(1) not null,
   DESC_AFILIADO        char(40),
   primary key (COD_TIPO_AFILIADO2)
);

/*==============================================================*/
/* Table: TTIPOS_DE_IDENTIFICACION                              */
/*==============================================================*/
create table TTIPOS_DE_IDENTIFICACION
(
   COD_TIPO_IDENTIFICACION2 char(3) not null,
   DESC_DOC_TIP         char(30),
   primary key (COD_TIPO_IDENTIFICACION2)
);

/*==============================================================*/
/* Table: TTIPO_CONTRATO                                        */
/*==============================================================*/
create table TTIPO_CONTRATO
(
   COD_TIPO_CONTRATO    int not null auto_increment,
   DES_TIPO_CONTRATO    char(20),
   primary key (COD_TIPO_CONTRATO)
);

/*==============================================================*/
/* Table: TVIGENCIAFILTROS                                      */
/*==============================================================*/
create table TVIGENCIAFILTROS
(
   COD_ACTIVIDAD        decimal not null,
   COD_CUPS             char(6) not null,
   ESTADO               bool,
   primary key (COD_ACTIVIDAD, COD_CUPS)
);

/*==============================================================*/
/* Table: TZONAS                                                */
/*==============================================================*/
create table TZONAS
(
   COD_ZONA2            char(1) not null,
   DESC_ZONA            char(30),
   primary key (COD_ZONA2)
);

alter table TACTIVACION add constraint FK_ASIGNA foreign key (COD_MES)
      references TMES (COD_MES) on delete restrict on update restrict;

alter table TACTIVACION add constraint FK_TIENE foreign key (COD_AFILIADO)
      references TAFILIADOS (COD_AFILIADO) on delete restrict on update restrict;

alter table TACTIVIDAD_PROGRAMAR add constraint FK_ASIGNAR foreign key (COD_PROGRAMA, COD_CUPS)
      references TACTIVIDAD_X_PROGRAMA (COD_PROGRAMA, COD_CUPS) on delete restrict on update restrict;

alter table TACTIVIDAD_PROGRAMAR add constraint FK_PROGRAMA foreign key (COD_AFILIADO)
      references TAFILIADOS (COD_AFILIADO) on delete restrict on update restrict;

alter table TACTIVIDAD_X_PROGRAMA add constraint FK_HACE foreign key (COD_PROGRAMA)
      references TPROGRAMAS (COD_PROGRAMA) on delete restrict on update restrict;

alter table TACTIVIDAD_X_PROGRAMA add constraint FK_PERTENECE foreign key (COD_CUPS)
      references TCUPS (COD_CUPS) on delete restrict on update restrict;

alter table TACTUALIZACION add constraint FK_CONTIENE foreign key (COD_ACT)
      references TTIPOACT (COD_ACT) on delete restrict on update restrict;

alter table TACTUALIZACION add constraint FK_MODIFICAR foreign key (COD_TIPO_IDENTIFICACION2)
      references TTIPOS_DE_IDENTIFICACION (COD_TIPO_IDENTIFICACION2) on delete restrict on update restrict;

alter table TACTUALIZACION add constraint FK_PUEDERSER foreign key (COD_AFILIADO)
      references TAFILIADOS (COD_AFILIADO) on delete restrict on update restrict;

alter table TACTUALIZACION add constraint FK_RELATIONSHIP_73 foreign key (COD_ENTIDAD_CONTRATANTE)
      references TENTIDAD_CONTRATANTE (COD_ENTIDAD_CONTRATANTE) on delete restrict on update restrict;

alter table TAFILIADOS add constraint FK_AFILIAN foreign key (COD_CONTRATO)
      references TCONTRATO (COD_CONTRATO) on delete restrict on update restrict;

alter table TAFILIADOS add constraint FK_CABEZA_TIENE foreign key (TTI_COD_TIPO_IDENTIFICACION2)
      references TTIPOS_DE_IDENTIFICACION (COD_TIPO_IDENTIFICACION2) on delete restrict on update restrict;

alter table TAFILIADOS add constraint FK_CONTENER foreign key (COD_DEP)
      references TDEPARTAMENTO (COD_DEP) on delete restrict on update restrict;

alter table TAFILIADOS add constraint FK_EN_CALIDAD_DE2 foreign key (COD_TIPO_AFILIADO2)
      references TTIPOS_AFILIADO (COD_TIPO_AFILIADO2) on delete restrict on update restrict;

alter table TAFILIADOS add constraint FK_ES foreign key (COD_SEXO2)
      references TSEXOS (COD_SEXO2) on delete restrict on update restrict;

alter table TAFILIADOS add constraint FK_ESTAINSCRITO foreign key (COD_TIPO_CONTRATO)
      references TTIPO_CONTRATO (COD_TIPO_CONTRATO) on delete restrict on update restrict;

alter table TAFILIADOS add constraint FK_FILIACION2 foreign key (COD_PARENTESCO2)
      references TPARENTESCOS (COD_PARENTESCO2) on delete restrict on update restrict;

alter table TAFILIADOS add constraint FK_FORMA_PARTE_DE2 foreign key (COD_GRUP_POBLACIONAL)
      references TGRUPOS_POBLACIONALES (COD_GRUP_POBLACIONAL) on delete restrict on update restrict;

alter table TAFILIADOS add constraint FK_PERTENECE2 foreign key (COD_ENTIDAD_CONTRATANTE2)
      references TENTIDADES_CONTRATANTES (COD_ENTIDAD_CONTRATANTE2) on delete restrict on update restrict;

alter table TAFILIADOS add constraint FK_PERTENECEN foreign key (TAF_COD_AFILIADO)
      references TAFILIADOS (COD_AFILIADO) on delete restrict on update restrict;

alter table TAFILIADOS add constraint FK_POSEEN foreign key (COD_ESTADO_AFILIACION2)
      references TESTADOS_AFILIACIONES (COD_ESTADO_AFILIACION2) on delete restrict on update restrict;

alter table TAFILIADOS add constraint FK_RELATIONSHIP_77 foreign key (COD_MUN)
      references TMUNICIPIO (COD_MUN) on delete restrict on update restrict;

alter table TAFILIADOS add constraint FK_SECLASIFICA2 foreign key (COD_PERTENENCIA_ETNICA2)
      references TPERTENENCIA_ETNICA2 (COD_PERTENENCIA_ETNICA2) on delete restrict on update restrict;

alter table TAFILIADOS add constraint FK_SEIDENTIFICA foreign key (COD_TIPO_IDENTIFICACION2)
      references TTIPOS_DE_IDENTIFICACION (COD_TIPO_IDENTIFICACION2) on delete restrict on update restrict;

alter table TAFILIADOS add constraint FK_SE_LOCALIZA foreign key (COD_ZONA2)
      references TZONAS (COD_ZONA2) on delete restrict on update restrict;

alter table TAFILIADOS add constraint FK_TIENE_UN foreign key (COD_NIVEL_SISBEN2)
      references TNIVEL_SISBEN2 (COD_NIVEL_SISBEN2) on delete restrict on update restrict;

alter table TMETAS add constraint FK_CUMPLE foreign key (COD_PROGRAMA, COD_CUPS)
      references TACTIVIDAD_X_PROGRAMA (COD_PROGRAMA, COD_CUPS) on delete restrict on update restrict;

alter table TMUNICIPIO add constraint FK_RELATIONSHIP_79 foreign key (COD_DEP)
      references TDEPARTAMENTO (COD_DEP) on delete restrict on update restrict;

alter table TVIGENCIAFILTROS add constraint FK_ESTA foreign key (COD_CUPS)
      references TCUPS (COD_CUPS) on delete restrict on update restrict;

alter table TVIGENCIAFILTROS add constraint FK_PUEDE foreign key (COD_ACTIVIDAD)
      references TACTIVIDADFILTRAR (COD_ACTIVIDAD) on delete restrict on update restrict;

