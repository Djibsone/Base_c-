<?php

function file_upload ($dir, $file) {

    //si image a été bien passée
    if ($_FILES[$file]['name']) {

        //verifié si y'a pas d'erreur
        if ($_FILES[$file]['error']) {

            //recuperer le nom temporaire de l'image
            $temp = $_FILES[$file]['tmp_name'];

            //recuperer l'extension de l'image
            $type = $_FILES[$file]['type'];
            if ($type === 'png' || $type === 'JPEG' || $type === 'jpg') {
                $name = $_FILES[$file]['name'];
                $urlf = $dir.$name;
                move_uploaded_file($temp, $urlf);
                return $urlf;
            } else {
                echo "<script>alert('Votre fichier doit porter png/JPEG/jpg.'); window.location = './new'</script>";

            }
            
        } else {
            # code...
        }
    } else {
        # code...
    }
    
}