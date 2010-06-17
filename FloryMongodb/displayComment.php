<?php
try {
  // open connection to MongoDB server
  $conn = new Mongo('localhost');

  // access database
  $db = $conn->test;

  // access collection
  $collection = $db->author;

  // execute query
  // retrieve all documents
  $cursor = $collection->find();

  // iterate through the result set
  // print each document
  echo $cursor->count() . ' document(s) found. <br/>';  
  foreach ($cursor as $obj) {
    echo 'Commenter_Name: ' .$obj['commenter_name'] . '<br/>';
    echo 'Comments: ' .$obj['content'] . '<br/>';
    echo '<br/>';
  }

  // disconnect from server
  $conn->close();
} catch (MongoConnectionException $e) {
  die('Error connecting to MongoDB server');
} catch (MongoException $e) {
  die('Error: ' . $e->getMessage());
}
?>

