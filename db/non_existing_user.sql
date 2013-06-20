-- find users in the plugin that are not in wordpress

Select distinct player_id from test.wp_playersinteam where player_id not in (Select ID from wp_users)

