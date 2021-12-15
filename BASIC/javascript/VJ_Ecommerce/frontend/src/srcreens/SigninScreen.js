import { signin } from "../api";
import { getUserInfo, setUserInfo } from "../localStorage";
import { hideLoading, showLoading, showMessage } from "../utils";

const SigninScreen = {
    after_render: () => {
        document.getElementById('signin-form').addEventListener('submit', async (e) => {
            e.preventDefault();
            showLoading();
            const data = await signin({
                email: document.getElementById('email').value,
                password: document.getElementById('password').value
            });
            hideLoading();
            if(data.error) {
                showMessage(data.error);
            } else { 
                setUserInfo(data);
                document.location.hash = "/"; 
            }
        });        
    },
    render: () => {
        if(getUserInfo().name) {
            document.location.hash = '/';
        }
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
