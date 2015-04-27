--Sledece izmene baze važe za poslednju verziju exportovane baze 19.04.2015
--Naziv Commit-a: NOVI SQL!!! (19.04)
--Putanja: https://github.com/ICTCrew/shop/commit/01b2249750d654982bf348538c61b913d6abc326#diff-ad7451e00b293386405e78c1632ec0e6
--Posle opisa u komenataru navesti i redni broj zbog praćenja redosleda
--Primer i prva izmena ispod: 


--Dodavanje statusa u proizvod_grupa (1)
ALTER TABLE `proizvod_grupa` ADD `status` TINYINT(1) NOT NULL AFTER `idGrupa`;

--Dodavanje statusa u vrednost (2)
ALTER TABLE `vrednost` ADD `status` TINYINT(1) NOT NULL AFTER `nazivVrednost`;

--Dodavanje tebele kategorija_brend i kreiranje CONSTRAINT-ova (3)
CREATE TABLE IF NOT EXISTS `shop`.`kategorija_brend` 
( `idKategorija` MEDIUMINT(8) NOT NULL,
 `idBrend` MEDIUMINT(8) NOT NULL,
 INDEX `index_brend_kategorija_idKategorija` (`idKategorija` ASC),
 INDEX `index_brend_kategorija_idBrend` (`idBrend` ASC),
 PRIMARY KEY (`idKategorija`, `idBrend`),
 CONSTRAINT `fk_brend_kategorija_idKategorija`
 FOREIGN KEY (`idKategorija`) REFERENCES `shop`.`kategorija` (`idKategorija`)
 ON DELETE NO ACTION ON UPDATE NO ACTION, 
 CONSTRAINT `fk_brend_kategorija_idBrend`
 FOREIGN KEY (`idBrend`) REFERENCES `shop`.`brend` (`idBrend`)
 ON DELETE NO ACTION ON UPDATE NO ACTION) 
ENGINE = InnoDB 
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci
