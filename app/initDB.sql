DROP TABLE IF EXISTS "paya4_elementard";
DROP TABLE IF EXISTS "paya4_user";

CREATE TABLE "paya4_user" (
    id SERIAL PRIMARY KEY,
    email VARCHAR(320) UNIQUE NOT NULL,
    lastname VARCHAR(120) NOT NULL,
    firstname VARCHAR(60) NOT NULL,
    password VARCHAR(255) NOT NULL,
    role INT DEFAULT 1 NOT NULL,
    birth_date DATE NOT NULL,
    creation_date TIMESTAMP WITH TIME ZONE DEFAULT CURRENT_TIMESTAMP,
    update_date TIMESTAMP WITH TIME ZONE DEFAULT CURRENT_TIMESTAMP,
    confirm_key VARCHAR(255) UNIQUE,
    confirm INT,
    forgot_token VARCHAR(32),
    expiration_time INTEGER NULL
);

CREATE TABLE IF NOT EXISTS "paya4_elementard" (
    id SERIAL PRIMARY KEY,
    backgroundColor VARCHAR(25) NOT NULL,
    critique TEXT,
    critiqueBackgroundColor VARCHAR(25) NOT NULL,
    critiqueTitle VARCHAR(255) NOT NULL,
    font VARCHAR(50) NOT NULL,
    fontColor VARCHAR(25) NOT NULL,
    movieAffiche TEXT NOT NULL,
    movieName VARCHAR(255) NOT NULL,
    movieTopImg TEXT NOT NULL,
    sloganMovie VARCHAR(255) NOT NULL,
    template VARCHAR(255) NOT NULL,
    idUser INTEGER,
    FOREIGN KEY (idUser) REFERENCES paya4_user (id) ON DELETE CASCADE
);