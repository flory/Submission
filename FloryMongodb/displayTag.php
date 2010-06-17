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
    echo 'Tag: ' .$obj['tag'] . '<br/>';
    echo 'Title: ' .$obj['title'] . '<br/>';
    echo 'Summary: ' .$obj['summary'] . '<br/>';
    echo 'Content: ' .$obj['body'] . '<br/>';
    echo 'Post Date: ' .$obj['post_date'] . '<br/>';
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

