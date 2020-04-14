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
);

CREATE TABLE TRANSACTION_INFO (
transactionID	int(10)			NOT NULL AUTO_INCREMENT, 
reservationID	int(10)			NOT NULL,
customerID		int(10)			NOT NULL, 
amountPaid		float(6,2)		NOT NULL,
datePaid		date			NOT NULL,
CONSTRAINT transactionPK PRIMARY KEY(transactionID),
CONSTRAINT transactionAK1 UNIQUE(customerID),
CONSTRAINT transactionAK2 UNIQUE(reservationID),
CONSTRAINT reservationFK FOREIGN KEY(reservationID)
	REFERENCES RESERVATION(reservationID),
CONSTRAINT customerFK FOREIGN KEY(customerID)
	REFERENCES CUSTOMER(customerID)
    ON UPDATE CASCADE
    ON DELETE CASCADE
);
