  
        // Instance  Component To Routes 
        const routes = [
            {path: '/', component : Home},
            {path: '/about', component : About},
            {path: '/kelas' , component : Kelas},
            {path: '/kelas/:id' , component : DetailKelas},
            {path: '*' , component : NotFound},
        ]

        // Instance Routes To Router
        const router = new VueRouter({
            mode: 'history',
            routes
        }) 
