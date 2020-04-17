CREATE TABLE LOGIN (
emailAddress	varchar(30)		NOT NULL,
isAdmin			boolean			NOT NULL,
password		varchar(20)		NOT NULL,
CONSTRAINT loginPK PRIMARY KEY(emailAddress)
);

CREATE TABLE CUSTOMER (
customerID		int				NOT NULL AUTO_INCREMENT,
name			varchar(24)		NOT NULL,
emailAddress 	varchar(30)		NOT NULL,
phoneNumber		int(11)			NOT NULL,
address			varchar(30)		NOT NULL,
city			varchar(20)		NOT NULL,
state			char(2)			NOT NULL,
zip				int(5)			NOT NULL,
CONSTRAINT customerPK PRIMARY KEY(customerID),
CONSTRAINT customerAK1 UNIQUE(emailAddress),
CONSTRAINT emailFK FOREIGN KEY(emailAddress)
	REFERENCES LOGIN(emailAddress)
    ON UPDATE CASCADE
);

CREATE TABLE TRANSACTIONINFO (
transactionID	int(10)			NOT NULL AUTO_INCREMENT, 
reservationID	int(10)			NOT NULL,
customerID		int(10)			NOT NULL, 
amountPaid		float(6,2)		NOT NULL,
datePaid		date			NOT NULL,
CONSTRAINT transactionPK PRIMARY KEY(transactionID),
CONSTRAINT transactionAK1 UNIQUE(customerID),
CONSTRAINT transactionAK2 UNIQUE(reservationID),
CONSTRAINT customerFK FOREIGN KEY(customerID)
	REFERENCES CUSTOMER(customerID)
    ON UPDATE CASCADE
    ON DELETE CASCADE
);

CREATE TABLE COTTAGE (
cottageID		int(10)			NOT NULL AUTO_INCREMENT,
lastStayDate	date			NOT NULL,
CONSTRAINT cottagePK PRIMARY KEY(cottageID)
);

CREATE TABLE RESERVATION (
reservationID	int(10)			NOT NULL AUTO_INCREMENT,
customerID		int(10)			NOT NULL,
cottageID		int(10)			NOT NULL,
transactionID	int(10)			NOT NULL,
stayLogID		int(10)			NOT NULL,
CONSTRAINT reservationPK PRIMARY KEY(reservationID),
CONSTRAINT reservationFK FOREIGN KEY(customerID)
	REFERENCES CUSTOMER(customerID)
        ON UPDATE CASCADE
		ON DELETE CASCADE,
CONSTRAINT reservationFK2 FOREIGN KEY(transactionID)
	REFERENCES TRANSACTIONINFO(transactionID),
CONSTRAINT reservationFK3 FOREIGN KEY(cottageID)
	REFERENCES COTTAGE(cottageID)
    ON UPDATE CASCADE
    ON DELETE CASCADE
);

ALTER TABLE TRANSACTIONINFO
	ADD CONSTRAINT transactionFK FOREIGN KEY(reservationID)
	REFERENCES RESERVATION(reservationID);

CREATE TABLE STAYLOG (
stayLogID		int(10)			NOT NULL AUTO_INCREMENT,
customerID		int(10)			NOT NULL,
reservationID	int(10)			NOT NULL,
startDate		date			NOT NULL,
endDate			date			NOT NULL, 
CONSTRAINT staylogPK PRIMARY KEY(stayLogID),
CONSTRAINT staylogAK1 UNIQUE(reservationID),  #added Alternate key constraint
CONSTRAINT staylogFK FOREIGN KEY(reservationID)
	REFERENCES RESERVATION(reservationID)
    ON UPDATE NO ACTION
    ON DELETE NO ACTION
);


