drop table if exists Student;
CREATE TABLE Student (    
    studentId INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,    
    fname VARCHAR(30) NOT NULL,    
    lname VARCHAR(30) NOT NULL
); 

drop table if exists IndustryPartner;
CREATE TABLE IndustryPartner (
    partnerId INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
    partnerName VARCHAR(30) NOT NULL,
    partnerLocation VARCHAR(30) NOT NULL 
);


drop table if exists Project;
CREATE TABLE Project (    
    projectId INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,    
    projectTitle VARCHAR(30) NOT NULL,    
    projectField VARCHAR(30) NOT NULL,
    projectDetails TEXT NOT NULL,
    NoOfStudents INTEGER NOT NULL,
    NoOfApplication INTEGER default '0' NOT NULL,
    partnerId INTEGER NOT NULL,
    FOREIGN KEY (partnerId) REFERENCES IndustryPartner(partnerId)
);

drop table if exists StudentApplication;
CREATE TABLE StudentApplication (    
    projectId INTEGER NOT NULL,    
    studentId INTEGER NOT NULL,    
    justification TEXT NOT NULL,
    preference INTEGER NOT NULL,
    FOREIGN KEY (projectId) REFERENCES Project(projectId),
    FOREIGN KEY (studentID) REFERENCES Student(studentId), 
    PRIMARY KEY(projectId,studentId)
);

INSERT INTO Student(studentId, fname, lname)
VALUES(NULL, "Dhwanil","Jakharia");
INSERT INTO Student(studentId, fname, lname)
VALUES(NULL, "Saeed","Salman");
INSERT INTO Student(studentId, fname, lname)
VALUES(NULL, "Joshua","Thomson");

INSERT INTO IndustryPartner(partnerId, partnerName, partnerLocation)
VALUES(1, "Telstra", "GoldCoast");
INSERT INTO IndustryPartner(partnerId, partnerName, partnerLocation)
VALUES(2, "Amazon", "GoldCoast");
INSERT INTO IndustryPartner(partnerId, partnerName, partnerLocation)
VALUES(3, "Deloitte", "GoldCoast");


INSERT INTO Project(projectId, projectTitle, projectField, projectDetails, NoOfStudents, NoOfApplication, partnerId)
VALUES(NULL, "WebPage", "Software Development", "Creating a webpage for the customers", 5, 1, 1);
INSERT INTO Project(projectId, projectTitle, projectField, projectDetails, NoOfStudents, NoOfApplication, partnerId)
VALUES(NULL, "Analysis", "Data Analytics", "Creating a analysis for the past few months of work and best details", 3, 1, 2);
INSERT INTO Project(projectId, projectTitle, projectField, projectDetails, NoOfStudents, NoOfApplication, partnerId)
VALUES(NULL, "CaseStudy", "Information Systems and Enterprise Architecture", "Report on the casestudy about the company", 3, 1, 3);


INSERT INTO StudentApplication(projectId, studentID, justification, preference)
VALUES(1, 1, "My majors is Software Dev, I am very much interested in web app development and have previously studied on this thing. It is very interesting for me.", 1);
INSERT INTO StudentApplication(projectId, studentID, justification, preference)
VALUES(2, 3, "My major is the same as the field, I would like to gain more experience with the help of real world projects.", 1);
INSERT INTO StudentApplication(projectId, studentID, justification, preference)
VALUES(3, 2, "My major is Data Analytics and I like to go with the flow of logic and mathematics.", 1);