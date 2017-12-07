<body>
    <div class="login-dark">
        <?php echo form_open('Painel/login'); ?> 

        <h2 class="sr-only">Formulario de Login</h2>
        <div class="illustration"><i class="icon ion-ios-locked-outline"></i></div>
        <div class="form-group">
            <input class="form-control" type="email" name="email" placeholder="Email">
        </div>
        <div class="form-group">
            <input class="form-control" type="password" name="password" placeholder="Password">
        </div>
        <div class="form-group">
            <button class="btn btn-primary btn-block" type="submit">Entrar</button>
            <?php echo form_close(); ?>
        </div>