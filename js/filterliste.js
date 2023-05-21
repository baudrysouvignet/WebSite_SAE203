/*----------------------------------------------------------------------------------------------------------------------
Deux integration Js sont présentent sur cette pasge,
Filtre sur les listes d´eroulantes
Liste d´eroulante personnalisée avec ajout et suppression d'élément
premiere ligne de commentaired e chaque fonction comprends l'utilité

la verifications des champs est aussi présentes pour des besoins fonctionnel d'ajout de personnes.
----------------------------------------------------------------------------------------------------------------------*/

const Region = [
    {'nomRegion' : 'Bretagne', 'zone' : 'nord-ouest'},
    {'nomRegion' : 'Normandie', 'zone' : 'nord-ouest'},
    {'nomRegion' : 'Pays de loire', 'zone' : 'nord-ouest'},
    {'nomRegion' : 'Centre val de loire', 'zone' : 'nord-ouest'},
    {'nomRegion' : 'Ile de france', 'zone' : 'nord-est'},
    {'nomRegion' : 'Hauts de france', 'zone' : 'nord-est'},
    {'nomRegion' : 'Grand est', 'zone' : 'nord-est'},
    {'nomRegion' : 'Bourgongne franche compté', 'zone' : 'nord-est'},
    {'nomRegion' : 'Auvergne rhone alpes', 'zone' : 'sud-est'},
    {'nomRegion' : "Prauvence alpes cote d'azure", 'zone' : 'sud-est'},
    {'nomRegion' : 'Nouvelle aquitaine', 'zone' : 'sud-ouest'},
    {'nomRegion' : 'Occitanie', 'zone' : 'sud-ouest'}
];

/*data des amis*/

let friends = [
    {'nom': 'Sophie', 'numRegion': 2},
    {'nom': 'Antoine', 'numRegion': 2},
    {'nom': 'Marie', 'numRegion': 10},
    {'nom': 'Maxime', 'numRegion': 4},
    {'nom': 'Audrey', 'numRegion': 1},
    {'nom': 'Romain', 'numRegion': 9},
    {'nom': 'Lucie', 'numRegion': 7},
    {'nom': 'David', 'numRegion': 0}
];

/*Declaration des variables*/
const SelectRegion = document.querySelector('#addRegion')
const InputName = document.querySelector('#addName')
const button = document.querySelector('#addButton')
const filtreRegionCheck = document.querySelectorAll('.flitreCheck')
const deleteSelectOutpout = document.querySelector('#deleteUser');
const OutpoutSelect = document.querySelector('#outpoutSelect');

let nomsRegions = [];
Region.forEach(function(region) {
    nomsRegions.push(region.nomRegion);
});


/*functions*/

/**
 * Liste d´eroulante personnalisée
 * Permet d'ajouter les <option> de sont choix dans un select
 *
 * @param {object} element - Element <select> ou on ajoute lesw donnnée
 * @param {array} datas - Données a ajouter dans les options
 */
function addOption(element, ) {
    /*créer un option pour chaque élément*/
    datas.forEach(function (data, index){
        if (index === 0) {
            /*ajoute l'option cheaked au premier element*/
            element.innerHTML += '<option value="'+index+'" selected>'+data+'</option>';
        } else {
            element.innerHTML += '<option value="'+index+'">'+data+'</option>';
        }
    });
}

/**
 * Filtre liste déroulante
 * Fonction pour chercher les index des éléments friends celon des critaires
 *
 * @param {array} regions - tableau d'élément a parcourir
 * @param {string} type - data a chercher dans le taleau
 */
function trouverIndex(regions, type) {
    const indexNord = [];

    /*parcourir toute les éléments du tableau donnée*/
    for (let i = 0; i < regions.length; i++) {
        if (regions[i].zone.includes(type)) {
           /* si le mot qu'on recherche correspond a la zone alors en renvoie dans le tableau son index pour le retrouver dans le tableau friends*/
            indexNord.push(i);
        }
    }

    /*renvoie le tableau d'éléments*/
    return indexNord;
}

/**
 * Filtre liste déroulante
 * Filtres de toutes les regions une fonctions par regions
 *
 * Verifier si l'élément est checked et si c'est le cas
 * il return les element de friends filtrer via leur numRegion recuperer avec la fonction trouverIndex
 * Si ce n'est pas le cas il renvoie rien
 */
function filtreRegionNordE () {
    if (document.querySelector('.flitreCheck[value="NordE"]').checked){
         return friends.filter(friend => trouverIndex(Region , 'nord-est').includes(friend.numRegion));
    } else {
        return [];
    }
}
function filtreRegionSudE () {
    if (document.querySelector('.flitreCheck[value="SudE"]').checked){
        return friends.filter(friend => trouverIndex(Region , 'sud-est').includes(friend.numRegion));
    } else {
        return [];
    }
}

function filtreRegionSudO () {
    if (document.querySelector('.flitreCheck[value="SudO"]').checked){
        return friends.filter(friend => trouverIndex(Region , 'sud-ouest').includes(friend.numRegion));
    } else {
        return [];
    }
}

function filtreRegionNordO () {
    if (document.querySelector('.flitreCheck[value="NordO"]').checked){
        return friends.filter(friend => trouverIndex(Region , 'nord-ouest').includes(friend.numRegion));
    } else {
        return [];
    }
}

/**
 * Filtre liste déroulante
 * Cette fonction permet de modifier les option dans le select selon le trie
 */
function editOutpout () {
    OutpoutSelect.innerHTML = '';

    /*filtre les donnné et recuperation des tableau respectif*/
    let nordEstValue = filtreRegionNordE();
    let sudEstValue = filtreRegionSudE();
    let nordOuestValue = filtreRegionNordO();
    let sudOuestValue = filtreRegionSudO();

    /*concatenation avec des speedoperator*/
    const mergedArray = [...nordEstValue, ...sudEstValue, ...nordOuestValue, ...sudOuestValue];

    /*créeation d'un tableau sans doublons*/
    const uniqueArray = Array.from(new Set(mergedArray));

    /*ajout des option dans le select (OutpoutSelect) avec uniquement les nom) */
    addOption(OutpoutSelect, uniqueArray.map(objet => objet.nom))
}

/*abonnement*/

/**
 * Liste d´eroulante personnalisée
 * Abonnement du bouttons permettant l'ajout de personne
 */
button.addEventListener('click', function () {
    let error = false;
    /*verifie si les informations rentre sont bonne*/
    if (document.querySelector('.addFriendsInput').value === '') {
        error = true;
        /*si c'est vide, ca ajoute des border rouge*/
        document.querySelector('.addFriendsInput').classList.add('invalid');
    } else {
        document.querySelector('.addFriendsInput').classList.remove('invalid');
    }

    if (error) {
        return;
    }

    /*ajout d'une personne dans le array friends*/
    friends.push({
        'nom': InputName.value,
        /*passage des string en nombre */
        'numRegion': parseInt(SelectRegion.value)
    });

    /*réinitialise les valeurs du form*/
    document.querySelector('.addFriendsInput').value = ''
    SelectRegion.value = 0;

    /*mise a jour de la select de sortie*/
    editOutpout();
})

/**
 * Filtre liste déroulante
 * ecoute le changement des chackbox, quand une change on mets a jour la sortie
 */
filtreRegionCheck.forEach(check => {
    check.addEventListener('change',editOutpout);
});

/**
 * Liste d´eroulante personnalisée
 * supression d'un element de la liste
 */
deleteSelectOutpout.addEventListener('click', function () {
    /*si rien est selectionner vide finir*/
    if (OutpoutSelect.length === 0) {
        return;
    }

    /*recupere le nom a l'interieur de l'option checked*/
    const NomInner = OutpoutSelect.options[OutpoutSelect.selectedIndex].textContent;

    /*parcours toute la liste d'amis a la recherche de celui avec le bon nom*/
    for (let i = 0; i < friends.length; i++) {
        if (friends[i].nom === NomInner) {
            /*supprime l'élement de la liste*/
            friends.splice(i, 1);
            break;
        }
    }
    editOutpout();
})

addOption(SelectRegion, nomsRegions);
editOutpout();