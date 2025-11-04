<?= loadPartial('head', $viewData) ?>
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
                    <option value="ahern">Cecelia Ahern</option>
                    <option value="agassi">Andre Agassi</option>
                    <option value="asimov">Isaac Asimov</option>
                    <option value="atwood">Margaret Atwood</option>
                    <option value="austen">Jane Austen</option>
                    <option value="v_aveyard">Victoria Aveyard</option>
                    <option value="barbery">Muriel Barbery</option>
                    <option value="bardugo">Leigh Bardugo</option>
                    <option value="bronte">Emily Brontë</option>
                    <option value="carnegie">Dale Carnegie</option>
                    <option value="carroll">Lewis Carroll</option>
                    <option value="cixin">Liu Cixin</option>
                    <option value="covey">Stephen Covey</option>
                    <option value="crouch">Blake Crouch</option>
                    <option value="dahl">Roald Dahl</option>
                    <option value="diamond">Jared Diamond</option>
                    <option value="duhigg">Charles Duhigg</option>
                    <option value="dweck">Carol S. Dweck</option>
                    <option value="elrod">Hal Elrod</option>
                    <option value="fitzgerald">F. Scott Fitzgerald</option>
                    <option value="flynn">Gillian Flynn</option>
                    <option value="fowles">John Fowles</option>
                    <option value="gabaldon">Diana Gabaldon</option>
                    <option value="garcia_marquez">Gabriel García Márquez</option>
                    <option value="genova">Lisa Genova</option>
                    <option value="gibson">William Gibson</option>
                    <option value="goleman">Daniel Goleman</option>
                    <option value="green">John Green</option>
                    <option value="haig">Matt Haig</option>
                    <option value="harari">Yuval Noah Harari</option>
                    <option value="harris_ali">Ali Harris</option>
                    <option value="harris_thomas">Thomas Harris</option>
                    <option value="hawking">Stephen Hawking</option>
                    <option value="hawkins_paula">Paula Hawkins</option>
                    <option value="herbert">Frank Herbert</option>
                    <option value="hill">Napoleon Hill</option>
                    <option value="hoover">Colleen Hoover</option>
                    <option value="huberman">Leo Huberman</option>
                    <option value="huxley">Aldous Huxley</option>
                    <option value="isaacson">Walter Isaacson</option>
                    <option value="jeffers">Oliver Jeffers</option>
                    <option value="kafka">Franz Kafka</option>
                    <option value="king">Stephen King</option>
                    <option value="kinney">Jeff Kinney</option>
                    <option value="larsson">Stieg Larsson</option>
                    <option value="lee_harper">Harper Lee</option>
                    <option value="lewis">C.S. Lewis</option>
                    <option value="lobato">Monteiro Lobato</option>
                    <option value="maas">Sarah J. Maas</option>
                    <option value="malala">Malala Yousafzai</option>
                    <option value="malerman">Josh Malerman</option>
                    <option value="mandela">Nelson Mandela</option>
                    <option value="manson">Mark Manson</option>
                    <option value="mckeown">Greg McKeown</option>
                    <option value="michaelides">Alex Michaelides</option>
                    <option value="mlodinow">Leonard Mlodinow</option>
                    <option value="moyes">Jojo Moyes</option>
                    <option value="mukherjee">Siddhartha Mukherjee</option>
                    <option value="nicholls">David Nicholls</option>
                    <option value="barack_obama">Barack Obama</option>
                    <option value="michelle_obama">Michelle Obama</option>
                    <option value="oakley">Colleen Oakley</option>
                    <option value="oleary">Beth O'Leary</option>
                    <option value="orwell">George Orwell</option>
                    <option value="owens">Delia Owens</option>
                    <option value="pilkey">Dav Pilkey</option>
                    <option value="reid">Taylor Jenkins Reid</option>
                    <option value="rothfuss">Patrick Rothfuss</option>
                    <option value="rowling">J.K. Rowling</option>
                    <option value="ryan">Anthony Ryan</option>
                    <option value="saint_exupery">Antoine de Saint-Exupéry</option>
                    <option value="salinger">J.D. Salinger</option>
                    <option value="saramago">José Saramago</option>
                    <option value="sittenfeld">Curtis Sittenfeld</option>
                    <option value="sparks">Nicholas Sparks</option>
                    <option value="tolstoi">Liev Tolstói</option>
                    <option value="tolkien">J.R.R. Tolkien</option>
                    <option value="twain">Mark Twain</option>
                    <option value="westover">Tara Westover</option>
                    <option value="welch">Jenna Evans Welch</option>
                    <option value="ziraldo">Ziraldo</option>
                    <option value="zusak">Markus Zusak</option>
                </select>
                
                <select name="categoria" aria-label="Categoria">
                    <option value="" selected disabled>Categoria</option>
                    <option value="classica">Literatura Clássica</option>
                    <option value="romance">Romance</option>
                    <option value="ficcao_contemporanea">Ficção Contemporânea</option>
                    <option value="misterio">Mistério / Thriller</option>
                    <option value="ficcao_cientifica">Ficção Científica</option>
                    <option value="fantasia">Fantasia</option>
                    <option value="desenvolvimento_pessoal">Desenvolvimento Pessoal</option>
                    <option value="biografias">Biografias / Memórias</option>
                    <option value="literatura_infantil">Literatura Infantil</option>
                    <option value="nao_ficcao">Não-Ficção / História</option>
                </select>
                
                <select name="materia" aria-label="Matéria">
                    <option value="" selected disabled>Matéria</option>
                    <option value="sociologia">Sociologia</option>
                    <option value="psicologia">Psicologia</option>
                    <option value="historia">História</option>
                    <option value="ciencias">Ciências</option>
                    <option value="filosofia">Filosofia</option>
                </select>
                
                <select name="etiqueta" aria-label="Etiqueta">
                    <option value="" selected disabled>Etiqueta</option>
                    <option value="lancamento">Lançamento</option>
                    <option value="promocao">Promoção</option>
                </select>
                
                <select name="editorial" aria-label="Editorial">
                    <option value="" selected disabled>Editorial</option>
                    <option value="senac">Senac</option>
                </select>
                
                <select name="publicacao" aria-label="Ano de Publicação">
                    <option value="" selected disabled>Ano de publicação</option>
                    <option value="2020">2020</option>
                    <option value="2019">2019</option>
                    <option value="2018">2018</option>
                    <option value="2017">2017</option>
                    <option value="2016">2016</option>
                    <option value="2015">2015</option>
                    <option value="2014">2014</option>
                    <option value="2013">2013</option>
                    <option value="2012">2012</option>
                    <option value="2011">2011</option>
                    <option value="2010">2010</option>
                    <option value="2009">2009</option>
                    <option value="2008">2008</option>
                    <option value="2007">2007</option>
                    <option value="2006">2006</option>
                    <option value="2005">2005</option>
                    <option value="2004">2004</option>
                    <option value="2001">2001</option>
                    <option value="1999">1999</option>
                    <option value="1997">1997</option>
                    <option value="1996">1996</option>
                    <option value="1995">1995</option>
                    <option value="1994">1994</option>
                    <option value="1991">1991</option>
                    <option value="1989">1989</option>
                    <option value="1988">1988</option>
                    <option value="1985">1985</option>
                    <option value="1984">1984</option>
                    <option value="1980">1980</option>
                    <option value="1967">1967</option>
                    <option value="1965">1965</option>
                    <option value="1963">1963</option>
                    <option value="1960">1960</option>
                    <option value="1955">1955</option>
                    <option value="1954">1954</option>
                    <option value="1951">1951</option>
                    <option value="1950">1950</option>
                    <option value="1949">1949</option>
                    <option value="1947">1947</option>
                    <option value="1943">1943</option>
                    <option value="1937">1937</option>
                    <option value="1936">1936</option>
                    <option value="1932">1932</option>
                    <option value="1925">1925</option>
                    <option value="1920">1920</option>
                    <option value="1915">1915</option>
                    <option value="1898">1898</option>
                    <option value="1884">1884</option>
                    <option value="1877">1877</option>
                    <option value="1865">1865</option>
                    <option value="1847">1847</option>
                    <option value="1813">1813</option>
                </select>
                
                <select name="idioma" aria-label="Idioma">
                    <option value="" selected disabled>Idioma</option>
                    <option value="pt">Português</option>
                    <option value="en">Inglês</option>
                    <option value="es">Espanhol</option>
                </select>
                
            </form>
        </div>
        
        <section class="book-grid">
            
            <div class="book-item"><img src="caminho/para/cem_anos_de_solidao.jpg" alt="Cem Anos de Solidão"></div>
            <div class="book-item"><img src="caminho/para/o_grande_gatsby.jpg" alt="O Grande Gatsby"></div>
            <div class="book-item"><img src="caminho/para/ensaio_sobre_a_cegueira.jpg" alt="Ensaio sobre a Cegueira"></div>
            <div class="book-item"><img src="caminho/para/a_metamorfose.jpg" alt="A Metamorfose"></div>
            <div class="book-item"><img src="caminho/para/o_sol_e_para_todos.jpg" alt="O Sol é para Todos"></div>
            
            <div class="book-item"><img src="caminho/para/a_culpa_e_das_estrelas.jpg" alt="A Culpa é das Estrelas"></div>
            <div class="book-item"><img src="caminho/para/verity.jpg" alt="Verity"></div>
            <div class="book-item"><img src="caminho/para/o_silencio_dos_inocentes.jpg" alt="O Silêncio dos Inocentes"></div>
            <div class="book-item"><img src="caminho/para/a_garota_no_trem.jpg" alt="A Garota no Trem"></div>
            <div class="book-item"><img src="caminho/para/orgulho_e_preconceito.jpg" alt="Orgulho e Preconceito"></div>

            <div class="book-item"><img src="caminho/para/duna.jpg" alt="Duna"></div>
            <div class="book-item"><img src="caminho/para/neuromancer.jpg" alt="Neuromancer"></div>
            <div class="book-item"><img src="caminho/para/o_senhor_dos_aneis.jpg" alt="O Senhor dos Anéis"></div>
            <div class="book-item"><img src="caminho/para/o_poder_do_habito.jpg" alt="O Poder do Hábito"></div>
            <div class="book-item"><img src="caminho/para/sapiens.jpg" alt="Sapiens"></div>

        </section>
    </main>


<?= loadPartial('footer') ?>    
