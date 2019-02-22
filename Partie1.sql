drop table if exists info cascade;
drop table if exists localisation cascade;
drop table if exists Detail_artistique cascade;
drop table if exists Date cascade;
drop table if exists Administratif cascade ;
drop table if exists Detail_photo cascade;
drop table if exists  Acompleter cascade;
drop sequence if exists seq_date;
drop sequence if exists seq_deta;
DROP SEQUENCE if exists villeID;
drop sequence if exists seq1;
drop sequence if exists seq2;
DROP SEQUENCE if exists villeID;
drop trigger if exists InsertVilleLambert on localisation;
CREATE SEQUENCE seq_deta START 1 increment by 1;
create sequence villeID Start 1 increment by 1;
CREATE SEQUENCE seq_date START 1 increment by 1;
CREATE SEQUENCE seq1 START 1 increment by 1 ;
CREATE SEQUENCE seq2 START 1 increment by 1 ;

--FN1
CREATE TABLE info(
reference_cindoc text,
serie text,
article text,
discriminant text,
ville text ,
sujet text ,
description_detaillee text,
date text,
notes_de_bas_de_page text ,
index_personnes text ,
fichier_numerique text ,
index_iconographique text ,
nombre_de_cliches text ,
taille_du_cliche text ,
negatif_ou_inversible text ,
couleur_ou_noir_et_blanc text ,
remarques text
);
