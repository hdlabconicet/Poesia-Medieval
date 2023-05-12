const alphaDiv = document.getElementById("alphabet-search")
const texts = document.querySelectorAll("ul.text-list li")

function buildAlphabetBar() {

	let existingLetters = []

	for (text of texts) {
		existingLetters.push(text.textContent[0])
	}

	let existingLettersSet = new Set(existingLetters.sort())

	for (let letter of [...existingLettersSet]) {
		newSpan = document.createElement("span")
    	newSpan.setAttribute("class", "f-char")
    	newSpan.innerText = letter
    
		alphaDiv.appendChild(newSpan)

	}

}

buildAlphabetBar()

const letters = document.querySelectorAll("span.f-char")

for (letter of letters) {
	letter.addEventListener("click", (evt)=> {

	if (! document.querySelector("#alphabet-search button")) {
		newBtn = document.createElement("button")
		newBtn.setAttribute("class", "f-char")
		newBtn.style.position = "absolute"
		newBtn.innerText = "Mostrar todo"
		alphaDiv.appendChild(newBtn)
		newBtn.addEventListener("click", (e)=> {
			for (text of texts) {
				text.style.display = ""
			}
			e.target.remove()
		})
	}
	
	for (text of texts) {
		title_begin = text.textContent[0];

		if (title_begin.toUpperCase() === evt.target.textContent) {
		  text.style.display = ""
		} else {
		  text.style.display = "none"
		}
	}
})}
