<h1><?php echo $post['title']; ?></h1> le <?php echo date('d/m/Y', strtotime($post['created'])); ?> par <a href="<?php echo ROOT.DS; ?>users/view/<?php echo $post['user']['id']; ?>"><?php echo $post['user']['username']; ?></a> dans la catégorie <a href="<?php echo BASE_URL.DS; ?>categories/view/<?php echo $post['category']['id']; ?>"><?php echo $post['category']['name']; ?></a>
<p><?php echo $post['body']; ?></p>
<a href="<?php echo BASE_URL.DS; ?>posts/edit/<?php echo $post['id']; ?>">Editer</a> - <a href="<?php echo BASE_URL.DS; ?>posts/delete/<?php echo $post['id']; ?>">Supprimer</a>

