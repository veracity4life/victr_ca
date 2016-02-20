<?php

function saveData($db, $data) {
		// Save/Update data to/in DB
		$json = json_decode($data, true);

		$validate_sql = "SELECT uid FROM repos WHERE id = ";

		for($i = 0; $i < count($json['items']); $i++) {
			$cur = $json['items'][$i];

			if(!$db->get_value($validate_sql . $cur['id'])) {
				$sql = "INSERT INTO `victr`.`repos` (`id`, `url`, `name`, `full_name`, `created_at`, `pushed_at`, `desc`, `stars`) VALUES (?,?,?,?,?,?,?,?);";

				$db->insert($sql,
							$cur['id'],
							$cur['url'],
							$cur['name'],
							$cur['full_name'],
							date("Y-m-d H:i:s", strtotime($cur['created_at'])),
							date("Y-m-d H:i:s", strtotime($cur['pushed_at'])),
							$cur['description'],
							$cur['stargazers_count']);
			} else {
				$sql = "UPDATE `victr`.`repos` SET `url` = ?, `name` = ?, `full_name` = ?, `created_at` = ?, `pushed_at` = ?, `desc` = ?, `stars` = ? WHERE `id` = ?";

				$db->execute($sql,
							$cur['url'],
							$cur['name'],
							$cur['full_name'],
							date("Y-m-d H:i:s", strtotime($cur['created_at'])),
							date("Y-m-d H:i:s", strtotime($cur['pushed_at'])),
							$cur['description'],
							$cur['stargazers_count'],
							$cur['id']);
			}

		}
	}
