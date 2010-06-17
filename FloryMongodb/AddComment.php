<?php
try {
  // open connection to MongoDB server
  $conn = new Mongo('localhost');

  // access database
  $db = $conn->test;

  // access collection
  $collection = $db->author;

  // add new comments to a post
  $author = array(
    'commenter_name' => $_POST['commenter_name'],
    'content' => $_POST['content']
  );
  $collection->insert($author);
  echo 'You have Inserted new comment with ID: ' . $author['_id'];
  
  // disconnect from server
  $conn->close();
} catch (MongoConnectionException $e) {
  die('Error connecting to MongoDB server');
} catch (MongoException $e) {
  die('Error: ' . $e->getMessage());
}
?>

