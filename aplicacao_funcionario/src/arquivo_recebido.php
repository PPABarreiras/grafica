<!DOCTYPE html>
<html lang="pt-BR">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Arquivo recebido</title>
   <link rel="stylesheet" href="../styles/style.css">
   <link rel="stylesheet" href="../styles/style_page_recebido.css">
   <script src="../js/menu.js" defer></script>
   <script src="../js/popup_page_recebido.js" defer></script>
</head>
<body>
   <header>
      <nav>
         <div class="menu_container">
            <img src="../image/icon-menu-hamburguer.svg" alt="Menu lateral - hamburguer" id="btnMenu"/>

            <div id="menu" class="menu effect">
               <nav>
                  <ul>
                     <li>
                        <a href="../index.php"> <img src="../image/icon-recebidos.svg" alt="Icone de recebidos">
                           Recebidos
                        </a>
                     </li>
                     <li>
                        <a href="../src/prova.html">
                           <img src="../image/icon-prova.svg" alt="Icone de prova"/>
                           Prova
                        </a>
                     </li>
                     <li>
                        <a href="../src/atividade.html">
                           <img src="../image/icon-atividade.svg" alt="Icone de atividades"/>
                           Atividade
                        </a>
                     </li>
                     <li>
                        <a href="../src/apostila.html">
                           <img src="../image/icon-apostila.svg" alt="Icone de apostilas"/>
                           Apostila
                        </a>
                     </li>
                     <li>
                        <a href="../src/impressos.html">
                           <img src="../image/icon-impressos.svg" alt="Icone de impressos"/>
                           Impresso
                        </a>
                     </li>
                     <li>
                        <a href="../src/nao_impresso.html">
                           <img src="../image/icon-naoImpresso.svg" alt="Icone de não impressos"/>
                           Não impresso
                        </a>
                     </li>
                  </ul>
                   
                  <div>
                     <img src="../image/buuton-close.svg" alt="butão voltar" id="btnClose"/>
                  </div>
               </nav>
           </div>

            <div id="divBusca">
               <input type="text" id="txtBusca" placeholder="Pesquisar..."/>
               <img src="../image/icon-lupa.svg" id="btnBusca" alt="Buscar"/>
             </div>

            <ul>
               <li> 
                  <a href="../index.html"> <img src="../image/icon-home.svg" alt="Icone da home-page"> 
                  </a>   
               </li>
               <li> 
                  <a href="../src/notificacoes.php"><img src="../image/icon-notification.svg" alt="Icone de notificação">
                  </a>
               </li>
               <li>
                  <a href="#"><img src="../image/icon-profile.svg" alt="Icone do perfil">
                  </a>
               </li>
            </ul>
         </div>
         
      </nav>
   </header>

   <!-- menu Drop-Down com informações de login do usuário -->
   <div class="action">
      <div class="profile" onclick="menuDropDown()">
         <img src="./image/icon-profile.svg">
      </div>
      <div class="menu_perfil">
         <h3>Nome do usuário<br><span>Gerenciar conta</span></h3>
         <ul>
            <li><img src="https://img.icons8.com/external-inkubators-detailed-outline-inkubators/344/external-profile-ecommerce-user-interface-inkubators-detailed-outline-inkubators.png" alt=""><a href="#">Criar conta</a></li>
            <li><img src="https://img.icons8.com/ios/344/exit.png" alt=""><a href="#">Sair da conta</a></li>
         </ul>
      </div>
   </div>
   <main>
      <?php
         include "../src/config.php";

         //realiza query de consulta
         $result = $conn->query("SELECT * FROM Arquivo;");
         //guarda essa query na variavel $row
         $row = mysqli_fetch_all($result, MYSQLI_ASSOC);

         foreach ($row as $item => $conteudo) {?>
            <div class="content_container">
               <div calss="arquivo_recebido">
                  <img src="../image/icon_pdf.png" alt="Arquivo recebido para impressão">
               </div>
         
               <div class="info_arquivo">
                  <h2>Título: <?= $conteudo["titulo"] ?></h2>
                  <h3>Assunto: <?= $conteudo["assunto"] ?></h3>
                  
                  <div class="info_limites">
                     <h4>Prazo estipulado: <?= $conteudo["data_entrega"] ?></h4>
                     <h4>Número de cópias:   ></h4>
                  </div>
                  
                  <div class="info_remetente">
                     <h4>Nome do Professor remetente</h4>
                     <h4>example@ifba.edu.br</h4>
                  </div>

                  <button class="btn_negar" name="btn_negar" id="btn_negar">Negar impressão</button>
                  <a href="../src/arquivo_impresso.html"><button class="btn_concluido" name="btn_concluido" id="btn_concluido">Impressão concluída</button></a>
               </div>
            </div> 
             
         <?php }
            
      ?>
   </main>

   <!-- Popup para negação de impressão -->
   <div class="div_popup">
      <div class="popup">
         <div class="popup_close"> X </div>
         <div class="popup_container">
            <h3>Qual o motivo da sua rejeição a essa impressão?</h3>
            <form action="">
               <textarea name="mensagem_esclarecimento" id="mensagem_esclarecimento" cols="30" rows="10">
               </textarea>

               <button type="submit" name="enviar" value="Enviar" class="popup_button" id="enviar">Enviar</button>
            </form>
         </div>
      </div>
   </div>
</body>
</html>