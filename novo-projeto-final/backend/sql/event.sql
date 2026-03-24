-- Active: 1771948510793@@127.0.0.1@3306@om_db_test
CREATE TABLE events (
    id_event integer PRIMARY KEY,
    event_name varchar(255),
    `date` DATE,
    music_url VARCHAR(255),
    video_url VARCHAR(255);
    pages VARCHAR(255)
    # for now this is it
);

# create a parser in js that will parse one single string into different pages


