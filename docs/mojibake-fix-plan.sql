-- Célzott javítási terv az ismert mojibake rekordokra (étlap/itallap + kapcsolódó címek)
-- FONTOS: futtatás előtt teljes DB backup kötelező.

-- 1) Diagnosztika: gyanús rekordok kilistázása
SELECT id, title FROM categories WHERE title LIKE '%Ã%';
SELECT id, title FROM galleries  WHERE title LIKE '%Ã%';
SELECT id, title FROM covers     WHERE title LIKE '%Ã%';

-- 2) JAVÍTÁS MINTA: csak azokra a mezőkre, ahol biztosan mojibake állapot van
-- A minta lényege: latin1-ként félreértelmezett UTF-8 byte-ok visszaalakítása UTF-8 szöveggé.
-- UPDATE categories
--    SET title = CONVERT(BINARY CONVERT(title USING latin1) USING utf8mb4)
--  WHERE title LIKE '%Ã%';

-- UPDATE galleries
--    SET title = CONVERT(BINARY CONVERT(title USING latin1) USING utf8mb4)
--  WHERE title LIKE '%Ã%';

-- UPDATE covers
--    SET title = CONVERT(BINARY CONVERT(title USING latin1) USING utf8mb4)
--  WHERE title LIKE '%Ã%';

-- 3) Utóellenőrzés
-- SELECT id, title FROM categories WHERE title LIKE '%Ã%';
-- SELECT id, title FROM galleries  WHERE title LIKE '%Ã%';
-- SELECT id, title FROM covers     WHERE title LIKE '%Ã%';
