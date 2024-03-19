<!DOCTYPE html>
<html>
<style>
input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=number], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: red;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}
input[type=file] {
  width: 20%;
  background-color: red;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}


input[type=submit]:hover {
  background-color: #000;
  color: white;
 
}

div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>
<body>

<h1>ASSASSIN</h1>

<div>
<form action="upload.php" method="post" enctype="multipart/form-data">
    <label for="fname">Product ID:</label>
    <input type="number" id="fname" name="firstname" placeholder="eg.11">

    <label for="lname">Product Name:</label>
    <input type="text" id="lname" name="lastname" placeholder="eg.NVMI">

    <label for="lname">Product Price:</label>
    <input type="number" id="lname" name="lastname" placeholder="eg.1002">

    <label for="lname"></label>
    <input type = "file" name ="image">
    <button type="submit" name="submit">Upload</button>
  </form>
</div>

</body>
</html>


