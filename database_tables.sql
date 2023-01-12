CREATE DATABASE C19VS;

USE C19VS;

CREATE TABLE Person(
    pID VARCHAR(30) PRIMARY KEY,
	SSN VARCHAR(30),
    first_name VARCHAR(30),
    last_name VARCHAR(30),
    date_of_birth DATE,
    medicare_card_no VARCHAR(30),
    address INT,
    city VARCHAR(30),
    province VARCHAR(30),
    postal_code CHAR(6),
    phone_no VARCHAR(10),
    citizenship CHAR(1),
    email VARCHAR(30),
	passport_no VARCHAR(30),
    CHECK(citizenship = 'Y' OR citizenship = 'N')
);

CREATE TABLE Variants(
    vID VARCHAR(30) PRIMARY KEY,
	variant VARCHAR(30) DEFAULT 'UNKNOWN'
);

CREATE TABLE Infected(
    pID VARCHAR(30),
    date_of_infection DATE,
	vID VARCHAR(30),
    PRIMARY KEY (pID, date_of_infection),
    FOREIGN KEY (pID) REFERENCES Person(pID) ON DELETE CASCADE,
	FOREIGN KEY (vID) REFERENCES Variants(vID) ON DELETE CASCADE
);

CREATE TABLE Vaccination_Facility(
    vfID VARCHAR(30) PRIMARY KEY,
    fac_name VARCHAR(30),
	address INT,
    city VARCHAR(30),
    province VARCHAR(30),
    postal_code CHAR(6),
    phone_no VARCHAR(10),
    website VARCHAR(30),
    fac_type VARCHAR(30),
    CHECK(fac_type IN ('Hospital','clinic','special installment'))
);

CREATE TABLE Public_Healthcare_Worker(
    eID VARCHAR(30) PRIMARY KEY,
	SSN VARCHAR(30) NOT NULL,
    first_name VARCHAR(30),
    last_name VARCHAR(30),
    date_of_birth DATE,
    medicare_card_no VARCHAR(30),
    address INT,
    city VARCHAR(30),
    province VARCHAR(30),
    postal_code CHAR(6),
    phone_no VARCHAR(10),
    citizenship CHAR(1),
    email VARCHAR(30),
	start_of_employment DATE,
	end_of_employment DATE,
    CHECK(citizenship = 'Y' OR citizenship = 'N')
);

CREATE TABLE Vaccine(
    vaxID VARCHAR(30) PRIMARY KEY,
    vaccine_name VARCHAR(30),
    date_of_approval DATE,
    date_of_suspension DATE,
    status VARCHAR(30),
    CHECK(status = 'SAFE' OR (status = 'SUSPENDED'))
);

CREATE TABLE Supplier(
    sID VARCHAR(30) PRIMARY KEY
);

CREATE TABLE Inventory(
	vfID VARCHAR(30),
    date_of_reception DATE,
    vaxID VARCHAR(30),
    vaccine_count INT,
	PRIMARY KEY (vfID, date_of_reception, vaxID, vaccine_count),
	FOREIGN KEY (vfID) REFERENCES Vaccination_Facility(vfID) ON DELETE CASCADE,
	FOREIGN KEY (vaxID) REFERENCES Vaccine(vaxID) ON DELETE CASCADE
);

CREATE TABLE Group_Age(
    gID INT PRIMARY KEY,
    range_description VARCHAR(30)
);

CREATE TABLE Province(
    province VARCHAR(30) PRIMARY KEY,
	gID INT DEFAULT 0,
	FOREIGN KEY (gID) REFERENCES Group_Age(gID) ON DELETE CASCADE
);

CREATE TABLE Vaccination(
    pID VARCHAR(30),
    vfID VARCHAR(30),
    gID INT,
    vaxID VARCHAR(30),
	eID VARCHAR(30),
    dose_no INT NOT NULL,
    date_of_vaccination DATE NOT NULL,
    PRIMARY KEY (pID, vfID, gID, vaxID, eID, date_of_vaccination),
    FOREIGN KEY (pID) REFERENCES Person(pID) ON DELETE CASCADE,
    FOREIGN KEY (vfID) REFERENCES Vaccination_Facility(vfID) ON DELETE CASCADE,
    FOREIGN KEY (gID) REFERENCES Group_Age(gID) ON DELETE CASCADE,
    FOREIGN KEY (vaxID) REFERENCES Vaccine(vaxID) ON DELETE CASCADE,
	FOREIGN KEY (eID) REFERENCES Public_Healthcare_Worker(eID) ON DELETE CASCADE
);

DELIMITER $$

CREATE TRIGGER check_inventory_dates
BEFORE INSERT ON Inventory 
FOR EACH ROW
BEGIN
DECLARE date_of_approval2 DATE;
DECLARE vaxID2 VARCHAR(30);
    SELECT v.vaxID, v.date_of_approval
    INTO   vaxID2, date_of_approval2
    FROM   Vaccine v
    WHERE v.vaxID = NEW.vaxID;
     IF NEW.date_of_reception < date_of_approval2 THEN
        SIGNAL SQLSTATE '45000'   
        SET MESSAGE_TEXT = 'Cannot add row, check attributes';
    END IF;
END; $$

CREATE TRIGGER before_vaccination_check
BEFORE INSERT ON Vaccination
FOR EACH ROW
BEGIN
IF NEW.vfID NOT IN (
    SELECT i.vfID
    FROM Inventory i, Province s, Vaccination_Facility f, Vaccine v, Public_Healthcare_Worker p
    WHERE NEW.vfID = i.vfID
    AND i.vfID = f.vfID
    AND f.province = s.province
    AND NEW.gID <= s.gID
    AND NEW.vaxID = i.vaxID
    AND i.vaxID = v.vaxID
    AND i.vaccine_count > 0
    AND (NEW.date_of_vaccination <= v.date_of_suspension OR v.date_of_suspension IS NULL)
    AND NEW.date_of_vaccination >= i.date_of_reception
    AND NEW.date_of_vaccination >= v.date_of_approval
    AND NEW.date_of_vaccination >= p.start_of_employment
    AND (NEW.date_of_vaccination <= p.end_of_employment OR p.end_of_employment IS NULL)
    ) THEN
        SIGNAL SQLSTATE '45000'   
        SET MESSAGE_TEXT = 'Cannot add, check attributes';
END IF;
END; $$

CREATE TRIGGER after_vaccination_decrease
AFTER INSERT ON Vaccination
FOR EACH ROW
BEGIN
    UPDATE Inventory i
    SET i.vaccine_count = i.vaccine_count - 1
    WHERE i.vfID = NEW.vfID AND i.vaxID = NEW.vaxID AND i.date_of_reception <= NEW.date_of_vaccination;
END; $$

DELIMITER ;
