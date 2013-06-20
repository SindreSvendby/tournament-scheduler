-- Had a problem with duplicates team enteries for the same team members in wp_playersinteam
-- Run the following to see if you have problems in your database.

-- a) This only shows the players on each team
select group_concat(p.player_id) teams, p.team_id from wp_playersinteam p
group by p.team_id
order by teams;

-- b) This show how many teams that has the equal players. (in other words same team)

select a.team, min(a.team_id), group_concat(a.team_id) from (
                                                              select group_concat(p.player_id) team, p.team_id team_id
                                                              from wp_playersinteam p
                                                              group by  p.team_id) a
group by a.team
having count(a.team) > 2
