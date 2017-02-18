<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Sempre - Atendimento Ágil</title>
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab|Source+Sans+Pro" rel="stylesheet">
        <link rel="stylesheet" href="css/main.css">
    </head>
    <body>

        <div class="content" id="texts">
            <img id="logo" src="imgs/sempre-md-white.png" alt="">

            <div class="messages">
                <h1>Forneça para seus clientes ou pacientes, um atendimento <span>ágil</span> e <span>desburocratizado</span>!</h1>

                <h3>Quer conhecer nossa ferramenta? Envie-nos suas informações, em estantes entraremos em contato. Agradecemos sua atenção!</h3>

            </div>


        </div>

        <div class="content" id="form">
            <div id="contact-form">
                
                
                <h1>Preencha o formulário, entramentos em contato!</h1>

                <form action="enviar.php" method="POST">
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input type="text" id="nome" name="nome">
                    </div>

                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" id="email" name="email" required>
                    </div>

                    <div class="form-group">
                        <label for="telefone">Telefone</label>
                        <input type="text" id="telefone" name="telefone" required>
                    </div>

                    <button type="submit" class="button">Enviar</button>
                </form>

                <p>Fique calmo, não enviaremos espan para seu e-mail.</p>
            </div>
        </div>
    </body>
</html>
<?php session_destroy(); ?>