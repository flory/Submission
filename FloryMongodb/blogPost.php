<?php
//This is my main collection of blog entries
//Author: Flory ataka
//StudentNo:200331639
try {
  // open connection to My Ubuntu MongoDB server
  $conn = new Mongo('localhost');

  // access the default database called test
  $db = $conn->test;

  // access collection author
  $collection = $db->author;

  // insert a new document to our collection
	$author = array(
 	'first_name' => 'Flory',
        'last_name' => 'Ataka',     
 	'email' => 'flory@webmail.co.za',
 	'physical_address' => array(
 	 array(
   	'country' => 'NAMIBIA',
   	'zip' => '9000',
   	'address1' => 'kingfisher'
  	),
  	array(
   	'city' => 'WINDHOEK',
   	'PO_box' => '32541',
   	'address1' => 'Pioniers Park'
  	),
 	),
 	'sessions' => 0,
	);
       $posts = array(
 	'tag' => 'Student Record',
 	'author_id' => $users->_id,
 	'title' => 'Poly student',
 	'summary' => 'Advanced Database system',
 	'body' => 'This is the Master Course that was lectured by Dr Jose',
        'post_date' => '16/05/2010',
	 'comments' => array(
 	 array(
  	 'commenter_name' => 'jose',
  	 'content' => 'I guess this is a nice post'
  	 ) 
	 )
	);

  
  $collection->insert($author);
  echo 'Inserted document with ID: ' . $author['_id'];
  
  // disconnect from my server
  $conn->close();
} catch (MongoConnectionException $e) {
  die('Error connecting to MongoDB server');
} catch (MongoException $e) {
  die('Error: ' . $e->getMessage());
}
?>

