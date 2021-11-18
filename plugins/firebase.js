import firebase from 'firebase'

if (!firebase.apps.length) {
  firebase.initializeApp(
    {
      apiKey: "AIzaSyAuUzbrloC5TnCCAxR1FhP4FlL5ZlAh2Ro",
      authDomain: "twitter-df5a8.firebaseapp.com",
      projectId: "twitter-df5a8",
      storageBucket: "twitter-df5a8.appspot.com",
      messagingSenderId: "694867639788",
      appId: "1:694867639788:web:f3fb2adc0507412f7e54c9",
      measurementId: "G-67V77CHG4L"
    }
  )
}
  
export default firebase