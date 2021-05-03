
                            /*
                            * Array con las imagenes que se iran mostrando en la web
                            */
                            var imgMision=new Array(
                                'imgScriptMision/1.jpg',
                                'imgScriptMision/2.jpg',
                                'imgScriptMision/3.jpg',
                                'imgScriptMision/4.jpg',
                                'imgScriptMision/5.jpg'
                            );
                         
                            /**
                            * Funcion para cambiar la imagen
                            */
                            function rotarImgMision()
                            {
                                // obtenemos un numero aleatorio entre 0 y la cantidad de imagenes que hay
                                var indexxx=Math.floor((Math.random()*imgMision.length));
                         
                                // cambiamos la imagen
                                document.getElementById("imagen").src=imgMision[indexxx];
                            }
                         
                            /*
                            * Función que se ejecuta una vez cargada la página
                            */
                            onload=function()
                            {
                                // Cargamos una imagen aleatoria
                                rotarImgMision();
                         
                                // Indicamos que cada 3 segundos cambie la imagen
                                setInterval(rotarImgMision,3000);
                            }
                       