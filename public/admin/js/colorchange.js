document.addEventListener("DOMContentLoaded", function(){
    window.setTheme = function(bg, item, hover, text){
        document.documentElement.style.setProperty("--sidebar-bg", bg);
        document.documentElement.style.setProperty("--sidebar-item-bg", item);
        document.documentElement.style.setProperty("--sidebar-hover", hover);
        document.documentElement.style.setProperty("--sidebar-text", text);
        localStorage.setItem("theme", JSON.stringify({bg, item, hover, text}));
    };
    const savedTheme = localStorage.getItem("theme");
    if(savedTheme){
        const theme = JSON.parse(savedTheme);
        setTheme(theme.bg, theme.item, theme.hover, theme.text);
    }
});
