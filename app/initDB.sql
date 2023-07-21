DROP TABLE IF EXISTS paya4_comment;
DROP TABLE IF EXISTS paya4_elementard;
DROP TABLE IF EXISTS paya4_user;
DROP TABLE IF EXISTS paya4_category;
DROP TABLE IF EXISTS paya4_gestionfront;
DROP TABLE IF EXISTS paya4_memento;

CREATE TABLE paya4_category
(
    id serial PRIMARY KEY,
    name varchar(255) NOT NULL,
    picture varchar(255) NOT NULL
);

CREATE TABLE paya4_user
(
    id serial PRIMARY KEY,
    email varchar(320) NOT NULL UNIQUE,
    lastname varchar(120) NOT NULL,
    firstname varchar(60) NOT NULL,
    password varchar(255) NOT NULL,
    role integer NOT NULL DEFAULT 1,
    birth_date date NOT NULL,
    creation_date timestamp with time zone DEFAULT CURRENT_TIMESTAMP,
    update_date timestamp with time zone DEFAULT CURRENT_TIMESTAMP,
    confirm_key varchar(255) UNIQUE,
    confirm integer NOT NULL,
    forgot_token varchar(32),
    expiration_time integer
);

CREATE TABLE paya4_elementard
(
    id serial PRIMARY KEY,
    background_color varchar(25) NOT NULL,
    categories varchar(255),
    categories_color varchar(255),
    critique text NOT NULL,
    critique_background_color varchar(255) NOT NULL,
    date_sortie integer NOT NULL,
    director_name varchar(255) NOT NULL,
    font varchar(255) NOT NULL,
    font_color varchar(25) NOT NULL,
    font_textarea_color varchar(255) NOT NULL,
    image_url varchar(255) NOT NULL,
    movie_name varchar(255) NOT NULL,
    movie_time integer NOT NULL,
    note integer NOT NULL,
    slogan_movie varchar(255) NOT NULL,
    template varchar(255) NOT NULL,
    nb_vue integer NOT NULL,
    create_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP,
    id_user integer REFERENCES paya4_user ON DELETE SET NULL
);

CREATE TABLE paya4_comment
(
    id serial PRIMARY KEY,
    content text NOT NULL,
    status integer NOT NULL,
    id_review integer NOT NULL REFERENCES paya4_elementard ON DELETE CASCADE,
    id_user integer REFERENCES paya4_user ON DELETE SET NULL,
    created_at timestamp DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE paya4_gestionfront
(
    h1 varchar(255),
    h2 varchar(255),
    h3 varchar(255),
    h4 varchar(255),
    h5 varchar(255),
    h6 varchar(255),
    text varchar(255),
    background varchar(255),
    link varchar(255),
    strong varchar(255),
    span varchar(255)
);

CREATE TABLE paya4_memento
(
    id_memento serial PRIMARY KEY,
    content text NOT NULL
);