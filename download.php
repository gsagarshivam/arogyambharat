    <?php

    	$hepr = isset($_POST['hepr'])?$_POST['hepr']:'';
        $form = isset($_POST['form'])?$_POST['form']:'';
    	if($hepr == 'hepr'){
    		$files = 'hepr.pdf';
    		header('Content-Type: application/pdf'); 
        	header('Content-Description: inline: filename="'.$files.'"');
        	header('Content-Transfer-Encoding: binary');
        	header('Accept-Ranges: bytes'); 
        	@readfile($files);
        	exit();
    	}


        if($form == 'form'){
            $files = 'form.pdf';
            header('Content-Type: application/pdf'); 
            header('Content-Description: inline: filename="'.$files.'"');
            header('Content-Transfer-Encoding: binary');
            header('Accept-Ranges: bytes'); 
            @readfile($files);
            exit();
        }

        $pecat = isset($_POST['pecat'])?$_POST['pecat']:'';
        if($pecat == 'pecat'){
            $files = 'pecat.pdf';
            header('Content-Type: application/pdf'); 
            header('Content-Description: inline: filename="'.$files.'"');
            header('Content-Transfer-Encoding: binary');
            header('Accept-Ranges: bytes'); 
            @readfile($files);
            exit();
        }
    ?>

