UPDATE      clown_type
SET         short_name = long_name
WHERE       short_name IS NULL
;
