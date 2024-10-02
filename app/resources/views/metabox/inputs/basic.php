<div id="username_password_container" class="auth-method-container">
    <p>
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" value="<?php echo esc_attr($username ?? ''); ?>" />
    </p>
    <p>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" value="<?php echo esc_attr($password ?? ''); ?>" />
    </p>
</div>