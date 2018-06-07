DROP DATABASE IF EXISTS MLR3;

CREATE DATABASE IF NOT EXISTS MLR3;
USE MLR3;
# -----------------------------------------------------------------------------
#       TABLE : LIGUE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS LIGUE
 (
   NOLIGUE INTEGER NOT NULL AUTO_INCREMENT ,
   NOMLIGUE VARCHAR(50) NOT NULL  
   , PRIMARY KEY (NOLIGUE) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : JOUEUR
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS JOUEUR
 (
   NOJOUEUR INTEGER NOT NULL AUTO_INCREMENT ,
   NOADHERENT INTEGER NOT NULL  ,
   BIOGRAPHIE VARCHAR(255) NULL  ,
   IMAGEJOUEUR VARCHAR(50) NULL  
   , PRIMARY KEY (NOJOUEUR) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE JOUEUR
# -----------------------------------------------------------------------------


CREATE UNIQUE INDEX I_FK_JOUEUR_ADHERENT
     ON JOUEUR (NOADHERENT ASC);

# -----------------------------------------------------------------------------
#       TABLE : COMMANDE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS COMMANDE
 (
   NOCOMMANDE INTEGER NOT NULL AUTO_INCREMENT ,
   NOADHERENT INTEGER NOT NULL  ,
   DATECOMMANDE DATETIME NOT NULL  ,
   DATETRAITEMENT DATETIME NULL  
   , PRIMARY KEY (NOCOMMANDE) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE COMMANDE
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_COMMANDE_ADHERENT
     ON COMMANDE (NOADHERENT ASC);

# -----------------------------------------------------------------------------
#       TABLE : EQUIPE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS EQUIPE
 (
   NOEQUIPE INTEGER NOT NULL AUTO_INCREMENT ,
   NOLIGUE INTEGER NOT NULL  ,
   NOADHERENT INTEGER NOT NULL  ,
   NOMEQUIPE VARCHAR(50) NOT NULL  ,
   IMAGE VARCHAR(50) NULL  
   , PRIMARY KEY (NOEQUIPE) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE EQUIPE
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_EQUIPE_LIGUE
     ON EQUIPE (NOLIGUE ASC);

CREATE  INDEX I_FK_EQUIPE_ADHERENT
     ON EQUIPE (NOADHERENT ASC);

# -----------------------------------------------------------------------------
#       TABLE : EVENEMENT
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS EVENEMENT
 (
   NOEVENEMENT INTEGER NOT NULL AUTO_INCREMENT ,
   DATEEVENEMENT DATETIME NOT NULL  ,
   NOEQUIPE INTEGER NOT NULL  ,
   NOMEVENEMENT VARCHAR(50) NULL  ,
   DETAILEVENEMENT VARCHAR(255) NULL  ,
   NOMIMAGE VARCHAR(50) NULL  ,
   LIENYOUTUBE VARCHAR(128) NULL  
   , PRIMARY KEY (NOEVENEMENT,DATEEVENEMENT) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE EVENEMENT
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_EVENEMENT_EQUIPE
     ON EVENEMENT (NOEQUIPE ASC);

# -----------------------------------------------------------------------------
#       TABLE : TAILLE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS TAILLE
 (
   NOTAILLE INTEGER NOT NULL AUTO_INCREMENT ,
   NOMTAILLE VARCHAR(50) NOT NULL  
   , PRIMARY KEY (NOTAILLE) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : PRODUIT
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS PRODUIT
 (
   NOPRODUIT INTEGER NOT NULL AUTO_INCREMENT ,
   NOCATEGORIE CHAR(32) NOT NULL  ,
   LIBELLE VARCHAR(128) NOT NULL  ,
   DETAIL VARCHAR(255) NOT NULL  ,
   PRIXHT DECIMAL(10,2) NOT NULL  ,
   TAUXTVA DECIMAL(10,2) NOT NULL  ,
   NOMIMAGE VARCHAR(50) NULL  ,
   QUANTITEENSTOCK DOUBLE PRECISION(13,2) NOT NULL  ,
   DATEAJOUT DATE NOT NULL  ,
   DISPONIBLE BOOL NOT NULL  
   , PRIMARY KEY (NOPRODUIT) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE PRODUIT
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_PRODUIT_CATEGORIE
     ON PRODUIT (NOCATEGORIE ASC);

# -----------------------------------------------------------------------------
#       TABLE : ADHERENT
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS ADHERENT
 (
   NOADHERENT INTEGER NOT NULL AUTO_INCREMENT ,
   NOM VARCHAR(40) NOT NULL  ,
   PRENOM VARCHAR(40) NOT NULL  ,
   ADRESSE VARCHAR(128) NULL  ,
   VILLE VARCHAR(40) NULL  ,
   CODEPOSTAL INTEGER NULL  ,
   EMAIL VARCHAR(38) NOT NULL  ,
   MOTDEPASSE VARCHAR(30) NOT NULL  ,
   PROFIL VARCHAR(30) NOT NULL  
   , PRIMARY KEY (NOADHERENT) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : SPONSOR
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS SPONSOR
 (
   NOSPONSOR INTEGER NOT NULL AUTO_INCREMENT ,
   NOMSPONSOR VARCHAR(50) NOT NULL  ,
   IMAGE VARCHAR(50) NOT NULL  ,
   EMAIL VARCHAR(30) NOT NULL  ,
   SITEWEB VARCHAR(128) NULL  
   , PRIMARY KEY (NOSPONSOR) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : CATEGORIE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS CATEGORIE
 (
   NOCATEGORIE CHAR(32) NOT NULL  ,
   LIBELLE CHAR(32) NOT NULL  
   , PRIMARY KEY (NOCATEGORIE) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : JOUER
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS JOUER
 (
   NOJOUEUR INTEGER NOT NULL  ,
   NOEQUIPE INTEGER NOT NULL  
   , PRIMARY KEY (NOJOUEUR,NOEQUIPE) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE JOUER
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_JOUER_JOUEUR
     ON JOUER (NOJOUEUR ASC);

CREATE  INDEX I_FK_JOUER_EQUIPE
     ON JOUER (NOEQUIPE ASC);

# -----------------------------------------------------------------------------
#       TABLE : SPONSORISE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS SPONSORISE
 (
   NOSPONSOR INTEGER NOT NULL  ,
   NOEVENEMENT INTEGER NOT NULL  ,
   DATEEVENEMENT DATETIME NOT NULL  
   , PRIMARY KEY (NOSPONSOR,NOEVENEMENT,DATEEVENEMENT) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE SPONSORISE
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_SPONSORISE_SPONSOR
     ON SPONSORISE (NOSPONSOR ASC);

CREATE  INDEX I_FK_SPONSORISE_EVENEMENT
     ON SPONSORISE (NOEVENEMENT ASC,DATEEVENEMENT ASC);

# -----------------------------------------------------------------------------
#       TABLE : LIGNE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS LIGNE
 (
   NOCOMMANDE INTEGER NOT NULL  ,
   NOPRODUIT INTEGER NOT NULL  ,
   QUANTITECOMMANDEE DOUBLE PRECISION(13,2) NOT NULL  
   , PRIMARY KEY (NOCOMMANDE,NOPRODUIT) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE LIGNE
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_LIGNE_COMMANDE
     ON LIGNE (NOCOMMANDE ASC);

CREATE  INDEX I_FK_LIGNE_PRODUIT
     ON LIGNE (NOPRODUIT ASC);

# -----------------------------------------------------------------------------
#       TABLE : DISPONIBLE_TAILLE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS DISPONIBLE_TAILLE
 (
   NOTAILLE INTEGER NOT NULL  ,
   NOPRODUIT INTEGER NOT NULL  
   , PRIMARY KEY (NOTAILLE,NOPRODUIT) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE DISPONIBLE_TAILLE
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_DISPONIBLE_TAILLE_TAILLE
     ON DISPONIBLE_TAILLE (NOTAILLE ASC);

CREATE  INDEX I_FK_DISPONIBLE_TAILLE_PRODUIT
     ON DISPONIBLE_TAILLE (NOPRODUIT ASC);


# -----------------------------------------------------------------------------
#       CREATION DES REFERENCES DE TABLE
# -----------------------------------------------------------------------------


ALTER TABLE JOUEUR 
  ADD FOREIGN KEY FK_JOUEUR_ADHERENT (NOADHERENT)
      REFERENCES ADHERENT (NOADHERENT) ;


ALTER TABLE COMMANDE 
  ADD FOREIGN KEY FK_COMMANDE_ADHERENT (NOADHERENT)
      REFERENCES ADHERENT (NOADHERENT) ;


ALTER TABLE EQUIPE 
  ADD FOREIGN KEY FK_EQUIPE_LIGUE (NOLIGUE)
      REFERENCES LIGUE (NOLIGUE) ;


ALTER TABLE EQUIPE 
  ADD FOREIGN KEY FK_EQUIPE_ADHERENT (NOADHERENT)
      REFERENCES ADHERENT (NOADHERENT) ;


ALTER TABLE EVENEMENT 
  ADD FOREIGN KEY FK_EVENEMENT_EQUIPE (NOEQUIPE)
      REFERENCES EQUIPE (NOEQUIPE) ;


ALTER TABLE PRODUIT 
  ADD FOREIGN KEY FK_PRODUIT_CATEGORIE (NOCATEGORIE)
      REFERENCES CATEGORIE (NOCATEGORIE) ;


ALTER TABLE JOUER 
  ADD FOREIGN KEY FK_JOUER_JOUEUR (NOJOUEUR)
      REFERENCES JOUEUR (NOJOUEUR) ;


ALTER TABLE JOUER 
  ADD FOREIGN KEY FK_JOUER_EQUIPE (NOEQUIPE)
      REFERENCES EQUIPE (NOEQUIPE) ;


ALTER TABLE SPONSORISE 
  ADD FOREIGN KEY FK_SPONSORISE_SPONSOR (NOSPONSOR)
      REFERENCES SPONSOR (NOSPONSOR) ;


ALTER TABLE SPONSORISE 
  ADD FOREIGN KEY FK_SPONSORISE_EVENEMENT (NOEVENEMENT,DATEEVENEMENT)
      REFERENCES EVENEMENT (NOEVENEMENT,DATEEVENEMENT) ;


ALTER TABLE LIGNE 
  ADD FOREIGN KEY FK_LIGNE_COMMANDE (NOCOMMANDE)
      REFERENCES COMMANDE (NOCOMMANDE) ;


ALTER TABLE LIGNE 
  ADD FOREIGN KEY FK_LIGNE_PRODUIT (NOPRODUIT)
      REFERENCES PRODUIT (NOPRODUIT) ;


ALTER TABLE DISPONIBLE_TAILLE 
  ADD FOREIGN KEY FK_DISPONIBLE_TAILLE_TAILLE (NOTAILLE)
      REFERENCES TAILLE (NOTAILLE) ;


ALTER TABLE DISPONIBLE_TAILLE 
  ADD FOREIGN KEY FK_DISPONIBLE_TAILLE_PRODUIT (NOPRODUIT)
      REFERENCES PRODUIT (NOPRODUIT) ;

