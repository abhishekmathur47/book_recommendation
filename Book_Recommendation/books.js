function searchBooks() {
	// var bookCount = document.getElementById('count');
	var title = document.getElementById('title').value.toUpperCase();
	var auth = document.getElementById('auth').value.toUpperCase();
	var rating = document.getElementById('rating').value;
	var countVal = 0;
	// console.log(title + "|" + auth + "|" + rating);

	var txtValue;

	var table = document.getElementById("myTable");
	var tr = table.getElementsByTagName("tr");

	// bookCount.style.display = "";

	for (var i = 1; i < tr.length; i++) {
		var x = false;
		var y = false;
		var z = false;
		bookTitle = tr[i].getElementsByTagName("td")[0];
		bookAuth = tr[i].getElementsByTagName("td")[1];
		// synopsis = tr[i].getElementsByTagName("td")[1];
		bookRating = tr[i].getElementsByTagName("td")[3];
		
		if(title.trim() != "")
		{
			if(bookTitle && (title.trim() != ""))
			{
				var a = bookTitle.textContent || bookTitle.innerText;
				if(a.toUpperCase().indexOf(title) > -1){
					// tr[i].style.display = "";
					x = true;
				}
				else{
					// tr[i].style.display = "none";
					x = false;
				}
			}
		}
		else{
			// tr[i].style.display = "";
			x = true;
		}

		if((auth.trim() != ""))
		{
			if(bookAuth && (auth.trim() != ""))
			{
				var b = bookAuth.textContent || bookAuth.innerText;
				if(b.toUpperCase().indexOf(auth) > -1){
					// tr[i].style.display = "";
					y = true;
				}
				else{
					// tr[i].style.display = "none";
					y = false;
				}
			}
		}
		else{
			// tr[i].style.display = "";
			y = true;
		}

		if((rating.trim() != "Rating")){
		if(bookRating && (rating.trim() != "Rating"))
			{
				var c = bookRating.textContent || bookRating.innerText;
				if(c.toUpperCase().indexOf(rating) > -1){
					// tr[i].style.display = "";
					z = true;
				}
				else{
					// tr[i].style.display = "none";
					z = false;
				}
			}
		}
		else{
			// tr[i].style.display = "";
			z = true;
		}

		if(x && y && z){
			tr[i].style.display = "";
			countVal++;
		}
		else{
			tr[i].style.display = "none";
		}
	}

	// bookCount.innerText = countVal + ' Books found';

	return false;
}

function resetForm(){
	document.getElementById('title').value = "";
	document.getElementById('auth').value = "";
	document.getElementById('rating').value = "Rating";
	document.getElementById('count').style.display = "none";
}