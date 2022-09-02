

var rosyNav = document.querySelector("[role=rosy].admin .rosy-nav");

if( !rosyNav.classList.value.includes("show")) {
   rosyNav.addEventListener("mouseover", function(e){
      rosyNav.classList.add("show");
   });   
}
rosyNav.addEventListener("mouseout", function(e){
   rosyNav.classList.remove("show");
});



   // nv0.addEventListener("mouseover", function(e) {
   //    if( !rosyNav.classList.contains("togglenv1") ) {
   //       rosyNav.classList.add("togglenv1");
   //    }
   // });
   //
   // rosyNav.addEventListener("mouseout", function(e){
   //    //rosyNav.classList.remove("togglenv1");
   // });
