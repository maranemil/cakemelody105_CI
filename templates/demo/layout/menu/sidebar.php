<?php foreach ($this->sidebar_library->sidebar as $item): ?>
	<?php $this->load->view('templates/beautiful_day/layout/menu/' . $item['file']); ?>
<?php endforeach; ?>