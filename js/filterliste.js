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
const InputAge = document.querySelector('#addAge')
const button = document.querySelector('#addButton')
const filtreRegionCheck = document.querySelectorAll('.flitreCheck')

let nordValue = [];
let sudValue = [];

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

    console.log(indexNord)
    return indexNord;
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

        if (this.value === 'Nord'){
            if (this.checked){
                nordValue = friends.filter(friend => trouverIndex(Region , 'nord').includes(friend.numRegion));
            } else {
                nordValue = [];
            }

        } else {
            if (this.checked){
                sudValue = friends.filter(friend => trouverIndex(Region , 'sud').includes(friend.numRegion));
            } else {
                sudValue = [];
            }
        }

        const mergedArray = [...nordValue, ...sudValue];
        const uniqueArray = Array.from(new Set(mergedArray));
        console.log(uniqueArray)
    });
});

addOption(SelectRegion, nomsRegions);