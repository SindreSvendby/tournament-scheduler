
-- For og fikse brukere som er dupliserte:
-- På forhånd:
-- 1. du må vite brukeriden til den som skal slettes og iden til den du skal overføre alt til.
-- 2. Antar at wp_ er wordpress prefixen (dette er den pr default)
-- 3.Antar at databasen er test (dette vil stort sett variere)


-- Stemmer ikke 2 og 3 må du bytte ut SQLene under.
-- bruker du vil fjerne er her representert ved og ha id 1
-- brukeren du vil at skal overta er her representert ved og ha id 2


-- 1. Sjekke om gammel bruker id  er registert i wp_playersinteam, hvis ikke. ingenting og gjør
select *  from test.wp_playersinteam where player_id = 1
-- 2. Sjekke om gammel bruker id er registert med en lik partner som ny bruker id.
select distinct player_id from test.wp_playersinteam where
  team_id IN (Select team_id from test.wp_playersinteam where player_id  = 1)
  and player_id != 1
  and player_id
      IN (
    select distinct player_id from test.wp_playersinteam where
      team_id IN (Select team_id from test.wp_playersinteam where player_id  = 2)
      and player_id != 2);

-- 3a. Hvis den ikke er det, kan man bare bytte ut ny med gammel bruker id i wp_playersinteam.
-- altså hvis spørringen i 2 gir et tomt resultatsett, kjør følgende spørring:
UPDATE test.wp_playersinteam SET player_id = 2 where player_id = 1;

-- 3b. Hvis ny brukeren er registert med samme partner må du bytte ut alle tilfellene av team_id med
-- ny team_id som ny bruker id OG slette raden i wp_playersinteam.
Select r.team_id, p.team_id from wp_results r , wp_playersinteam p
where p.team_id = r.team_id
and p.team_id IN (Select team_id from wp_playersinteam where player_id = 1)
and p.player_id != 1;


DELETE test.wp_playersinteam where player_id = 1;