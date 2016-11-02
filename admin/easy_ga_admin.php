<?php

if ( isset( $_POST['easy_ga_form_ga_script'] ) ) {
    update_option('easy-ga-script-option' , $_POST['easy_ga_form_ga_script'] );
}
?>

<p><b><?php echo 'El código de Google Analytics no se ejecutará si el usuario tiene el role de Administrador' ?></b></p>

<style type="text/css">
    #easy_ga_admin_wrapper textarea {
        border: 1px solid #b9b9bb9;
        height: 300px;
       // position: absolute;
        width: 90%; 
    }
</style>
<div id="easy_ga_admin_wrapper">
    <form method="post" action="#">
        <p>
            <label for="easy_ga_form_ga_script"><?php echo 'Código de Google Analytics'?></label>
        </p>
        <p>
            <textarea name="easy_ga_form_ga_script" id="easy_ga_form_ga_script"><?php echo stripslashes(get_option ( 'easy-ga-script-option' ) ); ?></textarea>
        </p>
        <p>
            <input id="submit" type="submit" value='<?php echo 'Actualizar'?>'>
        </p>
    </form>
</div>