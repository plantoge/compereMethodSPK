CREATE TABLE f3_rank_mfep (
	id_hmfep int AUTO_INCREMENT PRIMARY KEY,
    nisn varchar(9) NOT NULL,
    FOREIGN KEY(nisn) REFERENCES f2_evaluasi(nisn),
    inisial varchar(2) NOT NULL,
    FOREIGN KEY(inisial) REFERENCES f1_kfaktor(inisial),
    nef float,
    nbe float
)