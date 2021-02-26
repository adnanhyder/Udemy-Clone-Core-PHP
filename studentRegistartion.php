<!-- Start Student Registration-->
<form id="stuRegForm">
    <div class="form-group">
        <i class="fas fa-user"></i><label for="stuname" class="pl-2 font-weight-bold">Name</label>
        <small id="statusMsg1"></small>
        <input type="text" class="form-control" id="stuname" name="stuname" placeholder="Name"
            aria-describedby="emailHelp">
    </div>
    <div class="form-group">
        <i class="fas fa-envelope"></i>
        <label for="stunemail" class="pl-2 font-weight-bold">Email</label>
        <small id="statusMsg2"></small>
        <input type="email" class="form-control" id="stuemail" name="stuemail" placeholder="E-mail"
            aria-describedby="emailHelp">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
            else.</small>
    </div>
    <div class="form-group">
        <i class="fas fa-key"></i><label for="stupass" class="pl-2 font-weight-bold">Password</label>
        <small id="statusMsg3"></small>
        <input type="password" class="form-control" name="stupass" id="stupass" placeholder="Password">
    </div>
</form>
<!-- End Student Registration-->