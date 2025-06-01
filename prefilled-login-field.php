<?php

final class DefaultLoginFieldPlugin extends \Adminer\Plugin {
    private array $auth;
    private array $templates;

    public function __construct() {
        $this->auth = [
            "driver"   => getenv("ADMINER_DRIVER"),
            "server"   => getenv("ADMINER_SERVER"),
            "username" => getenv("ADMINER_USERNAME"),
            "password" => getenv("ADMINER_PASSWORD"),
            "db"       => getenv("ADMINER_DATABASE"),
        ];
        $this->templates = [
            "driver"   => '<tr><th>' . Adminer\lang('System')   . '<td>' . '<input name="auth[driver]"                   value="%s" readonly>',
            "server"   => '<tr><th>' . Adminer\lang('Server')   . '<td>' . '<input name="auth[server]"                   value="%s" readonly>',
            "username" => '<tr><th>' . Adminer\lang('Username') . '<td>' . '<input name="auth[username]"                 value="%s" readonly>',
            "password" => '<tr><th>' . Adminer\lang('Password') . '<td>' . '<input name="auth[password]" type="password" value="%s" readonly>',
            "db"       => '<tr><th>' . Adminer\lang('Database') . '<td>' . '<input name="auth[db]"                       value="%s" readonly>',
        ];
    }

    public function loginFormField($name) {
        $value = $this->auth[$name];
        if (!empty($value)) {
            $format = $this->templates[$name];
            $field = sprintf($format, $value);
            return $field;
        }
    }

    protected $translations = array(
        'cs' => array('' => 'Zobrazit přihlašovací údaje zadané v proměnných prostředí na přihlašovací obrazovce'),
        'de' => array('' => 'Anmeldeinformationen aus Umgebungsvariablen auf dem Login-Bildschirm anzeigen'),
        'pl' => array('' => 'Wyświetl dane logowania określone w zmiennych środowiskowych na ekranie logowania'),
        'ro' => array('' => 'Afișați informațiile de conectare specificate în variabilele de mediu pe ecranul de conectare'),
        'ja' => array('' => 'ログイン画面に環境変数で指定されたログイン情報を表示'),
    );
}
