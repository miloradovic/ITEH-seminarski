const axios = require('axios');

const urlGet = 'http://treci_zadatak.test/rest/tablice.json';

axios.get(urlGet)
.then( res => console.log(res.data))


let params = {
  idVlasnik: 2,
  idVozilo: 13,
  tablica: "JA-023-SD"
}

const urlPost = 'http://treci_zadatak.test/rest/tablice/';
/*
axios.post(urlPost, params)
.then(res => console.log(res.data))
.catch(err => console.log(err))
*/