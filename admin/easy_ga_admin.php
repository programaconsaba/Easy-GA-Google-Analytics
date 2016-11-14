<?php

if ( isset( $_POST['easy_ga_form_ga_script'] ) ) {
    update_option('easy-ga-script-option' , $_POST['easy_ga_form_ga_script'] );
}
?>

<p><b><?php echo esc_html__('The Google Analytics code will not run if the user has the Administrator role', 'easy-ga-google-analytics'); ?></b></p>

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
            <label for="easy_ga_form_ga_script"><?php echo esc_html__('Google Analytics code', 'easy-ga-google-analytics');?></label>
        </p>
        <p>
            <textarea name="easy_ga_form_ga_script" id="easy_ga_form_ga_script"><?php echo stripslashes(get_option ( 'easy-ga-script-option' ) ); ?></textarea>
        </p>
        <p>
            <input id="submit" type="submit" value="<?php echo esc_html__('Update', 'easy-ga-google-analytics'); ?>">
        </p>
    </form>
</div>