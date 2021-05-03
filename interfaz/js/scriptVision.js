
                            /*
                            * Array con las imagenes que se iran mostrando en la web
                            */
                            var imagenes=new Array(
                                'imgScriptVision/1.jpg',
                                'imgScriptVision/2.jpg',
                                'imgScriptVision/3.jpg',
                                'imgScriptVision/4.jpg'
                            );
                         
                            /**
                            * Funcion para cambiar la imagen
                            */
                            function imgVision()
                            {
                                // obtenemos un numero aleatorio entre 0 y la cantidad de imagenes que hay
                                var index=Math.floor((Math.random()*imagenes.length));
                         
                                // cambiamos la imagen
                                imagenVi=imagenes[index];
                                document.getElementById("imagen").src = imagenVi;
                            }
                         
                            /*
                            * Función que se ejecuta una vez cargada la página
                            */
                            window.onload = function()
                            {
                                // Cargamos una imagen aleatoria
                                imgVision();
                         
                                // Indicamos que cada 3 segundos cambie la imagen
                                setInterval(imgVision,3000);
                            }
                       