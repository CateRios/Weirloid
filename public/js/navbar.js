function activeLinkNav() {

    var path = window.location.pathname;
    var currentPage = path.split("/").pop();
    var category =['pops', 'manga', 'electronics', 'clothes'];

    for(var i=1; i <= 4; i++){
        var element = document.getElementById("navLink"+i);
        var link = element.href;
        var page = link.split("/").pop();

        if(currentPage === page){
            element.className = element.className + " " + "active";
        }
    }

}