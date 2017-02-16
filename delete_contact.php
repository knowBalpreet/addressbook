<?php
	include 'core/init.php';

	//create database object
	$db = new Database;

	$db->query("delete from contacts where id = :id");

	$db->bind(':id',$_POST['id']);

	if ($db->execute()) {
		echo "Contact was Deleted";
	}else{
		echo "Could not delete contact.";
	}
?>