<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <ul class="nav nav-pills" style="background-color: #fcfcfc;">
                <li class="active"><a data-toggle="pill" href="#candidateLogin">Candidate Login</a></li>
                <li><a data-toggle="pill" href="#empLogin">Employer Login</a></li>
            </ul>
            <div class="tab-content">
                <div id="candidateLogin" class="tab-pane fade in active">
                    <div class="modal-body" style="padding:40px 50px;">
                        <form action="login.php" method="post" name="login" role="form">
                            <div class="form-group">
                                <label for="usrname"><span class="glyphicon glyphicon-user"></span> Email ID</label>
                                <input type="text" class="form-control" name="email" placeholder="Enter email" required>
                            </div>
                            <div class="form-group">
                                <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Enter password" required>
                            </div>
                            <div class="checkbox">
                                <p>Forgot <a href="candidateForgetPassword.php">Password?</a></p>
                            </div>
                            <button type="submit" class="btn btn-success btn-block" name="candidateLoginSubmit"><span class="glyphicon glyphicon-off"></span> Login</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <p>Not a member? <a href="candidateRegistration.php">Sign Up</a></p>
                    </div>
                </div>
                <div id="empLogin" class="tab-pane fade">
                    <div class="modal-body" style="padding:40px 50px;">
                        <form action="emplogin.php" method="post" name="login" role="form">
                            <div class="form-group">
                                <label for="usrname"><span class="glyphicon glyphicon-user"></span> Email ID</label>
                                <input type="text" class="form-control" id="usrname" name="email" placeholder="Enter email" required>
                            </div>
                            <div class="form-group">
                                <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
                                <input type="password" class="form-control" id="psw" name="password" placeholder="Enter password" required>
                            </div>
                            <div class="checkbox">
                                <p>Forgot <a href="employerForgetPassword.php">Password?</a></p>
                            </div>
                            <button type="submit" class="btn btn-success btn-block" name="empLoginSubmit"><span class="glyphicon glyphicon-off"></span> Login</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <p>Not a member? <a href="employerRegistration.php">Sign Up</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
