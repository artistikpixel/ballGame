function randomBetween(min, max) {
    return Math.floor(Math.random() * (max - min + 1)) + min;
}

function shuffle(arr) {
    for (let i = 0; i < arr.length; i++) {
        var rnd = randomBetween(0, arr.length - 1);
        var tmp = arr[i];
        arr[i] = arr[rnd];
        arr[rnd] = tmp;
    }
    return arr;
}


var n = 3;
var numGrupe = n;
var numBile = n * n;
var maxDifCuls = 2;
var culori = ["galben", "albastru", "rosu"];

var retBile = 0;
var culsGrupe = [];
var bile = [];

function genCulsGrupe() {
    culsGrupe = [];
    for (var i = 0; i < numGrupe; i++)
        culsGrupe.push(randomBetween(1, maxDifCuls));
}

function genBile() {
    retBile = numBile;
    bile = [];
    var maxNum = 0;
    for (var i = 0; i < numGrupe; i++)
        maxNum += culsGrupe[i];
    for (var i = 0; i < numGrupe; i++) {
        var numCuls = culsGrupe[i];
        var gr = [];
        culori = shuffle(culori);
        for (var j = 0; j < numCuls; j++) {
            var cul = culori[j];
            var max = retBile - maxNum + 1;
            var nb = randomBetween(1, max);
            if (i == numGrupe - 1 && j == numCuls - 1)
                nb = retBile;
            maxNum -= 1;
            retBile -= nb;
            gr.push({
                numBile: nb,
                culoare: cul,
            });
        }
        bile.push(gr);
    }
}
//2

console.clear();
console.log("num culori " + n);
console.log("num grupe " + numGrupe);
console.log("culori [" + culori + "]");
console.log("num bile " + numBile);
console.log("max culori diferite " + maxDifCuls);

genCulsGrupe();
genBile();
for (var i = 0; i < culsGrupe.length; i++) {
    console.log("grupa " + (i + 1) + ", " + culsGrupe[i] + " culori diferite");
    var bila = bile[i];
    for (var j = 0; j < bila.length; j++)
        console.log(bila[j]);
}
