<!DOCTYPE html>
<html lang="pt-BR">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Notificações</title>
   <link rel="stylesheet" href="../styles/style.css">
   <script src="../js/menu.js" defer></script>

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
                  <a href="../index.php"> <img src="../image/icon-home.svg" alt="Icone da home-page"> 
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
      <div class="container_notificacoes">
         <div class="nova_notificacao">
            <div class="icon_style">
               <img src="../image/icon-profile.svg" alt="Avatar do perfil "/>
               <p>Nome do remetente</p>
            </div>

            <div class="info_notificacao">
               <div class="info_arquivo_style">
                  <h3>Avaliação de português 3º ano</h3>
               </div>
               <div class="info_arquivo_style">
                  <h4>Atividade avaliativa para a turma 732 do curso técnico em informática</h4>
               </div>
            </div>
            <div class="info_add">
               <p>10:40</p>
               <p>Hoje</p>
               <span>1</span>
            </div>
         </div>
      </div>

         <?php
         include "../src/config.php";

         //realiza query de consulta
         $result = $conn->query("SELECT * FROM Arquivo;");
         //guarda essa query na variavel $row
         $row = mysqli_fetch_all($result, MYSQLI_ASSOC);

         // echo print_r($row);

         //array para gerar cards de notificações
         foreach ($row as $item) {
           //Caso a situação do Documento for 1 (Mas pode ser alterado para "Entregue"), ele será exibido nas notificações.
            if ($item["situacao"] == "0") { ?>

               <div class="container_notificacoes">
                  <div class="nova_notificacao">
                     <div class="icon_style">
                        <img src="../image/icon-profile.svg" alt="Avatar do perfil "/>
                        <p>Nome do remetente</p>
                     </div>

                     <div class="info_notificacao">
                        <div class="info_arquivo_style">
                           <h3><?= $item["titulo"] ?></h3>
                        </div>
                        <div class="info_arquivo_style">
                           <h4><?= $item["assunto"] ?></h4>
                        </div>
                     </div>
                     <div class="info_add">
                        <p>Horário</p>
                        <p>Dia</p>
                        <span>1</span>
                     </div>
                  </div>
               </div>
            
               <?php }
            }
         ?>
   </main>
</body>
</html>