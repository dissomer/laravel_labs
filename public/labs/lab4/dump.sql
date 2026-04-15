-- Adminer 4.8.1 PostgreSQL 13.2 (Debian 13.2-1.pgdg100+1) dump

DROP TABLE IF EXISTS "users";
DROP SEQUENCE IF EXISTS users_id_seq;
CREATE SEQUENCE users_id_seq INCREMENT 1 MINVALUE 1 MAXVALUE 2147483647 CACHE 1;

CREATE TABLE "public"."users" (
    "id" integer DEFAULT nextval('users_id_seq') NOT NULL,
    "username" character varying(50) NOT NULL,
    "email" character varying(100) NOT NULL,
    "password" character varying(255) NOT NULL,
    CONSTRAINT "users_email_key" UNIQUE ("email"),
    CONSTRAINT "users_pkey" PRIMARY KEY ("id"),
    CONSTRAINT "users_username_key" UNIQUE ("username")
) WITH (oids = false);

INSERT INTO "users" ("id", "username", "email", "password") VALUES
(1,	'diss',	'diss@gmail.com',	'c4ca4238a0b923820dcc509a6f75849b'),
(3,	'diss1',	'diss1@gmail.com',	'c4ca4238a0b923820dcc509a6f75849b'),
(4,	'Mark',	'Mark@gmail.com',	'202cb962ac59075b964b07152d234b70');

-- 2026-04-15 03:39:27.838274+00
