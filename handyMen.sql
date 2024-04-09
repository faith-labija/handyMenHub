CREATE TABLE UserType (
    id INT AUTO_INCREMENT PRIMARY KEY,
    role VARCHAR(255) NOT NULL UNIQUE
    );

    
CREATE TABLE Users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    ut_id int NOT NULL,
    name VARCHAR(255) NOT NULL,
    phone VARCHAR(20),
    location VARCHAR(255),
    FOREIGN KEY (ut_id) REFERENCES UserType(id));

 

INSERT INTO UserType (role) VALUES ('super admin'), ('vendor'), ('standard');



CREATE TABLE vendors (
    vendor_id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(255) NOT NULL,
    last_name VARCHAR(255) NOT NULL,
    location VARCHAR(255) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    price_range VARCHAR(100) NOT NULL
);


CREATE TABLE services (
    service_id INT AUTO_INCREMENT PRIMARY KEY,
    vendor_id INT,
    service_name VARCHAR(255) NOT NULL,
    description TEXT,
    FOREIGN KEY (vendor_id) REFERENCES vendors(vendor_id) ON DELETE CASCADE
);



CREATE TABLE Reviews (
    review_id INT AUTO_INCREMENT PRIMARY KEY,
    vendor_id INT NOT NULL,
    student_id INT NOT NULL,
    rating INT NOT NULL,
    note TEXT,
    date_posted DATE NOT NULL,
    FOREIGN KEY (vendor_id) REFERENCES Users(user_id),
    FOREIGN KEY (student_id) REFERENCES Users(user_id)
   
);


CREATE TABLE Bookings (
    booking_id INT AUTO_INCREMENT PRIMARY KEY,
    vendor_id INT NOT NULL,
    student_id INT NOT NULL,
    service_id INT NOT NULL,
    date DATE NOT NULL,
    time TIME NOT NULL,
    FOREIGN KEY (vendor_id) REFERENCES Users(user_id),
    FOREIGN KEY (student_id) REFERENCES Users(user_id),
    FOREIGN KEY (service_id) REFERENCES Services(service_id)

);
