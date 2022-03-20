 // Import the functions you need from the SDKs you need
  
  // TODO: Add SDKs for Firebase products that you want to use
  // https://firebase.google.com/docs/web/setup#available-libraries

  // Your web app's Firebase configuration
  const firebaseConfig = {
    apiKey: "AIzaSyB05qkATBpI7Laz5J022E2VXDaElkjWTtw",
    authDomain: "vue-basic-98dcb.firebaseapp.com",
    databaseURL: "https://vue-basic-98dcb-default-rtdb.firebaseio.com",
    projectId: "vue-basic-98dcb",
    storageBucket: "vue-basic-98dcb.appspot.com",
    messagingSenderId: "995066901790",
    appId: "1:995066901790:web:ef19c6c62dd44cda44c50f"
  };

  const app = firebase.initializeApp(firebaseConfig);
  const database = firebase.database();
  const kelasRef = database.ref('kelas');
