<?php
try {
  // open connection to MongoDB server
  $conn = new Mongo('localhost');

  // access database
  $db = $conn->test;

  // access collection
  $collection = $db->author;

  // add new tags to a post
  $author = array(
    'tag' => $_POST['tag'],
    'title' => $_POST['title'],
    'summary' => $_POST['summary'],
    'body' => $_POST['body'],
    'post_date' => $_POST['post_date']
  );
  $collection->insert($author);
  echo 'You have Inserted new tag with ID: ' . $author['_id'];
  
  // disconnect from server
  $conn->close();
} catch (MongoConnectionException $e) {
  die('Error connecting to MongoDB server');
} catch (MongoException $e) {
  die('Error: ' . $e->getMessage());
}
?>

