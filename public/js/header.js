function activeLink() {

    var path = window.location.pathname;
    var currentPage = path.split("/").pop();

    for(var i=1; i <= 5; i++){
        var element = document.getElementById("headerLink"+i);
        var link = element.href;
        var page = link.split("/").pop();

        if(currentPage === page){
            element.className = element.className + " " + "active";
        }
    }

}
