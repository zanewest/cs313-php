
CREATE DATABASE login_test;
\c login_test

CREATE TABLE login
(
	id SERIAL PRIMARY KEY NOT NULL,
	username VARCHAR(80) UNIQUE NOT NULL,
	password VARCHAR(255) NOT NULL
);

CREATE USER ta_user WITH PASSWORD 'ta_pass';

GRANT SELECT, INSERT, UPDATE ON product, service TO ta_user;
GRANT USAGE, SELECT ON product_id_seq, service_id_seq TO ta_user;
