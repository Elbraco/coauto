// renvoie la valeur associé à la clé
function loadDataFromDomStorage(name) {
    
    let jsonData;
    // contient le nom de la clé 
    jsonData = window.localStorage.getItem(name);
    return JSON.parse(jsonData);
}

// ajout a l'emplacement de stockage
function saveDataToDomStorage(name, data) {
    let jsonData;

    jsonData = JSON.stringify(data);
    
    // stockage
    window.localStorage.setItem(name, jsonData);
}