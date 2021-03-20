const rootSelector = document.querySelector(':root');

function themeCloseYoNatural() {
    rootSelector.style.setProperty('--baseColor', '#31708E');
    rootSelector.style.setProperty('--fontColor', '#535a79');
    rootSelector.style.setProperty('--entryBackgroundColor', '#6878640d');
    rootSelector.style.setProperty('--backgroundColor', '#F7F9Fb');
    rootSelector.style.setProperty('--headerFooterBackground', '#5085A5');
    rootSelector.style.setProperty('--headerSharding', '#5085a578');
}

function themeCleanAndEnergetic() {
    rootSelector.style.setProperty('--baseColor', '#8860D0');
    rootSelector.style.setProperty('--fontColor', '#523661');
    rootSelector.style.setProperty('--entryBackgroundColor', '#5AB9EA0A');
    rootSelector.style.setProperty('--backgroundColor', '#dce0e0');
    rootSelector.style.setProperty('--headerFooterBackground', '#66488d');
    rootSelector.style.setProperty('--headerSharding', '#66488d7a');
}

function themeColorsThatPop() {
    rootSelector.style.setProperty('--baseColor', '#802BB1');
    rootSelector.style.setProperty('--fontColor', '#D1D7E0');
    rootSelector.style.setProperty('--entryBackgroundColor', '#4C495D7A');
    rootSelector.style.setProperty('--backgroundColor', '#2D283E');
    rootSelector.style.setProperty('--headerFooterBackground', '#564F6F');
    rootSelector.style.setProperty('--headerSharding', '#564f6fb3');
}

function themeCorporateAndSerious() {
    rootSelector.style.setProperty('--baseColor', '#1E4258');
    rootSelector.style.setProperty('--fontColor', '#c4c4c4');
    rootSelector.style.setProperty('--entryBackgroundColor', '#5AB9EA0A');
    rootSelector.style.setProperty('--backgroundColor', '#022140');
    rootSelector.style.setProperty('--headerFooterBackground', '#0f3459');
    rootSelector.style.setProperty('--headerSharding', '#0f345978');
}

function themeBlueAndRefreshing() {
    rootSelector.style.setProperty('--baseColor', '#2E9CCA');
    rootSelector.style.setProperty('--fontColor', '#AAABB8');
    rootSelector.style.setProperty('--entryBackgroundColor', '#303259');
    rootSelector.style.setProperty('--backgroundColor', '#25274D');
    rootSelector.style.setProperty('--headerFooterBackground', '#171942');
    rootSelector.style.setProperty('--headerSharding', '#17194270');
}

function getThemeData(){
    if(window.localStorage.getItem('USSPTheme'))
        return window.localStorage.getItem('USSPTheme');
    else
        return false;
}

// theme list
const themeList = ['themeCloseYoNatural', 'themeCleanAndEnergetic', 'themeColorsThatPop', 'themeCorporateAndSerious', 'themeBlueAndRefreshing'];
let selectionNumber=0;

if(getThemeData()){
    // set current them as the one on local storage
    window[getThemeData()]();
}else{
    // change theme based on time
    let currentHour = new Date().getHours();
    let currentMinute = new Date().getMinutes();
// time in-between 6.30pm amd 6.30am or system is no dark theme then dark them will be default selection
    if ((currentHour >= 18 && currentMinute >= 30) || (currentHour <= 6 && currentMinute <= 30) || window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
        // apply dark theme
        let randomNumber = Math.round(Math.random() * 10);
        let position = randomNumber > 6 ? 2 : randomNumber > 2 ? 3 : 4;
        window[themeList[position]]();
        // store selected theme on local storage
        window.localStorage.setItem('USSPTheme',themeList[position]);
        // set current theme position
        selectionNumber = position;
    } else {
        // apply light theme
        let randomNumber = Math.round(Math.random() * 10);
        let position = randomNumber > 4 ? 1 : 0;
        window[themeList[position]]();
        // store selected theme on local storage
        window.localStorage.setItem('USSPTheme',themeList[position]);
        // set current theme position
        selectionNumber = position;
    }
}

// change them for user preferences
function changeTheme() {
    selectionNumber++;
    // check for overflow
    if (selectionNumber > 4) {
        selectionNumber = 0;
    }
    // store selected theme on local storage
    window.localStorage.setItem('USSPTheme',themeList[selectionNumber]);
    // update theme
    window[themeList[selectionNumber]]();
}