<!--Start Footer-->
<footer class="container-fluid bg-dark text-center p-2">
        <small class="text-white">Copyright &copy; 2021 || 
            Designed By SMS || <a href="#login" target="_blank" data-toggle="modal" 
            data-target="#adminLoginModalCenter">Admin Login</a></small>
    </footer>
    <!--End Footer-->


    <!--Start Registration Model-->

    <!-- Modal -->
    <div class="modal fade" id="stuRegModalCenter" tabindex="-1" aria-labelledby="stuRegModalCenter" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="stuRegModalCenter">Student Registration</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Start Student Registration-->
                    <?php
                    include('./studentRegistartion.php');
                    ?>
                    <!-- End Student Registration-->
                </div>
                <div class="modal-footer">
                    <span id="successMsg"></span>
                    <button type="button" class="btn btn-primary" id="signup" onclick="addStu()">Sign Up</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>
    <!--End Registration Model-->


     <!--Start Log In Model-->

    <!-- Modal -->
    <div class="modal fade" id="stuLoginModalCenter" tabindex="-1" aria-labelledby="stuLoginModalCenter" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="stuLoginModalCenter">Student LogIn</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Start Student Log in-->
                    <form id="stuLoginForm">
                        <div class="form-group">
                            <i class="fas fa-envelope"></i>
                            <label for="stuLogemail" class="pl-2 font-weight-bold">Email</label>
                            <input type="email" class="form-control" id="stuLogemail" name="stuLogemail" placeholder="E-mail"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <i class="fas fa-key"></i><label for="stuLogpass"
                                class="pl-2 font-weight-bold">Password</label>
                            <input type="password" class="form-control" name="stuLogpass" id="stuLogpass"
                                placeholder="Password">
                        </div>
                    </form>
                    <!-- End Student log In-->
                </div>
                <div class="modal-footer">
                <small id="statusLogMsg"></small>
                    <button type="button" class="btn btn-primary" id="stuLoginBtn" onclick="checkStuLogin()">Log In</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>

                </div>
            </div>
        </div>
    </div>
    <!--End Log In Model-->


     <!--Start Admin Log In Model-->

    <!-- Modal -->
    <div class="modal fade" id="adminLoginModalCenter" tabindex="-1" aria-labelledby="adminLoginModalCenter" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="adminLoginModalCenter">Admin LogIn</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Start Admin Log in-->
                    <form id="adminLoginForm">
                        <div class="form-group">
                            <i class="fas fa-envelope"></i>
                            <label for="adminLogemail" class="pl-2 font-weight-bold">Email</label>
                            <input type="email" class="form-control" id="adminLogemail" name="adminLogemail" placeholder="E-mail"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <i class="fas fa-key"></i><label for="adminLogpass"
                                class="pl-2 font-weight-bold">Password</label>
                            <input type="password" class="form-control" name="adminLogpass" id="adminLogpass"
                                placeholder="Password">
                        </div>
                    </form>
                    <!-- End Admin log In-->
                </div>
                <div class="modal-footer">
                <small id="statusAdminLogMsg"></small>
                    <button type="button" class="btn btn-primary" id="adminLoginBtn" onclick="checkAdminLogin()">Log In</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>

                </div>
            </div>
        </div>
    </div>
    <!--End Admin Log In Model-->

<!-- Jquery and Bootstrap JavaScript -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
<!-- Font Aesome JS -->
    <script src="assets/js/all.min.js"></script>

<!-- Student Ajax Call Javascript -->
<script type="text/javascript" src="assets/js/ajaxrequest.js"></script>

<!-- Admin Ajax Call Javascript -->
<script type="text/javascript" src="assets/js/adminrequest.js"></script>
</body>

</html>