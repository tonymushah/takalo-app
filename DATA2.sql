
create database service2 ;
create role serv2 login password 'service2';	
alter database service2 owner to serv2;


create table Admin(
idAdmin serial primary key not null,
Nom varchar(30),
MotPass varchar(30)
);
create table Categorie(
idCategorie serial primary key not null,
type varchar(20),
BudjetMensuel bigint
);

create table Beneficier(
idBeneficier serial primary key not null,
Nom varchar(30)
);

create table Utilisateur(
idUtilisateur serial primary key not null,
Nom varchar(20),
MotPass varchar(30)
);

create table Salaire(
idSalaire int,
Montant bigint
);

create table Depense(
idDepense serial primary key not null,
idCategorie int,
Montant bigint,
idBeneficier int,
DateDepense date default current_date,
idUtilisateur int,
FOREIGN KEY (idCategorie) REFERENCES Categorie(idCategorie),
FOREIGN KEY (idBeneficier) REFERENCES Beneficier(idBeneficier),
FOREIGN KEY (idUtilisateur) REFERENCES Utilisateur(idUtilisateur)	
);


create table EntreInpre(
Montant bigint,
idUtilisateur int
FOREIGN KEY (idUtilisateur) REFERENCES Utilisateur(idUtilisateur)	
);

insert into Admin(Nom,MotPass)values('Rakoto','123456'),
									('Rabe','0000');


insert into Categorie(type,BudjetMensuel)values('Nourriture',300000),									
											   ('Deplacement',15000),
											   ('Sante',500000);


insert into Beneficier(Nom)values('Rabe'),
								 ('Papa'),
								 ('Maman'),
								 ('Robert'),
								 ('Famille');


insert into Utilisateur(Nom,MotPass)values('Papa','1234');

insert into Salaire(Montant)values(5000000);

insert into Depense(idCategorie,Montant,idBeneficier,idUtilisateur)values
(1,10000,5,1),
(3,30000,3,1),
(2,2000,4,1);

