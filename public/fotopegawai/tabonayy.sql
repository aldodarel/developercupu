-- Nama		: Inggrid Elisabeth Pardede
-- NIM		: 11422052
-- Kelas	: 41 TRPL 2
	
CREATE DATABASE tabonay
USE tabonay

CREATE TABLE pembayaran
(
 id_pembayaran VARCHAR(200),
 metode_pembayaran VARCHAR(200),
 total_pembayaran INT,
 jenis_bank VARCHAR(200),
 id_customer INT,
 PRIMARY KEY (id_pembayaran),
 FOREIGN KEY (id_customer) REFERENCES customer (id_customer)
)

CREATE TABLE jenis_pengiriman
(
 id_jasapengiriman INT,
 nama_jasapengiriman VARCHAR(200),
 no_resi INT,
 alamat_kirim VARCHAR(200),
 tarif_ongkir INT,
 PRIMARY KEY (id_jasapengiriman)
)


CREATE TABLE customer
(
 id_customer INT,
 nama_customer VARCHAR(200),
 alamat_customer VARCHAR(200),
 email_customer VARCHAR(200),
 nohp_customer VARCHAR(15),
 kode_pos INT,
 PRIMARY KEY (id_customer)
)



CREATE TABLE produk 
(
 id_produk INT,
 nama_produk VARCHAR(200),
 harga_produk INT,
 berat_produk VARCHAR(200),
 stok_produk VARCHAR(200),
 deskripsi_produk VARCHAR(200),
 id_admin INT,
 PRIMARY KEY (id_produk),
 FOREIGN KEY (id_admin) REFERENCES admin_tabonay (id_admin)
)


CREATE TABLE customer_produk
(
 id_customer INT,
 id_produk INT,
 PRIMARY KEY (id_customer,id_produk),
 FOREIGN KEY (id_customer) REFERENCES customer (id_customer),
 FOREIGN KEY (id_produk) REFERENCES produk (id_produk)
)



CREATE TABLE pemesanan 
(
 id_pemesanan INT,
 nomor_pemesanan INT,
 status_pemesanan VARCHAR(200),
 tanggal_pemesanan DATE,
 total_pemesanan INT,
 id_admin INT,
 id_customer INT,
 id_jasapengiriman INT,
 PRIMARY KEY (id_pemesanan),
 FOREIGN KEY (id_admin) REFERENCES admin_tabonay (id_admin),
 FOREIGN KEY (id_customer) REFERENCES customer (id_customer),
 FOREIGN KEY (id_jasapengiriman) REFERENCES jenis_pengiriman (id_jasapengiriman)
)



CREATE TABLE admin_tabonay
(
 id_admin INT,
 nama_admin VARCHAR(200),
 password_admin VARCHAR(200),
 email VARCHAR(200),
 alamat_admin VARCHAR(200),
 PRIMARY KEY (id_admin)
)




-- Data Dummy

SELECT * FROM customer
INSERT INTO customer VALUE
(11422051,'Yulanda','Bor-Bor','yulanda1@gmail.com','081323436676',22356),
(11422052,'Inggrid','Laguboti','inggrid72@gmail.com','081361050736',22381),
(11422053,'Renatha','Sitoluama','Renatha52@gmail.com','082122446676',22388),
(11422054,'Salomo','Tangerang','salomoo123@gmail.com','081222658791',11345),
(11422055,'Yerin','Siantar','yenrylin21@gmail.com','081266765445',22368),
(11422056,'Indah','Tarutung','Yessi56@gmail.com','082134567234',22453),
(11422057,'William','Balige','william57@gmail.com','082155667788',22388),
(11422058,'Yohannes','Medan','yohannes34@gmail.com','089566778776',22456),
(11422059,'Joice','Jambi','joicee34@gmail.com','082156453221',22378),
(11422060,'Steven','Balige','steven23@gmail.com','083256788998',22388)

TRUNCATE TABLE pembayaran

SELECT * FROM pembayaran

INSERT INTO pembayaran VALUE
('A51A','Transfer',50000,'Mandiri',11422051),
('A52A','Cash',45000,'',11422052),
('A53A','Cash',75000,'',11422053),
('A54A','Transfer',150000,'BNI',11422054),
('A55A','Transfer',200000,'Mandiri',11422055),
('A56A','Transfer',120000,'Mandiri',11422056),
('A57A','Cash',160000,'',11422057),
('A58A','Transfer',250000,'BRI',11422058),
('A59A','Transfer',125000,'BNI',11422059),
('A60A','Cash',180000,'',11422060)


