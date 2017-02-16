$(document).ready(function () {
	// Show loader image
	$('#loaderImage').show();

	//show contacts on page load
	showContacts();

	//add contact
	$(document).on('submit','#addContact',  function(){
		// show loader image
		$('#loaderImage').show();

		//post data from form
		$.post("add_contact.php",$(this).serialize())
			.done(function(data){
				console.log(data);
				$('#addModal').foundation('close');
				showContacts();
			});
			return false;
	});

	//edit contact
		$(document).on('submit','#editContact',  function(){
		// show loader image
		$('#loaderImage').show();

		//post data from form
		$.post("edit_contact.php",$(this).serialize())
			.done(function(data){
				console.log(data);
				$('.editModal').foundation('close');
				showContacts();
			});
			return false;
	});
	//delete contact
		$(document).on('submit','#deleteContact',  function(){
		// show loader image
		$('#loaderImage').show();

		//post data from form
		$.post("delete_contact.php",$(this).serialize())
			.done(function(data){
				console.log(data);
				showContacts();
			});
			return false;
	});



});
//Show contacts
function showContacts(){
	console.log('Showing contacts...');
	setTimeout("$('#pageContent').load('contacts.php',function(){$('#loaderImage').hide();	})",1000);
}