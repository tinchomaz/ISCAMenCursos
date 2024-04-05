
<?php
    function desplegarCurso($mostrar, $id, $categoria, $titulo, $autor, $imagencurso, $descripcion, $cantidadModulos, $palabrasClave){
            //Cursos de la pagina actual
            if($mostrar){ ?>
                    <div class="row rowCurso">
                            <div class="col-12 cardCurso">
                                <div class="card">
                                    <div class="holder">
                                        <div class="card-horizontal">
                                            <div class="contenedorImg">
                                                <button class="botonFav" onclick="favUnfav(this)" data-id="<?php echo $id ?>" data-favorito="false">
                                                    <img class="fav" src="
                                                        <?php 
                                                            echo "imagenes/iconos/unfav.svg";
                                                        ?>
                                                    ">
                                                </button>
                                                <div class="infoMobile autor"><img src="imagenes/iconos/autorMobile.svg"> <?php echo $autor ?> </div>
                                                <div class="infoMobile"><img src="imagenes/iconos/modulosMobile.svg"> Duración: <?php echo $cantidadModulos ?> Módulos </div>
                                                <a href="curso.php?idcurso=<?php echo $id ?>">
                                                    <img class="cursosImg" src="<?php echo $imagencurso ?>" alt="">
                                                </a>
                                            </div>
                                            <div class="card-body">
                                                <div class="categoria"><?php echo $categoria ?></div>
                                                    <span class="tituloCurso"><?php echo $titulo ?></span>
                                                    <div class="card-text descripcionCurso "><?php echo $descripcion ?></div>
                                                <div>
                                                    <div class="d-flex cardAdicional">
                                                        <div class="duracion-autor">
                                                            <img src="imagenes/iconos/modulos.svg" alt="" class="iconosCursos">
                                                            Duración: <?php echo $cantidadModulos ?> Modulos 
                                                        </div>
                                                        <div class="autorCurso">
                                                            <img src="imagenes/iconos/autor.svg" alt="" class="iconosCursos">
                                                            <?php echo $autor ?>
                                                        </div>
                                                    </div>
                                                    <div class="cardAdicional">
                                                        <img src="imagenes/iconos/pClaves.svg" alt="" class="iconosCursos">
                                                        <?php $palabrasArray = explode(",", $palabrasClave); // Divide la cadena en un array usando el espacio como delimitador
                                                                foreach ($palabrasArray as $palabra) {
                                                                echo '<span class="palabrasClave">' . $palabra . '</span>';
                                                                echo "&nbsp";
                                                                } ?>
                                                    </div>
                                                </div>
                                                <button class="btn botonCursos" onclick="paginaCurso(<?php echo $id ?>)">Iniciar</button>
                                            </div>
                                        </div>
                                        <button class="btn botonCursosMobile" onclick="paginaCurso(<?php echo $id ?>)">Iniciar</button>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <script>
                        function paginaCurso(id) {
                            window.location.href = 'php/curso.php?idcurso=' + id;
                        }
                    </script> 
        <?php }
            //Cursos de otras paginas para mostrar por el buscador
            else{ ?>
                    <div class='row rowCurso ocultos' style="display: none;">
                        <div class="col-12 cardCurso">
                            <div class="card">
                                <div class="card-horizontal">
                                    <div class="contenedorImg">
                                        <button class="botonFav" onclick="favUnfav(this)" data-id="<?php echo $id ?>" data-favorito="false">
                                            <img class="fav" src="
                                                <?php 
                                                    echo "imagenes/iconos/unfav.svg";
                                                ?>
                                            ">
                                        </button>
                                        <div class="infoMobile autor"><img src="imagenes/iconos/autorMobile.svg"> <?php echo $autor ?> </div>
                                        <div class="infoMobile"><img src="imagenes/iconos/modulosMobile.svg"> Duración: <?php echo $cantidadModulos ?> Módulos </div>
                                        <a href="curso.php?idcurso=<?php echo $id ?>">
                                            <img class="cursosImg" src="<?php echo $imagencurso ?>" alt="">
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <div class="categoria"><?php echo $categoria ?></div>
                                            <span class="tituloCurso"><?php echo $titulo ?></span>
                                            <div class="card-text descripcionCurso "><?php echo $descripcion ?></div>
                                        <div class="d-flex cardAdicional">
                                            <div class="duracion-autor">
                                                <img src="imagenes/iconos/modulos.svg" alt="" class="iconosCursos">
                                                Duración: <?php echo $cantidadModulos ?> Modulos 
                                            </div>
                                            <div class="autorCurso">
                                                <img src="imagenes/iconos/autor.svg" alt="" class="iconosCursos">
                                                <?php echo $autor ?>
                                            </div>
                                        </div>
                                        <div class="cardAdicional">
                                            <img src="imagenes/iconos/pClaves.svg" alt="" class="iconosCursos">
                                            <?php $palabrasArray = explode(",", $palabrasClave);// Divide la cadena en un array usando el espacio como delimitador
                                                    foreach ($palabrasArray as $palabra) {
                                                    echo '<span class="palabrasClave">' . $palabra . '</span>';
                                                    echo "&nbsp";
                                                    } ?>
                                        </div>
                                        <button class="btn botonCursos" onclick="paginaCurso(<?php echo $id ?>)">Iniciar</button>
                                    </div>
                                    <button class="btn botonCursosMobile" onclick="paginaCurso(<?php echo $id ?>)">Iniciar</button>
                                </div>
                            </div>
                        </div>
                    </div>
    <script>
        function paginaCurso(id) {
            window.location.href = 'curso.php?idcurso=' + id;
        }
    </script>
            <?php }
    }
?>