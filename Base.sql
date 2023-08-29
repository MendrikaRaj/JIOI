-------------------------------------------DROP-------------------------------------------
DROP VIEW IF EXISTS V_RESULTAT;

DROP VIEW IF EXISTS V_RANG_ATHLETE;

DROP VIEW IF EXISTS V_ATHLETE;

DROP VIEW IF EXISTS V_MOUVEMENT;

DROP VIEW IF EXISTS MEDAILLE;

DROP VIEW IF EXISTS V_CALENDRIER_USER;

DROP VIEW IF EXISTS V_CALENDRIER;

-------------------------------------------VIEW-------------------------------------------
DROP VIEW IF EXISTS V_CALENDRIER;

CREATE OR REPLACE VIEW V_CALENDRIER AS
    SELECT
        C.ID,
        DATE(C.DATE),
        D.NOM AS DISCIPLINE,
        S.NOM AS SITE
    FROM
        CALENDRIERS C
        JOIN DISCIPLINES D
        ON D.ID=C.DISCIPLINEID JOIN SITES S
        ON S.ID=C.SITEID;

DROP VIEW IF EXISTS V_CALENDRIER_USER;

CREATE
OR REPLACE VIEW V_CALENDRIER_USER AS

SELECT
    DATE(C.DATE),
    C.DISCIPLINEID,
    D.NOM AS DISCIPLINE,
    S.NOM AS SITE
FROM
    CALENDRIERS C
    JOIN DISCIPLINES D
    ON D.ID = C.DISCIPLINEID JOIN SITES S
    ON S.ID = C.SITEID
GROUP BY
    DATE(C.DATE),
    C.DISCIPLINEID,
    D.NOM,
    S.NOM;

DROP VIEW IF EXISTS MEDAILLE;

CREATE OR REPLACE VIEW MEDAILLE AS
    SELECT
        P.NOM,
        P.PHOTO,
        COALESCE( SUM(
            CASE
                WHEN R.RANG = 1 THEN
                    1
                ELSE
                    0
            END), 0) AS GOLD,
        COALESCE( SUM(
            CASE
                WHEN R.RANG = 2 THEN
                    1
                ELSE
                    0
            END), 0) AS SILVER,
        COALESCE( SUM(
            CASE
                WHEN R.RANG = 3 THEN
                    1
                ELSE
                    0
            END), 0) AS BRONZE,
        COALESCE( SUM(
            CASE
                WHEN R.RANG = ANY (ARRAY[1, 2, 3]) THEN
                    1
                ELSE
                    0
            END), 0) AS TOTAL
    FROM
        PAYS      P
        LEFT JOIN RESULTATS R
        ON P.ID = R.PAYSID
    GROUP BY
        P.ID,
        P.PHOTO,
        P.NOM
    ORDER BY
        CASE
            WHEN SUM(
                CASE
                    WHEN R.RANG = 1 THEN
                        1
                    ELSE
                        0
                END) > 0 THEN
                1
            WHEN SUM(
                CASE
                    WHEN R.RANG = 2 THEN
                        1
                    ELSE
                        0
                END) > 0 THEN
                2
            WHEN SUM(
                CASE
                    WHEN R.RANG = 3 THEN
                        1
                    ELSE
                        0
                END) > 0 THEN
                3
            ELSE
                4
        END, TOTAL DESC;

DROP VIEW IF EXISTS V_MOUVEMENT;

CREATE OR REPLACE VIEW V_MOUVEMENT AS
    SELECT
        D.ID AS DISCIPLINEID,
        D.NOM AS DISCIPLINE,
        COALESCE(SUM(
            CASE
                WHEN C.TYPE::TEXT = 'RECETTE'::TEXT THEN
                    M.MONTANT
                ELSE
                    0::NUMERIC
            END),
        0::NUMERIC) AS RECETTE_TOTAL,
        COALESCE(SUM(
            CASE
                WHEN C.TYPE::TEXT = 'DEPENSE'::TEXT THEN
                    M.MONTANT
                ELSE
                    0::NUMERIC
            END),
        0::NUMERIC) AS DEPENSE_TOTAL,
        COALESCE(SUM(
            CASE
                WHEN C.TYPE::TEXT = 'RECETTE'::TEXT THEN
                    M.MONTANT
                ELSE
                    -M.MONTANT
            END),
        0::NUMERIC) AS DIFFERENCE
    FROM
        DISCIPLINES D
        LEFT JOIN MOUVEMENTS M
        ON D.ID = M.DISCIPLINEID
        LEFT JOIN CATEGORIE_DETAILS CD
        ON CD.ID = M.CATEGORIEDETAILID
        LEFT JOIN CATEGORIES C
        ON C.ID = CD.CATEGORIEID
    GROUP BY
        D.ID,
        D.NOM;

-- DROP VIEW IF EXISTS DIFFERENCE;

-- CREATE OR REPLACE VIEW DIFFERENCE AS
--     SELECT
--         DISCIPLINEID,
--         DISCIPLINE,
--         RECETTE_TOTAL - DEPENSE_TOTAL AS DIFFERENCE
--     FROM
--         V_MOUVEMENT;
DROP VIEW IF EXISTS V_ATHLETE;

CREATE OR REPLACE VIEW V_ATHLETE AS
    SELECT
        A.ID,
        A.NOM,
        A.PAYSID,
        P.NOM          AS PAYS,
        A.DISCIPLINEID,
        D.NOM          AS DISCIPLINE
    FROM
        ATHLETES    A
        JOIN PAYS P
        ON P.ID=A.PAYSID JOIN DISCIPLINES D
        ON D.ID=A.DISCIPLINEID;

DROP VIEW IF EXISTS V_RANG_ATHLETE;

CREATE OR REPLACE VIEW V_RANG_ATHLETE AS
    SELECT
        RA.ID,
        RA.RANG,
        RA.ATHLETEID,
        A.NOM,
        A.PAYSID,
        P.NOM          AS PAYS,
        A.DISCIPLINEID,
        D.NOM          AS DISCIPLINE
    FROM
        RANG_ATHLETES RA
        JOIN ATHLETES A
        ON A.ID=RA.ATHLETEID JOIN PAYS P
        ON P.ID=A.PAYSID
        JOIN DISCIPLINES D
        ON D.ID=A.DISCIPLINEID;

DROP VIEW IF EXISTS V_RESULTAT;

CREATE OR REPLACE VIEW V_RESULTAT AS
    SELECT
        R.ID,
        R.RANG,
        R.DISCIPLINEID,
        D.TYPE,
        R.PAYSID
    FROM
        RESULTATS   R
        JOIN DISCIPLINES D
        ON D.ID=R.DISCIPLINEID;

-------------------------------------------INSERTION-------------------------------------------
INSERT INTO ADMINS VALUES(
    DEFAULT,
    'test',
    'test@gmail.com',
    '123456789'
);

INSERT INTO GESTIONNAIRES VALUES(
    DEFAULT,
    'test',
    'test@gmail.com',
    '123456789'
);

INSERT INTO CATEGORIES VALUES(
    DEFAULT,
    'DEPENSE'
),
(
    DEFAULT,
    'RECETTE'
);