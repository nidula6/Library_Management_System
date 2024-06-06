<html>
<head>
    <title>Login</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Poppins:wght@100;300;400;500;600&display=swap');
:root {
    --green: #27ae60;
    --dark-color: #219150;
    --black: #444;
    --light-color: #666;
    --border: .1rem solid rgba(0, 0, 0, .1);
    --border-hover: .1rem solid var(--black);
    --box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .1);

}

* {
    font-family: 'poppins', sans-serif;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    outline: none;
    border: none;
    text-decoration: none;
    text-transform: capitalize;
    transition: all .2s linear;
    transition: width none;
}

html {
    font-size: 62.5%;
}

.login-form-container {
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: rgba(255, 255, 255, .9);
    position: fixed;
    top: 0;
    z-index: 10000;
    height: 100%;
    width: 100%;
}

.login-form-container form {
    background: #fff;
    border: var(--border);
    width: 40rem;
    padding: 2rem;
    box-shadow: var(--box-shadow);
    border-radius: .5rem;
    margin: 2rem;
}

.login-form-container form h3 {
    font-size: 2.5rem;
    text-transform: uppercase;
    color: var(--black);
    text-align: center;
}

.login-form-container form span {
    display: block;
    font-size: 1.5rem;
    padding-top: 1rem;
}

.login-form-container form .box {
    width: 100%;
    margin: .7rem 0;
    font-size: 1.6rem;
    border: var(--border);
    border-radius: .5rem;
    padding: 1rem 1.2rem;
    color: var(--black);
    text-transform: none;
}

.login-form-container form .checkbox {
    display: flex;
    align-items: center;
    gap: .5rem;
    padding: 1rem 0;
}

.login-form-container form .checkbox label {
    font-size: 1.5rem;
    color: var(--light-color);
    cursor: pointer;
    /*how owrks checkbox blue when hover label? */
}

.btn {
    margin-top: 1rem;
    display: inline-block;
    padding: .9rem 3rem;
    border-radius: .5rem;
    color: #fff;
    background: var(--green);
    font-size: 1.7rem;
    cursor: pointer;
    font-weight: 500;
}

.btn:hover {
    background: var(--dark-color);
}

.login-form-container form .btn {
    text-align: center;
    width: 100%;
    margin: 1.5rem 0;
}

.login-form-container form p {
    padding-top: .8rem;
    color: var(--light-color);
    font-size: 1.5rem;
}

.login-form-container form p a {
    color: var(--green);
    text-decoration: underline;
}

.login-form-container #close-login-btn {
    position: absolute;
    top: 1.5rem;
    right: 2.5rem;
    font-size: 4rem;
    color: var(--black);
    cursor: pointer;
}

.login-form-container form .error-msg {
    margin: 10px 0;
    display: block;
    background:crimson;
    color: #fff;
    border-radius: 5px;
    padding: 1px;
    font-size: 20px;
}

    </style>
</head>
<body>
<div class="login-form-container">

<div id="close-login-btn" class="fas fa-times"></div>


<form action="">
    <h3>Sign in</h3>
    <span>username</span>
    <input type="email" class="box" placeholder="enter your email" id="">
    <span>password</span>
    <input type="password" class="box" placeholder="enter your passowrd" id="">
    <div class="checkbox">
        <input type="checkbox" name="" id="remember-me">
        <label for="remember-me"> remember me </label>
    </div>
    <input type="submit" value="Sign in" class="btn">
    <p>forget password ? <a href="#">Click here</a></p>
    <p>don't have any account ? <a href="#">create one</a></p>

</form>

</div>
</body>
</html>