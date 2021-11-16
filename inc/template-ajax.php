<?php
if ( !defined('ABSPATH') ) {
    die();
}

add_action( 'wp_ajax_'        . 'recall_back_form', 'recall_back_form' );
add_action( 'wp_ajax_nopriv_' . 'recall_back_form', 'recall_back_form' ); 
function recall_back_form() {

    if ( empty($_POST['form']) ) {
        return false;
    }

    $form_data = $_POST['form'];

    if ( !empty(trim($form_data["name"])) || !empty(trim($form_data["phone"])) ) {
        die();
    }
    
    if ( !preg_match('/([\(]{1}[0-9]{3}[\)]{1}[ ]{1}[0-9]{3}[\-]{1}[0-9]{2}[\-]{1}[0-9]{2})/', substr($form_data["phone"], 3)) ) {
        die();
    }

    $mail_theme = "Сообщение из формы обратной связи";
    $email_to   = carbon_get_theme_option("option-email-recall");

    $name  = sanitize_text_field($form_data["GIYGuydguw87ye3"]);
    $phone = sanitize_text_field($form_data["dwh7yehjiewdtew"]);

    $params = Array(
        'Тема' => $mail_theme,
        'Имя' => $name,
        'Телефон' => $phone,
        'UTM-метки' => $_POST['si_utm']
    );

    if ( !empty(trim($email)) ) {
        $params['E-mail'] = $email;
    }
    
    $headers  = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=utf-8\r\n";
    $headers .= "From: boot@" . $_SERVER["HTTP_HOST"] . "\r\n";

    $multipart = create_message($mail_theme, $params);

    if ( mail($email_to, '=?UTF-8?B?' . base64_encode($mail_theme) . '?=', $multipart, $headers) ) {
        echo json_encode(Array('success' => 1, 'title' => "Спасибо!", 'text' => "Ожидайте нашего звонка"));
    } else {
        echo json_encode(Array('success' => 0, 'title' => "Ошибка", 'text' => 'Не удалось отправить сообщение'));
    }
    
    exit;
}
