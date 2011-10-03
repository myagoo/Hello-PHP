<?php $title_for_layout = $post['title']; ?>

<h1><?php echo $post['title']; ?></h1><br/>
Le <?php echo $post['created']; ?> par <a href="<?php echo BASE_URL; ?>/users/view/<?php echo $post['user_id']; ?>"><?php echo $post['user']['username']; ?></a> dans la catégorie <a href="<?php echo BASE_URL; ?>/categories/view/<?php echo $post['category_id']; ?>"><?php echo $post['category']['name']; ?></a>
<p><?php echo $post['body']; ?></p>
<a href="<?php echo BASE_URL; ?>/posts/edit/<?php echo $post['id']; ?>">Editer</a> - <a href="<?php echo BASE_URL; ?>/posts/delete/<?php echo $post['id']; ?>">Supprimer</a>

