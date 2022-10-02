const DashboardMenu = {
    render: (props) => {
        return `
        <div class="dashboard-menu">
            <ul>
                <li>
                    <a href="/#/dashboard" class="${props.selected === 'dashboard' ? 'selected' : ''}">Dashboard</a>
                </li>
                <li>
                 <a href="/#/orderslist" class="${props.selected === 'orders' ? 'selected' : ''}">Orders</a>
                </li>
                <li>
                    <a href="/#/productlist" class="${props.selected === 'products' ? 'selected' : ''}">Products</a>
                </li>
            </ul>
        </div>
        `
    },
}

export default  DashboardMenu;