  let toggle = button => {
    let element = document.getElementById("mydiv");
    let hidden = element.getAttribute("hidden");

    if (hidden) {
       element.removeAttribute("hidden");
       button.innerText = "Hide Profile";
    } else {
       element.setAttribute("hidden", "hidden");
       button.innerText = "Show Profile";
    }
  }

  let to = button => {
    let element = document.getElementById("mydiv1");
    let hidden = element.getAttribute("hidden");

    if (hidden) {
       element.removeAttribute("hidden");
       button.innerText = "Hide Experience";
    } else {
       element.setAttribute("hidden", "hidden");
       button.innerText = "Show Experience";
    }
  }

  let tog = button => {
   let element = document.getElementById("mydiv2");
   let hidden = element.getAttribute("hidden");

   if (hidden) {
      element.removeAttribute("hidden");
      button.innerText = "Hide Education  ";
   } else {
      element.setAttribute("hidden", "hidden");
      button.innerText = "Show Education  ";
   }
 }

 let togg = button => {
   let element = document.getElementById("mydiv3");
   let hidden = element.getAttribute("hidden");

   if (hidden) {
      element.removeAttribute("hidden");
      button.innerText = "Hide Certificates";
   } else {
      element.setAttribute("hidden", "hidden");
      button.innerText = "Show Certificates";
   }
 }

 let toggl = button => {
   let element = document.getElementById("mydiv4");
   let hidden = element.getAttribute("hidden");

   if (hidden) {
      element.removeAttribute("hidden");
      button.innerText = "Hide Information";
   } else {
      element.setAttribute("hidden", "hidden");
      button.innerText = "Show Information";
   }
 }
