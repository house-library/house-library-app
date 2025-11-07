<?php loadPartial('head', [
    'styles' => $styles ?? [],
]); ?>
<?= loadPartial('header') ?>    

    <main class="explore-page-container">
        <div id="campo-filtragem">
            <form action="/buscar" method="GET" class="filter-form">
                
                <select name="documento" aria-label="Tipo de documento">
                    <option value="" selected disabled>Tipo de documento</option>
                    <option value="epub">E-book (EPUB)</option>
                    <option value="pdf">E-book (PDF)</option>
                </select>
                
                <select name="autor" aria-label="Autor">
                    <option value="" selected disabled>Autor</option>
                    <option value="dumas_alexandre">Alexandre Dumas</option>
                    <option value="dumas_filho">Alexandre Dumas Filho</option>
                    <option value="timoteo_alexandre">Alexandre Timóteo</option>
                    <option value="webb_alexis">Alexis Webb</option>
                    <option value="cao_alfie">Alfie Cao</option>
                    <option value="couto_alvaro">Álvaro Couto</option>
                    <option value="mendes_ana">Ana Mendes</option>
                    <option value="morais_ana">Ana Morais</option>
                    <option value="montegrande_ana">Ana Paula Montegrande</option>
                    <option value="herbert_asa">Asa P Herbert</option>
                    <option value="pasdar_aziz">Aziz M Pasdar</option>
                    <option value="dupont_bailey">Bailey Dupont</option>
                    <option value="lane_bev">Bev Lane</option>
                    <option value="stoker_bram">Bram Stoker</option>
                    <option value="amaral_caio">Caio Amaral</option>
                    <option value="santana_carlos">Carlos Santana</option>
                    <option value="tavora_catia">Cátia Távora</option>
                    <option value="campos_cintia">Cíntia Campos</option>
                    <option value="matthews_davis">Davis Matthews</option>
                    <option value="martins_elisa">Elisa Martins</option>
                    <option value="bronte_emily">Emily Brontë</option>
                    <option value="james_georger">Georgér L James</option>
                    <option value="goethe">Goethe</option>
                    <option value="santos_gustavo">Gustavo Santos</option>
                    <option value="figueiredo_helena">Helena Figueiredo</option>
                    <option value="parr_helena">Helena Parr</option>
                    <option value="torres_helena">Helena Torres Batista</option>
                    <option value="chandra_hilary">Hilary Chandra</option>
                    <option value="homero">Homero</option>
                    <option value="amaro_isis">Isis Amaro</option>
                    <option value="junqueira_ivone">Ivone Junqueira</option>
                    <option value="castro_jaime">Jaime Castro</option>
                    <option value="normand_james">James Normand</option>
                    <option value="austen_jane">Jane Austen</option>
                    <option value="martin_jasper">Jasper Martin</option>
                    <option value="milton_john">John Milton</option>
                    <option value="silva_juliana">Juliana Silva</option>
                    <option value="vancerg_julien">Julien Vancerg</option>
                    <option value="verne_julio">Júlio Verne</option>
                    <option value="thomvern_kai">Kai Thomvern</option>
                    <option value="wong_kallie">Kallie Valencia Wong</option>
                    <option value="yamashita_kiko">Kiko Yamashita</option>
                    <option value="vale_leigh">Leigh Vale</option>
                    <option value="costa_liz">Liz Costa</option>
                    <option value="renfield_lottie">Lottie Renfield</option>
                    <option value="alvarez_luana">Luana Alvarez</option>
                    <option value="huang_makenna">Makenna Huang</option>
                    <option value="zara_marcos">Marcos Zara</option>
                    <option value="alcoforado_mariana">Mariana Alcoforado</option>
                    <option value="bryes_mark">Mark Bryes</option>
                    <option value="zara_mateus">Mateus Zara</option>
                    <option value="abreu_melissa">Melissa Abreu da Cruz</option>
                    <option value="lee_michael">Michael Lee</option>
                    <option value="scott_michael">Michael Scott</option>
                    <option value="maquiavel_nicolau">Nicolau Maquiavel</option>
                    <option value="ranalli_pj">P J Ranalli</option>
                    <option value="berry_peter">Peter Berry</option>
                    <option value="platao">Platão</option>
                    <option value="portela_rafael">Rafael Portela</option>
                    <option value="stevenson_robert">Robert Louis Stevenson</option>
                    <option value="parker_ryan">Ryan Parker</option>
                    <option value="hines_rylan">Rylan M Hines</option>
                    <option value="joice_sally">Sally Joice</option>
                    <option value="pires_samuel">Samuel Pires</option>
                    <option value="robison_sean">Sean Robison</option>
                    <option value="calderon_silas">Silas Calderon</option>
                    <option value="pederson_terence">Terence Pederson</option>
                    <option value="kanegi_tomas">Tomás Kanegi</option>
               </select>
                
                <select name="categoria" aria-label="Categoria">
                    <option value="" selected disabled>Categoria</option>
                    <option value="romance">Romance</option>
                    <option value="misterio">Mistério / Thriller</option>
                    <option value="ficcao_cientifica">Ficção Científica</option>
                    <option value="auto_ajuda">Auto Ajuda</option>
                    <option value="classicos">Classicos</option>
                    <option value="literatura_infantil">Literatura Infantil</option>
                </select>
                
                <select name="materia" aria-label="Matéria">
                    <option value="" selected disabled>Matéria</option>
                </select>
                
                <select name="etiqueta" aria-label="Etiqueta">
                    <option value="" selected disabled>Etiqueta</option>
                </select>
                
               <select name="editora" id="editora">
                   <option value="" selected disabled>Selecione a editora</option>
                   <option value="archibald-constable-company">Archibald Constable & Company</option>
                   <option value="pierre-jules-hetzel">Pierre-Jules Hetzel</option>
                   <option value="petion">Pétion</option>
                   <option value="cassell-and-co">Cassell & Co.</option>
                   <option value="cotta">Cotta’sche Buchhandlung</option>
                   <option value="t-egerton">T. Egerton</option>
                   <option value="samuel-simmons">Samuel Simmons</option>
                   <option value="renascentista-italiana">Edição renascentista italiana (1532)</option>
               </select>

               <select>
                   <option value="" selected disabled>Ano de publicação</option>
                   <option value="2025">2025</option>
                   <option value="1897">1897</option>
                   <option value="1883">1883</option>
                   <option value="1870">1870</option>
                   <option value="1848">1848</option>
                   <option value="1847">1847</option>
                   <option value="1846">1846</option>
                   <option value="1832">1832</option>
                   <option value="1813">1813</option>
                   <option value="1808">1808</option>
                   <option value="1674">1674</option>
                   <option value="1669">1669</option>
                   <option value="1532">1532</option>
                   <option value="375">375 a.C.</option>
                   <option value="725">725–675 a.C.</option>
                   <option value="800">800 a.C.</option>
                </select>

                
                <select name="idioma" aria-label="Idioma">
                    <option value="" selected disabled>Idioma</option>
                    <option value="pt">Português</option>
                </select>

                <br>

                
             
                <div class="books">
                <div class="book-item">
                    <img src="/assets/capas-pi/classicos/arepublica.png" alt="A república">
                </div>

                <div class="book-item">
                    <img src="/assets/capas-pi/classicos/dracula.png" alt="Drácula">
                </div>

                <div class="book-item">
                    <img src="/assets/capas-pi/classicos/iliada.png" alt=">A Ilíada">
                </div>

                <div class="book-item">
                    <img src="/assets/capas-pi/classicos/ilhatesouro.png" alt="A ilha do tesouro">
                </div>

                <div class="book-item">
                    <img src="/assets/capas-pi/classicos/odisseia.png" alt="A odisseia">
                </div>

                <div class="book-item">
                    <img src="/assets/capas-pi/classicos/fausto.png" alt="Fausto">
                </div>

                <div class="book-item">
                    <img src="/assets/capas-pi/classicos/principe.png" alt="O príncipe">
                </div>

                <div class="book-item">
                    <img src="/assets/capas-pi/classicos/paraisoperdido.png" alt="Paraiso perdido">
                </div>

                <div class="book-item">
                    <img src="/assets/capas-pi/classicos/cartasportuguesas.png" alt="Cartas portuguesas">
                </div>

                <div class="book-item">
                    <img src="/assets/capas-pi/classicos/orgulhoepreconceito.png" alt="Orgulho e preconceito">
                </div>
  
                <div class="book-item">
                    <img src="/assets/capas-pi/romance/cartadeamor.png" alt="Carta de amor do passado">
                </div>

                <div class="book-item">
                    <img src="/assets/capas-pi/romance/mariana.png" alt="Mariana">
                </div>
       
                <div class="book-item">
                    <img src="/assets/capas-pi/romance/nossaquimica.png" alt="Nossa química">
                </div>

                <div class="book-item">
                    <img src="/assets/capas-pi/romance/tudopornosdois.png" alt="Tudo por nós dois">
                </div>

                <div class="book-item">
                    <img src="/assets/capas-pi/infantil/memoriasinfancia.png" alt="O limão feliz">
                </div>

                <div class="book-item">
                    <img src="/assets/capas-pi/infantil/forteamora.png" alt="A forte amora">
                </div>
 
                <div class="book-item">
                    <img src="/assets/capas-pi/infantil/asaventuraslily.png" alt="As aventuras de lily">
                </div>

                <div class="book-item">
                    <img src="/assets/capas-pi/infantil/MeninoRaposa.png" alt="O menino e a raposa">
                </div>

                <div class="book-item">
                    <img src="/assets/capas-pi/infantil/omundoleo.png" alt="Leo o bom leão">
                </div>

                <div class="book-item">
                    <img src="/assets/capas-pi/misterio/florestamisteriosa.png" alt="A floresta misteriosa">
                </div>

                <div class="book-item">
                    <img src="/assets/capas-pi/romance/historiaverao.png" alt="Uma história de verão">
                </div>

                <div class="book-item">
                    <img src="/assets/capas-pi/infantil/sandramundo.png" alt="Como Sandra salvou o circo">
                </div>

                <div class="book-item">
                    <img src="/assets/capas-pi/infantil/todosjuntos.png" alt="Todos juntos agora">
                </div>

                <div class="book-item">
                    <img src="/assets/capas-pi/romance/quandovocechegou.png" alt="Quando você chegou">
                </div>

            </form>
        </div>

    </main>

<?= loadPartial('footer') ?>
