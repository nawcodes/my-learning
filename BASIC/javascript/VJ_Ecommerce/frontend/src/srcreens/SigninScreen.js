const SigninScreen = {
    after_render: () => {},
    render: () => {
        return `
        <div class="form-container">
            <form id="signin-form">
                <ul class="form-items">
                    <li>
                        <h1>Sign-in</h1>
                    </li>
                    <li>
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" />
                    </li>
                    <li>
                        <label for="password">password</label>
                        <input type="password" id="password" name="password" />
                    </li>
                    <li><button class="primary" type="submit">Signin</button></li>
                    <li>
                        <div>
                            New User? 
                            <a href="/#/register" >Create Your Account</a>
                        </div>
                    </li>
                </ul>
            </form>
        </div>
        `
    }
};

export default SigninScreen;
