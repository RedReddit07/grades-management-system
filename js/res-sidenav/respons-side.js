const sideMenu = document.querySelector("aside");
const menuBtn = document.querySelector("#menu-btn");
const closeBtn = document.querySelector("#close-btn");
// for light and dark mode
const themeToggler = document.querySelector(".theme-toggler");



const val = localStorage.getItem('isDarkMode')
let theme = localStorage.getItem('data-theme');

//change theme on load
if(val === '1') {
    
    document.body.classList.add('dark-theme-variables');

    themeToggler.querySelector('span:nth-child(1)').classList.remove('active');
    themeToggler.querySelector('span:nth-child(2)').classList.add('active');
}

if(val === '0') {
    
    document.body.classList.remove('dark-theme-variables');

    themeToggler.querySelector('span:nth-child(1)').classList.add('active');
    themeToggler.querySelector('span:nth-child(2)').classList.remove('active');
}


// show sidebar
menuBtn.addEventListener('click', ()=>{
    sideMenu.style.display = 'block';
})

// close sidebar
closeBtn.addEventListener('click', ()=>{
    sideMenu.style.display = 'none';
})

// change theme
themeToggler.addEventListener('click', ()=>{
    
    
    const val = localStorage.getItem('data-theme')

    if(val === 'dark') {
        
        // localStorage.setItem('isDarkMode', '0')
        document.documentElement.setAttribute("data-theme", "light") // set theme light
    localStorage.setItem("data-theme", 'light') // save theme to local storage
    }
    if(val === 'light') {
        // localStorage.setItem('isDarkMode', '1')
    document.documentElement.setAttribute("data-theme", "dark") // set theme to dark
    localStorage.setItem("data-theme", "dark") // save theme to local storage
    }

    // document.body.classList.toggle('dark-theme-variables');

    // document.documentElement.setAttribute("data-theme", "dark") // set theme to dark
    // localStorage.setItem("data-theme", "dark") // save theme to local storage

    themeToggler.querySelector('span:nth-child(1)').classList.toggle('active');
    themeToggler.querySelector('span:nth-child(2)').classList.toggle('active');
})
