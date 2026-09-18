-- Users table
CREATE TABLE users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    email VARCHAR(40) NOT NULL UNIQUE,
    ward INT NOT NULL,
    password CHAR(70) NOT NULL,
    role VARCHAR(20) NOT NULL DEFAULT 'user',
    status VARCHAR(20) NOT NULL DEFAULT 'active'
);

-- System Admin table
CREATE TABLE system_admin (
    system_admin_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    CONSTRAINT fk_admin_user_id FOREIGN KEY (user_id) REFERENCES users(user_id)
);

-- Community Member table
CREATE TABLE community_member (
    community_member_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    CONSTRAINT fk_com_user_id FOREIGN KEY (user_id) REFERENCES users(user_id)
);

-- Ticket table
CREATE TABLE ticket (
    ticket_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    ward INT NOT NULL,
    municipal_service VARCHAR(250) NOT NULL,
    date_filed DATETIME NOT NULL,
    street VARCHAR(30),
    city VARCHAR(30),
    suburb VARCHAR(30),
    postal_code VARCHAR(30),
    description VARCHAR(250) NOT NULL,
    status VARCHAR(10),
    picture VARCHAR(100),
    CONSTRAINT fk_ticket_user_id FOREIGN KEY (user_id) REFERENCES users(user_id)
);

CREATE TABLE ticket_comment(
    comment_id INT AUTO_INCREMENT PRIMARY KEY,
    ticket_id INT NOT NULL,
    councillor_id INT NOT NULL,
    comment_text VARCHAR(500) NOT NULL,
    date_commented DATETIME DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_comment_ticket_id FOREIGN KEY (ticket_id) REFERENCES ticket(ticket_id),
    CONSTRAINT fk__comment_ward_councillor_id FOREIGN KEY (councillor_id) REFERENCES ward_councillor(ward_councillor_id)
)

-- Photo table
CREATE TABLE photo(
    photo_id INT AUTO_INCREMENT PRIMARY KEY,
    ticket_id INT NOT NULL,
    photo_path VARCHAR(100) NOT NULL,
    CONSTRAINT fk_photo_ticket_id FOREIGN KEY (ticket_id) REFERENCES ticket(ticket_id)
)

-- Muncipal Officer Table
CREATE TABLE muncipal_officer (
    municipal_officer_ID INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    department VARCHAR(50) NOT NULL,
    CONSTRAINT fk_officer_user_id FOREIGN KEY (user_id) REFERENCES users(user_id)
);

--Community Noticeboard Table
CREATE TABLE community_noticeboard (
    notice_id INT AUTO_INCREMENT PRIMARY KEY,
    municipal_officer_id INT,
    ward INT,
    notice_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    notice_status INT,
    notice_description VARCHAR(500),
    CONSTRAINT fk_officer_user_id FOREIGN KEY (municipal_officer_id) REFERENCES municipal_officer(municipal_officer_id)
);

--Ticket Status Table
CREATE TABLE ticket_status(
    ticket_status_id INT AUTO_INCREMENT PRIMARY KEY,
    ticket_id INT,
    ticket_status INT
    CONSTRAINT fk_status_ticket_id FOREIGN KEY (ticket_id) REFERENCES ticket(ticket_id)
);

--Ward Councillor Table
CREATE TABLE ward_councillor(
    ward_councillor_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    ward INT,
    phone_number INT(10) UNIQUE,
    CONSTRAINT fk_councillor_user_id FOREIGN KEY (user_id) REFERENCES users(user_id)
    CONSTRAINT fk_councillor_ward FOREIGN KEY (ward) REFERENCES users(ward)
);

CREATE TABLE ward_summary(
    ward_summary_id INT AUTO_INCREMENT PRIMARY KEY,
    ward INT,
    ward_councillor_id INT,
    total_tickets INT,
    resolved_tickets INT,
    pending_tickets INT,
    CONSTRAINT fk_summary_ward FOREIGN KEY (ward) REFERENCES ward(ward),
    CONSTRAINT fk_summary_councillor_id FOREIGN KEY (ward_councillor_id) REFERENCES ward_councillor(ward_councillor_id)
);

CREATE TABLE ward(
    ward_id INT AUTO_INCREMENT PRIMARY KEY,
    ward_name VARCHAR(50) NOT NULL
)