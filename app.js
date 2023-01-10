function myFunction() {
	var x = document.getElementById("map");
	if (x.style.display === "none") {
	  x.style.display = "block";
	} else {
	  x.style.display = "none";
	}
  }

const observer = new IntersectionObserver(entries =>{
	entries.forEach(entry =>{
		const square = entry.target.querySelector('.square');
	if (entry.isIntersecting){
		// adding the animation class
		square.classList.add('square-animation');
		}
		square.classList.remove('square-animation');
	});
});
observer.observe(document.querySelector('.square-wrapper'));