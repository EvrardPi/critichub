-- DROP TABLE IF EXISTS paya4_elementard;
-- DROP TABLE IF EXISTS paya4_memento;
-- DROP TABLE IF EXISTS paya4_gestionfront;
-- DROP TABLE IF EXISTS paya4_category;
-- DROP TABLE IF EXISTS paya4_user;
-- CREATE TABLE paya4_user
-- (
--     id serial primary key,
--     email varchar(320) not null unique,
--     lastname varchar(120) not null,
--     firstname varchar(60) not null,
--     password varchar(255) not null,
--     role integer default 1 not null,
--     birth_date date not null,
--     creation_date timestamp with time zone default CURRENT_TIMESTAMP,
--     update_date timestamp with time zone default CURRENT_TIMESTAMP,
--     confirm_key varchar(255) unique,
--     confirm integer,
--     forgot_token varchar(32),
--     expiration_time integer
-- );
-- ALTER TABLE paya4_user OWNER TO postgres;
-- CREATE TABLE paya4_category
-- (
--     id serial primary key,
--     name varchar(255),
--     picture varchar(255)
-- );
-- ALTER TABLE paya4_category OWNER TO postgres;
-- CREATE TABLE paya4_gestionfront
-- (
--     h1 varchar(255),
--     h2 varchar(255),
--     h3 varchar(255),
--     h4 varchar(255),
--     h5 varchar(255),
--     h6 varchar(255),
--     text varchar(255),
--     background varchar(255),
--     link varchar(255),
--     strong varchar(255),
--     span varchar(255)
-- );
-- ALTER TABLE paya4_gestionfront OWNER TO postgres;
-- CREATE TABLE paya4_memento
-- (
--     id_memento serial primary key,
--     content text
-- );
-- ALTER TABLE paya4_memento OWNER TO postgres;
-- CREATE TABLE "paya4_elementard" 
-- (
--     id SERIAL PRIMARY KEY,
--     background_color VARCHAR(25) NOT NULL,
--     categories VARCHAR(255),
--     categories_color VARCHAR(255),
--     critique TEXT NOT NULL,
--     critique_background_color VARCHAR(255) NOT NULL,
--     date_sortie INT NOT NULL,
--     director_name VARCHAR(255) NOT NULL,
--     font VARCHAR(255) NOT NULL,
--     font_color VARCHAR(25) NOT NULL,
--     font_textarea_color VARCHAR(255) NOT NULL,
--     image_url VARCHAR(255) NOT NULL,
--     movie_name VARCHAR(255) NOT NULL,
--     movie_time INT NOT NULL,
--     note INT NOT NULL,
--     slogan_movie VARCHAR(255) NOT NULL,
--     template VARCHAR(255) NOT NULL,
--     nb_vue INT NOT NULL,
--     create_at TIMESTAMP WITH TIME ZONE DEFAULT CURRENT_TIMESTAMP,
--     id_user INT,
--     FOREIGN KEY (id_user) REFERENCES paya4_user (id) ON DELETE SET NULL
-- );
-- ALTER TABLE paya4_elementard OWNER TO postgres;

INSERT INTO
    public.paya4_user (
        email,
        lastname,
        firstname,
        password,
        role,
        birth_date,
        creation_date,
        update_date,
        confirm_key,
        confirm,
        forgot_token,
        expiration_time
    )
VALUES
    (
        'adam.brooown@gmail.com',
        'Broooown',
        'Adam',
        '$2y$10$jYGyaE8S287U54NR/62Ore10A3yBfDfCjFYDbzZfRmMKNNSFPR8xm',
        3,
        '1980-01-01',
        '2021-01-18 14:48:30.102016 +00:00',
        '2023-07-19 14:48:30.102016 +00:00',
        '2c153ffe265fc76f023d2e4838c0438305abe498967299d7a7d94506db8b0d7e',
        1,
        null,
        null
    );