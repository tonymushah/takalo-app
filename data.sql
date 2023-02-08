create table comptable2
(
	idcompte serial primary key,
	num varchar(5),
	intitule varchar(35)
);
create table Ecriture 
(
	idEcriture BIGSERIAL PRIMARY KEY,
	datee date,
	piece varchar(13),
    compte varchar(13),
    Libelle varchar(13),
    DEBIT varchar(50),
    CREDIT varchar(50)
);

