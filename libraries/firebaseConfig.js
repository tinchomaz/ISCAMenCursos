
var firebaseConfig = {
  apiKey: "AIzaSyAJ727hT0ZrtCsJ1Nr4-VwvupCtDGhHcxE",
  authDomain: "iscamencursos-34a62.firebaseapp.com",
  projectId: "iscamencursos-34a62",
  storageBucket: "iscamencursos-34a62.appspot.com",
  messagingSenderId: "135230043671",
  appId: "1:135230043671:web:6fd60ecf1a621f8fd58e52",
  measurementId: "G-T188563LL9"
};
// Initialize Firebase
firebase.initializeApp(firebaseConfig);
firebase.auth().setPersistence(firebase.auth.Auth.Persistence.SESSION)
// Firebase Authentication
var providerGoogle = new firebase.auth.GoogleAuthProvider();
var providerFacebook = new firebase.auth.FacebookAuthProvider();