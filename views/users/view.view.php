<h1><?php echo $user['username']; ?></h1> dans le groupe <a href="<?php echo WEBROOT; ?>groups/view/<?php echo $user['group']['id']; ?>"><?php echo $user['group']['name']; ?></a>
<p><?php echo $user['password']; ?></p>
<p><?php echo $user['email']; ?></p>
<a href="<?php echo WEBROOT; ?>users/edit/<?php echo $user['id']; ?>">Editer</a> - <a href="<?php echo WEBROOT; ?>users/delete/<?php echo $user['id']; ?>">Supprimer</a>
