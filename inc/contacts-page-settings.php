<?php
$contacts_settings_page = 'contacts-settings.php';

function contacts_options()
{
    global $contacts_settings_page;
    add_options_page('Контакты', 'Контакты', 'manage_options', $contacts_settings_page, 'contacts_option_page');
}

add_action('admin_menu', 'contacts_options');

function contacts_option_page()
{
    global $contacts_settings_page;
    ?>
    <div class="wrap">
    <form method="post" enctype="multipart/form-data" action="options.php">
        <?php
        settings_fields('contacts_options');
        do_settings_sections($contacts_settings_page);
        ?>
        <p class="submit">
            <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>"/>
        </p>
    </form>
    </div><?php
}

function contacts_option_settings()
{
    global $contacts_settings_page;
    register_setting('contacts_options', 'contacts_options', 'contacts_validate_settings'); // contacts_options

    add_settings_section('contacts_section_1', 'Настройки карты', '', $contacts_settings_page);

    $contacts_field_params = array(
        'type' => 'text',
        'id' => 'key',
        'desc' => 'Api key можно пполучить по адресу <a href="https://console.developers.google.com/apis/credentials?" target="_blank">Google Developers Console</a>',
        'label_for' => 'key'
    );
    add_settings_field('my_text_field', 'Api key', 'contacts_option_display_settings', $contacts_settings_page, 'contacts_section_1', $contacts_field_params);

    $contacts_field_params = array(
        'type' => 'text',
        'id' => 'lat',
        'desc' => 'Укажите широту центра карты',
        'label_for' => 'lat'
    );
    add_settings_field('my_text_field_2', 'Широта', 'contacts_option_display_settings', $contacts_settings_page, 'contacts_section_1', $contacts_field_params);

    $contacts_field_params = array(
        'type' => 'text',
        'id' => 'lng',
        'desc' => 'Укажите долготу центра карты',
        'label_for' => 'lng'
    );
    add_settings_field('my_text_field_3', 'Долгота', 'contacts_option_display_settings', $contacts_settings_page, 'contacts_section_1', $contacts_field_params);

    add_settings_section('contacts_section_2', 'Настройки метки', '', $contacts_settings_page);

    $contacts_field_params = array(
        'type' => 'text',
        'id' => 'lat_picker',
        'desc' => 'Укажите широту метки на карте',
        'label_for' => 'lat_picker'
    );
    add_settings_field('my_text_field_4', 'Широта', 'contacts_option_display_settings', $contacts_settings_page, 'contacts_section_2', $contacts_field_params);

    $contacts_field_params = array(
        'type' => 'text',
        'id' => 'lng_picker',
        'desc' => 'Укажите долготу метки на карте',
        'label_for' => 'lng_picker'
    );
    add_settings_field('my_text_field_5', 'Долгота', 'contacts_option_display_settings', $contacts_settings_page, 'contacts_section_2', $contacts_field_params);

    add_settings_section('contacts_section_3', 'Контакты', '', $contacts_settings_page);

    $contacts_field_params = array(
        'type' => 'text',
        'id' => 'email',
        'desc' => 'Адрес электроннной почты',
        'label_for' => 'email'
    );
    add_settings_field('my_text_field_6', 'Email', 'contacts_option_display_settings', $contacts_settings_page, 'contacts_section_3', $contacts_field_params);

    $contacts_field_params = array(
        'type' => 'text',
        'id' => 'email_2',
        'desc' => 'Адрес электроннной почты №2',
        'label_for' => 'email_2'
    );
    add_settings_field('my_text_field_7', 'Email', 'contacts_option_display_settings', $contacts_settings_page, 'contacts_section_3', $contacts_field_params);

    $contacts_field_params = array(
        'type' => 'text',
        'id' => 'phone',
        'desc' => 'Телефонный номер',
        'label_for' => 'phone'
    );
    add_settings_field('my_text_field_8', 'Телефон', 'contacts_option_display_settings', $contacts_settings_page, 'contacts_section_3', $contacts_field_params);

    $contacts_field_params = array(
        'type' => 'text',
        'id' => 'phone_2',
        'desc' => 'Телефонный номер №2',
        'label_for' => 'phone_2'
    );
    add_settings_field('my_text_field_9', 'Телефон', 'contacts_option_display_settings', $contacts_settings_page, 'contacts_section_3', $contacts_field_params);

    $contacts_field_params = array(
        'type' => 'textarea',
        'id' => 'address',
        'desc' => 'Адрес компании',
        'label_for' => 'address'
    );
    add_settings_field('my_text_field_10', 'Адрес', 'contacts_option_display_settings', $contacts_settings_page, 'contacts_section_3', $contacts_field_params);
}

add_action('admin_init', 'contacts_option_settings');

function contacts_option_display_settings($args)
{
    extract($args);

    $option_name = 'contacts_options';

    $o = get_option($option_name);

    switch ($type) {
        case 'text':
            $o[$id] = esc_attr(stripslashes($o[$id]));
            echo "<input class='regular-text' type='text' id='$id' name='" . $option_name . "[$id]' value='$o[$id]' />";
            echo ($desc != '') ? "<br /><span class='description'>$desc</span>" : "";
            break;
        case 'textarea':
            $o[$id] = esc_attr(stripslashes($o[$id]));
            echo "<textarea class='regular-text' type='text' id='$id' name='" . $option_name . "[$id]' value='$o[$id]' rows='5' /></textarea>";
            echo ($desc != '') ? "<br /><span class='description'>$desc</span>" : "";
            break;
    }
}

function contacts_validate_settings($input)
{
    foreach ($input as $k => $v) {
        $valid_input[$k] = trim($v);
    }
    return $valid_input;
}

?>