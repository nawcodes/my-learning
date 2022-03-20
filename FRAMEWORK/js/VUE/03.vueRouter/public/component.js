 // Routes Component 
            // Nav Component
            const Home = {template : '<div> Home </div>'}  
            const About = {template : '<div> About </div>'}  
            const NotFound = {template : '<div> Page its not found! </div>'}  
            const DetailKelas = {
                template : `
                <div> Detail kelas! 
                    <template v-if="detailKelas">
                <p>uuid - {{$route.params.id}}</p>
                <p>name - {{detailKelas.name}} </p>
                <p>description - {{detailKelas.description}} </p>
                <p>image - <img :src="urlImage(detailKelas.photo)" /> {{detailKelas.photo}} </p> 
                <router-link to="/kelas">kembali</router-link>   
                    </template>
                <p v-else>Kelas Tidak Ditemukan.</p>
                </div>`,
                data() {
                    return {
                        detailKelas: {}
                    }
                },
                created() {
                    this.filterKelas();
                },
                methods: {
                    filterKelas() {
                        let kelas = JSON.parse(localStorage.getItem('kelas'));
                        let id = this.$route.params.id;
                        let rowKelas = database.ref('kelas/' + id);
                        rowKelas.on('value', (item) => {
                            // console.log(item.val());
                            this.detailKelas = item.val();
                        })
                        // let filtered = kelas.filter(k => k.id == id);
                        // console.log(filtered); return array
                    },
                    urlImage  : function(urlImage) {
                        return urlImage ? '../image/' + urlImage : '';
                    }
                }
            }  
            const Kelas = {
                props: ['name', 'kelas'],
                template: `
                <article id="section">
                    <div>
                        <h1>Add Class Feature</h1>
                        <form v-on:submit.prevent="submitkelas">
                            <div>
                                <label For="kelas">Judul:</label>
                                <input type="text" v-model="newkelas.name" name="name" id="name">
                                <small class="error" v-if="error.name">{{error.name}}</small>    
                            </div>    
                            <div>
                                <label For="deskripsi">Deskripsi:</label>
                                <textarea v-model="newkelas.description" name="description" id="description"></textarea>
                                <small class="error" v-if="error.description">{{error.description}}</small>    
                            </div>    
                            <div>
                                <img :src="previewimage" v-if="previewimage" width="200"/>
                                <label For="kelas">Photo:</label>
                                <input type="file" ref="photo" v-on:change="upload" name="photo" id="photo">    
                            </div>
                            <button type="submit" >Submit</button>     
                            
                        </form>
                        <div class="theory">
                            <ul>
                                <li v-for="(c, index) in kelas">
                                    <img :src="'image/' + c.photo" v-if="c.photo" width="150"/>
                                    <p>{{index+1}} - {{ c.name }} <a href="#" v-on:click.prevent="$emit('hapuskelas', c.id)"> Delete</a></p> 
                                    <router-link :to="'kelas/' + c.id ">Lihat kelas</router-link>
                                </li>
                            </ul>
                        </div>
                        <hr>
                    </div>
                </article>
                `,
                data: function() {
                    return {
                        newkelas : {
                            name: '',
                            description: '',
                            photo: ''
                        },
                        previewimage: '',
                        error: {
                            name: '',
                            description: '',
                        }
                    }
                },
                methods: {
                    submitkelas: function(e) {
                        this.error.name = '';
                        this.error.description = '';


                        if(this.newkelas.name == '') {
                            this.error.name = 'The name of class is required.';
                        }

                        if(this.newkelas.description == '') {
                            this.error.description = "The description field is required.";
                        } 


                        if(this.newkelas.name && this.newkelas.description) {
                        // console.log(this.newkelas);
                        const data = {
                            id: uuidv4(),
                            name: this.newkelas.name,
                            description: this.newkelas.description,
                            photo: this.newkelas.photo,
                        }
                        this.$emit('submitkelas', data);
                        this.newkelas.name = "";
                        this.newkelas.description = "";
                        this.newkelas.photo = "";
                        this.previewimage = "";
                        this.$refs.photo.value = "";

                        }
                    },
                    upload: function(e) {
                        const imageName = e.target.files[0].name;
                        this.newkelas.photo = imageName;
                        this.previewimage = URL.createObjectURL(e.target.files[0]);
                    }
                }
            }  
        // End Routes Component


        Vue.component('header-component' , {
            template: `
                <header>
                <img src="image/logo.png" width="80" alt="" style="">
                <h1>{{ title }}</h1>
                </header>
            `,
            // data must be a function!!!!!!
            data: function() {
                return {
                    title: 'Hello Router In Vue 2', 
                }
            }
        })

        var footerComponent = {
            template: `
            <footer id="footer">
                <p>Copy Right Reserverd <slot></slot></p> 
            </footer>
            `
        } 