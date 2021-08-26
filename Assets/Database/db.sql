
create TABLE student (
    studID VARCHAR(20) NOT NULL,
    firstName  VARCHAR(50) not null,
    lastName  VARCHAR(50) not null,
    gender varchar(10) not null,
    phoneNo int(10),
    isInCampus boolean,
    isCafe boolean,
    batch varchar(10),
    department varchar(70),
    emergencyPhone int(10),
    photo varchar(50),
    mealPerDay int(2),
    hasEaten boolean,
    cafeID varchar(10),
    comment varchar(250)
);

ALTER TABLE student
ADD PRIMARY KEY (studID);
insert into student VALUES('ugr/17514/11','Yohannes','Alemu','Male','0902600068',True,False,'3rd','CSE','0910900879','/Assets/images/profile_pics/p3.jpg','0',False,'Cafe5',''),
('ugr/17386/11','Michael','Kumsa','Male','0910900879',False,False,'3rd','CSE','0961236985','/Assets/images/profile_pics/p1.jpg','0',False,'Cafe5',''),
('ugr/17286/11','Toleshe','Urgessa','Female','0947918863',True,True,'3rd','CSE','0961236985','/Assets/images/profile_pics/p2.jpg','0',True,'Cafe5',''),
('ugr/17588/11','Ruth','Abebe','Female','0961236985',True,True,'3rd','Architecture','0910900879','/Assets/images/profile_pics/p4.jpg','0',False,'Cafe4','');

create TABLE staff(
    staffId varchar(20) not null,
    firstName  VARCHAR(50) not null,
    lastName  VARCHAR(50) not null,
    gender varchar(10) not null,
    privilege varchar(10) not null,
    phoneNo int(10),
    cafeID varchar(10),
    comment varchar(250),
    pass varchar(25)
);
ALTER TABLE staff
ADD PRIMARY KEY (staffID);

insert into staff values('astu/cs/129/10','Aregash','Wolde','Female','Normal','0975858789','Cafe5','','Astu-cms@2013#'),
('astu/cs/127/10','Kelem','Abera','Female','Normal','0975858547','Cafe5','','Astu-cms@2013#'),
('astu/cs/121/10','Tsige','Worku','Female','Normal','0975858725','Cafe4','','Astu-cms@2013#'),
('astu/cs/124/10','Yetnayet','Worku','Female','Normal','0985858789','Cafe4','','Astu-cms@2013#'),
('astu/cs/021/09','Abebe','Taddesse','Male','Admin','0921236985','','','Astu-cms@2013#');


create TABLE reports (
    FileName VARCHAR(50),
    date VARCHAR(50) 
);
