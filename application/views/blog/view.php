<h2><?php echo $blog['title'] ?></h2>
<div id="main">
    <?php echo $blog['text'] ?>
</div>
<h4>Comments:</h4>
<?php if ($userid !== FALSE): ?>
<?= comment_form(1, $blog['id'], 'blog_comments') ?>
<?php endif; ?>
<?= comment_list('blog_comments', 1, $blog['id']) ?>
