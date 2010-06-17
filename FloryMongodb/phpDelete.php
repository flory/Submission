<?php
try {
  // open connection to MongoDB server
  $conn = new Mongo('localhost');

  // access database
  $db = $conn->test;

  // access collection
  $collection = $db->author;
//
//select id from table where 
  // remove a document by ID
  $criteria = array(
    '_id' => new MongoId('4c17aae1787375ec14010000'),
  );
  $collection->remove($criteria);
  echo 'Removed document with ID: ' . $criteria['_id'];
  
  // disconnect from server
  $conn->close();
} catch (MongoConnectionException $e) {
  die('Error connecting to MongoDB server');
} catch (MongoException $e) {
  die('Error: ' . $e->getMessage());
}
?>


