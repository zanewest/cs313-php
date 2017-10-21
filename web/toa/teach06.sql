CREATE TABLE scripture
(
    id SERIAL PRIMARY KEY NOT NULL,
    book VARCHAR(80) NOT NULL,
    chapter INT NOT NULL,
    verse INT NOT NULL,
    content VARCHAR(4000) NOT NULL
);

CREATE TABLE topic
(
    id SERIAL PRIMARY KEY NOT NULL,
    name VARCHAR(80) NOT NULL
);

CREATE TABLE scripture_topic
(
    scripture_id INT NOT NULL REFERENCES scripture(id),
    topic_id INT NOT NULL REFERENCES topic(id)
);

INSERT INTO topic (name) VALUES ('Faith');
INSERT INTO topic (name) VALUES ('Sacrifice');
INSERT INTO topic (name) VALUES ('Charity');