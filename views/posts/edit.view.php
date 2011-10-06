<?php

# Ouverture du formulaire
echo $this->form->open(array('class' => 'form-stacked', 'legend' => 'Edit this post'));
# ID du post
echo $this->form->input('post[id]', isset($post['id']) ? $post['id'] : '', array('type' => 'hidden'));
# Titre du post
echo $this->form->input('post[title]', isset($post['title']) ? $post['title'] : '', array('placeholder' => 'Titre', 'label' => 'Title'));
# Corps du post
echo $this->form->input('post[body]', isset($post['body']) ? $post['body'] : '', array('type' => 'textarea', 'class' => 'markItUp', 'placeholder' => 'Corps de l\'article', 'label' => 'Body'));
# Categorie du post
echo $this->form->select('post[category_id]', isset($post['category_id']) ? $post['category_id'] : '', $categories, array('label' => 'Category'));
# Auteur du post
echo $this->form->select('post[user_id]', isset($post['user_id']) ? $post['user_id'] : '', $users, array('label' => 'User'));
# Bouton de soumission et d'annulation
echo $this->form->input('submited', 'Save', array('type' => 'submit', 'reset' => 'Cancel'));
# fermeture du formulaire
echo $this->form->close();
?>