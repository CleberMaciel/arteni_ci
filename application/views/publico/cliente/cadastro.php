<!-- cadastro -->
<div class="w3ls_w3l_banner_nav_right_grid">
    <div class="module form-module">
        <div class="#"><i class="#"></i>
            <div class="#"></div>
        </div>
        <div class="form">
            <h2>Faça o seu cadastro aqui!</h2>
            <?php echo form_open('Cliente/salvar'); ?>
            <input type="text" name="nome" placeholder="Nome" required=" ">
            <input type="text" name="sobrenome" placeholder="Sobrenome" required=" ">
            <input type="email" name="email" placeholder="Email" required=" ">
            <input type="password" name="password" placeholder="Password" required=" ">
            <input type="text" name="cep" id="cep" placeholder="CEP" required=" ">
            <input type="text" name="estado" id="estado" placeholder="Estado" required=" " >
            <input type="text" name="cidade" id="cidade" placeholder="Cidade" required=" " >
            <input type="text" name="bairro" id="bairro" placeholder="Bairro" required=" " >
            <input type="text" name="rua" id="rua" placeholder="Rua" required=" " >
            <input type="text" name="numero" id="numero" placeholder="Número" required=" ">
            <input type="text" name="complemento" placeholder="Complemento" required=" ">
            <input type="text" name="cpf" id="cpf" placeholder="CPF" required=" ">
            <input type="text" name="datanascimento" id="datanascimento" placeholder="Data Nascimento" required=" ">
            <input type="submit" value="Cadastrar">
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<div class="clearfix"></div>
<div class="clearfix"></div>