CREATE TABLE patchhistory(
id int,
description text,
updated datetime);

INSERT INTO patchhistory values (1, 'Create patch history table', now());