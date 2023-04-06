<?php
class Annonce {
    public function add_annonce () {
        require './model.php';
        require './utils/method.php';
        require './view/annonce.php';

        if($_SERVER['REQUEST_METHOD'] === 'POST')
            {
                $title = htmlspecialchars($_REQUEST['title']);
                $description = htmlspecialchars($_REQUEST['description']);
                $contact = htmlspecialchars($_REQUEST['contact']);

                $image = file_upload('media', 'image');

                if(isset($title) && !empty($title) && isset($description) && !empty($description) && isset($contact) && !empty($contact)) 
                {
                    $table = 'annonce';
                    $field = 'title, description, image, contact';
                    $values = '?,?,?,?';
                    $data = array($title, $description, addslashes($image), $contact);

                    $model = new Model();
                    $model -> add($table, $field, $values, $data);
                }
                else {
                    echo "<script>alert('Tous les champs sont requis.'); window.location = './new'</script>";
                }
    
            }
    }
}