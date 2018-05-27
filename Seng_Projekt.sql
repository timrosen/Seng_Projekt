CREATE TABLE Filmtable
 (
   FilmID integer PRIMARY KEY,
   Name Varchar (40),
   Jahr integer,
   Regisseur Varchar (40),
   Länge Varchar (20),
   Genre integer REFERENCES Genretable(GenreID),
   Beschreibung Varchar (200)
);
 
CREATE TABLE Genretable
(
GenreID integer PRIMARY KEY,
Genre1 Varchar (20),
Genre2 Varchar (20),
Genre3 Varchar (20),
Genre4 Varchar (20)
);

