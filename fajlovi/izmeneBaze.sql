--Sledece izmene baze važe za poslednju verziju exportovane baze 19.04.2015
--Naziv Commit-a: NOVI SQL!!! (19.04)
--Putanja: https://github.com/ICTCrew/shop/commit/01b2249750d654982bf348538c61b913d6abc326#diff-ad7451e00b293386405e78c1632ec0e6
--Posle opisa u komenataru navesti i redni broj zbog praćenja redosleda
--Primer i prva izmena ispod: 


--Dodavanje statusa u proizvod_grupa (1)
ALTER TABLE `proizvod_grupa` ADD `status` TINYINT(1) NOT NULL AFTER `status`;
