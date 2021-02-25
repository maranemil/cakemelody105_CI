<h2><?php echo lang('categories'); ?></h2>
<ul>
   <?php if (($categories = $this->categories_library->get_categories())): ?>
	  <?php foreach ($categories as $category): ?>
           <li><a href="<?php echo category_url($category['url_name']); ?>"> <?php echo $category['name']; ?> (<?php echo $category['posts_count']; ?>)</a></li>
	  <?php endforeach; ?>
   <?php endif; ?>
</ul>