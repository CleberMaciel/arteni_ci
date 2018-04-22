
<link href="<?php echo base_url('assets/css/erro.css') ?>" rel="stylesheet">
<!-- cadastro -->
<div class="w3ls_w3l_banner_nav_right_grid">
    <div class="module form-module">
        <div class="#"><i class="#"></i>
            <div class="#"></div>
        </div>

        <div class="form">

            <h2>Faça o seu cadastro aqui!</h2>
            Campos Obrigatorios(*)
            <?php echo form_open('Cliente/salvar'); ?>
            <br>
            <fieldset class="form-group">
                <legend id="legenda">Dados Pessoais</legend>
                <div class="form-group">
                    <label for="nome">Nome(*)</label>
                    <input class="form-control" type="text" name="nome" placeholder="Nome" maxLength="255"  data-val="true"
                           data-val-required="Digite seu nome." 
                           data-val-length="O nome deve conter no minimo 2 caracteres." data-val-length-min="2" required>
                    <span data-valmsg-for="nome" data-valmsg-replace="true" />
                </div>

                <div class="form-group">
                    <label for="sobrenome">Sobrenome(*)</label>
                    <input class="form-control" type="text" name="sobrenome" placeholder="sobreome" maxLength="255"  data-val="true"
                           data-val-required="Digite seu sobrenome." 
                           data-val-length="O sobrenome deve conter no minimo 2 caracteres." data-val-length-min="2" required>
                    <span data-valmsg-for="sobrenome" data-valmsg-replace="true" />
                </div>

                <div class="form-group">
                    <label for="sobrenome">E-mail(*)</label>
                    <input class="form-control" type="email" name="email" placeholder="email" maxLength="255"  data-val="true"
                           data-val-required="Digite seu e-mail." 
                           data-val-length="Deve ser no formato de e-mail." data-val-length-min="2" required>
                    <span data-valmsg-for="email" data-valmsg-replace="true" />
                </div>


                     <div class="form-group">
                    <label for="sobrenome">Senha(*)</label>
                    <input class="form-control" type="password" name="password" placeholder="sua senha" maxLength="255"  data-val="true"
                           data-val-required="Digite sua senha." 
                           data-val-length="Deve conter no minimo 6 digitos." data-val-length-min="6" required>
                    <span data-valmsg-for="password" data-valmsg-replace="true" />
                </div>



                <label for="cpf" class="control-label required">CPF(*)</label>
                <input type="text" name="cpf" id="cpf" placeholder="CPF" value="" required>

                <label for="cpf" class="control-label required">Telefone(*)</label>
                <input type="text" name="telefone" id="telefone" placeholder="Telefone" value="" required>

                <label for="datanascimento" class="control-label required">Data de nascimento(*)</label>
                <input type="text" name="datanascimento" id="datanascimento" placeholder="Data de nascimento" required> 


            </fieldset>
            <fieldset class="form-group">
                <legend id="legenda">Endereço de Entrega</legend>


                <label for="cep" class="control-label required">CEP(*)</label>
                <input type="text" name="cep" id="cep" placeholder="CEP" required>


                <label for="estado" class="control-label required">Estado(*)</label>
                <input type="text" name="estado" id="estado" placeholder="Estado" required>


                <label for="cidade" class="control-label required">Cidade(*)</label>
                <input type="text" name="cidade" id="cidade" placeholder="Cidade" required>


                <label for="bairro" class="control-label required">Bairro(*)</label>
                <input type="text" name="bairro" id="bairro" placeholder="Bairro" required>


                <label for="rua" class="control-label required">Rua(*)</label>
                <input type="text" name="rua" id="rua" placeholder="Rua" required>


                <label for="numero" class="control-label required">Número(*)</label>
                <input type="text" name="numero" id="numero" placeholder="Número" required>


                <label for="complemento" class="control-label required">Complemento</label>
                <input type="text" name="complemento" placeholder="Complemento">

            </fieldset>
            <input type="submit" value="Cadastrar">
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<div class="clearfix"></div>
<div class="clearfix"></div>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script>
<script src="//ajax.aspnetcdn.com/ajax/mvc/5.2.3/jquery.validate.unobtrusive.min.js"></script>
