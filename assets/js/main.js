function applyTileColor() {
    let colors = ['#e06363', '#5ac65a', '#6161ca', '#c170cf'
        , '#3a3e3a', '#c12084', '#cfa62b', '#47baac'];
    let totElement = document.getElementsByClassName('tile').length;
    let colorIndex = Array();
    for (let i = 0; i < totElement; i++) {
        let randomValue = Math.floor(Math.random() * colors.length);
        if (colorIndex[i - 1] === randomValue) {
            i = i - 1;
            continue;
        }
        colorIndex[i] = randomValue;
        document.getElementsByClassName('tile')[i].style.backgroundColor = colors[randomValue];
    }
}
applyTileColor();