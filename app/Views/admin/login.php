<style>
  * {
	margin: 0;
	padding: 0;
	font-family: Arial;
}
.loginform {
    background: #ffffff;
    width: 450px;
    color: #4caf50;
	  left:50%;
		margin-top:28%;
    position: absolute;
    transform: translate(-50%,-50%);
    box-sizing: border-box;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0px 10px 29px 0px #e0e0e0;
}
.loginform h2 {
    font-size: 30px;
    margin: 30px 0px;
    text-transform: uppercase;
    font-weight: normal;
    text-align: center;
}
.loginform input{
    width: 100%;
    margin-bottom: 30px;
}
.loginform input[type="text"], input[type="password"]
{
    border: none;
    border-bottom: 1px solid #1e5220;
    background: transparent;
    outline: none;
    height: 40px;
    color: #333;
    font-size: 16px;
}
.loginform input[type="submit"] {
    background: #4CAF50;
    color: #fff;
    font-size: 20px;
    padding: 10px;
    border-radius: 5px;
    transition: 0.4s;
    border: none;
	  margin-bottom:5px;
}
.loginform input[type="submit"]:hover {
    cursor: pointer;
    background: #1f5822;
}
.loginform a {
    text-decoration: none;
    font-size: 15px;
    line-height: 20px;
    color: #1e5220;
}
.loginform .have-not {
    float: right;
}
.loginform a:hover {
    color: #4caf50;
}

/*-- Responsive CSS --*/
@media(max-width: 576px) {
.loginform {
    width: 90%;
}
.loginform a {
    display: block;
    text-align: center;
    float: inherit !important;
    margin: 10px 0px;
}
}
</style>
<div class="loginform">
        <h2>Login</h2>
        <form action="<?= site_url('admin/login') ?>" method="post" autocomplete="off">
            <input type="hidden" name="login_attempt" value="1">
            <p>Email</p>
            <input type="text" required name="email" placeholder="Email">
            <p>Password</p>
            <input type="password" required name="password" placeholder="Password">
            <input type="submit" name="login-btn" value="Login">
            <a href="#">Forgot your password?</a>
        </form>
    </div>
</body>
</html>