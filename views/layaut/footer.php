                                <!-- footer -->
                                <!-- ============================================================== -->
                                <footer class="footer text-center text-muted">
                                    All Rights Reserved by Decimo Escalón. Designed and Developed by <a href="https://www.bithives.com/">Bithives Technologies</a>.
                                    <div id="resultado" style="display: none;"></div>
                                </footer>
                                <!-- ============================================================== -->
                                <!-- End footer -->
                                <!-- ============================================================== -->
                            </div>
                            <!-- ============================================================== -->
                            <!-- End Page wrapper  -->
                            <!-- ============================================================== -->
                        </div>
                        <!-- ============================================================== -->
                        <!-- End Wrapper -->
                        <!-- ============================================================== -->
                        <!-- End Wrapper -->
                        <!-- ============================================================== -->
                        <!-- All Jquery -->
                        <!-- ============================================================== -->
                        <script src="assets/libs/jquery/dist/jquery.min.js"></script>
                        <script src="assets/extra-libs/taskboard/js/jquery.ui.touch-punch-improved.js"></script>
                        <script src="assets/extra-libs/taskboard/js/jquery-ui.min.js"></script>
                        <script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
                        <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
                        <!-- apps -->
                        <script src="assets/dist/js/app-style-switcher.js"></script>
                        <script src="assets/dist/js/feather.min.js"></script>
                        <script src="assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
                        <script src="assets/dist/js/sidebarmenu.js"></script>
                        <!--Custom JavaScript -->
                        <script src="assets/dist/js/custom.min.js"></script>
                        <!--This page JavaScript -->
                        <script src="assets/libs/moment/min/moment.min.js"></script>
                        <script src="assets/libs/fullcalendar/dist/fullcalendar.min.js"></script>
                        <script src="assets/dist/js/pages/calendar/cal-init.js"></script>
                        <script src="assets/dist/js/mijs.js"></script>
                        <script src="assets/dist/js/buscar.js"></script>
                        <script src="assets/dist/js/app.js"></script>
                        <script src="assets/dist/js/network.js"></script>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/locale/es-mx.min.js" integrity="sha512-Qy4cmZ6v7vnVEc0cn/BIj9q15eB98do4hMvu8xtc/H+v+YYpdpDrB35flHS3NPLbZUpe1npSYY/u+Gi3UB61vw==" crossorigin="anonymous"></script>
                        <script src="assets/dist/js/horas.js"></script>

                        <script>

                            const url = "http://localhost:8080/segundapuesta.shop/decimoescalon";

                            if(Notification.permission !== 'granted'){
                                Notification.requestPermission().then(permission => {
                                    if(permission === 'granted'){
                                        alert('Empezaras a recibir notificaciones.');
                                    }else if(permission === 'denied'){
                                        alert('No recibiras notificaciones y te perderas de la experiencia de la red social de Decimo Escalon');
                                    }
                                });
                            }
                                
                            function showNotification(){
                                let boton = document.getElementById('compartir-cata');
                                let nombre = boton.dataset.name; 
                                if(Notification.permission === 'granted'){
                                    const notification = new Notification(nombre + ' acaba de compartir una nueva cata!!', {
                                        body: 'Puedes ver la cata dando click en esta notificacion, no olvides iniciar sesion.',
                                        icon: url + '/assets/images/fondo.jpg'
                                    });

                                    notification.onclick = (e) => {
                                        window.location.href = 'https://www.decimoescalon.club/calificavino/network.php';
                                    }
                                }
                            }

                            function showNotificationDos(){
                                let boton = document.getElementById('btn-like');
                                let userPublic = boton.dataset.uspu;
                                let user = boton.dataset.user;
                                if(Notification.permission === 'granted'){
                                    const notification = new Notification(user + ' acaba de dar like a la publicacion de ' + userPublic, {
                                        body: 'Puedes ver la cata dando click en esta notificacion, no olvides iniciar sesion.',
                                        icon: url + '/assets/images/fondo.jpg'
                                    });

                                    notification.onclick = (e) => {
                                        window.location.href = 'https://www.decimoescalon.club/calificavino/network.php';
                                    }
                                }
                            }
                        </script>
                    </body>

                </html>