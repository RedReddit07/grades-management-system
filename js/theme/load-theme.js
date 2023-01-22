
let mytheme = localStorage.getItem('data-theme')

if (mytheme) {

    if(mytheme === 'dark') {
        document.documentElement.setAttribute("data-theme", "dark")
    }else {
        document.documentElement.setAttribute("data-theme", "light")
    }
    
}else {
    localStorage.setItem('data-theme', 'light')
}