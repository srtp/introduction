// Import the functions you need from the SDKs you need
import { initializeApp } from "firebase/app";
import { getAnalytics } from "firebase/analytics";
// TODO: Add SDKs for Firebase products that you want to use
// https://firebase.google.com/docs/web/setup#available-libraries

// Your web app's Firebase configuration
// For Firebase JS SDK v7.20.0 and later, measurementId is optional
const firebaseConfig = {
  apiKey: "AIzaSyC5hLNxK-Ic0pgdXnaFWQAyt9taVVV2NSg",
  authDomain: "react-auth-ae995.firebaseapp.com",
  projectId: "react-auth-ae995",
  storageBucket: "react-auth-ae995.appspot.com",
  messagingSenderId: "904934537746",
  appId: "1:904934537746:web:517962d6cb07bd572236cb",
  measurementId: "G-HXJ7W7MK5M"
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);
const analytics = getAnalytics(app);