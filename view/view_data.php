<?php

$data = $db->get_array("SELECT `uid`, `id`, `url`, `name`, `full_name`, DATE_FORMAT(`created_at`,'%b %d %Y %h:%i %p'), DATE_FORMAT(`pushed_at`,'%b %d %Y %h:%i %p'), `desc`, `stars` FROM victr.repos;");


?>
		
	<div class="row">

		<section class="col-md-offset-2 col-md-8 col-lg-offset-3 col-lg-6">
			<?php foreach($data as $key => $value) { ?>

			<div class="panel panel-info">
				<div class="panel-heading" onclick="togglePanelBody('<?= $key ?>_id')" role="button">
					<h3 class="panel-title"><?= $value[3] ?> <span class="badge"><?= $value[8] ?></span></h3>
				</div>
				
				<div id="<?= $key ?>_id" class="panel-body collapse">
					<table class="table table-responsive">
						<thead></thead>
						<tbody>
							<tr>
								<th>Repo ID</th>
								<td><?= $value[1] ?></td>
							</tr>
							<tr>
								<th>Project Name</th>
								<td><?= $value[4] ?></td>
							</tr>
							<tr>
								<th>URL</th>
								<td><a href="<?= $value[2] ?>"><?= $value[2] ?></a></td>
							</tr>
							<tr>
								<th>Date Created</th>
								<td><?= $value[5] ?></td>
							</tr>
							<tr>
								<th>Date Last Push</th>
								<td><?= $value[6] ?></td>
							</tr>
							<tr>
								<th>Description</th>
								<td><?= $value[7] ?></td>
							</tr>
							<tr>
								<th>Total Stars</th>
								<td><?= $value[8] ?></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>

			<?php } ?>

		</section>

	</div>
		
	<script>
		
		function togglePanelBody(eId) {
			var e = document.getElementById(eId);

			if(e.classList.contains('collapse')) {
				e.classList.remove('collapse');
			} else {
				e.classList.add('collapse');
			}

		}


	</script>
