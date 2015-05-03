--Sledece izmene baze važe za poslednju verziju exportovane baze 02.05.2015
--Naziv Commit-a: "baza 02.05.2015 (data+structure)"

--Posle opisa u komenataru navesti i redni broj zbog praćenja redosleda
--Primer i prva izmena ispod: 

--UPDATE-OVANA, NEMA IZMENA

--Kacca izmene
UPDATE `shop`.`slajder_slika` SET `putanjaSlika` = 'images/slider1.jpg' WHERE `slajder_slika`.`idSlajderSlika` = 1;
UPDATE `shop`.`slajder_slika` SET `putanjaSlika` = 'images/slider2.jpg' WHERE `slajder_slika`.`idSlajderSlika` = 2;
INSERT INTO `slajder_slika`(`idSlajderSlika`, `putanjaSlika`, `url`, `title`, `status`) VALUES ('','images/slider3.jpg','nesto','slajder','1'),('','images/slider4.jpg','nesto','slajder','1');
INSERT INTO `slajder_slika_veza`(`idSlajderSlika`, `idSlajder`) VALUES ('3','1'),('4','1');