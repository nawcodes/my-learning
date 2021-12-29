import { getMyOrders, update } from "../api";
import { getUserInfo, setUserInfo, clearUser } from "../localStorage";
import { hideLoading, showLoading, showMessage } from "../utils";

const ProfileScreen = {
    after_render: () => {
        document.getElementById('sign-out').addEventListener('click', () => {
            clearUser();
            document.location.hash = '/';
        });
        document.getElementById('profile-form').addEventListener('submit', async (e) => {
            e.preventDefault();
            showLoading();
            const data = await update({
                name: document.getElementById('name').value,
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
    render: async () => {
        const {name, email} = getUserInfo();
        if(!name) {
            document.location.hash = '/';
        }
        const orders = await getMyOrders();
        return `
        <div class="profile">
            <div class="profile-info">
                <div class="form-container">
                        <form id="profile-form">
                            <ul class="form-items">
                                <li>
                                    <h1>User Account</h1>
                                </li>
                                <li>
                                    <label for="name">Name</label>
                                    <input type="text" id="name" name="name" value="${name}"/>
                                </li>
                                <li>
                                    <label for="email">Email</label>
                                    <input type="email" id="email" name="email"  value="${email}"/>
                                </li>
                                <li>
                                    <label for="password">password</label>
                                    <input type="password" id="password" name="password" />
                                </li>
                                <li><button class="primary" type="submit">Update</button></li>
                                <li><a class="" id="sign-out">Sign Out</a></li>  
                            </ul>
                        </form>
                </div>
            </div>
            <div class="profile-orders">
                <h2> Orders History</h2>
                <table>
                    <thead>
                        <tr>
                            <th>ORDER ID</th>
                            <th>DATE</th>
                            <th>TOTAL</th>
                            <th>PAID</th>
                            <th>DELIVERED</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        ${orders.length === 0 
                            ? `<tr><td colspan="6">No Order Found</td></tr>`   
                            : orders.map((order) =>  `<tr>
                                    <td>${order._id}</td>
                                    <td>${order.createdAt}</td>
                                    <td>${order.totalPrice}</td>
                                    <td>${order.paidAt || 'no'}</td>
                                    <td>${order.deliveredAt || 'no'}</td>
                                    <td>
                                        <a href="/#/order/${order._id}">Detail</a>
                                    </td>
                                </tr>`
                                ).join('\n')
                            }
                    </tbody>
                </table>
            </div>
        </div> 
        `;
    }
};

export default ProfileScreen;
