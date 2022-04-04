CREATE TABLE ability (  
    -> id int(10) unsigned NOT NULL AUTO_INCREMENT,  
    -> human_id int(10) unsigned NOT NULL,  
    -> superabilities VARCHAR(128) NOT NULL,  
    -> PRIMARY KEY (id),  
    -> FOREIGN KEY (human_id) REFERENCES people (Id)  
    -> );  
