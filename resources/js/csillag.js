function randomSzazalek() {
    return (Math.random() * 100).toFixed(2);
}

function randomRadius() {
    return (Math.random() * 0.5 + 1).toFixed(2);
}

var eltunes1 = document.getElementById('eltunes_1');
var eltunes2 = document.getElementById('eltunes_2');

function addCircles(svg, count) {
    for (var i = 0; i < count; i++) {
        var circle = document.createElementNS('http://www.w3.org/2000/svg', 'circle');
        circle.setAttribute('class', 'star');
        circle.setAttribute('cx', randomSzazalek() + '%');
        circle.setAttribute('cy', randomSzazalek() + '%');
        circle.setAttribute('r', randomRadius());
        svg.appendChild(circle);
    }
}

addCircles(eltunes1, 50);
addCircles(eltunes2, 50);
