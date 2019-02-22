
/* Importer les donnees qui se trouve dans le dossier*/
drop table if exists info cascade;
CREATE TABLE Localisation(
id_ville integer  NOT NULL,
Nom_ville text,
Latlambert93 integer default 0,
 Longlambert93 integer default 0,
primary key (id_ville)
);



CREATE TABLE Date (
id_date integer NOT NULL,
jour text ,
mois text ,
annee text,
primary key (id_date)
);


CREATE TABLE Detail_artistique(
id_photo integer NOT NULL ,
nb_cliche text ,
negatif_reversible text ,
couleur_noirblanc text,
remarque text ,
taille_cliche text ,
primary key (id_photo)
);


CREATE TABLE Administratif(
serie text,
reference_cindoc text,
article text not null ,
discriminant text ,
primary key (article ),
unique (article)
);

CREATE TABLE Detail_photo(
id_photo integer ,
id_ville integer ,
id_date integer ,
article text not null ,
description text ,
sujet text ,
notebasdepage text ,
index_personne text ,
fichier_numerique text,
fichier_iconographique text,
primary key (id_photo,article,id_date)
);

CREATE TABLE Acompleter
(
   	date text default 'Acompleter',
	article text not null,
    reference_cindoc text default 'Acompleter',
    serie text  default 'Acompleter',
    nom_ville text default 'Acompleter',
    sujet text default 'Acompleter',
    description text default 'Acompleter',
    index_personne text default 'Acompleter',
    nb_cliche text default 'Acompleter',
    negatif_reversible text default 'Acompleter',
    couleur_noirblanc  text default 'Acompleter',
 	discriminant text default null

);
Alter table Detail_photo
ADD FOREIGN KEY (id_photo) REFERENCES Detail_artistique(id_photo);

Alter table Detail_photo
ADD FOREIGN KEY (id_ville) REFERENCES Localisation(id_ville);

Alter table Detail_photo
ADD FOREIGN KEY (id_date) REFERENCES Date(id_date);

Alter table Detail_photo
ADD FOREIGN KEY (article) REFERENCES Administratif(article);
----------------------------------------------------------TABLE ACOMPLETER----------------------------------------------
create or replace function inserAcompleter(date text ,article text, reference text ,serie text,nom_ville text,sujet text ,description text ,index_personne text ,nb_cliche text ,negatif text , couleur text,discriminant text)
RETURNS void
AS $$
BEGIN
	IF nom_ville IS NULL OR date IS NULL OR serie IS NULL OR reference IS NULL THEN

			INSERT INTO Acompleter VALUES(date ,article ,reference ,serie ,nom_ville,sujet,description,index_personne,nb_cliche,negatif,couleur,discriminant);
	END IF;
END $$
LANGUAGE PLPGSQL;
SELECT inserAcompleter(info.date,info.article,info.reference_cindoc,info.serie,info.ville,info.sujet,info.description_detaillee,info.index_personnes,info.nombre_de_cliches,info.negatif_ou_inversible,info.couleur_ou_noir_et_blanc,info.discriminant)	from info;
-----------------------------------------------------------DECOUPE SUJET --------------------------------------------
 CREATE OR REPLACE FUNCTION decoupeSujet()
   RETURNS void
   AS $$
   DECLARE
      tabmot text[];
      x RECORD;
      i integer;
      j integer;
      res text;
   BEGIN
   	FOR x IN select article, sujet FROM info where sujet =', ' OR sujet =', ,' LOOP
   		UPDATE info
   			SET sujet = NULL
   	    WHERE article = x.article;
   		END LOOP;
   	FOR x IN select article, sujet FROM info where sujet ~ ',' LOOP
   			tabmot=regexp_split_to_array(x.sujet, ',');
   			IF array_length(tabmot,1) =1 THEN
   				UPDATE info
   					SET sujet = tabmot[1]
   				WHERE article = x.article;
   			END IF;
   			IF array_length(tabmot,1) =2 THEN
   				IF tabmot[1] != tabmot[2] THEN
   				res = array_to_string(tabmot, ',');
   					UPDATE info
   						SET sujet = res
   					WHERE article = x.article;
   				ELSE
   					UPDATE info
   						SET sujet = Tabmot[1]
   					WHERE article = x.article;
   				END IF;
   			END IF;
   			/*IF array_length(tabmot,1) >2 THEN
   				FOR i IN 1..array_length(tabmot,1) LOOP
   					FOR j IN (i+1)..array_length(tabmot,1) LOOP
   						IF tabmot[i] != tabmot[j] THEN
   							res=res || array_to_string(tabmot, ', ');
   						END IF;
   					END LOOP;
   				END LOOP;
   			UPDATE donnees
   				SET sujet = res
   			WHERE article = x.article;
   			END IF;*/
   	END LOOP;
   END $$
   LANGUAGE plpgsql;
   select decoupesujet();
------------------------------------------- DATE ----------------------------------------------------------------------
create or replace function inserDate(val varchar )
RETURNS void
AS $$
declare
tabmot text[];
i text;
BEGIN
	tabmot=regexp_split_to_array(val ,' ')	;

 	IF (array_length(tabmot,1)=3) THEN
		INSERT INTO Date VALUES(nextval('seq_date'), tabmot[1],tabmot[2],tabmot[3]);

	ELSE IF (array_length(tabmot,1)=2) THEN
		INSERT INTO Date VALUES(nextval('seq_date'), NULL,tabmot[1],tabmot[2]);

		ELSE IF (array_length(tabmot,1)=1) THEN
			INSERT INTO Date VALUES(nextval('seq_date'), NULL,NULL,tabmot[1]);

			ELSE
				INSERT INTO Date VALUES(nextval('seq_date'), NULL,NULL,NULL);
			END IF;
		END IF;
	END IF;
END $$
LANGUAGE PLPGSQL;


create or replace function inser3()
RETURNS void
AS $$
declare
tabmot text[];
BEGIN
	UPDATE info
		SET date = trim('Prise de vue : ' from date);
END $$
LANGUAGE PLPGSQL;


-------------------DETAIL ARTISTIQUE
create or replace function inserArt(nb text,neg text,coul text,remarque text, taille text )
RETURNS void
AS $$
BEGIN
INSERT INTO Detail_artistique VALUES(nextval('seq_deta'),nb ,neg,coul,remarque,taille);
END $$
LANGUAGE PLPGSQL;



------------------------------------------------- ADMINISTRATIF ----------------------------------------
CREATE OR REPLACE FUNCTION articleBis()
RETURNS TRIGGER
AS $$
BEGIN
	IF NEW.discriminant = 'bis' THEN
		NEW.article = NEW.article || NEW.discriminant;
		NEW.discriminant = null;
	END IF;
	RETURN NEW;
END $$ LANGUAGE PLPGSQL;

CREATE TRIGGER unArticleBis
BEFORE INSERT OR UPDATE ON info
FOR EACH ROW
	EXECUTE PROCEDURE articleBis();

create or replace function inserAdmi(serie text,reference_cindoc text,article text,discriminant text)
RETURNS void
AS $$
BEGIN
INSERT INTO Administratif VALUES(serie,reference_cindoc,article,discriminant);
END $$
LANGUAGE PLPGSQL;



---------------------------- LOCALISATION -----------------------------------------

create or replace function inser(ville varchar )
RETURNS void
AS $$
BEGIN
IF (LOWER(ville) NOT IN (select LOWER(nom_ville) from Localisation)) THEN
INSERT INTO Localisation VALUES(nextval('villeID'), ville,NULL,NULL);
END IF ;
END $$
LANGUAGE PLPGSQL;


CREATE OR REPLACE FUNCTION decoupeVille()
RETURNS void
AS $$
DECLARE
 tabmot varchar[];
 x RECORD;
BEGIN
FOR x IN select article, ville FROM info where ville ~ ',' LOOP
    tabmot=regexp_split_to_array(x.ville, ',');
  UPDATE info
    SET ville=tabmot[1]
  WHERE article = x.article;
  END LOOP;
  FOR x IN select article, ville FROM info where ville ~ '--' LOOP
    tabmot=regexp_split_to_array(x.ville, '--');
  UPDATE info
    SET ville=tabmot[1]
  WHERE article = x.article;
  END LOOP;
END $$
LANGUAGE plpgsql;

select decoupeville();
select inser(ville) from info;

 CREATE OR REPLACE FUNCTION Onisert()
 RETURNS trigger
 AS $$
declare
 ville_temp text;
 BEGIN
 raise notice '%', NEW.nom_ville ;
  ville_temp  := (Select nom_ville from localisation where LOWER(nom_ville)=LOWER(NEW.nom_ville));
raise notice '%', ville_temp;
 IF LOWER(NEW.nom_ville) = LOWER(ville_temp) THEN
  UPDATE localisation set Latlambert93 = NEW.Latlambert93 where LOWER(nom_ville)= LOWER(new.nom_ville);
 update localisation set Longlambert93= new.Longlambert93 where LOWER(nom_ville)=LOWER(new.nom_ville);
 raise notice 'update done';
 END IF;
 RETURN null;
 END $$ LANGUAGE PLPGSQL;


 CREATE TRIGGER InsertVilleLambert
 BEFORE INSERT ON localisation
 FOR EACH ROW
 EXECUTE PROCEDURE Onisert();




INSERT INTO localisation VALUES (nextval('villeID'),'Adon',685019, 6741086);
INSERT INTO localisation VALUES (nextval('villeID'), 'Aillant-sur-milleron', 694759, 6744402);
INSERT INTO localisation VALUES (nextval('villeID'), 'Allainville-en-beauce',629458, 6792608);
INSERT INTO localisation VALUES (nextval('villeID'), 'Andonville',627286, 6797080);
INSERT INTO localisation VALUES (nextval('villeID'), 'Ardon', 615378, 6742783);
INSERT INTO localisation VALUES (nextval('villeID'), 'Arrabloy', 678999, 6733327);
INSERT INTO localisation VALUES (nextval('villeID'), 'Artenay',  616599, 6776105);
INSERT INTO localisation VALUES (nextval('villeID'), 'Aschères-le-marché', 625563, 6778207);
INSERT INTO localisation VALUES (nextval('villeID'), 'Ascoux', 644192, 6780223);
INSERT INTO localisation VALUES (nextval('villeID'), 'Attray', 634519, 6780323);
INSERT INTO localisation VALUES (nextval('villeID'),'Audeville', 642867, 6796907);
INSERT INTO localisation VALUES (nextval('villeID'), 'Augerville-la-rivière', 657690, 6794559);
INSERT INTO localisation VALUES (nextval('villeID'), 'Aulnay-la-rivière', 653935, 6789030);
INSERT INTO localisation VALUES (nextval('villeID'), 'Autruy-sur-juine', 633221, 6797009);
INSERT INTO localisation VALUES (nextval('villeID'), 'Auvilliers-en-gâtinais', 662689, 6763408);
INSERT INTO localisation VALUES (nextval('villeID'), 'Auxy',  660562, 6780091);
INSERT INTO localisation VALUES (nextval('villeID'),'Baccon', 597599, 6754177);
INSERT INTO localisation VALUES (nextval('villeID'), 'Le Bardon',  599037, 6750819);
INSERT INTO localisation VALUES (nextval('villeID'), 'Barville-en-gâtinais', 655354, 6780128);
INSERT INTO localisation VALUES (nextval('villeID'), 'Batilly-en-gâtinais',  653822, 6774583);
INSERT INTO localisation VALUES (nextval('villeID'), 'Baule',  600476, 6747460);
INSERT INTO localisation VALUES (nextval('villeID'),'Bazoches-les-gallerandes', 629378, 6785940);
INSERT INTO localisation VALUES (nextval('villeID'), 'Bazoches-sur-le-betz', 698512, 6781070);
INSERT INTO localisation VALUES (nextval('villeID'), 'Beaugency',  597406, 6743068);
INSERT INTO localisation VALUES (nextval('villeID'), 'Beaulieu-sur-loire',  686459, 6715529);
INSERT INTO localisation VALUES (nextval('villeID'), 'Beaune-la-rolande',  657546, 6774555);
INSERT INTO localisation VALUES (nextval('villeID'), 'Le Bignon-mirabeau', 694050, 6783295);
INSERT INTO localisation VALUES (nextval('villeID'), 'Boësse', 659097, 6783435);
INSERT INTO localisation VALUES (nextval('villeID'), 'Boigny-sur-bionne',  626817, 6759299);
INSERT INTO localisation VALUES (nextval('villeID'), 'Boiscommun',53787, 6770138);
INSERT INTO localisation VALUES (nextval('villeID'), 'Boismorand', 679031, 6742215);
INSERT INTO localisation VALUES (nextval('villeID'), 'Boisseaux',  624289, 6794895);
INSERT INTO localisation VALUES (nextval('villeID'), 'Bondaroy',  646475, 6785759);
INSERT INTO localisation VALUES (nextval('villeID'), 'Bonnée', 653586, 6744582);
INSERT INTO localisation VALUES (nextval('villeID'), 'Bonny-sur-loire',  687218, 6718860);
INSERT INTO localisation VALUES (nextval('villeID'), 'Bordeaux-en-gâtinais', 664269, 6777844);
INSERT INTO localisation VALUES (nextval('villeID'), 'Les Bordes', 655100, 6746793);
INSERT INTO localisation VALUES (nextval('villeID'), 'Bou',  628977, 6752605);
INSERT INTO localisation VALUES (nextval('villeID'), 'Bougy-lez-neuville', 627700, 6770401);
INSERT INTO localisation VALUES (nextval('villeID'), 'Bouilly-en-gâtinais', 646384, 6775758);
INSERT INTO localisation VALUES (nextval('villeID'), 'Boulay-les-barres',  608982, 6765104);
INSERT INTO localisation VALUES (nextval('villeID'), 'Bouzonville-en-beauce', 642791, 6789128);
INSERT INTO localisation VALUES (nextval('villeID'), 'Bouzy-la-forêt',  653630, 6750138);
INSERT INTO localisation VALUES (nextval('villeID'), 'Boynes',  651633, 6780157);
INSERT INTO localisation VALUES (nextval('villeID'), 'Bray-en-val',  652864, 6747921);
INSERT INTO localisation VALUES (nextval('villeID'), 'Breteau',  692497, 6731072);
INSERT INTO localisation VALUES (nextval('villeID'), 'Briare',679722, 6725547);
INSERT INTO localisation VALUES (nextval('villeID'), 'Briarres-sur-essonne',  656931, 6792341);
INSERT INTO localisation VALUES (nextval('villeID'), 'Bricy',  609016, 6767326);
INSERT INTO localisation VALUES (nextval('villeID'), 'Bromeilles', 662837, 6786744);
INSERT INTO localisation VALUES (nextval('villeID'), 'Labrosse',  653961, 6792364);
INSERT INTO localisation VALUES (nextval('villeID'), 'Bucy-le-roi', 619562, 6774952);
INSERT INTO localisation VALUES (nextval('villeID'), 'Bucy-Saint-liphard',  608149, 6759560);
INSERT INTO localisation VALUES (nextval('villeID'), 'Cepoy',  679882, 6772214);
INSERT INTO localisation VALUES (nextval('villeID'), 'Cercottes', 616442, 6764993);
INSERT INTO localisation VALUES (nextval('villeID'), 'Cerdon', 652687, 6725701);
INSERT INTO localisation VALUES (nextval('villeID'), 'Cernoy-en-berry', 675175, 6715566);
INSERT INTO localisation VALUES (nextval('villeID'), 'Chailly-en-gâtinais', 666407, 6761163);
INSERT INTO localisation VALUES (nextval('villeID'), 'Chaingy',  608063, 6754005);
INSERT INTO localisation VALUES (nextval('villeID'), 'Châlette-sur-loing',  679871, 6768880);
INSERT INTO localisation VALUES (nextval('villeID'), 'Chambon-la-forêt', 647844, 6772411);
INSERT INTO localisation VALUES (nextval('villeID'), 'Champoulet',  693996, 6729960);
INSERT INTO localisation VALUES (nextval('villeID'), 'Chanteau',  623141, 6763791);
INSERT INTO localisation VALUES (nextval('villeID'), 'Chantecoq', 697764, 6772180);
INSERT INTO localisation VALUES (nextval('villeID'), 'La Chapelle-onzerain', 597143, 6770856);
INSERT INTO localisation VALUES (nextval('villeID'), 'La Chapelle-Saint-mesmin', 612547, 6753937);
INSERT INTO localisation VALUES (nextval('villeID'), 'La Chapelle-Saint-sépulcre', 688817, 6768856);
INSERT INTO localisation VALUES (nextval('villeID'), 'La Chapelle-sur-aveyron', 690280, 6752186);
INSERT INTO localisation VALUES (nextval('villeID'), 'Chapelon', 668694, 6770040);
INSERT INTO localisation VALUES (nextval('villeID'), 'Le Charme', 700000, 6744400);
INSERT INTO localisation VALUES (nextval('villeID'), 'Charmont-en-beauce', 633171, 6792564);
INSERT INTO localisation VALUES (nextval('villeID'),'Charsonville', 593962, 6759798);
INSERT INTO localisation VALUES (nextval('villeID'), 'Châteauneuf-sur-loire', 642433, 6752459);
INSERT INTO localisation VALUES (nextval('villeID'), 'Châteaurenard',  694772, 6758847);
INSERT INTO localisation VALUES (nextval('villeID'), 'Châtenoy',  655185, 6757904);
INSERT INTO localisation VALUES (nextval('villeID'), 'Châtillon-coligny',  688777, 6747744);
INSERT INTO localisation VALUES (nextval('villeID'), 'Châtillon-le-roi',  633069, 6783674);
INSERT INTO localisation VALUES (nextval('villeID'), 'Châtillon-sur-loire', 681207, 6719987);
INSERT INTO localisation VALUES (nextval('villeID'), 'Chaussy',  624174, 6786005);
INSERT INTO localisation VALUES (nextval('villeID'), 'Chécy',  626775, 6755966);
INSERT INTO localisation VALUES (nextval('villeID'), 'Chemault', 651569, 6772379);
INSERT INTO localisation VALUES (nextval('villeID'), 'Chevannes', 689584, 6781079);
INSERT INTO localisation VALUES (nextval('villeID'), 'Chevillon-sur-huillard',  672390, 6763354);
INSERT INTO localisation VALUES (nextval('villeID'), 'Chevilly', 616520, 6770549);
INSERT INTO localisation VALUES (nextval('villeID'), 'Chevry-sous-le-bignon', 692560, 6781074);
INSERT INTO localisation VALUES (nextval('villeID'), 'Chilleurs-aux-bois', 635202, 6774759);
INSERT INTO localisation VALUES (nextval('villeID'), 'Les Choux',  675295, 6744452);
INSERT INTO localisation VALUES (nextval('villeID'), 'Chuelles',  697762, 6766624);
INSERT INTO localisation VALUES (nextval('villeID'), 'Cléry-Saint-andré',  606462, 6747363);
INSERT INTO localisation VALUES (nextval('villeID'), 'Coinces',  606814, 6769583);
INSERT INTO localisation VALUES (nextval('villeID'), 'Combleux', 623787, 6756004);
INSERT INTO localisation VALUES (nextval('villeID'), 'Combreux', 647745, 6761299);
INSERT INTO localisation VALUES (nextval('villeID'), 'Conflans-sur-loing', 683577, 6761090);
INSERT INTO localisation VALUES (nextval('villeID'), 'Corbeilles',  666483, 6774497);
INSERT INTO localisation VALUES (nextval('villeID'), 'Corquilleroy', 677647, 6772222);
INSERT INTO localisation VALUES (nextval('villeID'), 'Cortrat',  682814, 6755536);
INSERT INTO localisation VALUES (nextval('villeID'), 'Coudray',  653254, 6796815);
INSERT INTO localisation VALUES (nextval('villeID'), 'Coudroy',  660413, 6757866);
INSERT INTO localisation VALUES (nextval('villeID'), 'Coullons',662443, 6724520);
INSERT INTO localisation VALUES (nextval('villeID'), 'Coulmiers', 600682, 6759681);
INSERT INTO localisation VALUES (nextval('villeID'), 'Courcelles', 649363, 6775731);
INSERT INTO localisation VALUES (nextval('villeID'), 'Courcy-aux-loges',641905, 6774689);
INSERT INTO localisation VALUES (nextval('villeID'), 'La Cour-marigny',  670112, 6755587);
INSERT INTO localisation VALUES (nextval('villeID'), 'Courtemaux',  694784, 6772182);
INSERT INTO localisation VALUES (nextval('villeID'), 'Courtempierre', 671713, 6777804);
INSERT INTO localisation VALUES (nextval('villeID'), 'Courtenay',  703726, 6769958);
INSERT INTO localisation VALUES (nextval('villeID'), 'Cravant',  593014, 6748702);
INSERT INTO localisation VALUES (nextval('villeID'), 'Crottes-en-pithiverais', 630799, 6780366);
INSERT INTO localisation VALUES (nextval('villeID'), 'Dadonville',  645711, 6783543);
INSERT INTO localisation VALUES (nextval('villeID'), 'Dammarie-en-puisaye',  690236, 6725521);
INSERT INTO localisation VALUES (nextval('villeID'), 'Dammarie-sur-loing', 691013, 6742185);
INSERT INTO localisation VALUES (nextval('villeID'), 'Dampierre-en-burly',664046, 6741176);
INSERT INTO localisation VALUES (nextval('villeID'), 'Darvoy', 632715, 6752561);
INSERT INTO localisation VALUES (nextval('villeID'), 'Desmonts' ,662872, 6792301);
INSERT INTO localisation VALUES (nextval('villeID'), 'Dimancheville', 657674, 6792336);
INSERT INTO localisation VALUES (nextval('villeID'), 'Donnery',  632778, 6758117);
INSERT INTO localisation VALUES (nextval('villeID'), 'Dordives', 682895, 6783317);
INSERT INTO localisation VALUES (nextval('villeID'), 'Dossainville', 645814, 6794656);
INSERT INTO localisation VALUES (nextval('villeID'), 'Douchy',  703732, 6761068);
INSERT INTO localisation VALUES (nextval('villeID'), 'Dry',  604182, 6745177);
INSERT INTO localisation VALUES (nextval('villeID'), 'Echilleuses',  657626, 6785668);
INSERT INTO localisation VALUES (nextval('villeID'), 'Egry', 657570, 6777889);
INSERT INTO localisation VALUES (nextval('villeID'), 'Engenville',  644308, 6792448);
INSERT INTO localisation VALUES (nextval('villeID'), 'Epieds-en-beauce', 596988, 6761967);
INSERT INTO localisation VALUES (nextval('villeID'), 'Erceville',  627973, 6792626);
INSERT INTO localisation VALUES (nextval('villeID'), 'Ervauville', 698510, 6775513);
INSERT INTO localisation VALUES (nextval('villeID'), 'Escrennes',  638995, 6781386);
INSERT INTO localisation VALUES (nextval('villeID'), 'Escrignelles', 686504, 6735527);
INSERT INTO localisation VALUES (nextval('villeID'), 'ESaintouy',  649458, 6786844);
INSERT INTO localisation VALUES (nextval('villeID'), 'Faronville', 629445, 6791496);
INSERT INTO localisation VALUES (nextval('villeID'), 'Faverelles', 694737, 6718849);
INSERT INTO localisation VALUES (nextval('villeID'), 'Fay-aux-loges',  635031, 6759203);
INSERT INTO localisation VALUES (nextval('villeID'), 'Feins-en-gâtinais', 688760, 6738855);
INSERT INTO localisation VALUES (nextval('villeID'), 'Férolles',  634160, 6748100);
INSERT INTO localisation VALUES (nextval('villeID'), 'Ferrières', 683617, 6775536);
INSERT INTO localisation VALUES (nextval('villeID'), 'La Ferté-Saint-aubin', 619780, 6736055);
INSERT INTO localisation VALUES (nextval('villeID'), 'Fleury-les-aubrais',619350, 6759396);
INSERT INTO localisation VALUES (nextval('villeID'), 'Fontenay-sur-loing', 682879, 6777761);
INSERT INTO localisation VALUES (nextval('villeID'), 'Foucherolles',  701489, 6775513);
INSERT INTO localisation VALUES (nextval('villeID'), 'Fréville-du-gâtinais',  657506, 6768999);
INSERT INTO localisation VALUES (nextval('villeID'), 'Gaubertin',  656842, 6780117);
INSERT INTO localisation VALUES (nextval('villeID'), 'Gémigny',  602996, 6764088);
INSERT INTO localisation VALUES (nextval('villeID'), 'Germigny-des-prés', 645403, 6750208);
INSERT INTO localisation VALUES (nextval('villeID'), 'Gidy',  612712, 6765047);
INSERT INTO localisation VALUES (nextval('villeID'), 'Gien',  672249, 6733355);
INSERT INTO localisation VALUES (nextval('villeID'), 'Girolles',  679145, 6774439);
INSERT INTO localisation VALUES (nextval('villeID'), 'Givraines', 653148, 6783479);
INSERT INTO localisation VALUES (nextval('villeID'), 'Grangermont' , 656891, 6786785);
INSERT INTO localisation VALUES (nextval('villeID'), 'Greneville-en-beauce',  634594, 6786991);
INSERT INTO localisation VALUES (nextval('villeID'), 'Griselles', 687340, 6775527);
INSERT INTO localisation VALUES (nextval('villeID'), 'Guigneville', 638333, 6789173);
INSERT INTO localisation VALUES (nextval('villeID'), 'Guignonville',  634619, 6789213);
INSERT INTO localisation VALUES (nextval('villeID'), 'Guilly',  646100, 6744646);
INSERT INTO localisation VALUES (nextval('villeID'), 'Huêtre',  610541, 6769525);
INSERT INTO localisation VALUES (nextval('villeID'), 'Huisseau-sur-mauves',  602867, 6756311);
INSERT INTO localisation VALUES (nextval('villeID'), 'Ingrannes',  640314, 6764703);
INSERT INTO localisation VALUES (nextval('villeID'), 'Ingré',  611866, 6758392);
INSERT INTO localisation VALUES (nextval('villeID'), 'Intville-la-guétard',  642103, 6794692);
INSERT INTO localisation VALUES (nextval('villeID'), 'Isdes',  643717, 6730224);
INSERT INTO localisation VALUES (nextval('villeID'), 'Izy',  630812, 6781477);
INSERT INTO localisation VALUES (nextval('villeID'), 'Jargeau',  634210, 6752544);
INSERT INTO localisation VALUES (nextval('villeID'), 'Jouy-en-pithiverais', 634532, 6781434);
INSERT INTO localisation VALUES (nextval('villeID'), 'Jouy-le-potier',  611584, 6739505);
INSERT INTO localisation VALUES (nextval('villeID'), 'Juranville',  662745, 6772297);
INSERT INTO localisation VALUES (nextval('villeID'), 'Laas',  641960, 6780245);
INSERT INTO localisation VALUES (nextval('villeID'), 'Ladon',  664947, 6766728);
INSERT INTO localisation VALUES (nextval('villeID'), 'Lailly-en-val',  601132, 6741893);
INSERT INTO localisation VALUES (nextval('villeID'), 'Langesse',  675305, 6746674);
INSERT INTO localisation VALUES (nextval('villeID'), 'Léouville', 631673, 6791470);
INSERT INTO localisation VALUES (nextval('villeID'), 'Ligny-le-ribault',  608467, 6731775);
INSERT INTO localisation VALUES (nextval('villeID'), 'Lion-en-beauce', 620398, 6781609);
INSERT INTO localisation VALUES (nextval('villeID'), 'Lion-en-sullias', 661021, 6736751);
INSERT INTO localisation VALUES (nextval('villeID'), 'Lombreuil',  672379, 6761132);
INSERT INTO localisation VALUES (nextval('villeID'), 'Lorcy',  664980, 6772284);
INSERT INTO localisation VALUES (nextval('villeID'), 'Lorris', 664120, 6753398);
INSERT INTO localisation VALUES (nextval('villeID'), 'Loury', 631388, 6767023);
INSERT INTO localisation VALUES (nextval('villeID'), 'Louzouer',  691055, 6769964);
INSERT INTO localisation VALUES (nextval('villeID'), 'Mainvilliers', 646607, 6800207);
INSERT INTO localisation VALUES (nextval('villeID'), 'Malesherbes',  656989, 6800121);
INSERT INTO localisation VALUES (nextval('villeID'), 'Manchecourt', 650249, 6792394);
INSERT INTO localisation VALUES (nextval('villeID'), 'Marcilly-en-villette',  626596, 6741522);
INSERT INTO localisation VALUES (nextval('villeID'), 'Mardié',  628990, 6753716);
INSERT INTO localisation VALUES (nextval('villeID'), 'Mareau-aux-bois', 638961, 6778053);
INSERT INTO localisation VALUES (nextval('villeID'), 'Mareau-aux-prés', 608793, 6752882);
INSERT INTO localisation VALUES (nextval('villeID'), 'Marigny-les-usages', 626844, 6761521);
INSERT INTO localisation VALUES (nextval('villeID'), 'Marsainvilliers',  646526, 6791316);
INSERT INTO localisation VALUES (nextval('villeID'), 'Melleroy',  696263, 6755513);
INSERT INTO localisation VALUES (nextval('villeID'), 'MéneSaintreau-en-villette',  626500, 6733746);
INSERT INTO localisation VALUES (nextval('villeID'), 'Mérinville',  694787, 6775515);
INSERT INTO localisation VALUES (nextval('villeID'), 'Messas',  597445, 6745290);
INSERT INTO localisation VALUES (nextval('villeID'), 'Meung-sur-loire',  602739, 6748534);
INSERT INTO localisation VALUES (nextval('villeID'), 'Mézières-en-gâtinais',  661240, 6770085);
INSERT INTO localisation VALUES (nextval('villeID'), 'Mignères',  672431, 6772244);
INSERT INTO localisation VALUES (nextval('villeID'), 'Mignerette', 670196, 6772255);
INSERT INTO localisation VALUES (nextval('villeID'), 'Montargis',  681355, 6766653);
INSERT INTO localisation VALUES (nextval('villeID'), 'Montbarrois',  655294, 6772349);
INSERT INTO localisation VALUES (nextval('villeID'), 'Montbouy',  686542, 6752193);
INSERT INTO localisation VALUES (nextval('villeID'), 'Montcorbon', 705223, 6763292);
INSERT INTO localisation VALUES (nextval('villeID'), 'Montcresson', 686550, 6755527);
INSERT INTO localisation VALUES (nextval('villeID'), 'Montereau',  667840, 6750043);
INSERT INTO localisation VALUES (nextval('villeID'), 'Montigny',  634519, 6780323);
INSERT INTO localisation VALUES (nextval('villeID'), 'Montliard',  655269, 6769016);
INSERT INTO localisation VALUES (nextval('villeID'), 'Mormant-sur-vernisson',  679844, 6761102);
INSERT INTO localisation VALUES (nextval('villeID'), 'Morville-en-beauce',  638392, 6794730);
INSERT INTO localisation VALUES (nextval('villeID'), 'Le Moulinet-sur-solin',  671568, 6747802);
INSERT INTO localisation VALUES (nextval('villeID'), 'Moulon',  670179, 6768921);
INSERT INTO localisation VALUES (nextval('villeID'), 'Nancray-sur-rimarde', 650098, 6774614);
INSERT INTO localisation VALUES (nextval('villeID'), 'Nangeville',  649573, 6800180);
INSERT INTO localisation VALUES (nextval('villeID'), 'Nargis',  681390, 6777765);
INSERT INTO localisation VALUES (nextval('villeID'), 'Nesploy',653015, 6766811);
INSERT INTO localisation VALUES (nextval('villeID'), 'Neuville-aux-bois',  629244, 6774828);
INSERT INTO localisation VALUES (nextval('villeID'), 'La Neuville-sur-essonne',  653174, 6786813);
INSERT INTO localisation VALUES (nextval('villeID'), 'Neuvy-en-sullias', 643855, 6744667);
INSERT INTO localisation VALUES (nextval('villeID'), 'Nevoy',  668511, 6735595);
INSERT INTO localisation VALUES (nextval('villeID'), 'Nibelle', 650051, 6769058);
INSERT INTO localisation VALUES (nextval('villeID'), 'Nogent-sur-vernisson', 681302, 6749985);
INSERT INTO localisation VALUES (nextval('villeID'), 'Noyers',  664147, 6757843);
INSERT INTO localisation VALUES (nextval('villeID'), 'Oison',  623373, 6781569);
INSERT INTO localisation VALUES (nextval('villeID'), 'Olivet', 617763, 6752751);
INSERT INTO localisation VALUES (nextval('villeID'), 'Ondreville-sur-essonne',  655421, 6789018);
INSERT INTO localisation VALUES (nextval('villeID'), 'Orléans',  617841, 6758306);
INSERT INTO localisation VALUES (nextval('villeID'), 'Ormes', 610389, 6759526);
INSERT INTO localisation VALUES (nextval('villeID'), 'Orveau-bellesauve', 650296, 6797951);
INSERT INTO localisation VALUES (nextval('villeID'), 'Orville',  657674, 6792336);
INSERT INTO localisation VALUES (nextval('villeID'), 'Ousson-sur-loire',  683462, 6719981);
INSERT INTO localisation VALUES (nextval('villeID'), 'Oussoy-en-gâtinais',  673857, 6757792);
INSERT INTO localisation VALUES (nextval('villeID'), 'Outarville',  627217, 6791523);
INSERT INTO localisation VALUES (nextval('villeID'), 'Ouzouer-des-champs',  677575, 6753332);
INSERT INTO localisation VALUES (nextval('villeID'), 'Ouzouer-sous-bellegarde',  660458, 6764533);
INSERT INTO localisation VALUES (nextval('villeID'), 'Ouzouer-sur-loire',  661050, 6741195);
INSERT INTO localisation VALUES (nextval('villeID'), 'Ouzouer-sur-trézée', 684991, 6729976);
INSERT INTO localisation VALUES (nextval('villeID'), 'Pannecières',  636943, 6798080);
INSERT INTO localisation VALUES (nextval('villeID'), 'Pannes',  675398, 6768897);
INSERT INTO localisation VALUES (nextval('villeID'), 'Patay',  603142, 6772977);
INSERT INTO localisation VALUES (nextval('villeID'), 'Paucourt', 685092, 6769976);
INSERT INTO localisation VALUES (nextval('villeID'), 'Pers-en-gâtinais', 692558, 6779963);
INSERT INTO localisation VALUES (nextval('villeID'), 'Pierrefitte-ès-bois', 678924, 6712218);
INSERT INTO localisation VALUES (nextval('villeID'), 'Pithiviers',  644245, 6785780);
INSERT INTO localisation VALUES (nextval('villeID'), 'Pithiviers-le-vieil',  642015, 6785801);
INSERT INTO localisation VALUES (nextval('villeID'), 'Poilly-lez-gien', 669988, 6731144);
INSERT INTO localisation VALUES (nextval('villeID'), 'Préfontaines',  676179, 6777784);
INSERT INTO localisation VALUES (nextval('villeID'), 'Presnoy',  666407, 6761163);
INSERT INTO localisation VALUES (nextval('villeID'), 'Pressigny-les-pins', 681312, 6753319);
INSERT INTO localisation VALUES (nextval('villeID'), 'Puiseaux', 660622, 6788981);
INSERT INTO localisation VALUES (nextval('villeID'), 'Quiers-sur-bézonde',  657490, 6766777);
INSERT INTO localisation VALUES (nextval('villeID'), 'Ramoulu',  646526, 6791316);
INSERT INTO localisation VALUES (nextval('villeID'), 'Rebréchien', 629124, 6764827);
INSERT INTO localisation VALUES (nextval('villeID'), 'Rouvray-Sainte-croix',  605377, 6772940);
INSERT INTO localisation VALUES (nextval('villeID'), 'Rouvres-Saint-jean', 642180, 6802472);
INSERT INTO localisation VALUES (nextval('villeID'), 'Rozières-en-beauce', 602922, 6759644);
INSERT INTO localisation VALUES (nextval('villeID'), 'Saint-aignan-des-gués', 649142, 6750175);
INSERT INTO localisation VALUES (nextval('villeID'), 'Saint-aignan-le-jaillard',  657289, 6738999);
INSERT INTO localisation VALUES (nextval('villeID'), 'Saint-ay', 606515, 6750696);
INSERT INTO localisation VALUES (nextval('villeID'), 'Saint-benoît-sur-loire',  647617, 6746854);
INSERT INTO localisation VALUES (nextval('villeID'), 'Saint-brisson-sur-loire',  675976, 6727783);
INSERT INTO localisation VALUES (nextval('villeID'), 'Saint-cyr-en-val',  622938, 6748236);
INSERT INTO localisation VALUES (nextval('villeID'), 'Saint-denis-de-lhôtel', 634210, 6752544);
INSERT INTO localisation VALUES (nextval('villeID'), 'Saint-denis-en-val', 621516, 6753811);
INSERT INTO localisation VALUES (nextval('villeID'), 'Saint-firmin-des-bois', 694030, 6763293);
INSERT INTO localisation VALUES (nextval('villeID'), 'Saint-firmin-sur-loire', 679719, 6724436);
INSERT INTO localisation VALUES (nextval('villeID'), 'Sainte-geneviève-des-bois', 686530, 6746638);
INSERT INTO localisation VALUES (nextval('villeID'), 'Saint-germain-des-prés',  688802, 6761078);
INSERT INTO localisation VALUES (nextval('villeID'), 'Saint-gondon',  664749, 6733394);
INSERT INTO localisation VALUES (nextval('villeID'), 'Saint-hilaire-les-andrésis',701490, 6772180);
INSERT INTO localisation VALUES (nextval('villeID'), 'Saint-hilaire-Saint-mesmin', 612531, 6752826);
INSERT INTO localisation VALUES (nextval('villeID'), 'Saint-hilaire-sur-puiseaux',677583, 6755554);
INSERT INTO localisation VALUES (nextval('villeID'), 'Saint-jean-de-braye',  623040, 6756013);
INSERT INTO localisation VALUES (nextval('villeID'), 'Saint-jean-de-la-ruelle', 615600, 6758338);
INSERT INTO localisation VALUES (nextval('villeID'), 'Saint-jean-le-blanc',  619304, 6756063);
INSERT INTO localisation VALUES (nextval('villeID'), 'Saint-loup-de-gonois',694039, 6772182);
INSERT INTO localisation VALUES (nextval('villeID'), 'Saint-loup-des-vignes', 656768, 6770116);
INSERT INTO localisation VALUES (nextval('villeID'), 'Saint-lyé-la-forêt',  624002, 6772670);
INSERT INTO localisation VALUES (nextval('villeID'), 'Saint-martin-dabbat',  645403, 6750208);
INSERT INTO localisation VALUES (nextval('villeID'), 'Saint-martin-sur-ocre', 675226, 6727786);
INSERT INTO localisation VALUES (nextval('villeID'), 'Saint-maurice-sur-aveyron',  694764, 6749958);
INSERT INTO localisation VALUES (nextval('villeID'), 'Saint-maurice-sur-fessard',  671659, 6766691);
INSERT INTO localisation VALUES (nextval('villeID'), 'Saint-michel',  653077, 6774589);
INSERT INTO localisation VALUES (nextval('villeID'), 'Saint-péravy-épreux',624246, 6791561);
INSERT INTO localisation VALUES (nextval('villeID'), 'Saint-péravy-la-colombe', 603050, 6767421);
INSERT INTO localisation VALUES (nextval('villeID'), 'Saint-pryvé-Saint-mesmin',  615537, 6753893);
INSERT INTO localisation VALUES (nextval('villeID'), 'Saint-sigismond', 601522, 6765224);
INSERT INTO localisation VALUES (nextval('villeID'), 'Sandillon', 627454, 6750401);
INSERT INTO localisation VALUES (nextval('villeID'), 'Santeau',  636704, 6775854);
INSERT INTO localisation VALUES (nextval('villeID'), 'Saran',  616394, 6761660);
INSERT INTO localisation VALUES (nextval('villeID'), 'Sceaux-du-gâtinais',  670224, 6777811);
INSERT INTO localisation VALUES (nextval('villeID'), 'Sébouville',  635361, 6789205);
INSERT INTO localisation VALUES (nextval('villeID'), 'Seichebrières', 645526, 6763541);
INSERT INTO localisation VALUES (nextval('villeID'), 'La Selle-en-hermoy',  692544, 6768850);
INSERT INTO localisation VALUES (nextval('villeID'), 'La Selle-sur-le-bied', 691062, 6774409);
INSERT INTO localisation VALUES (nextval('villeID'), 'Semoy',  621590, 6759366);
INSERT INTO localisation VALUES (nextval('villeID'), 'Sennely', 636225, 6731411);
INSERT INTO localisation VALUES (nextval('villeID'), 'Sermaises', 640675, 6800264);
INSERT INTO localisation VALUES (nextval('villeID'), 'Sigloy',642390, 6748014);
INSERT INTO localisation VALUES (nextval('villeID'), 'Solterre', 681319, 6755541);
INSERT INTO localisation VALUES (nextval('villeID'), 'Sougy',  609102, 6772882);
INSERT INTO localisation VALUES (nextval('villeID'), 'Sully-la-chapelle',  638811, 6763607);
INSERT INTO localisation VALUES (nextval('villeID'), 'Sully-sur-loire', 652811, 6741255);
INSERT INTO localisation VALUES (nextval('villeID'), 'Sury-aux-bois',  650003, 6763502);
INSERT INTO localisation VALUES (nextval('villeID'), 'Tavers',  596599, 6739748);
INSERT INTO localisation VALUES (nextval('villeID'), 'Teillay-le-gaudin', 624189, 6787116);
INSERT INTO localisation VALUES (nextval('villeID'), 'Teillay-saint-benoît',  630773, 6778143);
INSERT INTO localisation VALUES (nextval('villeID'), 'Thignonville',  638427, 6798064);
INSERT INTO localisation VALUES (nextval('villeID'), 'Thimory', 670123, 6757809);
INSERT INTO localisation VALUES (nextval('villeID'), 'Thorailles', 692544, 6768850);
INSERT INTO localisation VALUES (nextval('villeID'), 'Tigy',  640112, 6744703);
INSERT INTO localisation VALUES (nextval('villeID'), 'Tivernon',  620428, 6783831);
INSERT INTO localisation VALUES (nextval('villeID'), 'Tournoisis', 597831, 6767510);
INSERT INTO localisation VALUES (nextval('villeID'), 'Traînou', 632841, 6763672);
INSERT INTO localisation VALUES (nextval('villeID'), 'Triguères',698506, 6758845);
INSERT INTO localisation VALUES (nextval('villeID'), 'Trinay',  621811, 6776033);
INSERT INTO localisation VALUES (nextval('villeID'), 'Vannes-sur-cosson',  641521, 6735800);
INSERT INTO localisation VALUES (nextval('villeID'), 'Vennecy',  629084, 6761494);
INSERT INTO localisation VALUES (nextval('villeID'), 'Vienne-en-val',  634872, 6744759);
INSERT INTO localisation VALUES (nextval('villeID'), 'Viglain',  647529, 6736855);
INSERT INTO localisation VALUES (nextval('villeID'), 'Villamblain',  591906, 6769838);
INSERT INTO localisation VALUES (nextval('villeID'), 'Villemandeur', 677617, 6764443);
INSERT INTO localisation VALUES (nextval('villeID'), 'Villemoutiers', 666439, 6766719);
INSERT INTO localisation VALUES (nextval('villeID'), 'Villemurlin',  649730, 6731281);
INSERT INTO localisation VALUES (nextval('villeID'), 'Villeneuve-sur-conie',  599417, 6773039);
INSERT INTO localisation VALUES (nextval('villeID'), 'Villereau',  624031, 6774893);
INSERT INTO localisation VALUES (nextval('villeID'), 'Villevoques', 672421, 6770021);
INSERT INTO localisation VALUES (nextval('villeID'), 'Villorceau', 595200, 6745329);
INSERT INTO localisation VALUES (nextval('villeID'), 'Vimory',  676112, 6761116);
INSERT INTO localisation VALUES (nextval('villeID'), 'Vitry-aux-loges',  645485, 6759097);
INSERT INTO localisation VALUES (nextval('villeID'), 'Vrigny', 642661, 6775793);
INSERT INTO localisation VALUES (nextval('villeID'), 'Yèvre-la-ville',  649410, 6781288);
INSERT INTO localisation VALUES (nextval('villeID'), 'Yèvre-le-châtel', 650173, 6783504);
INSERT INTO localisation VALUES (nextval('villeID'), 'Les Bézards',  679787, 6744435);
INSERT INTO localisation VALUES (nextval('villeID'), 'Pont-aux-moines', 629017, 6755938);



--------------------------------------------------------------DETAIL PHOTO



create or replace function inserDet(discriminant text,ville text,art text,sujet text,description text, notebasdepage text , index_personne text ,fichier_num text,index_iconogrphique text)
RETURNS void
AS $$
DECLARE
i integer ;
j integer ;
BEGIN
i:= (SELECT id_ville from localisation where nom_ville=ville );
INSERT INTO detail_photo VALUES(nextval('seq1'),i,nextval('seq2'),art,description ,sujet , notebasdepage , index_personne,fichier_num  ,index_iconogrphique );
END $$
LANGUAGE PLPGSQL;

select inser3();
SELECT  inserDate(info.date) from info;
SELECT inserAdmi(info.serie ,info.reference_cindoc,info.article,info.discriminant) from info;
SELECT inserArt(info.nombre_de_cliches, info.negatif_ou_inversible,info.couleur_ou_noir_et_blanc , info.remarques,info.taille_du_cliche) from info;
SELECT inserDet(info.discriminant,info.ville,info.article ,info.sujet,info.description_detaillee ,info.notes_de_bas_de_page,info.index_personnes,info.fichier_numerique,info.index_iconographique) from info;

																				  
------------------------------------------------------------LES INDEX
	  
CREATE INDEX latlambertIndex ON localisation(latlambert93);
CREATE INDEX longlambertIndex ON localisation(longlambert93);
CREATE INDEX VilleIndex ON localisation(Nom_ville);
CREATE INDEX nbClicheIndex ON Detail_artistique(nb_cliche);
CREATE INDEX dateIndex ON Date(annee);
CREATE INDEX datemoisIndex ON Date(mois);
CREATE INDEX datejourIndex ON Date(jour);


drop user if exists Administrateur;
drop user if exists utilisateur;
																				  
CREATE USER administrateur WITH PASSWORD 'admin';
CREATE USER utilisateur with password 'user';
GRANT SELECT ON TABLE localisation TO utilisateur;
GRANT SELECT ON TABLE administratif TO utilisateur;
GRANT SELECT ON TABLE date TO utilisateur;
GRANT SELECT ON TABLE acompleter TO utilisateur;
GRANT SELECT ON TABLE detail_artistique TO utilisateur;
GRANT SELECT ON TABLE detail_photo TO utilisateur;

GRANT ALL ON TABLE detail_photo TO Administrateur;
GRANT ALL ON TABLE localisation TO Administrateur;
GRANT ALL ON TABLE administratif TO Administrateur;
GRANT ALL ON TABLE date TO Administrateur;
GRANT ALL ON TABLE acompleter TO Administrateur;
GRANT ALL ON TABLE detail_artistique TO Administrateur;
GRANT ALL ON TABLE detail_photo TO Administrateur;



