<div id="login_form">
    <h1>Welcome to Warsyto</h1>
    <?php
    $Email = 'placeholder="Email"';
    $Password = 'placeholder="Password"';

    echo form_open("C_Login/validate_credentials");
    echo form_input("Email", "", $Email);
    echo form_password("Password", "", $Password);
    echo form_submit("login", "Login");
    echo anchor("C_Akun/AkunBaru", "Buat Akun");
    ?> 

</div>