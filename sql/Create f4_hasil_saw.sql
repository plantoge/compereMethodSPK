CREATE TABLE f4_rank_saw (
	id_hsaw int AUTO_INCREMENT PRIMARY KEY,
    nisn varchar(9) NOT NULL,
    FOREIGN KEY(nisn) REFERENCES f2_evaluasi(nisn),
    inisial varchar(2) NOT NULL,
    FOREIGN KEY(inisial) REFERENCES f1_kfaktor(inisial),
    nilai_rank float,
    normalisasi float,
    bbt_nor float
)