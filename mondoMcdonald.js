let token;


function onTokenJson(json) {
  console.log(json);
  token = json.access_token;
}


function onTokenResponse(response) {
  return response.json();
}


function ricerca2(event) {
  event.preventDefault();
  
  fetch('https://api.spotify.com/v1/users/zya0l5dksom8ovpiqduo4vpvu/playlists', {
    headers: {
      'Authorization': 'Bearer ' + token
    }
  }).then(onResponse_T).then(onJson_T);
}


function onJson_T(json) { 
  console.log('Json ricevuto');
  console.log(json);
  const soundtrack = document.querySelector('#soundtrack');
  soundtrack.innerHTML = '';

  const results = json.items;
  let num_results = results.length;
  if (num_results > 6) num_results = 6;
  for (let i = 0; i < num_results; i++) {
    const element = results[i];
    const title = element.name;
    const selected_image = element.images[0].url;
    const playlist = document.createElement('div');
    const album_img = document.createElement('img');
    const name = document.createElement('p');
    const link = document.createElement('a');
    playlist.classList.add('playlist');
    album_img.src = selected_image;
    link.setAttribute('href', element.external_urls.spotify);
    link.textContent = title;
    
    playlist.appendChild(album_img);
    playlist.appendChild(name);
    playlist.appendChild(link);
    soundtrack.appendChild(playlist);
  }
}

function onResponse_T(response) {
  console.log('Risposta ricevuta');
  return response.json();
}


fetch('fetch_spotify.php')
  .then(onTokenResponse)
  .then(onTokenJson);

const form2 = document.querySelector('#bottone');
form2.addEventListener('click', ricerca2);


/*tendina*/
function clickmenu(event) {
  
  const details = document.querySelector('#tendina');

  const galleriaTendina=document.querySelectorAll('#tendina a');
  isVisible = !isVisible;
  if (isVisible) {
    details.classList.remove('hidden');
    for(let i=0;i<galleriaTendina.length;i++){
    galleriaTendina[i].classList.remove('hidden');
    }
  } else {
    details.classList.add('hidden');
    for(let i=0;i<galleriaTendina.length;i++){
      galleriaTendina[i].classList.add('hidden');
      }
    detailToggle.classList.remove('hidden');
  }
}
let isVisible = false;

const menu = document.querySelector('#menu');
menu.addEventListener('click', clickmenu);