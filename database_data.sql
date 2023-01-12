INSERT INTO Person
VALUES	('pID1',NULL,'Mark','Roy','1995-01-02','ROY4123456',1234,'Montreal','Quebec','H3N6Y9','5145554561','Y','markroy@email.com','P1234'),
	('pID2','123456789','Sarah','Park','1999-06-04','PARS456891',9874,'Toronto','Ontario','M1A6R5','4165559075','Y','parkS@email.com','P9874'),
	('pID3','234567890','Ming','Chen','1990-08-02','CHEM564895',4568,'Vancouver','British Columbia','V1A9Q5','6045551234','Y','mingC@email.com','P4568'),
	('pID4','345678901','John','Smith','1985-10-10','SMIJ123456',5327,'Montreal','Quebec','H3T7Y9','5145559874','N','SmithJ@email.com','P5327'),
	('pID5','456789012','Alfred','McDonald','1970-12-12','MCDA1234695',6547,'Vancouver','British Columbia','V1A7Q6','6045559874','Y','MCA@email.com','P6547'),
	('pID6','567890123','Ahmad','Ahmad','2015-07-12','AHAA3456695',4444,'Winnipeg','Manitoba','R4A6A6','2045554444','N','Ahmad@email.com',NULL),
	('pID7','678901234','Selena','Gomes','1980-01-01','GOMS567685',5555,'Toronto','Ontario','M1A6A6','4165555555','Y','sgomz@email.com',NULL),
	('pID8',NULL,'Raj','Patel','1960-01-09','PATRS645385',1111,'Montreal','Quebec','H3R1A6','5145551111','Y','raj@email.com','P1111'),
	('pID9','890123456','Keith','Smith','1950-02-10','SMIK628995',9999,'Winnipeg','Manitoba','R4A9H3','2045559999','Y','keithsmith@email.com','P9999'),
	('pID10',NULL,'Chris','Irvine','1938-11-11','IRVC34326526',7777,'Calgary','Alberta','T6A9T7','5875557777','Y','cirv@email.com','P7777'),
	('pID11','432908656','Isabelle','Alexandrea','1993-11-05','ALE4329086',4329,'Vancouver','British Columbia','V1A7Q6','6045554329','Y','IsaAlex@email.com',NULL),
	('pID12','324589459','Lynn','Steve','1995-06-25','STE3245894',3245,'Vancouver','British Columbia','V1A9Q5','6045553245','Y','lynn@email.com',NULL),	
	('pID13','546213897','Khloe','Jodi','1989-05-27','JOD5462138',5462,'Montreal','Quebec','H3N6Y9','5145555462','Y','kjodi@email.com',NULL),
	('pID14','879546123','Cora','Tracey','1984-03-09','TRA8795461',8795,'Toronto','Ontario','M1A6R5','4165558795','Y','coraT@email.com',NULL),
	('pID15','598879435','Weston','Leola','2001-08-28','LEO5988794',5988,'Montreal','Quebec','H3T7Y9','5145555988','N','leola@email.com','P5988'),
	('pID16','579843246','Keefe','Chief','1988-12-17','CHI5798432',5798,'Winnipeg','Manitoba','R4A6A6','2045555798','N','chiefkeefe@email.com','P5798'),
	('pID17','432897509','Mei','Wei','2000-12-24','WEI4328975',4328,'Toronto','Ontario','M1A6A6','4165554328','Y','meiwei@email.com','P5328'),
	('pID18','934757256','Shelly','London','1991-01-24','LON9347572',9347,'Montreal','Quebec','H3R1A6','5145559347','Y','lonS@email.com',NULL),
	('pID19','913984375','Jayce','Ash','1983-06-25','ASH9139843',9139,'Winnipeg','Manitoba','R4A9H3','2045559139','Y','ashJ@email.com',NULL),
	('pID20','857463956','Shu','Lin','1993-11-06','LIN8574639',8574,'Calgary','Alberta','T6A9T7','5875558574','Y','linshu@email.com','P8574');
	
INSERT INTO Variants
VALUES	('vID1','alpha'),
	('vID2', 'beta'),
	('vID3','delta');

INSERT INTO Infected
VALUES	('pID1','2020-03-09','vID1'),
	('pID2','2020-04-08','vID2'),
	('pID3','2020-06-07','vID3'),
	('pID8','2020-10-20','vID3'),
	('pID10','2020-11-09','vID3'),
	('pID1','2021-11-09','vID3');

INSERT INTO Group_Age
VALUES	(1,'80+'),
	(2,'70-79'),
	(3,'60-69'),
	(4,'50-59'),
	(5,'40-49'),
	(6,'30-39'),
	(7,'18-29'),
	(8,'12-17'),
	(9,'5-11'),
	(10,'0-4');

INSERT INTO Province
VALUES	('Ontario',8),
	('Quebec',9),
	('Nova Scotia',7),
	('New Brunswick',8),
	('Manitoba',1),
	('British Columbia',7),
	('Prince Edward Island',7),
	('Saskatchewan',2),
	('Alberta',8),
	('Newfoundland and Labrador',1),
	('Northwest Territories',2),
	('Yukon',3),
	('Nunavut',8);

INSERT INTO Vaccination_Facility
VALUES	('vfID1','Olympic Stadium',0123,'Montreal','Quebec','H1V0B2','5145559871','www.os.ca','special installment'),
	('vfID2','St. Marys Hospital',1234,'Montreal','Quebec','H3T1M5','5145559111','www.stmarys.ca','Hospital'),
	('vfID3','PJC Jean Coutu',2345,'Montreal','Quebec','H3T1Y9','5145551234','www.jc.ca','special installment'),
	('vfID4','CLSC Montreal South',3456,'Montreal','Quebec','H1G4J9','5145556548','www.clsc.ca','clinic'),
	('vfID5','CLSC Montreal North',4567,'Montreal','Quebec','H4E3X6','5145554573','www.clsc.ca','clinic'),
	('vfID6','Jewish General Hospital',5678,'Montreal','Quebec','H3T1E2','5145556161','www.jgh.ca','Hospital'),
	('vfID7','Bridgeport Health',6789,'Toronto','Ontario','M4M2B5','5145554745','www.bph.ca','Hospital'),
	('vfID8','Thorncliffe Park Community Hub',7890,'Toronto','Ontario','M4H1C3','5145559871','www.os.ca','special installment'),
	('vfID9','Lions Gate Hospital',8901,'Vancouver','British Columbia','V7L2L7','5145551112','www.lgh.ca','Hospital'),
	('vfID10','Vancouver General Hospital',9012,'Vancouver','British Columbia','V5Z1M9','5145551113','www.vgh.ca','Hospital'),
	('vfID11','Place Sports Experts','01234','Laval','Quebec','H7P6C8','5145559873','www.lavalensante.com','special installment');

INSERT INTO Public_Healthcare_Worker
VALUES	('eID1','546213897','Khloe','Jodi','1989-05-27','JOD5462138',5462,'Montreal','Quebec','H3N6Y9','5145555462','Y','kjodi@email.com','2020-01-01','2021-07-25'),
	('eID2','879546123','Cora','Tracey','1984-03-09','TRA8795461',8795,'Toronto','Ontario','M1A6R5','4165558795','Y','coraT@email.com','2021-01-01',NULL),
	('eID3','324589459','Lynn','Steve','1995-06-25','STE3245894',3245,'Vancouver','British Columbia','V1A9Q5','6045553245','Y','lynn@email.com','2020-03-02','2020-05-05'),
	('eID4','598879435','Weston','Leola','2001-08-28','LEO5988794',5988,'Montreal','Quebec','H3T7Y9','5145555988','N','leola@email.com','2020-12-04','2021-07-07'),
	('eID5','432908656','Isabelle','Alexandrea','1993-11-05','ALE4329086',4329,'Vancouver','British Columbia','V1A7Q6','6045554329','Y','IsaAlex@email.com','2021-05-06',NULL),
	('eID6','579843246','Keefe','Chief','1988-12-17','CHI5798432',5798,'Winnipeg','Manitoba','R4A6A6','2045555798','N','chiefkeefe@email.com','2020-02-02',NULL),
	('eID7','432897509','Mei','Wei','2000-12-24','WEI4328975',4328,'Toronto','Ontario','M1A6A6','4165554328','Y','meiwei@email.com','2021-09-09',NULL),
	('eID8','934757256','Shelly','London','1991-01-24','LON9347572',9347,'Montreal','Quebec','H3R1A6','5145559347','Y','lonS@email.com','2020-07-07',NULL),
	('eID9','913984375','Jayce','Ash','1983-06-25','ASH9139843',9139,'Winnipeg','Manitoba','R4A9H3','2045559139','Y','ashJ@email.com','2020-03-11','2021-03-11'),
	('eID10','857463956','Shu','Lin','1993-11-06','LIN8574639',8574,'Calgary','Alberta','T6A9T7','5875558574','Y','linshu@email.com','2021-09-01',NULL);

INSERT INTO Vaccine
VALUES	('vaxID1','Moderna','2020-11-11',NULL,'SAFE'),
	('vaxID2','Pfizer','2020-11-11',NULL,'SAFE'),
	('vaxID3','AstraZenica','2020-11-11',NULL,'SAFE'),
	('vaxID4','Johnson&Johnson','2020-11-11',NULL,'SAFE'),
	('vaxID5','Altimmune','2021-01-11','2021-05-05','SUSPENDED'),
	('vaxID6','BioNTech','2020-11-11','2021-05-05','SUSPENDED'),
	('vaxID7','CytoDyn','2021-02-07',NULL,'SAFE'),
	('vaxID8','Gilead Sciences','2020-11-11','2021-07-22','SUSPENDED'),
	('vaxID9','GlaxoSmithKline','2020-07-08',NULL,'SAFE'),
	('vaxID10','Heat Biologics','2021-04-22',NULL,'SAFE');

INSERT INTO Inventory
VALUES	('vfID1','2020-11-11','vaxID4',600),
	('vfID2','2020-11-11','vaxID3',700),
	('vfID3','2020-11-11','vaxID2',500),
	('vfID4','2020-11-11','vaxID1',900),
	('vfID5','2021-07-07','vaxID7',100),
	('vfID6','2021-02-07','vaxID7',200),
	('vfID7','2020-07-08','vaxID9',300),
	('vfID8','2021-07-22','vaxID10',400),
	('vfID9','2021-07-07','vaxID7',500),
	('vfID10','2020-11-11','vaxID4',600),
	('vfID11','2021-05-22','vaxID10',600),
	('vfID6','2021-02-22','vaxID8',800);
	

INSERT INTO Vaccination
VALUES	('pID1','vfID2',7,'vaxID3','eID1',1,'2020-11-11'),
	('pID2','vfID7',7,'vaxID9','eID2',1,'2021-01-01'),
	('pID3','vfID6',6,'vaxID7','eID4',1,'2021-04-08'),
	('pID4','vfID1',6,'vaxID4','eID4',1,'2021-07-20'),
	('pID5','vfID11',4,'vaxID10','eID1',1,'2021-05-22'),
	('pID6','vfID11',9,'vaxID10','eID1',1,'2021-05-23'),
	('pID5','vfID11',4,'vaxID10','eID1',2,'2021-07-22'),
	('pID6','vfID11',9,'vaxID10','eID1',2,'2021-07-23'),
	('pID7','vfID1',5,'vaxID4','eID8',1,'2021-07-15'),
	('pID8','vfID3',3,'vaxID2','eID8',1,'2020-11-11'),
	('pID9','vfID4',2,'vaxID1','eID7',1,'2021-09-09'),
	('pID1','vfID1',7,'vaxID4','eID4',2,'2021-02-01'),
	('pID11','vfID9',7,'vaxID7','eID3',1,'2021-07-07'),
	('pID12','vfID10',7,'vaxID4','eID5',1,'2021-02-06'),
	('pID3','vfID6',6,'vaxID8','eID4',2,'2021-07-08');