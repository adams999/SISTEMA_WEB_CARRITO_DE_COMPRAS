
                            /*
                            * Array con las imagenes que se iran mostrando en la web
                            */
                            var imageness=new Array(
                                'imgScriptLogoYural/logoPrincipal1.jpg',
                                'imgScriptLogoYural/logoPrincipal2.jpg'
                            );
                         
                            /**
                            * Funcion para cambiar la imagen
                            */
                            function rotarImgLogo()
                            {
                                // obtenemos un numero aleatorio entre 0 y la cantidad de imagenes que hay
                                var indexx=Math.floor((Math.random()*imageness.length));
                         

                                document.getElementById("imagenInicio").src=imageness[indexx];
                            }
                         
                            /*
                            * Función que se ejecuta una vez cargada la página
                            */
                            window.onload=function()
                            {
                                // Cargamos una imagen aleatoria
                                rotarImgLogo();
                         
                                // Indicamos que cada 5 segundos cambie la imagen
                                setInterval(rotarImgLogo,5000);
                            }
                       