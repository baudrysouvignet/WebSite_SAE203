/*
data des regions
*/

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



/*
data des amis
*/

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

function addOption(element, datas) {
    datas.forEach(function (data, index){
        if (index === 0) {
            element.innerHTML += '<option value="'+index+'" selected>'+data+'</option>';
        } else {
            element.innerHTML += '<option value="'+index+'">'+data+'</option>';
        }
    });
}

function trouverIndex(regions, type) {
    const indexNord = [];

    for (let i = 0; i < regions.length; i++) {
        if (regions[i].zone.includes(type)) {
            indexNord.push(i);
        }
    }

    return indexNord;
}

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

/*abonnement*/

button.addEventListener('click', function () {
    let error = false;
    if (document.querySelector('.addFriendsInput').value === '') {
        error = true;
        document.querySelector('.addFriendsInput').classList.add('invalid');
    } else {
        document.querySelector('.addFriendsInput').classList.remove('invalid');
    }

    if (error) {
        return;
    }

    friends.push({
        'nom': InputName.value,
        'numRegion': parseInt(SelectRegion.value)
    });

    document.querySelector('.addFriendsInput').value = ''

    SelectRegion.value = 0;
})

filtreRegionCheck.forEach(check => {
    check.addEventListener('change', function () {
        OutpoutSelect.innerHTML = '';

        let nordEstValue = filtreRegionNordE();
        let sudEstValue = filtreRegionSudE();
        let nordOuestValue = filtreRegionNordO();
        let sudOuestValue = filtreRegionSudO();

        const mergedArray = [...nordEstValue, ...sudEstValue, ...nordOuestValue, ...sudOuestValue];
        const uniqueArray = Array.from(new Set(mergedArray));
        addOption(OutpoutSelect, uniqueArray.map(objet => objet.nom))
    });
});

deleteSelectOutpout.addEventListener('click', function () {
    if (OutpoutSelect.length === 0) {
        return;
    }

    console.log('audd');
})

addOption(SelectRegion, nomsRegions);