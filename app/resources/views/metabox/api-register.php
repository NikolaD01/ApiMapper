<!-- File: views/metabox/api-register.php -->

<div>
    <p>
        <label for="api_url">API URL:</label>
        <input type="text" id="api_url" name="api_url" value="<?php echo esc_attr($api_url ?? ''); ?>" />
    </p>
</div>
<div>
    <p>
        <label for="login_method">Login Method:</label>
        <select id="login_method" name="login_method">
            <option value="empty">Without Auth</option>
            <option value="key" <?php selected($login_method ?? '', 'key'); ?>>API Key</option>
            <option value="bearer" <?php selected($login_method ?? '', 'bearer'); ?>>Bearer Token</option>
            <option value="basic" <?php selected($login_method ?? '', 'basic'); ?>>Username/Password</option>
        </select>
    </p>
</div>
<div id="selected_method">
    <?php
        $login_method = $login_method ?? 'empty';
        $view_path = __DIR__ . '/inputs/' . $login_method . '.php';

        if (file_exists($view_path)) {
            include $view_path;
        } else {
            echo 'No view available for the selected login method.';
        }
    ?>
</div>

